<?php
include("connection/connection.php");

if(isset($_POST['add_rating'])){
    $message = $_POST['message'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $product_id = $_POST['product_id'];

    $query = "INSERT INTO post_rating (message, review_name, email, product_id) VALUES ('".$message."', '".$name."', '".$email."', '".$product_id."')";
    $query_connect = mysqli_query($conn, $query);
    
    if($query_connect){
        echo "Record has been inserted";
    } else {
        echo "Record has not been inserted";
    }
}
?>
