<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile - E-commerce</title>
  <link rel="stylesheet" href="../header_footer/header_nav.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <?php
  $user = array();
  include "../connection.php";
  include "../header_footer/header_nav.php";
  // include "../header_footer/header_nav.css";
  if (isset($_SESSION['user_email'])) {
    // echo "Welcome, $user_email! Your user ID is $user_type";
    $query = "select * from users where email = '{$user_email}'";
    // echo $query;
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_array($result);
    $username = $user["username"];
    $mobile = $user["mobile"];
  } else {
    // echo "Welcome,you are not logined";
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit(); // Stop further script execution
  }


  ?>
</head>

<body class="min-h-screen">
  <div class=" flex items-center justify-center min-h-screen">
    <div class="max-w-4xl w-full bg-white rounded-lg shadow-lg overflow-hidden">
      <!-- Header -->
      <div class="flex items-center bg-blue-500 p-6">
        <img class="h-24 w-24 rounded-full border-4 border-white shadow-md" src="https://via.placeholder.com/150"
          alt="Profile Picture">
        <div class="ml-6">
          <h2 class="text-2xl font-bold text-white"><?php echo "$username" ?></h2>
          <p class="text-blue-200"><?php echo "$user_email"; ?></p>
          <p class="text-blue-200"><?php echo "$mobile"; ?></p>
        </div>
      </div>

      <!-- Main Content -->
      <div class="p-6">
        <!-- About Section -->
        <!-- <h3 class="text-xl font-semibold mb-4">About Me</h3>
        <p class="text-gray-700 leading-relaxed">
          Hello! I am John Doe, a regular shopper who loves finding the best deals on products. In my free time, I enjoy
          reading reviews and sharing my shopping experiences.
        </p> -->

        <!-- Profile Options -->
        <div class="mt-6">
          <h3 class="text-xl font-semibold mb-4">My Account</h3>
          <ul class="space-y-3">
            <li>
              <a href="order_history.html" class="flex items-center text-blue-500 hover:underline">
                <span class="mr-2">🛒</span> Order History
              </a>
            </li>
            <li>
              <a href="wishlist.html" class="flex items-center text-blue-500 hover:underline">
                <span class="mr-2">❤️</span> Wishlist
              </a>
            </li>
            <li>
              <a href="address_book.html" class="flex items-center text-blue-500 hover:underline">
                <span class="mr-2">📍</span> Address Book
              </a>
            </li>
            <li>
              <a href="payment_methods.html" class="flex items-center text-blue-500 hover:underline">
                <span class="mr-2">💳</span> Payment Methods
              </a>
            </li>
            <li>
              <a href="support.html" class="flex items-center text-blue-500 hover:underline">
                <span class="mr-2">📞</span> Customer Support
              </a>
            </li>
          </ul>
        </div>

        <!-- Action Buttons -->
        <div class="mt-8 flex justify-center space-x-4">
          <a href="edit_profile.html"
            class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition">
            Edit Profile
          </a>
          <!-- C:\xampp\htdocs\Program\Ecom\accounts\logout.php -->
          <a href="http://localhost/Program/Ecom/accounts/logout.php"
            class="inline-block bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600 transition">
            Log Out
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>