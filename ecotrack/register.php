<?php include "config.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Register</h2>

    <form method="POST">
        <input type="text" name="name" placeholder="Enter Name" required><br>
        <input type="email" name="email" placeholder="Enter Email" required><br>
        <input type="password" name="password" placeholder="Enter Password" required><br>
        <button name="register">Register</button>
    </form>

    <p>
        Already have an account? 
        <a href="login.php">Login here</a>
    </p>
</div>

<?php
if(isset($_POST['register'])){
    $n = $_POST['name'];
    $e = $_POST['email'];
    $p = $_POST['password'];

    // Check if email already exists
    $check = $conn->query("SELECT * FROM users WHERE email='$e'");

    if($check->num_rows > 0){
        echo "<p style='color:red; text-align:center;'>Email already exists</p>";
    } else {
        $conn->query("INSERT INTO users(name,email,password) VALUES('$n','$e','$p')");
        echo "<p style='color:green; text-align:center;'>Registered successfully!</p>";
    }
}
?>

</body>
</html>