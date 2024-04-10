<?php
include_once("components/router.php");
 $rf  = ' - Cadastro do E-Commerce';
include_once("components/header.php");
include_once('database/dbshop.php');

?>

<div class="box">
        <form method="POST" action="<?=$uri ?>shop.php">
            <fieldset>
                <legend><p>Cadastrando meu E-Commerce</p></legend>
                <p>
                <div class="inputBox">
                    <label for="name" class="labelInput">Nome</label>
                    <input type="text" name="name" class="inputUser"required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="propietary" class="labelInput">Propietário</label>
                    <input type="text" name="propietary" class="inputUser" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="email" class="labelInput">Email</label>
                    <input type="text" name="email" class="inputUser" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="phone" class="labelInput">Telefone</label>
                    <input type="tel" name="phone" class="inputUser" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="nif" class="labelInput">NIF</label>
                    <input type="text" name="nif" class="inputUser" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="state" class="labelInput">Estado</label>
                    <input type="text" name="state" class="inputUser" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="city" class="labelInput">Cidade</label>
                    <input type="text" name="city" class="inputUser" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="ba" class="labelInput">Bairro</label>
                    <input type="text" name="ba" class="inputUser"required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                    <label for="dwelling" class="labelInput">Endereço</label>
                    <input type="tel" name="dwelling" class="inputUser" required>
                </div>
                </p>
                <div class="inputBox">
                    <label for="ba" class="labelInput">Chave de acesso</label>
                    <input type="text" name="accessKey" class="inputUser"required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                <input type="submit" name="shop" value="Alterar" id="submit">
                </div>
                </p>
            </fieldset>
        </form>
    </div>
