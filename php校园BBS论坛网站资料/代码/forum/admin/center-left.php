<html>
<head>
<title>左部文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chili-1.7.pack.js"></script>
<script type="text/javascript" src="js/jquery.easing.js"></script>
<script type="text/javascript" src="js/jquery.dimensions.js"></script>
<script type="text/javascript" src="js/jquery.accordion.js"></script>
<script language="javascript">
	jQuery().ready(function(){
		jQuery('#navigation').accordion({
			header: '.head',
			navigation1: true,
			event: 'click',
			fillSpace: true,
			animated: 'bounceslide'
		});
	});
</script>

<link rel="stylesheet" type="text/css" href="css/center-left.css">
</head>

<body style= "overflow-x:hidden">
<div  style="height:100%;">
	<ul id="navigation">
		<li><a class="head">管理首页</a>
			<ul>
				<li><a href="center-right.php" target="rightFrame">后台首页</a></li>
			</ul>
		</li>
		<li><a class="head">用户管理</a>
			<ul>
				<li><a href="user-list.php" target="rightFrame">用户列表</a></li>
				<li><a href="user-add.php" target="rightFrame">新增用户</a></li>
			</ul>
		</li>
		<li><a class="head">新闻管理</a>
			<ul>
				<li><a href="news-list.php" target="rightFrame">新闻列表</a></li>
				<li><a href="news-add.php" target="rightFrame">发布新闻</a></li>
			</ul>
		</li>
		<li><a class="head">版块管理</a>
			<ul>
				<li><a href="block-list.php" target="rightFrame">板块列表</a></li>
				<li><a href="block-add.php" target="rightFrame">添加板块</a></li>
			</ul>
		</li>
		<li> <a class="head">帖子管理</a>
			<ul>
				<li><a href="post-list.php" target="rightFrame">帖子列表</a></li>
			</ul>
		</li>
		<li><a class="head">评论管理</a>
			<ul>
				<li><a href="reply-list.php" target="rightFrame">评论列表</a></li>
			</ul>
		</li>

	</ul>
</div>
</body>
</html>


<!--

【让浏览器窗口永远都不出现滚动条 】

没有水平滚动条

<body style= "overflow-x:hidden ">

没有垂直滚动条

<body style= "overflow-y:hidden ">

没有滚动条

<body style= "overflow-x:hidden;overflow-y:hidden ">
或<body style= "overflow:hidden ">

没有滚动条但是可以滚动

<body scroll="no">

-->