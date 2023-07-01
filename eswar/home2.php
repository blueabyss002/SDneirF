<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'user';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to handle the click event on the account button
function showAccountOptions() {
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];

    $accountBox = '<div class="account-box">
                        <div class="profile-info">
                            <p><strong>Username:</strong> ' . $username . '</p>
                            <p><strong>Email:</strong> ' . $email . '</p>
                        </div>
                        <div class="options">
                            <a href="logout.php"><img src="logout.png" alt="Logout"></a>
                        </div>
                    </div>';

    echo $accountBox;
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
  <style>
    /* CSS styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-image: url("hyberdad.jpg");
      background-size: cover;
      background-position: center;
    }

    .container {
      background-color: #ffffff;
      border-radius: 30px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      padding: 30px;
      width: 500px;
      max-width: 100%;
      box-sizing: border-box;
      border: 4px solid #1100ff;
      margin-left: 650px;
      margin-bottom: 35px;
      position: relative;
    }

    h2 {
      text-align: center;
      margin-top: 0;
      font-size: 25px;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 20px;
      margin-bottom: 10px;
      border: 1px solid #8de8ff;
      background-color: #f1f1f1;
    }

    .btn {
      background-color: #4154fd;
      color: #ffffff;
      border: none;
      padding: 10px 20px;
      font-size: 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.5s ease;
      margin-top: 30px;
      margin-bottom: 15px;
      width: 50%;
      margin-left: auto;
      margin-right: auto;
      display: block;
    }

    .btn:hover {
      transform: scale(1.1);
      transition: transform 0.5s ease;
      background-color: #3a9d3c;
    }

    .login-image {
      text-align: center;
    }

    .login-image img {
      max-width: 200px;
    }
        a:hover {
      color: #00c603;
      text-decoration: underline;
    }

    /* New CSS for the profile box */
    .profile-box {
      display: none;
      background-color: #f1f1f1;
      padding: 20px;
      border-radius: 10px;
      margin-top: 10px;
    }

    .profile-box p {
      margin: 0;
      padding: 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Welcome, <span id="profileUsername"></span>!</h2>
    <div id="profileBox" class="profile-box">
      <p><strong>Your Profile Info:</strong></p>
      <p>Username: <span id="profileUsername"></span></p>
      <p>Email: <span id="profileEmail"></span></p>
    </div>
    <div class="login-image">
      <img src="login-image.png" alt="Login Image">
    </div>
  </div>

  <script>
    // JavaScript function
    function showProfile(username, email) {
      const profileUsername = document.getElementById('profileUsername');
      const profileEmail = document.getElementById('profileEmail');
      profileUsername.textContent = username;
      profileEmail.textContent = email;
      const profileBox = document.getElementById('profileBox');
      profileBox.style.display = 'block';
    }

    // Simulating successful login
    const loggedInUser = {
      username: "JohnDoe",
      email: "johndoe@example.com"
    };

    // Call showProfile function with the logged in user's details
    showProfile(loggedInUser.username, loggedInUser.email);
  </script>
</body>

</html>