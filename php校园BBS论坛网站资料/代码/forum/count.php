<?php
include("conn.php");
$sql100="select * from count";
$query100=mysql_query($sql100);
$data100=mysql_fetch_object($query100);
$n=$data100->count+1;
$sql101="update count set count='$n'";
mysql_query($sql101);
echo $n;
?>