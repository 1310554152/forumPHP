<?php
//初始化session
session_start();
//包含数据库连接文件
require ('conn.php');
$user_id=$_SESSION['user_id'];
//接收传递过来的news_kind值
$news_kind=$_GET['news_kind'];

//分页部分--------------------------------------------------------------------------------------------------------------
//假如 当前页数是$page 每页有$page_size 这个$page是动态获取的。如果没有获取到$_GET['page'] 说明是第一页，所以$page=0;
//limit 0,5表示的是从第一条开始，取5条内容，$pageval表示limit后面的第一个数字
$page=0;
$pageval=0;
$page_size=10;
if($_GET['page'])
{
	$page = $_GET['page']-1;
	$pageval = ($page*$page_size);
}
$sql5="select * from news where news_kind='$news_kind'";
$query5=mysql_query("$sql5",$conn);
$num=mysql_num_rows($query5);
$max_page=intval($num/$page_size)+1;

//显示帖子列表部分：使用SQL控制
$sql1="select * from news where news_kind='$news_kind' ORDER BY news_time DESC limit $pageval,$page_size";
$query1=mysql_query("$sql1",$conn);
//以上是分页代码部分-------------------------------------------------------------------------------------------------

?>

<html>
<head>
	<title>注册中心</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- CSS链接 -->
	<link href="css/news-left.css" type="text/css" rel="stylesheet">
</head>

<body>
			<!-- 左半部分 -->
			<div id="left">
				<div id="area">
					<div id="area-top">
						新闻中心—	<?php 
										if($news_kind==1)echo "论坛公告";
										else if($news_kind==2)echo "学校新闻"; 
										else echo "广而告之";
									?>
					</div>
					<div id="area-main">
						<div id="line">
							<div id="line-left">
								新闻主题
							</div>
							<div id="line-center">
								阅读次数
							</div>
							<div id="line-right">
								发布时间
							</div>
						</div>
						<?php
							$i=($page*$page_size)+1;
							while($data1=mysql_fetch_object($query1))
							{
						?>
						<div id="line1">
							<div id="line-left">
								<?php echo $i++?> . <a href="news-detail.php?news_kind=<?php echo $news_kind?>&&news_id=<?php echo $data1->news_id?>"><?php echo $data1->news_title?></a>
							</div>
							<div id="line-center">
								<?php echo $data1->news_views?>
							</div>
							<div id="line-right">
								<?php echo $data1->news_time?>
							</div>
						</div>
						<?php } ?>
						<div id="line2">
							<div class="sabrosus">
							<a href="news.php?page=1&&news_kind=<?php echo $news_kind?>"> <?php echo "<<"?> </a>
							<?php if($page!=0){?><a href="news.php?page=<?php echo $page?>&&news_kind=<?php echo $news_kind?>"> < </a>
							<?php }else { ?><a> < </a> <?php }?>
							<?php for($j=1;$j<=$max_page;$j++){ echo "<a href='news.php?page=$j&&news_kind=$news_kind'>$j</a>"; } ?>
							<?php if(($page+1)<$max_page){?><a href="news.php?page=<?php echo ($page+2); ?>&&news_kind=<?php echo $news_kind?>"> > </a>
							<?php } else {?> <a> > </a> <?php }?>
							<a href="news.php?page=<?php echo $max_page?>&&news_kind=<?php echo $news_kind?>"> <?php echo ">>"?> </a></div>
						</div>
					</div>
				</div>
			</div>
</body>
</html>