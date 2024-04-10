<?php
include_once "components/router.php";
 $rf  = $ref["2"];
include_once "components/header.php";
include_once "database/dbadmin.php";

if (!empty($_SESSION['admin'])) {
    header("Location:". $url . "account_admin.php");
}

?>

<div class="min_container">
<div class="wrapper">
<div><?=$_SESSION['sigin_msg'];$_SESSION['sigin_msg'] = ''?></div>
    <div class="msg">
        <div class="success_msg">Entrando como administrador</div>
    </div>
    <form action="<?= $uri ?>sigin_admin.php" method="Post" class="control">
        <div class="form-control">
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Senha" required>
            </div>
            <div class="input-box">
                <input type="submit" name="sigin" value="Entrar" class="btn" id="sigin">
            </div>
            <div class="input-box">
                <a href="<?= $uri ?>sigin_up_admin.php"><input type="button" name="sigin_up" value="Criar conta" class="btn" id="sigin_up"></a>
            </div>
            <ul class="login-options">
                <li id="my-sigin-option-f" class="my-sigin-option"><a href="#">Esqueceu sua senha?</a></li>
            </ul>
        </div>
    </form>
</div>
</div>
