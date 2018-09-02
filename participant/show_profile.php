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
  <link rel="stylesheet" href="../styles/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../styles/dist/js/DataTables/css/datatables.css">
  <link rel="stylesheet" href="../styles/dist/js/DataTables/css/datatables.min.css">

  <script src="../styles/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../styles/dist/js/jquery-3.3.1.js" type="text/javascript"></script>
  <script src="../styles/dist/js/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="../styles/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="../styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../styles/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <script src="../styles/dist/js/DataTables/js/datatables.js" type="text/javascript"></script>
  <script src="../styles/dist/js/DataTables/js/datatables.min.js" type="text/javascript"></script>

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
        <li class="treeview-me active"> <a href="../participant/"> <i class="fa fa-list"></i> <span>Participant</span> </a> </li>
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
       View Yp's Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Participant</li>
        <li class="active">View Profile</li>
      </ol>

      <br>

      <section class="content">

        <div class="row">
          <div class="col-md-12">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Event</h3>
              </div>

              <form class="form-horizontal">
                <div class="box-body">

                  <div class="form-group">
                    <label class="col-sm-2 control-label">MBYA ID:</label>
                    <div class="col-sm-10">
                      <p class="form-control" style="border: 0;">MBYA-C1-0001</p>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Name:</label>
                    <div class="col-sm-7">
                      <!-- <input type="text" class="form-control" value="Event Name"> -->
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" style="border: 0;">John "Jun" Doe</p>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Birth Date:</label>
                    <div class="col-sm-3">
                      <!-- <input type="text" class="form-control pull-right" id="dstart"> -->
                      <p class="form-control" style="border: 0;">May 12, 1994 (23 years old)</p>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Spiritual Birth Date:</label>
                    <div class="col-sm-3">
                      <!-- <input type="text" class="form-control pull-right" id="dstart"> -->
                      <p class="form-control" style="border: 0;">January 23, 2001</p>
                    </div>
                  </div>

                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Church:</label>
                      <div class="col-sm-3">
                        <!-- <input type="text" class="form-control timepicker" id="tstart"> -->
                        <p class="form-control" style="border: 0;">Iligan City Community Church</p>
                      </div>
                  </div> 

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Gender:</label>
                    <div class="col-sm-7">
                      <!-- <input type="text" class="form-control" value="Event Name"> -->
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" style="border: 0;">Male</p>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Contact Number:</label>
                    <div class="col-sm-7">
                      <!-- <input type="text" class="form-control" value="Event Name"> -->
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" style="border: 0;">09152700309</p>
                    </div>
                  </div>

                </div>
              </form>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

              <br>

              <div class="box-header with-border">
                <h3 class="box-title">Event's Attend</h3>
              </div>

              <script type="text/javascript">
                $(document).ready( function () {
                  $('#mytable').DataTable();
                });
              </script>

              <div class="box-body">
                <table id="mytable" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="25%">Event Name</th>
                    <th width="15%">Date</th>
                    <th width="25%">Venue</th>
                    <th width="10%">Attendance</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Event 1</a></td>
                    <td>July 17, 2018</td>
                    <td>Iligan City Community Church</td>
                    <td><p>Present</p></td>
                  </tr>
                  <tr>
                    <td>Event 2</a></td>
                    <td>July 17, 2018</td>
                    <td>Iligan City Community Church</td>
                    <td><p style="color: red;">Absent</p></td>
                  </tr>
                </tbody>
              </table>
              </div>

            </div>
          </div>
        </div>

      </section>
    
  </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer">
    <strong>Develop by:</strong> Zack-Mio A. Sermon
  </footer>

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
  
</div>
<!-- ./wrapper -->
</body>
</html>
