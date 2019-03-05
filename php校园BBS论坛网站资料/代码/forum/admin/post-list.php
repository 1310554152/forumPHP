<?php
//初始化session
session_start();
//包含数据库连接文件
require ('../conn.php');
//取得当前管理员ID
$user_id=$_SESSION['user_id'];
//取得数据库所有用户列表
$sql1="select * from post";
$query1=mysql_query($sql1);

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
												<span class="STYLE1">帖子基本信息列表</span>
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
				<tr>

					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">ID</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">帖子题目</span></div></td>
					<td width="14%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">帖子作者</span></div></td>
					<td width="16%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">所属板块</span></div></td>
					<td width="27%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">发帖时间</span></div></td>
					<td width="14%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">基本操作</span></div></td>
				</tr>
				<?php while($data1=mysql_fetch_object($query1)){ ?>
				<tr>

					<td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><?php echo $data1->post_id?></span></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $data1->post_topic?></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $data1->user_id?></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $data1->block_id?></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $data1->post_time?></div></td>
					<td height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE21"><a href="post-show.php?post_id=<?php echo $data1->post_id?>">查看</a> | <a href="post-edit.php?post_id=<?php echo $data1->post_id?>">修改</a> | <a href="post-delete.php?post_id=<?php echo $data1->post_id?>">删除</a></div></td>
				</tr>
				<?php } ?>
			</table>
		</td>
	</tr>
	<tr>
		<td height="30">
				</td>
			</tr>
		</table></td>
	</tr>
</table>
</body>
</html>