<?php
//初始化session
session_start();
//包含数据库连接文件
require ('conn.php');
$user_id=$_SESSION['user_id'];
if($user_id=="")
{
	echo "<html><body><center><br><br><br><br><br>对不起，您还没有登录，请登录后再发布帖子！ <a href=login.php>登录</a></center></body></html>";
	exit;
}
//如果已经提交了帖子信息
$ip=getenv(REMOTE_ADDR);
if($_POST['submit1'])
{
	if($user_id=='')
	{
		echo "<html><body><center><br><br><br><br><br>对不起，您还没有登录，请<a href='login.php'>登录</a>后再发表帖子！</center></body></html>";
		exit;
	}
	//发布一个帖子就往板块表里的帖子数上加1
	$sql1="select block_number from block where block_id='$_POST[block_id]'";
	$query1=mysql_query($sql1);
	$data1=mysql_fetch_object($query1);
	$m=$data1->block_number+1;
	$sql2="update block set block_number='$m' where block_id='$_POST[block_id]'";
	mysql_query($sql2);
	//发布一个帖子就为当钱用户经验值加1
	$sql3="select user_experience from user where user_id='$user_id'";
	$query3=mysql_query($sql3);
	$data3=mysql_fetch_object($query3);
	$n=$data3->user_experience+1;
	$sql4="update user set user_experience='$n' where user_id='$user_id'";
	mysql_query($sql4);
	//将帖子信息插入数据库
	$sql5="insert into post(post_topic,post_content,post_time,user_id,block_id,post_attachment,post_ip) values('$_POST[title]','<br><br>$_POST[content1]<br><br><br><br><br>',now(),'$user_id','$_POST[block_id]','','$ip')";
	$_success=mysql_query($sql5);
	if($_success)
	echo "<html><body><center><br><br><br><br><br>恭喜您，发帖成功！<a href=javascript:history.back(1)>再发一帖</a> <a href=block.php?block_id=".$_POST[block_id].">查看帖子</a> </center></body></html>";
	exit;
}
?>

<html>
<head>
	<title>校园论坛</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- CSS链接 -->
	<link href="css/post.css" type="text/css" rel="stylesheet">
		<style>
			textarea {
				display: block;
			}
		</style>
		<script charset="utf-8" src="kindeditor/kindeditor.js"></script>
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
		<!-- 头部 --------------------------------------------------------------------------->
		<div id="head">
		<?php require("head.php") ?>
		</div>
		<!-- 主体 -->
		<div id="main">
		<div id="main1">
			<!-- 发帖和板块选择部分 ---------------------------------------------------->
			<form name="form1" method="post" action="" onsubmit="return checkpost()">
			<div id="xize">
				<div id="fatie">
					发 表 帖 子
				</div>
				<div id="timu">
					帖子题目：<input class="input1" name="title" type="text" size="75">
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
				<textarea id="content7" name="content1" style="width:880px;height:350px;visibility:hidden;"> </textarea>
			</div>
			<!-- 发帖和板块选择部分 ---------------------------------------------------->
			<div id="xize">
				<div id="fatie1">
					<input class="button" name="submit1" type="submit" value="发 布 帖 子">
				</div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;温馨提示：<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;写完帖子内容后请将鼠标在编辑器以外区域点一下，否则得提交两次才能发帖成功！
			</div>
			</form>
		</div>
		</div>
		<!-- 底部 ----------------------------------------------------------------------------->
		<div id="foot">
		<?php require("foot.php") ?>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>

<!-- 返回顶部JS代码 ------------------------------------------------------------------------>
<script>
lastScrollY=0;
function heartBeat()
{
	var diffY;
	if (document.documentElement && document.documentElement.scrollTop)
		diffY = document.documentElement.scrollTop;
	else if (document.body)
		diffY = document.body.scrollTop
	else    {/*Netscape stuff*/}
		percent=.1*(diffY-lastScrollY);
	if(percent>0)
		percent=Math.ceil(percent);
	else percent=Math.floor(percent);
		document.getElementById("full").style.top=parseInt(document.getElementById("full").style.top)+percent+"px"; lastScrollY=lastScrollY+percent;
}
suspendcode="<div id=\"full\"style='right:1px;POSITION:absolute;TOP:500px;z-index:100'><a onclick='window.scrollTo(0,0);'><img src='images/top.jpg'></a><br></div>"
document.write(suspendcode);
window.setInterval("heartBeat()",1);
</script>
<!-- 返回顶部JS代码结束 ----------------------------------------------------------------------->
<!-- JiaThis代码 ---------------------------------------------------------------------------->
<!-- JiaThis Button BEGIN -->
<script type="text/javascript" src="http://v2.jiathis.com/code_mini/jiathis_r.js?type=left&amp;move=0" charset="utf-8"></script>
<!-- JiaThis Button END -->
<!-- JiaThis代码结束 ------------------------------------------------------------------------>
</body>



</html>