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


/****************************** Edit *************************************/

if(isset($_POST['id_up'])) {
    $name_up = htmlspecialchars(strip_tags(trim($_POST['name_up'])), ENT_QUOTES, 'UTF-8');
    $address_up = htmlspecialchars(strip_tags(trim($_POST['address_up'])), ENT_QUOTES, 'UTF-8');
    $email_up = htmlspecialchars(strip_tags(trim($_POST['email_up'])), ENT_QUOTES, 'UTF-8');
    $nic_up = htmlspecialchars(strip_tags(trim($_POST['nic_up'])), ENT_QUOTES, 'UTF-8');
    $tel_no_up = htmlspecialchars(strip_tags(trim($_POST['tel_no_up'])), ENT_QUOTES, 'UTF-8');
    $contact_no2_up = htmlspecialchars(strip_tags(trim($_POST['contact_no2_up'])), ENT_QUOTES, 'UTF-8');
    $uname_up = htmlspecialchars(strip_tags(trim($_POST['uname_up'])), ENT_QUOTES, 'UTF-8');
    $id_up = htmlspecialchars(strip_tags(trim($_POST['id_up'])), ENT_QUOTES, 'UTF-8');
    if(isset($_FILES['img_up'])){
 

        $folder_path = '../img/';

        $filename = basename($_FILES['img_up']['name']);
        $newname = $folder_path . $filename;

        $FileType = pathinfo($newname,PATHINFO_EXTENSION);

        move_uploaded_file($_FILES['img_up']['tmp_name'], $newname);
    }else{
     $filename=  htmlspecialchars(strip_tags(trim($_POST['img_old'])), ENT_QUOTES, 'UTF-8');  
 }



 $sql_user = "UPDATE users SET  name='$name_up',
 address='$address_up',
 email='$email_up',    
 nic='$nic_up',
 contact_no1='$tel_no_up',
 contact_no2='$contact_no2_up',
 u_name='$uname_up',
 img='$filename'
 WHERE id='$id_up' ";


 $result = mysqli_query($conn, $sql_user);

 if ($result) {

    header("location: ../user_edit.php?status_up=1");
    echo $sql_user;
                // echo "success";
} else {

    header("location: ../user_edit.php?status_up=0");
    echo $sql_user;               

}           
}

/****************************** GET DATA *************************************/

if (array_key_exists('get_dataset', $_POST)) {
    $id = htmlspecialchars(strip_tags(trim($_POST['id'])), ENT_QUOTES, 'UTF-8');

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE id=$id"); 
    $row = mysqli_fetch_assoc($sql);

    echo json_encode($row);
} 


/****************************** DELET*************************************/


if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id=$id";
    $stmt_log = mysqli_query($conn, $sql);


    if($stmt_log==false){

        echo $sql;
    }else{
       header("location: ../user_edit.php?del_st=1"); 
   }

}


?>