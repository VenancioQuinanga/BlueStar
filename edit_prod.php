<?php
include_once("components/router.php");
 $rf  = ' - Editando produto';
include_once("components/header.php");
include_once('database/dbedit_prod.php');
include_once("database/dbadmin.php");

    if (empty($_SESSION['admin'])) {
        header("Location:". $url . "sigin_admin.php");
    }

    if(isset($_GET['product_id'])){
    $id = $_GET['product_id'];
    $_SESSION['product_id'] = $_GET['product_id'];
    
    $stmt = $conn->prepare('SELECT * FROM product WHERE id = :id');
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $prod = $stmt->fetchAll();

    foreach ($prod as $p) {
    
    $p_photo = $p['photo'];
    $p_model = $p['model'];
    $_SESSION['product_photo'] = $p_photo;
    $p_mark = $p['mark'];
    $p_category = $p['category'];
    $p_type = $p['type'];
    $p_buies = $p['buies'];
    $p_stock = $p['stock'];
    $p_price = $p['price'];
    $p_length = $p['length'];
    $_SESSION['product_buies'] = $p['buies'];
    $_SESSION['product_stock'] = $p['stock'];

    }
    
}else if(empty($_GET['product_id'])){
    
    header("Location:". $url . "dashboard.php");
}

?>

<div class="box">
        <form method="POST" action="<?=$uri ?>edit_prod.php" enctype="multipart/form-data">
            <fieldset>
                <legend><p>Editando produto</p></legend>
                <p>
                <div class="inputBox">
                    <label for="mark" class="labelInput">Marca</label>
                    <input type="text" name="mark" class="inputUser" value="<?=$p_mark ?>" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                <label for="model" class="labelInput">Modelo</label>
                <input type="text" name="model" class="inputUser" value="<?=$p_model ?>" required>
                </div>
                </p>
                <p>
                <div class="inputBox">
                <label for="category" class="labelInput">Categoria</label>
                <input type="text" name="category" class="inputUser" value="<?=$p_category ?>" required>
                </div>
                <p>
                <label for="type" class="labelInput">Tipo</label>
                <input type="text" name="type" class="inputUser" value="<?=$p_type?>" required>
                </p>
                <p>
                <label for="price" class="labelInput">Preço</label>
                <input type="text" name="price" class="inputUser" value="<?=$p_price ?>" required>
                </p>
                <p>
                <label for="length" class="labelInput">Tamanho</label>
                <input type="number" name="length" class="inputUser" value="<?=$p_length ?>" required>
                </p>
                <p>
                <label for="stock" class="labelInput">Stock</label>
                    <input type="number" name="stock" class="inputUser" value="<?=$p_stock ?>" required>
                    </p>
                    </p>
                        <div class="inputBox">
                            <label for="photo" class="labelInput">Foto do produto</label>
                            <input type="file" name='photo' accept="image/*" value="<?=$p_photo ?>">
                        </div>
                    <p>
                    <p>
                    <div class="inputBox">
                    <input type="submit" name="edit_product" value="Alterar" id="submit">
                    </div>
                    </p>
            </fieldset>
        </form>
    </div>
