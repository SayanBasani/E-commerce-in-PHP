<?php 
include("./../config.php");

include "./../header_footer/header_nav.php"; ?>
<?php

include "./../connection.php";
$user_type = "";
// Check if user is logged in

if (isset($_SESSION['user_email'])) {
    $user_type = $_SESSION['user_type'];
    $user_email = $_SESSION['user_email'];
    // echo "Welcome, $user_email! Your user ID is $user_type";

} else {
    ?>
    <script>
        window.location.replace("./../Dashbord.php");
    </script>
    <?php

    echo "<script>window.history.back();</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-md w-full">
        <h1 class="text-2xl font-bold text-center text-green-600">Order Placed Successfully!</h1>
        <p class="mt-4 text-center text-gray-600">Thank you for your order. Your order number is <span class="font-semibold">#123456</span>.</p>
        <p class="mt-2 text-center text-gray-600">You will receive a confirmation email shortly.</p>
        <div class="mt-6">
            <a href="/" class="block text-center bg-green-500 text-white rounded-lg py-2 hover:bg-green-600 transition duration-200">Continue Shopping</a>
        </div>
    </div>
</body>
</html>