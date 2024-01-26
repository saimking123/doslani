<?php
include("connection/connection.php");
// include("header.php");
session_start();
?>

<?php
if (isset($_POST['placeholderbtn'])) {
    if (isset($_GET['pro_id'])) {
        $pro_id = $_GET['pro_id'];  // get product id from url
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

        $totalprice = $_POST['price'];

        $query = "INSERT INTO customer_orders (full_name, email, contactno, address, shipping_name, shipping_city, shipping_country, shipping_Postal_code,
        shipping_address, shipping_email, shipping_contact, country, city, postal_code, Order_Notes, order_status, payment, total_price, created_at, updated_at)
        VALUES ('$fullname', '$email', '$contactno', '$address', '$shipping_name', '$shipping_city', '$shipping_country', '$shipping_Postal_code',
        '$shipping_address', '$shipping_email', '$shipping_contact', '$country', '$city', '$postal_code', '$order_notes', '$order_status', '$payment',
        '$totalprice', '$createdAt', '$updatedAt')";

        $queryconnect = mysqli_query($conn, $query);

        if ($queryconnect) {
            $order_id = mysqli_insert_id($conn);

            $pro_id = $_GET["pro_id"];
            $query = "SELECT * FROM product where id = $pro_id";
            $result = mysqli_query($conn, $query);

            foreach ($result as $row) {
                $productId = $row['id'];  // Assuming the product ID is in the 'id' column
                $itemName = $row['name'];
                $productPrice = $row['price'];
                $quantity = $row['quan'];
                $itemTotalPrice = $productPrice * $quantity;

                $insertOrderDetailsQuery = "INSERT INTO order_details (order_id, product_id, Pname, product_price, qty, total_price)
                VALUES ('$order_id', '$productId', '$itemName', '$productPrice', '$quantity', '$itemTotalPrice')";

                $insertResult = mysqli_query($conn, $insertOrderDetailsQuery);

                if (!$insertResult) {
                    echo 'Error inserting order details: ' . mysqli_error($conn);
                }
            }

            // Check if the order details insertion was successful
            if ($insertResult) {
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
            } else {
                echo 'Error inserting order: ' . mysqli_error($conn);
            }
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    }


elseif  (isset($_POST['placeholderbtn'])){
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
    //var_dump($query);
  $queryconnect = mysqli_query($conn, $query);

  if ($queryconnect) {
      echo 'Record has been inserted';
  } else {
      echo 'Query error: ' . mysqli_error($conn);
  }
 //var_dump($query);
 
// orderid hmari customerid hai
  $order_id = mysqli_insert_id($conn);

  var_dump($order_id);
  $cartItems = array();
                        
  if (isset($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $k => $item) {
          $itemPrice = $item['price'] * $item['quan'];
          $totalPrice += $itemPrice;

          // Check if this item is already in cartItems
          if (isset($cartItems[$item['id']])) {
              // If it is, update the quantity
              $cartItems[$item['id']]['quan'] += $item['quan'];
          } else {
              // If not, add it to cartItems
              $cartItems[$item['id']] = $item;
          }
          }
      }
    // Insert each item in the cart into the 'order_details' table
    foreach ($cartItems as $item) {
        $productId = $item['id'];
        $itemName = $item['name'];
        $productPrice = $item['price'];
        $quantity = $item['quan'];
        $itemTotalPrice = $productPrice * $quantity;

        $insertOrderDetailsQuery = "INSERT INTO order_details (order_id, product_id, Pname, product_price, qty, total_price) VALUES ('$order_id', '$productId', '$itemName', '$productPrice', '$quantity', '$itemTotalPrice')";
       // var_dump($insertOrderDetailsQuery);
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

