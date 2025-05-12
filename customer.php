<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        /* Global styles for links */
        a {
            padding: 10px;
            color: white;
            background-color: pink;
            text-decoration: none;
            margin-right: 15px;
        }

        a:visited {
            color: purple;
        }

        a:link {
            color: brown;
        }

        a:hover {
            background-color: white;
        }

        a:active {
            background-color: red;
        }

        /* Styles for search button and input */
        button.btn {
            margin-left: 15px;
            margin-top: 4px;
            background-color: blue;
            border: none;
        }

        input.form-control {
            width: 200px; /* Adjust width as needed */
            padding: 8px;
        }

        /* Styles for table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<header>
    <!-- Navigation Menu -->
    <ul style="list-style-type: none; padding: 0;">
        <li style="display: inline;"><a href="./home.html">HOME</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./about.html">ABOUT</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./contact.html">CONTACT</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./customer.php">CUSTOMER</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./menu.html">MENU</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./orders.html">ORDERS</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./payment.html">PAYMENT</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./restaurant.html">RESTAURANT</a></li>
        <li class="dropdown" style="display: inline; margin-right: 10px;">
            <a href="#" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
            <div class="dropdown-contents">
                <!-- Dropdown Links -->
                <a href="login.html">Login</a>
                <a href="register.html">Register</a>
                <a href="logout.php">Logout</a>
            </div>
        </li>
    </ul>
</header>

<section>
    <h1><u>Customer Form</u></h1>
    <form method="post">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id"><br><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="phone">Phone:</label>
        <input type="number" id="phone" name="phone" required><br><br>
        <label for="Email">Email:</label>
        <input type="email" id="Email" name="Email" required><br><br>
        <input type="submit" name="insert" value="Insert"><br><br>
    </form>


<?php
// Connection details
$host = "localhost";
$user = "ndatimana";
$pass = "222007958";
$database = "food_ordering_system";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO customer(Id, address, name, phone,Email) VALUES (?, ?, ?, ?,?)"); 
    $stmt->bind_param(" sss", $id, $address, $name, $phone,$Email);
    // Set parameters and execute
    $id = $_POST['id'];
    $address = $_POST['address'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
     $Email= $_POST['Email'];
   
    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$connection->close();
?>

<?php
// Connection details
$host = "localhost";
$user = "ndatimana";
$pass = "222007958";
$database = "food_ordering_system";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
// SQL query to fetch data from the customer table
$sql = "SELECT * FROM customer";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of customer</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Table of customer</h2></center>
    <table border="5">
        <tr>
            <th> Id</th>
            <th>address</th>
            <th>name</th>
            <th>phone</th>
             <th>Email</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        // Define connection parameters
        $host = "localhost";
        $user = "ndatimana";
        $pass = "222007958";
        $database = "food_ordering_system";

        // Establish a new connection
        $connection = new mysqli($host, $user, $pass, $database);

        // Check if connection was successful
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // Prepare SQL query to retrieve all products
        $sql = "SELECT * FROM customer";
        $result = $connection->query($sql);

        // Check if there are any customer
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $cid = $row['id']; // Fetch the customer_Id
                echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['address'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['Email'] . "</td>
                    <td><a style='padding:4px' href='delete_customer.php?customer_Id=$cid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_customer.php?customer_Id=$cid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
</body>

    </section>


  
<footer>
  <center> 
    <b><h2>UR CBE BIT &copy, 2024 &reg, Designer by: @NDATIMANA Gentille</h2></b>
  </center>
</footer>
</body>
</html>