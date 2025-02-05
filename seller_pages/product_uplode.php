<?php
include("./../config.php");
include '../header_footer/header_nav.php';
include 'check_seller.php';
include '../connection.php';
// echo '' . $user_email . "email";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <title>Document</title>
</head>

<body>
  <form action="#" method="post">
    <div class="bg-gray-300 grid justify-center gap-6 rounded-xl items-center m-auto mt-10 max-w-[700px] p-4">
      <h1 class="m-auto font-semibold">Add New Product</h1>

      <div class="grid gap-3 grid-cols-2">

        <div class="2nd_side grid gap-3">
          <!-- name of the product -->
          <div class="border-1 p-3 rounded border-gray-400 bg-gray-200 grid items-center">
            <label for="">Product Name : <input name="product_name" type="text" class=" outline-none"
                placeholder="Enter the product Name"></label>
          </div>
          <!-- description -->
          <div class="border-1 p-3 rounded border-gray-400 bg-gray-200 grid items-center">
            <label for="">Product Description : </label>
            <textarea name="product_description" id="" class="outline-none"
              placeholder="Enter the description"></textarea>

          </div>

          <!-- all category -->
          <div class="border-1 p-3 rounded border-gray-400 bg-gray-200 items-center">
            <p class="text-gray-700 font-semibold">Category</p>
            <label class="text-gray-700 font-semibold flex items-center">
              <select name="categories" id="categories"
                class="category-select border-1 border-gray-300 rounded-[5px] font-normal outline-none">
                <!-- Clothing & Fashion -->
                <option value="clothing">Clothes</option>
                <option value="mens-clothing">Men's Clothing</option>
                <option value="womens-clothing">Women's Clothing</option>
                <option value="kids-clothing">Kids' Clothing</option>
                <option value="accessories">Accessories</option>
                <option value="shoes">Shoes & Footwear</option>

                <!-- Electronics -->
                <option value="electronics">Electronics</option>
                <option value="mobile-phones">Mobile Phones</option>
                <option value="laptops">Laptops</option>
                <option value="cameras">Cameras</option>
                <option value="audio">Audio & Headphones</option>
                <option value="smartwatches">Smartwatches</option>
                <option value="gaming-consoles">Gaming Consoles</option>

                <!-- Home & Furniture -->
                <option value="home-furniture">Home & Furniture</option>
                <option value="furniture">Furniture</option>
                <option value="home-decor">Home Decor</option>
                <option value="kitchen-appliances">Kitchen Appliances</option>
                <option value="lighting">Lighting</option>

                <!-- Beauty & Health -->
                <option value="beauty-health">Beauty & Health</option>
                <option value="skincare">Skincare</option>
                <option value="haircare">Haircare</option>
                <option value="makeup">Makeup</option>
                <option value="fitness-equipment">Fitness Equipment</option>

                <!-- Books & Stationery -->
                <option value="books-stationery">Books & Stationery</option>
                <option value="fiction-books">Fiction</option>
                <option value="non-fiction-books">Non-fiction</option>
                <option value="academic-books">Academic Books</option>
                <option value="art-supplies">Art Supplies</option>

                <!-- Sports & Outdoors -->
                <option value="sports-outdoors">Sports & Outdoors</option>
                <option value="sports-equipment">Sports Equipment</option>
                <option value="outdoor-gear">Outdoor Gear</option>
                <option value="fitness-wear">Fitness Wear</option>

                <!-- Other -->
                <option value="jewelry">Jewelry</option>
                <option value="pets">Pets</option>
                <option value="automotive">Automotive</option>
                <option value="travel-luggage">Travel & Luggage</option>
                <option value="industrial-tools">Industrial & Professional</option>
              </select>
            </label>
          </div>
          <!-- pament type -->
          <div class="border-1 p-3 rounded border-gray-400 bg-gray-200 grid items-center">
            <label for="">Payment recive type </label>
            <select name="payment_type" id="categories"
              class="category-select border-1 border-gray-300 rounded-[5px] font-normal outline-none">
              <option value="Online Payment">Online Payment</option>
              <option value="Cash on delivery">Cash on delivery</option>
              <option value="Both">Both</option>
            </select>
          </div>
          <!-- total stock -->
          <div class="border-1 p-3 rounded border-gray-400 bg-gray-200 grid items-center">
            <label for="">Total stock : <input name="product_total_stock" type="number" class=" outline-none"
                placeholder="Enter the product Name"></label>
          </div>
          <!-- reffandable or not -->
          <div class="border-1 p-3 rounded border-gray-400 bg-gray-200 grid items-center">
            <label for="" class="flex justify-between">Refundable :
              <p class="flex gap-3"><input type="radio" name="Reffandable" id="" value="Yes">Yes</p>
              <p class="flex gap-3"><input type="radio" name="Reffandable" id="" value="No">No</p>
            </label>
          </div>



        </div>

        <div class="2nd_side grid gap-3">
          <!-- image uplod -->
          <div>
            <label for="uploadFile1"
              class="bg-white text-gray-500 font-semibold text-base rounded max-w-md h-52 flex flex-col items-center justify-center cursor-pointer border-2 border-gray-300 border-dashed mx-auto font-[sans-serif]">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-11 mb-2 fill-gray-500" viewBox="0 0 32 32">
                <path
                  d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                  data-original="#000000" />
                <path
                  d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                  data-original="#000000" />
              </svg>
              Upload file

              <input type="file" id="uploadFile1" class="hidden" multiple
                accept="image/png, image/jpg, image/jpeg, image/svg, image/webp, image/gif" />
              <p class="text-xs font-medium text-gray-400 mt-2">PNG, JPG, SVG, WEBP, and GIF are Allowed.</p>
            </label>


          </div>
          <!-- Preview Section -->
          <div id="imagePreviewContainer"
            class="flex space-x-4 mt-4 overflow-x-auto p-4 border border-gray-300 rounded bg-gray-100"
            style="white-space: nowrap;">
          </div>

          <script>          // this script for image preview
            const uploadInput = document.getElementById("uploadFile1");
            const previewContainer = document.getElementById("imagePreviewContainer");

            uploadInput.addEventListener("change", (event) => {
              const files = event.target.files;
              
              // Loop through files and generate previews
              for (const file of files) {
                const reader = new FileReader();

                reader.onload = function (e) {
                  // Create a container for the image preview
                  const imageWrapper = document.createElement("div");
                  imageWrapper.classList.add("relative", "inline-block");

                  // Add image preview
                  const img = document.createElement("img");
                  img.src = e.target.result;
                  img.alt = file.name;
                  img.classList.add("min-w-24", "max-w-24", "h-24", "object-cover", "rounded", "border");

                  // Add delete button
                  const deleteButton = document.createElement("button");
                  deleteButton.innerText = "X";
                  deleteButton.classList.add(
                    "absolute",
                    "top-1",
                    "right-1",
                    "bg-red-500",
                    "text-white",
                    "text-xs",
                    "rounded-full",
                    "w-5",
                    "h-5",
                    "flex",
                    "items-center",
                    "justify-center",
                    "cursor-pointer"
                  );
                  deleteButton.onclick = () => {
                    previewContainer.removeChild(imageWrapper);
                  };

                  imageWrapper.appendChild(img);
                  imageWrapper.appendChild(deleteButton);
                  previewContainer.appendChild(imageWrapper);
                };

                reader.readAsDataURL(file);
              }
            });
          </script>

          <style>
            #imagePreviewContainer {
              width: auto;
              display: flex;
              gap: 1rem;
              overflow-x: auto;
              /* Allows horizontal scrolling */
              padding: 0.5rem;
              border: 1px solid #e5e7eb;
              border-radius: 0.5rem;
              background-color: #f9fafb;
            }

            #imagePreviewContainer img {
              flex-shrink: 0;
              /* Prevent images from shrinking */
              margin-right: 0.5rem;
            }
          </style>
          <!-- for image preview end  -->


          <!-- product price min max -->
          <div class="h-fit border-1 p-3 rounded border-gray-400 bg-gray-200 ">
            Product Price
            <label class="text-gray-700 font-semibold flex">
              <div class="font-normal grid text-[13px]">
                <label for="">Min</label>
                <input name="product_max_price" type="number" class="outline-none" placeholder="Min amount">
              </div>
              <div class="font-normal grid text-[13px]">
                <label for="">Min</label>
                <input name="product_min_price" type="number" class="outline-none" placeholder="Min amount">
              </div>
            </label>
          </div>

          <div class="h-fit border-1 p-3 rounded border-gray-400 bg-gray-200 ">
            <label for="">Product Address : <input name="product_pickup_address" type="text" class="w-full outline-none"
                placeholder="Enter product Address"></label>
          </div>

        </div>
      </div>
      <div class="border-1 border-gray-400"></div>
      <!-- category -->
      <div class="grid gap-3 grid-cols-1">

        <label for="" class="font-semibold text-gray-500">Specification</label>

        <!-- Container for Specification Rows -->
        <div id="specificationContainer" class="space-y-3">

          <!-- Static Header Row -->
          <!-- <div class="text-gray-500 border-1 p-3 rounded border-gray-400 bg-gray-200 grid grid-cols-[1fr_1fr_50px] items-center"> -->
          <div class="text-gray-500  grid grid-cols-[1fr_1fr_50px] items-center">
            <label for="">Specification Name</label>
            <label for="">Description</label>
            <label for="" class="text-gray-500"></label> <!-- Space for delete button -->
          </div>

          <!-- Default First Row of Specification -->
          <!-- <div
            class="specificationRow text-gray-500 border-1 pt-1 p-3 rounded border-gray-400 bg-gray-200 grid grid-cols-[1fr_1fr_50px] items-center">
            <input type="text" placeholder="Enter The Specification" class="outline-none specification-name">
            <input type="text" placeholder="Enter The Description" class="outline-none specification-description">
            <button type="button" class="delete-btn text-gray-500">
              <svg width="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                <path
                  d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
              </svg>
            </button>
          </div> -->

        </div>

        <!-- Button to Add More Specification Rows -->
        <button type="button" id="addSpecButton"
          class="mt-3 bg-blue-500 text-white px-4 py-2 rounded font-semibold hover:bg-blue-600">
          Add Specification
        </button>
        <!-- Add the submit button -->
        <button name="product_uplod_btn" id="submitBtn" type="submit"
          class="mt-3 p-2 bg-blue-500 text-white rounded">Submit</button>


      </div>


    </div>
  </form>
  
