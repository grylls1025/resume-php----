<?php

//防止恶意调用常量
define('IN_TG',true);

//转换为硬路径，引入common文件
require dirname(__FILE__).'/include/common.inc.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>简历</title>
    <link rel="stylesheet" href="style/basic.css">
    <link rel="stylesheet" href="style/resume.css">
</head>

<body>

<!--头部引入-->
<?php
require ROOT_PATH.'/include/head.inc.php';
?>

<!--尾部引入-->
<?php
require ROOT_PATH.'/include/foot.inc.php';
?>

</body>
</html>

