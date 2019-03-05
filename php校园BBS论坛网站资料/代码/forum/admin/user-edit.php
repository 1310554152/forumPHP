<?php
//初始化session
session_start();
//包含数据库连接文件
require ('../conn.php');
//取得当前管理员ID
$user_id=$_SESSION['user_id'];
//取得上个页面传来的变量
$id=$_GET['id'];
//取得数据库所有用户列表
$sql1="select * from user where user_id=$id";
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
				echo "<script language='javascript'>window.location.href='user-show.php?id=$id';</script>";
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
			echo "<script language='javascript'>window.location.href='user-show.php?id=$id';</script>";
		}
		exit;
	}
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
												<span class="STYLE1">用户基本信息列表</span>
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
			<form name="user-edit" action="" method="post">
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">ID&nbsp;&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data1->user_id?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">昵称&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data1->user_name?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">真实姓名&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<input class="input1" type="text" name="user_realname" value="<?php echo $data1->user_ralname?>" size="50"></span></div></td>
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
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">邮箱&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<input class="input1" type="text" name="user_email" value="<?php echo $data1->user_email?>" size="50"></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">注册时间&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data1->user_regtime?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">等级&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data1->user_level?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">个性签名&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="2" cols="40" name="user_signature"><?php echo $data1->user_signature?></textarea></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">地址&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;
									<select name="p1">
                                    <option value="广东">广东</option>
									</select> 省/自治区
									<select name="p2">
									<option value="广州">广州</option>
									</select> 市/地州/师
									<select name="p3">
									<option value="番禺区">番禺区</option>
									</select> 区/县</span></div>
					</td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">邮编&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<input class="input1" type="text" name="user_zipcode" value="<?php echo $data1->user_zipcode?>" size="50"></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">Q&nbsp;&nbsp;Q&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<input class="input1" type="text" name="user_qq" value="<?php echo $data1->user_qq?>" size="50"></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">生肖&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;
									<select name="user_zodiac">
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
									</select></span></div>
					</td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">星座&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;
									<select name="user_constellation">
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
									</select></span></div>
					</td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">血型&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;
									<select name="user_bloodtype">
									<option>选择您的血型</option>
									<option value="1">A</option>
									<option value="2">B</option>
									<option value="3">AB</option>
									<option value="4">O</option>
									<option value="5">其他血型</option>
									<option value="6">稀有血型</option>
									</select></span></div>
					</td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">电话&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<input class="input1" type="text" name="user_phone" value="<?php echo $data1->user_phone?>" size="50"></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">职业&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<input class="input1" type="text" name="user_profession" value="<?php echo $data1->user_profession?>" size="50"></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">学历&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;
									<select name="user_xueli">
									<option>选择您的学历</option>
									<option value="1">小学</option>
									<option value="2">初中</option>
									<option value="3">高中</option>
									<option value="4">大专</option>
									<option value="5">本科</option>
									<option value="6">硕士研究生</option>
									<option value="7">博士研究生</option>
									</select></span></div>
					</td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">经验&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data1->user_experience?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><input class="button" type="submit" name="submit1" value="提交修改"><div align="left"></div></td>
				</tr>
			</form>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
