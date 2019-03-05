<?php
//初始化session
session_start();
//包含数据库连接文件
require ('conn.php');
//接受GET传值
$user_name=$_GET['user_name'];
$sql1="select * from user where user_name='$user_name'";
$query1=mysql_query($sql1);
$data1=mysql_fetch_object($query1);

?>


<html>
<head>
	<title>注册中心</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- CSS链接 -->
	<link href="css/register-success-left.css" type="text/css" rel="stylesheet">
</head>

<body>
			<!-- 左半部分 -->
			<div id="left">
				<div id="area">
					<div id="area-top">
						<font color="red">恭喜您，你已成功注册校园论坛帐号!</font>
					</div>
					<div id="area-main">
					<form name="register" action="" method="post">
						<div id="line">
							以下是你所注册帐号的详细信息，请您务必仔细浏览，感谢您对本站的支持！
						</div>
						<div id="line1">
							I&nbsp;&nbsp;&nbsp;D ： <font color="red"><?php echo $data1->user_id?></font>
						</div>
						<div id="line1">
							昵称 ： <?php echo $data1->user_name?>
						</div>
						<div id="line1">
							性别 ： <?php
										if($data1-user_sex==1)
										{
											echo "男";
										}
										else if($data1-user_sex==2)
										{
											echo "女";
										}
										else
										{
											echo "保密";
										}
									?>
						</div>
						<div id="line1">
							生日 ： <?php echo $data1->user_birthday?>
						</div>
						<div id="line1">
							邮箱 ： <?php echo $data1->user_email?>
						</div>
						<div id="line1">
							地址 ： <?php echo $data1->user_address?>
						</div>
						<div id="line1">
							注册时间 ： <?php echo $data1->user_regtime?>
						</div>
						<div id="line1">
							<font color="#FF0000">注意事项</font> ： 请牢记你所注册帐号的用户ID，他是你通行本站唯一的“身份证”
						</div>
						<div id="line2">
							<a href="login.php">登录本站</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">返回首页</a>
						</div>
					</form>
					</div>
				</div>
			</div>
</body>
</html>