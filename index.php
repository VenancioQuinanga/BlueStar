<?php
include_once("database/dbupload.php");
include_once("components/router.php");
 $rf  = $ref["1"];
include_once("components/navbar.php");

?>

<div class="start">
    <div class="context">
        <aside class="price">$155</aside>
        <aside class="text">
            <p>Air Jordan </p>
            <p>New</p>
            <p>Season</p>
            <form action="">
                <input type="hidden" name="product_id" id="product_id" value="12">
                <input type="hidden" name="product_src" id="product_src" value="Air-Jordan-4-Neon-Air-Max-95-Release-Date-900x597.jpg">
                <input type="hidden" name="product_category" class="prod_category" value="Ténis">
                <input type="hidden" name="product_model" class="prod_model" value="Air Jordan">
                <input type="hidden" name="product_mark" class="prod_mark" value="Jordan">
                <input type="hidden" name="product_type" class="prod_type" value="Moda">
                <input type="hidden" id="product_name" value="Ténis Air Jordan ">
                <input type="hidden" id="product_price" value="170">
                <input type="button" class="add" value="Adicionar">
            </form>
        </aside>
    </div>
</div>

<div class="container">

    <div>
        <div class="wrapper" id="wrapper">
                <h1 style='padding:.5em;'>Nossos Produtos</h1>
        </div>
    </div>

    <div class="search"><?=$_SESSION['search_msg'];$_SESSION['search_msg'] = '';?></div>

    <?php foreach ($product as $prod): ?>
            <div class="product">
            <div class="img">
                <img src="./assets/img/products/<?=$prod['photo'] ?>" width="230" height="150">
            </div>
            <div class="desc">
                <p class="name"><?=$prod['category'] ?> <?=$prod['model']?></p>
                <p class="price">$<?=$prod['price'] ?></p>
                <form action="">
                    <input type="hidden" name="product_id" id="product_id" value="<?=$prod['id'] ?>">
                    <input type="hidden" name="product_src" id="product_src" value="<?=$prod['photo'] ?>">
                    <input type="hidden" name="product_category" class="prod_category" value="<?=$prod['category'] ?>">
                    <input type="hidden" name="product_model" class="prod_model" value="<?=$prod['model'] ?>">
                    <input type="hidden" name="product_mark" class="prod_mark" value="<?=$prod['mark'] ?>">
                    <input type="hidden" name="product_type" class="prod_type" value="<?=$prod['type'] ?>">
                    <input type="hidden" name="product_name" id="product_name" value="<?=$prod['category'] ?> <?=$prod['model'] ?>">
                    <input type="hidden" name="product_price" id="product_price" value="<?=$prod['price'] ?>">
                    <button type="submit" class="add">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    
    <?php endforeach; ?>
    
</div>

<script src="./assets/js/cart12.js" defer></script>
<script src="./assets/js/myCart16.js" defer></script>
<script src="./assets/js/load1.js" defer></script>
<script src="./assets/js/search1.js" defer></script>

<?php
include_once("components/footer.php");
?>