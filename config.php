<?php 
	session_start();
	$conn = mysqli_connect("localhost","root","","scholarship");
	if(!$conn) {
		exit();
	}

	date_default_timezone_set('Asia/Manila');
    $date_today = date('Y-m-d');
?>