<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OVITS</title>
    <link rel="stylesheet" href="stylesheets/ovits.css">
    <link rel="manifest" href="images/site.webmanifest">
    <link rel="icon" type="image/png" sizes="192x192" href="images/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="images/android-chrome-512x512.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
<?php include("header.php"); ?>
    <section id="home">
        <div class="homecss">
            <h2>Online Vehicle Identification and Tracking System</h2>
            <p>
                The Online Vehicle Identification and Tracking System (OVITS) ensures secure and efficient vehicle 
                management on campus. Register your vehicle online, get a unique sticker with a QR code, and enjoy 
                hassle-free access, while campus security tracks and verifies vehicles in real-time for a safer 
                campus environment.
            </p>
            <button class="apply-now" id="applyFormButton">Apply Now</button>
        </div>
        <div class="pic1">
            <img src="images/car.png" alt="3D Car on Phone">
        </div>
    </section>

    <script>
        // JavaScript to add functionality to the button
        document.getElementById("applyFormButton").addEventListener("click", function() {
            window.location.href = "applynow.php"; // Replace with your target HTML file
        });
    </script>

    <section id="about">
        <h2>About Us</h2>
        <p> <b>Online Vehicle Identification and Tracking System (OVITS)</b> enhances campus security by providing <br> an efficient vehicle registration and tracking system for students. Our platform ensures that only<br> authorized vehicles enter the premises using unique QR codes and barcodes.</p>

        <p> We aim to create a safer, more organized campus environment by streamlining vehicle access and <br> improving monitoring. Our technology reduces manual processes, making registration and verification <br> faster and more reliable.</p>

        <p> We collaborate with campus authorities, local organizations,  and tech providers to ensure the success <br>and sustainability of OVITS. Aligned with Sustainable Development Goals (SDG) 17, we prioritize <br> convenience and safety for all students and staff.</p>
    </section>

    <section id="how-it-works">
        <h2>HOW IT WORKS?</h2>
        <div class="row">
            <div class="column">
                <img src="images/carIcon.png" alt="Car Icon">
                <div class="steps">
                    <p>Step 1:<br>Register Your <br>Vehicle</p>
                </div>
                <img src="images/Line.png" alt="Line">
                <p>Provide your vehicle<br>information, including<br>license plate, make, and<br>model, to register in the<br>system.</p>
            </div>
            <div class="column">
                <img src="images/qrIcon.png" alt="QR Icon">
                <div class="steps">
                    <p>Step 2:<br>Receive Your<br>QR Sticker</p>
                </div>
                <img src="images/Line.png" alt="Line">
                <p>Get a scannable QR<br>code sticker that<br>serves as a unique<br>identifier for your<br>registered vehicle.</p>
            </div>
            <div class="column">
                <img src="images/cctvIcon.png" alt="CCTV Icon">
                <div class="steps">
                    <p>Step 3:<br>Seamless Access<br>& Monitoring</p>
                </div>
                <img src="images/Line.png" alt="Line">
                <p>Use your QR sticker to<br>gain easy, monitored<br>access to campus,<br>ensuring security and<br>quick entry.</p>
            </div>
        </div>
    </section>

    <section id="policies">
        <h2>PARKING POLICIES</h2>
        <div class="policyform">
            <p>Submit the sticker application form to the Occupational Health and Safety Office (OHSO).</p>
            <p>Stickers must be displayed on the upper left side of the front windshield.</p>
            <p>Responsibility for violations lies with the registrant.</p>
            <button class="apply-now" id="policyFormButton">Policy Form</button>
        </div>
    </section>  

    <script>
        // JavaScript to add functionality to the button
        document.getElementById("policyFormButton").addEventListener("click", function() {
            window.location.href = "policies.php"; // Replace with your target HTML file
        });
    </script>

    <section id="advisories">
        <h2>ADVISORY</h2>
        <div class="advisory-content">
            <p>Due to the limited availability of motorcycle parking slots, the university has issued 150 parking stickers for motorcycles on a first-come, first-served basis. We recommend students consider alternative transportation methods, such as public transport or carpooling. Motorcycles parked outside the campus premises are not guaranteed security, and towing may occur. We appreciate your understanding as we work to provide a safe and efficient parking system for all.</p>
            <p>We appreciate your understanding as we work to provide a safe and efficient parking system for all.</p>
        </div>
    </section>

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
                window.location.href = "helpsupport.php"; // Replace with your target HTML file
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