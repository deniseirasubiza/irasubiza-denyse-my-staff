<?php
// Connection details
$host = "localhost";
$user = "root";
$pass = " ";
$database = "bookingticketmanagementsystem";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Handling POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving form data
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $fullname= $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    
    // Preparing SQL query
    $sql = "INSERT INTO user (userid, username, email, fullname, password, phonenumber, address) 
            VALUES ('$userid', '$username', '$email', '$fullname', '$password', '$phonenumber', '$address')";

    // Executing SQL query
    if ($connection->query($sql) === TRUE) {
        // Redirecting to login page on successful registration
        header("Location: login.html");
        exit();
    } else {
        // Displaying error message if query execution fails
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Closing database connection
$connection->close();
?>
