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

//get传值，使用上一个页面传过来的news_id
$news_id=$_GET['news_id'];
$news_kind=$_GET['news_kind'];

//显示评论列表部分：使用SQL控制
$sql2="select * from news where news_id='$news_id'";
$query2=mysql_query("$sql2",$conn);
$data2=mysqL_fetch_object($query2);

?>


<html>
<head>
	<title>注册中心</title>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
	<!-- CSS链接 -->
	<link href="css/news-show.css" type="text/css" rel="stylesheet">
</head>

<body>
			<!-- 左半部分 -->
			<div id="left">
				<div id="area">
					<div id="area-top">
						<?php
							if($news_kind==1)
							echo "新闻中心—论坛公告";
							else if($news_kind==2)
							echo "新闻中心—学校新闻";
							else
							echo "新闻中心—广而告之";
						?>
					</div>
					<div id="area-main">
						<div id="line">
							<center><?php echo $data2->news_title?></center>
						</div>
						<div id="line1">
							<center>
								浏览次数 : &nbsp;<?php echo $data2->news_views?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
								发布时间 : &nbsp;<?php echo $data2->news_time?> 
							</center>
						</div>
						<div id="line2">
							<?php echo $data2->news_content?>
						</div>
					</div>
				</div>
			</div>
</body>
</html>