<?php
	session_start();
	if (isset($_SESSION['access_token'])) {}
	$email = $_SESSION['email'];

	function directUser($arg)
	{
		include('_script_php/dbconfig.php');
		$trigger = false;
		$_profile = array();
	    $getMail = ereg("(\@)(alustudent.com$)", $arg);
	    if ($getMail == true) {
	    	$sql = "SELECT * FROM students WHERE email='$arg'";
			mysql_select_db($db_name);
			$retval = mysql_query($sql, $con);
			if(!$retval){ die('Could not get data: ' . mysql_error()); }
			while ($row = mysql_fetch_assoc($retval)){
				$trigger = true;
					 $_profile[0] = $row['profID'];
					 $_profile[1] = $row['FirstName'];
					 $_profile[2] = $row['MiddleName'];
					 $_profile[3] = $row['LastName'];
					 $_profile[4] = $row['Student_Id'];
					 $_profile[5] = $row['Major'];
					 $_profile[6] = $row['Year'];
					 $_profile[7] = $row['Email'];
				}
				mysql_free_result($retval);

			if ($trigger == false) {
			 	header('Location: http://127.0.0.1/attendance/student_registration.html');
		        exit();
			}else{
				header('Location: http://127.0.0.1/attendance/dashboard.php');
		        exit();
			}
	    }

	    $getMail = ereg("(\@)(gmail.com$)", $arg);
	    if ($getMail == true) {
	    	$sql = "SELECT * FROM staffulty WHERE email='$arg'";
			mysql_select_db($db_name);
			$retval = mysql_query($sql, $con);
			if(!$retval){ die('Could not get data: ' . mysql_error()); }
			while ($row = mysql_fetch_assoc($retval)){
				$trigger = true;
					 $_profile[0] = $row['ID'];
					 $_profile[1] = $row['FirstName'];
					 $_profile[2] = $row['MiddleName'];
					 $_profile[3] = $row['LastName'];
					 $_profile[4] = $row['Email'];
				}


			if ($trigger == false) {
				$sql = "INSERT INTO staffulty". "(FirstName, MiddleName, LastName, Email)". "VALUES".
						"('$fname','$mname','$lname','$arg')";
				mysql_select_db($db_name);
				$retval = mysql_query($sql, $con);
				if(!$retval){ die('Could not get data: ' . mysql_error()); }
			 	header('Location: http://127.0.0.1/attendance/adminportal.html');
		        exit();
			}else{
				header('Location: http://127.0.0.1/attendance/adminportal.html');
		        exit();
			}
			mysql_free_result($retval);

	    }

	    $getMail = ereg("(\@)(alueducation.com$)", $arg);
	    if ($getMail == true) {
	    	echo "email belongs to staff member";
	    }

	    mysql_close($con);
	}

	directUser($email);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Attendance: Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 100px">
	<div class="row">
		<div class="col-md-3">
			<img style="width: 80%;" src="<?php echo $_SESSION['picture'] ?>">
		</div>

		<div class="col-md-9">
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>
						<td>ID</td>
						<td><?php echo $_SESSION['id'] ?></td>
					</tr>
					<tr>
						<td>First Name</td>
						<td><?php echo $_SESSION['givenName'] ?></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><?php echo $_SESSION['familyName'] ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $_SESSION['email'] ?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td><?php echo $_SESSION['gender'] ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>