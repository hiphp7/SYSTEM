<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>夏日文章CMS管理系统V1.2</title>
<script type="text/javascript" src="images/js/jquery.js"></script>
<script type="text/javascript" src="images/js/chili-1.7.pack.js"></script>
<script type="text/javascript" src="images/js/jquery.easing.js"></script>
<script type="text/javascript" src="images/js/jquery.dimensions.js"></script>
<script type="text/javascript" src="images/js/jquery.accordion.js"></script>
<script language="javascript">
	jQuery().ready(function(){
		jQuery('#navigation').accordion({
			header: '.head',
			navigation1: true, 
			event: 'click',
			fillSpace: true,
			animated: 'bounceslide'
		});
	});
</script>
<style type="text/css">
<!--
body {
	margin:0px;
	padding:0px;
	font-size: 12px;
}
#navigation {
	margin:0px;
	padding:0px;
	width:147px;
}
#navigation a.head {
	cursor:pointer;
	background:url(images/main_34.gif) no-repeat scroll;
	display:block;
	font-weight:bold;
	margin:0px;
	padding:5px 0 5px;
	text-align:center;
	font-size:12px;
	text-decoration:none;
}
#navigation ul {
	border-width:0px;
	margin:0px;
	padding:0px;
	text-indent:0px;
}
#navigation li {
	list-style:none; display:inline;
}
#navigation li li a {
	display:block;
	font-size:12px;
	text-decoration: none;
	text-align:center;
	padding:3px;
}
#navigation li li a:hover {
	background:url(images/tab_bg.gif) repeat-x;
		border:solid 1px #adb9c2;
}
-->
</style>
</head>
<body>
<div  style="height:100%;">
  <ul id="navigation">
    <li> <a class="head">系统设置</a>
      <ul>
        <li><a href="ly_pwd.php" target="rightFrame">密码修改</a></li>
        <li><a href="ly_system.php" target="rightFrame">网站设置</a></li>
      </ul>
    </li>
	
	 <li> <a class="head">单页管理</a>
      <ul>
        <li><a href="About_Manager.php" target="rightFrame">添加单页</a></li>
        <li><a href="About_List.php" target="rightFrame">单页列表</a></li>
        <li><a href="otherhtml.php" target="rightFrame">单页生成静态</a></li>
      </ul>
    </li>
	
    <li> <a class="head">新闻管理</a>
      <ul>
        <li><a href="newsclass.php" target="rightFrame">分类管理</a></li>
		<li><a href="news_add.php" target="rightFrame">添加新闻</a></li>
        <li><a href="news_list.php" target="rightFrame">查看/删除新闻</a></li>
      </ul>
    </li>
    <li><a class="head">生成静态</a>
      <ul>
        <li><a href="fd_html.php" target="rightFrame">新闻分段生成</a></li>
        <li><a href="ly_html.php" target="rightFrame">新闻批量生成</a></li>
      </ul>
    </li>
	
    <li> <a class="head">版本信息</a>
      <ul>
        <li>
          <div align="center">by 1.2</div>
        </li>
      </ul>
    </li>
  </ul>
</div>
</body>
</html>
