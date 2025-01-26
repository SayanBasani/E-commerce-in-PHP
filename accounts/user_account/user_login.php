<?php
// Include the database connection file
include_once '../../connection.php';

// Start the session for login tracking
session_start();

if (isset($_POST['login_btn'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize inputs to prevent SQL injection
    // $email = mysqli_real_escape_string($conn, $email);
    // $password = mysqli_real_escape_string($conn, $password);

    // Query to check if user exists with the entered email
    $query = "SELECT * FROM users WHERE email = '{$email}'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data from the database
        $user = mysqli_fetch_assoc($result);
        
        // Verify the password entered by the user
        if (password_verify($password, $user['password'])) {
            // If password is correct, start a session and redirect to dashboard
            // $_SESSION['user_id'] = $user['id']; // Storing user id in session for login tracking
            $_SESSION['user_type'] = 'user';  // User type is 'user'
            $_SESSION['user_email'] = $email; // Store user email or identifier

            // C:\xampp\htdocs\Program\Ecom\accounts\user_account\user_login.php
            // C:\xampp\htdocs\Program\Ecom\Dashbord.php
            header("Location: ..\..\Dashbord.php");

            exit; // Stop further execution after redirect
        } else {
            $error_message = "Incorrect password!";
        }
    } else {
        $error_message = "No user found with this email!";
        header("location: user_login.php");
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="user_singup.css">
</head>
<body>
  <div class="signup-container">
    <h2>Login</h2>
    <form action="" method="POST">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>

      <button type="submit" class="btn" name="login_btn">Login</button>

      <p class="form_text">Don't have an account? <a href="user_signup.php">Sign up</a><a href="http://localhost/Program/Ecom/accounts/seller_account/seller_login.php">___</a></p>

      <?php
      // Display error message if credentials are incorrect
      if (isset($error_message)) {
          echo "<p style='color: red;'>$error_message</p>";
      }
      ?>
    </form>
  </div>
</body>
</html>
