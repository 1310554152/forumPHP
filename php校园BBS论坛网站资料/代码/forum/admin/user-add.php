<?php
//初始化session
session_start();
//包含数据库连接文件
require ('../conn.php');
//取得当前管理员ID
$user_id=$_SESSION['user_id'];

//检查注册信息是否正确或者是否完整/////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submit']))
{
		// 检查必填信息是否填写完整
		if(!$_POST['user_name'] | !$_POST['user_password'] | !$_POST['user_passwordagain'] | !$_POST['user_email'])
		{
			echo "<html><body><center><br><br><br><br><br>请您完整正确填写必填信息！<a href=javascript:history.back(1)>返回</a></center></body></html>";
			exit;
		}
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
		$query2=mysql_query($sql2,$conn);
		//注册成功后跳转页面如下
		if($query2)
		{
			echo "<script language='javascript'>window.location.href='user-add-success.php?user_name=".$_POST['user_name']."';</script>";
		}
		exit;
}

?>

<!-- HTML部分 ---------------------------------------------------------------------------------------------------------->

<html>
<head>
<title>中右部</title>
<link rel="stylesheet" type="text/css" href="css/center-right.css"/>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td height="30">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="24" bgcolor="#353c44">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="6%" height="19" valign="bottom">
												<div align="center"><img src="images/tb.gif" width="14" height="14" />
												</div>
											</td>
											<td width="94%" valign="bottom">
												<span class="STYLE1">添加用户页面</span>
											</td>
										</tr>
									</table>
								</td>
								<td>
									<div align="right">

									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
			<form name="user-add" action="" method="post">
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">昵称&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<input class="input1" type="text" name="user_name" size="50">&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">*</font></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">密码&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<input class="input1" type="password" name="user_password" size="56">&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">*</font></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">确认密码&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;
					<input class="input1" type="password" name="user_passwordagain" size="56">&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">*</font></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">性别&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="user_sex" value="1" checked="checked"> 男 &nbsp;&nbsp;&nbsp;
					<input type="radio" name="user_sex" value="2"> 女 &nbsp;&nbsp;&nbsp;</span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">生日&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;
									<select name="y">
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
									</select> 日 </span></div>
					</td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">地址&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;
									<select name="p1">
									<option value="新疆">新疆</option>
									</select> 省/自治区
									<select name="p2">
									<option value="乌鲁木齐">乌鲁木齐</option>
									</select> 市/地州/师
									<select name="p3">
									<option value="新市区">新市区</option>
									</select> 区/县/团</span></div>
					</td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">邮箱&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<input class="input1" type="text" name="user_email" size="50">&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">*</font></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10"></span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="submit" name="submit" value="提交注册"></span></div></td>
				</tr>
			</form>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
