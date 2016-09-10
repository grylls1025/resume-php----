<?php

//防止恶意调用常量
define('IN_TG',true);

//转换为硬路径，引入common文件
require dirname(__FILE__).'/include/common.inc.php';

session_start();

//
if($_GET['action']=='login') {

    //防止恶意注册，跨站攻击
    check_code($_POST['yzm'], $_SESSION['code']);

    //引入注册函数文件
    include ROOT_PATH . '/include/login.func.php';

    $_clean = array();
    $_clean['username'] = $_POST['username'];
    $_clean['password'] = check_password($_POST['password']);

    if(!!$_row=fetch("SELECT tg_username,tg_uniqid FROM tg_user WHERE tg_username='{$_clean['username']}' AND  tg_password='{$_clean['password']}'")){

        session_destroy();
        mysql_close();
        _set_cookie($_row['tg_username'],$_row['tg_uniqid']);
        location('登录成功','board.php');;

    }else{

        session_destroy();
        mysql_close();
        location('用户名或密码错误','login.php');
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>登录</title>
    <link rel="stylesheet" href="style/basic.css">
    <link rel="stylesheet" href="style/login.css">
    <script src="js/jquery-3.1.0.min.js" ></script>
    <script src="js/index.js" ></script>
    <script src="js/code.js" ></script>
</head>

<body>

<!--头部引入-->
<?php
require ROOT_PATH.'/include/head.inc.php';
?>

<div id="login">
    <form name="login"  method="post" action="login.php?action=login">
        <dl>
            <dt>会员登录</dt>
            <dd><span>用户名:</span><input type="text" name="username" class="text">（2~20位）</dd>
            <dd><span>密 码:</span><input type="password" name="password" class="text">（不小于6位）</dd>
            <dd><span>验证码:</span><input type="text" name="yzm" class="yzm"><img id="img_code" src="code.php" alt=""> (点击图片刷新)</dd>
            <dd><input type="submit"class="submit" value="登录"><a href="register.php">立即注册</a></dd>
        </dl>
    </form>
</div>

<!--尾部引入-->
<?php
require ROOT_PATH.'/include/foot.inc.php';
?>

</body>
</html>
