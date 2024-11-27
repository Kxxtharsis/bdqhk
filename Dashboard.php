<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quest Hotel Kuta - Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="./img/QuestHotelLogo.png" />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }

      body {
        display: flex;
        min-height: 100vh;
        background-color: #f0f2f5;
      }

      .sidebar {
        width: 250px;
        background-color: #6c217f;
        color: #ecf0f1;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }

      .sidebar h2 {
        font-size: 20px;
        margin-bottom: 30px;
        text-align: center;
      }

      .sidebar nav a {
        display: block;
        padding: 10px 15px;
        color: #ecf0f1;
        text-decoration: none;
        margin-bottom: 5px;
        font-size: 16px;
      }

      .sidebar nav h2 {
        margin-bottom: 50px;
      }

      .main-content {
        flex: 1;
        padding: 20px;
        display: flex;
        flex-direction: column;
      }

      .header {
        background-color: #ffffff;
        padding: 15px 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .header h1 {
        font-size: 24px;
        color: #6c217f;
      }

      .header .profile {
        display: flex;
        align-items: center;
      }

      .header .profile img {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        margin-right: 10px;
      }

      .content {
        margin-top: 20px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        grid-template-rows: auto;
        gap: 20px;
        /* justify-self: center; */
        /* align-items: center */
      }

      .card {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
      }

      .card h3 {
        font-size: 20px;
        color: #6c217f;
        margin-bottom: 10px;
      }

      .card p {
        font-size: 16px;
        color: #7f8c8d;
      }

      .card .value {
        font-size: 32px;
        color: #6c217f;
        margin-top: 10px;
      }
      /* Basic link styling */
      .underline-animation {
        position: relative;
        text-decoration: none;
        color: #333;
        font-size: 24px;
        font-weight: bold;
      }

      /* Create the underline effect */
      .underline-animation::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background-color: #ffffff;
        transform: scaleX(0);
        transform-origin: bottom right;
        transition: transform 0.3s ease;
      }

      /* Hover effect to animate underline */
      .underline-animation:hover::after {
        transform: scaleX(1);
        transform-origin: bottom left;
      }

      /* Active class to keep underline visible */
      .underline-animation.active::after {
        transform: scaleX(1);
        transform-origin: bottom left;
      }
      .underline {
        position: relative;
        text-decoration: none;
        color: #333;
        font-size: 24px;
        font-weight: bold;
        border-bottom-style: solid;
        border-width: 2px;
        border-color: white;
      }

      .slideshow-container {
        position: relative;
        max-width: 70%;
        height: 500px;
        overflow: hidden;
        display: flex;
        margin-top: 20px;
        justify-items: center;
      }

      input[type="radio"] {
        display: none; /* Hide radio buttons */
      }

      .slides {
        display: flex;
        transition: transform 0.5s ease-in-out;
      }

      .slide {
        min-width: 100%;
        transition: opacity 0.5s ease;
      }

      .slide img {
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        object-fit: cover;
      }

      /* Show the corresponding slide */
      #slide1:checked ~ .slides {
        transform: translateX(0);
      }

      #slide2:checked ~ .slides {
        transform: translateX(-100%);
      }

      #slide3:checked ~ .slides {
        transform: translateX(-200%);
      }
      /* Navigation buttons */
      .navigation {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
      }

      .nav-button {
        cursor: pointer;
        height: 10px;
        width: 10px;
        background-color: white;
        border-radius: 50%;
        display: inline-block;
        margin: 0 5px;
      }

      /* Show the corresponding slide */
      #slide1:checked ~ .slides {
        transform: translateX(0);
      }

      #slide2:checked ~ .slides {
        transform: translateX(-100%);
      }

      #slide3:checked ~ .slides {
        transform: translateX(-200%);
      }
      .selamat-datang {
        color: #6c217f;
        font-size: 30px;
        text-align: center;
        margin-top: 30px;
      }
      .row {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap; /* IE10 */
        flex-wrap: wrap;
        padding: 0 4px;
        margin-top: 10px;
      }

      /* Create four equal columns that sits next to each other */
      .column {
        -ms-flex: 25%; /* IE10 */
        flex: 25%;
        max-width: 25%;
        padding: 0 4px;
      }

      .column img {
        margin-top: 8px;
        vertical-align: middle;
        width: 100%;
      }

      /* Responsive layout - makes a two column-layout instead of four columns */
      @media screen and (max-width: 800px) {
        .column {
          -ms-flex: 50%;
          flex: 50%;
          max-width: 50%;
        }
      }

      /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
      @media screen and (max-width: 600px) {
        .column {
          -ms-flex: 100%;
          flex: 100%;
          max-width: 100%;
        }
      }

      .icon-image {
        width: 50px;
        height: 50px;
        background-image: url(./img/Logo/calendar.png);
      }

      .icon {
        display: inline-block;
        width: 50px;
        height: 50px;
        margin-right: 10px;
        vertical-align: middle;
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    <!-- Sidebar -->
    <div class="sidebar">
      <nav>
        <h2>Bulu Tangkis</h2>
        <a href="Dashboard.php" class="underline">Dashboard</a>
        <a href="User.php" class="underline-animation">User</a>
        <a href="absensi.php" class="underline-animation">Absensi</a>
        <a href="index.php" class="underline-animation">Logout</a>
      </nav>
      <footer>
        <p style="font-size: 14px; color: #ffffff; text-align: center">
          &copy; 2024 Lavie
        </p>
      </footer>
    </div>
    <!-- Main Content -->
    <div class="main-content">
      <!-- Header -->
      <div class="header">
        <h1>Dashboard</h1>
        <div class="profile">
          <img src="https://via.placeholder.com/35" alt="Profile Picture" />
          <span>Admin</span>
        </div>
      </div>

      <h1 class="selamat-datang">Selamat Datang</h1>

      <center>
        <div class="content">
          <div class="card">
            <h3>EVENT</h3>
            <p>Setiap Hari Kamis</p>
            <span
              class="icon"
              style="
                background-image: url(./img/Logo/calendar.png);
                background-size: cover;
              "
            ></span>
          </div>
          <div class="card">
            <h3>BADMINTON</h3>
            <p>Jangan Lupa Bawa Raket</p>
            <span
              class="icon"
              style="
                background-image: url(./img/Logo/badminton.png);
                background-size: cover;
              "
            ></span>
          </div>
          <div class="card">
            <h3>TIME</h3>
            <p>Setiap Jam 5:00 PM</p>
            <span
              class="icon"
              style="
                background-image: url(./img/Logo/time.png);
                background-size: cover;
              "
            ></span>
          </div>
          <div class="card">
            <h3>LOKASI</h3>
            <p>Lapangan BR. Teba Sari Kuta</p>
            <span
              class="icon"
              style="
                background-image: url(./img/Logo/map.png);
                background-size: cover;
              "
            ></span>
          </div>
        </div>
      </center>

      <center>
        <div class="row">
          <div class="column">
            <img src="./img/bulu-tangkis.jpg" style="width: 100%" />
            <img src="./img/raket.jpg" style="width: 100%" />
            <!-- <img
              src="https://www.w3schools.com/w3images/falls2.jpg"
              style="width: 100%"
            /> -->
            <!-- <img
              src="https://www.w3schools.com/w3images/paris.jpg"
              style="width: 100%"
            /> -->
            <!-- <img
              src="https://www.w3schools.com/w3images/nature.jpg"
              style="width: 100%"
            /> -->
            <!-- <img
              src="https://www.w3schools.com/w3images/mist.jpg"
              style="width: 100%"
            /> -->
            <!-- <img
              src="https://www.w3schools.com/w3images/paris.jpg"
              style="width: 100%"
            /> -->
          </div>
          <div class="column">
            <img src="./img/2.jpg " style="width: 100%" />
            <img src="./img/10.jpg" style="width: 100%" />
            <img src="./img/5.jpg" style="width: 100%" />
            <!-- <img
              src="https://www.w3schools.com/w3images/mountainskies.jpg"
              style="width: 100%"
            /> -->
            <!-- <img
              src="https://www.w3schools.com/w3images/rocks.jpg"
              style="width: 100%"
            /> -->
            <!-- <img
              src="https://www.w3schools.com/w3images/underwater.jpg"
              style="width: 100%"
            /> -->
          </div>
          <div class="column">
            <img src="./img/4.jpg" style="width: 100%" />
            <img src="./img/3.jpg" style="width: 100%" />

            <!-- <img
              src="https://www.w3schools.com/w3images/falls2.jpg"
              style="width: 100%"
            /> -->
            <!-- <img
              src="https://www.w3schools.com/w3images/paris.jpg"
              style="width: 100%"
            /> -->
            <!-- <img
              src="https://www.w3schools.com/w3images/nature.jpg"
              style="width: 100%"
            /> -->
            <!-- <img
              src="https://www.w3schools.com/w3images/mist.jpg"
              style="width: 100%"
            /> -->
            <!-- <img
              src="https://www.w3schools.com/w3images/paris.jpg"
              style="width: 100%"
            /> -->
          </div>
          <div class="column">
            <img src="./img/13.jpg" style="width: 100%" />
            <img src="./img/11.jpg" style="width: 100%" />
            <img src="./img/8.jpg" style="width: 100%" />
            <!-- <img
              src="https://www.w3schools.com/w3images/mountainskies.jpg"
              style="width: 100%"
            /> -->
            <!-- <img
              src="https://www.w3schools.com/w3images/rocks.jpg"
              style="width: 100%"
            /> -->
            <!-- <img
              src="https://www.w3schools.com/w3images/underwater.jpg"
              style="width: 100%"
            /> -->
          </div>
        </div>
      </center>
      <!-- Content -->
    </div>
  </body>
</html>
