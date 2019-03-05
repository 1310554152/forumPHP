<?php
//初始化session
session_start();
//包含数据库连接文件
require ('conn.php');
$user_id=$_SESSION['user_id'];
//取得论坛公告列表
$sql101="select * from news where news_kind='1' ORDER BY news_time DESC limit 0,3";
$query101=mysql_query($sql101);

//取得学校新闻列表
$sql102="select * from news where news_kind='2' ORDER BY news_time DESC limit 0,3";
$query102=mysql_query($sql102);

//取得广告列表
$sql103="select * from news where news_kind='3' ORDER BY news_time DESC limit 0,5";
$query103=mysql_query($sql103);

//取得新帖子列表
$sql104="select * from post ORDER BY post_time DESC limit 0,5";
$query104=mysql_query($sql104);

//取得活跃会员列表
$sql105="select * from user ORDER BY user_regtime DESC limit 0,3";
$query105=mysql_query($sql105);

//取得活跃会员列表
//$sql105="select * from user ORDER BY user_regtime DESC limit 0,5";
//$query105=mysql_query($sql105);

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
						论坛公告
					</div>
					<div id="block-main">
						<?php
							$i=1;
							while($data101=mysql_fetch_object($query101)){
						?>
						<div id="list">
						<img src="images/num_<?php echo $i++?>.gif"> <a href="news-detail.php?news_kind=1&&news_id=<?php echo $data101->news_id?>"><?php echo $data101->news_title?></a>
						</div>
						<?php } ?>
					</div>
				</div>
				<div id="block">
					<div id="block-top">
						论坛动态
					</div>
					<div id="block-main">
						<?php
							$i=1;
							while($data102=mysql_fetch_object($query102)){
						?>
						<div id="list">
						<img src="images/num_<?php echo $i++?>.gif"> <a href="news-detail.php?news_kind=2&&news_id=<?php echo $data102->news_id?>"><?php echo $data102->news_title?></a>
						</div>
						<?php } ?>
					</div>
				</div>
				<div id="block">
					<div id="block-top">
						活跃会员
					</div>
					<div id="block-main">
					<?php while($data105=mysql_fetch_object($query105)){ ?>
						<div id="plate">
							<div id="photo">
								<img src="<?php echo $data105->user_avatar_small?>">
							</div>
							<div id="text">
								<font color="#9900CC">昵称：<?php echo $data105->user_name?></font><br>
								帖子：15 <font color="#ff0000">|</font> 等级：<?php echo $data105->user_level?>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
				<div id="block">
					<div id="block-top">
						本站新帖
					</div>
					<div id="block-main">
						<?php
							$i=1;
							while($data104=mysql_fetch_object($query104)){
						?>
						<div id="list">
						<img src="images/num_<?php echo $i++?>.gif"> <a href="pinglun.php?post_id=<?php echo $data104->post_id?>"><?php echo $data104->post_topic?></a>
						</div>
						<?php } ?>
					</div>
				</div>
				
				
			</div>
</body>
</html>