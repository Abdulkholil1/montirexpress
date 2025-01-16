<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $whatsapp = $_POST['whatsapp'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, email, whatsapp) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $email, $whatsapp);

    if ($stmt->execute()) {
        header("Location: login.php?status=success");
        exit();
    } else {
        echo "<p class='error'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - MONTIR</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Form Registrasi -->
    <div class="login-container">
        <h2 class="login-title">Registrasi - MONTIR</h2>

        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="whatsapp" placeholder="Nomor WhatsApp" required>

            <button type="submit">Daftar</button>
        </form>

        <a href="login.php" class="register-link">Sudah punya akun? Login di sini</a>
    </div>
</body>

</html>