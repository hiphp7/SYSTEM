<?php require_once('ly_check.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���ŷ������</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
<?php if($_GET['tj'] == 'add'){?>
<script language="javascript">
	function checkform()
	{
		if(frm.newstype.value=="")
		{
			alert("���಻��Ϊ��")
			frm.newstype.focus();
			return false;
		}
	}
</script>
<?php
	if($_POST["submit"])
	{
		$newstype=$_POST["newstype"];
		$sql="insert into newstype (newstype) values ('$newstype')";
		if(mysql_query($sql))
		{
		echo "<script language=javascript>alert('��ӳɹ���');window.location='newsclass.php'</script>";
		?>
		<?php
		}
		else
			{
			echo "<script language=javascript>alert('���ʧ�ܣ�');window.location='newsclass.php'</script>";
			?>
			<?php
			}
			?>
			<?php
			exit();}
?>
<form name="frm" action="" method="post" onsubmit="return checkform()">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" bgcolor="#cccccc">
	<tr>
		<th colspan="2" bgcolor="#FFFFFF">������</th>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF" class="forumRowHighlight">���</td>
		<td bgcolor="#FFFFFF" class="forumRowHighlight"><input name="newstype" type="text" id="newstype" /></td>
	</tr>
	<tr>
		<td colspan="2" align="center" bgcolor="#FFFFFF" class="forumRowHighlight">
			<input name="submit" type="submit" class="button" value="���" />
	  &nbsp;
	  <input type="reset" class="button" value="ȡ��" />	  </td>
	</tr>
</table>
</form>
<?php } ?>
<?php if($_GET['tj'] == 'edit'){ ?>
<script language="javascript">
	function checkform()
	{
		if(frm.newstype.value=="")
		{
			alert("���಻��Ϊ��")
			frm.newstype.focus();
			return false;
		}
	}
</script>
<?php
	$id=$_GET["id"];
	if($_POST["submit"])
	{
		$newstype=$_POST["newstype"];
		$sql="update newstype set newstype='$newstype' where newstypeid=$newstypeid";
		mysql_query($sql);
		echo "<script language=javascript>alert('�޸ĳɹ���');window.location='newsclass.php'</script>";
		?>
		<?php
		exit();
	}
	$sql="select * from newstype where newstypeid=$newstypeid";
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
?>
<form name="frm" action="" method="post" onsubmit="return checkform()">
<table width="500" border="0" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" bgcolor="#cccccc">
<tr>
	<td bgcolor="#FFFFFF">���</td>
	<td bgcolor="#FFFFFF"><input name="newstype" type="text" id="newstype" value="<?php echo $rows["newstype"]?>" /></td>
</tr>
<tr>
	<td colspan="2" align="center" bgcolor="#FFFFFF" class="forumRowHighlight">
		<input name="submit" type="submit" class="button" value="�޸�" />
	  &nbsp;
	  <input type="reset" class="button" value="����" />	</td>
</tr>
</table>
</form>
<?php } ?>
<?php
	if($_GET['tj'] == 'del'){
	$newstypeid=$_GET["newstypeid"];
	$sql="delete from newstype where newstypeid=$newstypeid";
	mysql_query($sql);
	echo "<script language=javascript>alert('ɾ���ɹ���');window.location='newsclass.php'</script>";
	}
?>
<link href="images/css.css" rel="stylesheet" type="text/css" />
<table width="100%"  align="center" cellpadding="5" cellspacing="0" class="bg_tr">
<tr>
	<td><a href="?tj=add" class="button">&nbsp;��ӷ���</a></td>
</tr>
</table>
<table width="780" border="0" align="center" cellspacing="1" bordercolor="#000000" bgcolor="#cccccc">
<tr>
</tr>
</table>
<?php
	$rs=mysql_query("select * from newstype")
?>
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" class="table">
<tr>
	<th width="13%" align="center" bgcolor="#FFFFFF" class="td_bgf">���</th>
	<th width="61%" align="center" bgcolor="#FFFFFF" class="td_bgf">���</th>
	<th width="9%" align="center" bgcolor="#FFFFFF" class="td_bgf">�޸�</th>
	<th width="17%" align="center" bgcolor="#FFFFFF" class="td_bgf">ɾ��</th>
  </tr>
<?php
	while($rows=mysql_fetch_assoc($rs))
	{
	?>
	<tr>
		<td align="center" bgcolor="#FFFFFF" class="forumRowHighlight"><?php echo $rows["newstypeid"]?></td>
		<td align="center" bgcolor="#FFFFFF" class="forumRowHighlight"><?php echo $rows["newstype"]?></td>
	  <td align="center" bgcolor="#FFFFFF" class="forumRowHighlight"><a href="?tj=edit&newstypeid=<?php echo $rows["newstypeid"]?>"><img src="images/edit.gif" width="10" height="10" border="0" /></a></td>
	  <td align="center" bgcolor="#FFFFFF" class="forumRowHighlight"><a href="?tj=del&newstypeid=<?php echo $rows["newstypeid"]?>"><img src="images/del.gif" width="10" height="10" border="0" /></a>
	 </td></tr>
	<?php
	}
?>
</table>
</body>
</html>