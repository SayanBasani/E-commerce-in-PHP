<?php
session_start();
$user_type = "";
if (isset($_SESSION['user_email'])) {
    $user_type = $_SESSION['user_type'];
    $user_email = $_SESSION['user_email'];
    // echo''.$user_type.''.$user_email.'';
}
include 'check_seller.php';

$the_product_id = "";
if (!isset($_GET['pid'])) {
    echo "dont get the product";
    header("location: seller_dashboard.php");

} else {
    $the_product_id = $_GET['pid'];
    include '../connection.php';
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube-like Tag Input</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Add Tags</h2>
        <div id="tagContainer" class="flex flex-wrap gap-2 mb-2"></div>
        <div class="relative">
            <input type="text" id="tagInput" placeholder="Add a tag..."
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button id="addTagBtn"
                class="absolute right-2 top-1/2 transform -translate-y-1/2 text-blue-500 hover:text-blue-600">
                Add
            </button>
        </div>
        <p class="text-sm text-gray-500 mt-2">Press Enter or click Add to add a tag</p>
        <button name="getTagsBtn" id="getTagsBtn"
            class="mt-4 bg-red-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">
            Get Tags
        </button>
        <form action="" id="key_word_form" method="post">
            <input name="all_kewords" id="tagOutput" class="mt-4 p-2 bg-gray-100 rounded-md hidden">

        </form>
    </div>

    <script>
        let keywords;
        const tagInput = document.getElementById('tagInput');
        const tagContainer = document.getElementById('tagContainer');
        const addTagBtn = document.getElementById('addTagBtn');
        const getTagsBtn = document.getElementById('getTagsBtn');
        const tagOutput = document.getElementById('tagOutput');

        let tags = [];

        function addTag(tagText) {
            if (tagText.trim() !== '' && !tags.includes(tagText.trim())) {
                const tag = document.createElement('span');
                tag.className = 'bg-blue-100 text-blue-800 text-sm font-medium px-2 py-1 rounded-full flex items-center';
                tag.innerHTML = `
                    ${tagText}
                    <button class="ml-1 text-blue-600 hover:text-blue-800 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                `;
                tag.querySelector('button').addEventListener('click', () => removeTag(tag, tagText));
                tagContainer.appendChild(tag);
                tags.push(tagText.trim());
                tagInput.value = '';
            }
        }

        function removeTag(tagElement, tagText) {
            tagElement.remove();
            tags = tags.filter(tag => tag !== tagText);
        }

        tagInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                addTag(tagInput.value);
            }
        });

        addTagBtn.addEventListener('click', () => {
            addTag(tagInput.value);
        });


        document.getElementById('getTagsBtn').addEventListener('click', () => {
            const keywords = JSON.stringify(tags);
            tagOutput.value = keywords;
            const key_word_form = document.getElementById("key_word_form");
            key_word_form.submit();
        });

    </script>
    <!-- // location.replace("http://localhost/Program/Ecom/seller_pages/product_uplod_sucessfull.php?pid=<php echo "$product_id"; >") -->

</body>

</html>


<?php
if (isset($_POST['all_kewords'])) {
    // $product_id = 9; // Example product ID; replace with dynamic value if needed
    $collected_keyword = $_POST['all_kewords'];
    // echo '--->' . $collected_keyword . '<----<br>';
    // Decode JSON string into an array
    $keywords_array = json_decode($collected_keyword, true);

    // Check if the array is valid
    if (is_array($keywords_array)) {
        foreach ($keywords_array as $keyword) {
            $keyword = trim($keyword); // Remove extra spaces

            // Skip empty or null keywords
            if (!empty($keyword)) {
                // Sanitize inputs to prevent SQL injection
                $escaped_product_id = mysqli_real_escape_string($conn, $_GET['pid']);
                $escaped_keyword = mysqli_real_escape_string($conn, $keyword);

                // Directly insert the data
                $query = "INSERT INTO product_keywords (product_id, keywords) VALUES ('$escaped_product_id', '$escaped_keyword')";
                if (mysqli_query($conn, $query)) {
                    // echo "Keyword '{$keyword}' added successfully!<br>";
                } else {
                    echo "Failed to add keyword '{$keyword}': " . mysqli_error($conn) . "<br>";
                    ?>
                    <script>
                        location.replace("./product_uplod_sucessfull.php?pid=<?php echo $_GET['pid']; ?>&&er=true")
                        // location.replace("http://localhost/Program/Ecom/seller_pages/product_uplod_sucessfull.php?pid=<?php echo $_GET['pid']; ?>&&er=true")
                    </script>
                    <?php
                }
            } else {
                echo "Empty keyword skipped!<br>";

            }
        }
        ?>
        <script>
            location.replace("http://localhost/Program/Ecom/seller_pages/product_uplod_sucessfull.php?pid=<?php echo $_GET['pid']; ?>")
        </script>
        <?php
    } else {
        echo "Invalid keywords array received!";
        ?>
        <script>
            "http://localhost/Program/Ecom/seller_pages/add_product_keywords.php?pid=<?php echo $_get['pid'] ?>";
        </script>
        <?php
    }
}
?>

<?php
//     ?>
//
<script>
    // location.replace("http://localhost/Program/Ecom/seller_pages/product_uplod_sucessfull.php?pid=<?php echo $_GET['pid']; ?>")
    // location.replace("https://www.google.com");
    // console.log(keywords);
    //     </script>
// <?php
// } else {
//     ;
//     }
// } else {
//     echo '<p>There hase any problem</p>';
// }
// ?>