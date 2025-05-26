<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us - OVITS</title>
    <link rel="stylesheet" href="stylesheets/aboutus.css" />
    <link rel="stylesheet" href="stylesheets/ovits.css" />
    <link rel="manifest" href="images/site.webmanifest" />
    <link rel="icon" type="image/png" sizes="192x192" href="images/android-chrome-192x192.png" />
    <link rel="icon" type="image/png" sizes="512x512" href="images/android-chrome-512x512.png" />
    <meta name="theme-color" content="#ffffff" />
</head>
<body>
<?php include("header.php"); ?>
        <div class="main-content">
        <main>
            <!-- About Us Section -->
            <section class="about">
                <h2 class="line-below">About Us</h2>
                <p>
                    The Online Vehicle Identification and Tracking System (OVITS) is a program under the Occupational Health and Safety Office (OHSO). It is designed to manage the registration and monitoring of student vehicles entering the campus. By tracking vehicles, OVITS enhances campus security and helps prevent unauthorized access. OHSO oversees the program, aligning it with its mission to prioritize health and safety, and prevent hazards for employees, students, and visitors.
                </p>
            </section>
    
            <!-- OHSO Section -->
            <section class="ohso">
                <header class="ohso-header">Occupational Health and Safety Office</header>
                <div class="ohso-content">
                    <p>
                        The Occupational Health and Safety Office (OHSO) deals with all aspects of health and safety in the University and has a strong focus on the primary prevention of hazards. Our goal is to prevent/mitigate accidents to our employees, students, and clients within the campus.
                    </p>
                    <img src="images/ohsologo.png" alt="OHSO Logo" class="ohso-logo">
                </div>
            </section>
    
            <!-- Mission and Vision Section -->
            <section class="mission-vision">
                <div class="mission">
                    <h3>Mission</h3>
                    <p>
                        Our mission is to tediously inspect, assess, and promptly<br> address all safety and wellness
                        concerns through regular<br> ocular inspections, including safety and health measure<br>
                        campaigns and implementations.
                    </p>
                </div>
                <div class="vision">
                    <h3 style="margin-left: 300px;">Vision</h1>
                    <p style="margin-left: 40px;">
                        Occupational Health and Safety Office envisions the university as an educational
                        institution where perceived hazards are preempted and immediately addressed to ensure safety and wellness
                        among its populace.</p>
                </div>
            </section>
    
            <!-- Core Values -->
            <section class="core-values">
                <h3>Core Values</h3>
                <p>Your Health and Safety is our priority.</p>
            </section>

            <!-- Office Leadership-->

            <section class="leadership">
                <h2 class="line-below">Office Leadership</h2>
                <div class="leader">
                    <img style="margin-left: -220px;"src="images/Orlando P. Benedicto.png" alt="Office Head" class="leader-photo">
                    <p style="margin-left: 40px;" class="leader-info">
                        <strong>Mr. Orlando P. Benedicto</strong><br>
                        Office Head, OHSO
                    </p>
                </div>
            </section>


            <!-- Staff -->
            <section class="staff">
                <h2 class="line-below">Staff</h2>
                <div class="staff-list">
                    <div class="staff-row">
                        <p class="staff-name">Orlando P. Benedicto</p>
                        <p class="staff-role">Head, OHSO</p>
                    </div>
                    <div class="staff-row">
                        <p class="staff-name">Adrian M. Yumping</p>
                        <p class="staff-role">In Charge Facility Safety and CCTV Support</p>
                    </div>
                    <div class="staff-row">
                        <p class="staff-name">Arch. Elmer M. Cabrera</p>
                        <p class="staff-role">Staff (TDY)</p>
                    </div>
                    <div class="staff-row">
                        <p class="staff-name">Rolando G. Marquez</p>
                        <p class="staff-role">Staff (TDY)</p>
                    </div>
                    <div class="staff-row">
                        <p class="staff-name">Bianca Alexis C. Calleja</p>
                        <p class="staff-role">Administrative Staff</p>
                    </div>
                </div>
            </section>
            
        </div>
            
        </main>

    <footer id = "contact">
        <div class="footer-left">
            <h2>CONTACT US</h2>
            <p>For inquiries regarding the car sticker application, parking policies, and safety regulations, please contact the Occupational Health and Safety Office (OHSO). Our team is here to assist you with any questions or concerns you may have. Your safety and convenience on campus are our top priorities!</p>
            
        </div>
        <div class="divider-line"></div>
        <div class="footer-middle">
            <h2>Help/Support</h2>
            <p>Find answers quickly through our FAQs, get an overview of services, or reach out if you need assistance!</p>
            <button class="help-support" id="helpSupportButton">Learn More</button>
        </div>
        <script>
            // JavaScript to add functionality to the button
            document.getElementById("helpSupportButton").addEventListener("click", function() {
                window.location.href = "helpsupport.html"; // Replace with your target HTML file
            });
        </script>
        <div class="divider-line"></div>
        <div class="footer-right">
            <h3>Contact Information</h3>
            <p>ORLANDO P. BENEDICTO<br>Head</p>
            <p>OHSO Direct Line: (02) 8882-0535</p>
            <p>Email: <a href="mailto:ohso@umak.edu.ph">ohso@umak.edu.ph</a></p>
            <p>Office Location (Temporary):<br>Basement Level, Administration Building, UMak Campus, J.P. Rizal Extension, West Rembo, City of Taguig 1644</p>
        </div>
    </footer>
</body>
</html>