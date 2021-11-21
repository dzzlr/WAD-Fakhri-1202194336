<?php
require "Functions.php";

$bahasa_array = array("Indonesia", "Lainnya");
$tags_array = array("Pemrograman", "Website", "Java", "OOP", "MVC", "Kalkulus", "Lainnya");

$id = $_GET["id_buku"];
$row = query("SELECT * FROM buku_table WHERE id_buku = $id")[0];

if (isset($_POST["submit"])) {
    if (updateData($_POST) > 0) {
        echo "
                <script>
                    alert('Data berhasil diupdate!');
                    document.location.href = 'Fakhri_Home.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data gagal diupdate!');
                    document.location.href = 'Fakhri_Home.php';
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
    <title>Detail Buku</title>
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
            <form class="my-auto d-flex" action="Fakhri_TambahBuku.php">
                <button class="btn btn-primary" type="submit">Tambah Buku</button>
            </form>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <!-- Konten -->
    <div class="mx-auto py-4 px-5 shadow p-3 mb-5 bg-white rounded" style="width:80%; margin-top:5rem;">
        <h4 class="text-center"><b>Detail Buku</b></h4>
        <img src="assets/buku/<?= $row["gambar"]; ?>" class="rounded mx-auto my-3 d-block" alt="">
        <hr>
        <div class="mb-3">
            <p><b>Judul:</b></p>
            <p><?= $row["judul_buku"]?></p>
            <p><b>Penulis:</b></p>
            <p><?= $row["penulis_buku"]?></p>
            <p><b>Tahun Terbit:</b></p>
            <p><?= $row["tahun_terbit"]?></p>
            <p><b>Deskripsi:</b></p>
            <p><?= $row["deskripsi"]?></p>
            <p><b>Bahasa:</b></p>
            <p><?= $row["bahasa"]?></p>
            <p><b>Tag:</b></p>
            <p><?= $row["tag"]?></p>
            <div class="container px-1">
                <div class="row gx-6">
                    <div class="col d-grid ">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#suntingModal">Sunting</button>
                    </div>
                    <div class="col d-grid ">
                        <a class="btn btn-danger" href="Fakhri_delete.php?id_buku=<?= $row["id_buku"] ?>"
                            onclick="return confirm('Yakin?');">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Konten -->
    <!-- Modal -->
    <div class="modal fade" id="suntingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sunting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id_buku" value="<?= $row['id_buku']?>">
                        <input type="hidden" name="gambarlama" value="<?= $row['gambar']?>">
                        <div class="mb-3">
                            <label for="judulbuku" class="form-label"><b>Judul Buku</b></label>
                            <input type="text" name="judulbuku" id="judulbuku" class="form-control"
                                value="<?= $row['judul_buku']?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label"><b>Penulis</b></label>
                            <input type="text" name="nama" id="nama" class="form-control" value="Fakhri_1202194336"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tahunterbit" class="form-label"><b>Tahun Terbit</b></label>
                            <input type="number" name="tahunterbit" id="tahunterbit" class="form-control" min="1500"
                                value="<?= $row['tahun_terbit']?>">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label"><b>Deskripsi</b></label>
                            <textarea type="text" name="deskripsi" id="deskripsi" class="form-control"
                                rows="3"><?= $row['deskripsi']?></textarea>
                        </div>
                        <div class="mb-1 d-flex">
                            <p style="margin-right:1rem"><b>Bahasa</b></p>
                            <?php foreach ($bahasa_array as $each_bahasa): ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="bahasa" id="opsi<?=$each_bahasa?>"
                                        value="<?=$each_bahasa?>"
                                        <?php if ($row['bahasa'] == $each_bahasa) {echo 'checked';}?>>
                                    <label class="form-check-label" for="opsi<?=$each_bahasa?>"><?=$each_bahasa?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="mb-1 d-flex">
                            <?php $tags = (explode(", ",$row['tag']));?>
                            <p style="margin-right:1rem"><b>Tag</b></p>
                            <?php foreach ($tags_array as $each_tag): ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="tag[]" type="checkbox" id="opsi<?=$each_tag?>"
                                        value="<?=$each_tag?>"
                                        <?php foreach ($tags as $tag) {
                                            if ($tag == $each_tag){
                                                echo 'checked';
                                            }
                                        }?>>
                                    <label class="form-check-label" for="opsi<?=$each_tag?>"><?=$each_tag?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label"><b>Gambar</b></label>
                            <input class="form-control" type="file" name="gambar" id="gambar" text="<?= $row['gambar']?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Modal -->
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