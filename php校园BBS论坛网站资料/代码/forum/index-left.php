<?php
//初始化session
session_start();
//包含数据库连接文件
require ('conn.php');
//提取首页显示的板块信息
//1
$sql1="select * from block where block_id=1";
$query1=mysql_query($sql1);
$data1=mysql_fetch_object($query1);
//2
$sql2="select * from block where block_id=2";
$query2=mysql_query($sql2);
$data2=mysql_fetch_object($query2);
//3
$sql3="select * from block where block_id=3";
$query3=mysql_query($sql3);
$data3=mysql_fetch_object($query3);
//4
$sql4="select * from block where block_id=4";
$query4=mysql_query($sql4);
$data4=mysql_fetch_object($query4);
//5
$sql5="select * from block where block_id=5";
$query5=mysql_query($sql5);
$data5=mysql_fetch_object($query5);
//6
$sql6="select * from block where block_id=6";
$query6=mysql_query($sql6);
$data6=mysql_fetch_object($query6);
//7
$sql7="select * from block where block_id=7";
$query7=mysql_query($sql7);
$data7=mysql_fetch_object($query7);
//8
$sql8="select * from block where block_id=8";
$query8=mysql_query($sql8);
$data8=mysql_fetch_object($query8);
//9
$sql9="select * from block where block_id=9";
$query9=mysql_query($sql9);
$data9=mysql_fetch_object($query9);
//10
$sql10="select * from block where block_id=10";
$query10=mysql_query($sql10);
$data10=mysql_fetch_object($query10);
//11
$sql11="select * from block where block_id=11";
$query11=mysql_query($sql11);
$data11=mysql_fetch_object($query11);
//12
$sql12="select * from block where block_id=12";
$query12=mysql_query($sql12);
$data12=mysql_fetch_object($query12);
//13
$sql13="select * from block where block_id=13";
$query13=mysql_query($sql13);
$data13=mysql_fetch_object($query13);
//14
$sql14="select * from block where block_id=14";
$query14=mysql_query($sql14);
$data14=mysql_fetch_object($query14);
//15
$sql15="select * from block where block_id=15";
$query15=mysql_query($sql15);
$data15=mysql_fetch_object($query15);
//16
$sql16="select * from block where block_id=16";
$query16=mysql_query($sql16);
$data16=mysql_fetch_object($query16);
//17
$sql17="select * from block where block_id=17";
$query17=mysql_query($sql17);
$data17=mysql_fetch_object($query17);
//18
$sql18="select * from block where block_id=18";
$query18=mysql_query($sql18);
$data18=mysql_fetch_object($query18);
//19
$sql19="select * from block where block_id=19";
$query19=mysql_query($sql19);
$data19=mysql_fetch_object($query19);
//20
$sql20="select * from block where block_id=20";
$query20=mysql_query($sql20);
$data20=mysql_fetch_object($query20);
//21
$sql21="select * from block where block_id=21";
$query21=mysql_query($sql21);
$data21=mysql_fetch_object($query21);
//22
$sql22="select * from block where block_id=22";
$query22=mysql_query($sql22);
$data22=mysql_fetch_object($query22);
//22
$sql22="select * from block where block_id=22";
$query22=mysql_query($sql22);
$data22=mysql_fetch_object($query22);
//23
$sql23="select * from block where block_id=23";
$query23=mysql_query($sql23);
$data23=mysql_fetch_object($query23);
//24
$sql24="select * from block where block_id=24";
$query24=mysql_query($sql24);
$data24=mysql_fetch_object($query24);
?>

<html>
<head>
	<title>左半部分</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- CSS链接 -->
	<link href="css/index-left.css" type="text/css" rel="stylesheet">
</head>

