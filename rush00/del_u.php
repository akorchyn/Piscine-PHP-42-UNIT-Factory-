<?php
include 'header.php';
?>
    <div style="text-align: center">
        <h3 style="text-align: center">Delete user by login</h3>
        <form style="text-align:center" action="admin_panel/delete_user.php" method="post">
            Login: </span> <input type="text" name="login" value=""></br>
            <input type="submit" value="OK" name="submit"></br>
        </form>
    </div>
<?php
include 'footer.php';
?>