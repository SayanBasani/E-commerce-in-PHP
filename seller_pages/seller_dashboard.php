<?php
include("./../config.php");
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=upload" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=notifications" />
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
    <style>
        .div {
            /* border: 2px solid black; */
        }
    </style>
</head>

<body class="bg-blue-50">

    <!-- Sidebar -->
    <div class="div flex h-screen bg-blue-100 text-gray-800">
        <div class="max-sm:w-20 w-64 bg-blue-200 p-6 max-sm:p-3">
            <!-- <h2 class="max-sm:text-base text-2xl font-semibold text-center text-blue-800 mb-8">Dashboard</h2> -->
            <ul class="space-y-6">
                <li><a href="#"
                        class="h-12 max-sm:h-8 items-center justify-center flex bg-white p-2 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all block py-2 px-4 rounded-lg hover:bg-blue-300">Home</a>
                </li>
                <li>
                    <a href="./manage_product.php"
                        class="h-12 max-sm:h-8 max-sm:text-xs items-center justify-center flex bg-white p-2 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all block py-2 px-4 rounded-lg hover:bg-blue-300">
                        Manage Products
                    </a>
                </li>
                <li>
                    <a href="./product_uplode.php"
                        class="h-12 max-sm:h-8 max-sm:text-xs items-center justify-center flex bg-white p-2 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all block py-2 px-4 rounded-lg hover:bg-blue-300">
                        Upload Product
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="h-12 max-sm:h-8 max-sm:text-xs items-center justify-center flex bg-white p-2 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all block py-2 px-4 rounded-lg hover:bg-blue-300">
                        Orders
                    </a>
                </li>
                <li>
                    <a href="./../profile.php"
                        class="h-12 max-sm:h-8 max-sm:text-xs items-center justify-center flex bg-white p-2 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all block py-2 px-4 rounded-lg hover:bg-blue-300">
                        Profile
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="h-12 max-sm:h-8 max-sm:text-xs items-center justify-center flex bg-white p-2 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all block py-2 px-4 rounded-lg hover:bg-blue-300">
                        Settings
                    </a>
                </li>

            </ul>
        </div>

        <!-- Main content -->
        <div class="flex-1 p-8 max-sm:p-3 gap-3 max-sm:text-xs w-fit">
            <!-- Top bar -->
            <div class=" justify-between items-center max-sm:mb-3 mb-8">
                <div class="div grid grid-cols-[1fr_5fr_1fr] items-center justify-between">
                    <div class="flex justify-center">
                        <a href="product_uplode.php">
                            <button class="p-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-400 max-sm:text-xs">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#e8eaed">
                                    <path
                                        d="M440-320v-326L336-542l-56-58 200-200 200 200-56 58-104-104v326h-80ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z" />
                                </svg>
                            </button>
                        </a>
                    </div>
                    <input type="text" placeholder="Search..."
                        class="max-sm:w-[150px]  p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <div class="flex justify-center">
                        <button
                            class="w-fit p-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-400 max-sm:text-xs">
                            <span class="material-symbols-outlined">
                                notifications
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Upload Product Button -->
            <div class="mb-8 hidden">
                <a href="product_uplode.php"
                    class="p-3 bg-green-500 text-white rounded-lg shadow-lg hover:bg-green-400 transition ease-in-out duration-200">
                    Upload Product
                </a>
            </div>

            <!-- Dashboard sections -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Manage Products Section -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4  max-sm:text-base">Manage Products</h2>
                    <p class="text-gray-600">Add, edit, or delete your products.</p>
                    <a href=".\manage_product.php" class="mt-4 inline-block text-blue-600 hover:text-blue-700">
                        Go to Products
                    </a>
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