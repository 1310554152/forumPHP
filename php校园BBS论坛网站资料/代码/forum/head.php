<?php
//初始化session
session_start();
//包含数据库连接文件
require ('conn.php');
//网站位置SESSION部分----------------------------------------------------------------------------
$title = "论坛首页";
if($_GET['title'])
{
	$title = $_GET['title'];
	$_SESSION['title']= $title;
}
//取得当前页面的URL------------------------------------------------------------------------------------
$url=$_SERVER['PHP_SELF'];
//用户名记录SESSION部分------------------------------------------------------------------------------------------------
if(isset($_SESSION['user_id']))
{
	$user_id=$_SESSION['user_id'];
	$sql="select * from user where user_id=$user_id";
	$result=mysql_query($sql);
	$data=mysql_fetch_object($result);
}

?>

<!-- HTML------------------------------------------------------------------------------------------------------------------------->
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>校园论坛</title>
	<!-- CSS链接 -->
	<link href="css/head.css" type="text/css" rel="stylesheet">

</head>
<!-- 验证用户名或密码不能为空 ------------------------------------------------------------------------------------------->
<script language="javascript">
function checklogin()
{
	//如果用户名和密码都不为空，则返回iuture
	if((login.user_id.value!="") && (login.password.value!=""))
	{
		return ture
	}
	else
	{
		alert("昵称或密码不能为空")
		return false
	}
}
</script>
<!--  -------------------------------------------------------------------------------------------------------------------->
<body style= "scrollbar-arrow-color:#FF0000; scrollbar-base-color:#0099FF; scrollbar-3d-light-color:#000000; scrollbar-face-color:#CCFFFF; scrollbar-dark-shadow-color:#000000;">
<!-- 动态标题栏 -->

<!-- 动态标题栏 -->
			<!-- 顶部 -->
			<div id="top">
				<div id="top1">
					<script language=JavaScript>
					today=new Date();
					function initArray(){
					this.length=initArray.arguments.length
					for(var i=0;i<this.length;i++)
					this[i+1]=initArray.arguments[i] }
					var d=new initArray(
					"星期日",
					"星期一",
					"星期二",
					"星期三",
					"星期四",
					"星期五",
					"星期六");
					document.write(
					"<font color=#000 style='font-size:12px;font-family: 宋体'> ",
					today.getYear()," 年 ",
					today.getMonth()+1," 月 ",
					today.getDate()," 日 ",
					d[today.getDay()+1],
					"</font>" );
					</script>
					&nbsp;|&nbsp; <a href="javascript:;"  onclick="setHomepage('http://localhost/forum/');">设为首页</a>
					&nbsp;|&nbsp; <a href="http://localhost/forum/"  onclick="addFavorite(this.href, '简历交流校园论坛');return false;">收藏本站</a>
				</div>
				<!-- 右半部分 -------------------------------------------------------------------------------------------->

				<div id="top2">
				<?php
					if($user_id!="")
					{
						if($data->user_identity==4)
						{
							echo "<p><font color=blue>欢迎您 &nbsp;</font><font color=red>".$data->user_name."</font><font color=blue> &nbsp;超级管理员&nbsp;&nbsp;</font>|&nbsp; <a href='i.php'>个人中心</a> &nbsp;|&nbsp; <a href='admin/index.php'>后台管理</a> &nbsp;|&nbsp; <font color=red><a href='logout.php'>退出登录</a></font></p>";
						}
						else if($data->user_identity==3)
						{
							echo "<p><font color=blue>欢迎您 &nbsp;</font><font color=red>".$data->user_name."</font><font color=blue> &nbsp;管理员&nbsp;&nbsp;</font>|&nbsp; <a href='i.php'>个人中心</a> &nbsp;|&nbsp; <a href='admin/index.php'>后台管理</a> &nbsp;|&nbsp; <font color=red><a href='logout.php'>退出登录</a></font></p>";
						}
						else if($data->user_identity==2)
						{
							echo "<p><font color=blue>欢迎您 &nbsp;</font><font color=red>".$data->user_name."</font><font color=blue> &nbsp;版主&nbsp;&nbsp;</font>|&nbsp;<a href='i.php'>个人中心</a> &nbsp;|&nbsp; <font color=red><a href='logout.php'>退出登录</a></font></p>";
						}
						else
						{
							echo "<p><font color=blue>欢迎您 &nbsp;</font><font color=red>".$data->user_name."</font><font color=blue> &nbsp;会员&nbsp;&nbsp;</font>|&nbsp; <a href='i.php'>个人中心</a> &nbsp;|&nbsp; <font color=red><a href='logout.php'>退出登录</a></font></p>";
						}
					}
					else
					{
				?>
					<form action="login_check.php" method="post" name="login" onSubmit="return checklogin()" class="form-head">
					帐号 <input class="input" type="text" name="user_id" size="15"> &nbsp;
					密码 <input class="input" type="password" name="password" size="15"> &nbsp;
					<input class="button0" name="login" type="submit" value="登录"> &nbsp;
					<a href="register.php">注册</a>
					</form>
				<?php
					}
				?>
				</div>
			</div>
			<!-- banner图片 --------------------------------------------------------------------------------------------------->
			<div id="banner">
			</div>
			<!-- 全局链接 -->
			<div id="globallink">
				<ul id="nav">
				<!-- <?php if($_SERVER['PHP_SELF']=="/forum/index.php") echo "id='selected'" ?> -->
				<li <?php if($url=="/forum/index.php") echo "id='selected'"; ?>><a href="index.php?title=<?php echo 论坛首页?>">论坛首页</a></li>
				<li <?php if($url=="/forum/news.php") echo "id='selected'"; ?>><a href="news.php?news_kind=1&&title=<?php echo 论坛新闻?>">论坛新闻</a></li>
				<li <?php if($url=="/forum/register.php") echo "id='selected'"; ?>><a href="register.php?title=<?php echo 注册中心?>">注册中心</a></li>
				<li <?php if($url=="/forum/login.php") echo "id='selected'"; ?>><a href="login.php?title=<?php echo 登陆中心?>">登陆中心</a></li>
				<li <?php if($url=="/forum/post.php") echo "id='selected'"; ?>><a href="post.php?title=<?php echo 发帖中心?>">发帖中心</a></li>
				<li <?php if($url=="/forum/i.php") echo "id='selected'"; ?>><a href="i.php?title=<?php echo 个人中心?>">个人中心</a></li>
				<li <?php if($url=="/forum/chat.php") echo "id='selected'"; ?>><a href="chat.php?title=<?php echo 进来聊天?>">进来聊天</a></li>
				<li <?php if($url=="/forum/about.php") echo "id='selected'"; ?>><a href="about.php?title=<?php echo 关于本站?>">关于本站</a></li>


				</ul>
			</div>
			<!-- 网站位置以及搜索框 -->
			<div id="position">
				<div id="position1">
					您 的 位 置 ：简历交流校园论坛 — <?php echo $title?>
				</div>
				<div id="position2">
<form action="search.php?act=sea" method="post">
搜索条件: <select name="select" id="select">
                      <option value="1">帖名</option>
                      <option value="2">发贴人</option>
                    </select>
					<input class="input" type="text" name="stitle" size="30">&nbsp;&nbsp;&nbsp; <input class="button0" name="search" type="submit" value="站内搜索">
                  <label for="select"></label>

</form>
				</div>
			</div>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script> -->
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.spasticNav.js"></script>

<!-- <script type="text/javascript">
    $('#nav').spasticNav();
</script> -->
</body>
</html>