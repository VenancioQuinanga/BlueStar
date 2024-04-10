<?php
include_once("components/router.php");
 $rf  = $ref["3"];
include_once("components/header.php");
include_once("database/dbadmin.php");

?>

<div class="min_container">
<div class="wrapper">
<div><?=$_SESSION["sigin_up_admin_msg"];$_SESSION["sigin_up_admin_msg"] = ''?></div>
    <div class="msg">
        <div class="success_msg">Cadastrando administrador</div>
    </div>
    <form action="<?= $uri ?>sigin_up_admin.php" class="control" method="Post">
        <div class="form-control">
        <div class="input-box">
                <input type="text" name="name" placeholder="Nome" required>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-box">
                <input type="tel" name="phone" placeholder="Telefone" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Senha" required>
            </div>
            <div class="input-box">
                <input type="text" name="accessKey" placeholder="Chave de acesso" required>
            </div>
            <div class="input-box">
                <input type="submit" name="sigin_up" value="Próximo" class="btn" id="sigin_up">
            </div>
            <div class="input-box">
                <a href="<?= $uri ?>sigin_admin.php"><input type="button" name="sigin" value="Entrar" class="btn" id="sigin"></a>
            </div>
            <ul class="login-options">
                <li id="my-sigin-option-f" class="my-sigin-option"><a href="#">Esqueceu sua senha?</a></li>
            </ul>
        </div>
    </form>
</div>
</div>
