<?php
include_once('database/dblogin.php');

if (!empty($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];

    $stmt = $conn->query("SELECT * FROM client JOIN address ON client.id = '$id' JOIN account ON id_client = '$id' ");
    $client = $stmt->fetch();

    $stmt = $conn->prepare('SELECT * FROM buy WHERE id_client = :id');
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $buy = $stmt->fetchAll();

    foreach ($buy as $b) { }

}elseif ($_SESSION['user_id'] == '') {
    header("Location:". $uri . "login.php");
}

?>