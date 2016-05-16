<?php
require_once('ly_check.php');
require_once("global.php");
include('./fckeditor/fckeditor.php') ;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>新闻编辑</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
</head>
<body>
<?php
	//删除文章源码，同时删除静态html
	if($_GET['edit'] == 'del'){
	$id=$_GET["id"];
	$sql="select * from newscontent where newsid=$id";
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
	$path=$rows["newspath"];
	$root=$_SERVER['DOCUMENT_ROOT'];
	$filepath=$root."/news/".$path;
	if(file_exists($filepath))
	{
		unlink($filepath);
	}
	$path=substr($path,0,10);
	$folderpath="$root/news/$path";
	$folder=opendir($folderpath);
	$n=0;
	while($f=readdir($folder))
	{
		if($f<>"."&&$f<>"..")
		{
			$n++;
		}
	}
	closedir();
	if($n==0)
	{
		rmdir($folderpath);
	}
	$sql="delete from newscontent where newsid=$id";
	
	if(mysql_query($sql)){ 
		echo "<script language=javascript>alert('删除成功！');window.location='news_list.php'</script>";
		 }else{
		echo "<script language=javascript>alert('操作错误！');window.location='news_list.php'</script>";
		}
	}
?>

<?php
	$id=$_GET["id"];
	if($_POST["Submit"])
	{
		$newsid=$_POST["newsid"];
		$title=$_POST["title"];
		$keywords=$_POST["keywords"];
		$description=$_POST["description"];
		$typeid=$_POST["typ"];
		$imagepath= Upload("images","/imagepass/images/",array(".gif",".jpg",".jpeg",".png"),51200);
		$is_hot=$_POST["is_hot"];
		$is_top=$_POST["is_top"];
		$sql="select * from newstype where newstypeid=$typeid";
		$rs=mysql_query($sql);
		$rows=mysql_fetch_assoc($rs);
		$type=$rows["newstype"];
		$content=$_POST["d_content"];
		$source=$_POST["source"];
		$path=$_POST["path"];
		$time=$_POST["time"];
		$root=$_SERVER['DOCUMENT_ROOT'];
		$filepath="$root/news/$path";
		if(file_exists($filepath))
		{
			$moban="$root/moban/moban.html";
			$fp=fopen($moban,"r");
			$str=fread($fp,filesize($moban));
			fclose($fp);
			$str=str_replace("{-type-}",$type,$str);
			$str=str_replace("-newsid-",$newsid,$str);
			$str=str_replace("-title-",$title,$str);
			$str=str_replace("-keywords-",$keywords,$str);
			$str=str_replace("-description-",$description,$str);
			$str=str_replace("-time-",$time,$str);
			$str=str_replace("-content-",$content,$str);
			$str=str_replace("-source-",$source,$str);
			$fp=fopen($filepath,"w");
			fwrite($fp,$str);
			fclose($fp);
		}
		if($imagepath=="")
		{
			$sql="update newscontent set newstypeid=$typeid,newstitle='$title',keywords='$keywords',description='$description',is_hot='$is_hot',is_top='$is_top',content='$content',newssource='$source' where newsid=$id";
		}
		else
		{
			$sql="update newscontent set newstypeid=$typeid,newstitle='$title',keywords='$keywords',description='$description',is_hot='$is_hot',is_top='$is_top',newspic='$imagepath',content='$content',newssource='$source' where newsid=$id";
		}
		if(mysql_query($sql))
		{
		echo "<script language=javascript>alert('修改成功！');window.location='news_list.php'</script>";
		?>
		<?php
		}
		else
		{
		echo "<script language=javascript>alert('修改失败！');window.location='news_list.php'</script>";
		?>
		<?php
		}
		die();
	}
	$sql="select * from newscontent where newsid=$id";
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
?>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" align="center" cellspacing="1" class="table" style="border-collapse:collapse">
    <tr>
      <th height="25" colspan="2" align="left" class="bg_tr">&nbsp;新闻修改</th>
    </tr>
    <tr>
      <td width="31%" height="25" align="right" class="td_bg">新闻标题：</td>
      <td width="69%" align="left" class="td_bg"><label>
        <input name="title" type="text" id="title" value="<?php echo $rows["newstitle"]?>" size="45" />
      </label></td>
    </tr>

    <tr>
      <td height="18" align="right" bgcolor="#EAEAF3" class="td_bg">单页关键词：</td>
      <td align="left" bgcolor="#EAEAF3" class="td_bg"><font color="#000099">
        <input name="keywords" type="text" id="keywords" value="<?php echo $rows["keywords"];?>" size="50">
        </font><span class="forumRowHighlight">关键词用英文逗号分隔</span></td>
    </tr>
    <tr>
      <td height="18" align="right" bgcolor="#EAEAF3" class="td_bg">单页描述：</td>
      <td align="left" bgcolor="#EAEAF3" class="td_bg"><font color="#000099">
        <input name="description" type="text" id="description" value="<?php echo $rows["description"];?>" size="50">
        </font><span class="forumRowHighlight">简短的新闻描述，有助于SEO优化</span></td>
    </tr>
    
    <tr>
      <td height="25" align="right" class="td_bg">新闻类别：</td>
      <td align="left" class="td_bg"><label>
	  <?php
	  	$sql="select * from newstype";
		$rs=mysql_query($sql);
	  ?>
        <select name="typ" id="typ">
		<?php
			while($rows1=mysql_fetch_assoc($rs))
			{
				if($rows["newstypeid"]==$rows1["newstypeid"])
				{
				?>
				<option value="<?php echo $rows1["newstypeid"]?>" selected="selected"><?php echo $rows1["newstype"]?></option>
				<?php
				}
				else
				{
				?>
				<option value="<?php echo $rows1["newstypeid"]?>"><?php echo $rows1["newstype"]?></option>
				<?php
				}
			}
		?>
        </select>
      </label></td>
    </tr>
    <tr bordercolor="#000000" bgcolor="#cccccc">
      <td align="right" bgcolor="#cccccc" class="td_bg">新闻图片：</td>
      <td bgcolor="#cccccc" class="td_bg"><input name="newspic" type="file" class="button" onChange="getimg()" />
          <label id="tupian"></label></td>
    </tr>
    <tr>
      <td height="25" align="right" class="td_bg">新闻选项：</td>
      <td align="left" class="td_bg"><input name="is_hot" type="checkbox" id="is_hot" value="1" <?php if($rows["is_hot"]){echo "checked='checked'";}?>/>
          <label for="is_hot"> 幻灯片 </label>
          <input name="is_top" type="checkbox" id="is_top" value="1" <?php if($rows["is_top"]){echo "checked='checked'";}?>/>
          <label for="is_top"> 置顶 </label></td>
    </tr>
    
    <tr>
      <td height="25" align="right" class="td_bg">新闻来源：</td>
      <td align="left" class="td_bg"><label>
        <input name="source" type="text" id="source" value="<?php echo $rows["newssource"]?>"/>
      </label></td>
    </tr>
    <tr>
      <td align="right" class="td_bg">新闻内容：</td>
      <td align="left" class="td_bg"><?php
	  	$path=$rows["newspath"];
		$root=$_SERVER['DOCUMENT_ROOT'];
		$filepath="$root/newslist/$path";
		if(file_exists($filepath))
		{
			$fp=fopen($filepath,"r");
			$str=fread($fp,filesize($filepath));
			$content=split("<label></label>",$str);
		}
	  ?>
	  <input type="hidden" name="path" value="<?php echo $path?>" />
	  <input type="hidden" name="time" value="<?php echo $rows["newstime"]?>" />
	  <input type="hidden" name="newsid" value="<?php echo $rows["newsid"]?>" />
	  <?php
	$sBasePath = $_SERVER['PHP_SELF'] ;
	$sBasePath = dirname($sBasePath).'/fckeditor/';
	$aFCKeditor = new FCKeditor('d_content') ;
	$aFCKeditor->Width="100%";                   //设置它的宽度 
	$aFCKeditor->Height="500px";                 //设置它的高度 
	$aFCKeditor->BasePath=$sBasePath;
	$aFCKeditor->Value=$rows[content];
	$aFCKeditor->Create();
	?></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="td_bg"><label>
        <input type="submit" name="Submit" value="修改" />
        <input type="reset" name="Submit2" value="重置" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
