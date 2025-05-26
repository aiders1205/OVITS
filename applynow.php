<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Now</title>
    <link rel="manifest" href="images/site.webmanifest">
    <link rel="stylesheet" href="stylesheets/ovits.css">

    <link rel="icon" type="image/png" sizes="192x192" href="images/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="images/android-chrome-512x512.png">
    <meta name="theme-color" content="#ffffff">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Marcellus&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        /* General Styling */
        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: "Poppins", Arial, sans-serif;
            background-color: #111C4E;
        }

        /* Apply Now Header */
        .apply-nowheader {
            margin-top: 0;
            text-align: center;
            padding: 80px 40px;
            background: linear-gradient(135deg,#667eea 0%,rgb(75, 116, 162) 100%);
            color: white;
        }

        .apply-nowheader h1 {
            color: white;
            font-weight: bold;
            font-size: 3.5rem;
            font-family: "Poppins", sans-serif;
            margin: 0 0 30px 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .apply-nowheader p {
            color: white;
            font-weight: 300;
            font-size: 1.1rem;
            text-align: justify;
            margin: 0 auto;
            max-width: 800px;
            line-height: 1.6;
            opacity: 0.95;
        }

        /* Enhanced Form Section */
        .form-section {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 60px 40px;
            min-height: 100vh;
        }

        .form-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-header {
            background: linear-gradient(135deg,#667eea 0%,#111C4E 100%);
            color: white;
            padding: 30px;
            text-align: center;
            margin: 0;  
        }

        .form-header h1 {
            margin: 0;
            font-size: 2.2rem;
            font-weight: 600;
        }

        .section-header {
            background: linear-gradient(135deg, #667eea 0%, #111C4E 100%);
            color: white;
            padding: 20px 30px;
            margin: 0;
            font-size: 1.3rem;
            font-weight: 600;
            border-left: 5px solid #667eea;
        }

        .form-row {
            display: flex;
            gap: 30px;
            padding: 25px 30px;
            border-bottom: 1px solid #f0f0f0;
            align-items: flex-start;
        }

        .form-row:last-child {
            border-bottom: none;
        }

        .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            flex: 2;
        }

        label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        input[type="date"],
        textarea {
            padding: 12px 15px;
            border: 2px solid #e1e8ed;
            border-radius: 10px;
            font-size: 1rem;
            font-family: "Poppins", sans-serif;
            transition: all 0.3s ease;
            background-color: #fafbfc;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        .radio-group, .checkbox-group {
            display: flex;
            gap: 20px;
            align-items: center;
            margin-top: 8px;
        }

        .radio-item, .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .radio-item:hover, .checkbox-item:hover {
            background-color: #f8f9ff;
        }

        input[type="radio"], input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        /* Error Styles */
        .error {
            border-color: #e74c3c !important;
            background-color: #fdf2f2 !important;
        }

        .error-message {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }

        .error-message.show {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Success notification */
        .success-notification {
            background: linear-gradient(135deg, #00b09b 0%, #96c93d 100%);
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            margin: 20px 30px;
            text-align: center;
            display: none;
            animation: slideDown 0.5s ease;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Button Section */
        .button-section {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 0;
        }

        .proceed {
            padding: 18px 50px;
            font-size: 1.2rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, #667eea 0%, #111C4E 100%);
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .proceed:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
        }

        .proceed:active {
            transform: translateY(-1px);
        }

        .proceed:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
    </style>
</head>
<script>
    document.getElementById('proceedFormButton').addEventListener('click', function () {
        const form = document.getElementById('ovitsForm');
        const formData = new FormData(form);

        fetch('submit-request.php', {
            method: 'POST',
            body: formData
        }).then(response => response.text())
        .then(data => {
            if (data === "success") {
                document.getElementById('successNotification').style.display = 'block';
                setTimeout(() => {
                    window.location.href = "home.php";
                }, 3000);
            } else {
                alert("Submission failed: " + data);
            }
        }).catch(error => {
            alert("An error occurred: " + error);
        });
    });
</script>

<body>
    <section id="apply-now">
    <div class="apply-nowheader">
        <h1>OVITS APPLICATION FORM</h1>
        <p>
            The OVITS (Online Vehicle Identification and Tracking System) Application Form is a comprehensive
            document required for securing a UMak vehicle sticker. It collects essential information about the
            applicant, including personal details, contact information, and vehicle specifications. Applicants must
            also submit supporting documents such as photocopies of their vehicle registration, driver's license,
            and official receipt of payment. This form ensures that only authorized vehicles gain access to the
            university, contributing to a safe and organized campus environment.
        </p>
    </div>

    <main class="form-section">
        <div class="form-container">
            <div class="form-header">
                <h1>Application for Vehicle Sticker</h1>
            </div>
            
            <div class="success-notification" id="successNotification">
                Application submitted successfully! Redirecting...
            </div>

            <form id="ovitsForm">
                <!-- Personal Information Section -->
                <div class="section-header">Personal Information</div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="lastName">Last Name *</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required>
                        <div class="error-message" id="lastNameError">Last name is required</div>
                    </div>
                    <div class="form-group">
                        <label for="firstName">First Name *</label>
                        <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required>
                        <div class="error-message" id="firstNameError">First name is required</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="middleName">Middle Name</label>
                        <input type="text" id="middleName" name="middleName" placeholder="Enter your middle name">
                    </div>
                    <div class="form-group">
                        <label for="suffix">Suffix</label>
                        <input type="text" id="suffix" name="suffix" placeholder="e.g., Jr, Sr">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Gender *</label>
                        <div class="radio-group">
                            <div class="radio-item">
                                <input type="radio" id="male" name="gender" value="Male" required>
                                <label for="male">Male</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="female" name="gender" value="Female">
                                <label for="female">Female</label>
                            </div>
                        </div>
                        <div class="error-message" id="genderError">Please select your gender</div>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth *</label>
                        <input type="date" id="dob" name="dob" required>
                        <div class="error-message" id="dobError">Date of birth is required</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="age">Age *</label>
                        <input type="number" id="age" name="age" placeholder="Enter your age" min="18" max="100" required>
                        <div class="error-message" id="ageError">Age must be between 18 and 100</div>
                    </div>
                    <div class="form-group">
                        <label>Civil Status *</label>
                        <div class="checkbox-group">
                            <div class="checkbox-item">
                                <input type="checkbox" id="single" name="civilStatus" value="Single">
                                <label for="single">Single</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="married" name="civilStatus" value="Married">
                                <label for="married">Married</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="separated" name="civilStatus" value="Separated">
                                <label for="separated">Separated</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="widow" name="civilStatus" value="Widow">
                                <label for="widow">Widow</label>
                            </div>
                        </div>
                        <div class="error-message" id="civilStatusError">Please select your civil status</div>
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="section-header">Contact Information</div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        <div class="error-message" id="emailError">Please enter a valid email address</div>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile Number *</label>
                        <input type="tel" id="mobile" name="mobile" placeholder="09XX-XXX-XXXX" pattern="[0-9]{11}" required>
                        <div class="error-message" id="mobileError">Please enter a valid 11-digit mobile number</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="address">Residential Address *</label>
                        <textarea id="address" name="address" rows="3" placeholder="Enter your complete address" required></textarea>
                        <div class="error-message" id="addressError">Residential address is required</div>
                    </div>
                    <div class="form-group">
                        <label for="position">Position / Department *</label>
                        <input type="text" id="position" name="position" placeholder="Enter position/department" required>
                        <div class="error-message" id="positionError">Position/Department is required</div>
                    </div>
                </div>

                <!-- Vehicle Information Section -->
                <div class="section-header">Vehicle Information</div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="licenseNumber">Driver's License Number *</label>
                        <input type="text" id="licenseNumber" name="licenseNumber" placeholder="Enter your license number" required>
                        <div class="error-message" id="licenseNumberError">Driver's license number is required</div>
                    </div>
                    <div class="form-group">
                        <label for="vehicleColor">Vehicle Color *</label>
                        <input type="text" id="vehicleColor" name="vehicleColor" placeholder="Enter vehicle color" required>
                        <div class="error-message" id="vehicleColorError">Vehicle color is required</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="brandModel">Brand/Model *</label>
                        <input type="text" id="brandModel" name="brandModel" placeholder="e.g., Toyota Vios" required>
                        <div class="error-message" id="brandModelError">Brand/Model is required</div>
                    </div>
                    <div class="form-group">
                        <label for="vehicleType">Type of Vehicle *</label>
                        <input type="text" id="vehicleType" name="vehicleType" placeholder="e.g., Car, Motorcycle" required>
                        <div class="error-message" id="vehicleTypeError">Vehicle type is required</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="crNumber">Vehicle Certificate (CR) No. *</label>
                        <input type="text" id="crNumber" name="crNumber" placeholder="Enter CR number" required>
                        <div class="error-message" id="crNumberError">CR number is required</div>
                    </div>
                    <div class="form-group">
                        <label for="plateNumber">Plate Number *</label>
                        <input type="text" id="plateNumber" name="plateNumber" placeholder="Enter plate number" required>
                        <div class="error-message" id="plateNumberError">Plate number is required</div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <!-- Button section -->
    <section class="button-section">
        <button class="proceed" id="proceedFormButton">PROCEED</button>
    </section>
</section>

<footer id="contact">
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
    <div class="divider-line"></div>
    <div class="footer-right">
        <h3>Contact Information</h3>
        <p>ORLANDO P. BENEDICTO<br>Head</p>
        <p>OHSO Direct Line: (02) 8882-0535</p>
        <p>Email: <a href="mailto:ohso@umak.edu.ph">ohso@umak.edu.ph</a></p>
        <p>Office Location (Temporary):<br>Basement Level, Administration Building, UMak Campus, J.P. Rizal Extension, West Rembo, City of Taguig 1644</p>
    </div>
</footer>

<script>
// Database simulation (in a real application, this would be server-side)
let applicationsDB = [];

// Form validation functions
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validateMobile(mobile) {
    const mobileRegex = /^09\d{9}$/;
    return mobileRegex.test(mobile.replace(/\D/g, ''));
}

function validateAge(age) {
    return age >= 18 && age <= 100;
}

function showError(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorElement = document.getElementById(fieldId + 'Error');
    
    field.classList.add('error');
    errorElement.textContent = message;
    errorElement.classList.add('show');
}

function hideError(fieldId) {
    const field = document.getElementById(fieldId);
    const errorElement = document.getElementById(fieldId + 'Error');
    
    field.classList.remove('error');
    errorElement.classList.remove('show');
}

function validateForm() {
    let isValid = true;
    
    // Clear all previous errors
    const errorElements = document.querySelectorAll('.error-message');
    errorElements.forEach(error => error.classList.remove('show'));
    
    const fields = document.querySelectorAll('.error');
    fields.forEach(field => field.classList.remove('error'));
    
    // Personal Information Validation
    const lastName = document.getElementById('lastName').value.trim();
    if (!lastName) {
        showError('lastName', 'Last name is required');
        isValid = false;
    }
    
    const firstName = document.getElementById('firstName').value.trim();
    if (!firstName) {
        showError('firstName', 'First name is required');
        isValid = false;
    }
    
    const gender = document.querySelector('input[name="gender"]:checked');
    if (!gender) {
        showError('gender', 'Please select your gender');
        isValid = false;
    }
    
    const dob = document.getElementById('dob').value;
    if (!dob) {
        showError('dob', 'Date of birth is required');
        isValid = false;
    }
    
    const age = parseInt(document.getElementById('age').value);
    if (!age || !validateAge(age)) {
        showError('age', 'Age must be between 18 and 100');
        isValid = false;
    }
    
    const civilStatus = document.querySelectorAll('input[name="civilStatus"]:checked');
    if (civilStatus.length === 0) {
        showError('civilStatus', 'Please select your civil status');
        isValid = false;
    } else if (civilStatus.length > 1) {
        showError('civilStatus', 'Please select only one civil status');
        isValid = false;
    }
    
    // Contact Information Validation
    const email = document.getElementById('email').value.trim();
    if (!email) {
        showError('email', 'Email address is required');
        isValid = false;
    } else if (!validateEmail(email)) {
        showError('email', 'Please enter a valid email address');
        isValid = false;
    }
    
    const mobile = document.getElementById('mobile').value.trim();
    if (!mobile) {
        showError('mobile', 'Mobile number is required');
        isValid = false;
    } else if (!validateMobile(mobile)) {
        showError('mobile', 'Please enter a valid mobile number (09XXXXXXXXX)');
        isValid = false;
    }
    
    const address = document.getElementById('address').value.trim();
    if (!address) {
        showError('address', 'Residential address is required');
        isValid = false;
    }
    
    const position = document.getElementById('position').value.trim();
    if (!position) {
        showError('position', 'Position/Department is required');
        isValid = false;
    }
    
    // Vehicle Information Validation
    const licenseNumber = document.getElementById('licenseNumber').value.trim();
    if (!licenseNumber) {
        showError('licenseNumber', 'Driver\'s license number is required');
        isValid = false;
    }
    
    const vehicleColor = document.getElementById('vehicleColor').value.trim();
    if (!vehicleColor) {
        showError('vehicleColor', 'Vehicle color is required');
        isValid = false;
    }
    
    const brandModel = document.getElementById('brandModel').value.trim();
    if (!brandModel) {
        showError('brandModel', 'Brand/Model is required');
        isValid = false;
    }
    
    const vehicleType = document.getElementById('vehicleType').value.trim();
    if (!vehicleType) {
        showError('vehicleType', 'Vehicle type is required');
        isValid = false;
    }
    
    const crNumber = document.getElementById('crNumber').value.trim();
    if (!crNumber) {
        showError('crNumber', 'CR number is required');
        isValid = false;
    }
    
    const plateNumber = document.getElementById('plateNumber').value.trim();
    if (!plateNumber) {
        showError('plateNumber', 'Plate number is required');
        isValid = false;
    }
    
    return isValid;
}

function saveToDatabase(formData) {
    // Generate unique ID
    const id = 'APP' + Date.now() + Math.floor(Math.random() * 1000);
    
    // Create application record
    const application = {
        id: id,
        timestamp: new Date().toISOString(),
        status: 'pending',
        personalInfo: {
            lastName: formData.get('lastName'),
            firstName: formData.get('firstName'),
            middleName: formData.get('middleName'),
            suffix: formData.get('suffix'),
            gender: formData.get('gender'),
            dateOfBirth: formData.get('dob'),
            age: parseInt(formData.get('age')),
            civilStatus: formData.get('civilStatus')
        },
        contactInfo: {
            email: formData.get('email'),
            mobile: formData.get('mobile'),
            address: formData.get('address'),
            position: formData.get('position')
        },
        vehicleInfo: {
            licenseNumber: formData.get('licenseNumber'),
            color: formData.get('vehicleColor'),
            brandModel: formData.get('brandModel'),
            type: formData.get('vehicleType'),
            crNumber: formData.get('crNumber'),
            plateNumber: formData.get('plateNumber')
        }
    };
    
    // Save to simulated database
    applicationsDB.push(application);
    
    // In a real application, you would send this to your server
    console.log('Application saved:', application);
    console.log('Current database:', applicationsDB);
    
    return application;
}

function submitForm() {
    if (!validateForm()) {
        // Scroll to first error
        const firstError = document.querySelector('.error');
        if (firstError) {
            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        return;
    }
    
    // Get form data
    const form = document.getElementById('ovitsForm');
    const formData = new FormData(form);
    
    // Save to database
    try {
        const savedApplication = saveToDatabase(formData);
        
        // Show success notification
        const successNotification = document.getElementById('successNotification');
        successNotification.style.display = 'block';
        
        // Disable form and button
        const submitButton = document.getElementById('proceedFormButton');
        submitButton.disabled = true;
        submitButton.textContent = 'SUBMITTING...';
        
        // Simulate processing time
        setTimeout(() => {
            // In a real application, you would redirect to a confirmation page
            alert(`Application submitted successfully!\nApplication ID: ${savedApplication.id}\n\nYou will receive a confirmation email shortly.`);
            
            // Reset form (optional)
            // form.reset();
            // submitButton.disabled = false;
            // submitButton.textContent = 'PROCEED';
            // successNotification.style.display = 'none';
        }, 2000);
        
    } catch (error) {
        console.error('Error saving application:', error);
        alert('There was an error submitting your application. Please try again.');
    }
}

// Real-time validation
document.addEventListener('DOMContentLoaded', function() {
    // Add real-time validation for all form fields
    const formFields = document.querySelectorAll('input, textarea');
    
    formFields.forEach(field => {
        field.addEventListener('blur', function() {
            validateField(this);
        });
        
        field.addEventListener('input', function() {
            if (this.classList.contains('error')) {
                validateField(this);
            }
        });
    });
    
    // Handle civil status checkboxes (only allow one selection)
    const civilStatusCheckboxes = document.querySelectorAll('input[name="civilStatus"]');
    civilStatusCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                civilStatusCheckboxes.forEach(other => {
                    if (other !== this) other.checked = false;
                });
            }
            hideError('civilStatus');
        });
    });
    
    // Auto-calculate age from date of birth
    document.getElementById('dob').addEventListener('change', function() {
        const dob = new Date(this.value);
        const today = new Date();
        let age = today.getFullYear() - dob.getFullYear();
        const monthDiff = today.getMonth() - dob.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }
        
        if (age >= 0 && age <= 150) {
            document.getElementById('age').value = age;
            hideError('age');
        }
    });
    
    // Format mobile number input
    document.getElementById('mobile').addEventListener('input', function() {
        let value = this.value.replace(/\D/g, '');
        if (value.length > 11) value = value.slice(0, 11);
        
        if (value.length >= 3) {
            value = value.replace(/(\d{4})(\d{3})(\d{4})/, '$1-$2-$3');
        }
        
        this.value = value;
    });
});

function validateField(field) {
    const fieldId = field.id;
    const value = field.value.trim();
    
    switch (fieldId) {
        case 'lastName':
        case 'firstName':
            if (!value) {
                showError(fieldId, `${field.labels[0].textContent.replace(' *', '')} is required`);
            } else {
                hideError(fieldId);
            }
            break;
            
        case 'email':
            if (!value) {
                showError(fieldId, 'Email address is required');
            } else if (!validateEmail(value)) {
                showError(fieldId, 'Please enter a valid email address');
            } else {
                hideError(fieldId);
            }
            break;
            
        case 'mobile':
            const cleanMobile = value.replace(/\D/g, '');
            if (!cleanMobile) {
                showError(fieldId, 'Mobile number is required');
            } else if (!validateMobile(cleanMobile)) {
                showError(fieldId, 'Please enter a valid mobile number (09XXXXXXXXX)');
            } else {
                hideError(fieldId);
            }
            break;
            
        case 'age':
            const age = parseInt(value);
            if (!age) {
                showError(fieldId, 'Age is required');
            } else if (!validateAge(age)) {
                showError(fieldId, 'Age must be between 18 and 100');
            } else {
                hideError(fieldId);
            }
            break;
            
        case 'dob':
            if (!value) {
                showError(fieldId, 'Date of birth is required');
            } else {
                hideError(fieldId);
            }
            break;
            
        default:
            if (field.hasAttribute('required') && !value) {
                showError(fieldId, `${field.labels[0].textContent.replace(' *', '')} is required`);
            } else {
                hideError(fieldId);
            }
            break;
    }
}

// Event listeners
document.getElementById('proceedFormButton').addEventListener('click', submitForm);

document.getElementById('helpSupportButton').addEventListener('click', function() {
    window.location.href = 'helpsupport.php';
});

// Smooth scrolling for form sections
document.querySelectorAll('.section-header').forEach(header => {
    header.style.cursor = 'pointer';
    header.addEventListener('click', function() {
        this.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
});

// Add loading animation to the form
window.addEventListener('load', function() {
    document.querySelector('.form-container').style.opacity = '1';
});
</script>

</body>
</html>