<?php
//初始化session
session_start();
//包含数据库连接文件
require ('../conn.php');
//取得当前管理员ID
$user_id=$_SESSION['user_id'];
//取得上个页面传来的变量
$reply_id=$_GET['reply_id'];
//从新闻表中删除当前用户
mysql_query("delete from reply where reply_id='$reply_id'",$conn);
//退出后将页面转向前一页
echo "<script language='javascript'>window.location.href='reply-list.php';</script>";
mysql_close($conn);
?>