<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <!-- BOOTSTRAP CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Script PHP -->
    <?php
        if (isset($_POST["bookNow"])) {
            $data = $_POST["bookNow"];
            if ($data == "Nusantara Hall") {
                $image = "https://london.bridestory.com/images/c_fill,dpr_1.0,f_auto,fl_progressive,pg_1,q_80,w_680/v1/assets/IMG_0836_l7p7uz/ice-indonesia-convention-exhibition_wedding-at-ice-bsd1487580049_10.jpg";
            } elseif ($data == "Garuda Hall") {
                $image = "https://media-cdn.tripadvisor.com/media/photo-s/1a/25/06/c5/garuda-hall.jpg";
            } elseif ($data == "Gedung Serba Guna") {
                $image = "https://mm.widyatama.ac.id/wp-content/uploads/2016/07/GSG.jpg";
            }
        } else {
            $data = "Choose...";
            $image = "https://london.bridestory.com/images/c_fill,dpr_1.0,f_auto,fl_progressive,pg_1,q_80,w_680/v1/assets/IMG_0836_l7p7uz/ice-indonesia-convention-exhibition_wedding-at-ice-bsd1487580049_10.jpg";
        }
    ?>
    <!-- Akhir Script PHP -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top justify-content-center">
        <div class="" id="navbarSupportedContent">
            <ul class="nav navbar-nav navbar-center text-center">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="Home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Booking.php">Booking</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <!-- Desk -->
    <p class="py-2 mx-5 bg-dark text-white text-center" style="margin-top:70px">Reserve your venue now!</p>
    <!-- Akhir Desk -->
    <!-- Konten -->
    <div class="row align-items-center border border-light px-2 py-2 mx-5">
        <div class="col col-md-5">
            <img src="<?= $image ?>" alt="gedung1" style="width: 100%;">
        </div>
        <div class="col col-md-7">
            <form action="MyBooking.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="nama" id="name" class="form-control" placeholder="fakhri_1202194336" value="fakhri_1202194336" readonly>
                </div>
                <div class="mb-3">
                    <label for="eventDate" class="form-label">Event Date</label>
                    <input type="date" name="tanggal" id="eventDate" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="startTime" class="form-label">Start Time</label>
                    <input type="time" name="waktu" id="startTime" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="duration" class="form-label">Duration (Hours)</label>
                    <input type="number" name="durasi" id="duration" class="form-control" min="1">
                </div>
                <div class="mb-3">
                    <label for="buildingType">Building Type</label>
                    <select name="tipe" id="buildingType" class="form-select">
                        <option >Choose...</option>
                        <option <?php if ($data == "Nusantara Hall") {echo "selected";} ?> value="Nusantara Hall">Nusantara Hall</option>
                        <option <?php if ($data == "Garuda Hall") {echo "selected";} ?> value="Garuda Hall">Garuda Hall</option>
                        <option <?php if ($data == "Gedung Serba Guna") {echo "selected";} ?> value="Gedung Serba Guna">Gedung Serba Guna</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="text" name="nomorhp" id="phoneNumber" class="form-control">
                </div>
                <h>Add Service(s)</h>
                <div class="form-check">
                    <input type="checkbox" name="services[]" class="form-check-input" value="Catering" id="catering">
                    <label for="catering" class="form-check-label">Catering / $700</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="services[]" class="form-check-input" value="Decoration" id="decoration">
                    <label for="decoration" class="form-check-label">Decoration / $450</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="services[]" class="form-check-input" value="Sound System" id="sound">
                    <label for="sound" class="form-check-label">Sound System / $250</label>
                </div>
                <div class="mt-3 d-grid gap-2">
                    <button type="submit" name="book" class="btn btn-primary">Book</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Akhir Konten -->
    <!-- Footer -->
    <footer class="footer text-center py-2 bg-light">
        Created by fakhri_1202194336
    </footer>
    <!-- Akhir Footer -->
</body>
</html>