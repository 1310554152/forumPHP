<html>
<head>
	<title>校园论坛</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- CSS链接 -->
	<link href="css/index.css" type="text/css" rel="stylesheet">
</head>

<body>
	<!-- 主面板 -->
<div id="container5">
	<div id="container4">
	<div id="container3">
	<div id="container2">
	<div id="container1">
	<div id="container">
		<div id="head">
		<?php require("head.php") ?>
		</div>
<?php
if($act=="sea")
{
	if($stitle=="")
	{
	echo "<script>alert('搜索条件不能为空');history.back();</script>";
	exit;
	}
?>
 <table width="950" border="0" align="center">
  <tr>
    <td height="30" colspan="3">搜索结果</td>
   </tr>
  <tr align="center">
    <td width="578">帖子标题</td>
    <td width="195">发帖时间</td>
  </tr>
  <?php
  $where=" where 1=1";
  if($select==1)
  $where.=" and post_topic like '%$stitle%'";
if($select==2)
$where.=" and user_id=$stitle";
$sql="select * from  post $where order by  post_time DESC";
//echo $sql;
$res=mysql_query($sql);
while($data=mysql_fetch_array($res))
{
  ?>
  <tr align="center">
    <td><a href="pinglun.php?post_id=<?php echo $data[post_id];?>" target='_blank'><?php echo $data[post_topic];?></a></td>

    <td><?php echo $data[post_time];?></td>
  </tr>
  <?php
}
		?>
</table>
<?php
}
		?>

