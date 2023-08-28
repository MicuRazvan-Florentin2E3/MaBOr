<?php
    session_start();
    if(isset($_COOKIE["username"])) { 
        setcookie("username", $_SESSION['username'], time() - 86400);
        setcookie("password", $_SESSION['password'], time() - 86400);
    }
    session_destroy();
    header("Location: LoginPage.php");
?>