<?php
//初始化session
session_start();
//包含数据库连接文件
require ('../conn.php');
//提取当前用户个人信息
$user_id=$_SESSION['user_id'];
$sql1="select * from user where user_id='$user_id'";
$query1=mysql_query("$sql1",$conn);
$data1=mysql_fetch_object($query1);

//get传值，使用上一个页面传过来的post_id
$post_id=$_GET['post_id'];

//取得当前帖子的详细信息
$sql2="select * from post,user where post_id='$post_id' and post.user_id=user.user_id";
$query2=mysql_query("$sql2",$conn);
$data2=mysql_fetch_object($query2);

//评论部分SQL语句(包括加载评论和发表评论)
$ip=getenv(REMOTE_ADDR);
if($_POST['submit1'])
{
	if($user_id=='')
	{
		echo "<html><body><center><br><br><br><br><br>对不起，您还没有登录，请<a href='login.php'>登录</a>后再发表评论！</center></body></html>";
		exit;
	}
	$sql3="insert into reply(reply_content,reply_time,user_id,post_id,reply_ip) values('$_POST[content]',now(),'$user_id','$post_id','$ip')";
	$success=mysql_query($sql3);
	//实现回复次数的统计：
	$sql102="select post_replies from post where post_id='$post_id'";
	$query102=mysql_query($sql102);
	$data102=mysql_fetch_object($query102);
	$n=$data102->post_replies+1;
	$sql103="update post set post_replies='$n' where post_id='$post_id'";
	mysql_query($sql103);
	//如果回复成功
	if($success)
	echo "<script language='javascript'>window.location.href='javascript:history.back(1)';</script>";
	exit;
}

?>




<!-- HTML部分 ----------------------------------------------------------------------------------------------->
<html>
<head>
	<title>校园论坛</title>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
	<!-- CSS链接 -->
	<link href="css/post-delete.css" type="text/css" rel="stylesheet">
</head>
<!-- 验证用户名或密码不能为空 ------------------------------------------------------------------------------------------->
<script language="javascript">
function checkpost()
{
	//如果用户名和密码都不为空，则返回iuture
	if((huifu.content.value!=""))
	{
		return ture
	}
	else
	{
		alert("请填写评论内容！")
		return false
	}
}
</script>
<!--  ------------------------------------------------------------------------------------------------------------------>
<body>
<a name="top"></a>
	<!-- 主面板 ----------------------------------------------------------------------------->
	<div id="container5">
	<div id="container4">
	<div id="container3">
	<div id="container2">
	<div id="container1">
	<div id="container">
		<!-- 主体 -->
		<div id="main">
		<div id="main1">
			<!-- 发帖和分页代码部分 ---------------------------------------------------->
			<div id="fenye">
				<div id="fatie">
					<font color="red"><a href="post.php">您将删除帖子的详细内容如下，您确认删除么？</a></font>
				</div>
				<div id="yema">
					<font color="red"><a href="post-delete-confirm.php?post_id=<?php echo $data2->post_id?>">确认删除</a> | <a href="post-list.php">取消删除</a></font>
				</div>
			</div>
			<!-- 帖子内容部分（帖子正文部分） ----------------------------------------------------------->
			<div id="detail1">
				<div id="detail1-left">
					<div id="detail1-left">
					<div id="detail1-left-top">
						作者：<?php echo $data2->user_name; ?>
					</div>
					<div id="detail1-left-mid">
						<div id="photo">
							<img src="../<?php echo $data2->user_avatar; ?>">
						</div>
					</div>
					<div id="detail1-left-bot">
						ID&nbsp; ： <?php echo $data2->user_id; ?><br>
						LV&nbsp; ： <?php echo $data2->user_level; ?><br>
						EP ： <?php echo $data2->user_experience; ?>
					</div>
				</div>
				</div>
				<div id="detail1-right">
					<div id="detail1-right-top">
						帖子主题：<?php echo $data2->post_topic; ?>
					</div>
					<div id="detail1-right-top1">
						<div id="detail1-right-top1-left">
							发表时间：<?php echo $data2->post_time; ?> &nbsp;|&nbsp; 阅读：<?php echo $data2->post_views; ?> &nbsp;|&nbsp; 回复：<?php echo $data2->post_replies; ?>
						</div>
						<div id="detail1-right-top1-right">
							收藏 &nbsp;|&nbsp; <a href="#bottom">回复</a>
						</div>
					</div>
					<div id="detail1-right-bot">
						<?php echo $data2->post_content; ?>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
</body>

</html>