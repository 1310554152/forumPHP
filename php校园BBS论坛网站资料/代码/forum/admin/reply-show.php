<?php
//初始化session
session_start();
//包含数据库连接文件
require ('../conn.php');
//取得当前管理员ID
$user_id=$_SESSION['user_id'];
//取得上个页面传来的变量
$reply_id=$_GET['reply_id'];
//取得数据库评论详细信息
$sql1="select * from reply where reply_id=$reply_id";
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
												<span class="STYLE1">评论基本信息列表</span>
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
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">ID&nbsp;&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data1->reply_id?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">帖子ID&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data1->post_id?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">回复人&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data1->user_id?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">回复内容&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data1->reply_content?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">回复时间&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data1->reply_time?></span></div></td>
				</tr>
				<tr>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
					<td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"></div></td>
				</tr>
				<tr>
					<td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="right"><span class="STYLE10">回复者IP&nbsp;&nbsp;&nbsp;</span></div></td>
					<td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="left"><span class="STYLE10">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data1->reply_ip?></span></div></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
