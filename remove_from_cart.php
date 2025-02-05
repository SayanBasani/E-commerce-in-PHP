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
}
$user_email = $_SESSION['user_email'];
$user_type = $_SESSION['user_type'];
$pid = $_GET['pid'];
echo "pid is $pid<br>";
echo "email is $user_email <br>";
// $check_present_in_the_cart_qre = "select * from cart where user_email = '$user_email' and product_id = '$pid'";

$check_present_in_the_cart_qre = "delete from cart where user_email = '$user_email' and product_id = '$pid'";
if (mysqli_query($conn, $check_present_in_the_cart_qre)) {
  if (mysqli_affected_rows($conn) > 0) {
    echo "the item is deleted";
    ?>
    <script>
      alert("Product successfully removed from the cart");
      window.history.back();
    </script>
    <?php
  } else {
    echo "No product found in the cart with the given details.";
    ?>
    <script>
      alert("No product found in the cart with the given details.");
      alert("<?php echo mysqli_error($conn) ?>");
      window.history.back();
    </script>
    <?php
  }
} else {
  echo "Error: " . mysqli_error($conn);
  ?>
  <script>
    alert("<?php echo mysqli_error($conn) ?>");
    window.history.back();
  </script>
  <?php
}
?>
<script>
  window.history.back();
</script>