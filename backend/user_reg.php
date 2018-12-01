<?php 

    include "../backend/db_connect.php";
   
    $username = mysqli_real_escape_string($connection ,$_POST['username']);
    $email = mysqli_real_escape_string($connection ,$_POST['email']);
    $password = mysqli_real_escape_string($connection ,$_POST['password']);
    $retypePassword = mysqli_real_escape_string($connection ,$_POST['retypePassword']);
    $user_reg_query = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";

        if(!empty($username) || !empty($email) || !empty($password) || !empty($retypePassword) )
        {

            if (isset($_POST['btnRegister'])){
                session_start();
                           
                //check if password was typed correctly
                if ($password == $retypePassword){
                //create a user
                    //hash the password before storing it in the database
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    //insert the credentials into the database
                    $query = mysqli_query($connection , $user_reg_query);
                

                }else{
                    $_SESSION['message'] = "Passwords do not match";
                    
                }
            
            }
    }
        else{
            if (isset($_POST['btnRegister'])){
                $error = "Vul alle velden in! ";
                echo "<script type='text/javascript'>alert('$error');</script>";
            
            }

        }
?>