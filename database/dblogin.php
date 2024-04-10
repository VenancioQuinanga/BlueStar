<?php
$uri = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/';

include_once("db.php");
session_start();

$_SESSION["login_msg"] = "";
$_SESSION["register_msg"] = "";

$success_icon = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/> </svg> ";
$info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';

if (isset($_POST["sigin"])) {
    $data = $_POST;
    $user = $data["email"];
    $password = $data["password"];

    $stmt = $conn->prepare("SELECT * FROM client WHERE email = :email");
    $stmt->bindParam(":email",$user);
    $stmt->execute();
    $login = $stmt->fetchAll();

if ($login){

foreach($login as $login){

    if ($login["password"] == $password) {
        $_SESSION["user"] = $login["email"];
        $_SESSION["user_id"] = $login["id"];
        $_SESSION['user_photo'] = $login['photo'];
        header("Location:" . $uri . "account.php");
    }else{
        $_SESSION["login_msg"] = "<p class='btn-danger'><span>$info_icon</pan> Senha incorrreta</p>";
    }
    
}

}else{

    $_SESSION["login_msg"] = "<p class='btn-danger'><span>$info_icon</pan> Esta conta não existe</p>";
    
}

}else if (isset($_POST['sigin_up'])) {
    $data = $_POST;
    $photo = 'default.png';
    $user = $data["name"];
    $email = $data["email"];
    $phone = $data["phone"];
    $password = $data["password"];
    $date = date('d/m/Y');

    $stmt = $conn->prepare("SELECT * FROM client WHERE name = :user and email = :email");
    $stmt->bindParam(":user",$user);
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    $register = $stmt->fetchAll();

    if (!$register) {
        $stmt = $conn->prepare("INSERT INTO client (photo,name,email,phone,password,date) VALUES(:photo,:user,:email,:phone,:password,:date)");
        $stmt->bindParam(":photo",$photo);
        $stmt->bindParam(":user",$user);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":phone",$phone);
        $stmt->bindParam(":password",$password);
        $stmt->bindParam(":date",$date);
        $stmt->execute();
        $register = $stmt->fetchAll();

        $_SESSION['id'] = $conn->lastInsertId();

        $sald = 0;

        $stmt = $conn->prepare("INSERT INTO account (id_client) VALUES (:id_client)");
        $stmt->bindParam(":id_client",$_SESSION['id']);
        $stmt->execute();

        header("Location:". $uri . "continue.php");

    }else {

        $_SESSION["register_msg"] = "<p class='btn-danger'><span>$info_icon</pan> Esta conta já existe</p>";

    }

}else if (isset($_POST['sigin_up_continue'])){

    $data = $_POST;
    $birth = $data['birth'];
    $sex = $data['sex'];
    $country = "Angola";
    $state = $data['state'];
    $city = $data['city'];
    $ba = $data['ba'];
    $dwelling = $data['dwelling'];

    $stmt = $conn->prepare("UPDATE client SET birth = :birth,sex = :sex WHERE id = :id");
    $stmt->bindParam(":birth",$birth);
    $stmt->bindParam(":sex",$sex);
    $stmt->bindParam(":id",$_SESSION['id']);
    $stmt->execute();

    $stmt = $conn->prepare("INSERT INTO address (country,state,city,ba,dwelling,id_references) VALUES(:country,:state,:city,:ba,:dwelling,:id_references)");
    $stmt->bindParam(":country",$country);
    $stmt->bindParam(":state",$state);
    $stmt->bindParam(":city",$city);
    $stmt->bindParam(":ba",$ba);
    $stmt->bindParam(":dwelling",$dwelling);
    $stmt->bindParam(":id_references",$_SESSION['id']);
    $stmt->execute();

    $_SESSION["login_msg"] = "<p  class='btn-success'><span>$success_icon</pan> Cadastrado com sucesso agora faça login</p>";

    header("Location:". $uri . "login.php");

}

?>