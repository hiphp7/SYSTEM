<?php require_once('ly_check.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>静态分段生成</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
</head>
<body>
<?php
if($_POST[button]){
$start = $_POST[start];
$ends = $_POST[ends];
$sql="select * from newscontent limit $start,$ends";
$rs=mysql_query($sql);
while($row=mysql_fetch_assoc($rs))
{
//提取分类列表
$type=mysql_fetch_assoc(mysql_query($sql="select * from newstype where newstypeid=".$row["newstypeid"]));
//分类列表提取完毕
//echo "文件夹：".substr($row[newspath],0,10)."&nbsp;&nbsp;&nbsp;"."静态页路径：".substr($row[newspath],11,8)."<br>";
$path=substr($row[newspath],11,8).'.html';
$fp=fopen("../moban/moban.html","r");
$str=fread($fp,filesize("../moban/moban.html"));
$str=str_replace("-newsid-",$row[newsid],$str);
$str=str_replace("{-type-}",$type[newstype],$str);
$str=str_replace("-title-",$row[newstitle],$str);
$str=str_replace("-keywords-",$row[keywords],$str);
$str=str_replace("-description-",$row[description],$str);
$str=str_replace("-time-",$row[newstime],$str);
$str=str_replace("-source-",$row[newssource],$str);
$str=str_replace("-content-",$row[content],$str);
fclose($fp);

$handle=fopen("../news/".substr($row[newspath],0,10)."/".$path,"w"); 
fwrite($handle,$str);
echo "<font color='red'>正在生成</font><br>";
echo "$path";
fclose($handle);
}
echo "<script>alert('生成成功！');window.location.href='fd_html.php';</script>";
}
?>
<form id="form" name="form" method="post" action="">
  <label><div style="margin:200px 200px;">
  <input name="start" type="text" id="start"  value="0" size="10" /> 到 <input name="ends" type="text" id="ends" value="200" size="10" />
  <input type="submit" name="button" id="button" value="点击分段生成" />
  注：必须填写整数，否则不能正确生成，例如：第 10 到 第 20 条生成。 </div>
  </label>
</form>
</body>
</html>