


<head>
<style>
  /* Header */

  header {
  padding: 10px 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: fixed;
  top: 0;
  width: 100%;
  height: auto;
  min-height: 10%;
  background-color: #111c4e;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  z-index: 1000; /* Ensures the header is above other content */
}

 .header-top {
  display: flex;
  justify-content: start;
  align-items: center;
  width: 100%; /* Ensure the container takes full width */
 }
 
 .header-title-group {
  display: flex;
  flex-direction: column;
  margin-left: 20px; /* Adjust as necessary */
}

  .header-main-title {
    color: #ffffff; /* Silver white text */
    font-family: 'Times New Roman', Times, serif; /* Times New Roman font */
    font-size: 30px;
    font-weight: bold;
    margin: 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    margin-left: -8px;
    text-decoration: none;
  }

  .header-title {
    color: #f5d328; 
    font-size: 20px;
    margin: 5px 0; 
    font-weight: 600;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    margin-left: -8px;
    font-family: Arial, Helvetica, sans-serif; /* Times New Roman font */
    text-decoration: none;

  }

  /* Dropdown container */
  .dropdown-container {
    margin-right: 80px; /* Adjust margin as needed */
  margin-left: auto; /* Centers the container */
  display: flex;
  justify-content: center; /* Horizontally center the dropdowns */
  align-items: center; /* Vertically center the dropdowns */
  }

  /* Dropdown container for dropdown menu */
  .dropdown {
    position: relative;
    display: flex; /* Align the dropdown menus in a row */
    margin: 0 10px; /* Adjust as needed */
    text-decoration: none;
  }

  /* Dropdown button */
  .dropdown-btn {
    background-color: transparent;
    color: #d9d9d9; /* Adjusted for visibility */
    padding: 12px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    white-space: nowrap; /* Prevents wrapping text */
    font-family: sans-serif;
    font-weight: bold;
  }

  /* Dropdown content (hidden by default) */
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #1c2241;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    top: 100%; /* Position dropdown content below the button */
    font-family: arial;
  }

  /* Links inside the dropdown */
  .dropdown-content a {
    color: #d9d9d9;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  /* Change color of dropdown links on hover */
  .dropdown-content a:hover {
    background-color: #1c2241;
  }
  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
    display: block;
  }

  .ranking-certificate-dropdown {
    position: absolute;
    display: none;
  }

  .dropdown:hover .ranking-certificate-dropdown {
    display: block;
  }

  .ranking-certificate-dropdown-btn {
    background-color: #1c2241;
    color: #d9d9d9;
    padding: 12px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    white-space: nowrap; /* Prevents wrapping text */
    font-family: sans-serif;
    font-weight: bold;
  }

  .ranking-certificate-dropdown-content {
    display: none;
    position: absolute;
    background-color: #1c2241;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    top: 0;
    left: 100%; /* Position dropdown content to the right of the button */
    font-family: arial;
  }

  .ranking-certificate-dropdown:hover .ranking-certificate-dropdown-content {
    display: block;
  }

  .ranking-certificate-dropdown-content a:hover {
    background-color: #1c2241;
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
  font-family: nunito,roboto,proxima-nova,"proxima nova",sans-serif;
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
  white-space: nowrap; /* Ensures text stays on one line */
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
    text-decoration: none; /* Removes underline */
    color: inherit; /* Inherits the color from parent */
  }

  .header-main-title a:hover {
    text-decoration: none; /* Ensures no underline on hover */
  }

</style>
</head>
<body>
<base href="http://localhost/ODRS/">

<header>
<div class="header-top"> 

      <div class="header-title-group">
      <p class="header-main-title"><a href="home.php">University of Makati</a></p>
      <p class="header-title">ONLINE DOCUMENT REQUEST SYSTEM</p>
      </div>

  </div> 

  <div class="dropdown-container">
    <div class="dropdown">
      <button class="dropdown-btn">DIPLOMA</button>
      <div class="dropdown-content">
        <a href="Diploma/1stCopyDiploma.php">1st Copy</a>
        <a href="Diploma/2ndCopyDiploma.php">2nd Copy</a>
        <a href="Diploma/ReplacementCopyDiploma.php">Replacement Copy</a>
      </div>
    </div>

    <div class="dropdown">
    <button class="dropdown-btn">CERTIFICATION</button>
    <div class="dropdown-content">
      <a href="Certification/DeansListCert.php">Dean's List Certificate</a>
      <a href="Certification/HonorsCert.php">Honors List Certificate</a>
      <a href="Certification/CEA.php">Certification of Enrollment/Attendance</a>
      <a href="Certification/CG.php">Certification of Graduation</a>
      <a href="Certification/CEMI.php">Certification of English as a Medium of Instructions</a>
      <div class="ranking-certificate-dropdown"> <!-- Nested dropdown -->
        <button class="ranking-certificate-dropdown-btn">RANKING CERTIFICATE</button>
        <div class="ranking-certificate-dropdown-content">
          <a href="Certification/ByStrand.php">BY STRAND</a>
          <a href="Certification/ByBatch.php">BY BATCH</a>
        </div>
      </div>
    </div>
  </div>


    <div class="dropdown">
      <button class="dropdown-btn">SF9 (REPORT CARD)</button>
      <div class="dropdown-content">
        <a href="SF9/1stCopySF9.php">1st Copy</a>
        <a href="SF9/2ndCopySF9.php">2nd Copy</a>
        <a href="SF9/ReplacementCopySF9.php">Replacement Copy</a>
        <a href="SF9/PhotocopySF9.php">CTC Copy of SF9</a>
      </div>
    </div>
  </div>
  
  <div>
<a href="logout.php" class="logout">Log Out</a>
</div>

</header>

</body>