<body>
			<!-- 左半部分 -->
			<div id="left">
				<div id="area">
					<div id="area-top">
					  简历经验交流</div>
					<div id="area-main">
						<div id="line1">
							<div id="line-left">
								<div id="photo">
									<img src="<?php echo $data1->block_icon?>">
								</div>
								<div id="bankuai">
									<div id="bankuai-top">
										<a href="block.php?block_id=<?php echo $data1->block_id?>"><?php echo $data1->block_name?></a>
									</div>
									<div id="bankuai-bottom">
										帖子：<?php echo $data1->block_number?> <font color="#ff0000">|</font>
									</div>
								</div>
							</div>
							<div id="line-right">
								<div id="photo">
									<img src="<?php echo $data2->block_icon?>">
								</div>
								<div id="bankuai">
									<div id="bankuai-top">
										<a href="block.php?block_id=<?php echo $data2->block_id?>"><?php echo $data2->block_name?></a>
									</div>
									<div id="bankuai-bottom">
										帖子：<?php echo $data2->block_number?> <font color="#ff0000">|</font>
									</div>
								</div>
							</div>
						</div>
						<div id="line2">
							<div id="line-left">
								<div id="photo">
									<img src="<?php echo $data3->block_icon?>">
								</div>
								<div id="bankuai">
									<div id="bankuai-top">
										<a href="block.php?block_id=<?php echo $data3->block_id?>"><?php echo $data3->block_name?></a>
									</div>
									<div id="bankuai-bottom">
										帖子：<?php echo $data3->block_number?> <font color="#ff0000">|</font>
									</div>
								</div>
							</div>
							<div id="line-right">
								<div id="photo">
									<img src="<?php echo $data4->block_icon?>">
								</div>
								<div id="bankuai">
									<div id="bankuai-top">
										<a href="block.php?block_id=<?php echo $data4->block_id?>"><?php echo $data4->block_name?></a>
									</div>
									<div id="bankuai-bottom">
										帖子：<?php echo $data4->block_number?> <font color="#ff0000">|</font>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="area">
					<div id="area-top">
					  与HR互动</div>
					<div id="area-main">
						<div id="line1">
							<div id="line-left">
								<div id="photo">
									<img src="<?php echo $data5->block_icon?>">
								</div>
								<div id="bankuai">
									<div id="bankuai-top">
										<a href="block.php?block_id=<?php echo $data5->block_id?>"><?php echo $data5->block_name?></a>
									</div>
									<div id="bankuai-bottom">
										帖子：<?php echo $data5->block_number?> <font color="#ff0000">|</font>
									</div>
								</div>
							</div>
							<div id="line-right">
								<div id="photo">
									<img src="<?php echo $data6->block_icon?>">
								</div>
								<div id="bankuai">
									<div id="bankuai-top">
										<a href="block.php?block_id=<?php echo $data6->block_id?>"><?php echo $data6->block_name?></a>
									</div>
									<div id="bankuai-bottom">
										帖子：<?php echo $data6->block_number?> <font color="#ff0000">|</font>
									</div>
								</div>
							</div>
						</div>
						<div id="line2">
							<div id="line-left">
								<div id="photo">
									<img src="<?php echo $data7->block_icon?>">
								</div>
								<div id="bankuai">
									<div id="bankuai-top">
										<a href="block.php?block_id=<?php echo $data7->block_id?>"><?php echo $data7->block_name?></a>
									</div>
									<div id="bankuai-bottom">
										帖子：<?php echo $data7->block_number?> <font color="#ff0000">|</font>
									</div>
								</div>
							</div>
							<div id="line-right">
								<!-- <div id="photo">
									<img src="<?php echo $data1->block_icon?>">
								</div>
								<div id="bankuai">
									<div id="bankuai-top">
										<a href="block.php?block_id=<?php echo $data1->block_id?>"><?php echo $data1->block_name?></a>
									</div>
									<div id="bankuai-bottom">
										帖子：<?php echo $data1->block_number?> <font color="#ff0000">|</font>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
				


				<div id="area">
					<div id="area-top">
						就业相关
					</div>
					<div id="area-main">
						<div id="line1">
							<div id="line-left">
								<div id="photo">
									<img src="<?php echo $data18->block_icon?>">
								</div>
								<div id="bankuai">
									<div id="bankuai-top">
										<a href="block.php?block_id=<?php echo $data18->block_id?>"><?php echo $data18->block_name?></a>
									</div>
									<div id="bankuai-bottom">
										帖子：<?php echo $data18->block_number?> <font color="#ff0000">|</font>
									</div>
								</div>
							</div>
							<div id="line-right">
								<div id="photo">
									<img src="<?php echo $data19->block_icon?>">
								</div>
								<div id="bankuai">
									<div id="bankuai-top">
										<a href="block.php?block_id=<?php echo $data19->block_id?>"><?php echo $data19->block_name?></a>
									</div>
									<div id="bankuai-bottom">
										帖子：<?php echo $data19->block_number?> <font color="#ff0000">|</font>
									</div>
								</div>
							</div>
						</div>
						<div id="line2">
							<div id="line-left">
								<div id="photo">
									<img src="<?php echo $data20->block_icon?>">
								</div>
								<div id="bankuai">
									<div id="bankuai-top">
										<a href="block.php?block_id=<?php echo $data20->block_id?>"><?php echo $data20->block_name?></a>
									</div>
									<div id="bankuai-bottom">
										帖子：<?php echo $data20->block_number?> <font color="#ff0000">|</font>
									</div>
								</div>
							</div>
							<div id="line-right">
								<div id="photo">
									<img src="<?php echo $data21->block_icon?>">
								</div>
								<div id="bankuai">
									<div id="bankuai-top">
										<a href="block.php?block_id=<?php echo $data21->block_id?>"><?php echo $data21->block_name?></a>
									</div>
									<div id="bankuai-bottom">
										帖子：<?php echo $data21->block_number?> <font color="#ff0000">|</font>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div id="area">
					<div id="area-top">
						本站统计
					</div>
					<div id="area-main">
						<div id="tongji1">
							本站用户标识 ： &nbsp;超级管理员 ： &nbsp;<img src="images/super_admin.gif">&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;管理员 ： &nbsp;<img src="images/admin.gif">&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;版主 ： &nbsp;<img src="images/moderator.gif">&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;会员 ： &nbsp;<img src="images/member.gif">&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;游客 ： &nbsp;<img src="images/guest.gif">
						</div>
						<div id="tongji2">
							本站访问次数 : <?php require("count.php"); ?> &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
							本站帖子总数 : <?php
												$sql200="select * from post";
												$query200=mysql_query($sql200);
												$number=mysql_num_rows($query200);
												echo $number;
											?> &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
							本站会员个数 : <?php
												$sql201="select * from user";
												$query201=mysql_query($sql201);
												$number201=mysql_num_rows($query201);
												echo $number201;
											?> &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
							本站在线人数 : <?php
												$sql202="select * from online";
												$query202=mysql_query($sql202);
												$number202=mysql_num_rows($query202);
												echo $number202;
											?>
						</div>
					</div>
				</div>
			</div>
</body>
</html>