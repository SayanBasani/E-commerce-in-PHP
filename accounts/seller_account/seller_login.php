<?php
session_start(); // Start the session to track user login

// Include the database connection file
include_once '../../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seller Login Page</title>
  <link rel="stylesheet" href="seller_account.css">
</head>
<body>
  <div class="login-container">
    <h2>Seller Login</h2>
    <form action="" method="POST">
      <div class="form-group">
        <label for="email-username">Email or Username</label>
        <input type="text" id="email-username" name="email_username" placeholder="Enter your email or username" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>

      <button type="submit" class="btn">Login as Seller</button>
      <p class="form_text">Don't have a seller account? <a href="seller_singup.php">Sign up</a></p>

      <?php
        // Handle the form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $email_username = $_POST['email_username'];
            $password = $_POST['password'];

            // Check if the user exists in the database
            $query = "SELECT * FROM sellers WHERE email = '{$email_username}' OR username = '{$email_username}'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $seller = mysqli_fetch_assoc($result);

                // Verify the password
                if (password_verify($password, $seller['password'])) {
                    // Set session variables
                    $_SESSION['user_type'] = 'seller';
                    $_SESSION['user_email'] = $seller['email']; // Store seller email

                    // Redirect to seller dashboard
                    // header("Location: http://localhost/Program/Ecom/seller_pages/seller_dashboard.php");
                    // header("Location: http://localhost/Program/Ecom/Dashboard.php");
                    header("Location: http://localhost/Program/Ecom/Dashbord.php");
                    exit;
                } else {
                    echo "<p>Invalid password. Please try again.</p>";
                }
            } else {
                echo "<p>No account found with the provided email or username. Please try again.</p>";
            }
        }
      ?>

    </form>
  </div>
</body>
</html>
