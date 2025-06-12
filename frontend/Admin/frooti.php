<?php
require './conn.php';
include '../../Comman_pages/navbar.php';
if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['cat_name'])) {
    $cat_name = strval($_GET['cat_name']);
} else {
    echo "<script>alert('ID' was no set'); window.location.href='index.php'</script>";
}

$sql1 = "SELECT * FROM product WHERE name = ?";
$stmt = $conn->prepare($sql1);
$stmt->bind_param('s', $cat_name);
$stmt->execute();
$res = $stmt->get_result();
$row2 = $res->fetch_assoc();
$id = $row2['id'] ?? 0;

$sql = "SELECT * FROM sub_product WHERE category_id = ?";
$stmt2 = $conn->prepare($sql);
$stmt2->bind_param('i', $id);
$stmt2->execute();
$res2 = $stmt2->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>

    <div class="hero2">

        <div id="preloader"></div>


        <body>
            <!-- Navigation -->
    </div>
    </div>

    <div class="product-heading">
        <b> <?= $row2['name'] ?> </b>
    </div>
    <center>
    <div class="card-center" style="display:inline-block; ">
        <?php
        if ($res2->num_rows > 0):
            while ($row = $res2->fetch_assoc()): ?>

                
                    <div class="card" style="width: 20rem; height: 24rem;" style=" margin-top:40px;">
                        <a href="product1.php?unit_size=<?=  htmlspecialchars($row['unit_size']) ?>&cat_id=<?= htmlspecialchars($row['category_id']) ?>">
                            <div class="img-wrraper">
                                <img src="assets/subProduct_img/<?= $row['image'] ?>" class="card-img" alt="...">
                        </a>
                    </div>
                     <a href="product1.php?unit_size=<?=  htmlspecialchars($row['unit_size']) ?>&cat_id=<?= htmlspecialchars($row['category_id']) ?>">
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="aqua"><?= $row2['name'] ?> <span class="aqua"><?= $row['unit_size'] ?></span>
                        </h5>
                        <div class="price"><i class="fa-solid fa-indian-rupee-sign" id="fa-solid"><?= $row['price'] ?></i></div>            
                      </a>
                       <span class="aqua" style="background-color: aqua; color: white; padding: 5px; border-radius: 8px;">Add to cart</span>
            </div>
    </div>

<?php
            endwhile;
        endif;
?>
</center>

<!-- Bottom Navigation -->
<div class="footer-nav-center">
    <footer class="footer mt-auto py-3 bg-black" id="bottomnav">
        <div class="container">
            <span class="text-muted" id="center-icon">
                <div class="dropup dropup">
                    <button class="btn btn-secondary dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
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
                <a href="parleagro.html" class="up"><i class="ri-arrow-left-line"></i></i></a>
            </span>
        </div>
    </footer>
</div>

<!--Java Script Section For Side NavBar and Loader-->
<script>
    var loader = document.getElementById("preloader");

    window.addEventListener("load", function() {
        loader.style.display = "none";
    });
</script>
<script src="index.js"></script>


<script>
    var items = document.querySelectorAll('.carousel .carousel-item');
    items = forEach((e) => {
        const slide = 4;
        let next = e.nextElementSibling;
        for (var i = 0; i < slide; i++) {
            if (!next) {
                next = items[0];
            }
            let clonechild = next.cloneNode(true)
            e.appendchild(clonechild.children[0])
            next = next.nextElementSibling
        }
    });
</script>



</body>

</html>