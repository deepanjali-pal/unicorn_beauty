<?php
// Database configuration
$server = "localhost";
$username = "root";      // Change if you use a different MySQL user
$password = "root";          // Change if your MySQL user has a password
$database = "booking_ub";

// Connect to MySQL
$con = new mysqli($server, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("<div style='color:red;text-align:center;'>Connection failed: " . $con->connect_error . "</div>");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $name = $con->real_escape_string($_POST['name'] ?? '');
    $email = $con->real_escape_string($_POST['email'] ?? '');
    $phone_no = $con->real_escape_string($_POST['phone_no'] ?? '');
    $service_name = $con->real_escape_string($_POST['service_name'] ?? '');
    $date = $con->real_escape_string($_POST['date'] ?? '');
    $time = $con->real_escape_string($_POST['time'] ?? '');

    // Basic validation
    if (!$name || !$email || !$phone_no || !$service_name || !$date || !$time) {
        $message = "<div style='color:red;text-align:center;'>All fields are required.</div>";
    } else {
        // Prepare SQL statement
        $stmt = $con->prepare("INSERT INTO booking_ub (name, email, phone_no, service_name, date, time) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $email, $phone_no, $service_name, $date, $time);

        if ($stmt->execute()) {
            $message = "<div style='color:green;text-align:center;'>Booking successful! Thank you for booking with Unicorn Beauty.</div>";
        } else {
            $message = "<div style='color:red;text-align:center;'>Error: " . $stmt->error . "</div>";
        }
        $stmt->close();
    }
} else {
    $message = "";
}
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div style="margin: 2rem auto; max-width: 500px;">
        <?php echo $message; ?>
        <div style="text-align:center; margin-top:2rem;">
            <a href="booking.html" class="btn-primary">Back to Booking</a>
            <a href="index.html" class="btn-primary" style="margin-left:1rem;">Home</a>
        </div>
    </div>
</body>
</html>


