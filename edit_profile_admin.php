<?php
include_once("components/router.php");
 $rf  = ' - Editando meu perfil';
include_once("components/header.php");
include_once('database/dbadmin.php');
include_once('database/dbedit_profile_admin.php');

    if(!empty($_SESSION['admin_id'])){

    $id = $_SESSION['admin_id'];
    $stmt = $conn->prepare('SELECT * FROM admin WHERE id = :id');
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $admin = $stmt->fetch();
    
}else {
    
    header("Location:". $uri . "sigin_admin.php");
}

?>

<div class="box">
        <form method="POST" action="<?=$uri ?>edit_profile_admin.php" enctype="multipart/form-data">
            <fieldset>
                <legend><p>Editando meu perfil</p></legend>
                <p>
                <div class="inputBox">
                    <label for="nome" class="labelInput">Nome</label>
                    <input type="text" name="name" class="inputUser" value="<?=$admin['name'] ?>" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                <label for="email" class="labelInput">Email</label>
                <input type="email" name="email" class="inputUser" value="<?=$admin['email'] ?>" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                <label for="telefone" class="labelInput">Telefone</label>
                <input type="tel" name="phone" class="inputUser" value="<?=$admin['phone']?>" required>
                </div>
                <p>
                <label for="masculino" class="labelInput">Senha</label>
                <input type="password" name="password" class="inputUser" <?=$admin['password'] ?> required>
                </p>
                </p>
                    <div class="inputBox">
                        <label for="endereco" class="labelInput">Foto de perfil</label>
                        <input type="file" name='photo' accept="image/*">
                    </div>
                <p>
                <p>
                <div class="inputBox">
                <input type="submit" name="edit_profile_admin" value="Alterar" id="submit">
                </div>
                </p>
            </fieldset>
        </form>
    </div>
