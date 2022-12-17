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

  $name =$log;


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

  <title>User List</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
  rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <style>

    .title {
      font-size: 30px;
      font-weight: 500;
      margin-bottom: 25px;
      color: black;
      text-align: center; 
    }


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

        <div class="container-fluid">

          <!-- Page Heading -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Username</th>
                      <!-- <th>Password</th> -->
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </thead>
                <?php
                $sql="SELECT * FROM users where is_admin!=1";
                $query = mysqli_query($conn, $sql);
                $x = 1;
                while($data = mysqli_fetch_array($query)){


                  ?>

                  <tbody id="myTable">
                    <tr>
                      <th scope="row"><?php echo $x; ?></th>
                      <td><?php echo $data['name']; ?></td>
                      <td><?php echo $data['email']; ?></td>
                      <td><?php echo $data['address']; ?></td>
                      <td><?php echo $data['u_name']; ?></td>
                      <!-- <td><?php //echo $data['password']; ?></td> -->
                      <td><img src="img/<?php echo $data['img']; ?>" alt="<?php echo $data['img']; ?>" width="100" height="100"></td>
                      <td><a type="button" class="btn btn-primary btn_edit" data-id="<?php echo $data['id']; ?>" data-toggle="modal" data-target="#edit_data">Edit</a>&nbsp;&nbsp;<a type="button" href="connection/users_fun?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a></td>


                    </tr>
                    <?php
                    $x++;
                  }
                  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
      <!-- End of Main Content -->
      <div class="modal fade" id="edit_data" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="test_id">Edit Member</h4>
            </div>
            <div class="modal-body">

              <form action="connection/users_fun.php" enctype="multipart/form-data" method="post" >
                <input type="hidden" name="id_up" id="id_up">


                <div class="form-group form-float">
                  <div class="form-line">
                    <label class="form-label"> Name:<font color="#FF0000"><strong>*</strong></font></label>
                    <input type="text" class="form-control" name="name_up" id="name_up" autofocus autocomplete="off" required>

                  </div>
                </div>

                <div class="form-group form-float">
                  <div class="form-line">
                    <label class="form-label">Address :<font color="#FF0000"><strong>*</strong></font></label>
                    <input type="text" class="form-control" name="address_up" id="address_up" autofocus autocomplete="off" required>

                  </div>
                </div>

                <div class="form-group form-float">
                  <div class="form-line">
                    <label class="form-label">NIC:<font color="#FF0000"><strong>*</strong></font></label>
                    <input type="text" class="form-control" name="nic_up" autocomplete="off" id="nic_up" required>

                  </div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <label class="form-label">Email:</label>
                    <input type="text" class="form-control" name="email_up" autocomplete="off" id="email_up" required>
                  </div>

                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <label class="form-label">Contact No:</label>
                    <input type="text" class="form-control" name="tel_no_up" autocomplete="off" id="tel_no_up" required>
                  </div>

                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <label class="form-label">Contact Number2:</label>
                    <input type="text" class="form-control" name="contact_no2_up" autocomplete="off" id="contact_no2_up" required>
                  </div>

                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <label class="form-label">Username:</label>
                    <input type="text" class="form-control" name="uname_up" autocomplete="off" id="uname_up" required>
                  </div>

                </div>
         
                <div>
                  <img id="my_img" src="" width="80" height="60">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="img_up" name="img_up" >
                </div>
                <input type="hidden" name="img_old" id="img_old">

                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" name="submit" class="btn btn-danger" id="edit">UPDATE</button>
                </div>
              </form>
              <br>


            </div>



          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>© 2022 Copyright: </span>
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
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>




<?php
if (isset($_GET['del_st'])) {
  $status = $_GET['del_st'];
  if ($status == 1) {
    ?>
    <script>
      alert("Successfully Deleted");
      window.location.href="user_edit.php";
    </script>
    <?php
  } else if ($status == 0) {
    ?>

    <script>
      alert("Error!");
      window.location.href="user_edit.php";
    </script>
    <?php
  }
}
?>

<script type="text/javascript">

  $(".btn_edit").click(function() {

    var id = $(this).attr('data-id');
    $("#id_up").val(id);

    $.post("connection/users_fun.php", {
      get_dataset: "data",
      id: id
    }, function(data) {
          document.getElementById("my_img").src = "img/"+data.img;
      $("#name_up").val(data.name);
      $("#address_up").val(data.email);
      $("#email_up").val(data.address);
      $("#nic_up").val(data.nic);
      $("#tel_no_up").val(data.contact_no1);
      $("#contact_no2_up").val(data.contact_no2);
      $("#uname_up").val(data.u_name);
      $("#password_up").val(data.password);
      $("#img_old").val(data.img);
      // $("#my_img").prop("src","img/Screenshot (1).png");
     
    }, "json");
  });






  // $("#edit").click(function() {
  //   alert('test');

  //   var name_up = $("#name_up").val();
  //   var address_up = $("#address_up").val();
  //   var email_up = $("#email_up").val();
  //   var nic_up = $("#nic_up").val();
  //   var tel_no_up = $("#tel_no_up").val();
  //   var contact_no2_up = $("#contact_no2_up").val();
  //   var uname_up = $("#uname_up").val();
  //   // var password_up = $("#password_up").val();
  //   var img_up = $("#img_up").val();
  //   // var img_up = $("#img_up").val();

  //   $.post('connection/users_fun.php', {
  //     edit_users: 'data',
  //     name_up: name_up,
  //     address_up: address_up,
  //     email_up: email_up,
  //     nic_up: nic_up,
  //     tel_no_up: tel_no_up,
  //     contact_no2_up: contact_no2_up,
  //     uname_up: uname_up,
      
  //     img_up: img_up,

  //       }, //pass data to database

  //       function(data) {
  //         if (data.msgType === 1) {
  //           swal({
  //             title: "Success!",
  //             text: "Successfuly Added!",
  //             type: "success"
  //           }).then(okay => {
  //             if (okay) {
  //               window.reload();
  //             }
  //           });

  //         } else {
  //           swal("Something Went Wrong", "Please Try Again!", "warning");
  //         }

  //       }, "json");
  // });
</script>

</body>

</html>