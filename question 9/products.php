<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM products");

echo "<h2>Product List</h2>";

while($row = mysqli_fetch_assoc($result)) {
    echo "Name: " . $row['name'] . "<br>";
    echo "Price: ₹" . $row['price'] . "<br>";
    echo "Description: " . $row['description'] . "<br><br>";
}
?>