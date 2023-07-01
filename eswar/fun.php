<!DOCTYPE html>
<html>
<head>
  <title>TripAdvisor</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #00a680;
      color: #fff;
      padding: 10px;
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
    }

    nav ul {
      list-style: none;
      display: flex;
    }

    nav ul li {
      margin-right: 15px;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
    }

    main {
      text-align: center;
      padding-top: 50px;
    }
    .grid-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 20px;
        justify-items: center;
      }

    .place-card {
      display: inline-block;
      width: 300px;
      padding: 20px;
      margin: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      text-align: left;
    }

    .place-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 5px;
    }

    .place-card h3 {
      margin-top: 10px;
    }

    .place-card p {
      margin-top: 5px;
      color: #666;
    }

    footer {
      background-color: #f2f2f2;
      padding: 10px;
      text-align: center;
    }

    footer p {
      margin: 0;
    }
   

    .search-bar {
      margin-bottom: 20px;
    }

    .search-bar input[type="text"] {
      padding: 10px;
      width: 300px;
      font-size: 16px;
    }

    .search-bar button {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #00a680;
      color: #fff;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <header>
    <nav>
      <div class="logo">FUN</div>
    </nav>
  </header>

  <main>
    <div class="search-bar">
      <input type="text" placeholder="Search...">
      <button>Search</button>
    </div>
  
    <div class="grid-container">
      <div class="place-card">

        <a href="reviewpage/index.php"><img src="log.png" alt="Place 1"></a>

        <h3>Place 1</h3>
      
      </div>
      <div class="place-card">
        <img src="place2.jpg" alt="Place 2">
        <h3>Place 2</h3>
        <p>Description of Place 2</p>
      </div>
      <div class="place-card">
        <img src="place3.jpg" alt="Place 3">
        <h3>Place 3</h3>
        <p>Description of Place 3</p>
      </div>
      <div class="place-card">
        <img src="place4.jpg" alt="Place 4">
        <h3>Place 4</h3>
        <p>Description of Place 4</p>
      </div>
      <div class="place-card">
        <img src="place5.jpg" alt="Place 5">
        <h3>Place 5</h3>
        <p>Description of Place 5</p>
      </div>
      <div class="place-card">
        <img src="place6.jpg" alt="Place 6">
        <h3>Place 6</h3>
        <p>Description of Place 6</p>
      </div>
      <div class="place-card">
        <img src="place7.jpg" alt="Place 7">
        <h3>Place 7</h3>
        <p>Description of Place 7</p>
      </div>
      <div class="place-card">
        <img src="place8.jpg" alt="Place 8">
        <h3>Place 8</h3>
        <p>Description of Place 8</p>
      </div>
      <div class="place-card">
        <img src="place9.jpg" alt="Place 9">
        <h3>Place 9</h3>
        <p>Description of Place 9</p>
      </div>
      <div class="place-card">
        <img src="place10.jpg" alt="Place 10">
        <h3>Place 10</h3>
        <p>Description of Place 10</p>
      </div>
      <div class="place-card">
        <img src="place11.jpg" alt="Place 11">
        <h3>Place 11</h3>
        <p>Description of Place 11</p>
      </div>
      <div class="place-card">
        <img src="place12.jpg" alt="Place 12">
        <h3>Place 12</h3>
        <p>Description of Place 12</p>
      </div>
      <div class="place-card">
        <img src="place13.jpg" alt="Place 13">
        <h3>Place 13</h3>
        <p>Description of Place 13</p>
      </div>
      <div class="place-card">
        <img src="place14.jpg" alt="Place 14">
        <h3>Place 14</h3>
        <p>Description of Place 14</p>
      </div>
      <div class="place-card">
        <img src="place15.jpg" alt="Place 15">
        <h3>Place 15</h3>
        <p>Description of Place 15</p>
      </div>
      <div class="place-card">
        <img src="place16.jpg" alt="Place 16">
        <h3>Place 16</h3>
        <p>Description of Place 16</p>
      </div>
    </div>
  </main>
  

  <footer>
    <p>&copy; 2023 TripAdvisor. All rights reserved.</p>
  </footer>
</body>
</html>