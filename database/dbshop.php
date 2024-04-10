<?php
include_once("db.php");

    if (isset($_POST['shop'])) {

        $name = $_POST['name'];
        $propietary = $_POST['propietary'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $nif = $_POST['nif'];
        $accessKey = $_POST['accessKey'];
        $country = 'Angola';
        $state = $_POST['state'];
        $city = $_POST['city'];
        $ba = $_POST['ba'];
        $dwelling = $_POST['dwelling'];
        
        $stmt = $conn->query("INSERT INTO shop (name,propietary,email,phone,nif,accessKey) values ('$name','$propietary','$email','$phone','$nif','$accessKey')");
        $id = $conn->lastInsertId();

        $stmt = $conn->query("INSERT INTO shop_address (country,state,city,ba,dwelling,id_shop) values ('$country','$state','$city','$ba','$dwelling','$id') ");
        
        header("Location:". $uri . "finance.php");

    }

?>