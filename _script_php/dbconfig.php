<?php
	$user = "root";
	$host = "localhost";
	$password = "";
	$db_name = "Attendance_ALU_MU";
	$con = mysql_connect($host,$user,$password);
    if (!$con) { die("Could not connect: ".mysql_error()); }
?>