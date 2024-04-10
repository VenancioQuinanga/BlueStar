<?php
include_once("db.php");
session_start();

if (!empty($_POST['edit_buy'])) {

    $id = $_SESSION['buy_id'];
    $status  = $_POST['status'];
    print_r('id:'.$id);
    print_r('status:'.$status);
    $stmt = $conn->query("UPDATE buy SET status = '$status' WHERE id = '$id' ");
    header("Location:". $uri . "clients.php ");

}elseif(!empty($_GET['buy_id'])){

    $id = $_GET['buy_id'];
    $_SESSION['buy_id'] = $_GET['buy_id'];
    $stmt = $conn->query("SELECT * FROM buy WHERE id = '$id' ");
    $buy = $stmt->fetch();
    
}

?>
