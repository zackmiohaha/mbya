<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MBYA</title>
  <link rel="icon" type="image/png" href="../admin/styles/login_design/images/mbya_logo.png"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../admin/styles/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/styles/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../admin/styles/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/styles/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../admin/styles/dist/css/skins/_all-skins.min.css">

  <script src="../admin/styles/login_design/vendor/jquery/jquery-3.2.1.min.js"></script>  

  <!-- Sweet Alert CSS -->
  <link rel="stylesheet" href="../admin/styles/registration/sweetalert/sweetalert.css">
        
  <!-- Sweet Alert JS -->
  <script src="../admin/styles/registration/sweetalert/sweetalert.js"></script>
  <script src="../admin/styles/registration/sweetalert/sweetalert.min.js"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="skin-yellow sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Registration Here!</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <?php
       include('../admin/php/db.php');

       
      if(isset($_POST['pass'])){

        /*$success_message = '';*/
        $count = $conn->query("SELECT count(part_id) as seq FROM participant");
        $seq = mysqli_fetch_array($count);
        $ze = $seq['seq'] + 1;
        $num = str_pad($ze, 5, '0', STR_PAD_LEFT);

        
        $mbya_id = 'MBYA-'.$num;
        $lname = ucwords($_POST['lname']);
        $fname = ucwords($_POST['fname']);
        $ename = ucwords($_POST['ename']);
        $mname = ucwords($_POST['mname']);
        $nname = ucwords($_POST['nname']);
        $gender = $_POST['gender'];
        $bm = $_POST['bm'];
        $bd = $_POST['bd'];
        $by = $_POST['by'];
        $bdate = $by.'-'.$bm.'-'.$bd;

        $sm = $_POST['sm'];
        $sd = $_POST['sd'];
        $sy = $_POST['sy'];

        $church = $_POST['church'];
        $school = $_POST['school'];
        $number = $_POST['number'];

        if(empty($sm)){
          $sm = '00';
        }else{
          $sm = $_POST['sm'];
        }
        if(empty($sd)){
          $sd = '00';
        }else{
          $sd = $_POST['sd'];
        }
        if(empty($sy)){
          $sy = '0000';
        }else{
          $sy = $_POST['sy'];
        }

        $sdate = $sy.'-'.$sm.'-'.$sd;

        if(!checkdate($bm,$bd,$by)){
          $success_message =  'Date of Birth is not Valid';
        }else{
          if(!is_numeric($number)){
            $success_message =  'Phone number is not valid';
          }else{
            $save = $conn->query("INSERT INTO participant(mbya_id, firstname, middlename, lastname, suffixname, nickname, gender, birthdate, spiritualdate, church, school, contact) VALUES('$mbya_id','$fname','$mname','$lname','$ename','$nname','$gender','$bdate','$sdate','$church','$school','$number')");
            if($save == TRUE){
              ?>
              <script type="text/javascript">
                swal({
                  title: "<?php echo $mbya_id;?>",
                  text: "Data Save. Remember you MBYA ID",
                  type: "success"
                }, function (){
                  window.location = "index.php";
                });
              </script>
              <?php
            }else{
              ?>
              <script type="text/javascript">
                alert("There is something wrong");
              </script>
              <?php
            }
          }
        }

      }
      ?>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h1 class="box-title" style="font-size: 30px;">Registration Form </h1>
            </div>

            <form role="form" method="post" action="">
              <div class="box-body">

                <small>Note: Avoid Error or you will fill up again, check before you submit. THANK YOU! </small>

                <div class="form-group">
                  <span><?php 
                  if(!empty($success_message)){
                  echo '<div class="alert alert-info alert-dismissible" style="text-align: center;">'; 
                  if(isset($success_message)){
                    echo '<a href="#" class="close"data-dismiss="alert" aria-label="close">&times;</a>';
                    echo '<h4>'.$success_message.'</h4>';
                    } 
                  echo '</div>';
                  }
                  ?></span>
                </div>

                <div class="form-group">
                  <label class="col-sm-1 control-label"><h4><b>Name:</b></h4></label>

                  <div class="col-sm-3">
                    <input type="text" class="form-control input-lg" placeholder="Lastname" style="text-transform: capitalize;" name="lname" >
                  </div>

                  <div class="col-sm-3">
                    <input type="text" class="form-control input-lg" placeholder="Firstname" style="text-transform: capitalize;" name="fname" >
                  </div>

                  <div class="col-sm-2">
                    <input type="text" class="form-control input-lg" placeholder="Middlename" style="text-transform: capitalize;" name="mname" >
                  </div>

                  <div class="col-sm-1">
                    <input type="text" class="form-control input-lg" placeholder="ex. Jr" style="text-transform: capitalize;" name="ename"><small>Suffix name (leave if no)</small>
                  </div>

                  <div class="col-sm-2">
                    <input type="text" class="form-control input-lg" placeholder="Nickname" style="text-transform: capitalize;" name="nname" >
                  </div>

                  <div class="col-sm-2"> </div>

                  <div class="clearfix"></div>

                </div>

                <div class="form-group">

                  <label class="col-sm-1 control-label"><h4><b>Gender:</b></h4></label>
                  <div class="col-sm-2">
                    <select class="form-control input-lg" name="gender" >
                      <option value="">-Select-</option>
                      <option value="0">Male</option>
                      <option value="1">Female</option>
                    </select>
                  </div>

                  <div class="clearfix"></div>

                </div>

                <div class="form-group">

                  <label class="col-sm-1 control-label"><h4><b>Birthdate:</b></h4></label>

                  <div class="col-sm-2">
                    <select class="form-control input-lg" name="bm" >
                      <option value="">Month</option>
                      <option value='1'>Janaury</option>
                      <option value='2'>February</option>
                      <option value='3'>March</option>
                      <option value='4'>April</option>
                      <option value='5'>May</option>
                      <option value='6'>June</option>
                      <option value='7'>July</option>
                      <option value='8'>August</option>
                      <option value='9'>September</option>
                      <option value='10'>October</option>
                      <option value='11'>November</option>
                      <option value='12'>December</option>
                    </select>
                  </div>

                  <div class="col-sm-1">
                    <input type="text" class="form-control input-lg" name="bd" placeholder="Day" maxlength="2" >
                  </div>

                  <div class="col-sm-1">
                    <input type="text" class="form-control input-lg" name="by" placeholder="Year" maxlength="4" >
                  </div>

                  <div class="clearfix"></div>

                </div>

                <div class="form-group">

                  <label class="col-sm-1 control-label"><h4><b>Spiritual Birthdate:</b></h4></label>

                  <div class="col-sm-2">
                    <select class="form-control input-lg" name="sm">
                      <option value="">Month</option>
                      <option value='1'>Janaury</option>
                      <option value='2'>February</option>
                      <option value='3'>March</option>
                      <option value='4'>April</option>
                      <option value='5'>May</option>
                      <option value='6'>June</option>
                      <option value='7'>July</option>
                      <option value='8'>August</option>
                      <option value='9'>September</option>
                      <option value='10'>October</option>
                      <option value='11'>November</option>
                      <option value='12'>December</option>
                    </select>
                    <small>The Date You Accept Jesus Christ</small>
                  </div>

                  <div class="col-sm-1">
                    <input type="text" class="form-control input-lg" name="sd" placeholder="Day" maxlength="2">
                  </div>

                  <div class="col-sm-1">
                    <input type="text" class="form-control input-lg" name="sy" placeholder="Year" maxlength="4">
                  </div>

                  <div class="clearfix"></div>

                </div>

                <div class="form-group">
                  <label class="col-sm-1 control-label"><h4><b>Church:</b></h4></label>

                  <?php $church = $conn->query("SELECT * FROM church"); ?>
                  <div class="col-sm-4">
                    <select class="form-control input-lg" name="church">
                      <option value="">-Select-</option>
                      <?php while($ch = mysqli_fetch_array($church)):?>
                        <option value="<?php echo $ch['church_id'];?>"> <?php echo $ch['church_name'];?> </option>
                      <?php endwhile;?>
                    </select>
                  </div>

                  <div class="clearfix"></div>

                </div>

                <div class="form-group">
                  <label class="col-sm-1 control-label"><h4><b>School:</b></h4></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control input-lg" style="text-transform: capitalize;" name="school">
                    <small>Leave if No </small>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group">
                  <label class="col-sm-1 control-label"><h4><b>Contact Number:</b></h4></label>
                  <div class="col-sm-4">
                    <div class="input-group">
                      <span class="input-group-addon">+63</span>
                      <input type="text" class="form-control input-lg" name="number" onKeyPress="if(this.value.length==10) return false;">
                    </div><small>Leave if No Contact Number</small>                  
                  </div>
                </div>


              </div>

              <div class="box-footer">
                <button type="submit" name="pass" class="btn btn-success btn-lg">Submit</button>
              </div>

            </form>
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

<!-- Bootstrap 3.3.7 -->
<script src="../admin/styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../admin/styles/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../admin/styles/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../admin/styles/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../admin/styles/dist/js/demo.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../admin/styles/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
