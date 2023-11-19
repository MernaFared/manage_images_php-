<?php

include "./dbconnection.php";

if (isset($_GET['id'])){
$id = $_GET['id'];
$sql = "DELETE FROM categories where  id = $id";
$result =mysqli_query($mysqli,$sql);
if ($result) {
    // Data deleted successfully
    echo "success";
} else {
    // Failed to delete data
    echo "error";
}
} else {
echo 'Invalid request';
}