<?php
require './conn.php';
include '../../Comman_pages/navbar.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $company_name = $_POST['comname'];

    $folder = "assets/company_img";
    $com_img = $_FILES['image']['name'];
    $temp_img = $_FILES['image']['tmp_name'];

    $targetfile = $folder . basename($com_img);


    if (move_uploaded_file($temp_img, $targetfile)) {

        $sql = "INSERT INTO company (company_name,image) VALUES (? , ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $company_name, $com_img);

        if ($stmt->execute()) {
            $company_id = $conn->insert_id;
            echo "<script>alert('Company added sucessfully...')</script>";
        } else {
            echo "Error :" . $conn->error;
        }
    } else {
        echo "Failed to upload image";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Login</title>
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
    <style>
        /* Add specific styles for the login form here, or in your main CSS file */

        .login-container {
            background-color: #141414;
            /* Dark background similar to .card */
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
            /* Aqua glow */
            width: 350px;
            text-align: center;
        }

        .login-container h2 {
            color: aqua;
            /* Aqua heading */
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 2.5vw;
            /* Adjust as needed for responsiveness */
            margin-bottom: 30px;
        }

        .company-name {
            color: white;
            /* Color for the company name */
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 1.8em;
            /* Adjust as needed */
            margin-bottom: 20px;
            /* Space below the company name */
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            color: white;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-bottom: 8px;
            font-size: 1.1em;
        }

        .input-group input[type="text"],
        .input-group input[type="password"],
        .input-group input[type="file"] {
            /* Added file input */
            width: calc(100% - 20px);
            /* Account for padding */
            padding: 12px 10px;
            background-color: #333;
            /* Darker input background */
            border: 1px solid aqua;
            /* Aqua border */
            border-radius: 8px;
            color: white;
            font-size: 1em;
            outline: none;
            /* Remove default outline */
        }

        .input-group input[type="text"]:focus,
        .input-group input[type="password"]:focus,
        .input-group input[type="file"]:focus {
            /* Added file input focus */
            box-shadow: 0 0 8px aqua;
            /* Aqua focus glow */
        }

        /* Style for the file input button, as it's browser-dependent */
        .input-group input[type="file"]::file-selector-button {
            background-color: aqua;
            color: black;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .input-group input[type="file"]::file-selector-button:hover {
            background-color: #00ffff;
        }


        .login-btn {
            background-color: aqua;
            color: black;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            /* Similar to product box buttons */
            font-size: 1.2em;
            font-weight: bold;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #00ffff;
            /* Lighter aqua on hover */
            color: #333;
        }

        .forgot-password {
            margin-top: 15px;
        }

        .forgot-password a {
            color: aqua;
            text-decoration: none;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 0.95em;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: white;
        }

        /* Responsive adjustments for the login form */
        @media (max-width: 768px) {
            .login-container {
                width: 90%;
                padding: 30px;
            }

            .login-container h2 {
                font-size: 8vw;
            }

            .company-name {
                font-size: 6vw;
                /* Adjust for smaller screens */
            }

            .input-group label,
            .input-group input,
            .login-btn,
            .forgot-password a {
                font-size: unset;
                /* Reset to allow default sizing */
            }
        }
    </style>
</head>

<body>
    <center>
        <div class="login-container">
            <div class="company-name">Your Awesome Company</div>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="username">Company name:</label>
                    <input type="text" id="comname" name="comname" required>
                </div>
                <div class="input-group">
                    <label for="file-upload">Upload File:</label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
                <button type="submit" class="login-btn">Submit</button>
            </form>
        </div>
    </center>
</body>

</html>