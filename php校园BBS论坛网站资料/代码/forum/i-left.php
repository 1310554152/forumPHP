<?php
//初始化session
session_start();
//包含数据库连接文件
require ('conn.php');
$user_id=$_SESSION['user_id'];
//提取个人详细信息
$sql1="select * from user where user_id='$user_id'";
$query1=mysql_query($sql1);
$data1=mysql_fetch_object($query1);


?>

<html>
<head>
	<title>注册中心</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- CSS链接 -->
	<link href="css/i-left.css" type="text/css" rel="stylesheet">
</head>

<body>
			<!-- 左半部分 -->
			<div id="left">
				<div id="area">
					<div id="area-top">
						个人资料
					</div>
					<div id="area-main">
						<div id="line">
							I &nbsp;&nbsp;&nbsp;&nbsp;D ： <?php echo $data1->user_id?>
						</div>
						<div id="line1">
							昵称 ： <?php echo $data1->user_name?>
						</div>
						<div id="line1">
							真实姓名 ： <?php echo $data1->user_realname?>
						</div>
						<div id="line1">
							性别 ： <?php echo $data1->user_sex?>
						</div>
						<div id="line1">
							生日 ： <?php echo $data1->user_birthday?>
						</div>
						<div id="line1">
							邮箱 ： <?php echo $data1->user_email?>
						</div>
						<div id="line1">
							注册时间 ： <?php echo $data1->user_regtime?>
						</div>
						<div id="line1">
							等级 ： <?php echo $data1->user_level?>
						</div>
						<div id="line1">
							个性签名 ： <?php echo $data1->user_signature?>
						</div>
						<div id="line1">
							地址 ： <?php echo $data1->user_address?>
						</div>
						<div id="line1">
							邮编 ： <?php echo $data1->user_zipcode?>
						</div>
						<div id="line1">
							Q &nbsp;&nbsp;Q ： <?php echo $data1->user_qq?>
						</div>
						<div id="line1">
							生肖 ： <?php echo $data1->user_zodiac?>
						</div>
						<div id="line1">
							星座 ： <?php echo $data1->user_constellation?>
						</div>
						<div id="line1">
							血型 ： <?php echo $data1->user_bloodtype?>
						</div>
						<div id="line1">
							电话 ： <?php echo $data1->user_phone?>
						</div>
						<div id="line1">
							职业 ： <?php echo $data1->user_profession?>
						</div>
						<div id="line1">
							学历 ： <?php echo $data1->user_xueli?>
						</div>
						<div id="line2">
							经验 ： <?php echo $data1->user_experience?>
						</div>
					</div>
				</div>
			</div>
</body>
</html>