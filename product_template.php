<!-- in this page from previous page it need "$product_id,$product_name,$product_price" this 3 data  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>E-commerce Product Search</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<!-- https://source.unsplash.com/random/600x400?gadgets -->
<!-- bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 -->

<!-- <div class="font-sans p-4 mx-auto lg:max-w-6xl md:max-w-4xl"> -->



<!-- <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6"> -->


<!--  -->
<div
    class="child bg-white flex flex-col rounded overflow-hidden shadow-md cursor-pointer hover:scale-[1.01] transition-all">
    <div class="w-full">
        <img src="https://random-image-pepebigotes.vercel.app/api/random-image" alt="Product 1"
            class="w-full object-cover object-top aspect-[230/307]" />
    </div>
    <div class="p-4 flex-1 flex flex-col">
        <!-- <div class="flex-1"> -->
        <a class="flex-1" href="http://localhost/Program/Ecom/product_overview.php?pid=<?php echo $product_id; ?>">
            <h5 class="text-sm sm:text-base font-bold text-gray-800 line-clamp-2"><?php echo $product_name; ?></h5>
            <div class="mt-2 flex items-center flex-wrap gap-2">
                <h6 class="text-sm sm:text-base font-bold text-gray-800"><?php echo $product_price; ?></h6>
                <div class="bg-gray-100 w-8 h-8 flex items-center justify-center rounded-full cursor-pointer ml-auto"
                    title="Wishlist">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" class="fill-gray-800 inline-block"
                        viewBox="0 0 64 64">
                        <path
                            d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z"
                            data-original="#000000"></path>
                    </svg>
                </div>
            </div>
        </a>
        <!-- </div> -->
        <a href="./add_to_cart.php?pid=<?php echo $product_id; ?>">
            <button type="button"
                class="px-2 h-9 font-semibold w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white tracking-wide ml-auto outline-none border-none rounded">
                Add to cart
            </button>
        </a>
    </div>
</div>



<!-- </div> -->
<!-- </div> -->
<!-- </body>

</html> -->