<?php
//初始化session
session_start();
//包含数据库连接文件
require ('../conn.php');
//取得当前管理员ID
$user_id=$_SESSION['user_id'];
//取得上个页面传来的变量
$post_id=$_GET['post_id'];
//从新闻表中删除当前用户
mysql_query("delete from post where post_id='$post_id'",$conn);
//退出后将页面转向前一页
echo "<script language='javascript'>window.location.href='post-list.php';</script>";
mysql_close($conn);
?>