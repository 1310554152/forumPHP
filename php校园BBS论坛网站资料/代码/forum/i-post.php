<?php
//初始化session
session_start();
//包含数据库连接文件
require ('conn.php');
$user_id=$_SESSION['user_id'];
if($user_id=="")
{
	echo "<html><body><center><br><br><br><br><br>对不起，您还没有登录，请您先 <a href=login.php>登录</a> ！</center></body></html>";
	exit;
}
?>

<html>
<head>
	<title>校园论坛</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- CSS链接 -->
	<link href="css/index.css" type="text/css" rel="stylesheet">
</head>

<body>
	<!-- 主面板 -->
	<div id="container5">
	<div id="container4">
	<div id="container3">
	<div id="container2">
	<div id="container1">
	<div id="container">
		<!-- 头部 -->
		<div id="head">
		<?php require("head.php") ?>
		</div>
		<!-- 主体 -->
		<div id="main">
			<div id="left">
			<?php require("i-post-left.php") ?>
			</div>
			<div id="right">
			<?php require("i-right.php") ?>
			</div>
		</div>
		<!-- 底部 -->
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