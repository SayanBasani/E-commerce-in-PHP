<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Footer - Your E-commerce Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="mb-6 md:mb-0">
                    <h3 class="text-lg font-semibold mb-4">Your Store</h3>
                    <p class="text-gray-400 mb-4">Bringing quality products to your doorstep since 2010.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="mb-6 md:mb-0">
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Products</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="mb-6 md:mb-0">
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i>
                            <span>123 E-commerce St, Anytown, USA 12345</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2 text-gray-400"></i>
                            <span>+1 (555) 123-4567</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2 text-gray-400"></i>
                            <span>contact@yourstore.com</span>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div class="mb-6 md:mb-0">
                    <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
                    <p class="text-gray-400 mb-4">Subscribe to our newsletter for the latest updates and offers.</p>
                    <form class="flex flex-col sm:flex-row">
                        <input type="email" placeholder="Your email" class="bg-gray-700 text-white px-4 py-2 mb-2 sm:mb-0 sm:mr-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors duration-300">Subscribe</button>
                    </form>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gray-700 mt-8 pt-8 text-sm text-gray-400 text-center">
                <p>&copy; 2023 Your Store. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>