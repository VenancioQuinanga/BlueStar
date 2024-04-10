<?php
include_once('db.php');
session_start();

if(isset($_POST['edit_profile_admin'])){

    $id = $_SESSION['admin_id'];
    $data = $_POST;
    $photo = empty($_FILES['photo']['name']) ? $_SESSION['admin_photo'] : bin2hex(random_bytes(10)).$_FILES['photo']['name'];
    $user = $data["name"];
    $email = $data["email"];
    $phone = $data["phone"];
    $password = $data["password"];
    
    $sql = "UPDATE admin SET photo = '$photo',name = '$user',email = '$email',phone = '$phone',password = '$password' WHERE id = '$id'";
    $stmt = $conn->query($sql);

    if (isset($_FILES['photo']) && !empty($_FILES['photo'])) {

        if (move_uploaded_file($_FILES['photo']['tmp_name'],'./assets/img/admins/'.$photo)) {

        }
    }

    header("Location:". $uri . "account_admin.php");
  }

?>