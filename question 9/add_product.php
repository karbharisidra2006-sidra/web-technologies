<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];

    $sql = "INSERT INTO products (name, price, description)
            VALUES ('$name', '$price', '$desc')";

    if (mysqli_query($conn, $sql)) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
  Name: <input type="text" name="name"><br><br>
  Price: <input type="text" name="price"><br><br>
  Description: <textarea name="description"></textarea><br><br>
  <input type="submit" value="Add Product">
</form>