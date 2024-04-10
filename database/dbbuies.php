<?php
include_once("dblogin.php");
$_SESSION['buy_msg'] = '';
$_SESSION['clean_cart'] = '';

$success_icon = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/> </svg> ";
$info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';

    $stmt = $conn->query('SELECT * FROM buy');
    $buy = $stmt->fetchAll();

if (isset($_POST['buy'])) {
    $buy = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $date = date('d/m/Y');

    if (!empty($_SESSION['user'])) {
        $user_id = $_SESSION['user_id'];
        $buy_value = 0;
        $status = 'Em espera';

        $sql = "SELECT * FROM client WHERE id = '$user_id'";
        $stmt = $conn->query($sql);
        $user = $stmt->fetchAll();

        foreach ($user as $u) {            
            $photo = $u['photo'];
        }

        $sql = "SELECT * FROM account WHERE id_client = '$user_id'";
        $stmt = $conn->query($sql);
        $account = $stmt->fetchAll();

        foreach ($account as $ac) {
            $card = $ac['card'];
            $CVC = $ac['cvc'];
        }
            
        if ($card != '' && $CVC != '') {
            
            foreach ($buy['product_id'] as $key => $value) {

                $product_id = $buy['product_id'][$key];
                $sql = "SELECT * FROM product WHERE id = '$product_id'";
                $stmt = $conn->query($sql);
                $product = $stmt->fetch();
                if ($product['stock'] < $buy['product_number'][$key] ) {
                    $pd = $buy['product_number'][$key];
                    $pm = $product['model'];
                    $_SESSION['buy_msg'] = "<p style='background-color:red;color:#fff;padding:3em;'><span>$info_icon</pan> A quantidade de $pm é superior ao stock</p>";
                }elseif ($buy['product_number'][$key] <= 0) {

                    $pd = $buy['product_number'][$key];
                    $pm = $product['model'];
                    $_SESSION['buy_msg'] = "<p style='background-color:red;color:#fff;padding:3em;'><span>$info_icon</pan> A quantidade de $pm é inválida</p>";
                }
            }

            if (empty($_SESSION['buy_msg'])) {
                $stmt = $conn->prepare("INSERT INTO buy (id_client,client_photo,date,status) VALUES(:id_client,:client_photo,:date,:status)");
                $stmt->bindParam(":id_client",$_SESSION['user_id']);
                $stmt->bindParam(":client_photo",$photo);
                $stmt->bindParam(":date",$date);
                $stmt->bindParam(":status",$status);
                $stmt->execute();
                $id = $conn->lastInsertId();

                $_SESSION['clean_cart'] = '<input type="hidden" class="buy_success" value="buy_success">';
                $_SESSION['buy_msg'] = "<p style='background-color:green;padding:3em;color:#fff;'><span>$success_icon</pan> Compra efetuada com sucesso </p>";

                foreach ($buy['product_id'] as $key => $value) {

                    $prod_id = $buy['product_id'][$key];
                    $sql = "SELECT * FROM product WHERE id = '$prod_id'";
                    $stmt = $conn->query($sql);
                    $prod = $stmt->fetchAll();

                    foreach ($prod as $prod) {
                    $prod_photo = $prod['photo'];
                    $prod_category = $prod['category'];
                    $prod_type = $prod['type'];
                    $prod_model = $prod['model'];
                    $prod_mark = $prod['mark'];
                    $prod_stock = $prod['stock'];
                    $prod_buies = $prod['buies'];
                    }

                    $stmt = $conn->prepare("INSERT INTO buy_product (id_buy,photo,category,type,model,mark,price,amount,cost) VALUES(:id_buy,:photo,:category,:type,:model,:mark,:price,:amount,:cost)");
                    $stmt->bindParam(":id_buy",$id);
                    $stmt->bindParam(":photo",$prod_photo);
                    $stmt->bindParam(":category",$prod_category);
                    $stmt->bindParam(":type",$prod_type);
                    $stmt->bindParam(":model",$prod_model);
                    $stmt->bindParam(":mark",$prod_mark);
                    $stmt->bindParam(":price",$buy['product_price'][$key]);
                    $stmt->bindParam(":amount",$buy['product_number'][$key]);
                    $stmt->bindParam(":cost",$buy['product_cost'][$key]);
                    $stmt->execute();

                    $prod_buies += $buy['product_number'][$key];
                    $prod_stock -= $buy['product_number'][$key];
                    $buy_value += $buy['product_cost'][$key];

                    $stmt = $conn->query("UPDATE product SET stock = '$prod_stock',buies = '$prod_buies' WHERE id = '$prod_id' ");

                }

                $stmt = $conn->query("UPDATE buy SET value = '$buy_value' WHERE id = '$id' ");

            }
        
        } else {

            $_SESSION['buy_msg'] = "<p style='background-color:red;color:#fff;padding:3em;'><span>$info_icon</pan> Priencha as suas informações bancárias</p>";
        }

    }else {

        $_SESSION['buy_msg'] = "<p style='background-color:red;color:#fff;padding:3em;'><span>$info_icon</pan> Faça login para poder efetuar a compra </p>";
    }
    
}

?>