<?php
session_start();
$user_id=$_SESSION['user_id'];
//注销session
session_unset();
session_destroy();
// 包含数据库连接文件
require ('conn.php');
// 从online表中删除当前用户
mysql_query("delete from online where user_id='$user_id'",$conn);
//退出后将页面转向首页
echo "<script language='javascript'>window.location.href='index.php';</script>";
mysql_close($conn);
?>