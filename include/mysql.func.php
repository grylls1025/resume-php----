<?php
/**
 * Created by PhpStorm.
 * User: 禹轩1025
 * Date: 2016/9/3
 * Time: 20:07
 */
//关闭警告
error_reporting(E_ALL & ~E_NOTICE  & ~E_WARNING);

//防止恶意调用
if(!defined('IN_TG')){
    exit('Access Defined!');
}

//数据库连接
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PWD','root');
define('DB_NAME','resume');

//连接数据库
function connect(){

//创建数据库连接
    $_conn=@mysql_connect(DB_HOST,DB_USER,DB_PWD)or die('数据库连接失败！');

//选择数据库
    mysql_select_db(DB_NAME)or die('数据库找不到');

//选择字符集
    mysql_query("SET NAMES UTF8")or die('字符集错误');
}

//判断用户名是否重复函数
function is_repeat($_sql){
    $_query=mysql_query($_sql);
    if(mysql_fetch_array($_query,MYSQL_ASSOC)){
        alert_back('此用户名被占用');
    }
}

//查找账户是否存在
function fetch($_sql){
    $_query=mysql_query($_sql);
    return mysql_fetch_array($_query,MYSQL_ASSOC);
}

?>
