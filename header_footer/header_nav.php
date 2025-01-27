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
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <!-- <title>Sidebar Navigation</title> -->
  <link rel="stylesheet" href="header_nav.css">
  <title><?php if ($user_type) {
    echo "$user_type";
  } else {
    echo "Login please";
  } ?></title>
  <style>
    ul{
      /* border: 1px solid yellow; */
    }
    body{
      background-color: ;
    }
  </style>

</head>

<body class="bg-[rgb(176, 176, 176)]">
  <nav class="py-4 bg-[rgb(242_246_255)] shadow-md h-16 ">
    <ul class="grid grid-cols-[50px_5fr_20fr_5fr_5fr] gap-2 items-center mx-auto px-4">
      <!-- menu -->
      <li class="flex justify-center items-center">
        <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-[30px] cursor-pointer">
          <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
        </svg>
      </li>
      <!-- home  -->
      <li class="flex justify-center items-center">
        <a href="http://localhost/Program/Ecom/Dashbord.php" class="flex justify-center items-center">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-[30px] cursor-pointer">
            <path
              d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z" />
          </svg>
        </a>
      </li>

      <!-- input fields -->
      <li class="flex justify-center items-center ">
        <input type="text" placeholder="  Search..." class="border-1  bg-white h-[30px] w-[70%] max-w-[500px] border-none rounded-l-[5px]" />
        <button style="color: black;" class="bg-white h-[30px] border-none rounded-r-[5px] flex justify-center items-center">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-[30px] cursor-pointer">
            <path
              d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
          </svg>
        </button>
      </li>

      <!-- login / account -->
      <li class="flex gap-4 justify-center items-center">
        <!-- Login Link -->
        <?php
        if (!$user_type) {
          echo '<a href="http://localhost/Program/Ecom/accounts/user_account/user_login.php"class="flex items-center justify-center w-8 h-8 hover:text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-6 h-6"> <path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z" /> </svg> </a>';
        } else {
        // <!-- Profile Link 1 -->
        echo '<a href="http://localhost/Program/Ecom/profile.php" class="flex items-center justify-center w-8 h-8 hover:text-gray-500"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-6 h-6"> <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" /> </svg> </a>';
        }
        ?>

      </li>

      <!-- cart -->
      <li>
        <a href="/cart" aria-label="Cart">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="24" height="24" fill="currentColor">
            <path
              d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z" />
          </svg>
        </a>
      </li>

    </ul>
  </nav>

  <div id="sidebar" class="fixed top-0 left-0 w-64 h-full bg-gray-200 font-semibold transform -translate-x-full transition-transform duration-300 ease-in-out z-50">
    <div class="flex justify-between p-4">
        <div></div>
        <button id="close-btn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-6 h-6 text-white">
                <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
            </svg>
        </button>
    </div>
    <ul class="space-y-4 p-4">
        <?php if ($user_type == 'seller') {
          echo '<li><a href="http://localhost/Program/Ecom/seller_pages/seller_dashboard.php" class="bg-white p-2 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all font-semibold block">For Seller</a></li>';
        } ?>
        <li><a href="#" class="bg-white p-2 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all font-semibold block">Option 2</a></li>
        <li><a href="#" class="bg-white p-2 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all font-semibold block">Option 3</a></li>
    </ul>
</div>

<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden z-40"></div>


</body>

</html>
<script>
  const menuIcon = document.getElementById('menu-icon');
  const sidebar = document.getElementById('sidebar');
  const closeBtn = document.getElementById('close-btn');
  const overlay = document.getElementById('overlay');

  // Open sidebar
  menuIcon.addEventListener('click', () => {
    sidebar.classList.add('transform', 'translate-x-0');
    sidebar.classList.remove('-translate-x-full');
    overlay.classList.remove('hidden');
  });

  // Close sidebar
  closeBtn.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
    sidebar.classList.remove('translate-x-0');
    overlay.classList.add('hidden');
  });

  // Close sidebar when clicking outside
  overlay.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
    sidebar.classList.remove('translate-x-0');
    overlay.classList.add('hidden');
  });

  // Prevent sidebar clicks from closing the sidebar
  sidebar.addEventListener('click', (event) => {
    event.stopPropagation();
  });
</script>
