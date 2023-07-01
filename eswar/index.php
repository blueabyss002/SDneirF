<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'user';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful, redirect to home page
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
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
  </style>
</head>
<body>
  <div class="container">
    <div class="login-image">
      <img src="loginlogo.jpg" alt="Logo">
    </div>
    <h2>Login</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="input-group">
          <label>Username:</label>
          <input type="text" name="username" required>
        </div>
        <div class="input-group">
          <label>Password:</label>
          <input type="password" name="password" required>
        </div>
        <div class="input-group">
          <button type="submit" class="btn">Login</button>
          <p>Don't have an account? <a href="signup.php">Create one</a></p>
        </div>
    </form>
  </div>


</body>
</html>
