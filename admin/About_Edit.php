<?php
require_once('ly_check.php');
include('./fckeditor/fckeditor.php');
require_once("global.php");
?>

<?php
	$id=$_GET["id"];
	if($_POST["Submit"])
	{
		$content=$_POST["content"];
		$title=$_POST["title"];
		$keywords=$_POST["keywords"];
		$description=$_POST["description"];
		$sql="update ly_about set title='$title',keywords='$keywords',description='$description',content='$content' where id=".$id;
		mysql_query($sql);
		echo "<script language=javascript>alert('�޸ĳɹ���');window.location='About_List.php'</script>";
		exit();
		}
		?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��ҳ�༭</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
</head>
<body>
<form name="form1" method="post" action="" id="Form1" onSubmit="return checkform()">
<?php
$sql="select * from ly_about where id=$id";
$rs=mysql_query($sql);
$rows=mysql_fetch_assoc($rs);
?>
  <table cellpadding="5" cellspacing="1" border="0" width="100%" class="table" align=center>
    <tr>
      <th height=30 colspan=6 valign="middle" class="bg_tr">�޸ĵ�ҳ</th>
    </tr>
    
    <tr>
      <td width="7%" height="18" align="center" bgcolor="#EAEAF3" class="td_bg">��ҳ���⣺</td>
      <td width="93%" align="left" bgcolor="#EAEAF3" class="td_bg"><font color="#000099">
        <input name="title" type="text" value="<?php echo $rows["title"];?>">
      </font></td>
    </tr>
    <tr>
      <td height="18" align="center" bgcolor="#EAEAF3" class="td_bg">��ҳ�ؼ��ʣ�</td>
      <td align="left" bgcolor="#EAEAF3" class="td_bg"><font color="#000099">
        <input name="keywords" type="text" id="keywords" value="<?php echo $rows["keywords"];?>" size="50">
        <span class="forumRowHighlight">����ؼ�����Ӣ�Ķ��ŷָ�</span></font></td>
    </tr>
    <tr>
      <td height="18" align="center" bgcolor="#EAEAF3" class="td_bg">��ҳ������</td>
      <td align="left" bgcolor="#EAEAF3" class="td_bg"><font color="#000099">
        <input name="description" type="text" id="description" value="<?php echo $rows["description"];?>" size="50">
        <span class="forumRowHighlight">��������</span></font></td>
    </tr>
    <tr>
      <td height="18" align="center" bgcolor="#EAEAF3" class="td_bg">��ҳ���ݣ�</td>
      <td align="left" bgcolor="#EAEAF3" class="td_bg"><?php
	$sBasePath = $_SERVER['PHP_SELF'] ;
	$sBasePath = dirname($sBasePath).'/fckeditor/';
	$aFCKeditor = new FCKeditor('content') ;
	$aFCKeditor->Width="750px";                   //�������Ŀ�� 
	$aFCKeditor->Height="500px";                 //�������ĸ߶� 
	$aFCKeditor->BasePath=$sBasePath;
	$aFCKeditor->Value=$rows[content];
	$aFCKeditor->Create();
	?>      </td>
    </tr>
    <tr>
      <td height="20" colspan="2" class="td_bg"> <div align="center"></div>        <div align="center">
          <input class="button" type="submit" name="Submit" value="�� ��" id="Submit1">
        &nbsp;&nbsp;
        <input class="button" type="reset" name="Submit2" value="�� ��" id="Reset1">
              </div></td>
    </tr>
  </table>
</form>
</body>
</html>