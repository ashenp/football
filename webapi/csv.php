<?php
/**
 * 对CSV操作
 *
 * @author miboxiang
 */
class WebApi_Csv extends WebApi {

    static public $instance__;

    static public function &instance (){
        if (!isset(self::$instance__)) {
            $class = __CLASS__;
            self::$instance__ = new $class;
        }
        return self::$instance__;
    }

    /**
     * 生产csv文件
     *
     */
    public function putCsv($head, $info, $fileName = '') {
        if(!is_array($head) || !is_array($info)) {
            return FALSE;
        }

        ini_set('output_buffering','On');
        ini_set('set_time_limit', 0);
        //如果没有传入文件名，自动生产
        if(empty($fileName)) {
            $fileName   = md5(strtotime(date('Y-m-d')).rand(1000000,9999999));
        } else {
            $name  = mb_detect_encoding($fileName,array('UTF-8','ASCII','GB2312','GBK','BIG5'));
            if($name != 'GBK') {
                $names = mb_convert_encoding($fileName,'GBK',$name);
            }else {
                $names = $fileName;
            }
            $fileName = $names;
        }
        
        //var_dump($info);exit;

        //输出heaher头
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$fileName.'.csv"');
        header('Cache-Control: max-age=0');
        //文件句柄
        //直接输出文件流，生成数据发送给浏览器
        //不在服务器中生产文件
        
        ob_clean();//清楚缓存区
        
        $fp = fopen('php://output', 'a');
		
		if(!empty($head)) {
			//内容头，例如select中的字段名一样
			foreach ($head as $i => $v) {
				//必须转成gbk，否则乱码
				$code = mb_detect_encoding($v,array('UTF-8','ASCII','GB2312','GBK','BIG5'));
				if($code != 'GBK') {
					$head[$i] = mb_convert_encoding($v,'GBK',$code);
				}else {
					$head[$i] = $v;
				}

			}
		}
        
        //先将内容头输出
        fputcsv($fp, $head);
		
		if(!empty($info)) {
			//防止数据过多出现错误，每$limit行刷新一下
			$cnt = 0;
			$limit = 1000;
			$row = array();

			foreach($info as $vaule) {
				$cnt ++;
				if ($limit == $cnt) {
					ob_flush();
					flush();
					$cnt = 0;
				}

				foreach ($vaule as $i => $v) {
					$code = mb_detect_encoding($v,array('UTF-8','ASCII','GB2312','GBK','BIG5'));
					if($code != 'GBK') {
						$row[$i] = mb_convert_encoding($v,'GBK',$code);
					}else {
						$row[$i] = $v;
					}
				}
				fputcsv($fp, $row);
			}
		}

        return TRUE;
    }

    /**
     * 读取CSV文件中内容
     *
     * @param $file
     * @param $keyArr
     * @return array
     */
    public function getCsv($file, $keyArr){
        setlocale(LC_ALL,'null');
        $fileArr = explode('.', $file['name']);
        if($fileArr[1] != 'csv') {
            echo '导入格式必须时CSV文件';
            exit;
        }

        $handle = fopen($file['tmp_name'],"r");

        $info = array();
        $row  = 0;
        while ($data = fgetcsv($handle,10000,',')){
            foreach($data as $k => $v) {

//                $encode = mb_detect_encoding($v, array('ASCII','UTF-8','GB2312','GBK','BIG5'));
//                pr($encode);
                $keyName = $keyArr[$k];
                $info[$row][$keyName] = mb_convert_encoding($v, "UTF-8", "GBK");
//                $v = iconv('GBK', 'GB18030', $v);
//                pr($v);
//                $info[$row][$keyName] = iconv('GB18030', 'UTF-8', $v);
//                $encode = mb_detect_encoding($v, array('ASCII','UTF-8','GB2312','GBK','BIG5'));
//                $res = mb_convert_encoding($v,'UTF-8','EUC-CN');
//                print_r($res);exit;
            }
            $row ++;
        }

        fclose($handle);

        return $info;
    }
	
	/**
     * 生产csv文件,保存到本地
     *
     */
    public function putCsvFile($head, $info, $filePath = '', $fileExistsDel = false) {
        if(empty($head) || !is_array($head)) {
            return FALSE;
        }

        //如果没有传入文件名，自动生产
        if(empty($filePath)) {
            $filePath   =  WWW_ROOT.'/tmp_file/'.md5(strtotime(date('Y-m-d')).rand(1000000,9999999)).'.csv';
        } else {
			$pathInfo = pathinfo($filePath);
            is_dir($pathInfo['dirname']) || mkdir($pathInfo['dirname'], 0775, true);

			if($pathInfo['filename'] == '') {
				$filePath =  $pathInfo['dirname'].'/'.md5(strtotime(date('Y-m-d')).rand(1000000,9999999)).'.csv';
			}
			
			if($pathInfo['extension'] != 'csv') {
				$filePath = $pathInfo['dirname'].'/'.$pathInfo['filename'].'.csv';
			}
			
            $code  = mb_detect_encoding($filePath,array('UTF-8','ASCII','GB2312','GBK','BIG5'));
            if($code != 'GBK') {
                $filePath = mb_convert_encoding($filePath,'GBK',$code);
            }
        }
        
		if(file_exists($filePath) && $fileExistsDel) {
			$unlinkResult = unlink($filePath);
			if(!$unlinkResult) {
				return false;
			}
		}
        
        $fp = fopen($filePath, 'a');
		if($fp == false) {
			return false;
		}
		
        //内容头，例如select中的字段名一样
        foreach ($head as $i => $v) {
            //必须转成gbk，否则乱码
			$code = mb_detect_encoding($v,array('UTF-8','ASCII','GB2312','GBK','BIG5'));
			if($code != 'GBK') {
				$head[$i] = mb_convert_encoding($v,'GBK',$code);
			}else {
				$head[$i] = $v;
			}
            
        }
        //先将内容头输出
        $fputResult = fputcsv($fp, $head);
		if($fputResult == false) {
			@unlink($filePath);
			return false;
		}
		
		if(!empty($info)) {
			foreach($info as $vaule) {
				foreach ($vaule as $i => $v) {
					$code = mb_detect_encoding($v,array('UTF-8','ASCII','GB2312','GBK','BIG5'));
					if($code != 'GBK') {
						$row[$i] = mb_convert_encoding($v,'GBK',$code);
					}else {
						$row[$i] = $v;
					}
				}

				$fputResult = fputcsv($fp, $row);
				if($fputResult == false) {
					@unlink($filePath);
					return false;
				}
			}
		}
        

        return TRUE;
    }

}

?>

