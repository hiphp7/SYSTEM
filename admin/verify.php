<?php
/*
 * session_start ();
 * srand ( ( double ) microtime () * 1000000 );
 * while(($authnum=rand()%10000)<1000);//������λ���������֤��
 * $_SESSION ['auth'] = $authnum;
 *
 * // ������֤��ͼƬ
 * Header ( "Content-type: image/PNG" );
 * $im = imagecreate ( 55, 18 );
 * $red = ImageColorAllocate ( $im, 255, 0, 0 );
 * $white = ImageColorAllocate ( $im, 200, 200, 100 );
 * $gray = ImageColorAllocate ( $im, 250, 250, 250 );
 * $black = ImageColorAllocate ( $im, 120, 120, 50 );
 *
 * imagefill ( $im, 60, 20, $gray );
 *
 * // ����λ������֤�����ͼƬ
 * // λ�ý���
 * for($i = 0; $i < strlen ( $authnum ); $i ++) {
 * $i % 2 == 0 ? $top = - 1 : $top = 3;
 * imagestring ( $im, 4, 13 * $i + 4, $top, substr ( $authnum, $i, 1 ), $white );
 * }
 *
 * for($i = 0; $i < 100; $i ++) // �����������
 * {
 * imagesetpixel ( $im, rand () % 70, rand () % 30, $black );
 * }
 *
 * ImagePNG ( $im );
 * ImageDestroy ( $im );
 */
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
// ��������
imagettftext ( $im, 9, 0, 12, 12, $fontcolor, $font, iconv ( "GBK", "utf-8", $text ) );
// ���ͼƬ
ImagePNG ( $im );
ImageDestroy ( $im );
?>