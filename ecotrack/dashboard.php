<?php include "config.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <h2>🌱 EcoTrack</h2>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

<div class="container">

    <h1>Welcome <?php echo $_SESSION['user_id']; ?> 👋</h1>

    <div class="cards">

        <div class="card">
            <h3>Total Entries</h3>
            <?php
            $uid = $_SESSION['user_id'];
            $count = $conn->query("SELECT COUNT(*) as total FROM footprint WHERE user_id='$uid'");
            $row = $count->fetch_assoc();
            echo "<p>".$row['total']."</p>";
            ?>
        </div>

        <div class="card">
            <h3>Latest CO₂</h3>
            <?php
            $res = $conn->query("SELECT total FROM footprint WHERE user_id='$uid' ORDER BY id DESC LIMIT 1");
            $row = $res->fetch_assoc();
            echo "<p>".($row['total'] ?? 0)." kg</p>";
            ?>
        </div>

    </div>

    <h2>Your History</h2>

    <table>
        <tr>
            <th>Travel</th>
            <th>Electricity</th>
            <th>Food</th>
            <th>Total CO₂</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM footprint WHERE user_id='$uid'");

        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td>{$row['travel']}</td>
                    <td>{$row['electricity']}</td>
                    <td>{$row['food']}</td>
                    <td>{$row['total']}</td>
                  </tr>";
        }
        ?>
    </table>

</div>

</body>
</html>