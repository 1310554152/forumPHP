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
//如果提交了修改信息
if(isset($_POST['submit1']))
{
	/*暂时不限制昵称唯一，只要ID唯一即可！！！*/
	// 检查用户名是否存在
	/*$sql100="SELECT user_name FROM user WHERE user_name = '".$_POST['user_name']."'";
	$query100 = mysql_query($sql100,$conn);
	if($query100==false)
	{		
		die("Error: ".mysql_error());
	}
	$checknum = mysql_num_rows($query100);
	if($checknum != 0)
	{
		die('对不起，昵称: <strong>'.$_POST['user_name'].'</strong> 已经存在，请选择另一个！');
	}*/
	// 检查email是否正确
	if(!preg_match("/.*\@.*\..*/", $_POST['user_email']) | preg_match("/(\<|\>)/", $_POST['user_email']))
	{
		die('对不起，请填写正确的email');
	}
	// 不允许HTML标记在用户名和密码中
	if(preg_match("/(\<|\>)/", $_POST['user_name']) | preg_match("/(\<|\>)/", $_POST['user_password']))
	{
		die('用户名和密码不要有特殊Html标记！');
	}
	//如果需要修改密码/////////////////////////////////////////////////////////////////////////////////////////////////////
	if($_POST['user_password_ori']!="")
	{
		//取得当前用户所输入的原始密码
		$password_ori=md5($_POST['user_password_ori']);
		//取得数据库中原始密码
		$sql2="select user_password from user where user_id='$user_id'";
		$query2=mysql_query($sql2);
		$data2=mysql_fetch_object($query2);
		//判断原始密码是否正确
		if($data2->user_password!=$password_ori)
		{
			die('对不起，您输入的原始密码不正确，请重试！');
		}
		//新密码不能为空
		else if($_POST['user_password']=="" and $_POST['user_passwordagain']=="")
		{
			die('对不起，新密码不能为空，请重试！');
		}
		// 检查密码长度
		else if(strlen($_POST['user_password']) < 6)
		{
			die ('密码必须大于5位');
		}
		//检查两次输入的密码是否一样
		else if($_POST['user_password'] != $_POST['user_passwordagain'])
		{
			die('对不起，您输入的两次新密码不一样，请重试！');
		}
		else
		{
			//加密新密码
			$password_new=md5($_POST['user_password']);
			//产生生日日期格式
			$birthday=$_POST['y']."-".$_POST['m']."-".$_POST['d'];
			//产生地址格式
			$place=$_POST['p1']."-".$_POST['p2']."-".$_POST['p3'];
			$sql3="UPDATE user SET user_name='$_POST[user_name]',user_password='$password_new',user_realname='$_POST[user_realname]',user_sex='$_POST[user_sex]',user_birthday='$birthday',user_email='$_POST[user_email]',user_signature='$_POST[user_signature]',user_address='$place',user_zipcode='$_POST[user_zipcode]',user_qq='$_POST[user_qq]',user_zodiac='$_POST[user_zodiac]',user_constellation='$_POST[user_constellation]',user_bloodtype='$_POST[user_bloodtype]',user_phone='$_POST[user_phone]',user_profession='$_POST[user_profession]',user_xueli='$_POST[user_xueli]' where user_id='$user_id'";
			$query3=mysql_query("$sql3",$conn);
			if($query3)
			{
				echo "<script language='javascript'>window.location.href='i.php';</script>";
			}
			exit;
		}
	}
	//否则就是没有修改密码
	else
	{
		//产生生日日期格式
		$birthday=$_POST['y']."-".$_POST['m']."-".$_POST['d'];
		//产生地址格式
		$place=$_POST['p1']."-".$_POST['p2']."-".$_POST['p3'];
		$sql3="UPDATE user SET user_name='$_POST[user_name]',user_realname='$_POST[user_realname]',user_sex='$_POST[user_sex]',user_birthday='$birthday',user_email='$_POST[user_email]',user_signature='$_POST[user_signature]',user_address='$place',user_zipcode='$_POST[user_zipcode]',user_qq='$_POST[user_qq]',user_zodiac='$_POST[user_zodiac]',user_constellation='$_POST[user_constellation]',user_bloodtype='$_POST[user_bloodtype]',user_phone='$_POST[user_phone]',user_profession='$_POST[user_profession]',user_xueli='$_POST[user_xueli]' where user_id='$user_id'";
		$query3=mysql_query("$sql3",$conn);
		if($query3)
		{
			echo "<script language='javascript'>window.location.href='i.php';</script>";
		}
		exit;
	}
}

