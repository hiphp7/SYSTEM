<?php
require_once('ly_check.php');
include('./fckeditor/fckeditor.php');
require_once("global.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>单页列表</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
<?php
	$id=$_GET["id"];
	if($id=="")
	{
		$id=1;
	}
	$pagesize=10;
	$sql="select * from ly_about";
	$rs=mysql_query($sql);
	$recordcount=mysql_num_rows($rs);
	$pagecount=($recordcount-1)/$pagesize+1;
	$pagecount=(int)$pagecount;
	$pageno=$_GET["pageno"];
	if($pageno=="")
	{
		$pageno=1;
	}
	if($pageno<1)
	{
		$pageno=1;
	}
	if($pageno>$pagecount)
	{
		$pageno=$pagecount;
	}
	$startno=($pageno-1)*$pagesize;
	$sql="select * from ly_about order by id desc limit $startno,$pagesize";
	$rs=mysql_query($sql);
?>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" bordercolor="#000000" bgcolor="#cccccc" class="table">
<tr>
	<th align="center" bgcolor="#FFFFFF" class="bg_tr">单页编号</th>
	<th align="center" bgcolor="#FFFFFF" class="bg_tr">单页标题</th>
	<th align="center" bgcolor="#FFFFFF" class="bg_tr">修改</th>
	<th align="center" bgcolor="#FFFFFF" class="bg_tr">删除</th>
</tr>
<?php
	while($rows=mysql_fetch_assoc($rs))
	{
	?>
	<tr>
		<td align="center" bgcolor="#FFFFFF" class="forumRowHighlight"><?php echo $rows["id"]?></td>
		<td align="center" bgcolor="#FFFFFF" class="forumRowHighlight"><?php echo $rows["title"]?></td>
	  <td align="center" bgcolor="#FFFFFF" class="forumRowHighlight"><input type="button" class="button" onClick="location.href='About_Edit.php?id=<?php echo $rows["id"]?>'" value="修改" /></td>
	  <td align="center" bgcolor="#FFFFFF" class="forumRowHighlight"><input type="button" class="button" onClick="if(confirm('确定要删除吗?')){location.href='About_Del.php?id=<?php echo $rows["id"]?>" value="删除"/></td>
	</tr>
	<?php
	}
?>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bordercolor="#000000" class="bg_tr">
<tr>
<td height="35" align="right">
<?php
	if($pageno==1)
	{
	?>
	首页 | 上一页 | <a href="?pageno=<?php echo $pageno+1?>&id=<?php echo $id?>">下一页</a> | <a href="?pageno=<?php echo $pagecount?>&id=<?php echo $id?>">末页</a>
	<?php
	}
	else if($pageno==$pagecount)
	{
	?>
	<a href="?pageno=1&id=<?php echo $id?>">首页</a> | <a href="?pageno=<?php echo $pageno-1?>&id=<?php echo $id?>">上一页</a> | 下一页 | 末页
	<?php
	}
	else
	{
	?>
	<a href="?pageno=1&id=<?php echo $id?>">首页</a> | <a href="?pageno=<?php echo $pageno-1?>&id=<?php echo $id?>">上一页</a> | <a href="?pageno=<?php echo $pageno+1?>&id=<?php echo $id?>" class="forumRowHighlight">下一页</a> | <a href="?pageno=<?php echo $pagecount?>&id=<?php echo $id?>">末页</a>
	<?php
	}
?>
	&nbsp;页次：<?php echo $pageno ?>/<?php echo $pagecount ?>页&nbsp;共有<?php echo $recordcount?>条信息</td>
<td>
<form action="" method="get" style="margin:0px;">
转到：
<input type="text" name="pageno" size="3" value="<?php echo $pageno?>" />
<input type="hidden" name="id" value="<?php echo $id?>" />
<input type="submit" class="button" value="go" />
</form></td>
</tr>
</table>
</body>
</html>