<?php
//初始化session
session_start();
//包含数据库连接文件
require ('conn.php');
//提取当前用户个人信息
$user_id=$_SESSION['user_id'];
$sql1="select * from user where user_id='$user_id'";
$query1=mysql_query("$sql1",$conn);
$data1=mysql_fetch_object($query1);

//get传值，使用上一个页面传过来的post_id
$post_id=$_GET['post_id'];
$sql2="select * from post,user where post_id='$post_id' and post.user_id=user.user_id";
$query2=mysql_query("$sql2",$conn);
$data2=mysql_fetch_object($query2);

//实现浏览次数的统计：
$sql100="select post_views from post where post_id='$post_id'";
$query100=mysql_query($sql100);
$data100=mysql_fetch_object($query100);
$m=$data100->post_views+1;
$sql101="update post set post_views='$m' where post_id='$post_id'";
mysql_query($sql101);

//评论部分SQL语句(包括加载评论和发表评论)
$ip=getenv(REMOTE_ADDR);
if($_POST['submit1'])
{
	if($user_id=='')
	{
		echo "<html><body><center><br><br><br><br><br>对不起，您还没有登录，请<a href='login.php'>登录</a>后再发表评论！</center></body></html>";
		exit;
	}
	$sql3="insert into reply(reply_content,reply_time,user_id,post_id,reply_ip) values('$_POST[content]',now(),'$user_id','$post_id','$ip')";
	$success=mysql_query($sql3);
	//实现回复次数的统计：
	$sql102="select post_replies from post where post_id='$post_id'";
	$query102=mysql_query($sql102);
	$data102=mysql_fetch_object($query102);
	$n=$data102->post_replies+1;
	$sql103="update post set post_replies='$n' where post_id='$post_id'";
	mysql_query($sql103);
	//如果回复成功
	if($success)
	echo "<script language='javascript'>window.location.href='javascript:history.back(1)';</script>";
	exit;
}
//分页部分--------------------------------------------------------------------------------------------------------------
//假如 当前页数是$page 每页有$page_size 这个$page是动态获取的。如果没有获取到$_GET['page'] 说明是第一页，所以$page=0;
//limit 0,5表示的是从第一条开始，取5条内容，$pageval表示limit后面的第一个数字
$page=0;
$pageval=0;
$page_size=5;
if($_GET['page'])
{
	$page = $_GET['page']-1;
	$pageval = ($page*$page_size);
}
$sql5="select * from reply,user where post_id='$post_id' and reply.user_id=user.user_id";
$query5=mysql_query("$sql5",$conn);
$num=mysql_num_rows($query5);
$max_page=intval($num/$page_size)+1;

//显示评论列表部分：使用SQL控制
$sql4="select * from reply,user where post_id='$post_id' and reply.user_id=user.user_id ORDER BY reply_time DESC limit $pageval,$page_size";
$query4=mysql_query("$sql4",$conn);
//以上是分页代码部分-------------------------------------------------------------------------------------------------
?>




<!-- HTML部分 ----------------------------------------------------------------------------------------------->
<html>
<head>
	<title>校园论坛</title>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
	<!-- CSS链接 -->
	<link href="css/pinglun.css" type="text/css" rel="stylesheet">
		<script charset="utf-8" src="kindeditor/kindeditor.js"></script>
		<script>
			KE.show({
				id : 'content2',
				resizeMode : 0,
				allowPreviewEmoticons : false,
				allowUpload : false,
				items : [
				'fontname', 'fontsize', '|', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
				'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
				'insertunorderedlist', '|', 'emoticons', 'image', 'link']
			});
		</script>
