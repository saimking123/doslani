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
        'weigth'=>$_POST['size'],
        'color'=>$_POST['color'],


      );
      var_dump($_SESSION['cart']);
      
    // header('location:index.php');
 
}


if(isset($_POST["add-to-wishlist"]))
{
    $_SESSION['wishlist'][]=array(
        'id'=>$_POST['wishlist_id'],
        'name'=>$_POST['wishlist_name'],
        'price'=>$_POST['wishlist_price'],
        'img'=>$_POST['wishlist_img'], 
        'weigth'=>$_POST['weigth'],
        'color'=>$_POST['color'], 

      );
      header('location:index.php');
    }
    

if (isset($_GET['empty'])) {
    unset($_SESSION['cart']);
}

?>