<?php
$name = $_POST['name'];
if (file_exists('list.csv') && $name != "") {
    $handle = fopen('list.csv', 'r');
    $file = "";
    while ($line = fgetcsv($handle, 1000, ';')) {
        if ($line[0] != $name) {
            $file .= $line[0] . ";" . $line[1] . "\n";
        }
    }
    fclose($handle);
    file_put_contents('list.csv', $file);
}
?>
