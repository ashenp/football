<?php
/**
 * Sphinx 封装API
 * @author liu 
 * 2011-03-26
 */


require_once(FW_PATH.'/plugins/sphinx/sphinxapi.php');
class Search {
	//选择的索引
	private $index   = "";
	//目标地址
	private $host    = "localhost";
	//默认使用端口
	private $port    = 9312;
	//匹配模式
	private $matchMode = SPH_MATCH_ALL;
	//sphinx连接配置
	private $conn;
	
	private $groupby = "";
	private $groupsort = "@group desc";
	private $filter = "group_id";
	private $filtervals = array();
	private $distinct = "";
	private $sortby = "";
	private $sortexpr = "";
	private $limit = 20;
	private $ranker = SPH_RANK_PROXIMITY_BM25;	//更精确
	private $queryInFields = "";
	
	//超时
	private $timeout = 3;
	//最大长度限制
	private $maxLimit = 1000;
	
	
	public function __construct($name = ''){//stadium
		$configs = config("searchIndex", $name);//var_dump($configs);
		if (is_array($configs) && !empty($configs)) {
			$this->host = $configs["host"];
			$this->port = $configs["port"];
			$this->index = $configs["index"];

			if (!empty($this->host) && !empty($this->port) && !empty($this->index)) {
				$this->initServer();		
			}
		}
	}
	
	/**
	 * 初始化索引搜索
	 *
	 */
	private function initServer(){
		try{
			$conn = new SphinxClient();
			$conn->SetConnectTimeout ($this->timeout*1000);//这是毫秒
			$conn->SetServer ($this->host, $this->port);
			$conn->SetArrayResult (true);
//			$conn->SetWeights(array (100, 1));
			$conn->SetMatchMode($this->matchMode);
			$conn->SetRankingMode ($this->ranker);
			
			$this->conn = $conn;
		} catch (Exception $e) {
			return false;
		}
	}
	
	//数据搜索
	public function query($keyword, $page = 1, $pageSize = 20, $orderby = "", $orderMode = SPH_SORT_ATTR_DESC) {
		$offset = ($page - 1) * $pageSize;
		$this->setLimits($offset, $pageSize);
		if (!empty($orderby)) {
			$this->setSortMode($orderby, $orderMode);
		}
		
		$keyword .= $this->queryInFields;
	 	$datas = $this->conn->Query($keyword, $this->index);
	 	if (is_array($datas) && isset($datas["total"]) && isset($datas["time"])) {
	 		$results = $this->emptyPage((integer)$datas["total"], $page, $pageSize, (float)$datas["time"]);
	 		if (isset($datas["matches"])) {
	 			foreach ($datas["matches"] as $entry){
	 				$results->recordIds[] = (integer)$entry["id"];
	 				$results->records[$entry["id"]] = $entry['attrs'];
	 			}
	 		}
			if (isset($datas["words"])) {
	 			foreach ($datas["words"] as $word=>$tmp){
	 				$results->words[] = $word;
	 			}
	 		}
	 		return $results;
	 	} else {
	 		return $this->emptyPage(0, $page, $pageSize);
	 	}
	}
	
	public function emptyPage($total=0, $page=1, $pageSize=20, $querytime=0){
		$r = new stdClass();
		$r->total        = $total;
		$r->totalPage    = (integer)ceil($total/$pageSize);
		$r->page         = $page;
		$r->pageSize     = $pageSize;
		$r->recordIds    = array();
		$r->records    = array();
		$r->words		 = array();
		$r->querytime    = $querytime;
		return $r;
	}
	
	/**
	 * 清除当前设置的过滤器
	 *
	 */
	public function ResetFilters() {
		$this->conn->ResetFilters();
	}
	
	/**
	 * 清除现有的分组设置
	 *
	 */
	public function ResetGroupBy() {
		$this->conn->ResetGroupBy();
	}
	
