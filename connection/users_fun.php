<?php
include("../db/config.php");
session_start();

if(isset($_POST['name'])) {
   $name = htmlspecialchars(strip_tags(trim($_POST['name'])), ENT_QUOTES, 'UTF-8'); 
   $address  = htmlspecialchars(strip_tags(trim($_POST['address'])), ENT_QUOTES, 'UTF-8');
   $nic  = htmlspecialchars(strip_tags(trim($_POST['nic'])), ENT_QUOTES, 'UTF-8');
   $contact_no1  = htmlspecialchars(strip_tags(trim($_POST['tel_no'])), ENT_QUOTES, 'UTF-8');
   $contact_no2  = htmlspecialchars(strip_tags(trim($_POST['contact_no2'])), ENT_QUOTES, 'UTF-8');
   $u_name  = htmlspecialchars(strip_tags(trim($_POST['uname'])), ENT_QUOTES, 'UTF-8');
   $password  = htmlspecialchars(strip_tags(trim($_POST['password'])), ENT_QUOTES, 'UTF-8');
   $email  = htmlspecialchars(strip_tags(trim($_POST['email'])), ENT_QUOTES, 'UTF-8');
   $pwd = hash('sha256', $password);

   $folder_path = '../img/';

   $filename = basename($_FILES['img']['name']);
   $newname = $folder_path . $filename;

   $FileType = pathinfo($newname,PATHINFO_EXTENSION);

      
   $sqlu = "SELECT * FROM users WHERE u_name='$u_name' OR email='$email' ";
   $stmtu = mysqli_query($conn, $sqlu);
   $countu = mysqli_num_rows($stmtu);


   if($countu == 0){


    if (move_uploaded_file($_FILES['img']['tmp_name'], $newname))
    {

        $filesql = "INSERT INTO users SET
        name='$name',
        address='$address',
        nic='$nic',
        contact_no1='$contact_no1',
        contact_no2='$contact_no1',
        u_name='$u_name',
        password='$pwd',
        email='$email',
        is_admin = 0,
        img='$filename'



        ";
        $fileresult = mysqli_query($conn,$filesql);

        if ($fileresult)
        {
                 // echo $filesql;
            header("location: ../add_users.php?status=1");
        } else
        {
            // header("location: ../add_users.php?status=0");
         echo $filesql;
     }
 }
 else
 {

     header("location: ../add_users.php?status=3");
 }

}else{
    header("location: ../add_users.php?status=2");
}
}

?>