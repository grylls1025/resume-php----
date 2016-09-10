<?php
/**
 * Created by PhpStorm.
 * User: 禹轩1025
 * Date: 2016/8/28
 * Time: 19:55
 */

//防止恶意调用常量
define('IN_TG',true);

//转换为硬路径，引入common文件
require dirname(__FILE__).'/include/common.inc.php';

session_start();


//判断是否提交了
if($_GET['action']=='register'){

        //防止恶意注册，跨站攻击
          check_code($_POST['yzm'],$_SESSION['code']);

        //引入注册函数文件
        include ROOT_PATH . '/include/register.func.php';

        $_clean = array();

        //作用二：防止伪造cookie
        $_clean['uniqid'] = check_uniqid($_POST['uniqid'], $_SESSION['uniqid']);

        //active也是唯一标示符，激活处理
        $_clean['active'] = sha1_uniqid();

        $_clean['username'] = check_username($_POST['username']);

        //判断用户名重复
        is_repeat("SELECT tg_username FROM tg_user WHERE tg_username='{$_clean['username']}'");

        $_clean['password'] = _check_password($_POST['password'], $_POST['notpassword']);
        $_clean['sex'] = $_POST['sex'];

        //测试新增
        mysql_query(
                "INSERT INTO tg_user(
                                    tg_username,
                                    tg_uniqid,
                                    tg_active,
                                    tg_password,
                                    tg_sex
                                    )
                              VALUES(
                                    '{$_clean['username']}',
                                    '{$_clean['uniqid']}',
                                    '{$_clean['active']}',
                                    '{$_clean['password']}',
                                    '{$_clean['sex']}'
                                    )"
            );

    if(mysql_affected_rows()==1){
        mysql_close();
        session_destroy();
        location('注册成功！请登录','login.php');
    }
    else {
        mysql_close();
        session_destroy();
        header('Location:register.php');

    }

}

//可以通过唯一标示符，防止恶意注册跨站攻击，伪装表单攻击等
$_SESSION['uniqid']=$_uniqid=sha1_uniqid();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style/basic.css">
    <link rel="stylesheet" href="style/reg.css">
    <title>注册</title>
    <script src="js/code.js" ></script>
    <script src="js/register.js" ></script>
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/index.js"></script>
    
</head>

<body>


<!--头部引入-->
<?php
require ROOT_PATH.'/include/head.inc.php';
?>

<div id="register">
    <form method="post" name="register" action="register.php?action=register" >
        <input type="hidden" name="uniqid" value="<?php echo $_uniqid?>">
        <dl>
            <dt>会员注册</dt>
            <dd><span>用户名:</span><input type="text" name="username" class="text">（2~20位）</dd>
            <dd><span>密 码:</span><input type="password" name="password" class="text">（6~8位）</dd>
            <dd><span>确认密码:</span><input type="password" name="notpassword" class="text"></dd>
            <dd><span>性 别:</span><input type="radio" name="sex" value="男" checked="checked">男 <input type="radio" name="sex" value="女" >女</dd>
            <dd><span>验证码:</span><input type="text" name="yzm" class="yzm"><img id="img_code" src="code.php" alt=""> (点击图片刷新)</dd>
            <dd><input type="submit"class="submit" value="注册"></dd>
        </dl>
    </form>
</div>

<!--尾部引入-->
<?php
require ROOT_PATH.'/include/foot.inc.php';
?>
</body>
</html>
