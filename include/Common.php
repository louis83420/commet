<?php
/**
 * 获取PHP系统的运行环境
 *
 * @param void
 * @return array
 */
function getEnvironment()
{
    //PHP预定义常量
    $env['os'] = PHP_OS;
    $env['php_version'] = PHP_VERSION;
    $env['php_sapi'] = PHP_SAPI;
    //通过$_SERVER预定义变量获取相关信息
    $env['php_env'] = $_SERVER['SERVER_SOFTWARE'];
    $env['server_name'] = $_SERVER['SERVER_NAME'];
    $env['document_root'] = $_SERVER['DOCUMENT_ROOT'];
    $env['server_port'] = $_SERVER['SERVER_PORT'];
    //通过ini_get函数获取PHP配置文件的中配置选项
    $env['upload_max_filesize'] = ini_get('upload_max_filesize');
    $env['max_execution_time'] = ini_get('max_execution_time');
    //获取MySQL服务器版本
    $env['mysql_version'] = getVersion();
    //通过extension_loaded函数检测是否开启某些扩展
    $env['pdo_mysql'] = extension_loaded('pdo_mysql');
    $env['gd'] = extension_loaded('gd');
    $env['mbstring'] = extension_loaded('mbstring');
    return $env;
}
/**
 * 日期格式化
 *
 * @param  int $time 时间戳
 * @return string
 */
function formatDate($time)
{
    $expires = time() - $time; //秒数
    if ($expires < 60) {
        $string = '刚刚';
    } elseif ($expires < 60 * 60) {
        $minutes = floor($expires / 60);
        $string = $minutes . '分钟前';
    } elseif ($expires < 60 * 60 * 24) {
        $hours = floor($expires / (60 * 60));
        $string = $hours . '小时前';
    } elseif ($expires < 24 * 60 * 60 * 31) {
        $days = floor($expires / 86400);
        $string = $days . '天前';
    } elseif ($expires < 24 * 60 * 60 * 31 * 12) {
        $months = floor($expires / (31 * 86400));
        $string = $months . '月前';
    } else {
        $string = date('Y-m-d H:i:s', $time);
    }
    return $string;
}
