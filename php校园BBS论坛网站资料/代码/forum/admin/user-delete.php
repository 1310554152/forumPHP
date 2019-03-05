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
												<span class="STYLE1">您将删除的用户信息如下，您确认删除么？</span>
											</td>
										</tr>
									</table>
								</td>
								<td>
									<div align="right">
									<span class="STYLE1">
										<a href="user-delete-confirm.php?id=<?php echo $id?>"><font color="#FF00FF">确认删除</font></a> | <a href="user-list.php"><font color="#FF00FF">取消删除</font></a>&nbsp;&nbsp;&nbsp;&nbsp;
									</span>
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
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">ID</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo $data1->user_id?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">昵称</div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $data1->user_name?></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">真实姓名</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo $data1->user_realname?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">性别</div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $data1->user_sex?></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">生日</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo $data1->user_birthday?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">邮箱</div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $data1->user_email?></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">注册时间</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo $data1->user_regtime?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">等级</div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $data1->user_level?></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">个性签名</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo $data1->user_signature?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">地址</div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $data1->user_address?></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">邮编</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo $data1->user_zipcode?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">Q  Q</div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $data1->user_qq?></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">生肖</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo $data1->user_zodiac?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">星座</div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $data1->user_constellation?></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">血型</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo $data1->user_bloodtype?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">电话</div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $data1->user_phone?></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">职业</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo $data1->user_profession?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">学历</div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $data1->user_xuel?></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">经验</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo $data1->user_experience?></span></div></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
