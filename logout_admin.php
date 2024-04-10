<?php
include_once("components/router.php");
 $rf  = $ref["2"];
include_once("components/header.php");
include_once("database/dbadmin.php");

if (isset($_SESSION["admin"])) {

    $_SESSION["admin_id"] = "";
    $_SESSION["admin"] = "";

    header("Location:".$uri."sigin_admin.php");
}else{
    header("Location:".$uri."dashboard.php");
}

?>
