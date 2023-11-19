<?php
include "./dbconnection.php";


if (isset($_POST['User_Update'])){
        $user_id = $_POST['user_id'];
        $full_name = $_POST['first-name'];
        $username = $_POST['user-name'];
        $email = $_POST['email'];
        if (isset($_POST['active'])) {
            $active = 1;  
        } else {
            $active = 0;  
        }
        $password = $_POST['password'];
        
        $sql_query="UPDATE users SET full_name ='$full_name', username ='$username', email ='$email', active ='$active',password ='$password' WHERE id= '$user_id'";

        if ($mysqli->query($sql_query) === true) {
            echo "User Data Updated Successfully.";
        } else {
             echo "Error: " . $sql_query . "<br>" . $mysqli->error;
        }
    
     
        // Close the database connection
        $mysqli->close();
    }
    


    
    ?>