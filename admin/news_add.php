<?php
require_once('ly_check.php');
include('./fckeditor/fckeditor.php');
require_once("global.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>新闻添加</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
<script language="javascript">
	//DOM树
	function checkform()
	{
		if(document.forms["frm"].elements["title"].value=="")
		{
			alert("新闻标题不能为空");
			document.forms["frm"].elements["title"].focus();
			return false;
		}
		
		if (eWebEditor1.getHTML()==""){
			alert("新闻内容不能为空！");
			return false;
		}
		if(document.forms["frm"].elements["source"].value=="")
		{
			alert("新闻来源不能为空");
			document.forms["frm"].elements["source"].focus();
			return false;
		}
		return true;
	}
	function getimg()
	{
	path=frm.newspic.value
	tupian.innerHTML="<img src='"+path+"' />"
	}
</script>
</head>
<body>
<?php
	if($_POST["Submit"])
	{
		$typeid=$_POST["typ"];
		$title=$_POST["title"];
		$keywords=$_POST["keywords"];
		$description=$_POST["description"];
		$source=$_POST["source"];
		$imagepath= Upload("newspic","/imagepass/images/",array(".gif",".jpg",".jpeg",".png"),51200);
		$is_hot=$_POST["is_hot"];
		$is_top=$_POST["is_top"];
		$time=date("Y-m-d H:i:s");
		$content=$_POST["d_content"];
		$root=$_SERVER['DOCUMENT_ROOT'];
		$foldername=date("Y-m-d");
		$folderpath=$root."/news/".$foldername;
		if(!file_exists($folderpath))
		{
			mkdir($folderpath);
		}
		$filename=date("H-i-s").".html";
		$filepath=$folderpath."/".$filename;
		if(!file_exists($filepath))
		{
			$sql="select * from newstype where newstypeid=$typeid";
			$rs=mysql_query($sql);
			$rows=mysql_fetch_assoc($rs);
			$type=$rows["newstype"];
			$mobanpath=$root."/moban/moban.html";
			$fp=fopen($mobanpath,"r");   
			$str=fread($fp,filesize($mobanpath));//读出模板
			fclose($fp);
			$str=str_replace("{-type-}",$type,$str);
			$str=str_replace("-title-",$title,$str);
			$str=str_replace("-keywords-",$keywords,$str);
			$str=str_replace("-description-",$description,$str);
			$str=str_replace("-time-",$time,$str);
			$str=str_replace("-content-",$content,$str);
			$str=str_replace("-source-",$source,$str);
			//把替换好的内容写入文件
			$fp=fopen($filepath,"w");
			fwrite($fp,$str);
			fclose($fp);
			$filepath=$foldername."/".$filename;
			$sql="insert into newscontent(newstypeid,newstitle,keywords,description,newspic,is_hot,is_top,content,newspath,newssource,newstime) values ($typeid,'$title','$keywords','$description','$imagepath','$is_hot','$is_top','$content','$filepath','$source','$time')";
			if(mysql_query($sql))
			{
			?>
			<script>if (confirm('添加成功！是否继续添加？\n\n·继续添加  ·返回查看')){window.location='news_add.php'}else {window.location='news_list.php'} </script>
			<?php
			}
			else
			{
			?>
			<script>if (confirm('添加失败！是否继续添加？\n\n·继续添加  ·返回查看')){window.location='news_add.php'}else {window.location='news_list.php'} </script>
			<?php
			}
		}
		exit();
	}
?>
<form id="frm" name="frm" method="post" action="" enctype="multipart/form-data" onsubmit="return checkform()">
  <table width="100%" border="0" align="center" cellspacing="1" class="table">
    <tr>
      <th height="25" colspan="2" align="left" class="bg_tr">&nbsp;添加新闻</th>
    </tr>
    <tr>
      <td width="355" height="25" align="right" class="td_bg">新闻标题：</td>
      <td width="919" align="left" class="td_bg"><label>
        <input name="title" type="text" id="title" size="45" />
      </label></td>
    </tr>
    <tr bordercolor="#000000" bgcolor="#cccccc">
      <td align="right" bgcolor="#FFFFFF" class="td_bg">新闻关键词：</td>
      <td bgcolor="#FFFFFF" class="forumRowHighlight"><input name="keywords" type="text" class="button" id="keywords" size="50" />
        关键词之间用英文逗号分隔 </td>
    </tr>
    <tr bordercolor="#000000" bgcolor="#cccccc">
      <td align="right" bgcolor="#FFFFFF" class="td_bg">新闻描述：</td>
      <td bgcolor="#FFFFFF" class="forumRowHighlight"><input name="description" type="text" class="button" id="description" size="50" />
        简短的新闻描述，有助于SEO优化</td>
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
			while($rows=mysql_fetch_assoc($rs))
			{
			?>
			<option value="<?php echo $rows["newstypeid"]?>"><?php echo $rows["newstype"]?></option>
			<?php
			}
		?>
        </select>
      </label></td>
    </tr>
    <tr bordercolor="#000000" bgcolor="#cccccc">
      <td align="right" bgcolor="#cccccc" class="td_bg">新闻图片：</td>
      <td bgcolor="#cccccc" class="td_bg"><input name="newspic" type="file" class="button" onchange="getimg()">
          <label id="tupian"></label></td>
    </tr>
    <tr>
      <td height="25" align="right" class="td_bg">新闻选项：</td>
      <td align="left" class="td_bg"><input name="is_hot" type="checkbox" id="is_hot" value="1"/>
        <label for="is_hot"> 幻灯片 </label>
        <input name="is_top" type="checkbox" id="is_top" value="1"/>
        <label for="is_top"> 置顶 </label></td>
    </tr>
    <tr>
      <td height="25" align="right" class="td_bg">新闻来源：</td>
      <td align="left" class="td_bg"><label>
        <input name="source" type="text" id="source" value="夏日博客" />
      </label></td>
    </tr>
    <tr>
      <td align="right" class="td_bg">新闻内容：</td>
      <td align="left" class="td_bg">
	  <?php
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = dirname($sBasePath).'/fckeditor/';
$aFCKeditor = new FCKeditor('d_content') ;
$aFCKeditor->Width="750px";                   //设置它的宽度 
$aFCKeditor->Height="500px";                 //设置它的高度 
$aFCKeditor->BasePath=$sBasePath;
$aFCKeditor->Create();
?></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="td_bg"></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="td_bg"><label>
      <input type="submit" name="Submit" value="提交" />
      </label>
        <label>
        <input type="reset" name="Submit2" value="重置" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
