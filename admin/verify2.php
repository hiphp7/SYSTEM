<?php
session_start ();

// ��GBK������ַ���ת����UTF-8�ַ�������һ������֮����дGBK������Ϊ��php�ļ��������д洢�ı�����GBK����
// UTF-8����������ձ�֧�֣�ͨ����ǿ�������ת����UTF-8
$str = iconv ( "GBK", "utf-8", "ܿܿ������ˮ��ɽ��ʤ�ż��������ر������ϼε���ֽ���Զ��������" );
if (! is_string ( $str ) || ! mb_check_encoding ( $str, "utf-8" )) {
	exit ( "�����ַ������߲���utf-8" );
}
$zhongwenku_size;
// ��UTF-8���뷽ʽ��ȡ�ַ����ĳ���
$zhongwenku_size = mb_strlen ( $str, "UTF-8" );

// �������ַ�����������
$zhongwenku = array ();
for($i = 0; $i < $zhongwenku_size; $i ++) {
	$zhongwenku [$i] = mb_substr ( $str, $i, 1, "UTF-8" );
}

$result = "";

// ͼƬ��Ҫд����ĸ��ַ�
for($i = 0; $i < 4; $i ++) {
	switch (rand ( 0, 1 )) {
		case 0 :
			$result .= $zhongwenku [rand ( 0, $zhongwenku_size - 1 )];
			break;
		case 1 :
			$result .= dechex ( rand ( 0, 15 ) );
			break;
	}
}

$_SESSION ["auth"] = $result;

// ����һ�����ͼƬ ��100����30
$img = imagecreatetruecolor ( 100, 30 );

// ���䱳����ɫ
$bg = imagecolorallocate ( $img, 0, 0, 0 );

// ����������ɫ
$te = imagecolorallocate ( $img, 255, 255, 255 );

// ��ͼƬ��д�ַ���
// imagestring($img, rand(3,8), rand(1,70), rand(1,10), $result, $te);

// ��ͼƬ�ϸ��������������д����������
imagettftext ( $img, 15, rand ( 2, 9 ), 20, 20, $te, "gbk.ttf", $result );

for($i = 0; $i < 3; $i ++) {
	// $t = imagecolorallocate($img, rand(0, 255),rand(0, 255),rand(0, 255));
	// ����
	imageline ( $img, 0, rand ( 0, 20 ), rand ( 70, 100 ), rand ( 0, 20 ), $te );
}

$t = imagecolorallocate ( $img, rand ( 0, 255 ), rand ( 0, 255 ), rand ( 0, 255 ) );
// ΪͼƬ������
for($i = 0; $i < 200; $i ++) {
	imagesetpixel ( $img, rand ( 1, 100 ), rand ( 1, 30 ), $t );
}
// ����httpͷ��Ϣ ָ�����η��͵���image�е�jpeg
header ( "Content-type: image/jpeg" );
// ���jpegͼƬ�������
imagejpeg ( $img );
imagedestroy($img);
?>