	/**
	 * 产生文本摘要和高亮
	 * @todo 
	 * @param unknown_type $docs
	 * @param unknown_type $index
	 * @param unknown_type $words
	 * @param unknown_type $opts
	 */
	public function BuildExcerpts ($docs, $index, $words, $opts=array()) {
		
	}
	
	
	/**
	 * 根据指定索引的符号化（tokenizer）方式的设置，从查询中抽取关键词，也可以同时返回每个关键词出现次数的统计信息。返回一个数组，其元素是一些字典，每个字典包含一个关键字的信息
	 * 
	 * @param string $query 抽取关键字的目标
	 * @param string $index 索引的名字
	 * @param bool $hits 布尔值，它指定了是否需要返回关键词出现此处的信息
	 */
	public function BuildKeywords ($query, $index, $hits = false) {
		return $this->conn->BuildKeywords ($query, $index, $hits);
	}
	
	/**
	 * 增加整数值属性的筛选,查询$values匹配的结果
	 * @param  string $attr 属性名称
	 * @param  array  $values 整数数组
     * @param  bool   $exclude 如果设置为 TRUE, 则匹配该过滤规则的文档会被排除在结果之外
	 */
	public function setFilter($attr, $values, $exclude = false){
		if($attr != '' && is_array($values) && !empty($values)) {
			$this->conn->SetFilter($attr, $values, $exclude);
		}
		return false;
	}
	
	/**
	 * 增加整数值属性的筛选,查询$values不匹配的结果
	 * @param  string $attr 属性名称
	 * @param  array  $values 整数数组 
	 */
	public function setExcludeFilter($attr, $values){
		if($attr != '' && is_array($values) && !empty($values)) {
			$this->conn->SetFilter($attr, $values, true);
		}
		return false;
	}
	
	
	/**
	 * 设置接受的ID范围。参数必须是整数。默认是0和0，意思是不限制范围
	 *
	 * @param integer $min
	 * @param integer $max
	 */
	public function setIDRange($min, $max ) {
		if($max >= $min) {
			$this->conn->SetIDRange($min, $max);
		}
		return false;
	}
	
	/**
	 * 添加新的整数范围过滤器
	 *
	 * @param string $attribute 属性名称
	 * @param integer $min 最小值
 	 * @param integer $max 最大值
	 */
	public function setFilterRange ($attribute, $min, $max) {
	 	if($attribute != '' && $max >= $min) {
	 		$this->conn->SetFilterRange ($attribute, $min, $max, false);
	 	}
	 	return false;
	 }
	
	 /**
	  * 增加新的浮点数范围过滤器。
	  *
	  * @param string $attribute
	  * @param float $min
	  * @param float $max
      * @param bool $exclude
	  */
	 public function setFilterFloatRange($attribute, $min, $max, $exclude=false) {
//	 	if($attribute != '' && $max >= $min) {
//	 		$this->conn->SetFilterRange ($attribute, $min, $max, false);
//	 	}
//	 	return false;
         $this->conn->SetFilterFloatRange ($attribute, $min, $max, $exclude);
	 }
	 
	 /**
	  * 设置进行分组的属性、函数和组间排序模式，并启用分组
	  *
	  * @param string $attribute 进行分组的属性名
	  * @param string $sort 控制分组如何排序的子句
	  * @param const $func 它指定内建函数，该函数以前面所述的分组属性的值为输入，目前的可选的值为： SPH_GROUPBY_DAY、SPH_GROUPBY_WEEK、 SPH_GROUPBY_MONTH、 SPH_GROUPBY_YEAR、SPH_GROUPBY_ATTR
	  */
	 public function setGroupBy($attribute, $sort, $func = SPH_GROUPBY_ATTR) {
	 	if($attribute) {
	 		$this->conn->SetGroupBy($attribute, $func, $sort);
	 	}
	 	return false;
	 }
	 
