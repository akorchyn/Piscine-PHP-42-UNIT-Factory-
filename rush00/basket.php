<?php
include 'header.php';
session_start();
$total = 0;
?>
<?php foreach($_SESSION['basket'] as $name => $array) :?>
    <?php $total += $array["value"] * $array["amount"] ?>
    <li class="ulili">
        <a><?=$name ?></a>
        <p>Amount: <?=$array['amount'];?></p>
        <p>Amount: <?=$array['value']?></p>
        <p>Total: <?=$array["value"] * $array["amount"]?></p>
        <p><h3><a style="text-decoration: none" href="delete_from_basket.php?name=<?=$name?>">Delete</a></h3></li>
    </li>
<?php endforeach; ?>
<li class="ulili"><p>Total : <?= $total?></p>
    <p><h3><a style="text-decoration: none;" href="create_order.php">ORDER</a></h3>
</li>
<?php
include 'footer.php';
?>