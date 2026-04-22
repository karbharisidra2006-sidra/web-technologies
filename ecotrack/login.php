<?php include "config.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <form method="POST">
        <input type="email" name="email" placeholder="Enter Email" required><br>
        <input type="password" name="password" placeholder="Enter Password" required><br>
        <button name="login">Login</button>
    </form>

    <p>
        Don’t have an account? 
        <a href="register.php">Register here</a>
    </p>

</div>

<?php
if(isset($_POST['login'])){
    $e = $_POST['email'];
    $p = $_POST['password'];

    $res = $conn->query("SELECT * FROM users WHERE email='$e' AND password='$p'");

    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];

        header("Location: dashboard.php");
    } else {
        echo "<p style='color:red; text-align:center;'>Invalid Email or Password</p>";
    }
}
?>

</body>
</html>