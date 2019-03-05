<?php
error_reporting(E_ALL ^ E_NOTICE);
$conn = @ mysql_connect("localhost", "root", "123456") or die("Α¬½ΣΚ§°ά!");
mysql_select_db("forum", $conn);
mysql_query("set names 'utf8'");
@extract($_POST);
@extract($_GET);
?>