<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<head>
    <style>
        /* (CSS unchanged from your original) */
        @import url('https://fonts.googleapis.com/css2?family=Marcellus&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #111C4E;
            padding-top: 90px;
            overflow-x: hidden;
        }
        header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9999;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to bottom, rgba(184, 211, 255, 0.6), rgba(255, 255, 255, 0));
        }
        .header-top {
            display: flex;
            align-items: center;
        }
        .header-logo img {
            height: 7vh;
            margin-right: 10px;
        }
        .header-title-group {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }
        .header-main-title a {
            font-family: 'Marcellus', serif;
            font-size: 1.5rem;
            font-weight: lighter;
            color: #ffffff;
            text-decoration: none;
        }
        .header-main-title a:hover { color: #d0d0d0; }
        .header-title {
            color: #f5d328;
            font-size: 0.8rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
        }
        .dropdown-container {
            display: flex;
            align-items: center;
            margin-left: auto;
            margin-right: 10px;
        }
        .dropdown {
            position: relative;
            margin: 0 10px;
        }
        .dropdown-btn {
            background-color: transparent;
            color: #ffffff;
            padding: 12px;
            font-size: 0.9rem;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        .dropdown-btn:hover {
            color: #9b9b9b;
            transform: scale(1.1);
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #1c2241;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            top: 100%;
        }
        .dropdown-content a {
            color: #d9d9d9;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 0.85rem;
            font-family: 'Poppins', sans-serif;
        }
        .dropdown-content a:hover {
            background-color: #2c3050;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .sign-in {
            background: #f5ec3a;
            border: 1px solid #ffffff;
            border-radius: 6px;
            color: #000000;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            font-weight: 800;
            padding: 10px 14px;
            margin-left: 5px;
            margin-right: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
            white-space: nowrap;
        }
        .sign-in:hover {
            background-color: transparent;
            color: #000000;
            border-color: #ffffff;
        }
    </style>
</head>

<header>
    <div class="header-top">
        <div class="header-logo">
            <img src="images/image.png" alt="Logo" loading="lazy" />
        </div>
        <div class="header-title-group">
            <p class="header-main-title"><a href="home.php">UNIVERSITY OF MAKATI</a></p>
            <p class="header-title">ONLINE VEHICLE IDENTIFICATION AND TRACKING SYSTEM</p>
        </div>
    </div>

    <div class="dropdown-container">
        <div class="dropdown">
            <button class="dropdown-btn">ABOUT</button>
            <div class="dropdown-content">
                <a href="aboutus.php">About Us</a>
                <a href="home.php">Home</a>
                <a href="policies.php">Policies</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropdown-btn">APPLY NOW</button>
            <div class="dropdown-content">
                <a href="applynow.php">APPLY NOW</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropdown-btn">HELP</button>
            <div class="dropdown-content">
                <a href="helpsupport.php">Contact Us</a>
            </div>
        </div>
    </div>

    <div>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="logout.php">
                <button class="sign-in">Log Out</button>
            </a>
        <?php else: ?>
            <a href="login.php">
                <button class="sign-in">Sign In</button>
            </a>
        <?php endif; ?>
    </div>
</header>
