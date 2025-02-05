<?php
include "config.php"; 
?>
<?php
$user = array();
$query = array();
include "connection.php";
include "header_footer/header_nav.php";
// include "../header_footer/header_nav.css";
if (isset($_SESSION['user_email'])) {
  // echo "Welcome, $user_email! Your user ID is $user_type";
  $get_address_query = "select * from ShippingInfo where user_email = '{$user_email}'";
  if ($user_type == "seller") {
    $query = "select * from sellers where email = '{$user_email}'";
  } else if ($user_type == "user") {
    $query = "select * from users where email = '{$user_email}'";
  }

//   address
$get_address_result = mysqli_query($conn , $get_address_query);
  
  if($get_address_result && mysqli_num_rows($get_address_result)>0 ){
    $get_address_result = mysqli_fetch_array($get_address_result);
    $address = $get_address_result['address'];
  }

  
  // echo "Query: " . $query . "<br>";
  $result = mysqli_query($conn, $query);
  $user = mysqli_fetch_array($result);
  $username = $user["username"];
  $mobile = $user["mobile"];
} else {
  // echo "Welcome,you are not logined";
  // User is not logged in, redirect to login page
  // C:\xampp\htdocs\Program\Ecom\accounts\user_account\user_login.php
  // header("Location: http://localhost/Program/Ecom/accounts/user_account/user_login.php");
  // exit(); // Stop further script execution
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - E-commerce</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 min-h-screen w-screen">
    <?php
    if(isset($user_email)){
    ?>
    <div class="bg-[rgb(236_236_236)] flex items-center justify-center min-h-screen  <?php echo $user_email ? 'flex' : 'hidden'; ?>">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <!-- Profile Header -->
            <div class="bg-blue-600 text-white p-6">
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/80" alt="Profile Picture" class="w-20 h-20 rounded-full border-4 border-white mr-4">
                    <div>
                        <h1 class="text-2xl font-bold"><?php echo "$username" ?></h1>
                        <p class="text-blue-200"><?php echo "$user_email"; ?></p>
                    </div>
                </div>
            </div>

            <!-- Profile Details -->
            <div class="p-6">
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Personal Information</h2>
                    <p class="text-gray-600"><strong>Phone:</strong> <?php echo "$mobile"; ?></p>
                    <p class="text-gray-600"><strong>Account Type:</strong> <?php echo "$user_type"; ?></p>
                    <p class="text-gray-600"><strong>Address:</strong> <?php if(isset($address)){echo $address;} ?></p>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Order Summary</h2>
                    <p class="text-gray-600"><strong>Total Orders:</strong> 5</p>
                    <p class="text-gray-600"><strong>Last Order:</strong> #12345 (2023-05-01)</p>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Payment Method</h2>
                    <p class="text-gray-600">Visa ending in 1234</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col space-y-2">
                    <a href="profile_edit.php" class="m-auto">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Edit Profile
                        </button>
                    </a>
                    <a href="accounts/logout.php" class="m-auto">
                        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                            View Orders
                        </button>
                    </a>
                    <a href="accounts/logout.php" class="m-auto">
                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                            Logout
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
    }else{
        ?>
    <div class="bg-[rgb(236_236_236)] flex items-center justify-center min-h-screen">
        
        <a href="<?php echo BASE_URL ; ?>accounts/login.php" class="m-auto">
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                Please Login
            </button>
        </a>
    </div>
        <?php
    }
    ?>
</body>
</html>

