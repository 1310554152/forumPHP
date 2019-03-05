<?php
//初始化session
session_start();
//包含数据库连接文件
require ('../conn.php');
//取得当前管理员ID
$block_id=$_SESSION['block_id'];
//取得上个页面传来的变量
$block_id=$_GET['block_id'];
//取得数据库板块详细信息
$sql1="select * from block where block_id=$block_id";
$query1=mysql_query($sql1);
$data1=mysql_fetch_object($query1);

//如果提交了修改后的信息
if(isset($_POST['submit1']))
{
	// 检查必填信息是否填写完整
	if(!$_POST['block_name'] | !$_POST['user_id'])
	{
		echo "<html><body><center><br><br><br><br><br>请您填写必填板块信息！<a href=javascript:history.back(1)>返回</a></center></body></html>";
		exit;
	}
	//将修改后的板块信息插入数据库
	//$sql1="insert into block(block_name,user_id,block_bulletin,block_explain,block_icon) values('$_POST[block_name]','$_POST[user_id]','$_POST[block_bulletin]','$_POST[block_explain]','$_POST[block_icon]')";
	//将修改后的板块信息插入数据库
	$sql1="update block set block_name='$_POST[block_name]',user_id='$_POST[user_id]',block_bulletin='$_POST[block_bulletin]',block_explain='$_POST[block_explain]',block_icon='$_POST[block_icon]' where block_id='$data1->block_id'";
	$query1=mysql_query($sql1);
	//添加板块成功后跳转页面如下
	if($query1)
	{
		echo "<script language='javascript'>window.location.href='block-show.php?block_id=$data1->block_id';</script>";
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
												<span class="STYLE1">板块基本信息列表</span>
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
			<form action="" method="post" name="block-edit">
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">ID&nbsp;&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data1->block_id?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">板块名称&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<input class="input1" type="text" name="block_name" value="<?php echo $data1->block_name?>" size="50"></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">版主&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<input class="input1" type="text" name="user_id" value="<?php echo $data1->user_id?>" size="50"></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">帖子数&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data1->block_number?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">板块公告&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<input class="input1" type="text" name="block_bulletin" value="<?php echo $data1->block_bulletin?>" size="50"></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">板块说明&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<input class="input1" type="text" name="block_explain" value="<?php echo $data1->block_explain?>" size="50"></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">板块图标&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<input class="input1" type="text" name="block_icon" value="<?php echo $data1->block_icon?>" size="50"></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="submit" name="submit1" value="提交修改"><div align="left"></div></td>
				</tr>
			</form>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
