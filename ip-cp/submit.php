<?php
// Database connection
$servername = "localhost"; // your server
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "watchstore"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $pincode = $conn->real_escape_string($_POST['pincode']);
    $city = $conn->real_escape_string($_POST['city']);
    $state = $conn->real_escape_string($_POST['state']);
    $full_name = $conn->real_escape_string($_POST['full-name']); // Match name here
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $full_address = $conn->real_escape_string($_POST['full-address']); // Match name here
    // Insert data into database
    $sql = "INSERT INTO userdetails (pincode, city, state, fullname, phone, email, fulladdress)
            VALUES ('$pincode', '$city', '$state', '$full_name', '$phone', '$email', '$full_address')";

    if ($conn->query($sql) === TRUE) {
        echo "New address added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
