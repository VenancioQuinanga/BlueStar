<?php
include_once("db.php");
session_start();

$id = 1;

$stmt = $conn->query("SELECT * FROM shop JOIN shop_address ON id_shop = '$id' ");
$shop = $stmt->fetch();

    if (isset($_POST['edit_shop'])) {

        $id = $_POST['id'];
        $name = $_POST['name'];
        $propietary = $_POST['propietary'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $nif = $_POST['nif'];
        $accessKey = $_POST['accessKey'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $ba = $_POST['ba'];
        $dwelling = $_POST['dwelling'];

        $stmt = $conn->query("UPDATE shop SET name = '$name',propietary = '$propietary',email = '$email',phone = '$phone',nif = '$nif',accessKey = '$accessKey' Where id = '$id' ");

        $stmt = $conn->prepare("UPDATE shop_address SET state = :state,city = :city,ba = :ba,dwelling = :dwelling Where id_shop = :id ");
        $stmt->bindParam(':state',$state);
        $stmt->bindParam(':city',$city);
        $stmt->bindParam(':ba',$ba);
        $stmt->bindParam(':dwelling',$dwelling);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        header("Location:". $uri . "finance.php");
    }

?>