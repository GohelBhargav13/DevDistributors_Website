<?php
require './conn.php';
include '../Comman_pages/navbar.php';
if (session_status() === PHP_SESSION_NONE) {
        session_start();
}

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['company_name'])) {
    $com_name = urldecode($_GET['company_name']);
}else
{
    echo "<script>alert('id is not set')</script>";
    exit;
}

$sql = "SELECT p.*, c.company_name AS company_name
FROM product p
JOIN company c ON p.company_id = c.id";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Dev Distributors</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css "
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>

    <div class="hero2">
        <div id="preloader"></div>
        <body>
            <!-- Slids Section Code  -->
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <?php
                $res = $conn->query($sql);
                if ($res && mysqli_num_rows($res) > 0):
                    $slides = [];
                    while ($row = mysqli_fetch_assoc($res)) {
                        $slides[] = $row; // Store all rows first
                    }
                ?>

                    <!-- Carousel Indicators -->
                    <div class="carousel-indicators">
                        <?php foreach ($slides as $index => $row): ?>
                            <button type="button"
                                data-bs-target="#carouselExampleCaptions"
                                data-bs-slide-to="<?= $index ?>"
                                class="<?= $index === 0 ? 'active' : '' ?>"
                                aria-current="<?= $index === 0 ? 'true' : 'false' ?>"
                                aria-label="Slide <?= $index + 1 ?>"></button>
                        <?php endforeach; ?>
                    </div>

                    <!-- Carousel Items -->
                    <div class="carousel-inner">
                        <?php foreach ($slides as $index => $row): ?>
                            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                <img src="assets/Extra_image/<?= htmlspecialchars($row['image2']) ?>" class="d-block" alt="<?= htmlspecialchars($row['name']) ?>" style="width: 70%; margin-left: 200px; margin-top: 20px;">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><?= htmlspecialchars($row['name']); ?></h5>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                <?php endif; ?>
            </div>
    </div>
    <!--Title Section-->
    <div class="maintitle">
        <h1 class="white">Category's</h1>
    </div>

    <!--Company's Section-->
    <div class="company">
        <?php
        $res = $conn->query($sql);
        if ($res):
            while ($row = mysqli_fetch_assoc($res)):
        ?>

                    <a href='./frooti.php?company_name=<?= urldecode($com_name)?>&cat_name=<?= urldecode($row['name']) ?>'>
                        <img src="assets/product_img/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                    </a>
        <?php endwhile;
        endif;
        ?>

    </div>
    <!-- Bottom Navigation -->
    <footer class="footer mt-auto py-3 bg-black" id="bottomnav">
        <div class="container">
            <span class="text-muted">
                <div class="dropup dropup">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ri-menu-fill"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="parleagro.html">ParleAgro</a></li>
                        <li><a class="dropdown-item" href="priyagold.html">PriyaGold</a></li>
                        <li><a class="dropdown-item" href="veeba.html">Veeba</a></li>
                        <li><a class="dropdown-item" href="hershey.html">Hershey's</a></li>
                        <li><a class="dropdown-item" href="orionchocopie.html">Orion</a></li>
                        <li><a class="dropdown-item" href="malkist.html">Malkist</a></li>
                        <li><a class="dropdown-item" href="mcvities.html">Mc-vities</a></li>
                        <li><a class="dropdown-item" href="tiku.html">Tikku</a></li>
                        <li><a class="dropdown-item" href="b-like.html">B-like</a></li>
                        <li><a class="dropdown-item" href="Jabsons.html">Jabsons</a></li>
                        <li><a class="dropdown-item" href="TGB.html">TGB</a></li>
                    </ul>
                </div>
                <!-- Home button -->
                <a href="index.html" class="home"><i class="ri-home-3-line"></i></a>
                <!-- up Side button -->
                <a href="index.html" class="up"><i class="ri-arrow-left-line"></i></a>
            </span>
        </div>
    </footer>

    <!--Java Script Section For Side NavBar and Loader-->
    <script>
        var loader = document.getElementById("preloader");

        window.addEventListener("load", function() {
            loader.style.display = "none";
        });
    </script>


</body>

</html>