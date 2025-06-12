<?php
require './conn.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$name_dist = '';
$distributorData = null;

if (isset($_SESSION['name'])) {
    $name_dist = $_SESSION['name'];

    $sql2 = "SELECT * FROM distributors WHERE distributor_name = ?";
    $stmt = $conn->prepare($sql2);
    $stmt->bind_param('s', $name_dist);
    $stmt->execute();
    $result = $stmt->get_result();
    $distributorData = $result->fetch_assoc();
}

$sql = 'SELECT * FROM company';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev Distributors</title>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">

    <!-- CSS, Fonts, AOS -->
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>

    <?php if (isset($_SESSION['user_username'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" data-aos="zoom-in" data-aos-delay="200">
            <h4><strong>Login Successful....!</strong></h4>
            <span>
                <?php if ($distributorData): ?>
                    <span>Welcome....!<strong> <?= htmlspecialchars($distributorData['distributor_name']) ?></strong> To Dev Distributors</span>
                <?php endif; ?>
            </span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <?php if (isset($_SESSION['Admin_name'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" data-aos="zoom-in" data-aos-delay="200">
            <h4><strong>Login Successful....!</strong></h4>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <?php include '../../Comman_pages/navbar.php'; ?>

    <?php if (isset($_SESSION['Admin_name'])) { ?>
        <center>
            <div class="heading" data-aos="fade-out" data-aos-delay="400">
                <h1 class="aqua">Hello! <br><span style="color: white;">Manoj Bhai</span></h1>
            </div>
        </center>
    <?php } elseif (isset($_SESSION['user_username'])) { ?>
        <div class="gif">
            <div class="heading">
                <h1 class="aqua">Hello! <br>
                    <span class="white">Welcome to </span><br>
                    <span>Dev Distributors</span><br>
                    <span style="color: white;"> <?= htmlspecialchars($distributorData['distributor_name']) ?></span>
                </h1>
            </div>
        </div>
    <?php } else { ?>
        <div class="gif">
            <div class="heading">
                <h1 class="aqua">Hello! <br>
                    <span class="white">Welcome to </span><br>
                    <span>Dev Distributors</span>
                </h1>
            </div>
        </div>
    <?php } ?>

    <!-- Title Section -->
    <div class="maintitle">
        <h1 class="white">Company's</h1>
    </div>

    <!-- Company's Section -->
    <div class="company">
        <?php
        $companyResult = $conn->query($sql);
        if ($companyResult):
            while ($row = mysqli_fetch_assoc($companyResult)):
        ?>
            <a href="./company.php?company_name=<?= urlencode($row['company_name']) ?>">
                <img src="assets/company_img/<?= htmlspecialchars($row['image']) ?>" alt="">
            </a>
        <?php endwhile; endif; ?>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="sec aboutus">
                <h2><span class="aqua">A</span>BOUT U<span class="aqua">S</span></h2>
                <a href="contect.html">
                    <p>Under Saffron hotel, Panjra pod Road, <br> Hatdi, Porbandar, Gujarat 360575</p>
                </a>
                <ul class="sci">
                    <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="tel:+919510908240"><i class="fa-brands fa-whatsapp"></i></a></li>
                </ul>
            </div>
            <div class="sec QuickLinks">
                <h3><span class="aqua">S</span>UPPOR<span class="aqua">T</span></h3>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="contect.html">Contact</a></li>
                </ul>
            </div>
            <div class="sec QuickLinks">
                <h3><span class="aqua">C</span>ompany<span class="aqua">'s</span></h3>
                <ul>
                    <?php
                    $companyResult = $conn->query($sql);
                    if ($companyResult):
                        while ($row = mysqli_fetch_assoc($companyResult)):
                    ?>
                        <li><a href="#"><?= htmlspecialchars($row['company_name']) ?></a></li>
                    <?php endwhile; endif; ?>
                </ul>
            </div>
            <div class="sec Contact">
                <h3><span class="aqua">C</span>ONTACT U<span class="aqua">S</span></h3>
                <ul class="info">
                    <li>
                        <span><i class="fa-solid fa-phone"></i></span>
                        <p><a href="tel:+919510908240">9510908240</a></p>
                    </li>
                    <li>
                        <span><i class="fa-solid fa-envelope"></i></span>
                        <p><a href="mailto:Mdev024@gmail.com">Mdev024@gmail.com</a></p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="copyrightText">
            <p>All Copy Rights Reserved in &copy; <script>document.write(new Date().getFullYear());</script></p>
        </div>
    </footer>

    <!-- Bottom Navigation -->
    <footer class="footer mt-auto py-3 bg-black" id="bottomnav">
        <div class="container">
            <span class="text-muted" id="center-icon">
                <div class="dropup">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="ri-menu-fill"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="parleagro.html">ParleAgro</a></li>
                        <li><a class="dropdown-item" href="priyagold.html">PriyaGold</a></li>
                        <li><a class="dropdown-item" href="veeba.html">Veeba</a></li>
                        <li><a class="dropdown-item" href="hershey.html">Hershey's</a></li>
                        <li><a class="dropdown-item" href="orionchocopie.html">Orion</a></li>
                        <li><a class="dropdown-item" href="malkist.html">Malkist</a></li>
                        <li><a class="dropdown-item" href="Jabsons.html">Jabsons</a></li>
                        <li><a class="dropdown-item" href="tiku.html">Tikku</a></li>
                    </ul>
                </div>
                <a href="index.html" class="home"><i class="ri-home-3-line"></i></a>
                <a href="#" class="up"><i class="ri-arrow-up-line"></i></a>
            </span>
        </div>
    </footer>

    <!-- Preloader -->
    <div id="preloader" class="preloader-title">
        <h2>Welcome to <span class="aqua">D</span>EV DISTRIBUTO<span class="aqua">R</span></h2>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>

    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function () {
            loader.style.display = "none";
        });
    </script>
</body>
</html>