?>

<html>
<head>
	<title>修改资料</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- CSS链接 -->
	<link href="css/register-left.css" type="text/css" rel="stylesheet">
</head>

<body>
			<!-- 左半部分 -->
			<div id="left">
				<div id="area">
					<div id="area-top">
						修改资料
					</div>
					<div id="area-main">
						<form name="i-edit" action="" method="post">
						<div id="line">
							I &nbsp;&nbsp;&nbsp;&nbsp;D ： <?php echo $data1->user_id?>
						</div>
						<div id="line1">
							昵称 ： <input class="input1" type="text" name="user_name" value="<?php echo $data1->user_name?>" size="50">
						</div>
						<div id="line1">
							原始密码 ： <input class="input1" type="password" name="user_password_ori" size="56">
						</div>
						<div id="line1">
							新密码 ： <input class="input1" type="password" name="user_password" size="56">
						</div>
						<div id="line1">
							确认密码 ： <input class="input1" type="password" name="user_passwordagain" size="56">
						</div>
						<div id="line1">
							真实姓名 ： <input class="input1" type="text" name="user_realname" value="<?php echo $data1->user_ralname?>" size="50">
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
							邮箱 ： <input class="input1" type="text" name="user_email" value="<?php echo $data1->user_email?>" size="50">
						</div>
						<div id="line1">
							注册时间 ： <?php echo $data1->user_regtime?>
						</div>
						<div id="line1">
							等级 ： <?php echo $data1->user_level?>
						</div>
						<div id="line1">
							个性签名 ： <textarea rows="5" cols="40" name="user_signature"><?php echo $data1->user_signature?></textarea><br><br>
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
							邮编 ： <input class="input1" type="text" name="user_zipcode" value="<?php echo $data1->user_zipcode?>" size="50">
						</div>
						<div id="line1">
							Q &nbsp;&nbsp;Q ： <input class="input1" type="text" name="user_qq" value="<?php echo $data1->user_qq?>" size="50">
						</div>
						<div id="line1">
							生肖 ： <select name="user_zodiac">
									<option>选择您的生肖</option>
									<option value="1">鼠</option>
									<option value="2">牛</option>
									<option value="3">虎</option>
									<option value="4">兔</option>
									<option value="5">龙</option>
									<option value="6">蛇</option>
									<option value="7">马</option>
									<option value="8">羊</option>
									<option value="9">猴</option>
									<option value="10">鸡</option>
									<option value="11">狗</option>
									<option value="12">猪</option>
									</select>
						</div>
						<div id="line1">
							星座 ： <select name="user_constellation">
									<option>选择您的星座</option>
									<option value="1">摩羯座</option>
									<option value="2">水瓶座</option>
									<option value="3">双鱼座</option>
									<option value="4">白羊座</option>
									<option value="5">金牛座</option>
									<option value="6">双子座</option>
									<option value="7">巨蟹座</option>
									<option value="8">狮子座</option>
									<option value="9">处女座</option>
									<option value="10">天秤座</option>
									<option value="11">天蝎座</option>
									<option value="12">射手座</option>
									</select>
						</div>
						<div id="line1">
							血型 ： <select name="user_bloodtype">
									<option>选择您的血型</option>
									<option value="1">A</option>
									<option value="2">B</option>
									<option value="3">AB</option>
									<option value="4">O</option>
									<option value="5">其他血型</option>
									<option value="6">稀有血型</option>
									</select>
						</div>
						<div id="line1">
							电话 ： <input class="input1" type="text" name="user_phone" value="<?php echo $data1->user_phone?>" size="50">
						</div>
						<div id="line1">
							职业 ： <input class="input1" type="text" name="user_profession" value="<?php echo $data1->user_profession?>" size="50">
						</div>
						<div id="line1">
							学历 ： <select name="user_xueli">
									<option>选择您的学历</option>
									<option value="1">小学</option>
									<option value="2">初中</option>
									<option value="3">高中</option>
									<option value="4">大专</option>
									<option value="5">本科</option>
									<option value="6">硕士研究生</option>
									<option value="7">博士研究生</option>
									</select>
						</div>
						<div id="line1">
							经验 ： <?php echo $data1->user_experience?>
						</div>
						<div id="line2">
							<input class="button" type="submit" name="submit1" value="提交修改">
						</div>
						</form>
					</div>
				</div>
			</div>
</body>
</html>