<?php
// ����session
session_start ();
// �Ƿ���ʾϵͳ����
error_reporting ( 0 );
// ϵͳȫ�ֱ���
header ( "content-type:text/html; charset=gb2312" );
// ϵͳ��Ŀ¼
define ( 'XXCMS_ROOT', str_replace ( "\\", '/', substr ( dirname ( __FILE__ ), 0, - 7 ) ) );
// ��վ��װ·��
define ( 'CMS_URL', '/ceshi/' );
// ͨ����Ŀ���㣬�õ���Դ��ַ
$http_ref = isset ( $_SERVER ['HTTP_REFERER'] ) ? $_SERVER ['HTTP_REFERER'] : '';
// ���ð���·��
set_include_path ( XXCMS_ROOT . 'lib/' );
// ���ݿ⼰��ҳ
require_once (XXCMS_ROOT . "include/config.php");
require_once ("Mysql.Class.php");
require_once ("Page.Class.php");
// ʵ�����ݿ����
$db = new mysql ( $mydbhost, $mydbuser, $mydbpw, $mydbname, $conn, $mydbcharset );
?>