<?php
// Database connection
$servername = "localhost";
$username   = "root"; // change if different
$password   = ""; // change if different
$dbname     = "contact_form"; // change to your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get form data safely
$full_name = $conn->real_escape_string($_POST['full_name']);
$email     = $conn->real_escape_string($_POST['email']);
$phone     = $conn->real_escape_string($_POST['phone']);
$message   = $conn->real_escape_string($_POST['message']);

// Insert into DB
$sql = "INSERT INTO contact_messages (full_name, email, phone, message, created_at) 
        VALUES ('$full_name', '$email', '$phone', '$message', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "✅ Message sent successfully!";
} else {
    echo "❌ Error: " . $conn->error;
}

$conn->close();
?>
