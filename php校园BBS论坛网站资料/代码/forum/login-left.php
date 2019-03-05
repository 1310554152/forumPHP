<html>
<head>
	<title>登录中心</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- CSS链接 -->
	<link href="css/login-left.css" type="text/css" rel="stylesheet">
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
						登录中心：请正确填写您的昵称和密码
					</div>
					<div id="area-main">
						<form action="login_check.php" method="post" name="login" onsubmit="return checklogin()" class="form-head">
						<div id="line">
							<img src="images/login.jpg">
						</div>
						<div id="line1">
							I&nbsp;&nbsp;&nbsp; D ： <input class="input1" type="text" name="user_id" size="50">
						</div>
						<div id="line1">
							密码 ： <input class="input1" type="password" name="password" size="56">
						</div>
						<div id="line2">
							<input class="button" type="submit" name="submit" value="登录论坛">
						</div>
						</form>
					</div>
				</div>
			</div>
</body>
</html>