<?php include('php/db.php'); 
session_start();

if(isset( $_SESSION['auth_id'] )) {
    echo"<script>window.open('../admin/','_self')</script>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MBYA</title>
        <!-- <meta name="description" content="Sufee Admin - HTML5 Admin Template"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/png" href="styles/login_design/images/mbya_logo.png"/>
        <link rel="stylesheet" href="styles/registration/css/normalize.css">
        <link rel="stylesheet" href="styles/registration/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles/registration/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles/registration/css/themify-icons.css">
        <link rel="stylesheet" href="styles/registration/css/flag-icon.min.css">
        <link rel="stylesheet" href="styles/registration/css/cs-skin-elastic.css">
        <!-- Sweet Alert CSS -->
        <link rel="stylesheet" href="styles/registration/sweetalert/sweetalert.css">
        
        <!-- Sweet Alert JS -->
        <script src="styles/registration/sweetalert/sweetalert.js"></script>
        <script src="styles/registration/sweetalert/sweetalert.min.js"></script>

        <script src="styles/login_design/vendor/jquery/jquery-3.2.1.min.js"></script>  

        <link rel="stylesheet" href="styles/registration/scss/style.css">
        <link href="styles/rgeistration/css/jqvmap.min.css" rel="stylesheet">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body class="bg-dark">
        <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container">
                <div class="login-content">
                    <div class="login-logo">
                        <p style="font-size: 20px;">Mid-North Association of Southern Baptist Churches, Inc.</p>
                    </div>
                    <div class="login-form">
                        <form method="post" action="">
                            <div class="form-group">
                                <label>First Name:</label>
                                <input type="text" name="fname" id="fname" style="text-transform: capitalize;" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Middle Name:</label>
                                <input type="text" name="mname" id="mname" style="text-transform: capitalize;" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Last Name:</label>
                                <input type="text" name="lname" id="lname" style="text-transform: capitalize;" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Gender:</label>
                                <select name="gen" id="gen" class="form-control">
                                    <option value=""> -Select- </option>
                                    <option value="0"> Male </option>
                                    <option value="1"> Female </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Church Position:</label>
                                <select name="c_pos" id="c_pos" class="form-control">
                                    <option value="none"> -No Position- </option>
                                    <option value="President"> President </option>
                                    <option value="Vice President"> Vice President </option>
                                    <option value="Secretary"> Secretary </option>
                                    <option value="Treasurer"> Treasurer </option>
                                    <option value="Auditor"> Auditor </option>
                                    <option value="PIO"> PIO </option>
                                    <option value="Representative"> Representative </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>MBYA Cluster Position:</label>
                                <select name="mc_pos" id="mc_pos" class="form-control">
                                    <option value="none"> -No Position- </option>
                                    <option value="President"> President </option>
                                    <option value="Vice President"> Vice President </option>
                                    <option value="Secretary"> Secretary </option>
                                    <option value="Treasurer"> Treasurer </option>
                                    <option value="Auditor"> Auditor </option>
                                    <option value="PIO"> PIO </option>
                                    <option value="Representative"> Representative </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>MBYA Position:</label>
                                <select name="m_pos" id="m_pos" class="form-control">
                                    <option value="none"> -No Position- </option>
                                    <option value="President"> President </option>
                                    <option value="Vice President"> Vice President </option>
                                    <option value="Secretary"> Secretary </option>
                                    <option value="Treasurer"> Treasurer </option>
                                    <option value="Auditor"> Auditor </option>
                                    <option value="PIO"> PIO </option>
                                    <option value="Representaitve"> Representative </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Church:</label>
                                <?php $church = $conn->query("SELECT * FROM church"); ?>
                                <select name="church" id="church" class="form-control">
                                    <option value="none">-Select-</option>
                                    <?php while($ch = mysqli_fetch_array($church)):?>
                                    <option value="<?php echo $ch['church_id'];?>"> <?php echo $ch['church_name'];?> </option>
                                   <?php endwhile;?>
                               	</select>
                            </div>

                            <div class="form-group">
                                <label>Username:</label>
                                <input type="username" name="username" id="username" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" name="password" id="password" class="form-control"><small class="form-text text-muted">Input at least 8 characters</small>
                            </div>

                            <div class="form-group">
                                <label>Retype Password:</label>
                                <input type="password" name="repass" id="repass" class="form-control" onpaste = "return false" required>
                            </div>

                            <div class="form-group">
                                <label>Choose Avatar:</label>
                                <select name="avatar" id="avatar" class="form-control">
                                    <option value=""> -Select- </option>
                                    <option value="avatar_1.png"> Avatar 1 </option>
                                    <option value="avatar_2.png"> Avatar 2 </option>
                                    <option value="avatar_3.png"> Avatar 3 </option>
                                    <option value="avatar_4.png"> Avatar 4 </option>
                                    <option value="avatar_5.png"> Avatar 5 </option>
                                    <option value="avatar_6.png"> Avatar 6 </option>
                                    <option value="avatar_7.png"> Avatar 7 </option>
                                    <option value="avatar_8.png"> Avatar 8 </option>
                                    <option value="avatar_9.png"> Avatar 9 </option>
                                    <option value="avatar_10.png"> Avatar 10 </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div id="imagePreview"></div>
                            </div>

                            <div class="form-group">
                            	<button type="submit" name="save" id="save" class="btn btn-primary btn-flat m-b-15">Save</button>
                            </div>

                            <div class="register-link m-t-15 text-center">
                            	<p>
                            		"Do you hava a account?"
                            		<a href="index.php">Click here</a>
                            	</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<script type="text/javascript">
            $('document').ready(function(){
                $("#avatar").change(function() {
                    var src = $(this).val();
                    $("#imagePreview").html(src ? "<img src='image/" + src +"' style='width: 125px; height: 125px; border-radius: 25px;'>" : "");
                });

                $("#save").on('click touch', function(e){
                    e.preventDefault();
                    //alert("hoy");

                    var fname = document.getElementById("fname").value;
                    var mname = document.getElementById("mname").value;
                    var lname = document.getElementById("lname").value;
                    var gen = document.getElementById("gen").value;
                    var c_pos = document.getElementById("c_pos").value;
                    var mc_pos = document.getElementById("mc_pos").value;
                    var m_pos = document.getElementById("m_pos").value;
                    var church = document.getElementById("church").value;
                    var username = document.getElementById("username").value;
                    var password = document.getElementById("password").value;
                    var repass = document.getElementById("repass").value;
                    var avatar = document.getElementById("avatar").value;
                    var n = password.length;

                    if($('input').val()=='' && $('select').val()==''){
                    	swal("Invalid", "Fill up the form correctly", "error");
                    }
      				else if($('#c_pos').val()=='none' && $('#mc_pos').val()=='none' && $('#m_pos').val()=='none'){
                        swal("Invalid", "Input atleast 1 Postion", "warning");
                    }
                    else if(password != repass){
                        swal("Invalid", "Password not match", "error");
                    }
                    else if(n < 8){
                        swal("Invalid Password", "Input atleast 8 characters", "error");
                    }
                    else{
                        $.ajax({
                        type:"POST",
                        dataType:"json",
                        url: 'http://localhost/mbya/admin/php/register_save.php',
                        data: {avatar:avatar,fname:fname,mname:mname,lname:lname,gen:gen,c_pos:c_pos,mc_pos:mc_pos,m_pos:m_pos,church:church,username:username,password:password,save:"save"},
                        	success: function(data){
                                if(data == false){
                                    swal("Invalid", "username already exist", "info");
                                }
                                else if(data == true){
                                    setTimeout(function(){
                                        swal({
                                            title: "Register Confirm",
                                            text: "You may now login",
                                            type: "success"
                                        }, function (){
                                            window.location = "index.php";
                                        });
                                    },500);
                                }
                        	}
                        });
                    }
                });
            });
     	</script>
    </body>
</html>