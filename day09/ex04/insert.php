<?php
    $name = $_POST['name'];
    $value = $_POST['value'];
    file_put_contents('list.csv', $name . ';' . $value .  "\n", FILE_APPEND);
?>