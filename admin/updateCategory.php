<?php
include "./dbconnection.php";


if (isset($_POST['Category_Update'])){
        $category_id = $_POST['id'];
        $category_name= $_POST['category_name'];
        
        $sql_query="UPDATE categories SET category_name ='$category_name' WHERE id= '$category_id'";
        //$query_run = mysqli_query($mysqli,$sql_query);

        if ($mysqli->query($sql_query) === true) {
            echo "category updated successfully.";
        } else {
             echo "Error: " . $sql_query . "<br>" . $mysqli->error;
        }
    

    }
    ?>