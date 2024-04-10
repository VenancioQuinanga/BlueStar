<?php 
include_once("header.php");
?>
<header>
<nav id="navbar">
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

<script src="./assets/js/aside2.js"></script>