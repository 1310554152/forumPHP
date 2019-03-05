<?php
//初始化session
session_start();
//包含数据库连接文件
require ('conn.php');
$user_id=$_SESSION['user_id'];
//取得论坛公告列表
$sql11="select * from news where news_kind='1' ORDER BY news_time DESC limit 0,5";
$query11=mysql_query($sql11);

//取得新闻列表
$sql12="select * from news where news_kind='2' ORDER BY news_time DESC limit 0,5";
$query12=mysql_query($sql12);

//取得广告列表
$sql13="select * from news where news_kind='3' ORDER BY news_time DESC limit 0,5";
$query13=mysql_query($sql13);

?>


<html>
<head>
	<title>右半部分</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- CSS链接 -->
	<link href="css/index-right.css" type="text/css" rel="stylesheet">
</head>

<body>
			<!-- 右半部分 -->
			<div id="right">
				<div id="block">
					<div id="block-top">
						个人中心
					</div>
					<div id="block-main">
						<div id="list">
							<img src="images/num_3.gif"> <a href="i.php">个人资料</a>
						</div>
						<div id="list">
							<img src="images/num_1.gif"> <a href="i-edit.php">修改资料</a>
						</div>
						<div id="list">
							<img src="images/num_2.gif"> <a href="i-avatar.php">修改头像</a>
						</div>
						<div id="list">
							<img src="images/num_4.gif"> <a href="i-friend.php">我的好友</a>
						</div>
						<div id="list">
							<img src="images/num_5.gif"> <a href="i-post.php">我的帖子</a>
						</div>
						<div id="list">
							<img src="images/num_6.gif"> <a href="i-collection.php">我的收藏</a>
						</div>
					</div>
				</div>
				<div id="block">
					<div id="block-top">
						我的热帖
					</div>
					<div id="block-main">
						<?php for($i=1;$i<6;$i++){ ?>
						<div id="list">
						<img src="images/num_<?php echo $i?>.gif"> 我的热帖热帖热帖
						</div>
						<?php } ?>
					</div>
				</div>
				<div id="block">
					<div id="block-top">
						论坛公告
					</div>
					<div id="block-main">
						<?php
							$i=1;
							while($data11=mysql_fetch_object($query11)){
						?>
						<div id="list">
						<img src="images/num_<?php echo $i++?>.gif"> <a href="news-detail.php?news_kind=1&&news_id=<?php echo $data11->news_id?>"><?php echo $data11->news_title?></a>
						</div>
						<?php } ?>
					</div>
				</div>
				<div id="block">
					<div id="block-top">
						广而告之
					</div>
					<div id="block-main">
						<?php
							$i=1;
							while($data12=mysql_fetch_object($query12)){
						?>
						<div id="list">
						<img src="images/num_<?php echo $i++?>.gif"> <a href="news-detail.php?news_kind=2&&news_id=<?php echo $data12->news_id?>"><?php echo $data12->news_title?></a>
						</div>
						<?php } ?>
					</div>
				</div>
				<div id="block">
					<div id="block-top">
						广而告之
					</div>
					<div id="block-main">
						<?php
							$i=1;
							while($data13=mysql_fetch_object($query13)){
						?>
						<div id="list">
						<img src="images/num_<?php echo $i++?>.gif"> <a href="news-detail.php?news_kind=3&&news_id=<?php echo $data13->news_id?>"><?php echo $data13->news_title?></a>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
</body>
</html>