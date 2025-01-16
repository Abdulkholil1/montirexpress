<?php
session_start();

require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil data pengguna dari database
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username, email, whatsapp FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
} else {
    echo "Data pengguna tidak ditemukan.";
    exit();
}

// Jika form disubmit, proses pembaruan profil
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['whatsapp']);

    // Update data pengguna di database
    $update_stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, whatsapp = ? WHERE id = ?");
    $update_stmt->bind_param("sssi", $username, $email, $phone, $user_id);

    if ($update_stmt->execute()) {
        $success_message = "Profil berhasil diperbarui!";
        // Perbarui data session jika username diperbarui
        $_SESSION['username'] = $username;
    } else {
        $error_message = "Terjadi kesalahan saat memperbarui profil.";
    }

    $update_stmt->close();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - MONTIR</title>
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <div class="container">
        <!-- Header -->
        <header class="profile-header">
            <h1>Profil Saya</h1>
        </header>

        <?php if (isset($success_message)): ?>
            <p class="success-message"><?php echo $success_message; ?></p>
        <?php elseif (isset($error_message)): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <!-- Form Profil -->
        <form action="profile.php" method="POST" class="profile-form">
            <div class="form-group">
                <label for="username">Nama Pengguna:</label>
                <input type="text" id="username" name="username" value="<?php echo $user_data['username']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $user_data['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Nomor whatsapp:</label>
                <input type="tel" id="whatsapp" name="whatsapp" value="<?php echo $user_data['whatsapp']; ?>" required>
            </div>
            <button type="submit" class="save-btn">Simpan Perubahan</button>
        </form>

        <a href="menu.php" class="back-btn">Kembali ke Menu Utama</a>
    </div>
</body>

</html>