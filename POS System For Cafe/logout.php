<?php
session_start();
if (isset($_SESSION['user_name'])) {
    session_destroy();

    header('Location: Loginpage_login.php');
}
// session_destroy();
// echo $_SESSION;
// header("Loction: Loginpage_login.php");

?>

