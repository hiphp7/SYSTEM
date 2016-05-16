<?php
/*
 * session_start ();
 * srand ( ( double ) microtime () * 1000000 );
 * while(($authnum=rand()%10000)<1000);//生成四位随机整数验证码
 * $_SESSION ['auth'] = $authnum;
 *
 * // 生成验证码图片
 * Header ( "Content-type: image/PNG" );
 * $im = imagecreate ( 55, 18 );
 * $red = ImageColorAllocate ( $im, 255, 0, 0 );
 * $white = ImageColorAllocate ( $im, 200, 200, 100 );
 * $gray = ImageColorAllocate ( $im, 250, 250, 250 );
 * $black = ImageColorAllocate ( $im, 120, 120, 50 );
 *
 * imagefill ( $im, 60, 20, $gray );
 *
 * // 将四位整数验证码绘入图片
 * // 位置交错
 * for($i = 0; $i < strlen ( $authnum ); $i ++) {
 * $i % 2 == 0 ? $top = - 1 : $top = 3;
 * imagestring ( $im, 4, 13 * $i + 4, $top, substr ( $authnum, $i, 1 ), $white );
 * }
 *
 * for($i = 0; $i < 100; $i ++) // 加入干扰象素
 * {
 * imagesetpixel ( $im, rand () % 70, rand () % 30, $black );
 * }
 *
 * ImagePNG ( $im );
 * ImageDestroy ( $im );
 */
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
