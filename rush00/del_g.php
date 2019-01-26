<?php
include 'header.php';
?>
    <div style="text-align: center">
        <h3 style="text-align: center">Delete product by name</h3>
        <form style="text-align:center" action="admin_panel/delete_good.php" method="get">
            Product name: </span> <input type="text" name="name" value=""></br>
            <input type="submit" value="OK" name="submit"></br>
        </form>
    </div>
<?php
include 'footer.php';
?>