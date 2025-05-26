<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceeded</title>
    <link rel="stylesheet" href="stylesheets/proceeded.css">
    <link rel="stylesheet" href="stylesheets/ovits.css">

    <link rel="manifest" href="images/site.webmanifest">
    <link rel="icon" type="image/png" sizes="192x192" href="images/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="images/android-chrome-512x512.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
<?php include("header.php"); ?>
    <!-- Container -->
    <section id="thank-you">
        <div class="thank-youheader">
            <h1>Thank You for Registering with OVITS!</h1>
        </div>
    
        <!-- Message Section -->
        <div class="message-section">
            <h2>THANK YOU!</h2>
            <p>
                We appreciate your cooperation in completing the Online Vehicle Identification and Tracking System (OVITS) application form. Your submission has been successfully received.
    
                Our team will review your application, and you will be notified once your unique vehicle sticker and QR code/barcode are ready for collection.
                
                If you have any questions or need further assistance, you can check our Help/Support page by clicking the Learn More button below. Please feel free to contact us or the Occupational Health and Safety Office (OHSO).
                
                Thank you for helping us maintain a safe and secure campus environment!        
            </p>
            <div class="button-section">
                <button class="returnHome-button" id="returnHome" type="button">HOME</button>
            </div>
        </div>
    </section>

    <script>
        // JavaScript to add functionality to the button
        document.getElementById("returnHome").addEventListener("click", function() {
            window.location.href = "home.php"; // Replace with your target HTML file
        });
    </script>

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