	 /**
	  * 设置分组中需要计算不同取值数目的属性名。只在分组查询中有效
	  *
	  * @param string $attribute 属性名称
	  * @example 
	  * $cl->SetGroupBy ( "category", SPH_GROUPBY_ATTR, "@count desc" );
	  * $cl->SetGroupDistinct ( "vendor" );
	  * 等价于如下的SQL语句：
		SELECT id, weight, all-attributes,
			COUNT(DISTINCT vendor) AS @distinct,
			COUNT(*) AS @count
		FROM products
		GROUP BY category
		ORDER BY @count DESC
	  */
	 public function setGroupDistinct ($attribute) {
	 	if($attribute != '') {
	 		$this->conn->SetGroupDistinct ($attribute);
	 	}
	 	return false;
	 }
	 
	 
	 /**
	  * 给服务器端结果集设置一个偏移量（$offset）和从那个偏移量起向客户端返回的匹配项数目限制（$limit
	  *
	  * @param unknown_type $offset
	  * @param unknown_type $limit
	  * @param unknown_type $max_matches
	  * @param unknown_type $cutoff
	  */
	 private function setLimits($offset, $limit, $max_matches = 1000) {
	 	if($limit) {
	 		$offset = intval($offset);
	 		$limit = intval($limit);
	 		$this->conn->SetLimits($offset, $limit, $max_matches);
	 	}
	 	return false;
	 }
	 
	 /**
	  * 设置最大搜索时间
	  *
	  * @param integer $timeout 秒
	  */
	 public function setMaxQueryTime($timeout) {
	 	if($timeout) {
	 		$this->timeout = $timeout*1000; //转化为毫秒
	 		$this->conn->SetMaxQueryTime($this->timeout);
	 	}
	 	return false;
	 }
	 
	 /**
	  * 设置一个临时的（只对单个查询有效）针对不同文档的属性值覆盖。只支持标量属性。
	  *	//目前不支持
	  * @param string $attrname
	  * @param string $attrtype
	  * @param hash $values 哈希表，他的键是要覆盖属性的文档ID，之是对应该文档ID的要覆盖的值
	  */
	 public function setOverride($attrname, $attrtype, $values) {
	 	$this->conn->SetOverride($attrname, $attrtype, $values);
	 }
	 
	 /**
	  * 设置返回信息的内容,列出具体要取出的属性以及要计算并取出的expressions。子句的语法模仿了SQL
	  *
	  * @param string $clause 类SQL
	  */
	 public function setSelect ($clause) {
	 	$this->conn->SetSelect ($clause);
	 }
	 
	 /**
	  * 设置匹配模式
	  *
	  * @param string $mode 匹配模式
	  */
	 public function setMatchMode($mode = SPH_MATCH_ANY) {
	 		$this->conn->SetMatchMode($mode);
	 }
	 
	 /**
	  * 设置评分模式。目前只在SPH_MATCH_EXTENDED2这个匹配模式中提供。参数必须是与某个已知模式对应的常数。
	  *
	  * @param string $ranker 排序算法
	  */
	 public function setRankingMode ($ranker = SPH_RANK_SPH04) {
	 	$this->conn->SetRankingMode ($ranker);
	 }
	 
	 /**
	  * 设置匹配项的排序模式
	  *
	  * @param string $sortby 字段
	  * @param string $orderMode 排序方式
	  */
	public function setSortMode($sortby, $orderMode = SPH_SORT_ATTR_DESC){
		return $this->conn->SetSortMode($orderMode, $sortby);
	}
	 
	
	/**
	 * 按字段名称设置字段的权值。参数必须是一个hash（关联数组），该hash将代表字段名字的字符串映射到一个整型的权值上。
	 * 过高的权值可能会导致出现32位整数的溢出问题
	 * 不推荐
	 * @param array $weights
	 */
	public function setFieldWeights($weights) {
		$this->conn->SetFieldWeights($weights);
	}
	
	/**
	 * 设置索引的权重，并启用不同索引中匹配结果权重的加权和。参数必须为在代表索引名的字符串与整型权值之间建立映射关系的hash（关联数组）。默认值是空数组，意思是关闭带权加和。
	 * 不推荐
	 * @param array $weights
	 */
	public function setIndexWeights ($weights = array()){
		$this->conn->SetIndexWeights ($weights);
	}
	
	/**
	 * 设置地表距离锚点
	 *
	 * @param float $attrlat 经度
	 * @param float $attrlong 纬度
	 * @param float $lat $lat 和 $long是浮点值，指定了锚点的经度和纬度值，以角度为单位。
	 * @param float $long
	 */
	function SetGeoAnchor ( $attrlat, $attrlong, $lat, $long ) {
		$this->conn->SetGeoAnchor ( $attrlat, $attrlong, $lat, $long );
	}
	

}


?>