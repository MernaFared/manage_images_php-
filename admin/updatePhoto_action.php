<?php
include "./dbconnection.php";
if (isset($_POST['photo_Update'])) {
    $photo_id = $_POST['photo_id'];
    $photoDate = $_POST['photo-date'];
    $title = $_POST['title'];
    $license = $_POST['license'];
    $dimension = $_POST['dimension'];
    $format = $_POST['format'];
    $is_active = isset($_POST['is_active']) ? 1 : 0;
    $category = $_POST['category'];

     if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        
        $uploadDir = 'uploads/';
        $imagePath = $uploadDir . $_FILES['image']['name'];

         if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath) && $category) {
            $sql = "UPDATE photos SET photo_date ='$photoDate', title ='$title', license ='$license', dimension ='$dimension', format ='$format', is_active ='$is_active', image_path ='$imagePath', category_id='$category' WHERE id ='$photo_id'";

            if ($mysqli->query($sql) === true) {
                echo "Photo updated successfully.";
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