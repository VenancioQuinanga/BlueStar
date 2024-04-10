<?php
include_once('db.php');
session_start();

if(isset($_POST['edit_product'])){

    $id = $_SESSION['product_id'];
    $data = $_POST;
    $photo = empty($_FILES['photo']['name']) ? $_SESSION['product_photo'] : bin2hex(random_bytes(10)).$_FILES['photo']['name'];
    $mark = $data["mark"];
    $model = $data["model"];
    $category = $data["category"];
    $type = $data["type"];
    $stock = $data['stock'];

    if ($stock != $_SESSION['product_stock']) {
        $_SESSION['product_stock'] = '';
    }

    $buies = !empty($_SESSION['product_stock']) ? $_SESSION['product_buies'] : 0 ;
    
    $sql = "UPDATE product SET photo = '$photo',mark = '$mark',model = '$model',category = '$category',type = '$type',stock = '$stock',buies = '$buies' WHERE id = '$id'";
    $stmt = $conn->query($sql);
    
    if (isset($_FILES['photo']) && !empty($_FILES['photo'])) {

        if (move_uploaded_file($_FILES['photo']['tmp_name'],'./assets/img/products/'.$photo)) {

        }
    }

    header("Location:". $uri . "dashboard.php");
    
  }

?>