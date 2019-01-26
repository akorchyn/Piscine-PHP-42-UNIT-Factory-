<?php
include 'header.php';
?>
    <div style="text-align: center">
        <h3 style="text-align: center">Add new product</h3>
        <form style="text-align:center" action="admin_panel/add_good.php" method="get">
            <input type="file" name="image" /></br>
            Name of product: <input type="text" name="name" value=""></br>
            Cost of product: <input type="text" name="value" value=""></br>
            Category naming: <input type="text" name="category" value=""></br>
            <input type="submit" value="OK" name="submit"/>
        </form>
    </div>
<?php
include 'footer.php';
?>

