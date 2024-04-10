<?php
include_once("components/router.php");
 $rf  = ' - Editando meu perfil';
include_once("components/header.php");
include_once('database/dblogin.php');
include_once('database/dbedit_profile.php');

    if(isset($_GET['user_id'])){
    $id = $_GET['user_id'];
    $_SESSION['user_id'] = $_GET['user_id'];
    
    $stmt = $conn->prepare('SELECT * FROM client WHERE id = :id');
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $client = $stmt->fetchAll();

    $stmt = $conn->prepare('SELECT * FROM address WHERE id_references = :id');
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $address = $stmt->fetchAll();

    $stmt = $conn->prepare('SELECT * FROM account WHERE id_client = :id');
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $account = $stmt->fetchAll();

    foreach ($client as $c) {
    
    $clientName = $c['name'];
    $ClientPhoto = $c['photo'];
    $_SESSION['user_photo'] = $ClientPhoto;
    $clientEmail = $c['email'];
    $clientPhone = $c['phone'];
    $clientBirth = $c['birth'];
    $clientSex = $c['sex'];
    $clientPass = $c['password'];

    }
    
    foreach ($address as $a) { 
        $clientState = $a['state'];
        $clientCity = $a['city'];
        $clientBa = $a['ba'];
        $clientAddress = $a['dwelling'];
    }

    foreach ($account as $ac) {
        $accountCard = $ac['card'];
        $accountCVC = $ac['cvc'];
    }

}else {
    
    header("Location:". $uri . "login.php");
}


?>

<div class="box">
        <form method="POST" action="<?=$uri ?>edit_profile.php" enctype="multipart/form-data">
            <fieldset>
                <legend><p>Editando meu perfil</p></legend>
                <p>
                <div class="inputBox">
                    <label for="nome" class="labelInput">Nome</label>
                    <input type="text" name="name" class="inputUser" value="<?=$clientName ?>" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                <label for="email" class="labelInput">Email</label>
                <input type="email" name="email" class="inputUser" value="<?=$clientEmail ?>" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                <label for="telefone" class="labelInput">Telefone</label>
                <input type="tel" name="phone" class="inputUser" value="<?=$clientPhone ?>" required>
                </div>
                <p>
                <label for="masculino" class="labelInput">Senha</label>
                <input type="password" name="password" class="inputUser" value="<?=$clientPass ?>" required>
                </p>
                <p>
                <label for="femenino" class="labelInput">Data de nascimento</label>
                <input type="text" name="birth" class="inputUser" value="<?=$clientBirth ?>" required>
                </p>
                <p>
                <label for="cidade" class="labelInput">Sexo</label>
                <select name="sex" class="inputUser" required>
                <option value="<?=$clientSex ?>"><?=$clientSex ?></option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>                    
                </p>
                <p>
                <label for="cidade" class="labelInput">Estado</label>
                    <select name="state" class="inputUser" required>
                            <option value="<?=$clientState ?>"><?=$clientState ?></option>
                            <option value="Luanda">Luanda</option>
                            <option value="Bengo">Bengo</option>
                            <option value="Bengo">Benguela</option>
                        </select>
                    </p>
                    <p>
                        <div class="inputBox">
                        <label for="cidade" class="labelInput">Cidade</label>
                        <input type="text" name="city"list="cities" class="inputUser" value="<?=$clientCity ?>" required>
                        <datalist id="cities">
                            <option value='Luanda'>Luanda</option>
                            <option value='Uíge'>Uíge</option>
                            <option value='Benguela'>Benguela</option>
                        </datalist>
                        </div>
                    </p>
                    <p>
                        <div class="inputBox">
                        <label for="estado" class="labelInput">Bairro</label>
                        <input type="text" name="ba" class="inputUser" value="<?=$clientBa ?>" required>
                        </div>
                    </p>
                        <div class="inputBox">
                            <label for="endereco" class="labelInput">Endereço</label>
                            <input type="text" name="dwelling" id="endereco" class="inputUser" value="<?=$clientAddress ?>" required>
                        </div>
                    </p>
                    </p>
                        <div class="inputBox">
                            <label for="endereco" class="labelInput">Foto de perfil</label>
                            <input type="file" name='photo' accept="image/*" value="<?=$ClientPhoto ?>">
                        </div>
                    <p>
                    </p>
                        <div class="inputBox">
                            <label for="endereco" class="labelInput">Cartão de crédito</label>
                            <input type="text" name="card" value="<?=$accountCard ?>" id="card" class="inputUser">
                        </div>
                    </p>
                    </p>
                        <div class="inputBox">
                            <label for="endereco" class="labelInput">CVC</label>
                            <input type="text" name="cvc" value="<?=$accountCVC ?>" id="cvc" class="inputUser">
                        </div>
                    </p>
                    <p>
                    <div class="inputBox">
                    <input type="submit" name="edit_profile" value="Alterar" id="submit">
                    </div>
                    </p>
            </fieldset>
        </form>
    </div>
