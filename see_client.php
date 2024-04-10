<?php
include_once("components/router.php");
$rf  = ' - Meu cliente';
include_once('components/header.php');
include_once('database/dbedit_client.php');
include_once("database/dbadmin.php");

if (empty($_SESSION['admin'])) {
    header("Location:". $url . "sigin_admin.php");
}

?>


<header>
<nav id="navbar" class="nav">
    <a><h1>BlueStar</h1></a>
    <img src="<?=$uri ?>assets/icons/menu-hamburguer.png" id="icon">
    <ul>
        <li><a href="<?= $uri?>dashboard.php">Produtos</a></li>
        <li><a href="<?= $uri?>clients.php">Clientes</a></li>
        <li><a href="<?= $uri?>history.php">Historico</a></li>
        <li><a href="<?= $uri?>finance.php">Loja</a></li>
        <li>
            <a href="<?= $uri?>sigin_admin.php" class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </a>
        </li>
        <li><a href="<?= $uri?>logout_admin.php" class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
            </svg>
            </a>
        </li>
    </ul>
</nav>
</header>

<div class="container">

    <div class="wrapper" id="wrapper">
            <h1 style='padding:.5em;'>Meu Cliente</h1>
    </div>

    <div id="user_photo">
        <img src="./assets/img/users/<?=$client['photo']?>" width="300" height="300em" style="border-radius:100%;">
    </div>

    <div class="table">
            <table style="width: 100%;">
                <tbory>
                    <tr>
                    <td class='profile'><span style="font-weight:bold;">Nome :</span> <?=$client['name']?></td>
                    </tr>
                    <tr>
                    <td class='profile'><span style="font-weight:bold;">Email :</span> <?=$client['email']?></td>
                    </tr>
                    <tr>
                    <td class='profile'><span style="font-weight:bold;">Telefone :</span> <?=$client['phone']?></td>
                    </tr>
                    <tr>
                    <td class='profile'><span style="font-weight:bold;">Data de nascimento :</span> <?=$client['birth']?></td>
                    </tr>
                    <tr>
                    <td class='profile'><span style="font-weight:bold;">Sexo :</span> <?=$client['sex']?></td>
                    </tr>
                    <tr>
                    <td class='profile'><span style="font-weight:bold;">Estado :</span> <?=$client['state']?></td>
                    <tr>
                    <td class='profile'><span style="font-weight:bold;">Cidade :</span> <?=$client['city']?></td>
                    </tr>
                    <tr>
                    <td class='profile'><span style="font-weight:bold;">Bairro :</span> <?=$client['ba']?></td>
                    </tr>
                    <tr>
                    <td class='profile'><span style="font-weight:bold;">Endereço :</span> <?=$client['dwelling']?></td>
                    </tr>
                    <tr>
                    <tr>
                    <td class='profile'><span style="font-weight:bold;">Data de criação da conta :</span> <?=$client['date']?></td>
                    </tr>

                </tbory>
                </table>
                    </div>
                
                    <div class="wrapper" id="wrapper">
                        <h1 style='padding:.5em;'>informações bancárias</h1>
                    </div>

        <div class="table">
            <table style="width: 100%;">
                <tbory>
                    <tr>
                    <td class='profile'><span style="font-weight:bold;">Cartão de crédito :</span> <?=$client['card']?></td>
                    </tr>
                    <tr>
                    <td class='profile'><span style="font-weight:bold;">CVC :</span> <?=$client['cvc']?></td>
                    </tr>
                    <tr>
                    <td class='profile'><span style="font-weight:bold;">Última alteração :</span> <?=$client['alter_date']?></td>
                    </tr>
                </tbory>
            </table>
        </div>

        <div class="wrapper" id="wrapper">
            <h1 style='padding:.5em;'>Historico de compras</h1>
        </div>

        <div class="table" style="width:100%;">
    <table>

        <thead>
            <tr>
                <th>Compra</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Data/Hora</th>
                <th>Ações</th>
                <th></th>
            </tr>
        </thead>
        <tbory>
            <?php foreach($buy as $b):?>
            <tr>
                <td><?=$b['id']?></td>
                <td>$<?=$b['value']?></td>
                <td><?=$b['status']?></td>
                <td><?=$b['alter_date']?></td>
                <td>   
                <a href="see_profile_history.php?buy_id=<?=$b['id'] ?>" class="btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                    </svg>
                </a>
            </td>
            <td>
                <a href="edit_buy.php?buy_id=<?=$b['id'] ?>" class="btn-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </a>
            </td>
            </tr>
            <?php endforeach;?>
        </tbory>
    </table>
    </div>
<div>

<script src="./assets/js/asider.js"></script>