<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Marcellus&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

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
            background-color: #111C4E;
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
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .header-main-title a:hover {
            color: #f5d328;
        }

        .header-title {
            color: #f5d328;
            font-size: 0.8rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
        }

        .combined-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: auto;
            margin-right: 20px;
        }

        .dropdown {
            position: relative;
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

        .logout {
            background: #FF4742;
            border: 1px solid #FF4742;
            border-radius: 6px;
            box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: nunito, roboto, proxima-nova, "proxima nova", sans-serif;
            font-size: 16px;
            font-weight: 800;
            line-height: 16px;
            min-height: 40px;
            outline: 0;
            padding: 12px 14px;
            text-align: center;
            text-rendering: geometricprecision;
            text-transform: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;
            margin: 15px;
            white-space: nowrap;
            text-decoration: none;
        }

        .logout:hover,
        .logout:active {
            background-color: initial;
            background-position: 0 0;
            color: #FF4742;
        }

        .logout:active {
            opacity: .5;
        }

        .header-main-title a {
            text-decoration: none;
            color: inherit;
        }

        .header-main-title a:hover {
            text-decoration: none;
        }
    </style>
</head>
<body>

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

    <div class="combined-buttons">
        <div class="dropdown">
            <a href="archive.php">
                <button class="dropdown-btn">ARCHIVE</button>
            </a>
        </div>
        <div class="dropdown">
            <a href="delete-history.php">
                <button class="dropdown-btn">REJECT HISTORY</button>
            </a>
        </div>
    </div>

    <div>
        <a href="logout.php" class="logout">Log Out</a>
    </div>
</header>

</body>
