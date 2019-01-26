<?php
require_once 'connection.php';
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/header.css">
    <link rel="stylesheet" type="text/css" href="style/modal.css">
    <link rel="stylesheet" type="text/css" href="style/block.css">
    <title>RUSH00</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<img src="img/shopimage.png" style="width: 100%">
<ul id="navbar">
    <li><a href="recomend.php">Главная</a></li>
    <li><a>Категории</a>
        <ul>
            <?php $products = get_category2() ?>
            <?php foreach ($products as $product): ?>
                <li><a href="cat_inf.php?dv=<?=$product['category']?>"><?=$product['category']?></a></li>
            <?php endforeach; ?>
        </ul>
    </li>
    <li><a href="#modalWindow3">Контакты</a></li>
    <li><a href="basket.php">Корзина</a></li>
    <?php if($_SESSION['id'] == 1) : ?>
        <li><a>Admin panel</a>
            <ul>
                <li><a href="add_u.php" class="button">Add user</a></li>
                <li><a href="del_u.php" class="button">Delete user</a></li>
                <li><a href="add_g.php" class="button">Add goods</a></li>
                <li><a href="mod_g.php" class="button">Modify good</a></li>
                <li><a href="del_g.php" class="button">Delete good</a></li>
                <li><a href="del_c.php" class="button">Delete category</a></li>
                <li><a href="orders.php" class="button">Orders</a></li>
            </ul>
            </li>
        <li><a> <?php echo "Hello " . $_SESSION['logged_user']; ?></a></li>
        <li><a href="logout.php" class="button">Выход</a></li>
    <?php elseif ($_SESSION['id'] == 2) : ?>
        <li><a> <?php echo "Hello " . $_SESSION['logged_user']; ?></a></li>
        <li><a href="logout.php" class="button">Выход</a></li>
    <?php else : ?>
    <li><a href="#modalWindow1" class="button">Вход</a></li>
    <li><a href="#modalWindow2" class="button">Регистрация</a></li>
    <?php endif; ?>
</ul>
<div id="modalWindow1">
    <div class="window1">
        <h1>Вход в учетную запись</h1>
        <form action="login.php" method="post">
            <p><span>Login <span/><br/>
                <input type="login" name="login"></p>
            <p><span>Пароль</span> <br/>
                <input type="password" name="passwd">
            </p><br/>
            <input type ="submit" value="Вход">
            <div class="g-recaptcha" data-sitekey="6Lf_KYsUAAAAAEDdgFjECWifuFojGECecLbv-k3S" data-callback="but_if_ok"></div>
            <div class="text-danger" id="recaptchaError"></div>
        </form>
        <a href="#close" class="closed">Close</a>
    </div>
</div>
<div id="modalWindow2">
    <div class="window2">
        <h1>Регистрация</h1>
        <form action="register.php" method="post">
            <p><span>Login <span/><br/>
                 <input type="login" name="login"></p>
            <p><span>Пароль</span><br/>
                <input type="password" name="passwd1"></p>
            <p><span>Ещё раз</span><br/>
                <input type="password" name="passwd2"></p><br/>
            <input type ="submit" value="Отправить">
            <div class="g-recaptcha" data-sitekey="6Lf_KYsUAAAAAEDdgFjECWifuFojGECecLbv-k3S" data-callback="but_if_ok"></div>
            <div class="text-danger" id="recaptchaError"></div>
        </form>
        <a href="#close" class="closed">Close</a>
    </div>
</div>
<div id="modalWindow3">
    <div class="window3">
    <p><strong>Контакты</strong></p>
    <p>vkaznodi@student.unit.ua</p>
    <p>akorchyn@student.unit.ua</p>
    <p><strong>Местоположение</strong></p>
    <p>Мы находимся в UNIT Factory, Украина, Киев, ул. Дорогожицкая, 3</p>
    <div id="map" style="margin: auto">
        <script>
            function initMap() {
                var uluru = {lat: 50.468972, lng: 30.462321};
                var map = new google.maps.Map(
                    document.getElementById('map'), {zoom: 10, center: uluru});
                var marker = new google.maps.Marker({position: uluru, map: map});
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3Z3g3Xvfs0Dbq7kqnj33ipmGENyt28Ec&callback=initMap">
        </script></div>
        <a href="#close" class="closed">Close</a>
    </div>
</div>
