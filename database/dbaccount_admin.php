<?php
include_once('database/dbadmin.php');
session_start();

if (!empty($_SESSION['admin_id'])) {
    $id = $_SESSION['admin_id'];

    $stmt = $conn->query("SELECT * FROM admin WHERE id = '$id' ");
    $admin = $stmt->fetch();
    $_SESSION['admin_photo'] = $admin['photo'];
    
}elseif (empty($_SESSION['admin_id'])) {
    header("Location:". $uri . "sigin_admin.php");
}

?>