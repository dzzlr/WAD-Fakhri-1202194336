<?php
require "Functions.php";

$id = $_GET["id_buku"];
if (deleteData($id) > 0) {
    echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'Fakhri_Home.php';
            </script>
    ";
} else {
    echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'Fakhri_Home.php';
            </script>
    ";
}
?>