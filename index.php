<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Robot Arm Control Panel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .motor-control {
            margin-bottom: 10px;
        }
        .motor-value {
            font-weight: bold;
            margin-left: 8px;
        }
    </style>
</head>
<body>

<h2>Robot Arm Control Panel</h2>

<form action="save_pose.php" method="POST">
    <?php
    for ($i = 1; $i <= 6; $i++) {
        echo "<div class='motor-control'>";
        echo "<label>Motor $i: </label>";
        echo "<input type='range' name='motor$i' min='0' max='180' value='90' oninput='updateValue($i, this.value)'> ";
        echo "<span id='value$i' class='motor-value'>90</span>";
        echo "</div>";
    }
    ?>
    <br>
    <button type="reset" onclick="resetValues()">Reset</button>
    <button type="submit">Save Pose</button>
    <button type="submit" formaction="run_pose.php">Run</button>
</form>

<hr>

<h3>Saved Poses</h3>
<table border="1">
<tr>
    <th>#</th>
    <th>Motor 1</th>
    <th>Motor 2</th>
    <th>Motor 3</th>
    <th>Motor 4</th>
    <th>Motor 5</th>
    <th>Motor 6</th>
    <th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM poses");
while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['motor1']}</td>
        <td>{$row['motor2']}</td>
        <td>{$row['motor3']}</td>
        <td>{$row['motor4']}</td>
        <td>{$row['motor5']}</td>
        <td>{$row['motor6']}</td>
        <td>
            <a href='get_run_pose.php?id={$row['id']}'>Load</a> |
            <a href='delete_pose.php?id={$row['id']}'>Remove</a>
        </td>
    </tr>";
}
?>
</table>

<script>
function updateValue(motor, val) {
    document.getElementById('value' + motor).textContent = val;
}
function resetValues() {
    for (let i = 1; i <= 6; i++) {
        document.getElementById('value' + i).textContent = 90;
    }
}
</script>

</body>
</html>