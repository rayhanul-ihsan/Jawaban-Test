<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>
<body>

<?php
$name = $address = $phone = $gender = "";
$nameErr = $phoneErr = $generalErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    if (empty($_POST["name"])) {
        $nameErr = "Nama tidak boleh kosong";
        $valid = false;
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Hanya huruf dan spasi yang diperbolehkan";
            $valid = false;
        }
    }

    if (empty($_POST["address"])) {
        $generalErr = "Alamat tidak boleh kosong";
        $valid = false;
    } else {
        $address = test_input($_POST["address"]);
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Nomor telepon tidak boleh kosong";
        $valid = false;
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]*$/", $phone)) {
            $phoneErr = "Hanya angka yang diperbolehkan";
            $valid = false;
        }
    }

    if (empty($_POST["gender"])) {
        $generalErr = "Jenis kelamin tidak boleh kosong";
        $valid = false;
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if ($valid) {
        echo "Form submitted successfully!";
        $name = $address = $phone = $gender = "";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>Form Validation</h2>
<p><span style="color: red;">* wajib diisi</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nama: <input type="text" name="name" value="<?php echo $name; ?>">
    <span style="color: red;">* <?php echo $nameErr; ?></span>
    <br><br>
    Alamat: <textarea name="address" rows="5" cols="40"><?php echo $address; ?></textarea>
    <span style="color: red;">* <?php echo $generalErr; ?></span>
    <br><br>
    Nomor Telepon: <input type="text" name="phone" value="<?php echo $phone; ?>">
    <span style="color: red;">* <?php echo $phoneErr; ?></span>
    <br><br>
    Jenis Kelamin:
    <select name="gender">
        <option value="">Pilih</option>
        <option value="Laki-laki" <?php if ($gender == "Laki-laki") echo "selected"; ?>>Laki-laki</option>
        <option value="Perempuan" <?php if ($gender == "Perempuan") echo "selected"; ?>>Perempuan</option>
    </select>
    <span style="color: red;">* <?php echo $generalErr; ?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
