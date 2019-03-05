<?php
session_start();
require ('../conn.php');
$user_id=$_SESSION['user_id'];
if($user_id=="")
{
	echo "<html><body><center><br><br><br><br><br>请先登录¡ <a href=../login.php>登录</a></center></body></html>";
	exit;
}
?>

<html>
<head>
<title>论坛后台管理系统</title>
</head>
<frameset rows="127,*,11" frameborder="no" border="0" framespacing="0">
	<frame src="top.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" />
	<frame src="center.php" name="mainFrame" id="mainFrame" />
	<frame src="down.php" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame" />
</frameset>
<noframes>
<body>
</body>
</noframes>
</html>