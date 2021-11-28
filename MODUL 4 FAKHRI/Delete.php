<?php
require "Functions.php";

$id = $_GET["id"];
if (deleteData($id) > 0) {
    header("Location: Bookings.php");
} else {
    echo mysqli_error($conn);
}
?>