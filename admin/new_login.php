
<?php
 include "./dbconnection.php";  
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    if (isValidLogin($username, $password)) {
        if (isUserActive($username)) {
             
            header("Location:./meetings.php");
        } else {
 
            header("Location: /index.php");
        }
 
            session_start();
            //$_SESSION["user_id"] = $user_id;
            $_SESSION["user_name"] = $username;
    } else {
         echo "Invalid username or password. Please try again.";
    }
}
function isValidLogin($userName, $passWord) {
    include "./dbconnection.php";
     $query = "SELECT * FROM users WHERE username = '$userName' AND password = '$passWord'";
    $result = mysqli_query($mysqli, $query);
    if ($result === false) {
        die("Query failed: " . mysqli_error($mysqli));
    }
    if (mysqli_num_rows($result) > 0) {
         return true;
    } else {
         echo "Invalid username or password. Query: $query";
        return false;
    }
}
function isUserActive($userName) {
    include "./dbconnection.php";
    $query = "SELECT * FROM users WHERE username = '$userName' AND active = 1";

    $result = mysqli_query($mysqli, $query);
    if ($result === false) {
         die("Query failed: " . mysqli_error($mysqli));
    }

    if (mysqli_num_rows($result) > 0) {
         return true;
    } else {
         return false;
    }
}

?>

