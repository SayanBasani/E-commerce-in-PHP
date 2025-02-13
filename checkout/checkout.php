<?php 
include("./../config.php");

include "./../header_footer/header_nav.php"; ?>
<?php

include "./../connection.php";
$user_type = "";
// Check if user is logged in

if (isset($_SESSION['user_email'])) {
    $user_type = $_SESSION['user_type'];
    $user_email = $_SESSION['user_email'];
    // echo "Welcome, $user_email! Your user ID is $user_type";

} else {
    ?>
    <script>
        window.location.replace("./../Dashbord.php");
    </script>
    <?php

    echo "<script>window.history.back();</script>";
}
$shopping_address_check_qre = "select * from ShippingInfo where user_email = '$user_email'";
$shopping_address_check_result = mysqli_query($conn, $shopping_address_check_qre);
$row = mysqli_fetch_assoc($shopping_address_check_result);
// print_r($row);
// echo "<br> --->" . $row['id'] . "<---- ";

$shopping_payment_check_qre = "select * from PaymentInfo where user_email = '$user_email'";
$shopping_payment_check_result = mysqli_query($conn, $shopping_payment_check_qre);
$pay_row = mysqli_fetch_assoc($shopping_payment_check_result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Your E-commerce Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Checkout</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Shipping Information -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Shipping Information</h2>
                <?php
                if ($row > 0) {
                    ?>
                    <div id="shipping-info" class="bg-gray-100 p-4 rounded-md">
                        <p><strong>Full Name:</strong> <span id="fullNameDisplay"><?php echo $row['fullName']; ?></span></p>
                        <p><strong>Email:</strong> <span id="emailDisplay"><?php echo $row['email']; ?></span></p>
                        <p><strong>Phone Number:</strong> <span
                                id="phoneNumberDisplay"><?php echo $row['phoneNumber']; ?></span></p>
                        <p><strong>Address:</strong> <span id="addressDisplay"><?php echo $row['address']; ?></span></p>
                        <p><strong>PIN Code:</strong> <span id="pinCodeDisplay"><?php echo $row['pinCode']; ?></span></p>
                    </div>
                    <?php
                }
                ?>
                <button onclick="openModal('shipping-modal')"
                    class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Edit Shipping Info
                </button>
            </div>

            <!-- Payment Information -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Payment Information</h2>
                <?php
                if ($pay_row > 0) {
                    ?>
                    <div id="payment-info" class="bg-gray-100 p-4 rounded-md">
                        <p><strong>Card Number:</strong> <span id="cardNumberDisplay"><?php echo $pay_row['cardNumber'];?></span></p>
                        <p><strong>Cardholder Name:</strong> <span id="cardholderNameDisplay"><?php echo $pay_row['cardholderName'];?></span></p>
                        <p><strong>Expiry Date:</strong> <span id="expiryDateDisplay"><?php echo $pay_row['expiryDate'];?></span></p>
                        <p><strong>CVV:</strong> ***</p>
                    </div>
                    <?php
                }
                ?>
                <button onclick="openModal('payment-modal')"
                    class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Edit Payment Info
                </button>
            </div>
        </div>

        <div class="mt-8 text-center">
            <button onclick="placeOrder()"
                class="bg-green-600 text-white py-2 px-8 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Place Order
            </button>
        </div>
    </div>

    <!-- Shipping Modal -->
    <div id="shipping-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <h2 class="text-xl font-semibold mb-4">Edit Shipping Information</h2>
            <form method="post" id="shippingForm" onsubmit="return saveInfo(this, 'shipping')">
                <div class="space-y-4">
                    <div>
                        <label for="fullName" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="fullName" name="fullName" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="phoneNumber" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <textarea id="address" name="address" rows="3" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
                    </div>
                    <div>
                        <label for="pinCode" class="block text-sm font-medium text-gray-700">PIN Code</label>
                        <input type="text" id="pinCode" name="pinCode" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                </div>
                <div class="flex justify-end space-x-2 mt-4">
                    <button type="button" onclick="closeModal('shipping-modal')"
                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">Cancel</button>
                    <button name="shopping_submit" type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save</button>
                </div>
                <?php
                if (isset($_POST['shopping_submit'])) {
                    $fullName = $_POST['fullName'];
                    $email = $_POST['email'];
                    $phoneNumber = $_POST['phoneNumber'];
                    $address = $_POST['address'];
                    $pinCode = $_POST['pinCode'];
                    $new_address_for_shopping_qry = "INSERT INTO ShippingInfo (user_email, fullName, email, phoneNumber, address, pinCode) VALUES ('$user_email', '$fullName', '$email', '$phoneNumber', '$address', '$pinCode')";

                    $update_shipping_qry = "UPDATE ShippingInfo  SET fullName = '$fullName',  email = '$email',  phoneNumber = '$phoneNumber',  address = '$address',  pinCode = '$pinCode'  WHERE user_email = '$user_email'";
                    // echo $new_address_for_shopping_qry;
                
                    $qury_addres_present = "select * from ShippingInfo WHERE user_email = '$user_email' ";
                    $result_addres_present = mysqli_query($conn, $qury_addres_present);
                    if (mysqli_fetch_assoc($result_addres_present) > 0) {
                        mysqli_query($conn, $update_shipping_qry)
                            ?>
                        <script>
                            alert('update sucessfull');
                            window.location.replace("./checkout.php")
                        </script>
                        <?php
                        exit();
                    } else {
                        if (mysqli_query($conn, $new_address_for_shopping_qry)) {
                            ?>
                            <script>
                                alert('new address add sucessfully');
                                window.location.replace("#")
                            </script>
                            <?php
                            exit();
                        } else {

                            ?>

                            <script>
                                alert("error");
                                window.location.replace("#");
                            </script>
                            <?php
                        }
                    }
                }
                ?>
            </form>
        </div>
    </div>

    <!-- Payment Modal -->
    <div id="payment-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <h2 class="text-xl font-semibold mb-4">Edit Payment Information</h2>
            <form id="paymentForm" onsubmit="return saveInfo(this, 'payment')" method="post">
                <div class="space-y-4">
                    <div>
                        <label for="cardNumber" class="block text-sm font-medium text-gray-700">Card Number</label>
                        <input type="text" id="cardNumber" name="cardNumber" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="cardholderName" class="block text-sm font-medium text-gray-700">Cardholder
                            Name</label>
                        <input type="text" id="cardholderName" name="cardholderName" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="expiryDate" class="block text-sm font-medium text-gray-700">Expiry Date</label>
                        <input type="text" id="expiryDate" name="expiryDate" required placeholder="MM/YY"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="cvv" class="block text-sm font-medium text-gray-700">CVV</label>
                        <input type="password" id="cvv" name="cvv" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                </div>
                <div class="flex justify-end space-x-2 mt-4">
                    <button type="button" onclick="closeModal('payment-modal')"
                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">Cancel</button>
                    <button type="submit" name="payment_submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save</button>
                </div>
                <?php
                if (isset($_POST['payment_submit'])) {
                    $cardNumber = $_POST['cardNumber'];
                    $cardholderName = $_POST['cardholderName'];
                    $expiryDate = $_POST['expiryDate'];
                    $cvv = $_POST['cvv'];
                    $new_payment_for_shopping_qry = "INSERT INTO PaymentInfo (user_email, cardNumber, cardholderName, expiryDate, cvv) VALUES ('$user_email','$cardNumber' ,'$cardholderName', '$expiryDate','$cvv') ";

                    $update_payment_qry = "UPDATE PaymentInfo   SET cardNumber = '$cardNumber',   cardholderName = '$cardholderName',   expiryDate = '$expiryDate'   WHERE user_email = '$user_email'; ";
                    // echo $new_address_for_shopping_qry;
                
                    $qury_payment_present = "select * from PaymentInfo WHERE user_email = '$user_email' ";
                    $result_payment_present = mysqli_query($conn, $qury_payment_present);
                    if (mysqli_fetch_assoc($result_payment_present) > 0) {
                        mysqli_query($conn, $update_payment_qry)
                            ?>
                        <script>
                            alert('card details update sucessfull');
                            window.location.replace("./checkout.php")
                        </script>
                        <?php
                        exit();
                    } else {
                        if (mysqli_query($conn, $new_payment_for_shopping_qry)) {
                            ?>
                            <script>
                                alert('new caed is add sucessfully');
                                window.location.replace("#")
                            </script>
                            <?php
                            exit();
                        } else {

                            ?>

                            <script>
                                alert("<?php echo mysqli_error($conn) ?>");
                                window.location.replace("#");
                            </script>
                            <?php
                        }
                    }
                }
                ?>
            </form>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        // function saveInfo(form, type) {
        //     const formData = new FormData(form);
        //     for (let [key, value] of formData.entries()) {
        //         document.getElementById(key + 'Display').textContent = value || 'Not set';
        //     }
        //     if (type === 'payment') {
        //         document.getElementById('cardNumberDisplay').textContent = maskCardNumber(formData.get('cardNumber'));
        //     }
        //     closeModal(type + '-modal');
        //     return false;
        // }

        // function maskCardNumber(cardNumber) {
        //     return '*'.repeat(cardNumber.length - 4) + cardNumber.slice(-4);
        // }

        // function placeOrder() {
        //     const shippingInfo = document.getElementById('shipping-info');
        //     const paymentInfo = document.getElementById('payment-info');
        //     if (shippingInfo.textContent.includes('Not set') || paymentInfo.textContent.includes('Not set')) {
        //         alert('Please fill in all required information before placing the order.');
        //     } else {
        //         alert('Order placed successfully!');
        //     }
        // }
    </script>
</body>

</html>