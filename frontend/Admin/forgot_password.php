

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Add specific styles for the login form here, or in your main CSS file */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: black; /* Ensure the body background is black */
            font-family: 'Inter', sans-serif; /* Using Inter font */
            margin: 0; /* Remove default body margin */
            overflow-x: none;
            overflow-y: none;
        }

        .login-container { /* Renamed to forgot-password-container for clarity in this context, but keeping original class for styling */
            background-color: #141414; /* Dark background similar to .card */
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 0 80px rgba(0, 255, 255, 0.5); /* Aqua glow */
            width: 350px;
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
        .input-group input[type="password"] {
            width: calc(100% - 20px); /* Account for padding */
            padding: 12px 10px;
            background-color: #333; /* Darker input background */
            border: 1px solid aqua; /* Aqua border */
            border-radius: 8px;
            color: white;
            font-size: 1em;
            outline: none; /* Remove default outline */
        }

        .input-group input[type="text"]:focus,
        .input-group input[type="password"]:focus {
            box-shadow: 0 0 8px aqua; /* Aqua focus glow */
        }

        .login-btn { /* Renamed to reset-password-btn for clarity in this context, but keeping original class for styling */
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

        .forgot-password { /* Used for back to login link */
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
                font-size: unset; /* Reset to allow default sizing */
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Forgot Password</h2>
        <form id="forgotPasswordForm">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="new-password">New Password</label>
                <input type="password" id="new-password" name="new-password" required>
            </div>
            <div class="input-group">
                <label for="re-enter-password">Re-Enter Password</label>
                <input type="password" id="re-enter-password" name="re-enter-password" required>
            </div>
            <button type="submit" class="login-btn">Reset Password</button>
        </form>
        <div class="forgot-password">
            <a href="Admin_login.php">Back to Login</a>
        </div>

    </div>

   
</body>
</html>
