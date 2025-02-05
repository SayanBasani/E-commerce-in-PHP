<?php
session_start();
include "connection.php";
if (!isset($_GET['pid']) || trim($_GET['pid']) == '') {
  ?>
  <script>
    alert("faill to add into cart");
    window.history.back();
  </script>
  <?php
  //  echo '<script>window.history.back();</script>';

}
$user_email = $_SESSION['user_email'];
$user_type = $_SESSION['user_type'];
$pid = $_GET['pid'];
echo "pid is $pid<br>";
echo "email is $user_email <br>";
$check_duplocate_in_cart_qre = "select * from cart where user_email = '$user_email' and product_id = '$pid'";
$check_duplocate_in_cart_result = mysqli_query($conn, $check_duplocate_in_cart_qre);
if (!mysqli_num_rows($check_duplocate_in_cart_result) == 0) {
  // echo "it is able to uplod";
  ?>
  <script>
    alert("it is already into cart");
    window.history.back();
  </script>
  <?php
} else {
  $add_cart_qre = "INSERT INTO cart (user_email, user_type, product_id) VALUES ('$user_email', '$user_type', '$pid');";

  // $check_cart_qre = "select * from cart where product_id = '$pid'";
  // $check_query = mysqli_query($conn, $check_cart_qre);

  // if (mysqli_num_rows($check_query) > 0) {
  //   echo "this row is avalaible";
  //   // echo '<script>window.history.back();</script>';
  // } else {
  if (mysqli_query($conn, $add_cart_qre)) {
    ?>
    <script>
      alert("sucessfully add in to the cart");
      window.history.back();
    </script>
    <?php
  } else {
    ?>
    <script>
      alert("Somthing is Wrong!");
      window.history.back();
    </script>
    <?php
  }
}
// }
?>