<?php
//初始化session
session_start();
//包含数据库连接文件
require ('conn.php');
$user_id=$_SESSION['user_id'];
//接收首页传递过来的block_id值
$block_id=$_GET['block_id'];
//提取板块详细信息
$sql2="select * from block,user where block.block_id='$block_id' and block.user_id=user.user_id";
$query2=mysql_query($sql2);
$data2=mysql_fetch_object($query2);
//提取版主姓名及相关信息
//$banzhu=$data2->user_id;
//$sql3="select user_name from user where user_id='$banzhu'"
//查询需要在板块列表上显示的帖子------------------因为分页注释部分
				//$sql1="select * from post,user where post.block_id = '$block_id' and post.user_id = user.user_id";
				//$query1=mysql_query("$sql1",$conn);
/*繁琐的SQL语句------------------------------
$data1=mysql_fetch_object($query1);

$user_id1=$data1->user_id;
$sql2="select * from user where user_id='$user_id1'";
$query2=mysql_query("$sql2",$conn);
$data2=mysql_fetch_object($query2);
$post_id1=$data1->post_id;
$sql3="select * from reply where post_id='$post_id1'";
$query3=mysql_query("$sql3",$conn);
$data3=mysql_fetch_object($query3);
----------------------------------------------*/
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
$sql5="select * from post,user where post.block_id = '$block_id' and post.user_id = user.user_id";
$query5=mysql_query("$sql5",$conn);
$num=mysql_num_rows($query5);
$max_page=intval($num/$page_size)+1;

//显示帖子列表部分：使用SQL控制
$sql1="select * from post,user where post.block_id = '$block_id' and post.user_id = user.user_id ORDER BY post.post_time DESC limit $pageval,$page_size";
$query1=mysql_query("$sql1",$conn);
//以上是分页代码部分-------------------------------------------------------------------------------------------------

?>

<html>
<head>
	<title>简历交流轮坛</title>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
	<!-- CSS链接 -->
	<link href="css/block.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css.css" media="all" />
</head>

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
			<!-- 板块详细信息部分 ----------------------------------------------------------->
			<div id="detail">
				<div id="photo">
					<img src="<?php echo $data2->block_icon?>">
				</div>
				<div id="text">
					<div id="text-top">
						<font color="red"><?php echo $data2->block_name?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#6600ff">版主：<?php echo $data2->user_name?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						帖子：<?php echo $data2->block_number?> <font color="#ff0000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font> 动态：125
					</div>
					<div id="text-bottom">
						板块主题：<?php echo $data2->block_explain?>
					</div>
				</div>
				<div id="text1">
					<div id="text-top">
						<font color="red">收藏本版</font>
					</div>
					<div id="text-bottom">
						<font color="#cc3300">查看新帖</font>
					</div>
				</div>
			</div>
			<!-- 发帖和分页代码部分 ---------------------------------------------------->
			<div id="fenye">
				<div id="fatie">
					<a href="post.php">发 表 帖 子</a>
				</div>
				<div id="yema">
					<div class="sabrosus">
					<a href="block.php?page=1&&block_id=<?php echo $block_id?>"> <?php echo "<<"?> </a>
					<?php if($page!=0){?><a href="block.php?page=<?php echo $page?>&&block_id=<?php echo $block_id?>"> < </a>
					<?php }else { ?><a> < </a> <?php }?>
					<?php for($j=1;$j<=$max_page;$j++){ echo "<a href='block.php?page=$j&&block_id=$block_id'>$j</a>"; } ?>
					<?php if(($page+1)<$max_page){?><a href="block.php?page=<?php echo ($page+2); ?>&&block_id=<?php echo $block_id?>"> > </a>
					<?php } else {?> <a> > </a> <?php }?>
					<a href="block.php?page=<?php echo $max_page?>&&block_id=<?php echo $block_id?>"> <?php echo ">>"?> </a></div>
				</div>
			</div>
			<!-- 帖子列表部分 ---------------------------------------------------------------->
			<div id="list">
				<div id="xiangmu">
					<div id="xiangmu1">
						帖子主题
					</div>
					<div id="xiangmu2">
						帖子作者
					</div>
					<div id="xiangmu3">
						回复次数
					</div>
					<div id="xiangmu4">
						浏览次数
					</div>
					<div id="xiangmu5">
						发表时间
					</div>
				</div>
				<?php
					$i=($page*$page_size)+1;
					while($data1=mysql_fetch_object($query1))
					{
				?>
				<div id='liebiao'>
					<div id='liebiao1'>
						<?php echo $i++?> . <a href="pinglun.php?post_id=<?php echo $data1->post_id?>"><?php echo $data1->post_topic; ?></a>
					</div>
					<div id='liebiao2'>
						<?php echo $data1->user_name; ?>
					</div>
					<div id='liebiao3'>
						<?php echo $data1->post_replies;?>
					</div>
					<div id='liebiao4'>
						<?php echo $data1->post_views;?>
					</div>
					<div id='liebiao5'>
						<?php echo $data1->post_time; ?>
					</div>
				</div>
				<?php
					}
				?>
				<!-- 发帖和分页代码部分 ---------------------------------------------------->
				<div id="fenye1">
					<div id="fatie">
						<a href="post.php">发 表 帖 子</a>
					</div>
					<div id="yema">
						<div class="sabrosus">
						<a href="block.php?page=1&&block_id=<?php echo $block_id?>"> <?php echo "<<"?> </a>
						<?php if($page!=0){?><a href="block.php?page=<?php echo $page?>&&block_id=<?php echo $block_id?>"> < </a>
						<?php }else { ?><a> < </a> <?php }?>
						<?php for($j=1;$j<=$max_page;$j++){ echo "<a href='block.php?page=$j&&block_id=$block_id'>$j</a>"; } ?>
						<?php if(($page+1)<$max_page){?><a href="block.php?page=<?php echo ($page+2); ?>&&block_id=<?php echo $block_id?>"> > </a>
						<?php } else {?> <a> > </a> <?php }?>
						<a href="block.php?page=<?php echo $max_page?>&&block_id=<?php echo $block_id?>"> <?php echo ">>"?> </a></div>
					</div>
				</div>
			</div>
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