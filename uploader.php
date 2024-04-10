<?php
$rf  = ' - cadastro de produtos';
include_once('components/header.php');
include_once('database/dbupload.php');
include_once("database/dbadmin.php");

if (empty($_SESSION['admin'])) {
    header("Location:". $url . "sigin_admin.php");
}

?>
<body>

<div class="box">
    <fieldset>
    <form action="<?=$uri ?>/uploader.php" method="POST" class="control" enctype="multipart/form-data">
                <div class="inputBox">
                    <label for="product_mark" class="labelInput">Marca</label>
                    <input type="text" name='product_mark' placeholder="Marca" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="product_model" class="labelInput">Modelo</label>                    
                    <input type="text" name='product_model' placeholder="Modelo" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="product_category" class="labelInput">Categória</label>
                    <input type="text" name='product_category' placeholder="Categória" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="product_type" class="labelInput">Tipo</label>
                    <input type="text" name='product_type' placeholder="Tipo" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="product_length" class="labelInput">Tamanho</label>
                    <input type="number" name='product_length' placeholder="Tamanho" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="product_image" class="labelInput">Preço</label>
                    <input type="number" name='product_price' placeholder="Preço" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="product_image" class="labelInput">Stock</label>   
                    <input type="number" name='product_stock' placeholder="Stock" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="product_image" class="labelInput">Foto do produto</label>
                    <input type="file" name='product_image' accept="image/*" placeholder="Imagen" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <input type="submit" name='product_sigin' id="submit" value="Cadastrar">
                </div>
            </div>
        
    </form>
    </fieldset>
</div>

