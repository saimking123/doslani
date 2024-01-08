<?php 
include("connection/connection.php");

if(isset($_POST['contactusbtn'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = "INSERT INTO contactus (first_name,last_name,number, email, message) VALUES ('".$fname."','".$lname."','".$number."','".$email."','".$message."')";
    $query_connect = mysqli_query($conn, $query);
 
    var_dump($_POST['contactusbtn']);
    if($query_connect){
        echo "Contact inserted";
        header("location:contact.php");
    } else {
        echo "Try again";
    }
}
?>