<?php
$uri = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/';

include_once("db.php");
session_start();

$_SESSION["sigin_msg"] = "";
$_SESSION["sigin_up_admin_msg"] = "";

$success_icon = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/> </svg> ";
$info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';

if (isset($_POST["sigin"])) {
    $data = $_POST;
    $user = $data["email"];
    $password = $data["password"];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE email = :email");
    $stmt->bindParam(":email",$user);
    $stmt->execute();
    $sigin = $stmt->fetchAll();

if ($sigin){

foreach($sigin as $sigin){

    if ($sigin["password"] == $password) {
        $_SESSION["admin"] = $sigin["email"];
        $_SESSION["admin_id"] = $sigin["id"];
        header("Location:" . $uri . "dashboard.php");
    }else{
        $_SESSION["sigin_msg"] = "<p  class='btn-danger'><span>$info_icon</pan> Senha incorrreta</p>";
    }
    
}

}else{

    $_SESSION["sigin_msg"] = "<p class='btn-danger'><span>$info_icon</pan> Esta conta não existe</p>";
    
}

}else if (isset($_POST['sigin_up'])) {
    $data = $_POST;
    $photo = 'default.png';
    $user = $data["name"];
    $email = $data["email"];
    $phone = $data["phone"];
    $password = $data["password"];
    $accessKey = $_POST['accessKey'];
    $date = date('d/m/Y');

    $stmt = $conn->prepare("SELECT * FROM admin WHERE name = :user and email = :email");
    $stmt->bindParam(":user",$user);
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    $sigin_up = $stmt->fetchAll();

    if (!$sigin_up) {

        $stmt = $conn->query("SELECT * FROM shop WHERE id = 1");
        $key = $stmt->fetch();

        if ($accessKey == $key['accessKey']) {

            $stmt = $conn->prepare("INSERT INTO admin (photo,name,email,phone,password,date) VALUES(:photo,:user,:email,:phone,:password,:date)");
            $stmt->bindParam(":photo",$photo);
            $stmt->bindParam(":user",$user);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":phone",$phone);
            $stmt->bindParam(":password",$password);
            $stmt->bindParam(":date",$date);
            $stmt->execute();

            header("Location:". $url . "sigin_admin.php");

        } else {
            $_SESSION["sigin_up_admin_msg"] = "<p class='style='background-color:red;color:#fff;padding:3em;'><span class='btn-danger'>$info_icon</pan>Chave de acesso incorreta</p>";
        }
        
    }else {

        $_SESSION["sigin_up_admin_msg"] = "<p class='style='background-color:red;color:#fff;padding:3em;'><span class='btn-danger'>$info_icon</pan> Esta conta já existe</p>";
    }

}

?>