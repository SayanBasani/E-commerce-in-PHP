

<?php 
include "connection.php";
$email = $_POST['email'];
$id = $_POST['id'];
$product_quantity = $_POST['product_quantity'];
$cart_qry = "UPDATE cart SET product_quantity = ${product_quantity} WHERE id = ${id} and user_email = '${email}'";
$cart_result = mysqli_query($conn, $cart_qry);
?>