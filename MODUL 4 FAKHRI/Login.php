<?php
require "Functions.php";
session_start();

if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    $result = mysqli_query($conn, "SELECT email FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    if ($key === hash("sha256", $row["email"])) {
        $_SESSION["login"] = $row["email"];
    }
}

if (isset($_SESSION["login"])) {
    header("Location: Index.php");
    exit;
}

if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = $email;
            
            if (isset($_POST["remember"])) {
                setcookie("id", $row['id'], time()+60);
                setcookie("key", hash('sha256', $row['email']), time()+60);
            }

            header("Location: Index.php");
            exit;
        }
    }
    $error = true;
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
    <title>Login</title>
</head>

<body style="background-color: #FEF8E6;">
    <!-- Navbar -->
    <nav class="px-5 navbar navbar-light fixed-top" style="background-color: #89B5F2;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="Index.php">EAD Travel</a>
            <div class="my-auto d-flex">
                <a class="nav-link text-muted" href="Register.php">Register</a>
                <a class="nav-link text-dark" href="#">Login</a>
            </div>
        </div>
    </nav>
    <?php if (isset($error)):?>
        <div class="mt-5 mb-1 alert alert-danger alert-dismissible fade show" role="alert">
            Gagal Login
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif;?>
    <!-- Akhir Navbar -->
    <!-- Konten -->
    <div class="d-flex justify-content-center" style="height:100%;">
        <div class="col-4 py-4 px-5 shadow bg-white rounded" style="margin-top: 5rem;">
            <h5 class="text-center mb-3">Login</h5>
            <hr>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" 
                        placeholder="Masukkan Alamat Email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control" id="password" name="password" 
                        placeholder="Kata Sandi Anda" required>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                </div>
                <div class="mt-3 mb-3 d-grid gap-2 d-grid gap-2 col-6 mx-auto">
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </div>
                <div class="mb-3 text-center">
                    <p>Anda belum punya akun?
                        <a href="Register.php">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <!-- Akhir Konten -->
    <!-- Footer -->
    <footer class="footer pt-2 py-2 text-center fixed-bottom" style="background-color: #89B5F2;">
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