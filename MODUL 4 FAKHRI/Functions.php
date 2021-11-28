<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "wad_modul4";

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

function register($data) {
    global $conn;
    
    $nama = stripslashes($data["nama"]);
    $email = strtolower(stripslashes($data["email"]));
    $nohp = strtolower(stripslashes($data["nohp"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $check_result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    
    if (mysqli_fetch_assoc($check_result)) {
        echo "<script>
                alert('Email sudah terdaftar');
              </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
                alert('Password tidak sesuai');
              </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    
    mysqli_query($conn, "INSERT INTO users VALUES ('', '$nama', '$email', '$password', '$nohp')");
    $_SESSION['registration_success'] = 'Berhasil registrasi';

    return mysqli_affected_rows($conn);
}

function updateData($data) {
    global $conn;

    $id = $data["id"];
    $nama = stripslashes($data["nama"]);
    $nohp = strtolower(stripslashes($data["nohp"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $warnabackground = $data['warnabackground'];

    if ($password !== $password2) {
        echo "<script>
                alert('Password tidak sesuai');
              </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE users SET nama = '$nama', no_hp = '$nohp', password = '$password' WHERE id = '$id'";
    mysqli_query($conn, $query);

    setcookie('warnabackground', $warnabackground, strtotime('+3 days'), '/');
    $_SESSION['update_success'] = 'Berhasil update profile';

    return mysqli_affected_rows($conn);
}

function booking($data) {
    global $conn;

    $user_id = $data["id"];
    $namatempat_raw = explode(", ", $data["namatempat"]);
    $nama_tempat = $namatempat_raw[0];
    $lokasi = $namatempat_raw[1];

    $harga = $data["hargatempat"];
    $harga = explode(".",$harga);
    $harga = implode("",$harga);
    $harga = (int)$harga;

    $tanggal = $data["date"];

    $query = "INSERT INTO bookings VALUES ('', '$user_id', '$nama_tempat', '$lokasi', '$harga', '$tanggal')";
    mysqli_query($conn, $query);
    $_SESSION['booking_success'] ="Berhasil memesan tiket";

    return mysqli_affected_rows($conn);
}

function deleteData($id) {
    global $conn;

    $query = "DELETE FROM bookings WHERE id = $id";
    mysqli_query($conn, $query);
    $_SESSION['booking_delete'] = "Tiket berhasil dihapus";

    return mysqli_affected_rows($conn);
}

function rupiah($angka){
	$hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}

?>