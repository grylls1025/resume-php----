<?php
/**
 * Created by PhpStorm.
 * User: 禹轩1025
 * Date: 2016/8/29
 * Time: 11:13
 */
//防止恶意调用常量
define('IN_TG',true);

//转换为硬路径，引入common文件
require dirname(__FILE__).'/include/common.inc.php';

session_start();

//不显示警告
error_reporting(E_ALL & ~E_NOTICE);

//运行验证码函数
//@access public
//@param int $_width 表示验证码的宽度,默认为75
//@param int $_height 表示验证码的高度，默认为25
//@param int $_sjm_num 表示验证码的个数，默认为4
//@return void 函数执行后产生一个验证码
code();



?>
