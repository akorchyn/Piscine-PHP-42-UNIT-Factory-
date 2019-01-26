<?php
session_start();
if ($_GET['submit'] == 'OK') {
    $login = $_GET['login'];
    $passwd = $_GET['passwd'];
}
?>
<html><body>
<form action="index.php" method="get">
    Username: <input type="text" name="login" value="<?php echo $login; ?>">
    <br/>
    Password: <input type="password" name="passwd" value="<?php echo $passwd; ?>">
    <br/>
    <input type="submit" name="submit" value="OK">
</form>
</body></html>
