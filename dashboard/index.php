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

   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../dashboard" class="logo">
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
                    <a href="../../registration/">Registration</a>
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
        <li class="treeview-me active"> <a href="../dashboard/"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>
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
       Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-olive"><i class="fa fa-check-square"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Page Visit</span>
                <span class="info-box-number">1500</span>
                <span class="info-box-text"><p style="font-size: 10px;">(as of August 1, 2018)</p></span>
              </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-facebook-square"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Facebook Like</span>
                <span class="info-box-number">1500</span>
                <span class="info-box-text"><p style="font-size: 10px;">(as of August 1, 2018)</p></span>
              </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="fa fa-list-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">YP Participant</span>
                <span class="info-box-number">1500</span>
                <span class="info-box-text"><p style="font-size: 10px;">(as of August 1, 2018)</p></span>
              </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Members</span>
                <span class="info-box-number">23</span>
                <span class="info-box-text"><p style="font-size: 10px;">(as of August 1, 2018)</p></span>
              </div>
          </div>
        </div>

      </div>

      <div class="row">
        <section class="col-lg-7 connectedSortable">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#incoming" data-toggle="tab">Incoming Events</a></li>
              <li class="active"><a href="#current" data-toggle="tab">Current Event</a></li>
              <li class="pull-left header"><i class="fa fa-calendar-o"></i> Events</li>
            </ul>
            <div class="tab-content">
              <div class="chart tab-pane" id="incoming" style="position: relative; height: 360px;">
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Venue</th>
                      </tr>
                      <tr>
                        <td><a href="">Event</a></td>
                        <td>July 20-July 23, 2018</td>
                        <td>Church Venue</td>
                      </tr>
                      <tr>
                        <td><a href="">Event</a></td>
                        <td>July 20-July 23, 2018</td>
                        <td>Church Venue</td>
                      </tr>
                    </tbody>
                  </table>
              </div>

              <div class="chart tab-pane active" id="current" style="position: relative; height: 360px;">
                  <div style="text-align: center;">
                    <h1><strong>MBYA Fellowship 2018</strong></h1>
                    <h2>Church Venue</h2>
                    <h2>Date</h2>
                    <h3>Speaker</h3>
                    <h4>Fee</h4>
                    <!-- <h1><strong>No Current Event's Yet</strong></h1> -->
                  </div>
              </div>

            </div>
          </div>
        </section>

        <div class="col-md-5">
          <div class="info-box bg-yellow">
            <span class="info-box-icon">C1</span>
            <div class="info-box-content">
              <span class="info-box-text">Cluster 1</span>
              <span class="info-box-text">President: John Doe</span>
              <span class="info-box-number">Total YP: 100</span>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="info-box bg-green">
            <span class="info-box-icon">C2</span>
            <div class="info-box-content">
              <span class="info-box-text">Cluster 2</span>
              <span class="info-box-text">President: John Doe</span>
              <span class="info-box-number">Total YP: 100</span>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="info-box bg-blue">
            <span class="info-box-icon">C3</span>
            <div class="info-box-content">
              <span class="info-box-text">Cluster 3</span>
              <span class="info-box-text">President: John Doe</span>
              <span class="info-box-number">Total YP: 100</span>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="info-box bg-red">
            <span class="info-box-icon">C4</span>
            <div class="info-box-content">
              <span class="info-box-text">Cluster 4</span>
              <span class="info-box-text">President: John Doe</span>
              <span class="info-box-number">Total YP: 100</span>
            </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-md-7">
          <div class="box box-primary direct-chat direct-chat-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> Logs</h3>
              <div class="box-body" style="height: 256px;">
                <table class="table table-condensed">
                  <tbody>
                    <tr>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Operation</th>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                    <tr>
                      <td>July 16, 2018</td>
                      <td>5:00 am</td>
                      <td>Update</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-users"></i> Members</h3>
            </div>
            <div class="box-body no-padding">
              <ul class="users-list clearfix">
                <li>
                  <img style="height: 50px; width: 50px;" src="../image/avatar_1.png" alt="User Image">
                  <a class="users-list-name" href="#">Jon Doe 1</a>
                   <span class="users-list-date">ICCCI</span>
                </li>
                <li>
                  <img style="height: 50px; width: 50px;" src="../image/avatar_2.png" alt="User Image">
                  <a class="users-list-name" href="#">Jon Doe 2</a>
                   <span class="users-list-date">SBCI</span>
                </li>
                <li>
                  <img style="height: 50px; width: 50px;" src="../image/avatar_3.png" alt="User Image">
                  <a class="users-list-name" href="#">Jon Doe 3</a>
                   <span class="users-list-date">KBC</span>
                </li>
                <li>
                  <img style="height: 50px; width: 50px;" src="../image/avatar_4.png" alt="User Image">
                  <a class="users-list-name" href="#">Jon Doe 4</a>
                   <span class="users-list-date">MSBC</span>
                </li>
                <li>
                  <img style="height: 50px; width: 50px;" src="../image/avatar_5.png" alt="User Image">
                  <a class="users-list-name" href="#">Jon Doe 5</a>
                   <span class="users-list-date">TCCF</span>
                </li>
                <li>
                  <img style="height: 50px; width: 50px;" src="../image/avatar_6.png" alt="User Image">
                  <a class="users-list-name" href="#">Jon Doe 6</a>
                   <span class="users-list-date">PCCF</span>
                </li>
                <li>
                  <img style="height: 50px; width: 50px;" src="../image/avatar_7.png" alt="User Image">
                  <a class="users-list-name" href="#">Jon Doe 7</a>
                   <span class="users-list-date">ASBC</span>
                </li>
                <li>
                  <img style="height: 50px; width: 50px;" src="../image/avatar_8.png" alt="User Image">
                  <a class="users-list-name" href="#">Jon Doe 8</a>
                   <span class="users-list-date">PSBC</span>
                </li>
              </ul>
            </div>
            <div class="box-footer text-center">
                <a href="../users/" class="uppercase">View All Users</a>
            </div>
          </div>
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Develop by:</strong> Zack-Mio A. Sermon
  </footer>
  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../styles/bower_components/jquery/dist/jquery.min.js"></script>
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
