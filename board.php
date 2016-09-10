<?php

//防止恶意调用常量
define('IN_TG',true);

//关闭警告
error_reporting(E_ALL & ~E_NOTICE  & ~E_WARNING);

//转换为硬路径，引入common文件
require dirname(__FILE__).'/include/common.inc.php';

if (!isset($_COOKIE['fy_username'])){
    location('请先登录','login.php');
}
//
if ($_GET['action']=='write'){

    //引入留言板函数文件
    include ROOT_PATH . '/include/board.func.php';

    $_clean=array();
    $_clean['content']=check_content($_POST['content']);
    $_clean['username']=$_COOKIE['fy_username'];
    $_clean['date']=date("m月d日 h:i:s");

    //
    mysql_query(
                    " INSERT INTO tg_article(
    
                                        tg_username,
                                        tg_content,
                                        tg_date
    
                                        )
                                VALUES(
    
                                        '{$_clean['username']}',
                                        '{$_clean['content']}', 
                                        '{$_clean['date']}'
                               
                                        )"
    );



}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>留言板</title>
    <link rel="stylesheet" href="style/basic.css">
    <link rel="stylesheet" href="style/board.css">
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/index.js"></script>
    
</head>

<body id="b1">

<!--头部引入-->
<?php
require ROOT_PATH.'/include/head.inc.php';
?>

<div id="board">
    <div id="board1">
        <h4>亲，你想对我说什么……</h4>
        <form method="post" action="board.php?action=write">
            <dl>
                <dd><textarea name="content" id="" cols="78" rows="4" autofocus="autofocus" maxlength="80" placeholder="你最多可以输入80字"></textarea></dd>
                <dd><input id="write" type="submit" value="留言"></dd>
            </dl>
        </form>
        <div id="content">
            <div id="grey"></div>
            <?php
              
                    $_result=mysql_query(
                        "SELECT     tg_username,tg_content,tg_date 
                            FROM        tg_article
                            ORDER BY    tg_id DESC  "
                    );

                    for($_i=0;$_i<12;$_i++){
                        $_row=mysql_fetch_array($_result);
                        $_save_user=$_row['tg_username'];
                        if(mb_strlen($_row['tg_username'],'utf-8')>4){
                            $_row['tg_username']=substr($_row['tg_username'],0,6).'....';
                        }
//                        echo "<dd><p>".$_row['tg_username']."</p><p>".$_row['tg_content']."</p></dd>";
                            echo"<div class='small'>
                                     <div class='lp'>
                                            <div class='div1'>用户：".$_row['tg_username']."</div>
                                            <div class='div2'>".$_row['tg_date']."</div>
                                     </div>
                                     
                                     <div class='rp'>
                                            ".$_row['tg_content']."
                                     </div>
                                     
                                 </div>";
                    }
            mysql_close();

            ?>

        </div>

    </div>
</div>

<!--尾部引入-->
<?php
require ROOT_PATH.'/include/foot.inc.php';
?>
</body>
</html>

