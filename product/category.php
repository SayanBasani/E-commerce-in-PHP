<?php 
include("./../config.php");

include "./../header_footer/header_nav.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <section class="container mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-center mb-12">Shop by Category</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Category 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:scale-105">
                <img src="https://blog.learningbix.com/wp-content/uploads/2022/06/applications-of-electronics.png?height=200&width=300" alt="Electronics" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Electronics</h3>
                    <a href="#" class="text-blue-600 hover:underline">Shop Now</a>
                </div>
            </div>

            <!-- Category 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:scale-105">
                <img src="https://t4.ftcdn.net/jpg/06/58/35/49/240_F_658354934_6YjHXHdI9EuxdgyjdNHGwnCYlqMcSfZ8.jpg?height=200&width=300" alt="Clothing" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Clothing</h3>
                    <a href="#" class="text-blue-600 hover:underline">Shop Now</a>
                </div>
            </div>

            <!-- Category 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:scale-105">
                <img src="https://media.designcafe.com/wp-content/uploads/2020/06/17190457/retro-decor-vintage-living-room-accessories.jpg?height=200&width=300" alt="Home & Garden" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Home & Garden</h3>
                    <a href="#" class="text-blue-600 hover:underline">Shop Now</a>
                </div>
            </div>

            <!-- Category 4 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:scale-105">
                <img src="https://media.istockphoto.com/id/487770577/photo/makeup-set-on-table-front-view.jpg?s=1024x1024&w=is&k=20&c=PEsDp2KjkBqTCz8sSIu5D5qjyYydYyOl_aMLcQGuJg8=" alt="Beauty & Personal Care" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Beauty & Personal Care</h3>
                    <a href="#" class="text-blue-600 hover:underline">Shop Now</a>
                </div>
            </div>

            <!-- Category 5 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:scale-105">
                <img src="/placeholder.svg?height=200&width=300" alt="Sports & Outdoors" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Sports & Outdoors</h3>
                    <a href="#" class="text-blue-600 hover:underline">Shop Now</a>
                </div>
            </div>

            <!-- Category 6 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:scale-105">
                <img src="/placeholder.svg?height=200&width=300" alt="Books & Media" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Books & Media</h3>
                    <a href="#" class="text-blue-600 hover:underline">Shop Now</a>
                </div>
            </div>

            <!-- Category 7 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:scale-105">
                <img src="/placeholder.svg?height=200&width=300" alt="Toys & Games" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Toys & Games</h3>
                    <a href="#" class="text-blue-600 hover:underline">Shop Now</a>
                </div>
            </div>

            <!-- Category 8 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:scale-105">
                <img src="/placeholder.svg?height=200&width=300" alt="Automotive" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Automotive</h3>
                    <a href="#" class="text-blue-600 hover:underline">Shop Now</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php include "./../header_footer/footer.php"; ?>
