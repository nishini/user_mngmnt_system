<?php
include("db/config.php");
session_start();
$log = $_SESSION['id'];

if (empty($log)) {
  $redirectUrl = "index.php";
  echo "<script type=\"text/javascript\">";
  echo "window.location.href = '$redirectUrl'";
  echo "</script>";
} else {

  $name = $log;


  date_default_timezone_set('Asia/Colombo');
  $date = date("Y-m-d");

  // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add Users</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <style>
    .title {
      font-size: 30px;
      font-weight: 500;
      margin-bottom: 25px;
      color: black;
      text-align: center;
    }

    /*****.container {
      max-width: auto;
      width: auto;
      margin: 45px auto;
      padding: 30px;
      border: 3px solid #b7babd;
      }***/
    </style>

  </head>

  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <?php
      include("layout/sidebar.php");
      ?>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <?php
          include("layout/navbar.php");
          ?>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">


            <div class="container">


              <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                  <div class="title">Add Users</div>

                  <!-- Nested Row within Card Body -->
                     <form  action="connection/users_fun.php" enctype="multipart/form-data" method="post" class="user">
                  <div class="row ">
                  
                    <div class="col-md-6">
                     <div class="mb-3">
                      <label class="form-label" for="name">Name<font color="#FF0000"><strong>*</strong></font></label>
                      <input class="form-control" type="text" id="name" name="name" placeholder="Enter Name" required/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="name">Address<font color="#FF0000"><strong>*</strong></font></label>
                      <input class="form-control" type="text" id="address" name="address" placeholder="Enter Address" required/>
                    </div>

                  </div>

                  <div class="col-md-6">
                   <div class="mb-3">
                    <label class="form-label" for="name">NIC<font color="#FF0000"><strong>*</strong></font></label>
                    <input class="form-control" type="text" id="nic" maxlength="12" name="nic" placeholder="Enter NIC" required/>
                  </div>
                </div>
                  <div class="col-md-6">
               <div class="mb-3">
                <label class="form-label" for="name">Email<font color="#FF0000"><strong>*</strong></font></label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Enter Email Address" required/>
              </div>
            </div>
                <div class="col-md-6">
                 <div class="mb-3">
                  <label class="form-label" for="name">Contact No<font color="#FF0000"><strong>*</strong></font></label>
                  <input class="form-control" type="text" id="tel_no" name="tel_no" placeholder="Enter Contact No" required/>
                </div>

              </div>

             <div class="col-md-6">
             <div class="mb-3">
              <label class="form-label" for="name">Contact Number2</label>
              <input class="form-control" type="text" id="contact_no2" name="contact_no2" placeholder="Enter Contact Number2" required/>
            </div>

          </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label" for="name">Username<font color="#FF0000"><strong>*</strong></font></label>
                <input class="form-control" type="text" id="uname" name="uname" placeholder="Enter Username" required/>
              </div>

            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label" for="name">Password<font color="#FF0000"><strong>*</strong></font></label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Enter Password" required/>
              </div>
            </div>
           
          <div class="col-md-12">
          <div class="form-group">
            <label for="exampleInputFile">Image</label>
            <input type="file" id="img" name="img" required>
          </div>
        </div>
          <div class="col-md-12">
            <button type="submit" name="submit" class="btn btn-success " style="float: right;s" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit
            </button>
          </div>
     

        </div>
   </form>



      </div>
    </div>

  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<div class="modal fade" id="edit_data" role="dialog">
  <div class="modal-dialog">

  
  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>© 2022 Copyright: User Management System</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script src="js/demo/chart-bar-demo.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <link rel="stylesheet" href="js/demo/sweetalert/sweetalert.min.js" /> -->
<link rel="stylesheet" href="js/demo/sweetalert/sweetalert.css" />





</body>

</html>