<?php
session_start();

$host = 'localhost';
$db = 'ovits_db';
$user = 'root';
$pass = '';
$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    http_response_code(500);
    echo "Database connection failed: " . $mysqli->connect_error;
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $data = array_map('trim', $_POST);

    $stmt = $mysqli->prepare("
        INSERT INTO requests (
            first_name, last_name, middle_name, suffix, gender, dob, age, civil_status,
            email, mobile, address, position,
            license_number, vehicle_color, brand_model, vehicle_type, cr_number, plate_number
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "ssssssisssssssssss",
        $data['firstName'],
        $data['lastName'],
        $data['middleName'],
        $data['suffix'],
        $data['gender'],
        $data['dob'],
        $data['age'],
        $data['civilStatus'],
        $data['email'],
        $data['mobile'],
        $data['address'],
        $data['position'],
        $data['licenseNumber'],
        $data['vehicleColor'],
        $data['brandModel'],
        $data['vehicleType'],
        $data['crNumber'],
        $data['plateNumber']
    );

    if ($stmt->execute()) {
        echo "success";
    } else {
        http_response_code(500);
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
