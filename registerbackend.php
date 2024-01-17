<?php 
include("connection/connection.php");
session_start();

if(isset($_POST['register'])){
    $name = $_POST["username"];
    $email = $_POST["useremail"];
    $password = md5($_POST["password"]);
    $cpassword = md5($_POST["cpassword"]);

    
    // Check if user already exists in the database
    $query = "SELECT * FROM user WHERE email='$email' && password= '$password'  " ;
    $results = mysqli_query($conn, $query) or die(mysqli_error());
        if (mysqli_num_rows($results) > 0){
            echo "<script>alert('User Already Exists!')</script>";
            // header("location:login.php");
            } else {
                if($password !=$cpassword){
                    echo "<script>alert('password not matched!')</script>";  
                }else{
                // Insert new user into the 'users' table
                $sql="INSERT INTO user(name,email,password) VALUES('$name','$email','$password')";
                $res=mysqli_query($conn,$sql);
                if($res){
                    echo "<script>alert('welcome to our website!')</script>";  
                    header("location:index.php");

                }
                // Get the last inserted user id and update the password field with a unique hash for
            }
    }
}

?>