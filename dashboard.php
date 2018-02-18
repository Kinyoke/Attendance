<?php
	session_start();
	if (isset($_SESSION['access_token'])) {}
	$email = $_SESSION['email']; 
	include('_script_php/dbconfig.php');
	$student_profile = array();
	$sql = "SELECT Student_Id, Major, Year  FROM students WHERE email='$email'";
			mysql_select_db($db_name);
			$retval = mysql_query($sql, $con);
			if(!$retval){ die('Could not get data: ' . mysql_error()); }
			$row = mysql_fetch_assoc($retval);
					 $student_profile[0] = $row['Student_Id'];
					 $student_profile[1] = $row['Major'];
					 $student_profile[2] = $row['Year'];
				mysql_free_result($retval);
				mysql_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Attendance: check In</title>
	<link rel="shortcut icon" href="_images/logo.png" type="image/png"/>
	<link rel="stylesheet" type="text/css" href="_view/_stcss.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="Q3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="body">
	<form action="_script_php/checkin.php" method="POST" id="dash"></form>
	<nav style="border-radius: 0px; height: 60px; background-color: rgb(240,240,240);">
		<button type="submit" name="out" class="btn btn-info btn-lg" style="width: 50px; height: 50px; text-align: center; border-radius: 100%; margin-top: 5px; float: left; margin-left: 10px;" onclick="window.location = 'logout.php';"><span class="glyphicon glyphicon-off"></span>
		</button> 

		<div class="menu-right">
			<div class="bar"></div>
			<div class="bar"></div>
			<div class="bar"></div>
		</div>
  	</nav>
	
	<div class="container" style="margin-top: 2%;">
		<div class="row justify-content-center">
            <div class="col-md-6 col-offset-3">
            	<div class="card">
            		<div style="background-color: rgb(245,245,245); height: 200px; width: 100%; border-bottom:1px solid rgb(210,210,210);">
            			<img src="<?php echo $_SESSION['picture'] ?>" alt="Faisal" style="width:50%; border-radius: 100%; margin-top: 25px;">	 
            		</div>
					<h1><?php echo $_SESSION['givenName']." ".$_SESSION['familyName']?></h1>
					<p class="title"><?php echo $student_profile[1]?></p>
					<p><?php echo $student_profile[0]?></p>
					<p><?php echo "Year: "."<span style='color: gray; font-size: 15px; font-weight: bold;'>$student_profile[2]</span>"?></p>
					<div style="width: 100px; margin-left: 32%; margin-bottom: 30px;">
						<a href="#" class="lnk" id="lnk1"><i class="fa fa-twitter"></i></a>
					    <a href="#" class="lnk" id="lnk2"><i class="fa fa-linkedin"></i></a>
					    <a href="#" class="lnk" id="lnk3"><i class="fa fa-facebook"></i></a>
					</div>
					<button form="dash" id="button" name="button">Check In</button>
				</div>
            </div>
        </div>
	</div>
	<script src="_script_js/main.js"></script>
</body>
</html>