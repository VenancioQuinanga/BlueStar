<?php
include_once("components/router.php");
 $rf  = $ref["4"];
include_once("components/header.php");
include_once("database/dblogin.php");

?>

<div class="min_container">
    <div class="wrapper">
        <div class="msg">
            <div>Preencha o formulário</div>
        </div>
            <form action="<?= $uri ?>continue.php" method="Post" class="control">
                <div class="form-control">
                    <div class="input-box">
                        <input type="text" name="birth" placeholder="Data de nascimento" required>
                    </div>
                    <div class="input-box">
                        <select name="sex" required>
                            <option value="">Selecione o sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <select name="state" required>
                            <option value="">Estado</option>
                            <option value="Luanda">Luanda</option>
                            <option value="Bengo">Bengo</option>
                            <option value="Bengo">Benguela</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <input type="text" name="city" placeholder="Cidade" list="cities" required>
                        <datalist id="cities">
                            <option value='Luanda'>Luanda</option>
                            <option value='Uíge'>Uíge</option>
                            <option value='Benguela'>Benguela</option>
                        </datalist>
                    </div>
                    <div class="input-box">
                        <input type="text" name="ba" placeholder="Bairro" required>
                    </div>
                    <div class="input-box">
                        <input type="text" name="dwelling" placeholder="Av,Rua,Trav,casan°" required>
                    </div>
                    <div class="input-box">
                        <input type="submit" name="sigin_up_continue" value="Próximo" class="btn" id="sigin_up">
                    </div>
            </div>
        </form>
    </div>
</div>

<script src="./assets/js/login1.js" defer></script>