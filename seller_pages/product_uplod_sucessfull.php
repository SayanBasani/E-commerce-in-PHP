<?php
include("./../config.php");

session_start();
$user_type = "";
// include '../header_footer/header_nav.php';

// Check if user is logged in   
if (isset($_SESSION['user_email'])) {
  $user_type = $_SESSION['user_type'];
  $user_email = $_SESSION['user_email'];
  
} 
include 'check_seller.php';

$the_product_id = "";
if(!isset($_GET['pid'])){
    echo"dont get the product";
    header("location: seller_dashboard.php");
    
}
else{
    $the_product_id = $_GET['pid'];
    include '../connection.php';

    // echo "the product id is -->". $the_product_id .""; 
}

// echo "<br>". $the_product_id . "  " . $user_email ."";
// 

$get_seller_qry = "select * from sellers where email = '{$user_email}'";
// echo "<br> $get_seller_qry";
$result_seller = mysqli_query($conn, $get_seller_qry);
$row_seller = mysqli_fetch_array($result_seller);
$seller_email = $row_seller["email"];
// echo " <br>the seller id -- " ."   ". $seller_email ."";

$product_qry = "select * from products where uploder_email = '{$seller_email}' AND id = '{$the_product_id}'";
$the_product_is  = mysqli_query($conn, $product_qry);
$product_data = mysqli_fetch_array($the_product_is);


// 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Uploaded</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/forms@0.4.0/dist/forms.min.js"></script>
</head>

<body>
    <div class="bg-gradient-to-br from-blue-500 to-green-400 flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded-3xl shadow-lg text-center w-96 animate-fade-in">
            <!-- Success Icon -->
            <div
                class="flex items-center justify-center w-16 h-16 mx-auto bg-green-100 text-green-600 rounded-full mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2l4-4m0 0a9 9 0 11-6.76 3.76A9.005 9.005 0 0112 3v1z" />
                </svg>
            </div>
            <!-- Success Title -->
            <h1 class="text-3xl font-extrabold text-gray-800">Success!</h1>
            <p class="text-lg text-gray-600 mt-2">Your product has been successfully uploaded to the database.</p>

            <!-- Product Details Section -->
            <div class="mt-6 text-left">
                <h2 class="text-xl font-semibold text-gray-700 mb-2">Uploaded Product Details:</h2>
                <ul class="space-y-2">
                    <li><strong>Product Name:</strong> <span id="product_name" class="text-gray-600"></span></li>
                    <li><strong>Description:</strong> <span id="product_description" class="text-gray-600"></span></li>
                    <li><strong>Category:</strong> <span id="categories" class="text-gray-600"> </span></li>
                    <li><strong>Price:</strong> <span id="price" class="text-gray-600"> </span></li>
                    <li><strong>Stock:</strong> <span id="stock" class="text-gray-600"> units</span></li>
                </ul>
            </div>

            <!-- Buttons -->
            <div class="mt-8 space-y-4">
                <a href="seller_dashboard.php"
                    class="block px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow-lg hover:bg-blue-700 transition duration-200">
                    Go to Home
                </a>
                <a href="product_uplode.php"
                    class="block px-6 py-3 bg-green-600 text-white font-medium rounded-lg shadow-lg hover:bg-green-700 transition duration-200">
                    Add New Product
                </a>
                <a href="seller_dashboard.php"
                    class="block px-6 py-3 bg-purple-600 text-white font-medium rounded-lg shadow-lg hover:bg-purple-700 transition duration-200">
                    View All Products
                </a>
            </div>
        </div>

        <!-- Animation Styles -->
        <style>
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: scale(0.95);
                }

                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }

            .animate-fade-in {
                animation: fade-in 0.5s ease-out;
            }
        </style>

        <!-- Example Script to Dynamically Update Product Details -->
        <script>
            // Example dynamic product data
            const productData = {
                product_name: "<?php echo $product_data['product_name'] ?>",
                product_description: "<?php echo $product_data['product_description'] ?>",
                categories: "<?php echo $product_data['categories'] ?>",
                price: "<?php echo $product_data['product_min_price'] . " - " . $product_data['product_max_price'] ?>",
                stock: "<?php echo $product_data['product_total_stock'] ?> units"
            };
            // const productData = {
            //     product_name: "Gaming Laptop",
            //     product_description: "High-performance gaming laptop with RTX 4090.",
            //     categories: "Electronics",
            //     price: "$2500",
            //     stock: "10 units"
            // };

            // Dynamically update product details in the DOM
            document.getElementById("product_name").textContent = productData.product_name;
            document.getElementById("product_description").textContent = productData.product_description;
            document.getElementById("categories").textContent = productData.categories;
            document.getElementById("price").textContent = productData.price;
            document.getElementById("stock").textContent = productData.stock;
        </script>
    </div>
    </div>

</html>