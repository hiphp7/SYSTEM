<?php require_once('ly_check.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��ҳ����</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
</head>
<body>
<?php
if($_POST[button]){
$sql="select * from ly_about";
$rs=mysql_query($sql);
while($row=mysql_fetch_assoc($rs))
{
//���ɵ�ҳ
$path=substr($row[id],0,8).'.html';
$fp=fopen("../moban/about.html","r");
$str=fread($fp,filesize("../moban/about.html"));
$str=str_replace("{-CMSURL-}",CMS_URL,$str);
$str=str_replace("-title-",$row[title],$str);
$str=str_replace("-keywords-",$row[keywords],$str);
$str=str_replace("-description-",$row[description],$str);
$str=str_replace("-content-",$row[content],$str);
fclose($fp);

$handle=fopen("../group/".$path,"w"); 
fwrite($handle,$str);
echo "<font color='red'>��������</font><br>";
echo "$path";
fclose($handle);
}
echo "<script>alert('���ɳɹ���');window.location.href='otherhtml.php';</script>";
}
?>
<form id="form1" name="form1" method="post" action="">
  <label><div style="margin:200px 200px;">
    <input type="submit" name="button" id="button" value="������ɵ�ҳ" />
  </div>
  </label>
</form>
</body>
</html>