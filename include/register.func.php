<?php
/**
 * Created by PhpStorm.
 * User: 禹轩1025
 * Date: 2016/9/2
 * Time: 17:51
 */

//关闭警告
error_reporting(E_ALL & ~E_NOTICE  & ~E_WARNING);

//防止恶意调用
if(!defined('IN_TG')){
    exit('Access Defined!');
}
 
//过滤用户名
function check_username($_string){
    //去掉两边的空格
    $_string=trim($_string);
    
    //长度小于两位或者大于20位
    if(mb_strlen($_string,'utf-8')<2||mb_strlen($_string,'utf-8')>20){
        alert_back("用户名长度需2~20位！");
    }
    
    //限制敏感字符
    $_char_pattern='/[<>\'\"\ \　]/';
    if(preg_match($_char_pattern,$_string)){
        alert_back("用户名不得包含敏感字符！");
    }
  
        //将用户名转义返回
        return $_string;
    

}

//判断密码
function _check_password($_first_pass,$_end_pass)
{

    //限制密码长度
    if (strlen($_first_pass) < 6||strlen($_first_pass) > 8) {
        alert_back("密码只能6~8位！");
    }

    //密码和确认密码必须一致
    if($_first_pass!=$_end_pass){
        alert_back('密码和确认密码不一致！');
    }
        return sha1($_first_pass);
    
}

//判断标示符
function check_uniqid($_first_uni,$_end_uni){
    if($_first_uni!=$_end_uni){
        alert_back('非法操作！唯一标示符不一致！');
    }
    return $_first_uni;
    
   
}

?>
