<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("1011443068621-62tq7sigr5lrvhencc41m1akdtvrgclk.apps.googleusercontent.com");
	$gClient->setClientSecret("6zX8jAziv2TdE_9nMBVc4YXd");
	$gClient->setApplicationName("Attendace.net Login");
	$gClient->setRedirectUri("http://127.0.0.1/attendance/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
