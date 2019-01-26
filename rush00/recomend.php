<?php
require_once 'connection.php';
include 'header.php';
?>
    <h1 style="text-align: center">Recommend products</h1>
    <ul class="uli">
        <?php $products = get_product();
        $i = 0;?>
        <?php foreach ($products as $product): ?>
        <?php if ($i < 6) :?>
            <li class="ulili" style="height: 300px">
                <img style="width: 150px; height: 150px" src="img/<?=$product["image"]?>">
                <p><a><?=$product["name"]; $i++?></a></p>
                <p style="text-align: center">PRICE: <?=$product["value"]?>$</p>
                <p><h3><a style="text-decoration: none" href="add_to_basket.php?name=<?=$product['name']?>" onclick="alert('Successfully added to basket')">Buy</a></h3></li>
        <?php endif;?>
        <?php endforeach; ?>
    </ul>
<?php
include 'footer.php';
?>

