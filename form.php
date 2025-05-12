<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database host
$username = "denyse"; // Change this to your database username
$password = "222003006"; // Change this to your database password
$dbname = "bookingticketmanagementsystem"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userId = $_POST['userId'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Add other form fields here

    // Prepare SQL statement
    $sql = "INSERT INTO users (userId, username, password) VALUES ('$userId', '$username', '$password')";
    // Add other form fields to the SQL statement accordingly

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
