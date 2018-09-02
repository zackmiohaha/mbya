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
  <link rel="stylesheet" href="../styles/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../styles/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../styles/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../styles/plugins/timepicker/bootstrap-timepicker.min.css">

  <!-- Sweet Alert CSS -->
  <link rel="stylesheet" href="../styles/registration/sweetalert/sweetalert.css">

  <!-- Sweet Alert JS -->
  <script src="../styles/registration/sweetalert/sweetalert.js"></script>
  <script src="../styles/registration/sweetalert/sweetalert.min.js"></script>

  <script src="../styles/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../styles/dist/js/jquery-3.3.1.js" type="text/javascript"></script>
  <script src="../styles/dist/js/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="../styles/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="../styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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
        <li class="treeview-me active"> <a href="../event/"> <i class="fa fa-calendar-o"></i> <span>Event</span> </a> </li>
        <li class="treeview-me"> <a href="../participant/"> <i class="fa fa-list"></i> <span>Participant</span> </a> </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-money"></i> <span>Audit</span> </a> </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-tv"></i> <span>Website</span> </a> </li>
      <?php 
      if($sess_id == 1){
      ?>
        <li class="header">Developer's Element</li>
        <li class="treeview"> <a href="#"> <i class="fa fa-user-secret"></i> <span>Manage User's</span> </a> </li>
        <li class="treeview-me"> <a href="../church/"> <i class="fa fa-list"></i> <span>Church</span> </a> </li>
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
       Edit Event
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Event</li>
        <li class="active">Edit Event</li>
      </ol>

      <br>

      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Event</h3>
              </div>

              <?php
                $eid = $_GET['q'];

                $get = $conn->query("SELECT * FROM event as e, authorize as a WHERE e.auth_id=a.auth_id");
              ?>

              <form class="form-horizontal" method="post" action="" id="myForm">
                <div class="box-body">

                  <?php while($row1=mysqli_fetch_array($get)):
                    $d_s = date_create($row1['datetime_start']);
                    $date_start = date_format($d_s,'Y-m-d');
                    $time_start = date_format($d_s,'h:i');
                    $d_f = date_create($row1['datetime_finish']);
                    $date_finish = date_format($d_f,'Y-m-d');
                    $time_finish = date_format($d_f,'h:i');
                  ?>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Event Name:</label>
                    <div class="col-sm-7">
                      <input type="hidden" class="form-control" name="e_id" value="<?php echo $row1['event_id'];?>">
                      <input type="hidden" class="form-control" name="en" value="<?php echo $row1['event_name'];?>">
                      <input type="text" class="form-control" name="ename" style="text-transform: capitalize;" value="<?php echo $row1['event_name'];?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Date:</label>
                    <div class="col-sm-3">
                      <input type="hidden" class="form-control pull-right" name="edst" data-date-format='yyyy-mm-dd' value="<?php echo $date_start;?>">
                      <input type="text" class="form-control pull-right" name="e_datestart" data-date-format='yyyy-mm-dd' id="dstart" value="<?php echo $date_start;?>">
                    </div>
                    <label class="col-sm-1" >to:</label>
                    <div class="col-sm-3">
                      <input type="hidden" class="form-control pull-right" name="edfn" data-date-format='yyyy-mm-dd' value="<?php echo $date_finish;?>">
                      <input type="text" class="form-control pull-right" name="e_datefinish" data-date-format='yyyy-mm-dd' id="dfinish" value="<?php echo $date_finish;?>">
                    </div>
                    <script type="text/javascript">
                      $(document).ready( function () {
                        $('#dstart').datepicker({
                          autoclose: true
                        });
                        $('#dfinish').datepicker({
                          autoclose: true
                        });
                      });
                    </script>
                  </div>

                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Time:</label>
                      <div class="col-sm-3">
                        <input type="time" class="form-control" name="e_timestart" value="<?php echo $time_start;?>">
                      </div>
                      <label class="col-sm-1" >to:</label>
                      <div class="col-sm-3">
                        <input type="time" class="form-control" name="e_timefinish" value="<?php echo $time_finish;?>">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Venue:</label>
                    <div class="col-sm-7">
                      <input type="hidden" class="form-control" name="ev" value="<?php echo $row1['venue'];?>">
                      <input type="text" class="form-control" name="e_venue" style="text-transform: capitalize;" value="<?php echo $row1['venue'];?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Speaker:</label>
                    <div class="col-sm-7">
                      <input type="hidden" class="form-control" name="es" value="<?php echo $row1['speaker'];?>">
                      <input type="text" class="form-control" name="e_speaker" style="text-transform: capitalize;" value="<?php echo $row1['speaker'];?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Registration Fee:</label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control" name="e_fee" value="<?php echo $row1['fee'];?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Participant:</label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control" name="e_part" value="<?php echo $row1['expect_part'];?>">
                    </div>
                  </div>

                </div>
              </form>

              <?php $date = date('Y-m-d');?>

              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary" form="myForm">Submit</button>
              </div>

              <?php endwhile;?>

              <?php
              if(isset($_POST['save'])){
                $e_id = $_POST['e_id'];

                $en = $_POST['en'];
                $edst = $_POST['edst'];
                $edfn = $_POST['edfn'];
                $ev = $_POST['ev'];
                $es = $_POST['es'];

                $ename = $_POST['ename'];
                $e_datestart = $_POST['e_datestart'];
                $e_datefinish = $_POST['e_datefinish'];
                $e_timestart = $_POST['e_timestart'];
                $e_timefinish = $_POST['e_timefinish'];
                $e_fee = $_POST['e_fee'];
                $e_part = $_POST['e_part'];
                $e_venue = $_POST['e_venue'];
                $e_speaker = $_POST['e_speaker'];

                $e_datetimestart = $e_datestart.' '.$e_timestart;
                $e_datetimefinish = $e_datefinish.' '.$e_timefinish;

                $editor = $conn->query("SELECT * FROM authorize WHERE auth_id='$sess_id'");
                $catch = mysqli_fetch_array($editor);

                $edit = $catch['firstname'].' '.$catch['middlename'].' '.$catch['lastname'];

                if($en == $ename && $edst == $e_datestart && $edfn == $e_datefinish && $ev == $e_venue && $es == $e_speaker){
                  ?>
                    <script type="text/javascript">
                      swal({
                        title: "Data Not Change",
                        text: "The data save",
                        type: "success"
                      }, function (){
                        window.location = "view_events.php?q=<?php echo $e_id;?>";
                      });
                    </script>
                  <?php
                }else{
                  if($date > $e_datestart){
                    ?>
                      <script type="text/javascript">
                        swal({
                          title: "Error",
                          text: "The date you enter is before the current date",
                          type: "error"
                        }, function (){
                          window.location = "edit_events.php?q=<?php echo $e_id?>";
                        });
                      </script>
                    <?php
                  }else{
                    if($e_datestart > $e_datefinish){
                      ?>
                      <script type="text/javascript">
                        swal({
                          title:"Error",
                          text: "The date you enter is before the given date",
                          type: "warning"
                        }, function (){
                          window.location = "edit_events.php?q=<?php echo $e_id?>";
                        });
                      </script>
                    <?php
                    }else{
                      $update = $conn->query("UPDATE event SET event_name='$ename', datetime_start='$e_datetimestart', datetime_finish='$e_datetimefinish', venue='$e_venue', speaker='$e_speaker', expect_part='$e_part', fee='$e_fee', edited_by='$edit' WHERE event_id='$e_id'");
                      if($update == TRUE){
                      ?>
                        <script type="text/javascript">
                          swal({
                          title: "Data Success",
                          text: "The data save",
                          type: "success"
                          }, function (){
                            window.location = "view_events.php?q=<?php echo $e_id;?>";
                          });
                        </script>
                      <?php
                      }else{
                      ?>
                        <script type="text/javascript">
                          swal({
                          title: "Data Unsuccess",
                          text: "The data unsave",
                          type: "error"
                          }, function (){
                            window.location = "view_events.php?q=<?php echo $e_id;?>";
                          });
                        </script>
                      <?php
                      }
                    }
                  }
                }
              }
              ?>

            </div>
          </div>
        </div>
      </section>
    
  </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer">
    <strong>Develop by:</strong> Zack-Mio A. Sermon
  </footer>

  <!-- AdminLTE App -->
  <script src="../styles/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../styles/dist/js/demo.js"></script>
  
</div>
<!-- ./wrapper -->
</body>
</html>
