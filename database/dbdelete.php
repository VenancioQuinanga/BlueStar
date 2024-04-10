<?php
include_once('db.php');
session_start();

if(isset($_GET['product_id'])){

    $id = $_GET['product_id'];

    $sql = "DELETE FROM product WHERE id = '$id' ";
    $stmt = $conn->query($sql);

    header("Location:". $uri . "../dashboard.php");

}elseif(isset($_GET['user_id'])){

    $id = $_GET['user_id'];

    $sql = "DELETE FROM client WHERE id = '$id' ";
    $stmt = $conn->query($sql);

    header("Location:". $uri . "../client.php");
    
}
  