<?php
//初始化session
session_start();
//包含数据库连接文件
require ('conn.php');
//检查注册信息是否正确或者是否完整/////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submit']))
{
	if($_POST['ok'])
	{
		// 检查必填信息是否填写完整
		if(!$_POST['user_name'] | !$_POST['user_password'] | !$_POST['user_passwordagain'] | !$_POST['user_email'])
		{
			echo "<html><body><center><br><br><br><br><br>请您完整正确填写必填信息！<a href=javascript:history.back(1)>返回</a></center></body></html>";
			exit;
		}
		/*暂时不限制昵称唯一，只要ID唯一即可！！！  2011年10月31日想法*/
		/*必须制昵称唯一，只要ID唯一，否则不能在下一个页面显示将才注册的信息！！！  2011年11月13日想法*/
		// 检查用户名是否存在
		$sql1="SELECT user_name FROM user WHERE user_name = '".$_POST['user_name']."'";
		$query1 = mysql_query($sql1,$conn);
		if($query1==false)
		{
			die("Error: ".mysql_error());
		}
		$checknum = mysql_num_rows($query1);
		if($checknum != 0)
		{
			die('对不起，昵称: <strong>'.$_POST['user_name'].'</strong> 已经存在，请选择另一个！');
		}
		// 检查两次输入的密码
		if($_POST['user_password'] != $_POST['user_passwordagain'])
		{
			echo "<html><body><center><br><br><br><br><br>对不起，您输入的两次密码不一样，请重试！<a href=javascript:history.back(1)>返回</a></center></body></html>";
			exit;
		}
	   // 检查密码长度
	    if(strlen($_POST['user_password']) < 6)
		{
	        echo "<html><body><center><br><br><br><br><br>对不起，密码必须大于5位，请重试！<a href=javascript:history.back(1)>返回</a></center></body></html>";
			exit;
	    }
		// 检查email是否正确
		if(!preg_match("/.*\@.*\..*/", $_POST['user_email']) | preg_match("/(\<|\>)/", $_POST['user_email']))
		{
			echo "<html><body><center><br><br><br><br><br>对不起，请您填写正确的email！<a href=javascript:history.back(1)>返回</a></center></body></html>";
			exit;
		}
		// 不允许HTML标记在用户名和密码中
		if(preg_match("/(\<|\>)/", $_POST['user_name']) | preg_match("/(\<|\>)/", $_POST['user_password']))
		{
			echo "<html><body><center><br><br><br><br><br>对不起，用户名和密码不要有特殊Html标记！<a href=javascript:history.back(1)>返回</a></center></body></html>";
			exit;
		}
		//注册信息检查完毕///////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 所有检查完毕，可以输入数据库
		// 加密密码
		$password=md5($_POST['user_password']);
		//产生生日日期格式
		$birthday=$_POST['y']."-".$_POST['m']."-".$_POST['d'];
		//产生地址格式
		$place=$_POST['p1']."-".$_POST['p2']."-".$_POST['p3'];
		$sql2="INSERT INTO user (user_name,user_password,user_sex,user_birthday,user_address,user_email,user_regtime) VALUES ('".$_POST['user_name']."', '$password','".$_POST['user_sex']."','$birthday','$place','".$_POST['user_email']."',now())";
		print_r($sql2);
		$query2=mysql_query($sql2,$conn);
		//注册成功后跳转页面如下
		if($query2)
		{
			echo "<script language='javascript'>window.location.href='register-success.php?user_name=".$_POST['user_name']."';</script>";
		}
		exit;
	}
	else
	{
		echo "<html><body><center><br><br><br><br><br>对不起，您还没有同意本站服务条款 ： 《校园论坛服务条款》<a href=javascript:history.back(1)>返回</a></center></body></html>";
		exit;
	}
}

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
				<div id="area" style="height: 100%;">
					<div id="area-top">
						注册中心：欢迎您将成为我们的一员，我们热忱期待您的加入！
					</div>
					<div id="area-main">
					<form name="register" action="" method="post">
						<div id="line">
							提示 ： 请完整正确填写注册信息，红色星号表示必填项！
						</div>
						<div id="line1">
							昵称 ： <input class="input1" type="text" name="user_name" size="50">&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">*</font>
						</div>
						<div id="line1">
							密码 ： <input class="input1" type="password" name="user_password" size="56">&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">*</font>
						</div>
						<div id="line1">
							确认 ： <input class="input1" type="password" name="user_passwordagain" size="56">&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">*</font>
						</div>
						<div id="line1">
							性别 ： <input type="radio" name="user_sex" value="1" checked="checked"> 男 &nbsp;&nbsp;&nbsp;
									<input type="radio" name="user_sex" value="2"> 女 &nbsp;&nbsp;&nbsp;
						</div>
						<div id="line1">
							生日 ： <select name="y">
									<?php
									for($y=2011;$y>=1900;$y--)
									{
										echo "<option value=".$y.">".$y."</option>";
									}
									?>
									</select> 年
									<select name="m">
									<?php
									for($m=1;$m<=12;$m++)
									{
										echo "<option value=".$m.">".$m."</option>";
									}
									?>
									</select> 月
									<select name="d">
									<?php
									for($d=1;$d<=31;$d++)
									{
										echo "<option value=".$d.">".$d."</option>";
									}
									?>
									</select> 日
						</div>
						<div id="line1">
							地址 ： <select name="p1">
									<option value="广东">广东</option>
									</select> 省/自治区
									<select name="p2">
									<option value="广州">广州</option>
									</select> 市/地州/师
									<select name="p3">
									<option value="番禺区">番禺区</option>
									</select> 区/县/团
						</div>
						<div id="line1">
							邮箱 ： <input class="input1" type="text" name="user_email" size="50">&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">*</font>
						</div>
						<div id="line1">
							已同意本站服务条款 ： <a href="about.php">《校园论坛服务条款》</a> <input type="checkbox" name="ok">
						</div>
						<div id="line2">
							<input class="button" type="submit" name="submit" value="提交注册" style="cursor: pointer;">
						</div>
					</form>
					</div>
				</div>
			</div>
</body>
</html>