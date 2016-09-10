<?php
/**
 * Created by PhpStorm.
 * User: 禹轩1025
 * Date: 2016/8/25
 * Time: 18:53
 */
//防止恶意调用常量
define('IN_TG',true);

//转换为硬路径，引入common文件
require dirname(__FILE__).'/include/common.inc.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>付裕的个人站</title>
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/basic.css">
    <link rel="shortcut icon" href="images/index.ico">
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/index.js"></script>
</head>

<body>

<!--头部引入-->
<?php
    require ROOT_PATH.'/include/head.inc.php';
?>

<div id="imform">
    <div id="face0">
        <div id="biv"><div id="face"></div><div id="face1"></div></div>
        <h3></h3>
        <h5 id="h1">我叫付裕</h5>
        <h5 id="h2">本科</h5>
        <h5 id="h3">网络工程</h5>
        <h5 id="h4">江苏大学2017届</h5>
        <h5 id="h5"><a href="#">详细简历</a></h5>
    </div>
</div>

<!--尾部引入-->
<?php
require ROOT_PATH.'/include/foot.inc.php';
?>

</body>
</html>

