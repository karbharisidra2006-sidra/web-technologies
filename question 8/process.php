<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validation
    if (empty($name) || empty($email) || empty($password)) {
        echo "All fields are required";
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        echo "Name should contain only letters";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    }
    elseif (strlen($password) < 6) {
        echo "Password must be at least 6 characters";
    }
    else {
        echo "Form submitted successfully!";
    }
}
?>