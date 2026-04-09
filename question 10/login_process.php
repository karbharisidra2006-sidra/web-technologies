<?php
session_start();

$username = $_POST['username'];

// Store in session
$_SESSION['user'] = $username;

// Store in cookie (valid for 1 hour)
setcookie("user", $username, time()+3600);

echo "Login successful!";
echo "<br><a href='dashboard.php'>Go to Dashboard</a>";
?>