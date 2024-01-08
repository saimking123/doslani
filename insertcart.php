<?php

session_start();
if(isset($_POST["add-to-cart"]))
{
    
    $_SESSION['cart'][]=array(
        'id'=>$_POST['id'],
        'name'=>$_POST['name'],
        'price'=>$_POST['price'],
        'quan'=>$_POST['quan'],
        'img'=>$_POST['img'],
        'weigth'=>$_POST['weigth'],

    
      );
      
    // $product = array($id,$name,$price,$quan,$img,$weight);

    // print_r($product);
    // $_SESSION['cart'][] = $product;

    header('location:index.php');
 
}


if (isset($_GET['empty'])) {
    unset($_SESSION['cart']);
}

?>