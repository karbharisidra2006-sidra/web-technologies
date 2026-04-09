<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "Please login first!";
    exit();
}

echo "Welcome " . $_SESSION['user'] . "<br>";

// Cookie access
if (isset($_COOKIE['user'])) {
    echo "Cookie User: " . $_COOKIE['user'];
}
?>