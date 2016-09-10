 <?php

 //关闭警告
 error_reporting(E_ALL & ~E_NOTICE);

 //防止恶意调用
 if(!defined('IN_TG')){
     exit('Access Defined!');
 }

 //
 function check_content($_content){

     //长度不能大于120
     if(mb_strlen($_content,'utf-8')>80){
         alert_back("请将内容限制在80字内");
     }
     if(mb_strlen($_content,'utf-8')==0){
         alert_back('内容不得为空');
     }

     //限制敏感字符
     $_char_pattern='/[<>\'\"]/';
     if(preg_match($_char_pattern,$_content)){
         alert_back("内容不得包含敏感字符！");
     }
     return $_content;
 }











 ``

?>