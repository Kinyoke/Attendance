<?php
	require_once "config.php";
	if (isset($_POST['out'])) {
		unset($_SESSION['access_token']);
		$gClient->revokeToken();
		session_destroy();
		header('Location: index.php');
		exit();
	}

	unset($_SESSION['access_token']);
		$gClient->revokeToken();
		session_destroy();
		header('Location: index.php');
		exit();

?>