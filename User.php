<?php
// Database connection
require_once("./connection.php");
session_start();

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch members data
$sql = "SELECT * FROM user ORDER BY nama ASC";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quest Hotel Kuta - User</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
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

      /* di class sidebar ditambah margin, position sma transition  ===========================================================================================================*/
      .sidebar {
        width: 250px;
        height: 130vh;
        background-color: #6c217f;
        color: #ecf0f1;
        padding: 20px;
        display: flex;
        margin: 0px 0px 0px -250px;
        flex-direction: column;
        justify-content: space-between;
        position: absolute;
        transition: .5s;
      }

      .sidebar_header{
        display: flex;
        justify-content: space-between;
        height: 80px;
        padding-right: 10px;
      
      }
      
      .sidebar h2 {
        font-size: 20px;
        margin-top: 20px;
        margin-bottom: 10px;
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

      /* Table Styling */
      .table-container {
        margin-top: 20px;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      table {
        width: 100%;
        border-collapse: collapse;
      }

      table th,
      table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
        font-size: 14px;
        color: #333;
      }

      table th {
        background-color: #f7f7f7;
        color: #6c217f;
        font-weight: bold;
      }

      .profile-pic {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
      }

      .status {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        color: #fff;
        display: inline-block;
      }

      .status.active {
        background-color: #a0e9a0;
      }

      .status.inactive {
        background-color: #f78a8a;
      }

      .icon-btn {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 16px;
        color: #6c217f;
        margin-right: 8px;
      }

      .login-btn {
        padding: 5px 10px;
        background-color: #6c217f;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        text-decoration: none;
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

      .add-button-container {
        display: flex;
        justify-content: flex-end;
      }

      /* Add Button Styling */
      .add-button {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #6c217f;
        color: white;
        font-size: 24px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease;
        margin-top: 15px;
        text-decoration: none;
      }

      .add-button:hover {
        background-color: #8a3f9c; /* Ubah warna saat hover */
      }

      /* Pop-up Styling */
      .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
      }

      .popup:target {
        display: flex;
      }

      .popup-content {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        width: 300px;
        max-width: 80%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        position: relative;
        text-align: center;
      }

      #popupEdit {
        display: none;
      }

      #popupDelete {
        display: none;
      }

      #popupAdd {
        display: none;
      }

      .popup-content h2 {
        color: #6c217f;
        margin-bottom: 10px;
      }

      .popup-content form {
        display: flex;
        flex-direction: column;
        gap: 10px;
      }

      .popup-content input,
      .popup-content button {
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ddd;
      }

      .popup-content button {
        background-color: #6c217f;
        color: #fff;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      .popup-content button:hover {
        background-color: #8a3f9c;
      }

      .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 18px;
        color: #333;
        text-decoration: none;
      }

      /* Table Action Buttons */
      .table-container button {
        background-color: #6c217f;
        color: #fff;
        border: none;
        padding: 5px 8px; /* Adjusted padding for smaller button */
        border-radius: 4px;
        cursor: pointer;
        margin: 5px;
        text-decoration: none;
        font-size: 12px; /* Adjusted font size for smaller button */
      }

      .link-button {
        padding: 5px 10px; /* Adjusted padding for smaller button */
        background-color: #6c217f;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        font-size: 14px; /* Adjusted font size for consistency */
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        text-align: center;
      }

      .link-button:hover {
        background-color: #8a3f9c; /* Hover effect for consistency */
      }

            @media only screen and (max-width:375px) {
  /* For tablets: */
  .main {
    width: 80%;
    padding: 0;
  }
  .right {
    width: 100%;
  }

  table th,
  table td{
    font-size: 9px !important;
    padding: 8x;
  }
}
@media only screen and (max-width:500px) {
  /* For mobile phones: */
  .menu, .main, .right {
    width: 100%;
  }

  table th,
  table td{
    font-size: 9px !important;
    padding: 5px;
  }

  .content {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        grid-template-rows: auto;
      }
  
      .sidebar {
        width: 150px;
      }
}
    /* burger menu sama burger menu img ditambah g ari  ===========================================================================================================*/
      #burger_menu{
        display: relative;
        background-color: #6c217f;
        border-radius: 5px;
      }

      #burger_menu img{
        width: 40px;
        height: 40px;
      }

      #burger_menu_sidebar{
        background-color:#6c217f;
        border: 0px;
      }

      #burger_menu_sidebar img{
        width: 40px;
        height: 40px;
      }

  /* .sidebar{
    display: none !important;
  } */

    </style>
  </head>
  <body>
    <!-- Sidebar -->
    <div class="sidebar">
      <nav>
         <!-- sidebar header diubah g ari  ===========================================================================================================-->
        <div class="sidebar_header">
          <button id="burger_menu_sidebar">
            <img src="./img/Logo/interface.png" alt="">
          </button>
          <h2>Bulu Tangkis</h2>
        </div>
        <!-- sampe sini  -->
        
        <a href="Dashboard.php" class="underline-animation">Dashboard</a>
        <a href="User.php" class="underline">User </a>
        <a href="absensi.php" class="underline-animation">Absensi</a>
        <a href="index.php" class="underline-animation">Logout</a>
      </nav>
      <footer>
        <p style="font-size: 14px; color: #ffffff; text-align: center">
          &copy; 2024 IT
        </p>
      </footer>
      
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <!-- Header -->
      <div class="header">
        <button id="burger_menu">
          <img src="./img/Logo/interface.png" alt="">  
        </button>
        <h1>User</h1>
        <?php
          $uname_login = $_SESSION['nama'];

          $sql_login = "SELECT foto_profil FROM user WHERE nama = '$uname_login'";
          $result_login = $connection->query($sql_login);
          
          $row_login = $result_login->fetch_assoc();''
        ?>
        <div class="profile">
          <img src="upload/<?php echo $row_login['foto_profil'] ?>" alt="Profile Picture" />
          <span><?php echo($_SESSION["nama"])?></span>
        </div>
      </div>

      <div class="add-button-container">
        <a
          href="#popupAdd"
          class="add-button"
          onclick="document.getElementById('popupAdd').style.display = 'flex';"
          >+</a
        >
        <!-- Tambahkan tombol di sini -->
      </div>
      <!-- User Table -->
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Photo</th>
              <th>Member name</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td>
                    <img 
                        src="upload/<?php echo $row['foto_profil']?>"
                        class="profile-pic"
                        alt="Profile picture"
                    />
                </td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['telpon']; ?></td>
                <td><?php echo $row['divisi']; ?></td>
                <td>
                    <a 
                        href="#popupEdit" 
                        class="link-button"
                        onclick="document.getElementById('popupEdit').style.display = 'flex';">
                        Edit
                    </a>
                   <a 
                        href="#popupDelete" 
                        class="link-button"
                        onclick="document.getElementById('popupDelete').style.display = 'flex';"
                    >
                        Delete
                    </a>

                </td>
            </tr>
        <?php endwhile; ?>
        </table>
      </div>
    </div>

    <!-- Pop-up Add -->
    <div class="popup default-popup" id="popupAdd">
      <div class="popup-content">
        <a href="User.php" class="close-btn">&times;</a>
        <h2>Add User</h2>
        <form action="add_user.php" method="POST" enctype="multipart/form-data">
          <input type="text" placeholder="Enter name" name="nama" />
          <input type="text" placeholder="Enter phone number" required name="telpon"/>
          <input type="text" placeholder="Divisi" required name="divisi"/>
          <input type="text" placeholder="Jenis Kelamin" required name="jenis_kelamin"/>
          <input type="password" placeholder="Password" required name="password"/>

          <label for="foto_pfofile">Foto Profil</label>
          <input
            type="file"
            name="foto_profil"
            placeholder="Foto Profile"
            required
          />

          <button
            type="submit"
            onclick="document.getElementById('popupAdd').style.display = 'none';"
          >
            Add
          </button>
        </form>
      </div>
    </div>

    <!-- Pop-up Edit -->
    <div class="popup default-popup" id="popupEdit">
      <div class="popup-content">
        <a href="./User.php" class="close-btn">&times;</a>
        <h2>Edit User</h2>
        <form>
          <input type="text" placeholder="Enter new name" required />
          <input type="text" placeholder="Enter new password" required />
          <input type="email" placeholder="Enter new phone number" required />
          <button
            type="submit"
            onclick="document.getElementById('popupEdit').style.display = 'none';"
          >
            Save Changes
          </button>
        </form>
      </div>
    </div>

    <!-- Pop-up Delete -->
    <div class="popup" id="popupDelete">
      <div class="popup-content">
        <a href="./User.php" class="close-btn">&times;</a>
        <h2>Delete User</h2>
        <p>Are you sure you want to delete this user?</p>
        <button
          onclick="document.getElementById('popupDelete').style.display = 'none';"
        >
        <a href="delete user.php?id=USER_ID" style="color: white; text-decoration: none;">
            Yes, Delete
        </a>
        </button>
        <button
          onclick="document.getElementById('popupDelete').style.display = 'none';"
        >
          <a href="./User.php" style="color: white; text-decoration: none"
            >Cancel</a
          >
        </button>
      </div>
    </div>
  </body>
    <!-- script js ditambah g ari  ===========================================================================================================-->
  <script>

    //burger menu yang ada di sidebar
    document.getElementById("burger_menu_sidebar").addEventListener('click', hideSidebar);

    //burger menu yang di luar sidebar
    document.getElementById("burger_menu").addEventListener('click', showSidebar);

    
    function showSidebar(){
      const sidebar = document.getElementsByClassName("sidebar");
      sidebar[0].style.margin = "0px";
      
    }
    function hideSidebar(){
      const sidebar = document.getElementsByClassName("sidebar");
      sidebar[0].style.margin = "0px 0px 0px -250px";
    }

  </script>
  <!-- sampe sini  -->
</html>
