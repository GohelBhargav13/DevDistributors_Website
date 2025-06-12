<?php
require './conn.php';
include '../../Comman_pages/navbar.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$product_details = null;
$cat_id = '';
$unit_size = '';
$row = null;
if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['unit_size']) && isset($_GET['cat_id'])) {
    $cat_id = intval($_GET['cat_id']);
    $unit_size = $_GET['unit_size'];

    $sql = "SELECT * FROM sub_product WHERE unit_size = ? AND category_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('si', $unit_size,$cat_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $product_details = $result->fetch_assoc();
        } else {
            // fallback to avoid undefined errors in HTML
            $product_details = ['unit_size' => 'N/A'];
        }

        $stmt->close();
    } else {
        die("SQL Prepare Error: " . $conn->error);
    }
}

$fetch_data = "SELECT * FROM product WHERE id = ?";
$stmt_data = $conn->prepare($fetch_data);
$stmt_data->bind_param('i',$cat_id);
$stmt_data->execute();
$result = $stmt_data->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device, initial-scale=1.0">
    <title>Dev Distributors</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css "
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">



    <style>
        .small-img-group {
            display: flex;
            justify-content: space-between;
        }

        #border-img {
            border-radius: 10px;
        }

        .small-img-col {
            flex-basis: 25%;
            cursor: pointer;
            margin: 2px;
        }

        .small-img-col img {
            border-radius: 5px;
        }

        #text-card,
        h2,
        h3 {
            color: aqua;

        }

        #text-card h6 {
            color: white;
        }

        h4 {
            color: white;
            font-weight: bolder;
        }

        span {
            color: white;
        }

        .sproduct select {
            display: block;
            padding: 5px 10px;
        }

        #buy-btn {
            background-color: rgb(8, 204, 204);
            color: white;
            font-weight: bolder;
            opacity: 1;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 13px;
            padding-right: 13px;
            outline: none;
            border: none;
            border-radius: 10px;
        }

        .responsive {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div id="preloader"></div>
    <section class="container sproduct my-5 pt-0">
        <div class="row mt-5">
            <div class="col-lg-5 col-md-12 col-12">
                <img src="./assets/subProduct_img/<?= htmlspecialchars($product_details['image']) ?>" alt="" class="img-fluid w-100 pb-1" id="border-img">
            </div>

            <div class="col-lg-7 col-md-11 col-12 responsive " id="text-card">
                <span style="font-weight: bolder; font-size: larger;"><?= htmlspecialchars($row['name']) ?><h2><?= htmlspecialchars($product_details['unit_size']) ?></h2></span>
        <h3 class="py-3"><i class="fa-solid fa-indian-rupee-sign" id="fa-solid"><?= htmlspecialchars($product_details['price']) ?></i></h3>
        <select name="quantity" class="my-3">
            <option>Box Qty:</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>

        <button id="buy-btn">Buy Now</button>
        <h4 class="mt-5 mb-2">
            Product Details :-
        </h4>
        <span>The love story between <?= htmlspecialchars($row['name']) ?> and India began in 1985. Today, <?= htmlspecialchars($row['name']) ?> rules the hearts of millions of mango lovers around the world. Just a swig of the rich and juicy <?= htmlspecialchars($row['name']) ?> is akin to the joyful experience of slurping on the real king of fruits. Made with real mango pulp from the freshest of mangoes, <?= htmlspecialchars($row['name']) ?>  satisfies the craving for this popular seasonal fruit throughout the year. </span>
            </div>
        </div>
    </section>

    <!--Footer Section-->
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
                    <li><a href="parleagro.html">Parle Agro</a></li>
                    <li><a href="priyagold.html">Priya Gold</a></li>
                    <li><a href="veeba.html">Veeba</a></li>
                    <li><a href="hershey.html">Hershey's</a></li>
                    <li><a href="orionchocopie.html">Orion</a></li>
                    <li><a href="mali.html">Mali</a></li>
                    <li><a href="malkist.html">Malkist</a></li>
                    <li><a href="TGB.html">TGB</a></li>
                </ul>
            </div>
            <div class="sec Contact">
                <h3><span class="aqua">C</span>ONTACT U<span class="aqua">S</span></h3>
                <ul class="info">
                    <li>
                        <span><i class="fa-solid fa-phone"></i></span>
                        <p><a href="tel:91+9510908240">9510908240</a></p>
                    </li>

                    <li>
                        <span><i class="fa-solid fa-envelope"></i></span>
                        <p><a href="mailto:Mdev024@gmail.com">Mdev024@gmail.com</a></p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="copyrightText">
            <p>Copyright 2023 Online Tutorials. All Rights Reserved.</p>
        </div>
    </footer>

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
                        <li><a class="dropdown-item" href="mali.html">Mali</a></li>
                        <li><a class="dropdown-item" href="malkist.html">Malkist</a></li>
                        <li><a class="dropdown-item" href="tiku.html">Tikku</a></li>
                        <li><a class="dropdown-item" href="TGB.html">TGB</a></li>
                    </ul>
                </div>
                <!-- Home button -->
                <a href="index.html" class="home"><i class="ri-home-3-line"></i></a>
                <!-- up Side button -->
                <a href="frooti.html" class="up"><i class="ri-arrow-left-line"></i></a>
            </span>
        </div>
    </footer>



    <!--Java Script Section For Side NavBar and Loader-->
    <script>
        var navlinks = document.getElementById("nav-links");

        function showmenu() {
            navlinks.style.right = "0";
        }

        function hidemenu() {
            navlinks.style.right = "-400px";
        }

        var loader = document.getElementById("preloader");

        window.addEventListener("load", function() {
            loader.style.display = "none";
        });
    </script>
</body>

</html>