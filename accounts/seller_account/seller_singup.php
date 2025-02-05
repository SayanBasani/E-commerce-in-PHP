<?php
session_start(); // Start the session to track user type

// Include the database connection file
include_once '../../connection.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seller Signup Page</title>
  <link rel="stylesheet" href="seller_account.css">
</head>
<body>
  <div class="signup-container">
    <h2>Seller Signup</h2>
    <form action="" method="POST">
      <div class="form-group">
        <label for="business-name">Business Name</label>
        <input type="text" id="business-name" name="business_name" placeholder="Enter your business name" required>
      </div>

      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>

      <div class="form-group">
        <label for="mobile">Mobile Number</label>
        <input type="text" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
      </div>

      <div class="form-group">
        <label for="website">Website (optional)</label>
        <input type="url" id="website" name="website" placeholder="Enter your website URL">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>

      <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>
      </div>

      <button type="submit" class="btn">Sign Up as Seller</button>
      <p class="form_text">Already have a seller account? <a href="./seller_login.php">Log in</a></p>


      <?php
        // Handle the form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $business_name = $_POST['business_name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $website = $_POST['website'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Basic form validation
            if ($password !== $confirm_password) {
                echo "<p>Passwords do not match.</p>";
            } else {
                // Check if the email or username already exists
                $check_query = "SELECT * FROM sellers WHERE email = '{$email}' OR username = '{$username}'";
                $result = mysqli_query($conn, $check_query);

                if (mysqli_num_rows($result) > 0) {
                    echo "<p>Email or Username is already taken. Please choose another.</p>";
                } else {
                    // Hash the password
                    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                    // Prepare SQL query to insert the seller's data
                    $insert_query = "INSERT INTO sellers (business_name, username, email, mobile, website, password) 
                                    VALUES ('{$business_name}', '{$username}', '{$email}', '{$mobile}', '{$website}', '{$hashed_password}')";

                    if (mysqli_query($conn, $insert_query)) {
                        // Set session variable to identify as seller
                        $_SESSION['user_type'] = 'seller';  // Store user type as 'seller'
                        $_SESSION['user_email'] = $email;   // Store user email (or any other identifier)

                        // echo "<p>Signup successful! You can now <a href='login.php'>login</a>.</p>";
                        // Redirect to seller dashboard
                        // header("Location: http://localhost/Program/Ecom/seller_pages/seller_dashboard.php");
                        header("Location: ../../Dashbord.php");


                        // exit;
                    } else {
                        echo "<p>Error: " . mysqli_error($conn) . "</p>";
                    }
                }
            }
        }
      ?>


    </form>
  </div>
</body>
</html>
