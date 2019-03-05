<?php
//初始化session
session_start();
//包含数据库连接文件
require ('../conn.php');
//$_SESSION['UserName']不能用$UserName变量代替

if(isset($_SESSION['user_id']))
{
	echo "<script language='javascript'>window.location.href='main.php';</script>";
	//登陆过的话，立即结束
	exit;
}

//检查用户输入的ID和密码是否正确
$user_id=$_GET['user_id'];
$password=$_GET['password'];
$sql=mysql_query("SELECT * FROM user WHERE user_id='$user_id'",$conn);
$user=mysql_fetch_array($sql);
$numrows=mysql_num_rows($sql);
//用户昵称和密码正确  
if($numrows!="0" and md5($password)==$user["user_password"])
{
	//注册session变量，保存当前用户的ID
	$_SESSION['user_id']=$user_id;
	//获取用户IP地址
	$IP=getenv(REMOTE_ADDR);
	//添加用户至online表
	mysql_query("insert into online(user_id,online_time,online_ip) values('$user_id',now(),'$IP')",$conn);
	echo "<script language='javascript'>window.location.href='main.php';</script>";
	exit;
}
//否则用户名和密码错误
else
{
	session_unset();
	session_destroy();
	//echo md5($password);
	echo $user_id;
	echo $password;
	echo "<html><body><center><br><br><br><br><br>对不起，您输入的用户名或密码错误，<a href=javascript:history.back(1)>请重试</a></center></body></html>";
	mysql_close($conn);
	exit;
}
?>