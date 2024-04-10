<?php
include_once("db.php");
session_start();
$_SESSION['search_msg'] = '';

$info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';

if (!empty($_GET['searcher'])) {
    $searcher = $_GET['searcher'];
    $stmt = $conn->query("SELECT * FROM product WHERE mark LIKE '%$searcher%' or model LIKE '%$searcher%' or category LIKE '%$searcher%' or price LIKE '%$searcher%' or length LIKE '%$searcher%' or type LIKE '%$searcher%'");
    $product = $stmt->fetchAll();
    
    if (empty($product)) {

        $_SESSION['search_msg'] = "<p class='empty'><span>$info_icon</span> Nenhum resultado encontrado para a pesquisa</p>";
    }

}elseif (!empty($_POST['product_sigin'])) {

        $data = $_POST; 
        $photo = bin2hex(random_bytes(10)).$_FILES['product_image']['name'];
        $mark = $data['product_mark'];
        $model = $data['product_model'];
        $price = $data['product_price'];
        $length = $data['product_length'];
        $category = $data['product_category'];
        $type = $data['product_type'];
        $stock = $data['product_stock'];
        $buies = 0;
        $date = date('d/m/Y');

    if (isset($_FILES['product_image']) && !empty($_FILES['product_image'])) {

        if (move_uploaded_file($_FILES['product_image']['tmp_name'],'./assets/img/products/'.$photo)) {

            $stmt = $conn->prepare("INSERT INTO product (photo,mark,model,price,length,category,type,stock,buies,date) VALUES (:photo,:mark,:model,:price,:length,:category,:type,:stock,:buies,:date)");
            $stmt->bindParam(":photo",$photo);
            $stmt->bindParam(":mark",$mark);
            $stmt->bindParam(":model",$model);
            $stmt->bindParam(":price",$price);
            $stmt->bindParam(":length",$length);
            $stmt->bindParam(":category",$category);
            $stmt->bindParam(":type",$type);
            $stmt->bindParam(":stock", $stock);
            $stmt->bindParam(":buies", $buies);
            $stmt->bindParam(":date",$date);
            $stmt->execute();

            header("Location:". $uri . "dashboard.php");

        }

    }

}else if (!empty($_GET['products_searcher'])) {
    $searcher = $_GET['products_searcher'];
    $stmt = $conn->query("SELECT * FROM product WHERE mark LIKE '%$searcher%' or model LIKE '%$searcher%' or category LIKE '%$searcher%' or price LIKE '%$searcher%' or length LIKE '%$searcher%' or type LIKE '%$searcher%'  or date LIKE '%$searcher%'");
    $product = $stmt->fetchAll();
    
    if (empty($product)) {

        $_SESSION['search_msg'] = "<p class='empty'>Nenhum resultado encontrado para a pesquisa</p>";
    }

}else {
    $stmt = $conn->query('SELECT * FROM product');
    $product = $stmt->fetchAll();
}

?>