<?php
include 'conn.php';
include '../../Comman_pages/navbar.php';
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['regbtn'])) {

    $shopname = $_POST['shopName'];
    $name = $_POST['name'];
    $phone_no = $_POST['phoneNo'];
    $area_name = $_POST['areaName'];
    $shop_add = $_POST['shopAddress'];
    $password = $_POST['password'];
    $approve_status = 'pending';

    // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $check_sql = "SELECT * FROM distributors WHERE phone_no = ? ";
    $stmt_test = $conn->prepare($check_sql);
    $stmt_test->bind_param('i', $phone_no);
    $stmt_test->execute();
    $result = $stmt_test->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('This phone number is already exists !')</script>";
    } else {
        $sql = "INSERT INTO distributors (distributor_name,shop_name,phone_no,shop_add,area_name,password,approve_status) VALUES (?,?,?,?,?,?,?) ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssissss', $name, $shopname, $phone_no, $shop_add, $area_name, $password, $approve_status);

        if ($stmt->execute()) {
            echo "<script>alert('registartion sucessfully')</script>";
        } else {
            echo "<script>alert('something went wrong here')</script>";
        }
    }

    // if ($phone_no !== $result) {


    //     $sql = "INSERT INTO distributors (distributor_name,shop_name,phone_no,shop_add,area_name,password,approve_status) VALUES (?,?,?,?,?,?,?) ";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bind_param('ssissss', $name, $shopname, $phone_no, $shop_add, $area_name, $hashed_password, $approve_status);

    //     if ($stmt->execute()) {
    //         echo "<script>alert('registartion sucessfully')</script>";
    //     } else {
    //         echo "<script>alert('something went wrong here')</script>";
    //     }
    // } else {

    //     echo "<script>alert('This phone number is already exists !')</script>";
    // }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <style>
        .product-form-container {
            background: #141414;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 20px cyan;
            width: 450px;
            text-align: center;
        }

        .company-name {
            color: white;
            font-size: 1.8em;
            margin-bottom: 20px;
        }

        h2 {
            color: aqua;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            color: white;
            display: block;
            margin-bottom: 8px;
        }

        .input-group input,
        .input-group select {
            width: 95%;
            padding: 10px;
            background: #333;
            border: 1px solid aqua;
            border-radius: 8px;
            color: white;
            font-size: 1em;
        }

        input[type="file"]::file-selector-button {
            background: aqua;
            color: black;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn {
            background: aqua;
            color: black;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 1.2em;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #00ffff;
        }

        select option {
            background: #333;
            color: white;
        }
    </style>
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
    <center>
        <div class="product-form-container">
            <div class="company-name">Welcome! To Dev Distributor</div>
            <h2>Shop Registration</h2><br>
            <form action="#" method="POST">
                <div class="input-group">
                    <label for="shopName">Shop Name</label>
                    <input type="text" id="shopName" name="shopName" required>
                </div>
                <div class="input-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="phoneNo">Phone Number</label>
                    <input type="tel" id="phoneNo" name="phoneNo" pattern="[0-9]{10}" placeholder="e.g., 9876543210" required>
                </div>
                <div class="input-group">
                    <label for="areaName">Area Name</label>
                    <input type="text" id="areaName" name="areaName" required>
                </div>
                <div class="input-group">
                    <label for="shopAddress">Shop Address</label>
                    <input type="text" id="shopAddress" name="shopAddress" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="submit-btn" name="regbtn">Register Shop</button>
            </form>
        </div>
    </center>
</body>

</html>