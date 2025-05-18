<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$server = "localhost";
$username = "root";      // Change if you use a different MySQL user
$password = "root";      // Change if your MySQL user has a password
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
    $rating = (int)($_POST['rating'] ?? 0);
    $message = $con->real_escape_string($_POST['message'] ?? '');

    // Basic validation
    if (!$name || !$email || !$rating || !$message) {
        $message = "<div style='color:red;text-align:center;'>All fields are required.</div>";
    } else {
        // Prepare SQL statement
        $stmt = $con->prepare("INSERT INTO feedback_ub (name, email, rating, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $name, $email, $rating, $message);

        if ($stmt->execute()) {
            $message = "<div style='color:green;text-align:center;'>Thank you for your feedback! We appreciate your input.</div>";
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
    <title>Feedback Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div style="margin: 2rem auto; max-width: 500px;">
        <?php echo $message; ?>
        <div style="text-align:center; margin-top:2rem;">
            <a href="feedback.html" class="btn-primary">Back to Feedback</a>
            <a href="index.html" class="btn-primary" style="margin-left:1rem;">Home</a>
        </div>
    </div>
</body>
</html> 