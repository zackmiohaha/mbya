<?php
	require ("db.php");
	header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    header('content-type: text/json');
    header("Content-Type: text/xml; charset=utf-8");
    date_default_timezone_set("Asia/Manila");

    $fname = ucwords($_POST['fname']);
    $mname = ucwords($_POST['mname']);
    $lname = ucwords($_POST['lname']);
    $gen = $_POST['gen'];
    $c_pos = $_POST['c_pos'];
    $mc_pos = $_POST['mc_pos'];
    $m_pos = $_POST['m_pos'];
    $church = $_POST['church'];
    $username = $_POST['username'];
    $password = base64_encode($_POST['password']);
    $avatar = $_POST['avatar'];
    $datetime = date("Y-m-d H:i:s");
    $operate = $fname.' '.$mname.' '.$lname.' is registered';

    $check = $conn->query("SELECT * FROM authorize WHERE username='$username'");
    if(mysqli_num_rows($check) >= 1){
		$respond = false;
	}else{
		$insert = ("INSERT INTO authorize (avatar,firstname, middlename, lastname, gender, church_position, mbya_cluster, mbya_position, church_id,username,password,last_update) VALUES('$avatar','$fname','$mname','$lname','$gen','$c_pos','$mc_pos','$m_pos','$church','$username','$password','none')");
		$save = $conn->query($insert);
        $log = $conn->query("INSERT INTO logs(log_datetime,operation) VALUES('$datetime','$operate')");
        $respond = true;
                
		}
    echo json_encode($respond);
?>