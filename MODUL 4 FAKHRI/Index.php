<?php
require "Functions.php";
session_start();

$wisata = array(
    "id" => array(1,2,3),
    "gambar_tempat" => array("RajaAmpat.jpg", "GunungBromo.jpeg", "TanahLot.jpg"),
    "nama_tempat" => array("Raja Ampat, Papua", "Gunung Bromo, Malang", "Tanah Lot, Bali"), 
    "deskripsi_tempat" => array(
        "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem omnis eos quis tempore, facilis adipisci aperiam! Dolore, officia expedita. Rem, incidunt voluptatibus? Et facere doloribus eum quisquam maxime cum aliquid.",
        "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem omnis eos quis tempore, facilis adipisci aperiam! Dolore, officia expedita. Rem, incidunt voluptatibus? Et facere doloribus eum quisquam maxime cum aliquid.",
        "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem omnis eos quis tempore, facilis adipisci aperiam! Dolore, officia expedita. Rem, incidunt voluptatibus? Et facere doloribus eum quisquam maxime cum aliquid."
    ),
    "harga_tempat" => array(7000000, 2000000, 5000000),
    "harga_tempat_str" => array("7.000.000", "2.000.000", "5.000.000"),
);

if (isset($_POST["booking"])) {
    if (booking($_POST) > 0) {
        echo "";
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
    <title>Home</title>
    <style type="text/css">
        #settingbackground {                
            background-color: <?php 
                if (!empty($_COOKIE['warnabg'])){
                    echo "#".$_COOKIE['warnabg'];
                } else {
                    echo "#89B5F2";
                }
            ?>;
        }
    </style>
</head>

<body style="background-color: #FEF8E6;">
    <!-- Navbar -->
    <nav class="px-5 navbar navbar-light fixed-top" id="settingbackground">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">EAD Travel</a>
            <div class="my-auto d-flex">
                <?php if (isset($_SESSION["login"])):?>
                    <?php
                        $email = $_SESSION["email"];
                        $row = query("SELECT * FROM users WHERE email = '$email'")[0];
                    ?>
                    <a href="Bookings.php">
                        <img class="mx-3 mt-2" src="assets/shopping-cart.png" height="25"alt="">
                    </a>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" role="button" id="navbarDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false"><?= $row["nama"]?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a type="submit" class="dropdown-item" href="Profile.php?id=<?= $row["id"] ?>">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="Logout.php">Logout</a></li>
                        </ul>
                    </div>
                <?php else:?>
                    <a class="nav-link text-muted" href="Register.php">Register</a>
                    <a class="nav-link text-muted" href="Login.php">Login</a>
                <?php endif?>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <?php if (isset($_SESSION['booking_success'])):?>
        <div class="mt-5 alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['booking_success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php unset($_SESSION['booking_success']); endif;?>
    <?php if (isset($_SESSION['message_login_success'])):?>
        <div class="mt-5 mb-1 alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message_login_success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php unset($_SESSION['message_login_success']); endif;?>
    <!-- Konten -->
    <div class="d-flex flex-column mb-5">
        <div class="mb-3 mx-auto col-9 p-4 rounded text-center" style="background-color: #92C3A3; margin-top: 5rem;">
            <h1>EAD Travel</h1>
        </div>
        <div class="d-flex mx-auto col-9">
        <?php for($i = 0; $i < 3; $i++): ?>
            <div class="card col-4" >
                <img src="assets/img/<?= $wisata["gambar_tempat"][$i] ?>" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?= $wisata["nama_tempat"][$i] ?></h5>
                    <p class="card-text"><?= $wisata["deskripsi_tempat"][$i] ?></p>
                    <hr>
                    <p class="card-text fw-bold">Rp. <?= $wisata["harga_tempat_str"][$i] ?></p>
                </div>
                <input type="hidden" name="nama_tempat" value="<?= $wisata["nama_tempat"][$i]?>">
                <div class="card-footer d-grid gap-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                        data-bs-target="#pesantiket<?=$wisata["id"][$i]?>" name="booking">Pesan Tiket</button>
                </div>
            </div>
            <!-- Modal Konten -->
            <div class="modal fade" id="pesantiket<?=$wisata["id"][$i]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="post">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?= $row['id']?>">
                                <input type="hidden" name="namatempat" value="<?= $wisata["nama_tempat"][$i]?>">
                                <input type="hidden" name="hargatempat" value="<?= $wisata["harga_tempat_str"][$i]?>">
                                <div class="form-group">
                                    <label for="date" class="form-label">Tanggal Perjalanan</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="booking">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal Konten -->
        <?php endfor;?>
        </div>
    </div>
    <!-- Akhir Konten -->
    <!-- Footer -->
    <footer class="footer pt-2 py-2 text-center" id="settingbackground">
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