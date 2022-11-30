<?php
require "functions.php";
$result = mysqli_query($conn, "SELECT * FROM buku_table");
$num_rows = mysqli_num_rows($result);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- BOOTSTRAP CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous">
    </script>
</head>
<body>
    <!-- Navbar -->
    <nav class="px-5 navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/logo-ead.png" alt="" width="120" height="30" class="d-inline-block align-text-top">
            </a>
            <form class="my-auto d-flex" action="Fakhri_TambahBuku.php">
                <button class="btn btn-primary" type="submit">Tambah Buku</button>
            </form>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <!-- Konten -->
    <main class="flex-shrink-0">
    <?php if($num_rows > 0): ?>
        <div class="px-5 d-flex flex-wrap" style="margin-top:5rem;">
        <?php foreach ($result as $row): ?>
        <div class="card" style="width: 300px; margin-right: 2rem; margin-bottom:2rem;">
            <img src="assets/buku/<?= $row["gambar"]; ?>" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title"><?= $row["judul_buku"]; ?></h5>
                <p class="card-text"><?= $row["deskripsi"]; ?></p>
                <a href="Fakhri_DetailBuku.php?id_buku=<?= $row["id_buku"]; ?>" class="btn btn-primary">Tampilkan Lebih Lanjut</a>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="px-5 text-center" style="margin-top:5rem; padding-top:10rem; padding-bottom:10rem;">
            <h3>Belum Ada Buku</h3>
            <hr>
            <p>Silakan Menambahkan Buku</p>
        </div>
    <?php endif; ?>
    </main>
    <!-- Akhir Konten -->
    <!-- Footer -->
    <footer class="footer mt-auto bg-light py-5 text-center">
        <a class="navbar-brand" href="#">
            <img src="assets/logo-ead.png" alt="" width="120" height="30" class="d-inline-block align-text-top">
        </a>
        <h4 class="mt-3"><b>Perpustakaan EAD</b></h4>
        <p>&copy;Fakhri_1202194336</p>
    </footer>
    <!-- Akhir Footer -->
</body>
</html>