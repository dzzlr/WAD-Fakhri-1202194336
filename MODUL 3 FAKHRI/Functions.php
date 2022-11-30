<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "modul3";

$conn = mysqli_connect($server, $user, $password, $nama_database);

if (!$conn){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function insertData($data) {
    global $conn;
    $nama_tabel = "buku_table";

    $column1 = htmlspecialchars($data["judulbuku"]);
    $column2 = htmlspecialchars($data["nama"]);
    $column3 = htmlspecialchars($data["tahunterbit"]);
    $column4 = htmlspecialchars($data["deskripsi"]);

    $column6 = $data["tag"];
    $column7 = $data["bahasa"];

    $column5 = upload();
    if (!$column5) {
        return false;
    }

    $column6_new = implode(", ",$column6);

    $query = "INSERT INTO $nama_tabel VALUES
            ('', '$column1', '$column2', '$column3', '$column4',
            '$column5', '$column6_new', '$column7')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteData($id) {
    global $conn;
    $nama_tabel = "buku_table";

    $query = "DELETE FROM $nama_tabel WHERE id_buku = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateData($data) {
    global $conn;
    $nama_tabel = "buku_table";

    $id = $data["id_buku"];
    $column1 = htmlspecialchars($data["judulbuku"]);
    $column2 = htmlspecialchars($data["nama"]);
    $column3 = htmlspecialchars($data["tahunterbit"]);
    $column4 = htmlspecialchars($data["deskripsi"]);
    $column5_old = htmlspecialchars($data["gambarlama"]);
    $column6 = $data["tag"];
    $column7 = $data["bahasa"];

    if ($_FILES['gambar']['error'] === 4) {
        $column5 = $column5_old;
    } else {
        $column5 = upload();
    }

    $column6_new = implode(", ",$column6);

    $query = "UPDATE $nama_tabel SET
                judul_buku = '$column1',
                penulis_buku = '$column2',
                tahun_terbit = '$column3',
                deskripsi = '$column4',
                gambar = '$column5',
                tag = '$column6_new',
                bahasa = '$column7'
            WHERE id_buku = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $filename = $_FILES['gambar']['name'];
    $filesize = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    $file_ext_valid = ['jpg', 'jpeg', 'png'];
    $file_ext = explode('.', $filename);
    $file_ext = strtolower(end($file_ext));

    if (!in_array($file_ext, $file_ext_valid)) {
        echo "<script>
                alert('Upload bukan gambar!');
            </script>";
        return false;
    }

    if ($filesize > 5000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    $newFilename = uniqid();
    $newFilename .= '.';
    $newFilename .= $file_ext;

    move_uploaded_file($tmpname, 'assets/buku/'.$newFilename);
    return $newFilename;
}
?>