<?php
include 'header.php';
?>
    <div style="text-align: center">
        <h3 style="text-align: center">Add new user</h3>
        <form style="text-align:center" action="admin_panel/add_user.php" method="post">
            Login: </span> <input type="text" name="login" value=""></br>
            Passw: <input type="password" name="passwd" value=""></br>
            <input type="submit" value="OK" name="submit"></br>
        </form>
    </div>
<?php
include 'footer.php';
?>