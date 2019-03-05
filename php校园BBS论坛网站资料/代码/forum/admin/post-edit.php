<?php
//初始化session
session_start();
//包含数据库连接文件
require ('../conn.php');
$user_id=$_SESSION['user_id'];

//get传值，使用上一个页面传过来的post_id
$post_id=$_GET['post_id'];

//取得当前帖子的详细信息
$sql0="select * from post,user where post_id='$post_id' and post.user_id=user.user_id";
$query0=mysql_query("$sql0",$conn);
$data0=mysql_fetch_object($query0);

//如果已经提交了修改后的帖子信息
$ip=getenv(REMOTE_ADDR);
if($_POST['submit1'])
{
	//将修改后的帖子信息插入数据库

	//$sql5="insert into post(post_topic,post_content,post_time,user_id,block_id,post_attachment,post_ip) values('$_POST[title]','<br><br>$_POST[content1]<br><br><br><br><br>',now(),'$user_id','$_POST[block_id]','','$ip')";

	$sql5="update post set post_topic='$_POST[title]',post_content='$_POST[content1]',block_id='$_POST[block_id]' where post_id='$data0->post_id'";
	$_success=mysql_query($sql5);
	if($_success)
	echo "<script language='javascript'>window.location.href='post-show.php?post_id=$data0->post_id';</script>";
	exit;
}
?>

<html>
<head>
	<title>校园论坛</title>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
	<!-- CSS链接 -->
	<link href="css/post.css" type="text/css" rel="stylesheet">
		<style>
			textarea {
				display: block;
			}
		</style>
		<script charset="utf-8" src="../kindeditor/kindeditor.js"></script>
		<script>
			KE.show({
				id : 'content7',
				resizeMode : 0,
				cssPath : './index.css'
			});
		</script>
</head>
<!-- 验证用户名或密码不能为空 ------------------------------------------------------------------------------------------->
<script language="javascript">
function checkpost()
{
	//如果用户名和密码都不为空，则返回iuture
	if((form1.title.value!="") && (form1.block_id.value!="") && (form1.content1.value!=""))
	{
		return ture
	}
	else
	{
		alert("请填写标题、选择板块、填写内容！")
		return false
	}
}
</script>
<!--  ------------------------------------------------------------------------------------------------------------------>
<body>
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
			<!-- 发帖和板块选择部分 ---------------------------------------------------->
			<form name="form1" method="post" action="" onsubmit="return checkpost()">
			<div id="xize">
				<div id="fatie">
					修 改 帖 子
				</div>
				<div id="timu">
					帖子题目：<input class="input1" name="title" value="<?php echo $data0->post_topic?>" type="text" size="75">
				</div>
				<div id="xuanze">
					<select id="select" name="block_id">
						<option>选择板块</option>
						<?php
							$sql1="select * from block";
							$query1=mysql_query("$sql1",$conn);
							while($data1=mysql_fetch_object($query1)){
						?>
						<option value="<?php echo $data1->block_id; ?>"><?php echo $data1->block_name; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<!-- 帖子内容部分 ---------------------------------------------------------------->
			<div id="content">
				<textarea id="content7" name="content1" style="width:880px;height:350px;visibility:hidden;"> <?php echo $data0->post_content?></textarea>
			</div>
			<!-- 发帖和板块选择部分 ---------------------------------------------------->
			<div id="xize">
				<div id="fatie1">
					<input class="button" name="submit1" type="submit" value="修 改 帖 子">
				</div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;温馨提示：<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;写完帖子内容后请将鼠标在编辑器以外区域点一下，否则得提交两次才能发帖成功！
			</div>
			</form>
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