<?php
require_once ('global.php');
// 网站新导航
if ($_GET ['action'] == 'menu2') {
	$sql = "select * from newstype";
	$rs = mysql_query ( $sql );
	$i = 0;
	while ( $rows = mysql_fetch_assoc ( $rs ) ) {
		echo "document.write('<a href=" . CMS_URL . "Art_List.php?cid=" . $rows ["newstypeid"] . " title=" . $rows ["newstype"] . " class=xxcms_menu>" . $rows ["newstype"] . "</a>  ｜  ');\n";
		$i ++;
		if ($i % 11 == 0) {
			echo "document.write('<br>');\n";
		}
	}
}

// 更新点击数
if ($_GET ['action'] == 'dj') {
	mysql_query ( "UPDATE `newscontent` SET `hits`=hits+1 WHERE `newsid`='" . $_GET ['num'] . "'" );
	$rows = mysql_fetch_assoc ( mysql_query ( $sql = "select * from newscontent where newsid=" . $_GET ['num'] ) );
	$str = $rows ["hits"];
	echo "document.write('" . $str . "');\n";
}

// 静态页调用最新文章
if ($_GET ['action'] == 'zx') {
	$sql = "select * from newscontent order by newsid desc limit 0,6";
	$rs = mysql_query ( $sql );
	while ( $rows = mysql_fetch_assoc ( $rs ) ) {
		echo "document.write('<tr class=line>');\n";
		echo "document.write('<td width=22 height=25 align=center class=line><img src=" . CMS_URL . "image/c2.jpg width=9 height=8/><a href=" . CMS_URL . "news/" . $rows ["newspath"] . " title=" . $rows ["newstitle"] . " target=_blank></a></td>');\n";
		echo "document.write('<td width=284 align=left class=line><a href=" . CMS_URL . "news/" . $rows ["newspath"] . " title=" . $rows ["newstitle"] . " target=_blank>" . substr ( $rows ["newstitle"], 0, 33 ) . "</a></td>');\n";
		echo "document.write('</tr>');\n";
	}
}
// 静态页调用推荐文章
if ($_GET ['action'] == 'tj') {
	$sql = "select * from newscontent where is_top=1 order by newsid desc limit 0,6";
	$rs = mysql_query ( $sql );
	while ( $rows = mysql_fetch_assoc ( $rs ) ) {
		echo "document.write('<tr class=line>');\n";
		echo "document.write('<td width=22 height=25 align=center class=line><img src=" . CMS_URL . "image/c2.jpg width=9 height=8/><a href=" . CMS_URL . "news/" . $rows ["newspath"] . " title=" . $rows ["newstitle"] . " target=_blank></a></td>');\n";
		echo "document.write('<td width=284 align=left class=line><a href=" . CMS_URL . "news/" . $rows ["newspath"] . " title=" . $rows ["newstitle"] . " target=_blank>" . substr ( $rows ["newstitle"], 0, 33 ) . "</a></td>');\n";
		echo "document.write('</tr>');\n";
	}
}
// 静态页调用点击文章
if ($_GET ['action'] == 'hits') {
	$sql = "select * from newscontent order by hits desc limit 0,6";
	$rs = mysql_query ( $sql );
	while ( $rows = mysql_fetch_assoc ( $rs ) ) {
		echo "document.write('<tr class=line>');\n";
		echo "document.write('<td width=22 height=25 align=center class=line><img src=" . CMS_URL . "image/c2.jpg width=9 height=8/><a href=" . CMS_URL . "news/" . $rows ["newspath"] . " title=" . $rows ["newstitle"] . " target=_blank></a></td>');\n";
		echo "document.write('<td width=284 align=left class=line><a href=" . CMS_URL . "news/" . $rows ["newspath"] . " title=" . $rows ["newstitle"] . " target=_blank>" . substr ( $rows ["newstitle"], 0, 33 ) . "</a></td>');\n";
		echo "document.write('</tr>');\n";
	}
}
// 版权信息
if ($_GET ['action'] == 'copyright') {
	echo "document.write('<p>版权所有：友盟科技 Copyright@ 2015-" . date ( "Y" ) . " 24hhs.com ALL Rights Reserved');\n";
}
?>