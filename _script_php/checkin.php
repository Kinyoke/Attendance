<?php

	session_start();
	if (isset($_SESSION['mail'])) {
		$_SESSION['mail'] = "fburhan15@alustudent.com";
	}else{
		$_SESSION['mail'];
	}
	if (isset($_POST['button'])) {
		include('dbconfig.php');
		$email = $_SESSION['mail'];
		$myId = array();
		$counter = 0;
		$sql = "SELECT profID  FROM students WHERE Email='$email'";
		mysql_select_db($db_name);
		$retval = mysql_query($sql, $con);
		if(!$retval){ die('Could not get data: ' . mysql_error()); }
			while($row = mysql_fetch_assoc($retval)){
		 		$counter++;
		 		$myId[$counter] = $row['profID'];
			}
		mysql_free_result($retval);

		foreach ($myId as $value) {
			$sql = "UPDATE attendance ". "SET Status = 'present'"."WHERE  studentID = $value" ;
			mysql_select_db($db_name);
			$retval = mysql_query($sql, $con);
			if(!$retval){ die('Could not get data: ' . mysql_error()); }
		}
		mysql_close($con);
		header("Location: http://127.0.0.1/attendance/dashboard.php");
	}
?>


<!-- in order to checkin successfully, following conditions have to be met.

-> date/ day has to be of same day.
-> location | match a geographical position recorded in the session records.
-> local address | optional (has to be of same subnet);
-> public address | priority (this has to match one in the session records)
-> time : if time submited is twenty minutes before the class end. -->