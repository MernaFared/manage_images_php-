<?php
include "./dbconnection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $categoryName = $_POST['category'];

    // Insert data into the 'categories' table
    $sql = "INSERT INTO categories (category_name)
            VALUES ('$categoryName')";

    if ($mysqli->query($sql) === true) {
        echo "success";
    } else {
        echo "Error" . $sql . "<br>" . $mysqli->error;;
    }

    // Close the database connection
    $mysqli->close();
}
?>