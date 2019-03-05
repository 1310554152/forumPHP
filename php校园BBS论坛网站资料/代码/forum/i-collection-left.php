<?php
//初始化session
session_start();
//包含数据库连接文件
require ('conn.php');
//取得当前用户的ID
$user_id=$_SESSION['user_id'];
//取得当前用户的帖子信息----因分页而注释部分--------------------------------------------------------------------------
		//$sql1="select * from post where post.user_id='$user_id'";
		//$query1=mysql_query($sql1);

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
$sql2="select * from post where post.user_id='$user_id'";
$query2=mysql_query("$sql2",$conn);
$num=mysql_num_rows($query2);
$max_page=intval($num/$page_size)+1;

//显示评论列表部分：使用SQL控制
$sql1="select * from post where post.user_id='$user_id' limit $pageval,$page_size";
$query1=mysql_query("$sql1",$conn);
//以上是分页代码部分-------------------------------------------------------------------------------------------------

?>

<html>
<head>
	<title>注册中心</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- CSS链接 -->
	<link href="css/i-post-left.css" type="text/css" rel="stylesheet">
</head>

<body>
			<!-- 左半部分 -->
			<div id="left">
				<div id="area">
					<div id="area-top">
						我的帖子列表
					</div>
					<div id="area-main">
						<div id="line">
							<div id="line-left">
								帖子主题
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
								<?php echo $i++?> . <a href="pinglun.php?post_id=<?php echo $data1->post_id?>"><?php echo $data1->post_topic; ?></a>
							</div>
							<div id="line-center">
								<?php echo $data1->post_views?>
							</div>
							<div id="line-right">
								<?php echo $data1->post_time?>
							</div>
						</div>
						<?php } ?>
						<div id="line2">
							<div class="sabrosus">
							<a href="i-post.php?page=1"> <?php echo "<<"?> </a>
							<?php if($page!=0){?><a href="i-post.php?page=<?php echo $page?>"> < </a>
							<?php }else { ?><a> < </a> <?php }?>
							<?php for($j=1;$j<=$max_page;$j++){ echo "<a href='i-post.php?page=$j'>$j</a>"; } ?>
							<?php if(($page+1)<$max_page){?><a href="i-post.php?page=<?php echo ($page+2); ?>"> > </a>
							<?php } else {?> <a> > </a> <?php }?>
							<a href="i-post.php?page=<?php echo $max_page?>"> <?php echo ">>"?> </a></div>
						</div>
					</div>
				</div>
			</div>
</body>
</html>