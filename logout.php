<?php
include_once("components/router.php");
 $rf  = $ref["2"];
include_once("components/header.php");
include_once("database/dblogin.php");

if (isset($_SESSION["user"])) {
    $_SESSION["user_id"] = "";
    $_SESSION["user"] = "";
    header("Location:".$uri."login.php");
}else{
    header("Location:".$uri."products.php");
}

?>
