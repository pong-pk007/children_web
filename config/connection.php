<?php
$servername = "localhost";
$username = "root";
$password = "Ad123456";
$dbname = "itsisake_los";

@mysql_connect($servername, $username, $password) or die("MySQL Connection Failed"); // ล็อกอินฐานข้อมูล
@mysql_select_db($dbname) or die("MySQL Select Database Failed"); // เลือกฐานข้อมูลที่จะเชื่อมต่อ
mysql_query("SET NAMES utf8") or die(mysql_error()); // กำหนดรูปแบบภาษา ใน การเชื่อมต่อ

        //*** Reject user not online
	$intRejectTime = 10; // Minute
	$sql = "UPDATE member SET LoginStatus = '0', LastUpdate = '0000-00-00 00:00:00'  WHERE 1 AND DATE_ADD(LastUpdate, INTERVAL $intRejectTime MINUTE) <= NOW() ";
	$query = mysql_query($sql);
?>
