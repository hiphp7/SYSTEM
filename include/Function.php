<?php
require_once ('global.php');
// ��վ�µ���
if ($_GET ['action'] == 'menu2') {
	$sql = "select * from newstype";
	$rs = mysql_query ( $sql );
	$i = 0;
	while ( $rows = mysql_fetch_assoc ( $rs ) ) {
		echo "document.write('<a href=" . CMS_URL . "Art_List.php?cid=" . $rows ["newstypeid"] . " title=" . $rows ["newstype"] . " class=xxcms_menu>" . $rows ["newstype"] . "</a>  ��  ');\n";
		$i ++;
		if ($i % 11 == 0) {
			echo "document.write('<br>');\n";
		}
	}
}

// ���µ����
if ($_GET ['action'] == 'dj') {
	mysql_query ( "UPDATE `newscontent` SET `hits`=hits+1 WHERE `newsid`='" . $_GET ['num'] . "'" );
	$rows = mysql_fetch_assoc ( mysql_query ( $sql = "select * from newscontent where newsid=" . $_GET ['num'] ) );
	$str = $rows ["hits"];
	echo "document.write('" . $str . "');\n";
}

// ��̬ҳ������������
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
// ��̬ҳ�����Ƽ�����
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
// ��̬ҳ���õ������
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
// ��Ȩ��Ϣ
if ($_GET ['action'] == 'copyright') {
	echo "document.write('<p>��Ȩ���У����˿Ƽ� Copyright@ 2015-" . date ( "Y" ) . " 24hhs.com ALL Rights Reserved');\n";
}
?>