<?php
// 启用session
session_start ();
// 是否显示系统错误
error_reporting ( 0 );
// 系统全局编码
header ( "content-type:text/html; charset=gb2312" );
// 系统根目录
define ( 'XXCMS_ROOT', str_replace ( "\\", '/', substr ( dirname ( __FILE__ ), 0, - 7 ) ) );
// 网站安装路径
define ( 'CMS_URL', '/ceshi/' );
// 通过三目运算，得到来源网址
$http_ref = isset ( $_SERVER ['HTTP_REFERER'] ) ? $_SERVER ['HTTP_REFERER'] : '';
// 设置包含路径
set_include_path ( XXCMS_ROOT . 'lib/' );
// 数据库及分页
require_once (XXCMS_ROOT . "include/config.php");
require_once ("Mysql.Class.php");
require_once ("Page.Class.php");
// 实例数据库对象
$db = new mysql ( $mydbhost, $mydbuser, $mydbpw, $mydbname, $conn, $mydbcharset );
?>