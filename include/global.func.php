<?php
/**
 * Created by PhpStorm.
 * User: 禹轩1025
 * Date: 2016/8/29
 * Time: 22:29
 */

//code()函数是验证码函数
//@access public
//@param int $_width 表示验证码的宽度,默认为75
//@param int $_height 表示验证码的高度，默认为25
//@param int $_sjm_num 表示验证码的个数，默认为4
//@return void 函数执行后产生一个验证码
function code($_width=75,$_height=25,$_sjm_num=4){
//生成随机数
    for($i=0;$i<$_sjm_num;$i++)
        $numg.=dechex(mt_rand(0,15));//dechex十六进制

//保存在SESSION
    $_SESSION['code']=$numg;
     
//创建图像
    $_img=imagecreatetruecolor($_width,$_height);

//白色
    $_white=imagecolorallocate($_img,255,255,255);

//填充
    imagefill($_img,0,0,$_white);

//黑色,边框
    $_black=imagecolorallocate($_img,0,0,0);
    imagerectangle($_img,0,0,$_width-1,$_height-1,$_black);

//随机画出6个线条
    for($i=0;$i<6;$i++){
        $_rand_color=imagecolorallocate($_img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        imageline($_img,mt_rand(0,$_width),mt_rand(0,$_height),mt_rand(0,$_width),mt_rand(0, $_height),$_rand_color);
    }

//随机雪花
    for($i=0;$i<30;$i++){
        $_rand_color=imagecolorallocate($_img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
        imagestring($_img,1,mt_rand(1,$_width),mt_rand(1,$_height),"*",$_rand_color);
    }

//输出验证码
    for($i=0;$i<strlen($_SESSION['code']);$i++){
        $_rand_color=imagecolorallocate($_img,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200));
        imagestring($_img,mt_rand(5,7),$i*$_width/$_sjm_num+mt_rand(1,10),mt_rand(1,$_height/2),$_SESSION['code'][$i],$_rand_color);
    }

//输出图像
    header('content-type:image/png');
    imagepng($_img);

//销毁图像
    imagedestroy($_img);
}

function alert_back($_info){
    echo"<script>alert('$_info');history.back();</script>";
    exit();
}

//验证码验证
function check_code($_first_code,$_end_code){
    if($_first_code!=$_end_code){
        alert_back("验证码错误！");
    }
    
}

//唯一标示符函数
function sha1_uniqid(){
    return sha1(uniqid(rand(),true));
}

//
function location($_info,$_location){
    echo"<script>alert('$_info');location.href='$_location';</script>";
    exit();
}

?>
