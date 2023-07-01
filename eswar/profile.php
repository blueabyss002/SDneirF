<?php
session_start();

// Assuming you have already established a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the user's email and username from the database
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    // Prepare and execute the SQL query
    $sql = "SELECT email FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
    } else {
        $email = "Email not found";
    }
} else {
    // User is not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .account-box {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            color: #333;
        }
        
        p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="account-box">
            <h2>User name:<?php echo $username; ?>!</h2>
            <p>Email: <?php echo $email; ?></p>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
