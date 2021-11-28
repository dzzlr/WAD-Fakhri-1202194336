<?php
require "Functions.php";
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION["login"];
$row = query("SELECT * FROM users WHERE email = '$email'")[0];

$user_id = $row["id"];
$result = mysqli_query($conn, "SELECT * FROM bookings WHERE user_id = '$user_id'");
$row_cnt = $result->num_rows;

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
    <title>Bookings</title>
</head>
<body style="background-color: #FEF8E6;">
    <!-- Navbar -->
    <nav class="px-5 navbar navbar-light fixed-top" style="background-color: #89B5F2;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="Index.php">EAD Travel</a>
            <div class="my-auto d-flex">
                <a href="#">
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
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <!-- Konten -->
    <div class="d-flex justify-content-center" style="height:100%;">
        <div class="col-10 py-3 px-3 mb-5 shadow bg-white rounded" style="margin-top: 5rem;">
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Nama Tempat</th>
                    <th>Lokasi</th>
                    <th>Tanggal Perjalanan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </thead>
                <?php $num = 1;?>
                <?php for ($x = 0; $x < $row_cnt; $x++):?>
                    <?php $row2 = query("SELECT * FROM bookings WHERE user_id = '$user_id'")[$x];?>
                    <tr>
                        <td class="fw-bold"><?=$num?></td>
                        <td><?=$row2["nama_tempat"]?></td>
                        <td><?=$row2["lokasi"]?></td>
                        <td><?=$row2["tanggal"]?></td>
                        <td>Rp. <?=$row2["harga"]?></td>
                        <td><a type="button" class="btn btn-danger btn-sm" href="Delete.php?id=<?= $row2["id"] ?>" 
                            onclick="return confirm('Yakin?');">Hapus</a></td>
                    </tr>
                    <?php $num += 1;?>
                <?php endfor;?>
                <tr>
                    <?php $sum = query("SELECT SUM(harga) as total FROM bookings WHERE user_id = '$user_id'")[0];?>
                    <td colspan="4" class="fw-bold">Total</td>
                    <td colspan="2" class="fw-bold">Rp. <?=$sum["total"]?></td>
                </tr>
            </table>
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