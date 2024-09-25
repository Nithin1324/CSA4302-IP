<?php
$host = 'localhost';
$db = 'beauty_parlour';
$user = 'root'; 
$pass = '';      
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $service = $conn->real_escape_string($_POST['service']);
    $stylist = $conn->real_escape_string($_POST['stylist']);
    $date = $conn->real_escape_string($_POST['date']);
    $time = $conn->real_escape_string($_POST['time']);
    $notes = $conn->real_escape_string($_POST['notes']);
    $payment_method = $conn->real_escape_string($_POST['payment_method']);
    $deposit = isset($_POST['deposit']) ? 1 : 0;
    $sql = "INSERT INTO bookings (name, email, phone, service, stylist, appointment_date, appointment_time, notes, payment_method, deposit) 
            VALUES ('$name', '$email', '$phone', '$service', '$stylist', '$date', '$time', '$notes', '$payment_method', '$deposit')";
    if ($conn->query($sql) === TRUE) {
        echo "<h2>Booking Confirmed</h2>";
        echo "<p>Thank you, $name! Your appointment has been booked for $date at $time.</p>";
        echo "<p>A confirmation email will be sent to $email shortly.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
