<?php
/**
 * Created by PhpStorm.
 * User: 禹轩1025
 * Date: 2016/8/28
 * Time: 18:42
 */
//防止恶意调用
if(!defined('IN_TG')){
    exit('Access Defined!');
}

if($_GET['action']=='out'){
    setcookie('fy_username','');
    setcookie('fy_uniqid','');
    header("Location:index.php");
}

?>
<div id="head">
    <div id="smallface"></div>
    <p><a href="resume.php">付裕的简历</a></p>
    <ul id="nav">
        <li class="fz"><a href="index.php">首页</a></li>
        <li class="fz"><a href="domo.php">Demo</a></li>
        <li class="fz"><a href="board.php">留言板</a></li>
        <li class="fz"><a target="_blank"href="images/ewm.png">微信</a></li>
<!--    <li class="fz"><a href="login.php">登录</a></li>-->
        <li class="fz"><a href="register.php">注册</a></li>

        <?php

        echo "<li><a  href='index.php?action=out'>退出</a></li>";

        if(isset($_COOKIE['fy_username'])){

            if(mb_strlen($_COOKIE['fy_username'],'utf-8')<7){
                echo "<li ><a href='' id='yonghu1'>用户:".$_COOKIE['fy_username']."</a></li>";
            }
            else{
                echo "<li ><a href='' id='yonghu1' title='".$_COOKIE['fy_username']."'>用户:".substr($_COOKIE['fy_username'],0,6)."...</a></li>";
            }
        }
        else{
            echo "<li ><a href='login.php' id='yonghu'>登录</a></li>";
        }
        
        ?>
        
        <li ><a id='bizhi' >切换壁纸</a></li>
    </ul>
</div>
