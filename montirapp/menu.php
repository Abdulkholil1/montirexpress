<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Daftar Montir Terdekat (misalnya, ini hanya contoh data statis)
$montir_terdekat = [
    ["name" => "Montir A", "phone" => "081234567890", "location" => "Jakarta", "icon" => "🚗"],
    ["name" => "Montir B", "phone" => "082345678901", "location" => "Bandung", "icon" => "🔧"],
    ["name" => "Montir C", "phone" => "083456789012", "location" => "Surabaya", "icon" => "⚙️"],
];

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MONTIR</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container">
        <!-- Header untuk Dashboard -->
        <header class="dashboard-header">
            <h1 class="header-title">Montir Express</h1>
            <p class="welcome-message">Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        </header>

        <!-- Menu Options -->
        <div class="menu-options">
            <h3>Menu</h3>
            <ul>
                <li><a href="profile.php"><i class="fas fa-user"></i> Profile Saya</a></li>
                <li><a href="montir_recommendations.php"><i class="fas fa-cogs"></i> Rekomendasi Montir Terdekat</a>
                </li>
            </ul>
        </div>


        <!-- Montir Terdekat -->
        <div class="montir-recommendations">
            <h3>Montir Terdekat</h3>
            <ul>
                <?php foreach ($montir_terdekat as $montir): ?>
                    <li class="montir-item">
                        <span class="montir-icon"><?php echo $montir['icon']; ?></span>
                        <span class="montir-name"><?php echo $montir['name']; ?></span>
                        <span class="montir-location"><?php echo $montir['location']; ?></span>
                        <a href="tel:<?php echo $montir['phone']; ?>" class="contact-button">Hubungi</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>

</html>