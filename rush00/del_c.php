<?php
include 'header.php';
?>
<div style="text-align: center">
    <h3 style="text-align: center">Delete all product in category</h3>
    <form style="text-align:center" action="admin_panel/delete_category.php" method="get">
        Category name: </span> <input type="text" name="category" value=""></br>
        <input type="submit" value="OK" name="submit"></br>
    </form>
</div>
<?php
include 'footer.php';
?>

