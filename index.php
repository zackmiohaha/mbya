<?php include('php/db.php');
date_default_timezone_set("Asia/Manila");
session_start();
if(isset( $_SESSION['auth_id'] )) {
    echo"<script>window.open('../admin/dashboard/','_self')</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>MBYA Login</title>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	 <link rel="icon" type="image/png" href="styles/login_design/images/mbya_logo.png"/>
	   <link rel="stylesheet" type="text/css" href="styles/login_design/vendor/bootstrap/css/bootstrap.min.css">
	   <link rel="stylesheet" type="text/css" href="styles/login_design/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	   <link rel="stylesheet" type="text/css" href="styles/login_design/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	   <link rel="stylesheet" type="text/css" href="styles/login_design/vendor/animate/animate.css">
	   <link rel="stylesheet" type="text/css" href="styles/login_design/vendor/css-hamburgers/hamburgers.min.css">
	   <link rel="stylesheet" type="text/css" href="styles/login_design/vendor/animsition/css/animsition.min.css">
	   <link rel="stylesheet" type="text/css" href="styles/login_design/vendor/select2/select2.min.css">
	   <link rel="stylesheet" type="text/css" href="styles/login_design/vendor/daterangepicker/daterangepicker.css">
	   <link rel="stylesheet" type="text/css" href="styles/login_design/css/util.css">
  	 <link rel="stylesheet" type="text/css" href="styles/login_design/css/main.css">

  	 <script src="styles/login_design/vendor/jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
	<?php
	if(isset($_POST['log'])){
    $user = $_POST['username'];
    $pass = base64_encode($_POST['pass']);

    $sql = "SELECT * FROM authorize WHERE username='$user' AND password='$pass'";
    $show = $conn->query($sql);

    	if($show->num_rows > 0){
    		while($row = mysqli_fetch_array($show)){
          $_SESSION['auth_id'] = $row['auth_id'];
          $datetime = date("Y-m-d H:i:s");
          $today = date("F d, Y");
          $operate = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' is logged in';

          $log = $conn->query("INSERT INTO logs(log_datetime,operation) VALUES('$datetime','$operate')");
          if($log == true){
            $login = $conn->query("UPDATE authorize SET last_update='$today' WHERE username='$username'");
            if($login == true){
              header('Location: ../admin/dashboard/');
            }
          }
        }
    	}else{
    		$success_message = 'Invalid Username or Password';
    	}
  	}
	?>
	<div class="limiter">
    	<div class="container-login100">
      		<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
          		<span class="login100-form-title p-b-32">MBYA Login</span>

          		<span><?php 
          		if(!empty($success_message)){
                  echo '<div class="alert alert-warning alert-dismissible" style="text-align: center;">'; 
                  if(isset($success_message)){
                  	echo '<a href="#" class="close"data-dismiss="alert" aria-label="close">&times;</a>';
                    echo $success_message;
                    } 
                  echo '</div>';
                }
          		?></span>

          	<form class="login100-form validate-form flex-sb flex-w" method="post" action="">

          		<span class="txt1 p-b-11">Username</span>
          		<div class="wrap-input100 validate-input m-b-36" data-validate="Username is required">
          			<input class="input100" type="text" name="username"><span class="focus-input100"></span>
          		</div>
          
          		<span class="txt1 p-b-11">Password</span>
          		<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
            		<span class="btn-show-pass"><i class="fa fa-eye"></i></span>
            		<input class="input100" type="password" name="pass">
            		<span class="focus-input100"></span>
          		</div>

         		<div class="flex-sb-m w-full p-b-48">
            		<div>
              			<span class="txt1 p-b-11">Sign up?</span>
              			<a href="register.php" class="txt3">Click Here</a>
            		</div>
          		</div>

          		<div class="container-login100-form-btn">
            		<button class="login100-form-btn" name="log">Login</button>
          		</div>
        </form>
      		</div>
    	</div>
  	</div>

  	<div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
<script src="styles/login_design/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="styles/login_design/vendor/bootstrap/js/popper.js"></script>
<script src="styles/login_design/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="styles/login_design/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="styles/login_design/vendor/daterangepicker/moment.min.js"></script>
<script src="styles/login_design/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="styles/login_design/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="styles/login_design/js/main.js"></script>
</body>
</html>