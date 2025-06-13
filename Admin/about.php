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
    <link rel="stylesheet" href="./css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css "
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>

    <div id="preloader"></div>

   

        <!-- Navigation -->
        


        <!--Main Gif Section-->
        <div class="gif">

            <!--Main Welcome Heading Section-->
            <div class="heading">
              <h1 class="aqua">Hello! <br>
                  <span class="white">Welcome to </span><br>
                  Dev Distributors
              </h1>
            </div>
            </div>
            </div>

    <section>
        <div class="headeing">
            <h2 class="b" id="b"> About Us </h2>
            <div class="Story"> <br> At Dev Distributors, we are dedicated to delivering excellence in distribution. Our
                mission is to connect manufacturers with retailers, ensuring that quality products reach the hands of
                consumers seamlessly and efficiently. With a passion for precision and a commitment to customer
                satisfaction, we have established ourselves as a trusted partner in the world of distribution.
            </div><br>
            <div class="Story">
                <span class="red">O</span>ur Story:<br> <br>
                Dev Distributors was established by Manoj Bhai Trivedi in year of 2000. It all started with a vision of
                bridging the gap between manufacturers and retailers, streamlining the distribution process to benefit
                both parties. Over the years, our dedication to this vision has grown, and we have expanded our reach to
                serve customers at porbanadar.

            </div>
            <div class="Story">
                <br><span class="red">O</span>ur Services:<br><br>
                At Dev Distributors, we offer a comprehensive range of distribution services, including:
                Warehousing and Inventory Management:
                We provide secure warehousing facilities and efficient inventory management to ensure products are
                readily available for shipment.
                <br>
                <br><span class="red">O</span>rder Fulfillment:<br><br>
                We handle order processing, packing, and shipping, allowing manufacturers and retailers to focus on
                their core business activities.
                <br>

                <br><span class="red">Q</span>uality Control:<br><br>
                Rigorous quality checks are conducted at every stage of the distribution process to maintain product
                integrity.
                <br>

                <br><span class="red">W</span>hy Choose Dev Distributors?<br><br>
                <span class="red">Experience:</span>
                With 23 years in the Distribution Field, we have the experience and knowledge needed to deliver
                outstanding distribution services.
                <br><br>
                <span class="red">Reliability:</span>
                We take pride in our reputation for reliability, ensuring that your products reach their destination on
                time, every time.
                <br><br>
                <span class="red">Innovation:</span>
                Dev Distributors is committed to staying ahead of industry trends, using cutting-edge technology to
                improve our services continually.
                <br><br>
                <br>
                <span class="red">C</span>ontact Us<br><br>
                Ready to streamline your distribution process? Reach out to Dev Distributors today to learn how we can
                help you achieve your distribution goals. Our team is always here to assist you.<br>
                <br>
                Thank you for choosing DEV DISTRIBUTOR, where love, tradition, and innovation come together to
                Services the perfect Distribution experience.<br><br>
            </div>
        </div>
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
                    <?php
                        $res = $conn->query($sql);
                        if ($res):
                            while ($row = mysqli_fetch_assoc($res)):
                    ?>
                                <li><a href="#"><?= htmlspecialchars($row['company_name']) ?></a></li>
                    <?php endwhile;
                        endif;
                    ?>
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
            <p>All Copy Rights Reserved in &copy; <script>
                    document.write(new Date().getFullYear());
                </script>
            </p>
        </div>
    </footer>
      
         <!-- Bottom Navigation -->
    <footer class="footer mt-auto py-3 bg-black" id="bottomnav">
        <div class="container">
            <span class="text-muted" id="center-icon">
                <div class="dropup dropup">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
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
                <!-- Home button -->
                <a href="index.html" class="home"><i class="ri-home-3-line"></i></a>
                <!-- up Side button -->
                <a href="#" class="up"><i class="ri-arrow-up-line"></i></a>
            </span>
        </div>
    </footer>

   


</body>

</html>