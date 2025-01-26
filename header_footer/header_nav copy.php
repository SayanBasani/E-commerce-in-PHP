<?php
session_start();
$user_type = "";
// Check if user is logged in
if (isset($_SESSION['user_email'])) {
  $user_type = $_SESSION['user_type'];
  $user_email = $_SESSION['user_email'];
  // echo "Welcome, $user_email! Your user ID is $user_type";
} else {
  // echo "Welcome,you are not logined";
  // header("Location: login.php");
  // exit(); // Stop further script execution
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <title>Sidebar Navigation</title> -->
  <title><?php if ($user_type) {
    echo "$user_type";
  } else {
    echo "Login please";
  } ?></title>

  <link rel="stylesheet" href="header_nav.css">
</head>

<body>
  <nav>
    <ul>
      <li> <!-- menu -->
        <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
          <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
        </svg>
      </li>
      <li> <!-- home  -->
        <a href="Dashbord.php">

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
            <path
              d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z" />
          </svg>
        </a>

      </li>
      <li><!-- input fields -->
        <input type="text" placeholder="Search...">
        <button style="color: black;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
            <path
              d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
          </svg>
        </button>
      </li>
      <li> <!-- login / account -->

        <?php
        if (!$user_type) {
          echo '<a href="http://localhost/Program/Ecom/accounts/user_account/user_login.php"><svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z"/></svg></a>';
        } else {
          // if ($user_type == 'user') {
          // C:\xampp\htdocs\Program\Ecom\user_pages\user_profile.php
          echo '<a href="profile.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
          <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z"/>
        </svg></a>';
          // }
          // else if ($user_type == 'seller') {
          // C:\xampp\htdocs\Program\Ecom\seller_pages\user_profile.php
          //   echo '<a href="profile.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
          //   <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z"/>
          // </svg></a>';
          // }
        }
        ?>
      </li>
      <li><!-- cart -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
          <path
            d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z" />
        </svg>
      </li>
    </ul>
  </nav>

  <div id="sidebar" class="sidebar">
    <div class="close_btn">
      <div></div>
      <button id="close-btn">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
          <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
        </svg>
      </button>
    </div>
    <ul>
      <?php if ($user_type == 'seller') {
        echo '<li><a href="http://localhost/Program/Ecom/seller_pages/seller_dashboard.php">For Seller</a></li>';
      } ?>
      <li>Option 2</li>
      <li>Option 3</li>
    </ul>
  </div>

  <div id="overlay"></div>

  <script>
    const menuIcon = document.getElementById('menu-icon');
    const sidebar = document.getElementById('sidebar');
    const closeBtn = document.getElementById('close-btn');
    const overlay = document.getElementById('overlay');

    // Open sidebar
    menuIcon.addEventListener('click', () => {
      sidebar.classList.add('active');
      overlay.classList.add('active');
    });

    // Close sidebar
    closeBtn.addEventListener('click', () => {
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
    });

    // Close sidebar when clicking outside
    overlay.addEventListener('click', () => {
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
    });

    // Prevent sidebar clicks from closing the sidebar
    sidebar.addEventListener('click', (event) => {
      event.stopPropagation();
    });
  </script>

  <style>
    body {
      background-color: rgb(231, 221, 221);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    nav>ul {
      display: grid;
      justify-content: center;
      grid-template-columns: 50px 5fr 20fr 5fr 5fr;
      gap: 10px;
    }

    nav>ul>li {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    svg {
      width: 30px;
      cursor: pointer;
    }

    nav>ul>li>button {
      border: none;
      height: 30px;
      border-radius: 0 5px 5px 0;
    }

    nav>ul>li>input {
      height: 30px;
      width: 70%;
      max-width: 500px;
      border: none;
      border-radius: 5px 0 0 5px;
    }

    nav>ul {
      align-items: center;
      justify-content: space-between;
      padding: 10px;
      height: 30px;
    }

    #sidebar {
      position: fixed;
      top: 0;
      left: -300px;
      width: 300px;
      height: 100%;
      background: white;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
      padding: 20px;
      transition: 0.3s;
    }

    #sidebar ul {
      list-style: none;
    }

    #sidebar ul li {
      margin: 10px 0;
    }

    #overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      display: none;
    }

    #overlay.active,
    #sidebar.active {
      display: block;
    }

    #sidebar.active {
      left: 0;
    }

    /* <style> */
    /* General Reset */


    nav {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      /* display: flex; */
      align-items: center;
    }

    nav ul {
      list-style: none;
      /* display: flex; */
      /* align-items: center; */
      margin: 0;
      padding: 0;
    }

    nav ul li {
      margin-right: 20px;
      cursor: pointer;
    }

    nav ul li svg {
      /* width: 24px; */
      /* height: 24px; */
      fill: #fff;
    }

    #sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      height: 100%;
      background-color: #f4f4f4;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
      transform: translateX(-100%);
      transition: transform 0.1s ease-in-out;
      z-index: 20;
    }

    #sidebar.active {
      transform: translateX(0);
    }


    #sidebar ul li {
      margin-bottom: 20px;
      padding: 10px;
      background-color: #ddd;
      border-radius: 5px;
      /* text-align: center; */
      /* cursor: pointer; */
    }

    #sidebar ul li:hover {
      background-color: #ccc;
    }

    #close-btn {
      margin: 10px;
      padding: 5px 5px;
      background-color: #ff5c5c;
      border: none;
      color: white;
      cursor: pointer;
      border-radius: 5px;
    }

    #close-btn:hover {
      background-color: #ff1c1c;
    }


    #overlay.active {
      display: block;
    }

    .sidebar {
      display: grid;

    }

    .sidebar>div {
      display: grid;
      grid-template-columns: 1fr 70px;
      margin: 10px;

    }

    /* #close-btn{
  width: 20px;

} */
  </style>
</body>

</html>