<?php
require "Functions.php";
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: Index.php");
    exit;
}

if (isset($_POST["savechange"])) {
    if (updateData($_POST) > 0) {
        echo " ";
    } else {
        echo " ";
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
    <style type="text/css">
        #settingbackground {                
            background-color: <?php 
                if (!empty($_COOKIE['warnabackground'])){
                    echo "#".$_COOKIE['warnabackground'];
                } else {
                    echo "#89B5F2";
                }
            ?>;
        }
    </style>
    <title>Profile</title>
</head>

<body style="background-color: #FEF8E6;">
    <!-- Navbar -->
    <nav class="px-5 navbar navbar-light fixed-top" id="settingbackground">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="Index.php">EAD Travel</a>
            <div class="my-auto d-flex">
                <a href="Bookings.php">
                    <img class="mx-3 mt-2" src="assets/shopping-cart.png" height="25"alt="">
                </a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" role="button" id="navbarDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false"><?= $_SESSION["nama"]?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a type="submit" class="dropdown-item" href="Profile.php?id=<?= $_SESSION["id"] ?>">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="Logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <?php if(isset($_SESSION['update_success'])):?>
        <div class="mt-5 alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['update_success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php unset($_SESSION['update_success']); endif;?>
    <!-- Konten -->
    <div class="mx-auto mb-5 py-4 px-5 shadow bg-white rounded" style="margin-top: 5rem; width:75%;">
        <h4 class="text-center mb-3">Profile</h4>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $_SESSION['id']?>">
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="email" name="email" value="<?= $_SESSION["email"] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $_SESSION["nama"] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nohp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $_SESSION["no_hp"] ?>">
                </div>
            </div>
            <hr>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Kata Sandi</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password2" class="col-sm-2 col-form-label">Konfirmasi Kata Sandi</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Kata Sandi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="warnabackground" class="col-sm-2 col-form-label">Warna Navbar</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="warnabackground">
                        <option value="89B5F2">Blue Ocean</option>
                        <option value="D443E2">Lavender</option>
                    </select>
                </div>
            </div>
            <div class="d-grid gap-2 col-2 d-md-block mx-auto">
                <button class="btn btn-primary" type="submit" name="savechange"
                    onClick="document.location.reload(true)">Simpan</button>
                <a class="btn btn-warning" href="Index.php">Cancel</a>
            </div>
        </form>
    </div>
    <!-- Akhir Konten -->
    <!-- Footer -->
    <footer class="footer pt-2 py-2 text-center fixed-bottom" id="settingbackground">
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