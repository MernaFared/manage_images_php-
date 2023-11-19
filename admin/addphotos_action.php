<?php
 include "./dbconnection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $photoDate = $_POST['photo_date'];
    $title = $_POST['title'];
    $license = $_POST['license'];
    $dimension = $_POST['dimension'];
    $format = $_POST['format'];
    $is_active = isset($_POST['active']) ? 1 : 0;
    $category = $_POST['category'];

    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $imagePath = $uploadDir . $_FILES['image']['name'];

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath) && $category) {
             $sql = "INSERT INTO photos (photo_date, title, license, dimension, format, is_active, image_path, category_id)
                    VALUES ('$photoDate', '$title', '$license', '$dimension', '$format', '$is_active', '$imagePath', '$category')";
     
                if ($mysqli->query($sql) === true) {
                    echo "Photo Added Successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
            }
        } else {
            echo "File upload failed.";
        }
    }
    $mysqli->close();
}

?>