</body>

</html>


<script>
  // Get the add button and specification container
  const addSpecButton = document.getElementById('addSpecButton');
  const specificationContainer = document.getElementById('specificationContainer');
  let the_new_specifaction_row = 0;

  // Function to add a new specification row
  addSpecButton.addEventListener('click', () => {
    the_new_specifaction_row++;
    console.log(`Total rows: ${the_new_specifaction_row}`);

    const newRow = document.createElement('div');
    newRow.className = 'specificationRow text-gray-500 border-1 p-3 rounded border-gray-400 bg-gray-200 grid grid-cols-[1fr_1fr_50px] items-center';

    newRow.innerHTML = `
      <input type="text" name="specifications[${the_new_specifaction_row}][name]" placeholder="Enter The Specification" class="outline-none specification-name">
      <input type="text" name="specifications[${the_new_specifaction_row}][description]" placeholder="Enter The Description" class="outline-none specification-description">
      <button type="button" class="delete-btn text-gray-500">
        <svg width="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
          <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
        </svg>
      </button>
    `;

    // Add the new row to the container
    specificationContainer.appendChild(newRow);

    // Attach the delete functionality to the new delete button
    const deleteButton = newRow.querySelector('.delete-btn');
    deleteButton.addEventListener('click', () => {
      newRow.remove(); // Remove the specification row when the delete button is clicked
      the_new_specifaction_row--; // Decrement the row count
    });
  });

  // This function will convert all the specifications to JSON format when submitting the form
  function collectSpecificationsAsJSON() {
    const specifications = [];
    const specificationRows = document.querySelectorAll('.specificationRow');

    specificationRows.forEach(row => {
      const name = row.querySelector('.specification-name').value;
      const description = row.querySelector('.specification-description').value;

      // Only add non-empty specifications
      if (name && description) {
        specifications.push({ name, description });
      }
    });

    return JSON.stringify(specifications);
  }

  // Listen to the form submit and append the specifications JSON data
  document.getElementById('productForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form from submitting immediately

    // Collect specifications as JSON
    const specificationsJSON = collectSpecificationsAsJSON();

    // Add the specifications JSON to a hidden input field in the form
    const specificationsInput = document.createElement('input');
    specificationsInput.type = 'hidden';
    specificationsInput.name = 'specifications_json';
    specificationsInput.value = specificationsJSON;

    this.appendChild(specificationsInput); // Append the input to the form

    // Now you can submit the form
    // this.submit(); // Actually submit the form
  });
