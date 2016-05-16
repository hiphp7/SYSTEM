<?php
require_once('ly_check.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<title>新闻列表</title>
<link href="images/css.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
	$pagesize=10;
	$sql="select * from newscontent";
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
	$sql="select * from newscontent order by newsid desc limit $startno,$pagesize";
	$rs=mysql_query($sql);
?>

<FORM name=form method=post>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
  <tbody>
    <tr>
<th height="27" colspan="5" align="left" class="bg_tr">后台>>新闻管理</th>
    </tr>

    <tr align="center">
         <td class="td_bg" width="3%">新闻编号</td>
         <td class="td_bg" width="28%" height="26">新闻标题</td>
         <td class="td_bg" width="12%" height="26">日期</td>
		 <td width="5%" class="td_bg">修改</td>
	     <td width="5%" class="td_bg">删除</td>
      </tr>
<?php
	while($rows=mysql_fetch_assoc($rs))
	{
	?>
<tr align="center">
<td class="td_bg" width="3%"><?php echo $rows["newsid"]?></td>
<td class="td_bg" width="28%" height="26"><?php echo $rows["newstitle"]?></td>
<td class="td_bg" width="12%" height="26"><?php echo substr($rows["newstime"],0,10)?></td>
<td class="td_bg" width="5%">
<a href="news_edit.php?id=<?php echo $rows[newsid] ?>"><img src="images/edit.gif" width="10" height="10" border="0" /></a></td>
<td class="td_bg" width="5%"><a href="news_edit.php?edit=del&id=<?php echo $rows[newsid] ?>"><img src="images/del.gif" width="10" height="10" border="0" /></a></td>
</tr>
	<?php
	}
?>
  <tr>
      <th height="25" colspan="5" align="left" class="bg_tr">
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
	&nbsp;页次：<?php echo $pageno ?>/<?php echo $pagecount ?>页&nbsp;共有<?php echo $recordcount?>条信息 </th>
	  </tr>
</tbody>
</table>
</FORM>
</body>
</html>
