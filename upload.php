<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hack";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle file uploads
$target_dir = "uploads/";
$image_paths = [];
$uploadOk = 1;

if (isset($_FILES["house-images"])) {
    $total = count($_FILES["house-images"]["name"]);
    if ($total > 3) {
        echo "You can upload up to 3 images only.";
        $uploadOk = 0;
    }

    for ($i = 0; $i < $total; $i++) {
        $target_file = $target_dir . basename($_FILES["house-images"]["name"][$i]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is an image
        $check = getimagesize($_FILES["house-images"]["tmp_name"][$i]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["house-images"]["size"][$i] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["house-images"]["tmp_name"][$i], $target_file)) {
                $image_paths[] = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    if ($uploadOk == 1) {
        // Insert into database
        $category = $_POST['category'];
        $city = $_POST['city'];
        $images_json = json_encode($image_paths);

        $sql = "INSERT INTO houses (category, city, images) VALUES ('$category', '$city', '$images_json')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
