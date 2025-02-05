<!DOCTYPE html>
<html lang="en" class="font-['Jost',_Roboto,_sans-serif] text-[18px] leading-normal text-[#8f8f8f] tracking-wider">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Popup</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            heading: ['Marcellus', 'Roboto', 'sans-serif'],
          },
          colors: {
            primary: '#8c907e',
            secondary: '#6c757d',
            black: '#111',
            light: '#f1f1f0',
          },
        }
      }
    }
  </script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Jost:wght@400&family=Marcellus&display=swap');
  </style>
</head>
<!-- 
<body>
  <div class="search_element"> -->
<svg xmlns="http://www.w3.org/2000/svg" class="hidden">
  <defs>
    <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
    </symbol>
  </defs>
</svg>

<!-- search part -->
<div id="search-popup" class="fixed inset-0 bg-white opacity-0 invisible transition-opacity duration-300 z-50">
  <div class="relative top-1/2 transform -translate-y-1/2 w-11/12 max-w-3xl mx-auto text-center">
    <form role="search" method="get" class="mb-12" action="">
      <div class="relative">
        <input type="search" id="search-form"
          class="w-full text-4xl pb-1.5 border-b border-gray-300 focus:outline-none focus:border-primary"
          placeholder="Type and press enter" name="search_input" />
        <button name="search_submit" type="submit" class="absolute top-4 right-0 bg-white">
          <svg class="w-6 h-6 text-black">
            <use xlink:href="#search"></use>
          </svg>
        </button>
      </div>

      <?php
        if(isset($_GET['search_submit'])){
          $search = $_GET['search_input'];
          ?>
          <script>
            // C:\xampp\htdocs\Program\Ecom\header_footer\search_element.php
            // C:\xampp\htdocs\Program\Ecom\Search_product.php
            location.replace(window.location.origin + "/Program/Ecom/Search_product.php?search_input=<?php echo $search; ?>");

            // location.replace('/Program/Ecom/Search_product.php?s=<?php echo $search; ?>&&sayan=me');
            // location.replace('./Search_product.php?s=<?php //echo $search; ?>')            
            // location.replace('http://localhost/Program/Ecom/Search_product.php?s=<?php //echo $search; ?>')
          </script>
          <?php
        }
      ?>
    </form>

    <h5 class="text-sm font-normal uppercase tracking-widest mb-2.5 text-black">Browse Categories</h5>

    <ul class="list-none">
      <li class="inline-block text-4xl">
        <a href="#"
          class="relative hover:after:content-[''] hover:after:absolute hover:after:left-0 hover:after:bottom-0 hover:after:w-full hover:after:h-px hover:after:bg-primary"
          title="Jackets">Jackets</a>
      </li>
      <li class="inline-block text-4xl">
        <span class="mx-1.5 text-gray">/</span>
        <a href="#"
          class="relative hover:after:content-[''] hover:after:absolute hover:after:left-0 hover:after:bottom-0 hover:after:w-full hover:after:h-px hover:after:bg-primary"
          title="T-shirts">T-shirts</a>
      </li>
      <li class="inline-block text-4xl">
        <span class="mx-1.5 text-gray">/</span>
        <a href="#"
          class="relative hover:after:content-[''] hover:after:absolute hover:after:left-0 hover:after:bottom-0 hover:after:w-full hover:after:h-px hover:after:bg-primary"
          title="Handbags">Handbags</a>
      </li>
      <li class="inline-block text-4xl">
        <span class="mx-1.5 text-gray">/</span>
        <a href="#"
          class="relative hover:after:content-[''] hover:after:absolute hover:after:left-0 hover:after:bottom-0 hover:after:w-full hover:after:h-px hover:after:bg-primary"
          title="Accessories">Accessories</a>
      </li>
      <li class="inline-block text-4xl">
        <span class="mx-1.5 text-gray">/</span>
        <a href="#"
          class="relative hover:after:content-[''] hover:after:absolute hover:after:left-0 hover:after:bottom-0 hover:after:w-full hover:after:h-px hover:after:bg-primary"
          title="Cosmetics">Cosmetics</a>
      </li>
      <li class="inline-block text-4xl">
        <span class="mx-1.5 text-gray">/</span>
        <a href="#"
          class="relative hover:after:content-[''] hover:after:absolute hover:after:left-0 hover:after:bottom-0 hover:after:w-full hover:after:h-px hover:after:bg-primary"
          title="Dresses">Dresses</a>
      </li>
      <li class="inline-block text-4xl">
        <span class="mx-1.5 text-gray">/</span>
        <a href="#"
          class="relative hover:after:content-[''] hover:after:absolute hover:after:left-0 hover:after:bottom-0 hover:after:w-full hover:after:h-px hover:after:bg-primary"
          title="Jumpsuits">Jumpsuits</a>
      </li>
    </ul>
  </div>
</div>

<!-- fack input button -->
<a href="#" id="search-button"
  class="search_button flex items-center bg-white border-1  rounded-lg shadow-sm w-full max-w-md h-10 px-4 text-gray-500  focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200">
  <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
    xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
  </svg>
  <span class="flex-grow text-left">Search..</span>
</a>


</html>



<script>
  const searchButton = document.getElementById('search-button');
  const searchPopup = document.getElementById('search-popup');

  searchButton.addEventListener('click', (e) => {
    e.preventDefault();
    searchPopup.classList.toggle('opacity-0');
    searchPopup.classList.toggle('invisible');
  });

  searchPopup.addEventListener('click', (e) => {
    if (e.target === searchPopup) {
      searchPopup.classList.add('opacity-0');
      searchPopup.classList.add('invisible');
    }
  });
</script>