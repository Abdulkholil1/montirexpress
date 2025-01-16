<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; // Bandingkan password langsung

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $stored_password);
        $stmt->fetch();

        if ($password === $stored_password) {
            session_start();
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            header("Location: menu.php");
            exit();
        } else {
            echo "<p class='error'>Password salah.</p>";
        }
    } else {
        echo "<p class='error'>Username tidak ditemukan.</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MONTIR</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Notifikasi Registrasi Berhasil -->
    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
        <div id="notificationSuccess" class="notification-success">
            <span>Registrasi berhasil! Silakan login untuk melanjutkan.</span>
        </div>
    <?php endif; ?>

    <!-- Form Login -->
    <div class="login-container">
        <h2 class="login-title">Login - MONTIR</h2>

        <!-- Form Login -->
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>
        </form>

        <a href="register.php" class="register-link">Belum punya akun? Daftar di sini</a>
    </div>

    <!-- JavaScript untuk menangani notifikasi -->
    <script>
        // Fungsi untuk menampilkan notifikasi
        function showNotification() {
            document.getElementById('notificationSuccess').style.display = 'block';
        }

        // Fungsi untuk menutup notifikasi
        function closeNotification() {
            document.getElementById('notificationSuccess').style.display = 'none';
        }

        // Simulasi login berhasil
        // Anda dapat mengganti bagian ini dengan logika PHP untuk login yang sebenarnya
        window.onload = function () {
            var notification = document.getElementById('notificationSuccess');
            if (notification) {
                showNotification();
            }
        }
    </script>
</body>

</html>