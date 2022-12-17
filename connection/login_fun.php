<?php
include("../db/config.php");
session_start();

$username = $_POST['user'];
$password = $_POST['password'];

$username = stripcslashes($username);
$password = stripcslashes($password);
$password = hash('sha256', $password); // password encrypt 

$sql = "SELECT * from users where u_name = '$username'  and is_admin=1 " or die(mysql_error());
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
$id = $row['u_name'];
$pwd = $row['password'];

if ($count == 1 && $pwd==$password  ) {
 // check user count and password
    header("Location:../add_users.php");
    $_SESSION['id'] =  $id;
    $_SESSION['uname'] =  $id;
} else if ($count == 1 && $password!=$row['password']) {

	 header("Location:../index.php?error=Invalid Password");
} else {
	 header("Location:../index.php?error=Invalid Login");
}
