<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>活动详情</title>
<link href="/static/css/style.css" rel="stylesheet" type="text/css" />
<!-- <link href="/static/css/css.css" type="text/css" rel="stylesheet" /> -->
<script src="/static/js/jquery.js" type="text/javascript"></script>
<style>
/*.image-wrapper {
  width: 1200px;
  height: 700px;
}*/
.center {
  margin-left: 400px;
}

.normal_img{
  float:left;
  width:60px;
  height:700px;
}
body{
  width: 2020px;
  min-height: 5000px;;
}

img.gray {      
-webkit-filter: grayscale(100%);     
-moz-filter: grayscale(100%);    
-ms-filter: grayscale(100%);     
-o-filter: grayscale(100%);          
filter: grayscale(100%);       
filter: gray;
}

</style>
</head>
<body>
  <div class="image-wrapper">
    <div class="normal_img">
      <img src="/static/images/cross_year/14_1.png" {if !isset($count['-1']) || $count['-1'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -100px">
       <img src="/static/images/cross_year/13.png"  {if !isset($count['0']) || $count['0'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -46px">
        <img src="/static/images/cross_year/12.png" {if !isset($count['1']) || $count['1'] ==  0} class="gray"{/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -16px">
      <img src="/static/images/cross_year/11.png" {if !isset($count['2']) || $count['2'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -12px">
      <img src="/static/images/cross_year/10.png" {if !isset($count['3']) || $count['3'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -15px">
      <img src="/static/images/cross_year/9.png" {if !isset($count['4']) || $count['4'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -22px">
      <img src="/static/images/cross_year/8.png" {if !isset($count['5']) || $count['5'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -17px">
      <img src="/static/images/cross_year/7.png" {if !isset($count['6']) || $count['6'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: 0px">
      <img src="/static/images/cross_year/6.png" {if !isset($count['7']) || $count['7'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -55px">
      <img src="/static/images/cross_year/5.png" {if !isset($count['8']) || $count['8'] ==  0} class="gray" {/if} alt="">                                                              
    </div>
    <div class="normal_img" style="margin-left: 43px">
      <img src="/static/images/cross_year/4.png" {if !isset($count['9']) || $count['9'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -4px">
      <img src="/static/images/cross_year/3.png" {if !isset($count['10']) || $count['10'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -7px">
      <img src="/static/images/cross_year/2.png" {if !isset($count['11']) || $count['11'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -22px">
      <img src="/static/images/cross_year/1.png" {if !isset($count['12']) || $count['12'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -36px">
      <img src="/static/images/cross_year/24.png" {if !isset($count['-11']) || $count['-11'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -26px">
      <img src="/static/images/cross_year/23.png" {if !isset($count['-10']) || $count['-10'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -2px">
      <img src="/static/images/cross_year/22.png" {if !isset($count['-9']) || $count['-9'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: 6px">
      <img src="/static/images/cross_year/21.png"  {if !isset($count['-8']) || $count['-8'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -27px">
      <img src="/static/images/cross_year/20.png" {if !isset($count['-7']) || $count['-7'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -1px">
      <img src="/static/images/cross_year/19.png" {if !isset($count['-6']) || $count['-6'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -6px">
      <img src="/static/images/cross_year/18.png" {if !isset($count['-5']) || $count['-5'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -11px">
      <img src="/static/images/cross_year/17.png" {if !isset($count['-4']) || $count['-4'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -28px">
      <img src="/static/images/cross_year/16.png" {if !isset($count['-3']) || $count['-3'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: -4px" >
      <img src="/static/images/cross_year/15.png" {if !isset($count['-2']) || $count['-2'] ==  0} class="gray" {/if} alt="">
    </div>

    <div class="normal_img" style="margin-left: 34px">
      <img src="/static/images/cross_year/14_2.png" {if !isset($count['-1']) || $count['-1'] ==  0} class="gray" {/if} alt="">
    </div>
  </div>
  <div style="clear:both"></div>
  <br>
  <div class="commit_field center">
    <form action="/admin/applyYearRun" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        <input type="file" name="file" value="" placeholder="">  
        <select name="timezone" value="请选择" >
          <option value="null">请选择</option>
          <option value="-1">西1区</option>
          <option value="0">0时区</option>
          <option value="1">东1区</option>
          <option value="2">东2区</option>
          <option value="3">东3区</option>
          <option value="4">东4区</option>
          <option value="5">东5区</option>
          <option value="6">东6区</option>
          <option value="7">东7区</option>
          <option value="8">东8区</option>
          <option value="9">东9区</option>
          <option value="10">东10区</option>
          <option value="11">东11区</option>
          <option value="12">东(西)12区</option>
          <option value="-11">西11区</option>
          <option value="-10">西10区</option>
          <option value="-9">西9区</option>
          <option value="-8">西8区</option>
          <option value="-7">西7区</option>
          <option value="-6">西6区</option>
          <option value="-5">西5区</option>
          <option value="-4">西4区</option>
          <option value="-3">西3区</option>
          <option value="-2">西2区</option>          
        </select>
          <input type="submit" value="参加跨年跑" style="width:150px;height:30px;cursor:pointer;background-color: #DCDCDC">
    </form>
  </div>
  <br>
  <span>当前报名情况</span>
  <br>
  <br>
  <table>
    <tbody>
      {foreach from=$applyInfo item=item key=key}
        <tr>
              <td><b>{$key}&nbsp&nbsp&nbsp&nbsp&nbsp</b></td> 
              <td>{$item}</td>
        </tr>
      {/foreach}
    </tbody>
  </table>

<script type="text/javascript">

{literal}

{/literal}
</script>
</body>
</html>