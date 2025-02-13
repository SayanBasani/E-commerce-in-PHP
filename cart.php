<?php 
include "config.php"; 
include "header_footer/header_nav.php"; ?>
<?php

include "connection.php";
$user_type = "";
// Check if user is logged in

if (isset($_SESSION['user_email'])) {
    $user_type = $_SESSION['user_type'];
    $user_email = $_SESSION['user_email'];

} else {
    
    echo "<script>alert('Please login first!');</script>";
    echo "<script>window.history.back();</script>";
}

$min = 100000000000; // Smallest 12-digit number
$max = 999999999999; // Largest 12-digit number

$cart_id = mt_rand($min, $max);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - E-commerce Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<script>
    console.log("it is db . js ");

    
</script>
<body class="bg-gray-100">
    <form action="" method="post">  
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-8">Your Shopping Cart</h1>
        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-3/4">
                <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-bold">Product</th>
                                <th class="text-left font-bold">Price</th>
                                <th class="text-left font-bold">Quantity</th>
                                <th class="text-left font-bold">Total</th>
                                <th class="text-left font-bold">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="cart_items">
                            <!-- Cart items will be dynamically inserted here -->
                            <?php

                                $cart_qry = "select * from cart where user_email = '$user_email'";
                                $cart_result = mysqli_query($conn, $cart_qry);
                                $i = 0;
                                

                                while ($product = mysqli_fetch_array($cart_result)) {
                                    $product_quantity = $product['product_quantity'];
                                    $product_id = $product['product_id'];
                                    $product_quantity = $product['product_quantity'];
                                    // echo $product_id. "---". $product_quantity . "<br>";
                                    $product_qry = "select * from products where id = '$product_id'";
                                    $product_result = mysqli_query($conn, $product_qry);
                                    $product_result = mysqli_fetch_array($product_result);
                                    $product_name = $product_result['product_name'];
                                    $product_price = $product_result['product_min_price'];
                                    // echo "$product_name --- $product_price <br>";
                                   
                            ?>

                            <tr id="<?php echo $product_id; ?>" class="cart_items">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img class="h-16 w-16 mr-4" src="" alt="Product image">
                                        <span class="font-bold"> <?php echo $product_name; ?> </span>
                                    </div>
                                </td>
                                <td class="py-4"><?php echo $product_price ; ?></td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <button class="border rounded-md py-2 px-4 mr-2 decrease_qty" >-</button>
                                        <input type="number" name="p_quentity" value="<?php echo $product_quantity; ?>" min="1" max="99" class="w-16 text-center border rounded-md py-2 px-2 quantity" aria-label="Product quantity">
                                        <button class="border rounded-md py-2 px-4 ml-2 increase_qty" >+</button>
                                        <?php echo $product_quantity ; ?> 
                                    </div>
                                </td>
                                <td class="py-4 product_total_price"></td>
                                <td class="py-4">
                                    <a href="./remove_from_cart.php?pid=<?php echo $product_id ?>">
                                        <button class="text-red-500 hover:text-red-700 remove-item">Remove</button>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                            
                            <!-- Cart items will be dynamically inserted here -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-bold mb-4">Cart Summary</h2>
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span id="subtotal">$0.00</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Taxes</span>
                        <span id="taxes">$0.00</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Shipping</span>
                        <span id="shipping">$10.00</span>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between mb-2">
                        <span class="font-bold">Total</span>
                        <span id="total" class="font-bold">$0.00</span>
                    </div>
                    <a href="./checkout/checkout.php">
                        <p name="f_checkout"
                            class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full hover:bg-blue-600 transition-colors">
                            Proceed to Checkout
                        </p>
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
    
    <?php 

        function cart_update($email , $id , $quentity){
            echo $email."----".$id;
        }
    ?>
    
    <script>
        // Sample product data
        // const products = [{ id: 1, name: "Product Name 1", price: 19.99, quantity: 1 },{ id: 2, name: "Product Name 2", price: 29.99, quantity: 1 },{ id: 3, name: "Product Name 3", price: 39.99, quantity: 1 }];
    
        function runQuery(email,id,product_quantity){
            let forData = new FormData();
            forData.append("email",email);
            forData.append("id",id);
            forData.append("product_quantity",product_quantity);
            fetch("cart_update.php",{
                method:"POST",
                body: forData
            }).then(res => res.json())
            .catch(error => {
                alert(error);
            })
        }
   
       
        const cart_items = document.querySelectorAll('.cart_items');
        console.log(cart_items);
        
        cart_items.forEach((element,index) => {

            console.log(index);
            console.log(element.id);
            console.log(element);
            const decreaseBtn = element.querySelector('.decrease_qty');
            const increaseBtn = element.querySelector('.increase_qty');
            const quantityInput = element.querySelector('.quantity');
            const id = element.id;
            // console.log(decreaseBtn);
            quantityInput.value = 1;
            increaseBtn.addEventListener('click', (e) => {
                e.preventDefault();
                console.log("increase");
                
                let quantity = parseInt(quantityInput.value);
                if (quantity < 99) {
                    quantity++;
                    quantityInput.value = quantity;
                }
                runQuery("<?php echo $user_email; ?>",id,quantity)
                // update_cart("<?php echo $user_email; ?>",16,quantity);
            });
            decreaseBtn.addEventListener('click', (e) => {
                e.preventDefault();
                console.log("decrease");
                let quantity = parseInt(quantityInput.value);
                if (quantity > 1) {
                    quantity--;
                    quantityInput.value = quantity;
                }
            });
            
            // UPDATE cart SET quantity = ${quantity} WHERE id = ${id} and user_email = '${email}'
                    
        });
       


    </script>
    
    </form>
</body>

</html>



