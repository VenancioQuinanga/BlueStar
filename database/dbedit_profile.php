<?php
include_once('db.php');
session_start();

if(isset($_POST['edit_profile'])){

    $id = $_SESSION['user_id'];
    $data = $_POST;
    $photo = empty($_FILES['photo']['name']) ? $_SESSION['user_photo'] : bin2hex(random_bytes(10)).$_FILES['photo']['name'];
    $user = $data["name"];
    $email = $data["email"];
    $phone = $data["phone"];
    $password = $data["password"];
    $birth = $data['birth'];
    $sex = $data['sex'];
    $state = $data['state'];
    $city = $data['city'];
    $ba = $data['ba'];
    $dwelling = $data['dwelling'];
    $card = $data['card'] != 0 ? $data['card'] : '';
    $CVC = $data['cvc'] !=  0 ? $data['cvc'] : '';
    
    $sql = "UPDATE client SET photo = '$photo',name = '$user',email = '$email',phone = '$phone',password = '$password',birth = '$birth',sex = '$sex' WHERE id = '$id'";
    $stmt = $conn->query($sql);
    
    $stmt = $conn->prepare('UPDATE address SET state = :state,city = :city,ba = :ba,dwelling = :dwelling WHERE id_references = :id');
    $stmt->bindParam(':state',$state);
    $stmt->bindParam(':city',$city);
    $stmt->bindParam(':ba',$ba);
    $stmt->bindParam(':dwelling',$dwelling);
    $stmt->bindParam(':id',$_SESSION['user_id']);
    $stmt->execute();

    $stmt = $conn->prepare('UPDATE account SET card = :card,cvc = :cvc WHERE id_client = :id');
    $stmt->bindParam(':card',$card);
    $stmt->bindParam(':cvc',$CVC);  
    $stmt->bindParam(':id',$_SESSION['user_id']);  
    $stmt->execute();

    if (isset($_FILES['photo']) && !empty($_FILES['photo'])) {

        if (move_uploaded_file($_FILES['photo']['tmp_name'],'./assets/img/users/'.$photo)) {

        }
    }

    header("Location:". $uri . "account.php");
  }

?>