<?php
ob_start();
require './conn.php';
include "../../Comman_pages/navbar.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();

        if ($password == $admin['password']) {
            $_SESSION['Admin_name'] = $admin['username'];
            header("Location:index.php");
            exit;
        } else {
            echo "<script>alert('Invalid Password!')</script>";
        }
    } else {
        echo "<script>alert('Admin Not Found..!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- JavaScript Bootstrep Link's -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <!-- Css Bootstrep Link's -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="./style.css">
    <style>
        /* Add specific styles for the login form here, or in your main CSS file */


        .login-container {
            background-color: #141414;
            /* Dark background similar to .card */
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 0 80px rgba(0, 255, 255, 0.5);
            /* Aqua glow */
            width: 350px;
            text-align: center;
            margin-top: 60px;
        }

        .login-container h2 {
            color: aqua;
            /* Aqua heading */
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 2.5vw;
            /* Adjust as needed for responsiveness */
            margin-bottom: 30px;
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
        .input-group input[type="password"] {
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
        .input-group input[type="password"]:focus {
            box-shadow: 0 0 8px aqua;
            /* Aqua focus glow */
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

            .input-group label,
            .input-group input,
            .login-btn,
            .forgot-password a {
                font-size: unset;
                /* Reset to allow default sizing */
            }
        }
    </style>
    <script>
        document.addEventListener("contextmenu", function(e) {
            e.preventDefault();
        });
    </script>
</head>

<body>
    
    <center>
        <div class="login-container">
            <h2>Welcome Back!</h2>
            <form action="#" method="post">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
                <div class="forgot-password">
                    <a href="forgot_password.php">Forgot Password?</a>
                </div>
            </form>
        </div>
    </center>
</body>

</html>
<?php
ob_end_flush();
?>