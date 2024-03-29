<?php
include("connection/connection.php");
include("header.php");


?>
    
    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span>Checkout</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start checkout page area -->
        <div class="checkout__page--area section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="main checkout__mian">
                            <form action="checkout_backend.php" method="post">
                                <div class="checkout__content--step section__contact--information">
                                    <div class="section__header checkout__section--header d-flex align-items-center justify-content-between mb-25">
                                        <!-- <h2 class="section__header--title h3">Contact information</h2> -->
                                        <p class="layout__flex--item">
                                            Already have an account?
                                            <a class="layout__flex--item__link" href="login.html">Log in</a>  
                                        </p>
                                    </div>

                                </div>
                                <div class="checkout__content--step section__shipping--address">
                                    <div class="section__header mb-25">
                                        <h2 class="section__header--title h3">Billing Details</h2>
                                    </div>
                                    <div class="section__shipping--address__content">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list ">
                                                    <label class="checkout__input--label mb-5" for="input1">Full Name<span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Full Name" name="fullname" id="input1"  type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input2">Email <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Email" name="email" id="input2"  type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input3">Contact No<span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Contact no" id="input3" type="number" name="contactno">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input4">Address <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Address1" name="address" id="input4" type="text">
                                                </div>
                                            </div>
                                            <!-- <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <input class="checkout__input--field border-radius-5" placeholder="Apartment, suite, etc. (optional)" name="address2" type="text">
                                                </div>
                                            </div> -->
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input5">Town/City <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="City" name="city" id="input5" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                            <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input11">Country/region <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Country/region" name="country" id="input11" type="text">
                                                    </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input6">Postal Code <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Postal code" name="postal_address" id="input6" type="number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <details>
                                        <summary class="checkout__checkbox mb-20">
                                            <input class="checkout__checkbox--input" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <span class="checkout__checkbox--label">Ship to a different address?</span>
                                        </summary>
                                        <div class="section__shipping--address__content">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                    <div class="checkout__input--list ">
                                                        <label class="checkout__input--label mb-5" for="input7">Fist Name <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="First name " name="shipping_name" id="input7"  type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input8">Email <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Email" name="shipping_email" name="shipping_email" id="input8"  type="text">
                                                    </div>
                                                </div>
                                                <!-- <input type="hidden" name="id" value=> -->
                                                <input type="hidden" name="id" value="$pro_id"/>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input9">Contact No<span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="contact no" name="shipping_contact" id="input9" type="number">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input10">Address <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Address" name="shipping_address" id="input10" type="text">
                                                    </div>
                                                </div>
                
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input11">Town/City <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="City" name="shipping_city" id="input11" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input11">Country/region <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Country/region" name="shipping_country" id="input11" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input12">Postal Code <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Postal code" name="shipping_postal_code" id="input12" type="text">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-20">
                                                    <div class="checkout__input--list">
                                                    <?php
                                                    if (isset($_GET["pro_id"])) {
                                                    $pro_id = $_GET["pro_id"];
                                                   
                                                        // <!-- <label class="checkout__input--label mb-5" for="input12">Postal Code <span class="checkout__input--label__star">*</span></label> -->
                                                        echo '<input type="hidden" name="pro_id" value="' . $pro_id . '">';
                                                    }
                                                    ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </details>
                                </div>
                                <div class="order-notes mb-20">
                                    <label class="checkout__input--label mb-5" for="order">Order Notes <span class="checkout__input--label__star">*</span></label>
                                   <textarea class="checkout__notes--textarea__field border-radius-5" id="order" name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery." spellcheck="false"></textarea>
                                </div>
                                <input type="hidden" value="<?php echo $pro_id ?>" name="product_id"> 
                                <div class="checkout__content--step__footer d-flex align-items-center">
                                    <button class="continue__shipping--btn primary__btn border-radius-5" type="submit" name="placeholderbtn">Checkout Now</button>
                                    <a class="previous__link--content" href="cart.php">Return to cart</a>
                                </div>
             
                            
                        </div>
                    </div>
                    
                    <div class="col-lg-5 col-md-6">
                        <aside class="checkout__sidebar sidebar border-radius-10">
                            <h2 class="checkout__order--summary__title text-center mb-15">Your Order Summary</h2>
                            <div class="cart__table checkout__product--table">
                                <table class="cart__table--inner">
                                    <tbody class="cart__table--body">
                                    <?php
                                   if (isset($_GET['pro_id'])) {
                                    // If pro_id is set in the URL, perform this block of code
                                    $pro_id = $_GET["pro_id"];
                                    $query = "SELECT * FROM product where id = $pro_id";
                                    $result = mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_array($result)){
                                
                                    echo '<tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="product__image two d-flex align-items-center">
                                                    <div class="product__thumbnail border-radius-5">
                                                        <a class="display-block" href="product-details.html"><img class="display-block border-radius-5" src="' . str_replace("../", "", $row['image']) . '" alt="cart-product"></a>
                                                        <span class="product__thumbnail--quantity" name="quantity">' . $row['quantity'] . '</span>
                                                    </div>
                                                    <div class="product__description">
                                                        <h4 class="product__description--name"><a href="product-details.php?id=<?php echo $pro_id;?>">' . $row['name'] . '</a></h4>
                                                        <span class="product__description--variant">COLOR: '. $row['color'].' </span>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price" name="">PKR:' . $row['price'] . '</span>
                                            </td>
                                        </tr>';
                                    }
                                    } else {

                                        
                                        $totalPrice = 0;
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
                                            foreach ($cartItems as $item) {
                                                $itemPrice = $item['price'] * $item['quan'];
                                        echo '<tr class="cart__table--body__items">
                                        <td class="cart__table--body__list">
                                            <div class="product__image two d-flex align-items-center">
                                                <div class="product__thumbnail border-radius-5">
                                                    <a class="display-block" href="product-details.html"><img class="display-block border-radius-5" src="' . str_replace("../", "", $item['img']) . '" alt="cart-product"></a>
                                                    <span class="product__thumbnail--quantity">' . $item['quan'] . '</span>
                                                </div>
                                                <div class="product__description">
                                                    <h4 class="product__description--name"><a href="product-details.html">' . $item['name'] . '</a></h4>
                                                    <span class="product__description--variant">COLOR: '. $item['color'].' </span><br>
                                                    <span class="product__description--variant">weigth: '. $item['size'].' </span>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <span class="cart__price" >PKR:' . $item['price'] . '</span>
                                        </td>
                                    </tr>';
                            }
                        }
                            ?>
                            </tbody>
                            </table> 
                            </div>               
                                <!-- discount work start -->
                                    <?php
                                   if (isset($_GET['pro_id'])) {
                                    // If pro_id is set in the URL, perform this block of code
                                    $pro_id = $_GET["pro_id"];
                                    $query = "SELECT * FROM product where id = $pro_id";
                                    $result = mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_array($result)){ 
                                        // $price = ''; // Define $price before assigning it to $row['price']
                                      $price = $row['price'] ;                                  
                                        // Assume $coupon_code is the variable holding the coupon code
                                        $coupon_code = isset($_POST['coupon']) ? $_POST['coupon'] : "";
                                        
                                        // Your existing HTML and form code
                                        echo '<div class="checkout__discount--code">
                                        <form class="d-flex" id="couponForm" action="" method="post">
                                            <input class="checkout__discount--code__input--field border-radius-5" id="coupon" name="coupon" placeholder="Gift card or discount code" type="text">
                                            <input type="hidden" value="' . $price . '" name="price" id="price">
                                            <br><br>
                                            <button class="checkout__discount--code__btn primary__btn border-radius-5" id="activate" type="button">Apply</button>
                                        </form>
                                        
                                      </div>';
                                        
                                        // Check if a coupon code is provided
                                        if (!empty($coupon_code)) {
                                            // Discount logic
                                            $query = mysqli_query($conn, "SELECT * FROM `coupon` WHERE `coupon_code` = '$coupon_code' && `status` = 'Valid'") or die(mysqli_error());
                                            $count = mysqli_num_rows($query);
                                            $fetch = mysqli_fetch_array($query);
                                            $array = array();
                                        
                                            if ($count > 0) {
                                                $discount = $fetch['discount'] / 100;
                                                $totalDiscount = $discount * $price;
                                                $discountedPrice = $price - $totalDiscount;
                                        
                                                // Display discounted subtotal
                                             echo '<div class="checkout__total">
                                            <table class="checkout__total--table">
                                                <tbody class="checkout__total--body">
                                                    <tr class="checkout__total--items">
                                                        <td class="checkout__total--title text-left">Subtotal</td>
                                                        <div id="result">
                                                        
                                                        <td class="checkout__total--amount text-right" id="total" name="price">' . $discountedPrice . '</td>
                                                        </div>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>';
                                            } else {
                                                echo "Invalid Coupon Code!";
                                            }
                                        } else {
                                            // Display original subtotal
                                            echo '<div class="checkout__total">
                                                    <table class="checkout__total--table">
                                                        <tbody class="checkout__total--body">
                                                            <tr class="checkout__total--items">
                                                                <td class="checkout__total--title text-left">Subtotal </td>
                                                                <div id="result">
                                                                <td class="checkout__total--amount text-right" id="total" name="price">Pkr: ' . $price . '</td>
                                                                </div>
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                </div>';
                                        }
                                        
                                    if (!empty($coupon_code)) {
                                    // Discount logic
                                    $query = mysqli_query($conn, "SELECT * FROM `coupon` WHERE `coupon_code` = '$coupon_code' && `status` = 'Valid'") or die(mysqli_error());
                                    $count = mysqli_num_rows($query);
                                    $fetch = mysqli_fetch_array($query);
                                    if ($count > 0) {
                                        // $price = $row['price'] ; 
                                        $discount = $fetch['discount'] / 100;
                                        $totalDiscount = $discount * $price;
                                        $discountedPrice = $price - $totalDiscount;

                                        // Display discounted shipping cost
                                        echo '<tr class="checkout__total--items">
                                                <h3><td class="checkout__total--title text-left" >Shipping</td></h5>  
                                                <td class="checkout__total--calculated__text text-right">Shipping payment for just rupees 100</td>
                                            </tr>';

                                        // Display discounted subtotal
                                        echo '<tfoot class="checkout__total--footer">
                                                <tr class="checkout__total--footer__items">
                                                    <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                                    <td class="checkout__total--footer__amount checkout__total--footer__list text-right" name="price">Pkr: ' . ($discountedPrice + 100) . '</td>
                                                </tr>
                                            </tfoot>';
                                    } else {
                                        // Display original shipping cost
                                        echo '<tr class="checkout__total--items">
                                                <h3><td class="checkout__total--title text-left">Shipping</td></h5>  
                                                <td class="checkout__total--calculated__text text-right">Shipping payment for just rupees 100</td>
                                            </tr>';

                                        // Display original total
                                        echo '<tfoot class="checkout__total--footer">
                                                <tr class="checkout__total--footer__items">
                                                    <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                                    <br><br>
                                                    <td class="checkout__total--footer__amount checkout__total--footer__list text-right" name="price">Pkr: ' . ($price + 100) . '</td>
                                                </tr>
                                            </tfoot>';
                                    }
                                } else {
                                    // Display original shipping cost
                                    '<br><br>';
                                    echo '<tr class="checkout__total--items">
                                            <h3><td class="checkout__total--title text-left">Shipping</td></h5>  
                                            <td class="checkout__total--calculated__text text-right">Shipping payment for just rupees 100</td>
                                        </tr>';

                                    // Display original total
                                    '<br><br>';
                                    echo '<tfoot class="checkout__total--footer">
                                            <tr class="checkout__total--footer__items">
                                                <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                                <td class="checkout__total--footer__amount checkout__total--footer__list text-right" name="price">Pkr: ' . ($price + 100) . '</td>
                                            </tr>
                                        </tfoot>';
                                }
                            }
                                    }else{
                                    $totalPrice = 0;
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
                                        // Assume $coupon_code is the variable holding the coupon code
                                        $coupon_code = isset($_POST['coupon']) ? $_POST['coupon'] : "";
                                        
                                        // Your existing HTML and form code
                                        echo '<div class="checkout__discount--code">
                                        <form class="d-flex" id="couponForm" action="" method="post">
                                            <input class="checkout__discount--code__input--field border-radius-5" id="coupon" name="coupon" placeholder="Gift card or discount code" type="text">
                                            <div id="result">
                                            <input type="hidden" value="' . $totalPrice . '" name="price" id="price">
                                            </div>
                                            <button class="checkout__discount--code__btn primary__btn border-radius-5" id="activate" type="button">Apply</button>
                                        </form>
                                      </div>';
                                        
                                        // Check if a coupon code is provided
                                        if (!empty($coupon_code)) {
                                            // Discount logic
                                            $query = mysqli_query($conn, "SELECT * FROM `coupon` WHERE `coupon_code` = '$coupon_code' && `status` = 'Valid'") or die(mysqli_error());
                                            $count = mysqli_num_rows($query);
                                            $fetch = mysqli_fetch_array($query);
                                            $array = array();
                                        
                                            if ($count > 0) {
                                                $discount = $fetch['discount'] / 100;
                                                $totalDiscount = $discount * $totalPrice;
                                                $discountedPrice = $totalPrice - $totalDiscount;
                                        
                                                // Display discounted subtotal
                                                echo '<div class="checkout__total">
                                                        <table class="checkout__total--table">
                                                            <tbody class="checkout__total--body">
                                                                <tr class="checkout__total--items">
                                                                    <td class="checkout__total--title text-left">Subtotal </td>   
                                                                    <td class="checkout__total--amount text-right" id="total" name="price">Pkr: ' . $discountedPrice . '</td>
                                                                
                                                                    </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>';
                                            } else {
                                                echo "Invalid Coupon Code!";
                                            }
                                        } else {
                                            // Display original subtotal
                                            echo '<div class="checkout__total">
                                                    <table class="checkout__total--table">
                                                        <tbody class="checkout__total--body">
                                                            <tr class="checkout__total--items">
                                                                <td class="checkout__total--title text-left">Subtotal </td>
                                                                <br>
                                                                <div id="result">
                                                                <td class="checkout__total--amount text-right" id="total" name="price">Pkr: ' . $totalPrice . '</td>
                                                            </div>
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                </div>';
                                        }
                                        ?>





                                    <?php
                                    if (!empty($coupon_code)) {
                                    // Discount logic
                                    $query = mysqli_query($conn, "SELECT * FROM `coupon` WHERE `coupon_code` = '$coupon_code' && `status` = 'Valid'") or die(mysqli_error());
                                    $count = mysqli_num_rows($query);
                                    $fetch = mysqli_fetch_array($query);

                                    if ($count > 0) {
                                        $discount = $fetch['discount'] / 100;
                                        $totalDiscount = $discount * $totalPrice;
                                        $discountedPrice = $totalPrice - $totalDiscount;

                                        // Display discounted shipping cost
                                        echo '<tr class="checkout__total--items">
                                                <h3><td class="checkout__total--title text-left">Shipping</td></h5>  
                                                <td class="checkout__total--calculated__text text-right">Shipping payment for just rupees 100</td>
                                            </tr>';

                                        // Display discounted subtotal
                                        echo '<tfoot class="checkout__total--footer">
                                                <tr class="checkout__total--footer__items">
                                                    <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                                    <td class="checkout__total--footer__amount checkout__total--footer__list text-right" name="price" id="total">Pkr: ' . ($discountedPrice + 100) . '</td>
                                                </tr>
                                            </tfoot>';
                                    } else {
                                        // Display original shipping cost
                                        echo '<tr class="checkout__total--items">
                                                <h3><td class="checkout__total--title text-left">Shipping</td></h5>  
                                                <td class="checkout__total--calculated__text text-right">Shipping payment for just rupees 100</td>
                                            </tr>';

                                        // Display original total
                                        echo '<tfoot class="checkout__total--footer">
                                                <tr class="checkout__total--footer__items">
                                                    <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                                    
                                                    <div id="result">
                                                    <td class="checkout__total--footer__amount checkout__total--footer__list text-right" name="price" id="total " +100>Pkr: ' .  '</td>
                                                    </div>
                                                    </tr>
                                                </tfoot>';
                                    }
                                } else {
                                    // Display original shipping cost
                                    echo '<tr class="checkout__total--items">
                                            <h3><td class="checkout__total--title text-left">Shipping</td></h5>  
                                            <td class="checkout__total--calculated__text text-right">Shipping payment for just rupees 100</td>
                                        </tr>';

                                    // Display original total
                                    echo '<tfoot class="checkout__total--footer">
                                            <tr class="checkout__total--footer__items">
                                                <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                                
                                                <td class="checkout__total--footer__amount checkout__total--footer__list text-right" name="price" id="total +100">Pkr: ' . ($totalPrice + 100) . '</td>
                                            
                                                </tr>
                                        </tfoot>';
                                }
                                
                        }
                                ?>   
                                <!-- Discount Work End -->
                                </table>
                            
                            <div class="payment__history mb-30">
                                <h3 class="payment__history--title mb-20">Payment</h3>
                                <ul class="payment__history--inner d-flex">
                                    <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Credit Card</button></li>
                                    <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">BankTransfer</button></li>
                                    <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">COD</button></li>
                                    
                                </ul>
                            </div>
                        </aside>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        


        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    $("#activate").click(function() {
        var couponCode = $("#coupon").val();
        var price = $("#price").val();

        $.ajax({
            type: "POST",
            url: "get_discount.php", // Replace with the actual PHP processing file
            data: { coupon: couponCode, price: price },
            success: function(response) {
                var jsonResponse = JSON.parse(response);

                // Get the price value
                var discountedPrice = jsonResponse.price;

                // Display the price in the HTML response
                $("#total").html(discountedPrice);
               // $("#result").html(response);
            },
            error: function(error) {
                console.error("unknown copen code:", error);
            }
        });
    });
});
</script>

        <!-- End checkout page area -->

        <!-- Start shipping section -->
        <section class="shipping__section">
            <div class="container">
                <div class="shipping__inner style2 d-flex">
                    <div class="shipping__items style2 d-flex align-items-center">
                        <div class="shipping__icon">  
                            <img src="assets/img/other/shipping1.webp" alt="icon-img">
                        </div>
                        <div class="shipping__content">
                            <h2 class="shipping__content--title h3">Free Shipping</h2>
                            <p class="shipping__content--desc">Free shipping over $100</p>
                        </div>
                    </div>
                    <div class="shipping__items style2 d-flex align-items-center">
                        <div class="shipping__icon">  
                            <img src="assets/img/other/shipping2.webp" alt="icon-img">
                        </div>
                        <div class="shipping__content">
                            <h2 class="shipping__content--title h3">Support 24/7</h2>
                            <p class="shipping__content--desc">Contact us 24 hours a day</p>
                        </div>
                    </div>
                    <div class="shipping__items style2 d-flex align-items-center">
                        <div class="shipping__icon">  
                            <img src="assets/img/other/shipping3.webp" alt="icon-img">
                        </div>
                        <div class="shipping__content">
                            <h2 class="shipping__content--title h3">100% Money Back</h2>
                            <p class="shipping__content--desc">You have 30 days to Return</p>
                        </div>
                    </div>
                    <div class="shipping__items style2 d-flex align-items-center">
                        <div class="shipping__icon">  
                            <img src="assets/img/other/shipping4.webp" alt="icon-img">
                        </div>
                        <div class="shipping__content">
                            <h2 class="shipping__content--title h3">Payment Secure</h2>
                            <p class="shipping__content--desc">We ensure secure payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <!-- End shipping section -->
    </main>

    <!-- Start footer section -->
   <?php
    include("footer.php");
   ?>
    <!-- End footer section -->

    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>

