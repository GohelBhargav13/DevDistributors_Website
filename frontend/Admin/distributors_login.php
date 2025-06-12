<?php
ob_start();
require './conn.php';
include "../../Comman_pages/navbar.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['login'])) {
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM distributors WHERE phone_no = ? AND approve_status = 'accepted' ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $phone_no);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if ($password === $user['password']) {
            $_SESSION['name'] = $user['distributor_name'];
            
            $_SESSION['user_username'] = $user['phone_no']; // Or 'username' if exists
            echo "<script>alert('Login Sucessfull..!'); </script>" ;
            header("Location:index.php");
            exit;
        } else {
            echo "<script>alert('Invalid Password!');</script>";
        }
    } else {
        echo "<script>alert('Admin Not Found..!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        /* Same CSS from your original code */
        .login-container {
            background-color: #141414;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 0 80px rgba(0, 255, 255, 0.5);
            width: 350px;
            text-align: center;
            margin-top: 30px;
        }

        .login-container h2 {
            color: aqua;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 2.5vw;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            color: white;
            margin-bottom: 8px;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            background-color: #333;
            border: 1px solid aqua;
            border-radius: 8px;
            color: white;
            font-size: 1em;
            outline: none;
        }

        .input-group input:focus {
            box-shadow: 0 0 8px aqua;
        }

        .login-btn {
            background-color: aqua;
            color: black;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 1.2em;
            font-weight: bold;
            cursor: pointer;
        }

        .login-btn:hover {
            background-color: #00ffff;
            color: #333;
        }

        .forgot-password {
            margin-top: 15px;
        }

        .forgot-password a {
            color: aqua;
            text-decoration: none;
        }

        .forgot-password a:hover {
            color: white;
        }

        h3 {
            color: white;
            font-weight: bold;
            font-size: 30px;
        }

        @media (max-width: 768px) {
            .login-container {
                width: 90%;
                padding: 30px;
            }

            .login-container h2 {
                font-size: 8vw;
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
            <span style="color: white; font-weight: bold; font-size: 25px;">Hello! User</span><br>
            <span style="color: aqua; font-weight: bold; font-size: 30px;">Welcome Back!</span><br>
            <span style="color: white; font-weight: bold; font-size: 20px;">Dev Distributors</span>
            <form action="#" method="post">
                <div class="input-group">
                    <label for="phone_no">phone_no</label>
                    <input type="text" id="phone_no" name="phone_no" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-btn" name="login">Login</button>
                <div class="forgot-password">
                    <a href="forgot_password.php">Forgot Password?</a>
                </div>
            </form>
        </div>
    </center>
</body>

</html>
<?php ob_end_flush(); ?>