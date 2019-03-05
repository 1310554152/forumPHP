<html>
<head>
	<title>登录中心</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- CSS链接 -->
	<link href="css/friendlink-left.css" type="text/css" rel="stylesheet">
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
<body>
			<!-- 左半部分 -->
			<div id="left">
				<div id="area">
					<div id="area-top">
						友情链接
					</div>
					<div id="area-main">

						<div id="line1">
							<div id="line-left">
								<a href="http://www.sina.com.cn"><img src="friendlink/新浪.jpg"></a>
							</div>
							<div id="line-right">
								<a href="http://www.sohu.com"><img src="friendlink/搜狐.jpg"></a>
							</div>
						</div>
						<div id="line1">
							<div id="line-left">
								<a href="http://www.qq.com"><img src="friendlink/腾讯.jpg"></a>
							</div>
							<div id="line-right">
								<a href="http://www.163.com"><img src="friendlink/网易.jpg"></a>
							</div>
						</div>
						<div id="line1">
							<div id="line-left">
								<a href="http://www.pconline.com.cn/"><img src="friendlink/太平洋.jpg"></a>
							</div>
							<div id="line-right">
								<a href="http://www.zol.com.cn/"><img src="friendlink/中关村.jpg"></a>
							</div>
						</div>

						<div id="line2">
							<div id="line-left">
								<a href="http://www.baidu.com"><img src="friendlink/百度.jpg"></a>
							</div>
							<div id="line-right">
								<!-- <img src="friendlink/网易.jpg"> -->
							</div>
						</div>
					</div>
				</div>
			</div>
</body>
</html>