<?php
    $host = "localhost";
    $dbname = "bluestar";
    $username = "root";
    $pass = "";

    try{
    $conn = new PDO("mysql:host={$host};dbname={$dbname}",$username,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  } catch (PDOException $e) {

    print "Erro: " . $e->getMessage() . "<br/>";
    die();

  }
?>