</head>
<!-- 验证用户名或密码不能为空 ------------------------------------------------------------------------------------------->
<script language="javascript">
function checkpost()
{
	//如果用户名和密码都不为空，则返回iuture
	if((huifu.content.value!=""))
	{
		return ture
	}
	else
	{
		alert("请填写评论内容！")
		return false
	}
}
</script>
<!--  ------------------------------------------------------------------------------------------------------------------>
<body>
<a name="top"></a>
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
			<!-- 发帖和分页代码部分 ---------------------------------------------------->
			<div id="fenye">
				<div id="fatie">
					<a href="post.php">发 表 帖 子</a>
				</div>
				<div id="yema">
					<div class="sabrosus">
					<a href="pinglun.php?page=1&&post_id=<?php echo $post_id?>"> <?php echo "<<"?> </a>
					<?php if($page!=0){?><a href="pinglun.php?page=<?php echo $page?>&&post_id=<?php echo $post_id?>"> < </a>
					<?php }else { ?><a> < </a> <?php }?>
					<?php for($j=1;$j<=$max_page;$j++){ echo "<a href='pinglun.php?page=$j&&post_id=$post_id'>$j</a>"; } ?>
					<?php if(($page+1)<$max_page){?><a href="pinglun.php?page=<?php echo ($page+2); ?>&&post_id=<?php echo $post_id?>"> > </a>
					<?php } else {?> <a> > </a> <?php }?>
					<a href="pinglun.php?page=<?php echo $max_page?>&&post_id=<?php echo $post_id?>"> <?php echo ">>"?> </a></div>
				</div>
			</div>
			<!-- 帖子内容部分（帖子正文部分） ----------------------------------------------------------->
			<div id="detail1">
				<div id="detail1-left">
					<div id="detail1-left">
					<div id="detail1-left-top">
						作者：<?php echo $data2->user_name; ?>
					</div>
					<div id="detail1-left-mid">
						<div id="photo">
							<img src="<?php echo $data2->user_avatar; ?>">
						</div>
					</div>
					<div id="detail1-left-bot">
						ID&nbsp; ： <?php echo $data2->user_id; ?><br>
						LV&nbsp; ： <?php echo $data2->user_level; ?><br>
						EP ： <?php echo $data2->user_experience; ?>
					</div>
				</div>
				</div>
				<div id="detail1-right">
					<div id="detail1-right-top">
						帖子主题：<?php echo $data2->post_topic; ?>
					</div>
					<div id="detail1-right-top1">
						<div id="detail1-right-top1-left">
							发表时间：<?php echo $data2->post_time; ?> &nbsp;|&nbsp; 阅读：<?php echo $data2->post_views; ?> &nbsp;|&nbsp; 回复：<?php echo $data2->post_replies; ?>
						</div>
						<div id="detail1-right-top1-right">
							收藏 &nbsp;|&nbsp; <a href="#bottom">回复</a>
						</div>
					</div>
					<div id="detail1-right-bot">
						<?php echo $data2->post_content; ?>
					</div>
				</div>
			</div>
			<!-- 帖子回复内容（回复列表）部分 --------------------------------------------------------------------------------->
			<?php
			$i=($page*$page_size)+1;
				while($data4=mysql_fetch_object($query4))
				{
			?>
			<div id="detail2">
				<div id="detail2-left">
					<div id="detail2-left-top">
						昵称：<?php echo $data4->user_name; ?>
					</div>
					<div id="detail2-left-mid">
						<div id="photo">
							<img src="<?php echo $data4->user_avatar; ?>">
						</div>
					</div>
					<div id="detail2-left-bot">
						ID&nbsp; ： <?php echo $data4->user_id; ?><br>
						LV&nbsp; ： <?php echo $data4->user_level; ?><br>
						EP ： <?php echo $data4->user_experience; ?>
					</div>
				</div>
				<div id="detail2-right">
					<div id="detail2-right-top">
						IP：<?php echo $data4->reply_ip; ?> &nbsp;|&nbsp; 发表时间 ： <?php echo $data4->reply_time; ?> &nbsp;|&nbsp; <a href="#top">回顶</a> |&nbsp; <a href="#bottom">回复</a> |&nbsp; 引用 |&nbsp; 第 <font color="#ff0000"><?php echo $i++?></font> &nbsp;楼
					</div>
					<div id="detail2-right-bot">
						<?php echo $data4->reply_content; ?>
					</div>
				</div>
			</div>
			<?php
				}
			?>
			<!-- 发帖和分页代码部分 ------------------------------------------------------------------------------------>
			<div id="fenye">
				<div id="fatie">
					发 表 评 论
				</div>
				<div id="yema">
					<div class="sabrosus">
					<a href="pinglun.php?page=1&&post_id=<?php echo $post_id?>"> <?php echo "<<"?> </a>
					<?php if($page!=0){?><a href="pinglun.php?page=<?php echo $page?>&&post_id=<?php echo $post_id?>"> < </a>
					<?php }else { ?><a> < </a> <?php }?>
					<?php for($j=1;$j<=$max_page;$j++){ echo "<a href='pinglun.php?page=$j&&post_id=$post_id'>$j</a>"; } ?>
					<?php if(($page+1)<$max_page){?><a href="pinglun.php?page=<?php echo ($page+2); ?>&&post_id=<?php echo $post_id?>"> > </a>
					<?php } else {?> <a> > </a> <?php }?>
					<a href="pinglun.php?page=<?php echo $max_page?>&&post_id=<?php echo $post_id?>"> <?php echo ">>"?> </a></div>
				</div>
			</div>
			<!-- 帖子回复框部分 --------------------------------------------------------------------------------------->
			<div id="detail3">
				<div id="detail3-left">
					<div id="detail3-left-top">
						昵称：<?php echo $data1->user_name; ?>
					</div>
					<div id="detail3-left-mid">
						<div id="photo">
							<?php
								if($user_id=="")
									echo "<img src='user_avatar/avatar.jpg'>";
								else
									echo "<img src=".$data1->user_avatar.">";
							?>
						</div>
					</div>
					<div id="detail3-left-bot">
						ID&nbsp; ： <?php echo $data1->user_id; ?><br>
						LV&nbsp; ： <?php echo $data1->user_level; ?><br>
						EP ： <?php echo $data1->user_experience; ?>
					</div>
				</div>
				<div id="detail3-right">
					<form name="huifu" action="" method="post" onsubmit="return checkpost()">
					<textarea id="content2" name="content" style="width:680px;height:200px;visibility:hidden;"> </textarea>
					<br>
					<input class="input1" name="submit1" type="submit" value="发表回复">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;温馨提示：写完评论内容后请将鼠标在编辑器以外区域点一下，否则得提交两次才能回复成功！
					</form>
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
<a name="bottom"></a>
</body>

</html>