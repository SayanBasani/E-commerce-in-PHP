<?php 
include "config.php"; 
include "header_footer/header_nav.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect with Us - Your E-commerce Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <!-- nav -->

    <main class="container mx-auto px-6 py-8">
        <h1 class="text-4xl font-bold text-center mb-8">Connect with Us</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-4">Contact Form</h2>
                <form>
                  <form action="" method="post"></form>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                        <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300">Send Message</button>
                </form>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-4">Contact Information</h2>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <i class="fas fa-map-marker-alt text-blue-600 mt-1 mr-3"></i>
                        <p>123 E-commerce St.<br>Anytown, USA 12345</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone text-blue-600 mr-3"></i>
                        <p>+1 (555) 123-4567</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-blue-600 mr-3"></i>
                        <p>contact@yourstore.com</p>
                    </div>
                </div>
                
                <h3 class="text-xl font-semibold mt-8 mb-4">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-600 hover:text-blue-600"><i class="fab fa-facebook fa-2x"></i></a>
                    <a href="#" class="text-gray-600 hover:text-blue-600"><i class="fab fa-twitter fa-2x"></i></a>
                    <a href="#" class="text-gray-600 hover:text-blue-600"><i class="fab fa-instagram fa-2x"></i></a>
                    <a href="#" class="text-gray-600 hover:text-blue-600"><i class="fab fa-linkedin fa-2x"></i></a>
                </div>
            </div>
        </div>
        
        <div class="mt-12 hidden">
            <h2 class="text-2xl font-semibold mb-4">Find Us</h2>
            <div class="aspect-w-16 aspect-h-9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.2412648718643!2d-73.98658868505396!3d40.75895097932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes%20Square!5e0!3m2!1sen!2sus!4v1635188295196!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </main>

   
</body>
</html>

<?php include "header_footer/footer.php"; ?>