<?php include "config.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

<h2>Carbon Calculator</h2>

<form method="POST">
    Travel (km): <input type="number" id="travel" name="travel"><br>
    Electricity (units): <input type="number" id="electricity" name="electricity"><br>
    Food (1=veg,2=nonveg): <input type="number" id="food" name="food"><br>

    <h3>Total CO₂: <span id="result">0</span></h3>

    <button type="submit" name="save">Save</button>
</form>

<?php
if(isset($_POST['save']) && isset($_SESSION['user_id'])){
    $t = $_POST['travel'];
    $e = $_POST['electricity'];
    $f = $_POST['food'];

    $total = ($t * 0.12) + ($e * 0.82) + ($f * 2);

    $uid = $_SESSION['user_id'];

    $sql = "INSERT INTO footprint(user_id, travel, electricity, food, total)
            VALUES('$uid','$t','$e','$f','$total')";

    $conn->query($sql);
    echo "Saved!";
}
?>

</body>
</html>