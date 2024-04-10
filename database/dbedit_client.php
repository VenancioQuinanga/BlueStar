<?php
include_once("db.php");

if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $_SESSION['u_id'] = $_GET['user_id'];

    $stmt = $conn->query("SELECT * FROM client JOIN address ON client.id = '$id' JOIN account ON id_client = '$id' ");
    $client = $stmt->fetch();

    $stmt = $conn->query("SELECT * FROM buy WHERE id_client = '$id'");
    $buy = $stmt->fetchAll();

    foreach ($buy as $b) { }

}

?>