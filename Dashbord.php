

<?php 
include "config.php"; 
include "header_footer/header_nav.php"; 


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-commerce Home Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

</head>

<body class="min-h-screen bg-gray-100">
  <!-- Header -->


  <!-- Banner -->
  <div class="relative">
    <!-- <img src="/placeholder.svg?height=400&width=1920" alt="Banner" class="w-full h-64 md:h-96 object-cover"> -->
    <img src="https://www.shutterstock.com/image-vector/ecommerce-website-banner-template-presents-260nw-2252124451.jpg" width="1920" height="720" alt="Banner" class="w-full h-64 md:h-96 object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
      <div class="text-center">
        <h2 class="text-white text-3xl md:text-5xl font-bold mb-4">Summer Sale</h2>
        <p class="text-white text-xl md:text-2xl mb-6">Up to 50% off on selected items</p>
        <a href="#"
          class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-blue-100 transition duration-300">Shop
          Now</a>
      </div>
    </div>
  </div>

  <!-- Product Sections -->
  <main class="container mx-auto px-4 py-8">
    <!-- Clothes Section -->
    <section class="mb-12">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Clothes</h2>
        <a href="#" class="text-blue-600 hover:underline flex items-center">
          View All
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
              clip-rule="evenodd" />
          </svg>
        </a>
      </div>
      <div class="flex overflow-x-auto pb-4 -mx-4">
        <div class="flex-none w-64 mx-4">
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://www.teez.in/cdn/shop/products/Link-Data-T-Shirt-3_large.jpg?v=1583558866" alt="T-Shirt" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-lg mb-2">T-Shirt</h3>
              <p class="text-gray-600">$19.99</p>
            </div>
          </div>
        </div>
        <div class="flex-none w-64 mx-4">
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://shorturl.at/OqiuM" alt="Jeans" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-lg mb-2">Jeans</h3>
              <p class="text-gray-600">$49.99</p>
            </div>
          </div>
        </div>
        <div class="flex-none w-64 mx-4">
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://shorturl.at/o4hJN" alt="Dress" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-lg mb-2">Dress</h3>
              <p class="text-gray-600">$39.99</p>
            </div>
          </div>
        </div>
        <div class="flex-none w-64 mx-4">
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://shorturl.at/vLssi" alt="Jacket" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-lg mb-2">Jacket</h3>
              <p class="text-gray-600">$79.99</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Mobile Section -->
    <section class="mb-12">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Mobile</h2>
        <a href="#" class="text-blue-600 hover:underline flex items-center">
          View All
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
              clip-rule="evenodd" />
          </svg>
        </a>
      </div>
      <div class="flex overflow-x-auto pb-4 -mx-4">
        <div class="flex-none w-64 mx-4">
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://api.thechennaimobiles.com/1719121334790.webp" alt="Smartphone X" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-lg mb-2">Smartphone X</h3>
              <p class="text-gray-600">$599.99</p>
            </div>
          </div>
        </div>
        <div class="flex-none w-64 mx-4">
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://api.thechennaimobiles.com/1724293608826.png" alt="Tablet Pro" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-lg mb-2">Tablet Pro</h3>
              <p class="text-gray-600">$399.99</p>
            </div>
          </div>
        </div>
        <div class="flex-none w-64 mx-4">
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://www.reliancedigital.in/medias/Samsung-Ultra-Watch7-Smartwatch-494421976-i-1-1200Wx1200H-300Wx300H?context=bWFzdGVyfGltYWdlc3w3OTIwNHxpbWFnZS9qcGVnfGltYWdlcy9oNzUvaDM4LzEwMTcyNzk3NzQ3MjMwLmpwZ3xmNmFiYTAyOWMxZGI1MWZkNzcxYWE3NmFkOTVmODkwODJlOTQ4MzQzNmU3YzZmNGE3MDRhMDYyMTUwMmM2OWJh" alt="Smartwatch" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-lg mb-2">Smartwatch</h3>
              <p class="text-gray-600">$199.99</p>
            </div>
          </div>
        </div>
        <div class="flex-none w-64 mx-4">
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://inventstore.in/wp-content/uploads/2024/09/black-01-solobuds.jpg.large_.2x.jpg" alt="Wireless Earbuds" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-lg mb-2">Wireless Earbuds</h3>
              <p class="text-gray-600">$129.99</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Toys Section -->
    <section class="mb-12">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Toys</h2>
        <a href="#" class="text-blue-600 hover:underline flex items-center">
          View All
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
              clip-rule="evenodd" />
          </svg>
        </a>
      </div>
      <div class="flex overflow-x-auto pb-4 -mx-4">
        <div class="flex-none w-64 mx-4">
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://picsum.photos/500/500" alt="LEGO Set" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-lg mb-2">LEGO Set</h3>
              <p class="text-gray-600">$59.99</p>
            </div>
          </div>
        </div>
        <div class="flex-none w-64 mx-4">
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://skillotoys.com/cdn/shop/products/casa-websiteproducts5.25.jpg?v=1689869381" alt="Doll House" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-lg mb-2">Doll House</h3>
              <p class="text-gray-600">$89.99</p>
            </div>
          </div>
        </div>
        <div class="flex-none w-64 mx-4">
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://m.media-amazon.com/images/I/71TfDT-zSvL.jpg" alt="Remote Control Car" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-lg mb-2">Remote Control Car</h3>
              <p class="text-gray-600">$39.99</p>
            </div>
          </div>
        </div>
        <div class="flex-none w-64 mx-4">
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://dictionary.cambridge.org/images/thumb/boardg_noun_002_03874.jpg?version=6.0.43" alt="Board Game" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-lg mb-2">Board Game</h3>
              <p class="text-gray-600">$24.99</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>

</html>

<?php include "header_footer/footer.php"; ?>
<?php

// $current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// echo "<br>"."search_input -->".$current_url."<br>";
// $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "No referrer available";
// echo "<br>"."previous_url -->".$previous_url."<br>";

?>