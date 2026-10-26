
<?php

include "koneksi.php";

$pesan = "";

if (isset($_POST['register'])) {

    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];

    // Cek apakah email sudah ada
    $cek = mysqli_query(
        $koneksi,
        "SELECT * FROM users WHERE email='$email'"
    );

    if (mysqli_num_rows($cek) > 0) {

        $pesan = "Email sudah digunakan! Silakan gunakan email lain.";

    } else {

        // Enkripsi password
        $password_hash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        // Simpan user
        $query = mysqli_query(
            $koneksi,
            "INSERT INTO users (nama, email, password)
             VALUES ('$nama', '$email', '$password_hash')"
        );

        if ($query) {

            // Berhasil
            header("Location: login.php?register=success");
            exit;

        } else {

            // Tampilkan error database
            $pesan = "Register gagal: " . mysqli_error($koneksi);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Register - SultanApp</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>

<body class="auth-body">

<div class="auth-container">

    <div class="auth-brand">

        <div class="brand-icon">
            S
        </div>

        <span>SultanApp</span>

    </div>


    <div class="auth-box">

        <div class="auth-header">

            <div class="auth-icon">
                🚀
            </div>

            <h1>Buat Akun</h1>

            <p>
                Daftar sekarang dan mulai menggunakan SultanApp.
            </p>

        </div>


        <?php if ($pesan != "") { ?>

            <div class="error">
                ⚠️ <?= htmlspecialchars($pesan); ?>
            </div>

        <?php } ?>


        <form method="POST">


            <div class="input-group">

                <label>Nama</label>

                <div class="input-wrapper">

                    <span>👤</span>

                    <input
                        type="text"
                        name="nama"
                        placeholder="Masukkan nama"
                        required
                    >

                </div>

            </div>


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
                        placeholder="Buat password"
                        required
                    >

                </div>

            </div>


            <button
                type="submit"
                name="register"
            >
                Buat Akun
                <span>→</span>
            </button>


        </form>


        <div class="divider">
            <span>atau</span>
        </div>


        <p class="auth-link">

            Sudah punya akun?

            <a href="login.php">
                Login sekarang
            </a>

        </p>

    </div>


    <p class="copyright">
        © 2026 SultanApp
    </p>

</div>

</body>

</html>
