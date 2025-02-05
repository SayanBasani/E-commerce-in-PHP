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
  <title>Signup Page</title>
  <link rel="stylesheet" href="user_singup.css">
</head>
<body>
  <div class="signup-container">
    <h2>Create an Account</h2>
    <form action="" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>

      <div class="form-group">
        <label for="Number">Number</label>
        <input type="number" id="email" name="mobile" placeholder="Enter your Mobile Number" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <div class="form-group">
        <label for="password">Confirm Password</label>
        <input type="password" id="password" name="confirm_password" placeholder="Enter your confirm password" required>
      </div>

      <button type="submit" class="user_singup_btn btn" name="user_singup_btn">Sign Up</button>
      <p class="form_text">I already have an Account? <a href="user_login.php">Log in</a></p>

      <?php
      // Check if the form is submitted
      if (isset($_POST['user_singup_btn'])) {
          // Retrieve form data
          $username = $_POST['username'];
          $email = $_POST['email'];
          $mobile = $_POST['mobile'];
          $password = $_POST['password'];
          $confirm_password = $_POST['confirm_password'];

          $e_check_que = "SELECT * FROM users WHERE email = '{$email}'";
          $result = mysqli_query($conn, $e_check_que);
          
          if (mysqli_num_rows($result) == 0) {
              // Validate passwords
              if ($password !== $confirm_password) {
                  echo "<p>Passwords do not match.</p>";
              } else {
                  // Hash the password
                  $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                  
                  // Prepare and execute the SQL query to insert the new user
                  $que = "INSERT INTO users (username, email, mobile, password) 
                          VALUES ('{$username}', '{$email}', '{$mobile}', '{$hashed_password}')";

                  if (mysqli_query($conn, $que)) {
                      // Set session variables to track user login and type
                      $_SESSION['user_type'] = 'user';  // User type is 'user'
                      $_SESSION['user_email'] = $email; // Store user email or identifier
                      
                      echo "<p>Account created successfully! Redirecting...</p>";
                      // header("Location: localhost\Program\Ecom\Dashbord.php");
                      header("Location: ..\..\Dashbord.php");
                      // header("Location: ../../Dashbord.php");
                      exit;
                  } else {
                      echo "<p>Error: " . mysqli_error($conn) . "</p>";
                  }
              }
          } else {
              echo "<p>User already exists.</p>";
          }
      }

      // Close the database connection
      $conn->close();
      ?>

    </form>
  </div>
</body>
</html>
