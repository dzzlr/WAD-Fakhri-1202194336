    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Booking</title>
        <!-- BOOTSTRAP CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Script PHP -->
        <?php
            if (isset($_POST["book"])) {
                $name = $_POST["nama"];
                $date = $_POST["tanggal"];
                $time = $_POST["waktu"];
                $duration = $_POST["durasi"];

                $gedung = $_POST["tipe"];
                $buildingPrice = 0;
                if ($gedung == "Nusantara Hall") {
                    $buildingPrice += 2000 * $duration;
                } elseif ($gedung == "Garuda Hall") {
                    $buildingPrice += 1000 * $duration;
                } elseif ($gedung == "Gedung Serba Guna") {
                    $buildingPrice += 500 * $duration;
                }
                $phone = $_POST["nomorhp"];

                $bookingNumber = rand();
                $checkin = date('Y-m-d H:i:s', strtotime("$date $time"));
                $checkout = "apa hayo";
                $services = $_POST["services"];

                $servicesPriceTotal = 0;
                foreach ($services as $service) {
                    if ($service == "Catering") {
                        $servicesPriceTotal += 700;
                    } elseif ($service == "Decoration") {
                        $servicesPriceTotal += 450;
                    } elseif ($service == "Sound System") {
                        $servicesPriceTotal += 250;
                    }
                }
                $totalPrices = $buildingPrice + $servicesPriceTotal;
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
        <h4 class="text-center" style="margin-top:70px;">Thank You <?=$name?> for Reserving</h4>
        <h5 class="py-2 text-center">Please double check your reservation details</h5>
        <!-- Akhir Desk -->
        <!-- Konten -->
        <div class="content mx-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Booking Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Check In</th>
                        <th scope="col">Check Out</th>
                        <th scope="col">Building Type</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Service(s)</th>
                        <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?=$bookingNumber?></th>
                        <td><?=$name?></td>
                        <td><?=$checkin?></td>
                        <td><?=$checkout?></td>
                        <td><?=$gedung?></td>
                        <td><?=$phone?></td>
                        <td><ul><?php foreach ($services as $service) { "<li> $service </li>";} ?></ul></td>
                        <td>$<?=$totalPrices?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Akhir Konten -->
        <!-- Footer -->
        <footer class="footer text-center py-2 bg-light fixed-bottom">
            Created by fakhri_1202194336
        </footer>
        <!-- Akhir Footer -->
    </body>
    </html>