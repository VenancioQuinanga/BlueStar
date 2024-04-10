<?php
include_once("components/router.php");
 $rf  = ' - Editando meu E-Commerce';
include_once("components/header.php");
include_once('database/dbedit_shop.php');
include_once("database/dbadmin.php");

if (empty($_SESSION['admin'])) {
    header("Location:". $url . "sigin_admin.php");
}

?>

<div class="box">
        <form method="POST" action="<?=$uri ?>edit_shop.php">
            <fieldset>
                <legend><p>Editando meu E-Commerce</p></legend>
                <p>
                <div class="inputBox">
                    <label for="name" class="labelInput">Nome</label>
                    <input type="text" name="name" class="inputUser" value="<?=$shop['name']?>" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="propietary" class="labelInput">Propietário</label>
                    <input type="text" name="propietary" class="inputUser" value="<?=$shop['propietary']?>" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="email" class="labelInput">Email</label>
                    <input type="text" name="email" class="inputUser" value="<?=$shop['email']?>" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="phone" class="labelInput">Telefone</label>
                    <input type="tel" name="phone" class="inputUser" value="<?=$shop['phone']?>" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="nif" class="labelInput">NIF</label>
                    <input type="text" name="nif" class="inputUser" value="<?=$shop['nif']?>" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="state" class="labelInput">Estado</label>
                    <input type="text" name="state" class="inputUser" value="<?=$shop['state']?>" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="city" class="labelInput">Cidade</label>
                    <input type="text" name="city" class="inputUser" value="<?=$shop['city']?>" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="ba" class="labelInput">Bairro</label>
                    <input type="text" name="ba" class="inputUser" value="<?=$shop['ba']?>" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="dwelling" class="labelInput">Endereço</label>
                    <input type="text" name="dwelling" class="inputUser" value="<?=$shop['dwelling']?>" required>
                </div>
                </p>
                </p>
                <div class="inputBox">
                    <label for="ba" class="labelInput">Chave de acesso</label>
                    <input type="text" name="accessKey" class="inputUser" value="<?=$shop['accessKey']?>" required>
                </div>
                </p>
                <p>
                    <input type="hidden" name="id" value="1">
                </p>
                <p>
                <div class="inputBox">
                <input type="submit" name="edit_shop" value="Alterar" id="submit">
                </div>
                </p>
            </fieldset>
        </form>
    </div>
