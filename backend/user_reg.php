<?php 

    include "../backend/db_connect.php";

if(1+1 == 2){
    if (isset($_POST['btnRegister'])){
        session_start();
        $username = mysqli_real_escape_string($connection ,$_POST['username']);
        $email = mysqli_real_escape_string($connection ,$_POST['email']);
        $password = mysqli_real_escape_string($connection ,$_POST['password']);
        $retypePassword = mysqli_real_escape_string($connection ,$_POST['retypePassword']);
    
        //check if password was typed incorrectly
        if ($password == $retypePassword){
        //create a user
            //hash the password before storing it in the database
            $password = password_hash($password, PASSWORD_DEFAULT);
            //insert the credentials into the database
            $user_reg_query = "INSERT INTO Users(username, email, password) VALUES('$username', '$email', '$password')";
            $query = mysqli_query($connection , $user_reg_query);
          

        }else{
            $_SESSION['message'] = "Passwords do not match";
            
        }
    
    }
}
else{

    echo ("damn");
    exit;
    
}
?>