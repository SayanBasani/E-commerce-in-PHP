<?php

include '../header_footer/header_nav.php';
include 'check_seller.php';

?>

<script src="https://unpkg.com/@tailwindcss/browser@4"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</head>

<body class="bg-blue-50">

    <!-- Sidebar -->
    <div class="flex h-screen bg-blue-100 text-gray-800">
        <div class="w-64 bg-blue-200 p-6">
            <h2 class="text-2xl font-semibold text-center text-blue-800 mb-8">Seller Dashboard</h2>
            <ul class="space-y-6">
                <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-blue-300">Home</a></li>
                <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-blue-300">Manage Products</a></li>
                <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-blue-300">Orders</a></li>
                <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-blue-300">Profile</a></li>
                <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-blue-300">Settings</a></li>
            </ul>
        </div>

        <!-- Main content -->
        <div class="flex-1 p-8">
            <!-- Top bar -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Welcome Back, Seller!</h1>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search..."
                        class="p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <button class="p-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-400">Notifications</button>
                </div>
            </div>

            <!-- Upload Product Button -->
            <div class="mb-8">
                <a href="product_uplode.php"
                    class="p-3 bg-green-500 text-white rounded-lg shadow-lg hover:bg-green-400 transition ease-in-out duration-200">Upload
                    Product</a>
            </div>

            <!-- Dashboard sections -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Manage Products Section -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Manage Products</h2>
                    <p class="text-gray-600">Add, edit, or delete your products.</p>
                    <a href="#" class="mt-4 inline-block text-blue-600 hover:text-blue-700">Go to Products</a>
                </div>

                <!-- Orders Section -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Orders</h2>
                    <p class="text-gray-600">View and manage your customer orders.</p>
                    <a href="#" class="mt-4 inline-block text-blue-600 hover:text-blue-700">View Orders</a>
                </div>

                <!-- Profile Section -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Profile</h2>
                    <p class="text-gray-600">Update your account details and preferences.</p>
                    <a href="#" class="mt-4 inline-block text-blue-600 hover:text-blue-700">Go to Profile</a>
                </div>

                <!-- Settings Section -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Settings</h2>
                    <p class="text-gray-600">Adjust your account settings.</p>
                    <a href="#" class="mt-4 inline-block text-blue-600 hover:text-blue-700">Go to Settings</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>