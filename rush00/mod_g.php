<?php
include 'header.php';
?>
<div style="text-align: center">
    <h3 style="text-align: center";>Modify product</h3>
    Empty field to save current value.
    <form style="text-align:center" action="admin_panel/modif_goods.php" method="GET">
        New image:<input type="file" name="image" /></br>
        Current name: <input type="text" name="name" value=""></br>
        New name: <input type="text" name="new_name" value=""></br>
        New cost: <input type="text" name="value" value=""></br>
        New category: <input type="text" name="category" value=""></br>
        <input type="submit" value="OK" name="submit"/>
    </form>
</div>
<?php
include 'footer.php';
?>

