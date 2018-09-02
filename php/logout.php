<?php
	include('db.php');
	session_start();
	date_default_timezone_set("Asia/Manila");

	$user = $_SESSION['auth_id'];

	$scan = $conn->query("SELECT * FROM authorize WHERE auth_id='$user'");

	while($row = mysqli_fetch_array($scan)){
		$datetime = date("Y-m-y H:i:s");
		$operate = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' is logged out the system';

		$log = $conn->query("INSERT INTO logs(log_datetime,operation) VALUES('$datetime','$operate')");
		if($log == true){
			unset($_SESSION['auth_id']);
			header("location: ../../admin/");
		}
	}

?>