</script>

<?php

if (isset($_POST['product_uplod_btn'])) {
  echo "buton is clicked";
  // $specification = $_POST["specifications"];
  // echo $specification . "ok";

  $product_name = $_POST['product_name'];
  $product_description = $_POST['product_description'];
  $categories = $_POST['categories'];
  $payment_type = $_POST['payment_type'];
  $product_total_stock = $_POST['product_total_stock'];
  $Reffandable = $_POST['Reffandable'];
  $product_max_price = $_POST['product_max_price'];
  $product_min_price = $_POST['product_min_price'];
  $product_pickup_address = $_POST['product_pickup_address'];
  if (isset($_POST['specifications']) || empty($product_name) || empty($product_description) || empty($categories) || empty($payment_type) || empty($product_total_stock) || empty($Reffandable) || empty($product_max_price) || empty($product_min_price) || empty($product_pickup_address)) {
    $product_query = "INSERT INTO products (uploder_email, product_name, product_description, categories, payment_type,  product_total_stock, refundable, product_max_price, product_min_price,  product_pickup_address
                      ) VALUES ('$user_email','$product_name','$product_description','$categories','$payment_type','$product_total_stock','$Reffandable','$product_max_price','$product_min_price','$product_pickup_address')";
    echo $product_query;
    // $result = mysqli_query($conn ,$product_query);
    // echo $result['id'];
    if (mysqli_query($conn, $product_query)) {
      $product_id = mysqli_insert_id($conn);
      // echo "last product id is --> $product_id";
      $specifications = $_POST['specifications'];
      foreach ($specifications as $spec) {
        $spec_name = $spec['name'];
        $spec_description = $spec['description'];
        // echo '----'.$spec_name.'---'.$spec_description.'---';
        $specification_query = "INSERT INTO specifications (product_id, spec_name, spec_description) VALUES ('$product_id', '$spec_name', '$spec_description')";
        if (mysqli_query($conn, $specification_query)) {
          echo "sucessfully all data uploded";
        } else {
          echo "error is -->" . mysqli_error($conn) . " ";
        }
      }
      // header("Location: http://localhost/Program/Ecom/seller_pages/product_uplod_sucessfull.php?pid=$product_id");
      // exit;
      ?>
      <script>
        location.replace("http://localhost/Program/Ecom/seller_pages/add_product_keywords.php?pid=<?php echo "$product_id"; ?>")
      </script>
      <?php
      exit;
    } else {
      echo "error is " . mysqli_error($conn) . " ";
    }


  } else {
    echo "the field have to fill ";
  }
}


?>