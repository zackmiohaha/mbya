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
        <li class="active">Church</li>
      </ol>

      <br>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Church List</h3>

            <div class="box-tools">
              <div class="input-group input-group-sm">
                  <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i>&nbsp;Add Church</button>
              </div>
            </div>
          </div>

          <!-- Modal for Create Event -->
          <div class="modal fade" id="create">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Add Church</h4>
                </div>
                <div class="modal-body">

                  <form class="form-horizontal" method="post" action="" id="add-form">

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Church Name:</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" style="text-transform: capitalize;" name="c_name" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Church Abbreviation:</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" style="text-transform: uppercase;" name="c_abrev" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Cluster:</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="c_cluster" required>
                          <option value="">-Select-</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                        </select>
                      </div>
                    </div>

                  </form>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" name="save" class="btn btn-primary" form="add-form">Save changes</button>
                </div>
              </div>
            </div>
          </div>

          <?php
            if(isset($_POST['save'])){
              $c_name = ucwords($_POST['c_name']);
              $c_abrev = strtoupper($_POST['c_abrev']);
              $c_cluster = $_POST['c_cluster'];

              $insert = $conn->query("INSERT INTO church(church_name,abrev,cluster) VALUES ('$c_name','$c_abrev','$c_cluster')");
              if($insert == TRUE){
                echo "<script> window.open('index.php','_self')</script>";
              }else{
                alert("There is Something Wrong");
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
                  <th>Church Name</th>
                  <th>Abrev</th>
                  <th>Cluster</th>
                  <th>No. of YP</th>
                  <th>Option</th>
                </tr>
             </thead>
             <tbody>
              <?php
              $scan = $conn->query("SELECT * FROM church");
              while($row = mysqli_fetch_array($scan)):
              $id = $row['church_id'];
              ?>
               <tr>
                  <td><?php echo $row['church_name'];?></td>
                  <td><?php echo $row['abrev'];?></td>
                  <td><?php echo $row['cluster'];?></td>
                  <?php $count = $conn->query("SELECT count(church_id) as Total FROM participant WHERE church_id='$id'");
                  $all = mysqli_fetch_array($count);
                  ?>
                  <td><?php echo $all['Total'];?></td>
                  <td>
                    <!-- <button type="submit" id="del" class="btn btn-primary"><i class="fa fa-trash"></i>&nbsp;Remove</button>&nbsp; -->
                    <a href="edit.php?id=<?php echo $id;?>" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                  </td>
                </tr>
              <?php endwhile; ?>
             </tbody> 
            </table>
          </div>
          
        </div>
      </div>
    </div>

    <script type="text/javascript">
      /*$('document').ready(function(){
        $("#del").on('click touch', function(){
          //alert("hoy");

          var cid = document.getElementById('cid').value;

          alert(cid);

          swal({
              title: "Are you sure?",
              text: "You will not be able to recover this data!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: '#DD6B55',
              confirmButtonText: 'Yes, I am sure!',
              cancelButtonText: "No, cancel it!",
              closeOnConfirm: false,
              closeOnCancel: false
              },function(isConfirm){
                if (isConfirm){
                  swal("Confirmed", "This data is deleted)", "success");
                } else {
                    swal("Cancelled", "This data is safe :)", "error");
                e.preventDefault();
              }
          });
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
