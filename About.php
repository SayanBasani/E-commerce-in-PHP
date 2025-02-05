<?php 
include "config.php"; 
include "header_footer/header_nav.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Your E-commerce Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    

    <main class="container mx-auto px-6 py-8">
        <section class="mb-12">
            <h1 class="text-4xl font-bold text-center mb-8">About Us</h1>
            <div class="max-w-3xl mx-auto text-center">
                <p class="text-lg text-gray-700 mb-6">
                    Welcome to Your Store, where passion meets quality. We're dedicated to providing you with the best products and shopping experience possible.
                </p>
                <img src="https://img.freepik.com/premium-vector/ecommerce-online-shopping-marketing-concept-vector-stock-illustration_618588-583.jpg?height=400&width=600" alt="Our Store" class="w-full h-64 object-cover rounded-lg shadow-md mb-6">
            </div>
        </section>

        <section class="mb-12">
            <h2 class="text-3xl font-semibold text-center mb-6">Our Story</h2>
            <div class="max-w-3xl mx-auto">
                <p class="text-gray-700 mb-4">
                    Founded in 2010, Your Store began as a small family-owned business with a vision to revolutionize online shopping. Over the years, we've grown into a trusted e-commerce destination, serving customers worldwide with our curated selection of high-quality products.
                </p>
                <p class="text-gray-700 mb-4">
                    Our journey has been driven by a commitment to excellence, customer satisfaction, and continuous innovation. We take pride in our ability to adapt to changing market trends while maintaining our core values.
                </p>
            </div>
        </section>

        <section class="mb-12">
            <h2 class="text-3xl font-semibold text-center mb-6">Our Mission</h2>
            <div class="max-w-3xl mx-auto text-center">
                <p class="text-gray-700 mb-4">
                    At Your Store, our mission is to empower consumers by providing access to premium products at competitive prices. We strive to create a seamless shopping experience that combines convenience, quality, and exceptional customer service.
                </p>
            </div>
        </section>

        <section class="mb-12">
            <h2 class="text-3xl font-semibold text-center mb-8">Our Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <img src="https://as2.ftcdn.net/jpg/03/40/50/97/1000_F_340509733_5MwYU9THVvHgCBuYKZIC8nm5vIoM0dEv.jpg?height=150&width=150" alt="John Doe" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">John Doe</h3>
                    <p class="text-gray-600">Founder & CEO</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <img src="https://as2.ftcdn.net/jpg/03/40/50/97/1000_F_340509733_5MwYU9THVvHgCBuYKZIC8nm5vIoM0dEv.jpg?height=150&width=150" alt="Jane Smith" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Jane Smith</h3>
                    <p class="text-gray-600">Head of Operations</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <img src="https://as2.ftcdn.net/jpg/03/40/50/97/1000_F_340509733_5MwYU9THVvHgCBuYKZIC8nm5vIoM0dEv.jpg?height=150&width=150" alt="Mike Johnson" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Mike Johnson</h3>
                    <p class="text-gray-600">Customer Service Manager</p>
                </div>
            </div>
        </section>

        <section class="bg-blue-600 text-white rounded-lg p-8 text-center">
            <h2 class="text-3xl font-semibold mb-4">Ready to Start Shopping?</h2>
            <p class="mb-6">Explore our wide range of products and experience the difference at Your Store.</p>
            <a href="./Dashbord.php" class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition duration-300">Shop Now</a>
        </section>
    </main>

    
</body>
</html>
<?php include "header_footer/footer.php"; ?>
