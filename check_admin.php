<?php

if ($_SESSION["admin"] != "admin") {
    header("Location: /admin-login.php");
    exit;
}

$admin = true;

?>