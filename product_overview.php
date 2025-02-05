<?php
// if (!isset($_GET['s']) || trim($_GET['s']) === '') {
if (!isset($_GET['pid']) || trim($_GET['pid']) == '') {
    header('Location: http://localhost/Program/Ecom/Dashbord.php');
    echo "it is empty";
}
include "config.php"; 
include "connection.php";
include "header_footer/header_nav.php";

$pid = $_GET['pid'];
$product_query = "select * from products where id = '{$pid}'";
// echo $product_query ."<br>";
$result = mysqli_query($conn, $product_query);
$product = mysqli_fetch_array($result);

// all data to use 
$product_name = $product["product_name"];
$product_max_price = $product["product_max_price"];
$product_min_price = $product["product_min_price"];
$refundable = $product["refundable"];
$payment_type = $product["payment_type"];
$categories = $product["categories"];
$product_description = $product["product_description"];
// while()){
//     $p = $product["categories"];
//     echo $p;
// }
?>

<?php
// echo "hello $pid is //";
$specifaction_qre = "select * from specifications where product_id = '$pid'";
// echo $specifaction_qre;

$specifications_result = mysqli_query($conn, $specifaction_qre);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Overview - E-commerce</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Product Image Carousel -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="relative h-96 overflow-hidden">
                    <img id="productImage" src="/placeholder.svg?height=400&width=400" alt="Product Image"
                        class="w-full h-full object-cover">
                    <button onclick="changeImage(-1)"
                        class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full">&lt;</button>
                    <button onclick="changeImage(1)"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full">&gt;</button>
                </div>
            </div>

            <!-- Product Details -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold mb-4"><?php echo $product_name; ?></h1>
                <div class="flex items-center mb-4">
                    <span class="text-2xl font-bold text-red-600 mr-2"><?php echo $product_min_price; ?></span>
                    <span class="text-lg text-gray-500 line-through"><?php echo $product_max_price; ?></span>
                    <span class="ml-2 bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded">35% OFF</span>
                </div>
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                    </div>
                    <span class="ml-2 text-sm text-gray-600">4.8 (1,234 ratings)</span>
                </div>
                <p class="text-gray-700 mb-4"><?php echo $product_name; ?><?php echo $product_description; ?></p>
                <a href="./add_to_cart.php?pid=<?php echo $pid; ?>">
                    <button
                        class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-2 px-4 rounded-full w-full mb-4">
                        Add to Cart
                    </button>
                </a>
                <button class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-full w-full">
                    Buy Now
                </button>
            </div>
        </div>

        <!-- Product Description and Specifications -->
        <div class="bg-white mt-8 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Product Description</h2>
            <p class="text-gray-700 mb-4"><?php echo $product_description; ?></p>
            <!-- <h3 class="text-xl font-bold mb-2">Key Features:</h3>
            <ul class="list-disc list-inside text-gray-700 mb-4">
                <li>Active Noise Cancellation</li>
                <li>40-hour battery life</li>
                <li>Bluetooth 5.0 connectivity</li>
                <li>Comfortable over-ear design</li>
                <li>Built-in microphone for calls</li>
            </ul> -->


            <h3 class="text-xl font-bold mb-2">Specifications:</h3>
            <table class="w-full text-left border-collapse mb-4">

                <?php

                while ($row = mysqli_fetch_array($specifications_result)) {
                    $spec_name = $row["spec_name"];
                    $spec_description = $row["spec_description"];
                    // echo "---" .$spec_name. "..." . $spec_description . "---";
                

                    ?>
                    <tr class="border-b">
                        <th class="py-2 pr-4 font-semibold"><?php echo $spec_name; ?> </th>
                        <td><?php echo $spec_description; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>

        <!-- Customer Reviews -->
        <div class="bg-white mt-8 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Customer Reviews</h2>
            <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2">Leave a Review</h3>
                <div class="flex items-center mb-2">
                    <span class="mr-2">Rating:</span>
                    <div class="flex text-yellow-400">
                        <svg class="w-5 h-5 fill-current cursor-pointer" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current cursor-pointer" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current cursor-pointer" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current cursor-pointer" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current cursor-pointer" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                    </div>
                </div>
                <textarea class="w-full p-2 border rounded-md" rows="3"
                    placeholder="Write your review here..."></textarea>
                <button class="mt-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Submit
                    Review</button>
            </div>
            <div class="border-t pt-4">
                <h3 class="text-lg font-semibold mb-2">Recent Reviews</h3>
                <div class="mb-4">
                    <div class="flex items-center mb-1">
                        <div class="flex text-yellow-400">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                        </div>
                        <span class="ml-2 text-sm font-semibold">John D.</span>
                    </div>
                    <p class="text-gray-700">Excellent sound quality and comfortable for long listening sessions. Highly
                        recommended!</p>
                </div>
                <div class="mb-4">
                    <div class="flex items-center mb-1">
                        <div class="flex text-yellow-400">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                        </div>
                        <span class="ml-2 text-sm font-semibold">Sarah M.</span>
                    </div>
                    <p class="text-gray-700">Great noise cancellation, but the battery life could be better. Overall, a
                        solid product.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const images = [
            '/placeholder.svg?height=400&width=400',
            '/placeholder.svg?height=400&width=400&text=Image+2',
            '/placeholder.svg?height=400&width=400&text=Image+3'
        ];
        let currentImageIndex = 0;

        function changeImage(direction) {
            currentImageIndex += direction;
            if (currentImageIndex < 0) currentImageIndex = images.length - 1;
            if (currentImageIndex >= images.length) currentImageIndex = 0;
            document.getElementById('productImage').src = images[currentImageIndex];
        }
    </script>
</body>

</html>