
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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(hyd.jpg);
            background-size: cover;
            background-position: 0px;
        }

        header {
            color: #ffffff;
            padding: 100px;
            text-align: 500px;
            display: flex;
            margin-top: 10px;
            margin-left: 600px;
            justify-content: space-between;
            align-items: center;
        }
        header a {
            text-decoration: none;
            color: #fff;
        }
        
        nav {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        
        nav a {
            text-decoration: none;
            color: #333;
            padding: 0 10px;
            transition: background-color 0.3s ease;
            border-radius: 5px;
        }
        
        nav a:hover {
            background-color: #ffffff;
            color: #413f3f;
        }
        
        main {
            padding: 20px;
            box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin: 20px auto;
            max-width: 1300px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        section {
            margin-bottom: 20px;
            cursor: pointer; 
        }
        
        h2 {
            color: #3b3b3b; 
            margin-bottom: 10px;
        }
        
        p {
            color: #504e4e;
        }
        
        .search-bar {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 170px; 
        }
        
        .search-bar input[type="text"] {
            padding: 15px;
            font-size: 20px;
            border-radius: 30px;
            border: none;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }
        
        .search-bar button {
            padding: 15px 30px;
            font-size: 20px;
            background-color: #2b2b2c; 
            color: #fff;
            border: none;
            border-radius: 30px;
            margin-left: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .search-bar button:hover {
            background-color: #6278dd; 
        }
        
        .card-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-top: auto; 
            margin-bottom: 150px; 
        }
        
        .card {
            background-color: #8fa900;
            padding: 20px;
            border-radius: 50px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.5s ease;
            width: 350px;
            height: 400px;
            margin: 10px;
        }
        .card img {
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            border-radius: 50%; 
       }
        
        .card:hover {
            transform: scale(1.05);
            background-color: #ffffff; 
        }
        
        .hide-account .account-image {
            display: none;
        }
        
        .hide-account .account-options {
            margin-top: 10px;
        }
        
        
        .card h2 {
            color: #000000;
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .card p {
            color: #292929;
        }
        
        footer {
            background-color: #ffffff;
            color: #000000;
            padding: 20px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .option-card {
            background-color: #f1f1f1;
            padding: 10px;
            margin-bottom: 5px;
        }
        
        
        footer a {
            color: #000000;
            margin: 0 10px;
            text-decoration: none;
        }
        
        /* Updated CSS */
        .account-box {
            background-color: #f1f1f1;
            padding: 10px;
            margin-top: 10px;
            position: absolute;
            right: 0;
            top: 200px;
            width: 200px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            display: none;
            transition: all 0.3s ease;
            z-index: 2;
        }
        
        .account-box a {
            text-decoration: none;
            color: #333;
            padding: 12px 25px;
            transition: background-color 0.3s ease;
            display: block;
        }
        
        .account-box a:hover {
            background-color: #f1f1f1;
        }
        
        .account-box p {
            margin: 12px;
        }
        
        .account-box img {
            width: 50px;
            height: 50px;
            margin-right: 12px;
        }
        
        .account:hover .account-box {
            display: block;
        }
        
        .show-account-box {
            display: block;
            height: 300px;
        }
        
        .account-image {
            cursor: pointer;
            outline: none;

        }
        
        .account-options {
            display: flex;
            flex-direction: column;
            margin-top: 25px;
        }
    </style>
</head>
<body>
<header>
<h1 style="font-size: 90px; color: blue; font-weight: bold; position: absolute; top: 0; left: 0; ; ">ExploreEats</h1>
    <div class="account" style="position: absolute; top: 0; right: 0;padding: 50px">
        <button class="account-image" onclick="showAccountOptions()">
            <img src="account.png" alt="Account" width="30" height="40">
        </button>
        <div id="accountOptions" class="account-box"></div>
    </div>
</header>



    <main>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <button>Search</button>
        </div>

        <div class="card-container">
            <section id="places" class="card" onclick="scrollToSection('places')">
                <h2>Places</h2>
                
                
                <a href="fun.php"><img src="place.jpg" alt="Places"></a>

            </section>

            <section id="food" class="card" onclick="scrollToSection('food')">
                <h2>Food</h2>
                <img src="food.png" alt="Food">
            </section>
        </div>
    </main>

    <footer>
        <a href="#" class="social-media">Facebook</a>
        <a href="#" class="social-media">Twitter</a>
        <a href="#" class="social-media">Instagram</a>
        <a href="#" class="social-media">LinkedIn</a>
        <p>&copy; 2023 Your Website. All rights reserved.</p>
    </footer>
    <!-- Display the account options -->
  <?php showAccountOptions(); ?>
<script>
    // Function to handle the click event on the account button and show account options
    function showAccountOptions() {
        var accountOptions = document.getElementById("accountOptions");

        
            accountOptions.innerHTML = '<p>Welcome, ' + '</p>' +
                '<a href="profile.php"><button class="option-card"><img src="profile.png" alt="Profile" width="20" height="20">Profile</button></a>' +
                '<a href="index.php"><button class="option-card"><img src="logout.png" alt="Logout" width="20" height="20">Logout</button></a>';
            accountOptions.style.display = "block";
        
    }
    

    // Function to scroll to a section on card click
    function scrollToSection(sectionId) {
        var section = document.getElementById(sectionId);
        section.scrollIntoView({ behavior: 'smooth' });
    }

    // Event listener for account button click
    var accountButton = document.querySelector('.account');
    accountButton.addEventListener('click', showAccountOptions);
</script>
<?php showAccountOptions(); ?>
    <!-- Display the account options -->
      
</body>
</html>
