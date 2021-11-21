<?php
require "Functions.php";

$bahasa_array = array("Indonesia", "Lainnya");
$tags_array = array("Pemrograman", "Website", "Java", "OOP", "MVC", "Kalkulus", "Lainnya");

if (isset($_POST["submit"])) {
    if (insertData($_POST) > 0) {
        echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'Fakhri_TambahBuku.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data gagal ditambahkan!');
                    document.location.href = 'Fakhri_TambahBuku.php';
                </script>
            ";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
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
            <a class="navbar-brand" href="Fakhri_Home.php">
                <img src="assets/logo-ead.png" alt="" width="120" height="30" class="d-inline-block align-text-top">
            </a>
            <form class="my-auto d-flex">
                <button class="btn btn-primary" type="submit">Tambah Buku</button>
            </form>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <!-- Konten -->
    <div class="mx-auto py-4 px-5 shadow p-3 mb-5 bg-white rounded" style="width:80%; margin-top:5rem;">
        <h4 class="text-center"><b>Tambah Data Buku</b></h4>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judulbuku" class="form-label"><b>Judul Buku</b></label>
                <input type="text" name="judulbuku" id="judulbuku" class="form-control"
                    placeholder="Contoh: Pemrograman Web Bersama EAD">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label"><b>Penulis</b></label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Fakhri_1202194336"
                    value="Fakhri_1202194336" readonly>
            </div>
            <div class="mb-3">
                <label for="tahunterbit" class="form-label"><b>Tahun Terbit</b></label>
                <input type="number" name="tahunterbit" id="tahunterbit" class="form-control" min="1500"
                    placeholder="Contoh: 1990">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label"><b>Deskripsi</b></label>
                <textarea type="text" name="deskripsi" id="deskripsi" class="form-control" rows="3"
                    placeholder="Contoh: Buku ini menjelaskan tentang ..."></textarea>
            </div>
            <div class="d-flex">
                <p style="margin-right:1rem"><b>Bahasa</b></p>
                <?php foreach ($bahasa_array as $each_bahasa): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bahasa" id="opsi<?=$each_bahasa?>"
                            value="<?=$each_bahasa?>">
                        <label class="form-check-label" for="opsi<?=$each_bahasa?>"><?=$each_bahasa?></label>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="d-flex">
                <p style="margin-right:1rem"><b>Tag</b></p>
                <?php foreach ($tags_array as $each_tag): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="tag[]" type="checkbox" id="opsi<?=$each_tag?>"
                            value="<?=$each_tag?>">
                        <label class="form-check-label" for="opsi<?=$each_tag?>"><?=$each_tag?></label>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label"><b>Gambar</b></label>
                <input class="form-control" type="file" name="gambar" id="gambar">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <input class="btn btn-primary" type="submit" name="submit" value="+ Tambah">
            </div>  
        </form>
    </div>
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