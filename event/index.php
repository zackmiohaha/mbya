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

  <link rel="stylesheet" href="../styles/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../styles/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../styles/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../styles/plugins/timepicker/bootstrap-timepicker.min.css">

  <!-- Sweet Alert CSS -->
  <link rel="stylesheet" href="../styles/registration/sweetalert/sweetalert.css">

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
       Event
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Event</li>
      </ol>

      <br>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">All Events</h3>

            <div class="box-tools">
              <div class="input-group input-group-sm">
                  <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i>&nbsp;Create Event</button>
              </div>
            </div>
          </div>

          <!-- Modal for Create Event -->
          <div class="modal fade" id="create">
          ?>
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Create Event</h4>
                </div>
                <div class="modal-body">

                  <form class="form-horizontal" method="post" action="" id="myform">

                    <?php $date = date('Y-m-d');?>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Event Name:</label>
                      <div class="col-sm-8">
                        <input type="hidden" id="date_today" value="<?php echo $date;?>">
                        <input type="text" class="form-control" style="text-transform: capitalize;" name="event_name" id="event_name" >
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Date:</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control pull-right" data-date-format='yyyy-mm-dd' id="dstart" name="event_start" >
                      </div>
                      <label class="col-sm-1" >to:</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control pull-right" data-date-format='yyyy-mm-dd' id="dfinish" name="event_finish" >
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
                        <label class="col-sm-3 control-label">Time:</label>
                        <div class="col-sm-3">
                          <input type="time" class="form-control timepicker" id="tstart" name="event_tstart" >
                        </div>
                        <label class="col-sm-1" >to:</label>
                        <div class="col-sm-3">
                          <input type="time" class="form-control timepicker" id="tfinish" name="event_tfinish" >
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Venue:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" style="text-transform: capitalize;" name="event_venue" >
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Speaker:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" style="text-transform: capitalize;" name="event_speaker" >
                        <small>If more than 1 speaker separate with comma (,)</small>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Registration Fee:</label>
                      <div class="col-sm-7">
                        <div class="input-group">
                          <span class="input-group-addon">₱</span>
                          <input type="number" class="form-control" name="event_fee" >
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Expected Participant:</label>
                      <div class="col-sm-7">
                        <input type="number" class="form-control" name="event_part" >
                      </div>
                    </div>

                  </form>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" form="myform" name="save" id="save">Save changes</button>
                </div>
              </div>
            </div>
          </div>

          <?php
          if(isset($_POST['save'])){

            $event_name = ucwords($_POST['event_name']);
            $event_start = $_POST['event_start'];
            $event_finish = $_POST['event_finish'];
            $event_tstart = $_POST['event_tstart'];
            $event_tfinish = $_POST['event_tfinish'];
            $event_venue = ucwords($_POST['event_venue']);
            $event_speaker = ucwords($_POST['event_speaker']);
            $event_fee = $_POST['event_fee'];
            $event_part = $_POST['event_part'];

            $datetime_start = $event_start.' '.$event_tstart;
            $datetime_finish = $event_finish.' '.$event_tfinish;

            if($date > $event_start){
              ?>
              <script type="text/javascript">
                swal({
                  title: "Error",
                  text: "The date you enter is before the current date",
                  type: "error"
                }, function (){
                  window.location = "index.php";
                });
              </script>
              <?php
            }else{
              if($event_start > $event_finish){
                ?>
                <script type="text/javascript">
                swal({
                  title:"Error",
                  text: "The date you enter is before the given date",
                  type: "warning"
                }, function (){
                  window.location = "index.php";
                });
                </script>
                <?php
              }else{
                $import = $conn->query("INSERT INTO event(event_name,datetime_start,datetime_finish,venue,speaker,expect_part,fee,created_by,edited_by,status) VALUES('$event_name','$datetime_start','$datetime_finish','$event_venue','$event_speaker','$event_part','$event_fee','$sess_id','none',0)");

            if($import == TRUE){
              ?>
              <script type="text/javascript">
                swal({
                  title: "Data Success",
                  text: "The data save",
                  type: "success"
                }, function (){
                  window.location = "index.php";
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
                  window.location = "index.php";
                });
              </script>
              <?php
            }
              }
            }
          }
          ?>

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
                <th width="25%">Date</th>
                <th width="25%">Venue</th>
                <th width="15%">No. of Participants</th>
                <th>Status</th>
              </tr>
             </thead> 
             <tbody>
              <?php
              $get = $conn->query("SELECT * FROM event");
              while($row = mysqli_fetch_array($get)):
                $eid = $row['event_id'];
                $d_s = date_create($row['datetime_start']);
                $date_start = date_format($d_s,'F d, Y');
                $date_st = date_format($d_s,'Y-m-d');
                $d_f = date_create($row['datetime_finish']);
                $date_finish = date_format($d_f,'F d, Y');
                $date_fi = date_format($d_f,'Y-m-d');
              ?>
              <tr>
                <td><a href="../event/view_events.php?q=<?php echo $row['event_id'];?>"><?php echo $row['event_name'];?></a></td>
                <td><?php echo $date_start.' - '.$date_finish;?></td>
                <td><?php echo $row['venue'];?></td>
                <?php
                $part = $conn->query("SELECT count(part_id) as TOTAL FROM delegates WHERE event_id='$eid'");
                $count = mysqli_fetch_array($part);
                if($count['TOTAL'] == 0){
                  echo '<td>'.$row['expect_part'].' (expected)</td>';
                }else{
                  echo '<td>'.$count['TOTAL'].'</td>';
                }
                ?>
                <?php
                if($date < $date_st){
                  echo '<td> Incoming </td>';
                }else{
                  if($date > $date_fi){
                  echo '<td> Finish </td>';
                  }
                  else{
                  echo '<td> Today </td>';
                  }
                }
                ?>
              </tr>
              <?php endwhile;?>
            </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    </section>
    
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
