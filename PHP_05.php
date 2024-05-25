<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Matrix</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = isset($_POST['n']) ? intval($_POST['n']) : 0;

    if ($n > 0 && $n <= 10) {
        echo "<h2>Matrix $n x $n</h2>";
        echo "<table border='1'>";
        for ($i = 1; $i <= $n; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= $n; $j++) {
                echo "<td>" . ($i * $j) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nilai N harus antara 1 dan 10</p>";
    }
}
?>

<h2>Create Matrix</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Masukkan nilai N (1-10): <input type="text" name="n">
    <input type="submit" value="Buat Matrix">
</form>

</body>
</html>
