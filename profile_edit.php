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
  // echo "Query: " . $query . "<br>";
  $get_address_result = mysqli_query($conn , $get_address_query);
  
  if($get_address_result && mysqli_num_rows($get_address_result)>0 ){
    $get_address_result = mysqli_fetch_array($get_address_result);
    $old_address = $get_address_result['address'];
    echo "<br>--->". $old_address ."<---<br>";
  }
  $result = mysqli_query($conn, $query);
  $user = mysqli_fetch_array($result);
  $username = $user["username"];
  $mobile = $user["mobile"];
  $email = $user["email"];
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile</title>
    <link href="/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-[rgb(236_236_236)]">
    <div class="min-h-screen p-4 md:p-8 bg-[rgb(236_236_236)]">
      <!-- Edit Profile Container -->
      <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Header -->
        <div class="p-4 bg-indigo-600 flex justify-between items-center">
          <h1 class="text-2xl font-bold text-white">Edit Profile</h1>
          <a href="index.html" class="px-4 py-2 bg-white text-indigo-600 rounded hover:bg-gray-100 transition">Cancel</a>
        </div>

        <!-- Edit Form -->
        <form class="p-6 space-y-6" method="post">
          <!-- Profile Image Section -->
          <div class="flex flex-col items-center gap-4">
            <div class="w-32 h-32 rounded-full overflow-hidden">
              <img src="https://via.placeholder.com/128" alt="Profile" class="w-full h-full object-cover">
            </div>
            <button type="button" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-500 transition">
              Change Photo
            </button>
          </div>

          <!-- Basic Info -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-gray-700">Full Name</label>
              <input name="username" type="text" value="<?php echo $username ; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <?php
            if($user_type == 'seller'){
            ?>
            <div>
              <label class="block text-sm font-medium text-gray-700">Website</label>
              <input name="website" type="text" value="<?php echo $user["website"] ; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <?php
            }
            ?>
            <div>
              <label class="block text-sm font-medium text-gray-700">Phone</label>
              <input require name="mobile" type="numbe" min="6000000000" max="9999999999" value="<?php echo $mobile ; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Location</label>
              <input name="address" type="text" value="<?php echo $old_address; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
           
          </div>



          <!-- Submit Button -->
          <div class="flex justify-end gap-4">
            <!-- <button type="button" class="px-6 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Reset</button> -->
            <button name="update_btn" type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-500 transition">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
<?php
if(isset($_POST['update_btn'])){
  $N_username = $_POST['username'];
  // $N_email = $_POST['email'];
  $N_mobile = $_POST['mobile'];
  $N_address = $_POST['address'];
  echo "Hello";
  echo "<br>--->".$N_username."---". $N_mobile."----". $N_address."<----<br>";

  // data are filled
  if(!empty($N_username) && !empty($N_mobile) && !empty($N_address)){
    $update_address_qry = "UPDATE ShippingInfo SET address = '$N_address' WHERE  user_email = '{$user_email}'";
    if($user_type == "seller"){
      $N_website = $_POST['website'];
      $update_query = "UPDATE sellers SET username='$N_username' , mobile='$N_mobile',website = '$N_website' WHERE email = '{$user_email}'";
      echo("seller ok");
      
    }
    else if($user_type == "user"){
      $update_query = "UPDATE users SET username='$N_username' , mobile='$N_mobile' WHERE email = '{$user_email}'";
      echo("user ok");
    }

    else{
      ?>
      <script>
        alert("there is sompthing Problem.Please Try again");
        window.location.replace('./profile.php');
      </script>
      <?php
    }
    echo "<br>end one part<br>";
    echo "<br> $update_query <br> $update_address_qry <br>";

    // try to update the data 
    if(mysqli_query($conn,$update_query) && mysqli_query($conn,$update_address_qry)){
      echo("Now the main");
      echo"hello sss";
      ?>
      <script>
        alert("Details Update Sucessfull");
        window.location.replace('./profile.php');
      </script>
      <?php
    }
    // if fill th update the data 
    else{
      echo "there is some problem";
      ?>
      <script>
        alert(<?php echo mysqli_error($conn); ?>);
        // window.location.replace('./profile.php');
      </script>
      <?php
    }
  }
  // fill the all field
  else{
    // echo "<br>--->no data <----<br>";
    ?>
      <script>
        alert("plese fill the fields");
      </script>
      <?php
  }
  echo "<br>--->end <----<br>";
  // $update_userdata = 
}
?>