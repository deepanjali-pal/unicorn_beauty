<?php
// Show PHP errors for debugging

use Dom\Mysql;

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Oracle DB connection setup
$username = 'root';                // your mysql username
$password = 'TUK!@#$mysql';        // your mysql password
$connection_string = '//localhost/XE';// Adjust this to your DB name

$conn = mysqli_connect($username, $password, $connection_string);

// Check connection
if (!$conn) {
    $e = mysqli_error();
    die('Connection failed: ' . $e['message']);
}

// Get POST data
$name = $_POST['name'];
$email = $_POST['email'];
$service = $_POST['service'];
$date = $_POST['date'];  // YYYY-MM-DD format
$time = $_POST['time'];  // HH:MM format

// SQL insert query
$sql = "INSERT INTO bookings (name, email, service, date, time)
        VALUES (:name, :email, :service, TO_DATE(:date, 'YYYY-MM-DD'), :time)";

$stid = oci_parse($conn, $sql);

// Bind parameters
oci_bind_by_name($stid, ":name", $name);
oci_bind_by_name($stid, ":email", $email);
oci_bind_by_name($stid, ":service", $service);
oci_bind_by_name($stid, ":date", $date);
oci_bind_by_name($stid, ":time", $time);

// Execute the statement
if (oci_execute($stid)) {
    echo "<script>
            alert('Booking successful!');
            setTimeout(function() {
              window.location.href = 'index.html';
            }, 3000);
          </script>";
} else {
    $e = oci_error($stid);
    echo "Error: " . $e['message'];
}

// Clean up
oci_free_statement($stid);
oci_close($conn);
?>