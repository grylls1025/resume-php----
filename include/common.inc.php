<?php
/**
 * Created by PhpStorm.
 * User: 禹轩1025
 * Date: 2016/8/28
 * Time: 18:42
 */

//关闭警告
error_reporting(E_ALL & ~E_NOTICE);

//防止恶意调用
if(!defined('IN_TG')){
    exit('Access Defined!');
}

//设置字符集编码
header('Content-Type:text/html;charset=utf-8');

//拒绝PHP低版本
if(PHP_VERSION<'4.1.0'){
    exit("Version is too low!");
}

//转换硬路径常量，速度更快
define('ROOT_PATH',substr(dirname(__FILE__),0,-8));

//核心函数库
require dirname(__FILE__).'/global.func.php';
require dirname(__FILE__).'/mysql.func.php';

//调用连接数据库函数
connect();

if(isset($_COOKIE['fy_username'])){
    if(!fetch("SELECT tg_username,tg_uniqid FROM tg_user WHERE tg_username='{$_COOKIE['fy_username']}' AND  tg_uniqid='{$_COOKIE['fy_uniqid']}'")){
        setcookie('fy_username','');
        setcookie('fy_uniqid','');
        location('cookie不安全，请重新登录','login.php');
    }
}




?>
