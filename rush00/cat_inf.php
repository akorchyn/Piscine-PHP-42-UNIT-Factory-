<?php
require_once 'connection.php';
include 'header.php';
?>
<h1 style="text-align: center">Recommend products</h1>
<ul class="uli">
    <?php if (!isset($_GET['dv'])) :
        header("Location: recomend.php"); ?>
    <?php endif; ?>
    <?php $products = get_category($_GET['dv']) ?>
    <?php foreach ($products as $product): ?>
            <li class="ulili">
                <img style="width: 150px; height: 150px" src="img/<?=$product["image"]?>">
                <p><a><?=$product["name"]; $i++?></a></p>
                <p>PRICE: <?=$product["value"]?>$</p>
                <p><h3><a style="text-decoration: none" href="add_to_basket.php?name=<?=$product['name']?>">Buy</a></h3></li>
    <?php endforeach; ?>
    </a>
</ul>
<?php
include 'footer.php';
?>

