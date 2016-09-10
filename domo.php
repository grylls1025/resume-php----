<?php

//防止恶意调用常量
define('IN_TG',true);

//关闭警告
error_reporting(E_ALL & ~E_NOTICE  & ~E_WARNING);

//转换为硬路径，引入common文件
require dirname(__FILE__).'/include/common.inc.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Domo</title>
    <link rel="stylesheet" href="style/basic.css">
    <link rel="stylesheet" href="style/domo.css">
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/index.js"></script>
</head>

<body>

<!--头部引入-->
<?php
require ROOT_PATH.'/include/head.inc.php';
?>

<div id="domo">
        <dt>练手小项目</dt>
    <div id="domo1">
        <a href="颜色动画.html"><dd class="out">CSS3颜色动画</dd></a>
        <a href="选项卡.html"><dd class="out">选项卡效果</dd></a>
        <a href="方块右移.html"><dd class="out">方块右移</dd></a>
        <a href="时钟.html"><dd class="out">时钟显示</dd></a>
        <a href="江大首页/web/ujs.html"><dd class="out">下拉菜单</dd></a>
        <a href="选择菜单/web/experiment2.html"><dd class="out">选择栏</dd></a>
        <a href="世外桃源/web/experiment1.html"><dd class="out">世外桃源</dd></a>
        <a href="图片滚动/滚动图片.html"><dd class="out">图片滚动</dd></a>
        <a href="ujs/web/ujs-home page.html"><dd class="out">江苏大学官网</dd></a>
        <a href="Acer/acer.html"><dd class="out">acer官网</dd></a>
    </div>
</div>

<!--尾部引入-->
<?php
require ROOT_PATH.'/include/foot.inc.php';
?>



</body>
</html>

