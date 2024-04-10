<?php
include_once("database/db.php");
session_start();

$_SESSION['search_msg'] = '';

if (!empty($_GET['clients_searcher'])) {

    $searcher = $_GET['clients_searcher'];
    $stmt = $conn->query("SELECT * FROM client WHERE name LIKE '%$searcher%' or email LIKE '%$searcher%' or phone LIKE '%$searcher%' or birth LIKE '%$searcher%' or sex LIKE '%$searcher%'
    or date LIKE '%$searcher%'");
    $client = $stmt->fetchAll();

    if (empty($client)) {

        $_SESSION['search_msg'] = "<p class='empty'>Nenhum resultado encontrado para a pesquisa</p>";
    }

}else {
    
    $stmt = $conn->query('SELECT * FROM client');
    $client = $stmt->fetchAll();
}
?>