<?php 
include "./dbconnection.php";

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $registerationDate = $_POST['registeration_date'];
    $full_name = $_POST['first-name'];
    $username = $_POST['user-name'];
    $email = $_POST['email'];
    if (isset($_POST['active'])) {
        $active = 1;  
    } else {
        $active = 0;  
    }
     $password = $_POST['password'];

     $sql = "INSERT INTO users ( registeration_date,full_name, username, email, active, password)
            VALUES ('$registerationDate','$full_name', '$username', '$email', $active, '$password')";


if ($mysqli->query($sql) === true) {
    $response['status'] = 'success';
    $response['message'] = 'User added successfully';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Error: ' . $mysqli->error;
}

 $mysqli->close();
}

 echo json_encode($response);

 
?>
