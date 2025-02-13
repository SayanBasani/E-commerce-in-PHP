<?php
session_start();
include("../connection.php");
if ($_SESSION['user_type'] == 'user') {
  // echo'you are a verified seller ';
  

} else {
  ?>
  <script>
      location.replace("http://localhost/Program/Ecom/accounts/user_account/user_login.php?error=not_a_valad_user");
  </script>
  <?php
  // header('Location: http://localhost/Program/Ecom/accounts/user_account/user_login.php?error=not_a_valad_user');
  echo 'you are not a verified user';
}
// $c_user_qry = "select * from users where email = '{$user_email}'";
// $c_result = mysqli_query($conn , $c_seller_qry);
// $c_row = mysqli_fetch_array($c_result);
// $c_user_name = $c_row["username"];
?>