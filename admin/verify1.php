<?php
ini_set ( "error_reporting", "E_ALL & ~E_NOTICE" );
session_start ();
// 设置文字
$ChineseChar = array (
		"人",
		"出",
		"来",
		"友",
		"学",
		"孝",
		"仁",
		"义",
		"礼",
		"廉",
		"忠",
		"国",
		"中",
		"易",
		"白",
		"者",
		"火",
		"土",
		"金",
		"木",
		"雷",
		"风",
		"龙",
		"虎",
		"天",
		"地" 
);
for($i = 0; $i < 2; $i ++) {
	$text .= $ChineseChar [(array_rand ( $ChineseChar ))];
}
$font = 'gbk.ttf';
$_SESSION ['auth'] = $text;
Header ( "Content-type: image/PNG" );
$im = imagecreatetruecolor ( 55, 18 );
// 创建颜色
$fontcolor = imagecolorallocate ( $im, 255, 255, 255 );
$bg = imagecolorallocate ( $im, 0, 0, 0 );
// 添加文字
imagettftext ( $im, 9, 0, 12, 12, $fontcolor, $font, iconv ( "GBK", "utf-8", $text ) );
// 输出图片
ImagePNG ( $im );
ImageDestroy ( $im );
?>
