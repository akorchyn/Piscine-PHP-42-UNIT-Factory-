<?php
include 'header.php';
session_start();
?>
<?php
function unparse($string, $conection) {
    $cost_all = 0;
    $array = explode(';', $string);
    for ($i = 0; $array[$i]; $i++) {
        $p = explode('/', $array[$i]);
        $name = $p[0];
        $amount = $p[1];
        $get = mysqli_query($conection, "SELECT value FROM goods WHERE name='$name'");
        $value = mysqli_fetch_array($get);
        echo $name . " ". $amount . " x " . $value[0] . "$ for " . $value[0] * $amount . "$</br>";
        $cost_all += $value[0] * $amount;
    }
    echo "All cost: <b>" . $cost_all . "$</b>";
    echo "</p>";
}

$conection = mysqli_connect("localhost", "root", "qwerty", "rush");
if (!$conection) {
    echo "Failed to load DataBase";
}
$i = 1;
$table = mysqli_query($conection, "SELECT * FROM orders");
while ($array = mysqli_fetch_assoc($table)) {
    echo "<div>";
    echo "<p>";
    echo "<h1> Order number: " . $i . "</h1>";
    echo "User <b>" . $array['name'] . "</b> buy:</br>";
    unparse($array['ordering'], $conection);
    echo "</div>";
    $i++;
}
?>
<?php
include 'footer.php';
?>