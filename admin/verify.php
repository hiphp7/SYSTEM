<?php
ini_set ( "error_reporting", "E_ALL & ~E_NOTICE" );
session_start ();
// ��������
$ChineseChar = array (
		"��",
		"��",
		"��",
		"��",
		"ѧ",
		"Т",
		"��",
		"��",
		"��",
		"��",
		"��",
		"��",
		"��",
		"��",
		"��",
		"��",
		"��",
		"��",
		"��",
		"ľ",
		"��",
		"��",
		"��",
		"��",
		"��",
		"��" 
);
for($i = 0; $i < 2; $i ++) {
	$text .= $ChineseChar [(array_rand ( $ChineseChar ))];
}
$font = 'gbk.ttf';
$_SESSION ['auth'] = $text;
Header ( "Content-type: image/PNG" );
$im = imagecreatetruecolor ( 55, 18 );
// ������ɫ
$fontcolor = imagecolorallocate ( $im, 255, 255, 255 );
$bg = imagecolorallocate ( $im, 0, 0, 0 );
// �������
imagettftext ( $im, 9, 0, 12, 12, $fontcolor, $font, iconv ( "GBK", "utf-8", $text ) );
// ���ͼƬ
ImagePNG ( $im );
ImageDestroy ( $im );
?>
