    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <!-- BOOTSTRAP CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Script PHP -->
        <?php
            $gedung = array (
                'array("Nusantara Hall", 2000, 5000, "Free Parking", "Full AC", "Cleaning Service", "Covid-19 Health Protocol")
                array("Garuda Hall", 1000, 2000, "Free Parking", "Full AC", "No Cleaning Service", "Covid-19 Health Protocol")
                array("Gedung Serba Guna", 500, 500, "No Free Parking", "No Full AC", "No Cleaning Service", "Covid-19 Health Protocol")'
            );
            $gedungImg = array(
                "https://london.bridestory.com/images/c_fill,dpr_1.0,f_auto,fl_progressive,pg_1,q_80,w_680/v1/assets/IMG_0836_l7p7uz/ice-indonesia-convention-exhibition_wedding-at-ice-bsd1487580049_10.jpg",
                "https://media-cdn.tripadvisor.com/media/photo-s/1a/25/06/c5/garuda-hall.jpg",
                "https://mm.widyatama.ac.id/wp-content/uploads/2016/07/GSG.jpg",
            )
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
        <!-- Judul -->
        <h4 class="text-center" style="margin-top:60px">WELCOME TO ESD VENUE RESERVATION</h4>
        <!-- Akhir Judul -->
        <!-- Desk -->
        <p class="py-2 mx-5 bg-dark text-white text-center">Find your best deal for your event, here!</p>
        <!-- Akhir Desk -->
        <!-- Konten -->
        <div class="content-venue d-flex justify-content-evenly mx-5 my-3">
            <div class="card" style="width: 24rem;">
                <img class="card-img-top" src="<?= $gedungImg[0] ?>" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?= $gedung[0][0] ?></h5>
                    <p class="card-text text-muted">$<?= $gedung[0][1] ?> / Hour<br><?= $gedung[0][2] ?> Capacity</p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item fw-bold text-success"><?= $gedung[0][3] ?></li>
                    <li class="list-group-item fw-bold text-success"><?= $gedung[0][4] ?></li>
                    <li class="list-group-item fw-bold text-success"><?= $gedung[0][5] ?></li>
                    <li class="list-group-item fw-bold text-success"><?= $gedung[0][6] ?></li>
                </ul>
                <div class="card-body bg-light text-center">
                    <form action="Booking.php" method="POST">
                        <button type="submit" class="btn btn-primary" value="Nusantara Hall" name="bookNow">Book Now</button>
                    </form>
                </div>
            </div>
            <div class="card" style="width: 24rem;">
                <img class="card-img-top" src="<?= $gedungImg[1] ?>" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?= $gedung[1][0] ?></h5>
                    <p class="card-text text-muted">$<?= $gedung[1][1] ?> / Hour<br><?= $gedung[1][2] ?> Capacity</p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item fw-bold text-success"><?= $gedung[1][3] ?></li>
                    <li class="list-group-item fw-bold text-success"><?= $gedung[1][4] ?></li>
                    <li class="list-group-item fw-bold text-danger"><?= $gedung[1][5] ?></li>
                    <li class="list-group-item fw-bold text-success"><?= $gedung[1][6] ?></li>
                </ul>
                <div class="card-body bg-light text-center">
                    <form action="Booking.php" method="POST">
                        <button type="submit" class="btn btn-primary" value="Garuda Hall" name="bookNow">Book Now</button>
                    </form>
                </div>
            </div>
            <div class="card" style="width: 24rem;">
                <img class="card-img-top" src="<?= $gedungImg[2] ?>" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?= $gedung[2][0] ?></h5>
                    <p class="card-text text-muted">$<?= $gedung[2][1] ?> / Hour<br><?= $gedung[2][2] ?> Capacity</p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item fw-bold text-danger"><?= $gedung[2][3] ?></li>
                    <li class="list-group-item fw-bold text-danger"><?= $gedung[2][4] ?></li>
                    <li class="list-group-item fw-bold text-danger"><?= $gedung[2][5] ?></li>
                    <li class="list-group-item fw-bold text-success"><?= $gedung[2][6] ?></li>
                </ul>
                <div class="card-body bg-light text-center">
                    <form action="Booking.php" method="POST">
                        <button type="submit" class="btn btn-primary" value="Gedung Serba Guna" name="bookNow">Book Now</button>
                    </form>
                </div>
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