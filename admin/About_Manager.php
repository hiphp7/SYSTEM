<?php
require_once('ly_check.php');
include('./fckeditor/fckeditor.php');
require_once("global.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>单页添加</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
<script language="javascript">
	function checkform()
	{
	
	if(frm.title.value=="")
		{
			alert("标题不能为空")
			frm.title.focus()
			return false;
		}
		return true;
		if(frm.content.value=="")
		{
			alert("内容不能为空")
			frm.content.focus();
			return false;
		}
		
	}
</script>
</head>
<body>
<?php
	if($_POST["submit"])
	{
		$content=$_POST["content"];
		$title=$_POST["title"];
		$keywords=$_POST["keywords"];
		$description=$_POST["description"];
		$sql="insert into ly_about (title,content,keywords,description) values ('$title','$content','$keywords','$description')";
		if(mysql_query($sql))
		{
		echo "<script language=javascript>alert('添加成功！');window.location='About_List.php'</script>";
		exit();
		?>
		
		<?php
		}
		else
			{
			echo "<script language=javascript>alert('操作错误！');window.location='About_List.php'</script>";
			exit();
			?>
			
			<?php
			}
			?>
			<div align="center"><a href="list.php">返回</a></div>
			<?php
			exit();
	}
?>
<form name="frm" action="" method="post" onSubmit="return checkform()">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" bgcolor="#cccccc" class="table">
	<tr>
		<th colspan="2" bgcolor="#FFFFFF" class="bg_tr">添加信息</th>
	</tr>
	<tr>
      <td bgcolor="#FFFFFF" class="forumRowHighlight">单页标题</td>
	  <td bgcolor="#FFFFFF" class="forumRowHighlight"><input name="title" type="text" class="button" /></td>
    </tr>
	<tr>
	  <td bgcolor="#FFFFFF" class="forumRowHighlight">单页关键词</td>
	  <td bgcolor="#FFFFFF" class="forumRowHighlight"><input name="keywords" type="text" class="button" id="keywords" size="50" /> 
	    多个关键词用英文逗号分隔 </td>
    </tr>
	<tr>
	  <td bgcolor="#FFFFFF" class="forumRowHighlight">单页描述</td>
	  <td bgcolor="#FFFFFF" class="forumRowHighlight"><input name="description" type="text" class="button" id="description" size="50" />
	    文章描述</td>
    </tr>
	<tr>
		<td bgcolor="#FFFFFF" class="forumRowHighlight">单页内容</td>
	  <td bgcolor="#FFFFFF" class="forumRowHighlight">
	  
	  <?php
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = dirname($sBasePath).'/fckeditor/';
$aFCKeditor = new FCKeditor('content') ;
$aFCKeditor->Width="750px";                   //设置它的宽度 
$aFCKeditor->Height="500px";                 //设置它的高度 
$aFCKeditor->BasePath=$sBasePath;
$aFCKeditor->Create();
?></td>
	</tr>
	
	<tr>
		<td colspan="2" align="center" bgcolor="#FFFFFF" class="forumRowHighlight">
			<input name="submit" type="submit" class="button" value="添加" />
	  &nbsp;
	  <input type="reset" class="button" value="取消" />	  </td>
	</tr>
</table>
</form>
</body>
</html>
