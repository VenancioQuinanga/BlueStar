<?php
include_once("components/router.php");
$rf  = ' - informações da compra';
include_once("components/header.php");
include_once('database/db.php');

if(isset($_GET['buy_id']) && !empty($_GET['client_id'])){
    $id = $_GET['buy_id'];
    $id_client = $_GET['client_id'];
    $_SESSION['buy_id'] = $_GET['buy_id'];

    $stmt = $conn->query("SELECT * FROM buy WHERE id = '$id' ");
    $buy = $stmt->fetch();

    $stmt = $conn->query("SELECT name FROM client WHERE id = '$id_client' ");
    $client = $stmt->fetch();

    $stmt = $conn->query("SELECT * FROM buy_product WHERE id_buy = '$id' ");
    $product = $stmt->fetchAll();

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
        <h1 style='padding:.5em;'>informações da compra</h1>
</div>

<div class="table" style="width:100%;">
    <table>
        <tbody>
            <tr>
                <td class='profile'><span style="font-weight:bold;">Compra :</span></td>
                <td></td>
                <td></td>
                <td> <?=$buy['id']?></td>
            </tr>
            <tr>
                <td class='profile'><span style="font-weight:bold;">Status :</span></td>
                <td></td>
                <td></td>
                <td> <?=$buy['status']?></td>
            </tr>
            <tr>
                <td class='profile'><span style="font-weight:bold;">Cliente :</span></td>
                <td></td>
                <td></td>
                <td> <?=$client['name']?></td>
            </tr>
            <tr>
                <td class='profile'><span style="font-weight:bold;"> Data/Hora :</span></td>
                <td></td>
                <td></td>
                <td><?=$buy['alter_date']?></td>
            </tr>
            </tbory>
        </table>
    </div>

<div class="table" style="width:100%;">
    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Valor</th>
            </tr>
        </thead>
            <?php foreach($product as $p):?>
            <tr>
                <td><img src="./assets/img/products/<?=$p['photo']?>" width="75" height="75"></td>
                <td><?=$p['category']?> <?=$p['model']?></td>
                <td><?=$p['amount']?></td>
                <td>$<?=$p['price']?></td>
                <td>$<?=$p['cost']?></td>
            </tr>
            <?php endforeach;?>
            <tr>
                <td><span style="font-weight:bold;">TOTAL :</span></td>
                <td></td>
                <td></td>
                <td></td>
                <td>$<?= $buy['value'] ?></td>
            </tr>
            </tbory>
        </table>
    </div>
</div>

<script src="./assets/js/cart11.js" defer></script>
<script src="./assets/js/myCart11.js" defer></script>
<script src="./assets/js/load1.js" defer></script>
<script src="./assets/js/asider.js"></script>
