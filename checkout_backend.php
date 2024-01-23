<?php
include("connection/connection.php");
// include("header.php");
session_start();
?>

<?php

if(isset($_POST['checkout'])) {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $contactno = $_POST['contactno'];
  $address = $_POST['address'];
  $shipping_name = $_POST['shipping_name'];
  $shipping_address = $_POST['shipping_address'];
  $shipping_city = $_POST['shipping_city'];
  $shipping_country = $_POST['shipping_country'];
  $shipping_Postal_code = $_POST['shipping_postal_code'];
  $shipping_email = $_POST['shipping_email'];
  $shipping_contact = $_POST['shipping_contact'];
  $country = $_POST['country'];
  $city = $_POST['city'];
  $postal_code = $_POST['shipping_postal_code'];
  $order_notes = $_POST['order_notes'];
  $order_status = 'inprocess';
  $payment = 'cashOnDelivery';
  $createdAt = date('Y-m-d H:i:s');
  $updatedAt = date('Y-m-d H:i:s');
  
  // Initialize total price
  $totalPrice = 0;
  $cartItems = array();

  if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $item) {
          if (isset($item['price'], $item['quan'])) {
              $productPrice = $item['price'];
              $qty = $item['quan'];
              $itemPrice = $productPrice * $qty;
              $totalPrice += $itemPrice;
          }
      }
  }else{
    $totalprice = $_POST['price'];
  }

  // Create a database connection (assuming $conn is a valid database connection)
  $query = "INSERT INTO customer_orders (full_name, email,contactno, address,shipping_name,shipping_city,shipping_country,shipping_Postal_code,
  shipping_address,shipping_email,shipping_contact, country, city, postal_code,Order_Notes, order_status, payment, total_price, created_at, updated_at)
 VALUES ('$fullname', '$email', '$contactno', '$address', '$shipping_name','$shipping_address','$shipping_city', 
 '$shipping_country', '$shipping_Postal_code', '$shipping_email', '$shipping_contact', '$country','$city','$postal_code',
 '$order_notes','$order_status','$payment', '$totalPrice', '$createdAt', '$updatedAt')";

  $queryconnect = mysqli_query($conn, $query);

  if ($queryconnect) {
      echo 'Record has been inserted';
  } else {
      echo 'Query error: ' . mysqli_error($conn);
  }
 var_dump($query);
 
?>

<?php
if (isset($_POST['checkout'])) {
   
  
  $order_id = mysqli_insert_id($conn);

    // Insert each item in the cart into the 'order_details' table
    foreach ($cartItems as $item) {
        $productId = $item['id'];
        $itemName = $item['name'];
        $productPrice = $item['price'];
        $quantity = $item['quan'];
        $itemTotalPrice = $productPrice * $quantity;

        $insertOrderDetailsQuery = "INSERT INTO order_details (order_id, product_id, name, product_price, qty, total_price, created_at) VALUES ('$order_id', '$productId', '$itemName', '$productPrice', '$quantity', '$itemTotalPrice', '$createdAt')";
        
        $insertResult = mysqli_query($conn, $insertOrderDetailsQuery);
       

        if (!$insertResult) {
            echo 'Error inserting order details: ' . mysqli_error($conn);
        }
    }

    // Unset the 'cart' session variable
    unset($_SESSION['cart']);
}
if ($queryconnect) {
  //sweet alerrt
  echo '
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
      Swal.fire({
          title: "Success!",
          text: "Your order will be delivered in one to two weeks. We hope you enjoy your purchase and your order ID is ' . $order_id . '!",
          icon: "success",
      }).then(function() {
          window.location.href = "index.php";
      });
  </script>';
  unset($_SESSION['cart']);
    }
}