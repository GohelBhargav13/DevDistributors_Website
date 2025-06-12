<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$sql = 'SELECT * FROM company';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-#17141d">
        <div class="container-fluid">
            <a class='navbar-brand text-light' href='http://localhost/DevDistributers/frontend/Admin/index.php'><span class="aqua">D</span>EV DISTRIBUTO<span
                    class="aqua">R</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a aria-current='page' class='nav-link active text-light' href='http://localhost/DevDistributers/frontend/Admin/index.php'><span
                                class="aqua">H</span>ome</a>
                    </li>

                    <?php if (isset($_SESSION['Admin_name'])) { ?>

                        <li class="nav-item">
                            <a aria-current='page' class='nav-link active text-light' href='http://localhost/DevDistributers/Distributors/approve_request.php'><span
                                    class="aqua">Approve</span><sup><?= $_SESSION['count'] ?? 0;
                                                                    unset($_SESSION['count']); ?></sup></a>
                        </li>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if (isset($_SESSION['Admin_name'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">

                                <span class="aqua">O</span>ption's
                            </a>

                        <?php } ?>
                        <ul class="dropdown-menu text-light" aria-labelledby="navbarDropdownMenuLink">
                            <?php if (isset($_SESSION['Admin_name'])) { ?>
                                <li><a class='dropdown-item' href='./Add_company.php'>Add company</a></li>
                                <li><a class='dropdown-item' href='./Add_product.php'>Add Product</a></li>
                                <li><a class='dropdown-item' href='http://localhost/DevDistributers/frontend/Admin/Add_subProducts.php#'>Add subProduct</a></li>
                                <li><a class='dropdown-item' href='http://localhost/DevDistributers/Distributors/approve_list.php'>User's List</a></li>
                            <?php } else { ?>
                                <li></li>

                            <?php } ?>


                        </ul>
                        </li>
                        <?php if (isset($_SESSION['Admin_name']) || isset($_SESSION['user_username'])) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">

                                    <span class="aqua">C</span>ompany's
                                </a>

                            <?php } ?>
                            <ul class="dropdown-menu text-light" aria-labelledby="navbarDropdownMenuLink">
                                <?php if (isset($_SESSION['Admin_name']) || isset($_SESSION['user_username'])) { ?>

                                    <?php
                                    $res = $conn->query($sql);
                                    if ($res):
                                        while ($row = mysqli_fetch_assoc($res)):
                                    ?>

                                            <li><a class="dropdown" href="./company.php?company_name=<?= $row['company_name'] ?>">
                                                    <?= htmlspecialchars($row['company_name']) ?></a></li>
                                    <?php endwhile;
                                    endif;
                                    ?>

                                <?php } else { ?>
                                    <li></li>

                                <?php } ?>


                            </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="about.php"><span class="aqua">A</span>bout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="contect.html"><span class="aqua">C</span>ontact</a>
                            </li>
                            <?php if (isset($_SESSION['Admin_name'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="http://localhost/DevDistributers/frontend/Admin/logout.php"><span class="aqua">Logout</a>
                                </li>


                            <?php } else { ?>

                            <?php } ?>
                            <?php if (isset($_SESSION['user_username'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="http://localhost/DevDistributers/frontend/Admin/logout.php"><span class="aqua">Logout</a>
                                </li>
                            <?php } else { ?>

                            <?php } ?>



                            <?php if (!isset($_SESSION['Admin_name']) && !isset($_SESSION['user_username'])) { ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="aqua">L</span>ogin
                                    </a>


                                    <ul class="dropdown-menu text-light" aria-labelledby="navbarDropdownMenuLink">

                                        <li><a class='dropdown-item' href='./Admin_login.php'>As a Admin</a></li>
                                        <li><a class='dropdown-item' href='distributors_login.php'>As a User</a></li>
                                    </ul>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="distributors_register.php"><span class="aqua">User Sign Up</a>
                                </li>
                                </li>
                            <?php } else {
                            } ?>


                </ul>
            </div>
        </div>
    </nav>

</body>

</html>