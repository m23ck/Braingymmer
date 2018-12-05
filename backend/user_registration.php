<?php 
     session_start();
    //import the file that makes a connection to the db
    require "db_connect.php";
    
    //take all input values
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $retype_password = mysqli_real_escape_string($connection, $_POST['retype_password']);


    //Register User
    if (isset($_POST['btn_register'])){
        //check if the fields are not empty
        if ( ( !empty($username) || !empty($email) || !empty($password) || !empty($retype_password))  ){
            
            //check if credentials are already in use
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
            $result = mysqli_query($connection, $user_check_query);
            $check_result = mysqli_fetch_assoc($result);
        
            if ( ($check_result['username'] == $username) || ($check_result['email'] == $email) ) {
                
                echo "<script>alert('These credentials have already been used!');</script>";
                exit();
                
            }
            elseif($password != $retype_password){
                echo "<script>alert('Passwords do not match!');</script>"; 
                exit(); 
            }
            else{

            //hash password
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);//encrypt the password before saving in the database

            $query_reg = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password_hashed')";
            mysqli_query($connection, $query_reg);
        
            //$_SESSION['username'] = $username;
            //$_SESSION['success'] = "You are now registered";
            header('location: ../src/index.php?login');

            }
        }
        elseif ( ( empty($username) || empty($email) || empty($password) || empty($retype_password))  ){
            echo "<script>alert('Fill in all the fields!');</script>";
            header('location: ../src/index.php');
            exit();
        }
    }
?>

//check why the database stores shit even when the form isnt completely filled