<!-- All Script JS Plugins here  -->
<script src="assets/js/vendor/popper.js" defer="defer"></script>
<script src="assets/js/vendor/bootstrap.min.js" defer="defer"></script>
<script src="assets/js/plugins/swiper-bundle.min.js"></script>
<script src="assets/js/plugins/glightbox.min.js"></script>

<!-- Customscript js -->
<script src="assets/js/script.js"></script>


  
</body>

<!-- Mirrored from risingtheme.com/html/demo-partsix/partsix/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Dec 2023 15:19:09 GMT -->
</html>


<?php
if (isset($_POST['placeholderbtn'])) {
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
  
    
  if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        if (isset($item['price'], $item['quan'])) {
            $productPrice = $item['price'];
            $qty = $item['quan'];
            $itemPrice = $productPrice * $qty;
            $totalPrice += $itemPrice;
        }
    }
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
  ?>
  <?php

if (isset($_POST['placeholderbtn'])) {
   
  
  $order_id = mysqli_insert_id($conn);

  var_dump($order_id);
    // Insert each item in the cart into the 'order_details' table
    foreach ($cartItems as $item) {
        $productId = $item['id'];
        $itemName = $item['name'];
        $productPrice = $item['price'];
        $quantity = $item['quan'];
        $itemTotalPrice = $productPrice * $quantity;
    
        // Assuming you have the correct product ID for the order
        $add = "INSERT INTO order_details (customer_id, product_id,  name, product_price, qty, total_price, created_at) VALUES ('$customer_id', '$productId','$itemName', '$productPrice', '$quantity', '$itemTotalPrice', '$createdAt')";
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
          window.location.href = "home.php";
      });
  </script>';
  unset($_SESSION['cart']);
    }
}
die;
?>



