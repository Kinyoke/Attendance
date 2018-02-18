<?php 
	session_start();
	if (isset($_SESSION['access_token'])) {}
	$email = $_SESSION['email']; 

	if (isset($_POST['stadd'])) {
		include('dbconfig.php');
		if(! get_magic_quotes_gpc()){
			$firstName = addslashes($_POST['fname']);
			$middleName = addslashes($_POST['mname']);
			$lastName = addslashes($_POST['lname']);
			$studentID = addslashes($_POST['stid']);
			$major = addslashes($_POST['major']);
			$year = addslashes($_POST['year']);
		}else{
			$firstName = $_POST['fname'];
			$middleName = $_POST['mname'];
			$lastName = $_POST['lname'];
			$studentID = $_POST['stid'];
			$major = $_POST['major'];
			$year = $_POST['year'];
		}

		switch ($year) {
			case 'year 1':
				$year = '1';
				break;
			case 'year 2':
				$year = '2';
				break;
			case 'year 3':
				$year = '3';
				break;
			case 'year 4':
				$year = '4';
				break;
		}

		$sql = "INSERT INTO students".
		"(FirstName, MiddleName, LastName, Student_Id, Major, Year, email)". "VALUES".
		"('$firstName','$middleName','$lastName','$studentID','$major','$year','$email')";
		mysql_select_db($db_name);
		$retval = mysql_query($sql, $con);
		if(!$retval){ die('Could not get data: ' . mysql_error()); }
		mysql_close($con);
		header("Location: http://127.0.0.1/attendance/dashboard.php");
	}


	if (isset($_POST['stfadd'])) {
		include('dbconfig.php');
		if(! get_magic_quotes_gpc()){
			$firstName = addslashes($_POST['fname']);
			$middleName = addslashes($_POST['mname']);
			$lastName = addslashes($_POST['lname']);
			$major = addslashes($_POST['major']);
			$module = addslashes($_POST['module']);
		}else{
			$firstName = $_POST['fname'];
			$middleName = $_POST['mname'];
			$lastName = $_POST['lname'];
			$major = $_POST['major'];
			$module = $_POST['module'];
		}

		$sql = "INSERT INTO staffulty".
		"(FirstName, MiddleName, LastName, teachMajor, Module, email)". "VALUES".
		"('$firstName','$middleName','$lastName','$major','$module','$email')";
		mysql_select_db($db_name);
		$retval = mysql_query($sql, $con);
		if(!$retval){ die('Could not get data: ' . mysql_error()); }
		mysql_close($con);
		header("Location: http://127.0.0.1/attendance/adminportal.html");
	}
?>