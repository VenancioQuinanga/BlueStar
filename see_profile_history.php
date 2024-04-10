<?php
include_once("components/router.php");
$rf  = ' - Meu historico de compras';
include_once("components/header.php");
include_once('database/db.php');

if(isset($_GET['buy_id'])){
    $id = $_GET['buy_id'];
    $_SESSION['buy_id'] = $_GET['buy_id'];

    $stmt = $conn->prepare('SELECT * FROM buy WHERE id = :id');
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $buy = $stmt->fetchAll();

    foreach ($buy as  $b) {
        $tot = $b['value'];
    }

    $stmt = $conn->prepare('SELECT * FROM buy_product WHERE id_buy = :id');
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $product = $stmt->fetchAll();

}
?>

<header>
<nav id="navbar" class="nav">
    <a><h1>BlueStar</h1></a>
    <img src="./assets/icons/menu-hamburguer.png" id="icon">
    <ul>
        <li>
            <a href="<?= $uri?>index.php" class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                </svg>
            </a>
        </li>
        <li>
            <a href="<?= $uri?>login.php" class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </a>
        </li>
        <li><a href="<?= $uri?>logout.php" class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
            </svg>
            </a>
        </li>
        <li class="litle_cart">
            <span>0</span>
            <a href="<?= $uri?>cart.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                </svg>
            </a>
        </li>
    </ul>
</nav>
</header>

<div class="container">

<div class="wrapper" id="wrapper">
        <h1 style='padding:.5em;'>Minha compra</h1>
</div>

<div class="table" style="width:100%;">
    <table>
        <tbody>
            <?php foreach($buy as $b):?>
            <tr>
                <td class='profile'><span style="font-weight:bold;">Compra :</span></td>
                <td></td>
                <td></td>
                <td> <?=$b['id']?></td>
            </tr>
            <tr>
                <td class='profile'><span style="font-weight:bold;">Status :</span></td>
                <td></td>
                <td></td>
                <td> <?=$b['status']?></td>
            </tr>
            <tr>
                <td class='profile'><span style="font-weight:bold;"> Data/Hora :</span></td>
                <td></td>
                <td></td>
                <td><?=$b['alter_date']?></td>
            </tr>

            <?php endforeach;?>
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
                <td>$<?= $tot ?></td>
            </tr>
            </tbory>
        </table>
    </div>
</div>

<script src="./assets/js/cart12.js" defer></script>
<script src="./assets/js/myCart16.js" defer></script>
<script src="./assets/js/load1.js" defer></script>
<script src="./assets/js/nav.js"></script>
