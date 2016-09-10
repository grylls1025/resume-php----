<?php

//关闭警告
error_reporting(E_ALL & ~E_NOTICE  & ~E_WARNING);

//防止恶意调用
if(!defined('IN_TG')){
    exit('Access Defined!');
}

//
function check_password($_pass){
    return sha1($_pass);
}

//
function _set_cookie($_username,$_uniqid){
    setcookie('fy_username',$_username);
    setcookie('fy_uniqid',$_uniqid);
}

?>