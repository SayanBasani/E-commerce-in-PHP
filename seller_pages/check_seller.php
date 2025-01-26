<?php
if ($user_type == 'seller') {
  // echo'you are a verified seller ';
} else {
  ?>
  <script>
      location.replace("http://localhost/Program/Ecom/accounts/user_account/user_login.php?error=not_a_valad_user");
  </script>
  <?php
  // header('Location: http://localhost/Program/Ecom/accounts/user_account/user_login.php?error=not_a_valad_user');
  echo 'you are not a seller you are user only' . '-->' . $user_type;
}
?>