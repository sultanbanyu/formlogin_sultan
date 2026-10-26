<?php
session_start();
include "koneksi.php";

$pesan = "";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM users WHERE email='$email'"
    );

    $user = mysqli_fetch_assoc($query);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['login'] = true;
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['email'] = $user['email'];

        header("Location: dashboard.php");
        exit;

    } else {
        $pesan = "Email atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SultanApp</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="auth-body">

<div class="auth-container">

    <div class="auth-brand">
        <div class="brand-icon">S</div>
        <span>SultanApp</span>
    </div>

    <div class="auth-box">

        <div class="auth-header">
            <div class="auth-icon">
                🔐
            </div>

            <h1>Selamat Datang</h1>

            <p>
                Login untuk melanjutkan ke dashboard kamu.
            </p>
        </div>

        <?php if ($pesan != "") { ?>
            <div class="error">
                ⚠️ <?= htmlspecialchars($pesan); ?>
            </div>
        <?php } ?>

        <form method="POST">

            <div class="input-group">
                <label>Email</label>

                <div class="input-wrapper">
                    <span>✉️</span>
                    <input
                        type="email"
                        name="email"
                        placeholder="Masukkan email"
                        required
                    >
                </div>
            </div>

            <div class="input-group">
                <label>Password</label>

                <div class="input-wrapper">
                    <span>🔒</span>
                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                    >
                </div>
            </div>

            <button type="submit" name="login">
                Login
                <span>→</span>
            </button>

        </form>

        <div class="divider">
            <span>atau</span>
        </div>

        <p class="auth-link">
            Belum punya akun?
            <a href="register.php">Daftar sekarang</a>
        </p>

    </div>

    <p class="copyright">
        © 2026 SultanApp
    </p>

</div>

</body>
</html>
