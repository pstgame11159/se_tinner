<?php 
      if(!isset($_SESSION)) 
      {  
          session_start(); 
      } 
      if (!isset($_SESSION['admin_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: login.php');
    }
    require_once './connection/server.php';

?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tinner</title>
    <link rel="stylesheet"href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
    <link rel="stylesheet" href="style.css" />
    <style>
.dropdown {
  position: fixed;
  left: 0;
  bottom: 0;
}
.dropbtn {
  background-color: transparent;
  color: black;
  padding: 0;
  border: none;
  cursor: pointer;
}
.dropdown-content {
  display: none;
  position: absolute;
  z-index: 1;
  min-width: 160px;
  bottom: 100%;
}
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown:hover .dropdown-content {
  display: block;
}
</style>
  </head>
  <body>

    <aside class="sidebar" >
      <header class="sidebar-header">
        <img class="logo-img" src="./Profile.png" />
        <i class="logo-icon uil uil-instagram"></i>
      </header>
      <nav>

                     <button id="home-button">
                  <span>
                    <i class="uil uil-estate"></i>
                    <span>Home</span>
                  </span>
                </button>


                <button id="messages-button">
                  <span>
                    <i class="uil uil-location-arrow">
                      
                    </i>
                    <span>Messages</span>
                  </span>
                </button>

                <button id="notifications-button">
                  <span>
                    <i class="uil uil-heart">
                      <em></em>
                    </i>
                    <span>Swipe</span>
                  </span>
                </button>

                <button id="profile-button">
                  <span>
                    <img src="upload_gallery/<?php echo $_SESSION['username']."_1.jpg"; ?>"/>
                    <span><?php echo $_SESSION['fullname']; ?></span>
                  </span>
                </button>

                <div class="dropdown">
                <button id="more-button" class="dropbtn">
                  <span>
                    <i class="uil uil-bars"> </i>
                    <span>More</span>
                  </span>
                </button>
                <div class="dropdown-content">
                <a href="edit_profile.php">ตั้งค่าโปรไฟล์</a>
                  <a href="logout.php">ออกจากระบบ</a>
                </div>
                
              </div>


      </nav>
    </aside>

  </body>
</html>

<script>
  const homeButton = document.getElementById("home-button");
  homeButton.addEventListener("click", function() {
    window.location.href = "index.php"; // ใส่ # เพื่อไม่ไปยังหน้าอื่น
  });

  const searchButton = document.getElementById("messages-button");
  searchButton.addEventListener("click", function() {
    window.location.href = "chat2.php"; // ใส่ # เพื่อไม่ไปยังหน้าอื่น
  });



  const swipeButton = document.getElementById("notifications-button");
  swipeButton.addEventListener("click", function() {
    window.location.href = "swipe.php"; // ใส่ # เพื่อไม่ไปยังหน้าอื่น
  });
  </script>