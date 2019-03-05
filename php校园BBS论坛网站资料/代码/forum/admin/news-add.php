<?php
//初始化session
session_start();
//包含数据库连接文件
require ('../conn.php');
//取得当前管理员ID
$user_id=$_SESSION['user_id'];


//如果已经提交了新闻信息
$ip=getenv(REMOTE_ADDR);
if($_POST['submit1'])
{
	//没有登录不能发新闻
	/*if($user_id=='')
	{
		echo "<html><body><center><br><br><br><br><br>对不起，您还没有登录，请<a href='login.php'>登录</a>后再发表新闻！</center></body></html>";
		exit;
	}*/
	//发布一个新闻就往新闻表里的新闻数上加1
	$sql1="select news_number from news";
	$query1=mysql_query($sql1);
	$data1=mysql_fetch_object($query1);
	$m=$data1->news_number+1;
	$sql2="update news set news_number='$m'";
	mysql_query($sql2);
	//将新闻信息插入数据库
	$sql5="insert into news(news_title,news_content,news_time,user_id,news_kind) values('$_POST[news_title]','$_POST[content1]',now(),'$user_id','$_POST[news_kind]')";
	//print_r($sql5);
	$_success=mysql_query($sql5);
	if($_success)
	echo "<html><body><center><br><br><br><br><br>恭喜您，发新闻成功！<a href=javascript:history.back(1)>再发一新闻</a> <a href=news-list.php?>查看新闻</a> </center></body></html>";
	exit;
}

?>

<!-- HTML部分 ---------------------------------------------------------------------------------------------------------->

<html>
<head>
<title>中右部</title>
<link href="../css/post.css" type="text/css" rel="stylesheet">
		<style>
			textarea {
				display: news;
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
<!--  验证用户名或密码不能为空 -------------------------------------------------------------------------------------------> -->
<!-- <script language="javascript">
function checkpost()
{
	//如果用户名和密码都不为空，则返回iuture
	if((form1.news_title.value!="") && (form1.news_kind.value!="") && (form1.content1.value!=""))
	
		return true
	}
	else
	{
		alert("请填写标题、选择新闻、填写内容！")
		return false
	}
}
</script> -->
<!--  ----------------------------------------------------------------------------------------------------------------
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
			<!-- 发新闻和新闻选择部分 ---------------------------------------------------->
			<form name="form1" method="post" action="">
			<div id="xize">
				<div id="fatie">
					发 表 新 闻
				</div>
				<div id="timu">
					新闻题目：<input class="input1" name="news_title" type="text" size="75">
				</div>
				<div id="xuanze">
					<select id="select" name="news_kind">
						<option>选择新闻类型</option>
						<option value="1">论坛公告</option>
						<option value="2">学校新闻</option>
						<option value="3">广而告之</option>
					</select>
				</div>
			</div>
			<!-- 新闻内容部分 ---------------------------------------------------------------->
			<div id="content">
				<textarea id="content7" name="content1" style="width:880px;height:400px;visibility:hidden;"> </textarea>
			</div>
			<!-- 发新闻和新闻选择部分 ---------------------------------------------------->
			<div id="xize">
				<div id="fatie1">
					<input class="button" name="submit1" type="submit" value="发 布 新 闻">
				</div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;温馨提示：<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;写完新闻内容后请将鼠标在编辑器以外区域点一下，否则得提交两次才能发表成功！
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
