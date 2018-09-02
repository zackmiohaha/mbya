<?php include('../php/db.php');
date_default_timezone_set("Asia/Manila");
session_start();
$sess_id = $_SESSION['auth_id'];

if(!isset( $_SESSION['auth_id'] )) {
  echo"<script>window.open('../../admin/','_self')</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MBYA</title>
  <link rel="icon" type="image/png" href="../styles/login_design/images/mbya_logo.png"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../styles/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../styles/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../styles/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../styles/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../styles/dist/js/DataTables/css/datatables.css">
  <link rel="stylesheet" href="../styles/dist/js/DataTables/css/datatables.min.css">
  <!-- Sweet Alert CSS -->
  <link rel="stylesheet" href="../styles/registration/sweetalert/sweetalert.css">

  <link rel="stylesheet" href="../styles/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../styles/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../styles/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../styles/plugins/timepicker/bootstrap-timepicker.min.css">

  <!-- Sweet Alert JS -->
  <script src="../styles/registration/sweetalert/sweetalert.js"></script>
  <script src="../styles/registration/sweetalert/sweetalert.min.js"></script>


  <!-- jQuery 3 -->
  <script src="../styles/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../styles/dist/js/jquery-3.3.1.js" type="text/javascript"></script>
  <script src="../styles/dist/js/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="../styles/dist/js/DataTables/js/datatables.js" type="text/javascript"></script>
  <script src="../styles/dist/js/DataTables/js/datatables.min.js" type="text/javascript"></script>
  <script src="../styles/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="../styles/plugins/timepicker/bootstrap-timepicker.min.js"></script>

   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../dashboard/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">MBYA</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MBYA</b> Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Message -->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-info">Coming Soon</span>
            </a>
            <!-- <ul class="dropdown-menu">
              <li class="header">You have 1 message</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="../image/avatar_2.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul> -->
          </li>


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php 
                $user = $conn->query("SELECT * FROM authorize WHERE auth_id='$sess_id'");
                while($row = mysqli_fetch_array($user)):
                $image = "../image/".$row['avatar'];
                $name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];
                $name1 = $row['firstname'].' '.$row['lastname'];
              ?>
              <img src="<?php echo $image;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $name;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $image;?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $name;?>
                  <?php
                  if($sess_id == 1){
                    ?>
                    <small><?php echo $row['church_position'].' '.$row['mbya_cluster'].' '.$row['mbya_position'];?></small>
                    <?php
                  }else{
                    ?>
                    <small>User</small>
                    <?php
                  }
                  ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="#">Registration</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="#">Payments</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../php/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $image;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="font-size: 10px;"><?php echo $name1;?></p>
          <p style="font-size: 10px;"><i class="fa fa-circle text-success"></i> Forever Online</p>
        </div>
      </div>
      <?php endwhile;?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">User's Element</li>
        <li class="treeview-me"> <a href="../dashboard/"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>
        <li class="treeview-me"> <a href="../users/"> <i class="fa fa-users"></i> <span>Users</span> </a> </li>
        <li class="treeview-me"> <a href="../event/"> <i class="fa fa-calendar-o"></i> <span>Event</span> </a> </li>
        <li class="treeview-me"> <a href="../participant/"> <i class="fa fa-list"></i> <span>Participant</span> </a> </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-money"></i> <span>Audit</span> </a> </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-tv"></i> <span>Website</span> </a> </li>
      <?php 
      if($sess_id == 1){
      ?>
        <li class="header">Developer's Element</li>
        <li class="treeview"> <a href="#"> <i class="fa fa-user-secret"></i> <span>Manage User's</span> </a> </li>
        <li class="treeview-me active"> <a href="../church/"> <i class="fa fa-list"></i> <span>Church</span> </a> </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-database"></i> <span>Data</span> </a> </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-tv"></i> <span>Website</span> </a> </li>
      <?php
      }
      ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Church
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Church</li>
        <li class="active">Edit</li>
      </ol>

      <br>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Edit Here</h3>
          </div>

          <?php
          $id = $_GET['id'];
          $select = $conn->query("SELECT * FROM church WHERE church_id='$id'"); 
          ?>

          <div class="box-body">
            <form class="form-horizontal" method="post" action="">

              <?php while($row=mysqli_fetch_array($select)):?>

              <div class="form-group">
                <label class="col-sm-3 control-label">Church Name:</label>
                <div class="col-sm-6">
                    <input type="hidden" class="form-control" id="cid" name="cid" value="<?php echo $row['church_id'];?>">
                   <input type="hidden" class="form-control" id="c" name="c" value="<?php echo $row['church_name'];?>">
                  <input type="text" class="form-control" name="cname" id="cname" value="<?php echo $row['church_name'];?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Church Abbreviation:</label>
                <div class="col-sm-6">
                  <input type="hidden" class="form-control" id="ca" name="ca" value="<?php echo $row['abrev'];?>">
                  <input type="text" class="form-control" name="cabrev" id="cabrev" value="<?php echo $row['abrev'];?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Cluster:</label>
                <div class="col-sm-6">
                  <select class="form-control" id="clus" onchange="select()" style="display: none;">
                    <option value="">-Select-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
                <div class="col-sm-2"><input type="hidden" name="cclst" id="cclst" value="<?php echo $row['cluster'];?>" class="form-control"></div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="dclst" id="dclst" value="<?php echo $row['cluster'];?>" style="border: 0; background-color: white;" readonly>
                </div>
                <div class="col-sm-2">
                  <button type="button" id="bclst" onclick="change()" class="btn btn-primary"> Change Cluster </button>
                </div>
              </div>
              
              <?php endwhile;?>

            <div class="form-group">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-success" id="save" name="save">Save</button>
                </div>
            </div>

            </form>

          </div>
          
        </div>
      </div>
    </div>

    <script type="text/javascript">
      function select(){
        var x = document.getElementById("clus").value;
        document.getElementById("cclst").value = x;
      }
      function change(){
        document.getElementById("clus").style.display = 'block';
        document.getElementById("dclst").style.display = 'none';
        document.getElementById("bclst").style.display = 'none';
      }
    </script>

    <?php
      if(isset($_POST['save'])){

        $cid = $_POST['cid'];
        $cname = $_POST['cname'];
        $cabrev = $_POST['cabrev'];
        $cclst = $_POST['cclst'];

        $c = $_POST['c'];
        $ca = $_POST['ca'];
        $dclst = $_POST['dclst'];

        if($c == $cname && $ca==$cabrev && $dclst == $cclst){
          ?>
          <script type="text/javascript">
            swal({
              title:"Data not save",
              text: "You did not edit",
              type: "success"
            }, function (){
              window.location = "index.php";
            });
          </script>
          <?php
        }else{
          $save = $conn->query("UPDATE church SET church_name='$cname', abrev='$cabrev', cluster='$cclst' WHERE church_id='$cid'");
          if($save == TRUE){
            ?>
            <script type="text/javascript">
              swal({
                title: "Update Success",
                text: "The data Change",
                type: "success"
              }, function (){
                window.location = "index.php";
              });
            </script>
            <?php
          }else{
            ?>
            <script type="text/javascript">alert("There is something wrong")</script>
            <?php
          }
        }
      }
    ?>

    <script type="text/javascript">
      /*$('document').ready(function(){
        $("#save").on('click touch', function(e){
          e.preventDefault();
          alert("hoy");

          var cid = document.getElementById("cid").value;
          var c = document.getElementById("c").value;
          var cname = document.getElementById("cname").value;
          var ca = document.getElementById("ca").value;
          var cabrev = document.getElementById("cabrev").value;
          var cl = document.getElementById("cclst").value;
          var clst = document.getElementById("dclst").value;

          if(c == cname && ca==cabrev && cl == clst){
            swal({
              title:"Data not save",
              text: "You did not edit",
              type: "success"
            }, function (){
              window.location = "index.php";
            });
          }
          else{
            $.ajax({
              type:"POST",
              dataType:"json",
              url: 'http://localhost/mbya/admin/php/save_church.php',
              data: {cid:cid,cname:cname,cabrev:cabrev,cclst:cclst,save:"save"},
              success: function(data){
                if(data == false){
                  swal("Invalid", "username already exist", "info");
                }
                else if(data == true){
                  swal({
                    title: "Register Confirm",
                    text: "You may now login",
                    type: "success"
                  }, function (){
                    window.location = "index.php";
                  });
                }
              }
            });
          }

        });
      });*/
    </script>
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer">
    <strong>Develop by:</strong> Zack-Mio A. Sermon
  </footer>
  
</div>
<!-- ./wrapper -->


<!-- Bootstrap 3.3.7 -->
<script src="../styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../styles/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../styles/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../styles/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../styles/dist/js/demo.js"></script>
</body>
</html>
