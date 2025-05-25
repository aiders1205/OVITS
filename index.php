<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="manifest" href="images/site.webmanifest">
    <link rel="icon" type="image/png" sizes="192x192" href="images/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="images/android-chrome-512x512.png">
    <meta name="theme-color" content="#ffffff">
</head>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: url('Images/background.png');
    background-size: cover;
    background-repeat: no-repeat;
    }

    .container {
    border-radius: 1px;
    padding: 50px 40px 20px 40px;
    font-family: sans-serif;
    color: #737373;
    border: 1px solid rgb(219, 219, 219);
    text-align: center;
    background: white;
    width: 50%;
    max-width: 400px; /* Set maximum width for better responsiveness */
    border-radius: 15px;
    }

    .content__form {
    display: flex;
    flex-direction: column;
    row-gap: 14px;
    }

    .content__inputs {
    display: flex;
    flex-direction: column;
    row-gap: 8px;
    }

    .content__form label {
    border: 1px solid rgb(219, 219, 219);
    display: flex;
    align-items: center;
    position: relative;
    min-width: 268px;
    height: 38px;
    background: rgb(250, 250, 250);
    border-radius: 3px;
    }

    .content__form span {
    position: absolute;
    text-overflow: ellipsis;
    transform-origin: left;
    font-size: 12px;
    left: 8px;
    pointer-events: none;
    transition: transform ease-out .1s;
    }

    .content__form input {
    width: 100%;
    background: inherit;
    border: 0;
    outline: none;
    padding: 9px 8px 7px 8px;
    text-overflow: ellipsis;
    font-size: 16px;
    vertical-align: middle;
    }

    .content__form input:valid+span {
    transform: scale(calc(10 / 12)) translateY(-10px);
    }

    .content__form input:valid {
    padding: 14px 0 2px 8px;
    font-size: 12px;
    }

    .content__form button {
    background: rgb(0, 149, 246);
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: 700;
    font-size: 14px;
    padding: 7px 16px;
    cursor: pointer;
    }

    .content__form button:hover {
    background: rgb(24, 119, 242);
    }

    .content__form button:active:not(:hover) {
    background: rgb(0, 149, 246);
    opacity: .7;
    }

    .incorrect-info-warning {
    color: red;
    font-size: 12px;
    margin-top: 5px;
    }

    .form-title {
    color: #111c4e; /* Silver white text */
    font-family: 'Times New Roman', Times, serif; /* Times New Roman font */
    font-size: 30px;
    font-weight: bold;
    margin: 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    margin-bottom: 30px;
    }
</style>

<body>
    <?php include_once 'header.php';?>
    <div class="background-image"></div>
    <div class="container">
        <p class="form-title">ONLINE VEHICLE IDENTIFICATION AND TRACKING SYSTEM</p>
        <div class="content">
            <form class="content__form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="content__inputs">
                    <label>
                        <input required="" type="text" name="studentId">
                        <span>Student ID</span>
                    </label>
                    <label>
                        <input required="" type="password" name="password">
                        <span>Password</span>
                    </label>
                </div>
                <button type="submit">Sign In</button>
                <?php
                if (isset($incorrect_info_warning)) {
                    // Show warning message if credentials are incorrect
                    echo "<div class='incorrect-info-warning'>$incorrect_info_warning</div>";
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>