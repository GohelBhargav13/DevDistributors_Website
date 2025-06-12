<?php
include '../../Comman_pages/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Your Shop</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
       

        .login-container { /* Reused for registration container */
            background-color: #141414; /* Dark background similar to .card */
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 0 80px rgba(0, 255, 255, 0.5); /* Aqua glow */
            width: 400px; /* Slightly wider for more fields */
            text-align: center;
            position: relative; /* For message box positioning */
        }

        .login-container h2 {
            color: aqua; /* Aqua heading */
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 2.5vw; /* Adjust as needed for responsiveness */
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
        .input-group input[type="email"],
        .input-group input[type="tel"],
        .input-group textarea { /* Added textarea for shop address */
            width: calc(100% - 20px); /* Account for padding */
            padding: 12px 10px;
            background-color: #333; /* Darker input background */
            border: 1px solid aqua; /* Aqua border */
            border-radius: 8px;
            color: white;
            font-size: 1em;
            outline: none; /* Remove default outline */
            resize: vertical; /* Allow vertical resizing for textarea */
            min-height: 30px; /* Minimum height for textarea */
        }

        .input-group input[type="text"]:focus,
        .input-group input[type="email"]:focus,
        .input-group input[type="tel"]:focus,
        .input-group textarea:focus {
            box-shadow: 0 0 8px aqua; /* Aqua focus glow */
        }

        .login-btn { /* Reused for register button */
            background-color: aqua;
            color: black;
            border: none;
            padding: 15px 30px;
            border-radius: 25px; /* Similar to product box buttons */
            font-size: 1.2em;
            font-weight: bold;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #00ffff; /* Lighter aqua on hover */
            color: #333;
        }

        .forgot-password { /* Reused for back to login link */
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

        /* Message Box Styles */
        .message-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #222;
            border: 1px solid aqua;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.7);
            color: white;
            z-index: 1000;
            display: none; /* Hidden by default */
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            width: 80%;
            max-width: 300px;
        }

        .message-box p {
            margin: 0 0 15px 0;
            font-size: 1.1em;
        }

        .message-box button {
            background-color: aqua;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .message-box button:hover {
            background-color: #00ffff;
        }

        /* Responsive adjustments */
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
            .input-group textarea,
            .login-btn,
            .forgot-password a {
                font-size: unset; /* Reset to allow default sizing */
            }
        }
    </style>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Register Your Shop</h2>
        <form id="registerShopForm">
            <div class="input-group">
                <label for="shop-name">Shop Name</label>
                <input type="text" id="shop-name" name="shop-name" placeholder="Enter Your Shop Name" required>
            </div>
            <div class="input-group">
                <label for="your-name">Your Name</label>
                <input type="text" id="your-name" name="your-name" placeholder="Enter Your Name" required>
            </div>
            <div class="input-group">
                <label for="mobile-no">Mobile No.</label>
                <input type="tel" id="mobile-no" name="mobile-no" pattern="[0-9]{10}" placeholder="Please enter a 10-digit Mobile Number" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
            </div>
            <div class="input-group">
                <label for="shop-address">Shop Address</label>
                <textarea id="shop-address" name="shop-address" rows="4" placeholder="Enter Your Shop Address" required></textarea>
            </div>
            <button type="submit" class="login-btn">Register</button>
        </form>
        <div class="forgot-password">
            <a href="#">Back to Login</a>
        </div>

     
    </div>

   
</body>
</html>
