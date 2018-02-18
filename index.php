<?php
    require_once "config.php";
	if (isset($_SESSION['access_token'])) {
		header('Location: home.php');
		exit();
	}
	$loginURL = $gClient->createAuthUrl();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Attendance: Log In</title>
	<link rel="shortcut icon" href="_images/logo.png" type="image/png"/>
	<link rel="stylesheet" type="text/css" href="_view/main.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="Q3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body id="body">
	<div>
		<div class="parent">
			<div id="img-container">
				<img id="logo" src="_images/stock3.png">
			</div>
			<div id="btn-holder">
				<button class="btn-h" id="setting" onclick="window.location = '<?php echo $loginURL ?>';">student login</button>
				<button class="btn-h" id="Signin" onclick="window.location = '<?php echo $loginURL ?>';">staff login</button>
			</div>
		</div>
	</div> 
	<script src="_script_js/main.js"></script>
</body>
</html>