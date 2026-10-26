<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SultanApp</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="dashboard">

    <nav class="navbar">
        <div class="brand">
            <div class="brand-icon">S</div>
            <span>SultanApp</span>
        </div>

        <a href="logout.php" class="logout-btn">
            Logout
        </a>
    </nav>

    <main class="content">

        <section class="welcome">
            <div>
                <span class="welcome-label">DASHBOARD</span>

                <h1>
                    Halo, <?= htmlspecialchars($_SESSION['nama']); ?> 👋
                </h1>

                <p>
                    Selamat datang kembali! Senang melihat kamu lagi.
                </p>
            </div>

            <div class="welcome-icon">
                ✨
            </div>
        </section>

        <h2 class="section-title">Informasi Akun</h2>

        <div class="cards">

            <div class="card">
                <div class="card-icon blue">
                    👤
                </div>

                <div>
                    <span>Nama Pengguna</span>
                    <h3><?= htmlspecialchars($_SESSION['nama']); ?></h3>
                </div>
            </div>

            <div class="card">
                <div class="card-icon purple">
                    ✉️
                </div>

                <div>
                    <span>Email</span>
                    <h3><?= htmlspecialchars($_SESSION['email']); ?></h3>
                </div>
            </div>

            <div class="card">
                <div class="card-icon green">
                    ✓
                </div>

                <div>
                    <span>Status Akun</span>
                    <h3 class="status">Aktif</h3>
                </div>
            </div>

        </div>

        <div class="info-box">
            <div class="info-icon">💡</div>

            <div>
                <h3>Login berhasil!</h3>
                <p>
                    Kamu sudah berhasil masuk ke SultanApp.
                    Gunakan tombol Logout jika ingin keluar dari akun.
                </p>
            </div>
        </div>

    </main>

</div>

</body>
</html>