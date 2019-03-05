<?php
//初始化session
session_start();
//包含数据库连接文件
require ('conn.php');
$user_id=$_SESSION['user_id'];
//提取个人详细信息
$sql1="select * from user";
$query1=mysql_query($sql1);
$data1=mysql_fetch_object($query1);


?>

<html>
<head>
	<title>注册中心</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- CSS链接 -->
	<link href="css/register-left.css" type="text/css" rel="stylesheet">
</head>

<body>
			<!-- 左半部分 -->
			<div id="left">
				<div id="area">
					<div id="area-top">
						我的好友
					</div>
					<div id="area-main">
						<div id="line">
							I &nbsp;&nbsp;&nbsp;&nbsp;D ： <?php echo $data->user_id?>
						</div>
						<div id="line1">
							昵称 ： <input class="input1" type="text" name="nickname" value="<?php echo $data->user_name?>" size="50">
						</div>
						<div id="line1">
							密码 ： <input class="input1" type="password" name="nickname" size="56">
						</div>
						<div id="line1">
							确认密码 ： <input class="input1" type="password" name="nickname" size="56">
						</div>
						<div id="line1">
							真实姓名 ： <input class="input1" type="text" name="nickname" value="<?php echo $data->user_ralname?>" size="50">
						</div>
						<div id="line1">
							性别 ： <input type="radio" name="sex" value="1" checked="checked"> 男 &nbsp;&nbsp;&nbsp;
									<input type="radio" name="sex" value="2"> 女 &nbsp;&nbsp;&nbsp;
									<input type="radio" name="sex" value="3"> 保密
						</div>
						<div id="line1">
							生日 ： <select>
									<?php
									for($y=2011;$y>=1900;$y--)
									{
										echo "<option>".$y."</option>";
									}
									?>
									</select> 年 
									<select>
									<?php
									for($m=1;$m<=12;$m++)
									{
										echo "<option>".$m."</option>";
									}
									?>
									</select> 月 
									<select>
									<?php
									for($d=1;$d<=31;$d++)
									{
										echo "<option>".$d."</option>";
									}
									?>
									</select> 日 
						</div>
						<div id="line1">
							邮箱 ： <input class="input1" type="text" name="nickname" size="50">
						</div>
						<div id="line1">
							注册时间 ： 2011年8月8日
						</div>
						<div id="line1">
							等级 ： 10
						</div>
						<div id="line1">
							个性签名 ： <textarea rows="5" cols="40"></textarea><br><br>
						</div>
						<div id="line1">
							地址 ： <select>
									<option>新疆</option>
									</select> &nbsp;
									<select>
									<option>乌鲁木齐</option>
									</select> &nbsp;
									<select>
									<option>新市区</option>
									</select>
						</div>
						<div id="line1">
							邮编 ： <input class="input1" type="text" name="nickname" size="50">
						</div>
						<div id="line1">
							Q &nbsp;&nbsp;Q ： <input class="input1" type="text" name="nickname" size="50">
						</div>
						<div id="line1">
							生肖 ： <input class="input1" type="text" name="nickname" size="50">
						</div>
						<div id="line1">
							星座 ： <input class="input1" type="text" name="nickname" size="50">
						</div>
						<div id="line1">
							血型 ： <input class="input1" type="text" name="nickname" size="50">
						</div>
						<div id="line1">
							电话 ： <input class="input1" type="text" name="nickname" size="50">
						</div>
						<div id="line1">
							职业 ： <input class="input1" type="text" name="nickname" size="50">
						</div>
						<div id="line1">
							学历 ： <input class="input1" type="text" name="nickname" size="50">
						</div>
						<div id="line2">
							<input class="button" type="submit" name="submit" value="提交修改">
						</div>
					</div>
				</div>
			</div>
</body>
</html>