<?php
	//track c stands for track class.
	session_start();
	if (isset($_SESSION['me'])) {
		$_SESSION['me'] = "babdul@alueducation.com";
		echo $_SESSION['me']."<br>";
	}else{
		$_SESSION['me'] = 1;
		//echo $_SESSION['me'];
	}

	if (isset($_POST['csession'])) {
		include('dbconfig.php');
		include('engine.php');
		$from = $_SESSION['me'];
		$major = $_POST['major'];
		$module = $_POST['module'];
		$year = $_POST['year'];
		$start = $_POST['ssession'];
		$end = $_POST['esession'];
		$day = date('Y-m-d');
		$sessId = "";
		$sessconstY = "";

		print($day."<br>");

		switch ($year) {
			case 'year 1':
				$year = '1';
				$sessconstY = 'y1';
				break;
			case 'year 2':
				$year = '2';
				$sessconstY = 'y2';
				break;
			case 'year 3':
				$year = '3';
				$sessconstY = 'y3';
				break;
			case 'year 4':
				$year = '4';
				$sessconstY = 'y4';
				break;
		}
		function wordMarkup($maj,$mod)
			{
				$ip = "123.456.789.000"; // some IP address
				$iparr = spliti ("\.", $ip, 3);
				$val = spliti("[^c]", $maj, 1);
				echo $val[0];
				$val = eregi_replace("([a-z]+)", "cs", $maj);
				$temp = eregi_replace("([a-z]+)", "cs", $val);
				return $temp;
			}

		$sessId = wordMarkup($major, $module).$sessconstY.date('Ymd');


		// 1.	insert record into session table
		function tracker($arg)
		{
			include('dbconfig.php');
			$sql = "INSERT INTO session".
			"(Generator, Day, Major, Module, StartTime, EndTime, Location, LAN_Address, WAN_Address, SessionID)". 
			"VALUES".
			"('$arg[0]','$arg[1]','$arg[2]','$arg[3]','$arg[4]','$arg[5]','$arg[6]','$arg[7]','$arg[8]','$arg[9]')";
			mysql_select_db($db_name);
			$retval = mysql_query($sql, $con);
			if(!$retval){ die('Could not get data: ' . mysql_error()); }
		}
		$dataSet = array($from,$day,$major,$module,$start,$end,"","","",$sessId);
		tracker($dataSet);
		// 2.	Select stid from students table where year and major == given.
		$myId = array();
		include('dbconfig.php');
		$counter = 0;
		$sql = "SELECT profID  FROM students WHERE Major='$major' AND Year = '$year'";
		mysql_select_db($db_name);
		$retval = mysql_query($sql, $con);
		if(!$retval){ die('Could not get data: ' . mysql_error()); }
			while($row = mysql_fetch_assoc($retval)){
		 		$counter++;
		 		$myId[$counter] = $row['profID'];
			}
		mysql_free_result($retval);
		// 3.   Insert into attendance table stid, major, module, day, and status = 'pending'. 
		function bookRecord($ids,$val2,$val3,$val4)
		{
			include('dbconfig.php');
			foreach ($ids as $value) {
				echo "$value <br>";
				$sql = "INSERT INTO attendance".
			"(studentID, Day, Major, Module, Status)". 
			"VALUES".
			"('$value','$val2','$val3','$val4','pending')";
			mysql_select_db($db_name);
			$retval = mysql_query($sql, $con);
			if(!$retval){ die('Could not get data: ' . mysql_error()); }
			}
		}
		bookRecord($myId,$day,$major,$module);
		mysql_close($con);
		header("Location: http://127.0.0.1/attendance/adminportal.html");
	}
?>