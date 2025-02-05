<?php
include("./../config.php");

include '../header_footer/header_nav.php';
include 'check_seller.php';
?>
<?php
$user_type = "";
// Check if user is logged in

if (isset($_SESSION['user_email'])) {
    $user_type = $_SESSION['user_type'];
    $user_email = $_SESSION['user_email'];
    // echo "Welcome, $user_email! Your user ID is $user_type";

} else {
    // echo "Welcome,you are not logined";
    header("Location: login.php");
    exit(); // Stop further script execution
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .div,
        td,
        tr,
        th {
            /* border: 2px solid black; */
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4 sm:mb-0">Manage Products</h1>
            <a href="./product_uplode.php">
                <button
                    class="w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                            clip-rule="evenodd" />
                    </svg>
                    Add New Product
                </button>
            </a>
        </div>
        <?php
        $seller_products_qry = "select * from products where uploder_email = '$user_email'";
        // echo '<br>' . $seller_products_qry . '<br>';
        $seller_products_result = mysqli_query($conn, $seller_products_qry);

        $total_product_row = mysqli_num_rows($seller_products_result);
        // echo "total row => $total_product_row  <br>";
        if ($total_product_row > 0) {

            // while ($row = mysqli_fetch_assoc($seller_products_result)) {
            // echo '<br>' . $row['id'];
            ?>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Max Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Min Price</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                    Stock</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                    Category</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider flex justify-center">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php
                            while ($product_row = mysqli_fetch_assoc($seller_products_result)) {
                                // echo '<br>' . $row['id'];
                                ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            <?php echo $product_row['product_name'] ?>
                                        </div>
                                        <div class="text-sm text-gray-500 sm:hidden">Stock:
                                            <?php echo $product_row['product_total_stock'] ?> | Category:
                                            <?php echo $product_row['categories'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php echo $product_row['product_max_price'] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php echo $product_row['product_min_price'] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden sm:table-cell">
                                        <?php echo $product_row['product_total_stock'] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden sm:table-cell">
                                        <?php echo $product_row['categories'] ?></td>
                                    <td
                                        class="gap-3 flex justify-center px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="">
                                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit <?php echo $product_row['id']; ?></button>
                                        </a>
                                        <a href="">
                                            <button class="text-red-600 hover:text-red-900">Delete <?php echo $product_row['id']; ?></button>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>



                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            // }
        } else {
            ?>
            <div class="flex justify-center items-center ">
                <div class="w-fit bg-white shadow-md rounded-lg overflow-hidden p-10 relative top-40">
                    <a href="./product_uplode.php">
                        <h1
                            class="text-2xl sm:text-3xl font-bold text-gray-400 mb-4 sm:mb-0 flex justify-center items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px"
                                fill="#e8eaed">
                                <path
                                    d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                            </svg>
                            Add Product
                        </h1>
                    </a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</body>

</html>