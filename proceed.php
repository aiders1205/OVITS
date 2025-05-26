<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceed</title>
    <link rel="stylesheet" href="stylesheets/proceed.css">
    <link rel="stylesheet" href="stylesheets/ovits.css">

    <link rel="manifest" href="images/site.webmanifest">
    <link rel="icon" type="image/png" sizes="192x192" href="images/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="images/android-chrome-512x512.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
<?php include("header.php"); ?>
    <!-- File Section -->
    <div class="file-section">
        <h2>Submit Required Documents</h2>
        <label for="certificate">Photocopy of Vehicle Certificate (Copy of Deed of Sale if not under the name of applicant)</label>
        <input type="file" id="certificate" name="certificate">
        <label for="receipt">Photocopy of Official Receipt of Registration (Latest)</label>
        <input type="file" id="receipt" name="receipt">
        <label for="license">Photocopy of Valid Driver's License</label>
        <input type="file" id="license" name="license">
        <label for="employee-id">Photocopy of Employee's ID</label>
        <input type="file" id="employee-id" name="employee-id">
        <label for="sticker-payment">Official Receipt of Vehicle Sticker Payment</label>
        <input type="file" id="sticker-payment" name="sticker-payment">
    </div>

    <!-- Consent Section -->
    <div class="consent-section">
        <h2>Data Privacy Statement</h2>
        <p>In compliance with the Data Privacy Act of 2012, the information you provide will be treated with utmost respect and confidentiality. UMak follows the general principles and rules of data privacy & protection in the Philippines. By filling up this form, you are allowing UMak to process the information to be gathered. UMak reserves the right to deny or approve the processing of your transaction if your information is found to be falsified.</p>
        <p>I have read and understood the above and hereby consent to, agree on, accept and acknowledge these terms of consent for myself by signing below. I am allowing UMak to process my information.</p>
        <div class="button-section">
            <button class="agree-button" id="proceedToThanks" type="button">I Agree</button>
        </div>
    </div>

    <script>
        // JavaScript to add functionality to the button
        document.getElementById("proceedToThanks").addEventListener("click", function() {
            window.location.href = "proceeded.php"; // Replace with your target HTML file
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
