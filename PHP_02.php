<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<?php
$username = $password = "";
$error = $success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

    if (reverseString($username) === $password) {
        $success = "Login berhasil!";
    } else {
        $error = "Login gagal. Password harus kebalikan dari username.";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function reverseString($str) {
    $reversed = '';
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $reversed .= $str[$i];
    }
    return $reversed;
}
?>

<h2>Login</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    UserName: <input type="text" name="username" value="<?php echo $username; ?>" required>
    <br><br>
    Password: <input type="password" name="password" required>
    <br><br>
    <input type="submit" name="submit" value="Login">
</form>

<?php
if ($error) {
    echo "<p style='color: red;'>$error</p>";
}
if ($success) {
    echo "<p style='color: green;'>$success</p>";
}
?>

</body>
</html>
