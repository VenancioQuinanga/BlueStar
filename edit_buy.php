<?php
include_once("components/router.php");
 $rf  = ' - Editando compra';
include_once("components/header.php");
include_once('database/dbedit_buy.php');
include_once("database/dbadmin.php");

if (empty($_SESSION['admin'])) {
    header("Location:". $url . "sigin_admin.php");
}

?>

<div class="container">
    <div class="box">
        <form method="POST" action="<?=$uri ?>edit_buy.php">
            <fieldset>
                <legend><p>Editando compra</p></legend>
                <p>
                <div class="inputBox" style="margin-top:2em;">
                    <label for="status" class="labelInput">Status</label>
                    <select name="status">
                        <option value="<?=$buy['status']?>"><?=$buy['status']?></option>
                        <option value="Em espera">Em espera</option>
                        <option value="Sucesso">Sucesso</option>
                    </select>
                </div>
                </p>
                    <p>
                    <div class="inputBox">
                    <input type="submit" name="edit_buy" value="Alterar" id="submit">
                    </div>
                    </p>
            </fieldset>
        </form>
    </div>

</div>