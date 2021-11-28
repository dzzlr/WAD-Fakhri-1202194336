<?php
require "Functions.php";
session_start();

if (isset($_SESSION["login"])) {
    header("Location: Index.php");
    exit;
}

$success_register = true;
if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        header("Location: login.php");
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous">
    </script>
    <title>Register</title>
</head>

<body style="background-color: #FEF8E6;">
    <!-- Navbar -->
    <nav class="px-5 navbar navbar-light fixed-top" style="background-color: #89B5F2;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="Index.php">EAD Travel</a>
            <div class="my-auto d-flex">
                <a class="nav-link text-dark" href="#">Register</a>
                <a class="nav-link text-muted" href="Login.php">Login</a>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <!-- Konten -->
    <div class="d-flex justify-content-center" style="height:100%;">
        <div class="col-4 py-4 px-5 mb-5 shadow bg-white rounded" style="margin-top: 5rem;">
            <h5 class="text-center mb-3">Registrasi</h5>
            <hr>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" 
                        placeholder="Masukkan Nama Lengkap" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" 
                        placeholder="Masukkan Alamat Email" required>
                </div>
                <div class="mb-3">
                    <label for="nohp" class="form-label">Nomor Handphone</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" 
                        placeholder="Masukkan Nomor Handphone" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control" id="password" name="password" 
                        placeholder="Kata Sandi Anda" required>
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Konfirmasi Kata Sandi</label>
                    <input type="password" class="form-control" id="password2" name="password2" 
                        placeholder="Konfirmasi Kata Sandi Anda" required>
                </div>
                <div class="mt-3 mb-3 d-grid gap-2 d-grid gap-2 col-6 mx-auto">
                    <button type="submit" name="register" class="btn btn-primary">Daftar</button>
                </div>
                <div class="mb-3 text-center">
                    <p>Anda sudah punya akun? <a href="Login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    <!-- Akhir Konten -->
    <!-- Footer -->
    <footer class="footer pt-2 py-2 text-center" style="background-color: #89B5F2;">
        <p>&copy;2021 Copyright <a href="" data-bs-toggle="modal"
            data-bs-target="#author">Fakhri_1202194336</a></p>
    </footer>
    <!-- Akhir Footer -->
    <!-- Modal -->
    <div class="modal fade" id="author" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Created By</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>NAMA&emsp;&emsp;: FAKHRI HASSAN MAULANA</p>
                    <p>NIM&emsp;&emsp;&emsp;: 1202194336</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal -->
</body>

</html>