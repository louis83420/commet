<?php
//0代表大小写字母随机字符
define('RANDOM_ALPHA', 0);
//1代表数字随机字符
define('RANDOM_NUMBER', 1);
//2代表小写字母随机字符
define('RANDOM_LOWER_ALPHA', 2);
define('RANDOM_UPPER_ALPHA', 3);
define('RANDOM_MIXED', 4);
/**
 * 生成唯一的ID
 *
 * @param void
 * @return string
 */
function uuid()
{
    $uniqid = md5(uniqid(mt_rand() . microtime()));
    $uuid = substr($uniqid, 0, 8) . '-'
    . substr($uniqid, 8, 4) . '-'
    . substr($uniqid, 12, 4) . '-'
    . substr($uniqid, 16, 4) . '-'
    . substr($uniqid, 20);
    return $uuid;
}
/**
 * 大驼峰标记法
 * @param string $value,字符串
 * @return string
 */

function studly($value)
{
    $value = strtolower($value);
    $value = str_replace(['_', '-'], ' ', $value);
    $value = ucwords($value);
    $value = str_replace(' ', null, $value);
    return $value;
}

/**
 * 小写驼峰标记法
 *
 * @param string $value,字符串
 * @return string
 */
function camel($value)
{
    $value = strtolower($value);
    $value = str_replace(['_', '-'], ' ', $value);
    $value = ucwords($value);
    $value = str_replace(' ', null, $value);
    $value = lcfirst($value);
    return $value;
}

/**
 * 产生随机字符
 *
 * @param  int  $type ,类型(参照常量)
 * @param  int  $length，随机字符长度(默认为4)
 * @return string
 */
function random($type, $length = 4)
{
    switch ($type) {
        case 0:
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz';
            break;
        case 1:
            $chars = str_repeat('23456789', 5);
            break;
        case 2:
            $chars = 'abcdefghijkmnpqrstuvwxyz';
            break;
        case 3:
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
            break;
        default:
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789';
            break;
    }
    $chars = str_shuffle($chars);
    $str = substr($chars, 0, $length);
    return $str;
}

function getExtension($filename)
{
    $extension = strtolower(substr($filename, strrpos($filename, '.') + 1));
    return $extension;
}
