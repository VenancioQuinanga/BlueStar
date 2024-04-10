<?php
include_once("components/router.php");
 $rf  = $ref["2"];
include_once("components/header.php");
include_once("database/dblogin.php");

if (!empty($_SESSION['user_id'])) {
    header("Location:". $url . "account.php");
}

?>

<div class="min_container">
    <div class="wrapper">
        <div><?=$_SESSION['login_msg'];$_SESSION['login_msg'] = ''?></div>
    </div>
<div class="wrapper">
    <div class="msg">
        <div class="success_msg">Fazendo login</div>
    </div>
    <form action="<?= $uri ?>login.php" method="Post" class="control">
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
                <a href="<?= $uri ?>register.php"><input type="button" name="sigin_up" value="Criar conta" class="btn" id="sigin_up"></a>
            </div>
            <ul class="login-options">
                <li id="my-sigin-option-f" class="my-sigin-option"><a href="#">Esqueceu sua senha?</a></li>
            </ul>
        </div>
    </form>
</div>
</div>

<script src="./assets/js/login1.js" defer></script>