<?php
include("./config.php");

// $current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// echo "<br>"."search_input -->".$current_url."<br>";
// $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "No referrer available";
// echo "<br>"."previous_url -->".$previous_url."<br>";


if (!isset($_GET['search_input']) || trim($_GET['search_input']) === '') {
  $loc = BASE_URL.'Dashbord.php';
  header("location: $loc");
  // exit; // Stop further execution
  echo "no reachable";
}
$search_qery = $_GET['search_input'];
// echo '---->' . $search_qery . '<---';
function find_product_using_pid($conn, $pid, $cont = 1)
{
  // echo"<br> product is ".$pid;
  $find_product_qre = "select id,product_name,product_min_price from products where id = '{$pid}'";
  // $cont = 1;
  // echo '<br>'.$find_product_qre . '<br><br>'; 
  $products = mysqli_query($conn, $find_product_qre);

  while ($row = mysqli_fetch_assoc($products)) {

    $product_id = $row["id"];
    $product_name = $row["product_name"];
    $product_price = $row["product_min_price"];

    // echo '<br> <br>' . $product_id . ' --> ' . $product_name . " --- " . $product_price . '<br> <br>';
    include("product_template.php");
    $cont = $cont + 1;
  }
}


include("connection.php");
$qry = "SELECT * FROM product_keywords WHERE keywords = '{$search_qery}'";
$result = mysqli_query($conn, $qry);



// foreach($row as $key) {
//   echo"/-----".$key[0]."-". $key[1] ."----/";
// }
?>
<?php include "header_footer/header_nav.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Document</title>
</head>

<body class="bg-gray-100">
  <div class="font-sans p-4 mx-auto lg:max-w-6xl md:max-w-4xl">

    <!-- it is the top bar about the search and a search button -->
    <div class="bgblue-50 flex justify-between items-center border-[1px] border-gray-300 rounded my-4 py-2 px-4">
      <div class="font-sans">
        Searched : <span class="font-semibold"> <?php echo $search_qery ?> </span>
      </div>

      <i class="search_new_product hover:bg-gray-300 transition-all fa fa-search border-[1px] border-gray-200 rounded-full p-[7px]"></i>
      <script>
        search_new_product =document.querySelector('.search_new_product');
        search_new_product.addEventListener('click',()=>{
          document.querySelector('.search_button').click();
        })
      </script>
      
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
      <?php

      $x = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        $x++;
        $R_product_id = $row['product_id'];
        // echo "$R_product_id   --". $x ." --";
        // echo "<br>".$R_product_id."<br>";
        find_product_using_pid($conn, $R_product_id);
      }
      // include("product_template.php");
      // include("product_template.php");
      // include("product_template.php");
      // include("product_template.php");
      ?>

    </div>
  </div>
</body>

</html>