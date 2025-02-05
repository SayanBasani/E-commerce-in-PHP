<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <title>Image Upload with Preview</title>
</head>
<body>
  <div class="2nd_side grid gap-3 p-4">
    <!-- image upload -->
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
    <!-- Upload Button -->
    <button id="uploadButton" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300">
      Upload Images
    </button>
    <!-- Upload Status -->
    <div id="uploadStatus" class="mt-4 text-center"></div>

    <script>
      const uploadInput = document.getElementById("uploadFile1");
      const previewContainer = document.getElementById("imagePreviewContainer");
      const uploadButton = document.getElementById("uploadButton");
      const uploadStatus = document.getElementById("uploadStatus");
      let selectedFiles = [];

      uploadInput.addEventListener("change", (event) => {
        const files = event.target.files;
        
        for (const file of files) {
          const reader = new FileReader();

          reader.onload = function (e) {
            const imageWrapper = document.createElement("div");
            imageWrapper.classList.add("relative", "inline-block");

            const img = document.createElement("img");
            img.src = e.target.result;
            img.alt = file.name;
            img.classList.add("min-w-24", "max-w-24", "h-24", "object-cover", "rounded", "border");

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
              selectedFiles = selectedFiles.filter(f => f !== file);
            };

            imageWrapper.appendChild(img);
            imageWrapper.appendChild(deleteButton);
            previewContainer.appendChild(imageWrapper);
          };

          reader.readAsDataURL(file);
          selectedFiles.push(file);
        }
      });

      uploadButton.addEventListener("click", () => {
        console.log(uploadButton);
        
        if (selectedFiles.length === 0) {
          uploadStatus.textContent = "Please select images to upload.";
          return;
        }

        const formData = new FormData();
        selectedFiles.forEach((file, index) => {
          formData.append(`file${index}`, file);
        });

        uploadStatus.textContent = "Uploading...";

        fetch("upload.php", {
          method: "POST",
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            uploadStatus.textContent = "Upload successful!";
            // Clear previews and selected files
            previewContainer.innerHTML = "";
            selectedFiles = [];
          } else {
            uploadStatus.textContent = "Upload failed: " + data.message;
          }
        })
        .catch(error => {
          uploadStatus.textContent = "An error occurred during upload.";
          console.error("Error:", error);
        });
      });
    </script>

    <style>
      #imagePreviewContainer {
        width: auto;
        display: flex;
        gap: 1rem;
        overflow-x: auto;
        padding: 0.5rem;
        border: 1px solid #e5e7eb;
        border-radius: 0.5rem;
        background-color: #f9fafb;
      }

      #imagePreviewContainer img {
        flex-shrink: 0;
        margin-right: 0.5rem;
      }
    </style>
  </div>
</body>
</html>

<?php
// Database connection
include '../connection.php';
// Prepare the response array
$response = ['success' => true, 'message' => ''];

// Check if files were uploaded
if (empty($_FILES)) {
    $response['success'] = false;
    $response['message'] = 'No files were uploaded.';
    echo json_encode($response);
    exit;
}

// Specify the upload directory
$uploadDir = 'uploads/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Process each uploaded file
foreach ($_FILES as $file) {
    $fileName = basename($file['name']);
    $targetFilePath = $uploadDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'svg', 'webp');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to the server
        echo "---".$fileName ."----";
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            // Insert image file name into database
            $stmt = $conn->prepare("INSERT INTO images (file_name, upload_date) VALUES (?, NOW())");
            $stmt->bind_param("s", $fileName);
            if ($stmt->execute()) {
                $response['message'] .= $fileName . ' was uploaded successfully. ';
            } else {
                $response['success'] = false;
                $response['message'] .= 'Error: Unable to insert ' . $fileName . ' into the database. ';
            }
            $stmt->close();
        } else {
            $response['success'] = false;
            $response['message'] .= 'Error: There was an error uploading ' . $fileName . '. ';
        }
    } else {
        $response['success'] = false;
        $response['message'] .= 'Error: Only JPG, JPEG, PNG, GIF, SVG & WEBP files are allowed. ';
    }
}

$conn->close();

echo json_encode($response);
?>

