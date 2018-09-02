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
       View Event
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Event</li>
        <li class="active">View Event</li>
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

              <form class="form-horizontal">
                <div class="box-body">

                  <?php while($row=mysqli_fetch_array($get)):
                    $d_s = date_create($row['datetime_start']);
                    $date_start = date_format($d_s,'F d, Y');
                    $time_start = date_format($d_s,'h:i a');
                    $d_f = date_create($row['datetime_finish']);
                    $date_finish = date_format($d_f,'F d, Y');
                    $time_finish = date_format($d_f,'h:i a');
                  ?>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Event Name:</label>
                    <div class="col-sm-7">
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" style="border: 0; font-size: 30px;"><?php echo $row['event_name'];?></p>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Date:</label>
                    <div class="col-sm-3">
                      <p class="form-control" style="border: 0;"><?php echo $date_start;?></p>
                    </div>
                    <label class="col-sm-1" >to:</label>
                    <div class="col-sm-3">
                      <p class="form-control" style="border: 0;"><?php echo $date_finish;?></p>
                    </div>
                  </div>

                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Time:</label>
                      <div class="col-sm-3">
                        <p class="form-control" style="border: 0;"><?php echo $time_start;?></p>
                      </div>
                      <label class="col-sm-1" >to:</label>
                      <div class="col-sm-3">
                        <p class="form-control" style="border: 0;"><?php echo $time_finish;?></p>
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Venue:</label>
                    <div class="col-sm-7">
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" style="border: 0;"><?php echo $row['venue'];?></p>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Speaker:</label>
                    <div class="col-sm-7">
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" style="border: 0;"><?php echo $row['speaker'];?></p>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Registration Fee:</label>
                    <div class="col-sm-7">
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" style="border: 0;"><?php echo $row['fee'];?></p>
                    </div>
                  </div>

                  <?php
                    $part = $conn->query("SELECT count(part_id) as TOTAL FROM delegates WHERE event_id='".$row['event_id']."'");
                    $count = mysqli_fetch_array($part);
                    if($count['TOTAL'] == 0){
                      $put = $row['expect_part'].' (expected)';
                    }else{
                      $put = $count['TOTAL'];
                    }
                  ?>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Participant:</label>
                    <div class="col-sm-7">
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" style="border: 0;"><?php echo $put;?></p>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Created By:</label>
                    <div class="col-sm-3">
                      <p class="form-control" style="border: 0;"><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];?></p>
                    </div>

                    <label class="col-sm-2 control-label">Updated By:</label>
                    <div class="col-sm-3">
                      <p class="form-control" style="border: 0;"><?php echo $row['edited_by'];?></p>
                    </div>
                  </div>

                </div>
              </form>

              <?php $date = date('Y-m-d');
                $date_st = date_format($d_s,'Y-m-d');
              ?>

              <div class="box-footer">
                <?php
                  if($date < $date_st){
                  ?>
                    <a href="../event/edit_events.php?q=<?php echo $row['event_id'];?>" class="btn btn-primary">Edit</a>
                  <?php
                  }
                ?>
              </div>

              <?php endwhile;?>

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
