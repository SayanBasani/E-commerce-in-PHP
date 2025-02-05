<?php include "header_footer/header_nav.php"; ?>
<?php

include "connection.php";
$user_type = "";
// Check if user is logged in

if (isset($_SESSION['user_email'])) {
    $user_type = $_SESSION['user_type'];
    $user_email = $_SESSION['user_email'];
    // echo "Welcome, $user_email! Your user ID is $user_type";

} else {
    // echo "Welcome,you are not logined";
    // header("Location: login.php");
    // exit(); // Stop further script execution
    echo "<script>window.history.back();</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - E-commerce Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
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
                        <tbody id="cart-items">
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
                    <button
                        class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full hover:bg-blue-600 transition-colors">Proceed
                        to Checkout</button>
                </div>
            </div>
        </div>
    </div>
    <?php

    $cart_qry = "SELECT * FROM cart WHERE user_email = '$user_email'";
    $cart_result = mysqli_query($conn, $cart_qry);

    $products = [];

    if ($cart_result && mysqli_num_rows($cart_result) > 0) {
        while ($cart_item = mysqli_fetch_assoc($cart_result)) {
            $product_id = $cart_item['product_id'];

            // Fetch product details in a single query
            $product_qry = "SELECT product_name, product_min_price FROM products WHERE id = '$product_id'";
            $product_result = mysqli_query($conn, $product_qry);

            if ($product_result && $product_data = mysqli_fetch_assoc($product_result)) {
                $products[] = [
                    "id" => $product_id,
                    "name" => $product_data['product_name'],
                    "price" => $product_data['product_min_price'],
                    "quantity" => 1
                ];
            }
        }
    }
    ?>

    <script>
        const products = <?php echo json_encode($products, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
        console.log(products); // Debugging
    </script>
    <script>
        // Sample product data
        const products = [
            { id: 1, name: "Product Name 1", price: 19.99, quantity: 1 },
            { id: 2, name: "Product Name 2", price: 29.99, quantity: 1 },
            { id: 3, name: "Product Name 3", price: 39.99, quantity: 1 }
        ];

        const cartItems = document.getElementById('cart-items');
        const subtotalElement = document.getElementById('subtotal');
        const taxesElement = document.getElementById('taxes');
        const totalElement = document.getElementById('total');

        function updateCart() {
            cartItems.innerHTML = '';
            let subtotal = 0;

            products.forEach(product => {
                console.log(product);
                
                const total = product.price * product.quantity;
                subtotal += total;

                cartItems.innerHTML += `
                    <tr data-id="${product.id}">
                        <td class="py-4">
                            <div class="flex items-center">
                                <img class="h-16 w-16 mr-4" src="/placeholder.svg?height=64&width=64" alt="Product image">
                                <span class="font-bold">${product.name}</span>
                            </div>
                        </td>
                        <td class="py-4">$${product.price.toFixed(2)}</td>
                        <td class="py-4">
                            <div class="flex items-center">
                                <button class="border rounded-md py-2 px-4 mr-2 decrease-qty" aria-label="Decrease quantity">-</button>
                                <input type="number" value="${product.quantity}" min="1" max="99" class="w-16 text-center border rounded-md py-2 px-2 quantity" aria-label="Product quantity">
                                <button class="border rounded-md py-2 px-4 ml-2 increase-qty" aria-label="Increase quantity">+</button>
                            </div>
                        </td>
                        <td class="py-4 product-total">$${total.toFixed(2)}</td>
                        <td class="py-4">
                            <button class="text-red-500 hover:text-red-700 remove-item">Remove</button>
                        </td>
                    </tr>
                `;
            });

            const taxes = subtotal * 0.1; // Assuming 10% tax rate
            const total = subtotal + taxes + 10; // Adding $10 for shipping

            subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
            taxesElement.textContent = `$${taxes.toFixed(2)}`;
            totalElement.textContent = `$${total.toFixed(2)}`;
        }

        function updateProductQuantity(productId, newQuantity) {
            console.log("i am in");
            
            const product = products.find(p => p.id === productId);
            if (product) {
                product.quantity = newQuantity;
                updateCart();
            }
        }

        function removeProduct(productId) {
            const index = products.findIndex(p => p.id === productId);
            if (index !== -1) {
                products.splice(index, 1);
                updateCart();
            }
        }

        cartItems.addEventListener('click', function (event) {
            const target = event.target;
            const row = target.closest('tr');
            const productId = parseInt(row.dataset.id);

            if (target.classList.contains('increase-qty')) {
                const quantityInput = row.querySelector('.quantity');
                quantityInput.value = parseInt(quantityInput.value) + 1;
                updateProductQuantity(productId, parseInt(quantityInput.value));
            } else if (target.classList.contains('decrease-qty')) {
                const quantityInput = row.querySelector('.quantity');
                if (parseInt(quantityInput.value) > 1) {
                    quantityInput.value = parseInt(quantityInput.value) - 1;
                    updateProductQuantity(productId, parseInt(quantityInput.value));
                }
            } else if (target.classList.contains('remove-item')) {
                removeProduct(productId);
            }
        });

        cartItems.addEventListener('change', function (event) {
            const target = event.target;
            if (target.classList.contains('quantity')) {
                const row = target.closest('tr');
                const productId = parseInt(row.dataset.id);
                updateProductQuantity(productId, parseInt(target.value));
            }
        });

        // Initial cart update
        updateCart();
    </script>
</body>

</html>