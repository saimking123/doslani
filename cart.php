<?php
include("connection/connection.php");
include("header.php");
?>

        <!-- Start offCanvas minicart -->
        <?php
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
  ?>
        <div class="offCanvas__minicart">
            <div class="minicart__header ">
                <div class="minicart__header--top d-flex justify-content-between align-items-center">
                    <h3 class="minicart__title"> Shopping Cart</h3>
                    <button class="minicart__close--btn" aria-label="minicart close btn" data-offcanvas>
                        <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
                    </button>
                </div>
                <p class="minicart__header--desc">The organic foods products are limited</p>
            </div>
            <div class="minicart__product">
                <div class="minicart__product--items d-flex">
                    <div class="minicart__thumb">
                        <a href="product-details.html"><img src="<?php echo $item['img'];?>" alt="prduct-img"></a>
                    </div>
                    <div class="minicart__text">
                        <h4 class="minicart__subtitle"><a href="product-details.html"><?php echo $item['name'];?></a></h4>
                        <span class="color__variant"><b>Color:</b>
                    <?php
                        $colors = json_decode($rows["color"]);
                        foreach ($colors as $item) {

            
              echo '<button type="button" name="color" class="color-button" style="background-color:' . $item['color'] . '" ></button>';
                
            }
                
                ?>
                        <?php echo $item['color'];?></span>
                        <div class="minicart__price">
                            <span class="minicart__current--price">Pkr<?php echo $item['price'];?></span>
                            <span class="minicart__old--price">Pkr<?php echo $item['price']; ?></span>
                        </div>
                        <div class="minicart__text--footer d-flex align-items-center">
                            <div class="quantity__box minicart__quantity">
                                <button type="button" class="quantity__value decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                <label>
                                    <input type="number" class="quantity__number" value="1" data-counter />
                                </label>
                                <button type="button" class="quantity__value increase" aria-label="quantity value" value="Increase Value">+</button>
                            </div>
                            <button class="minicart__product--remove" type="button">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="minicart__amount">
                <div class="minicart__amount_list d-flex justify-content-between">
                    <span>Sub Total:</span>
                    <span><b>$240.00</b></span>
                </div>
                <div class="minicart__amount_list d-flex justify-content-between">
                    <span>Total:</span>
                    <span><b>$240.00</b></span>
                </div>
            </div>
      
            <div class="minicart__conditions text-center">
                <input class="minicart__conditions--input" id="accept" type="checkbox">
                <label class="minicart__conditions--label" for="accept">I agree with the <a class="minicart__conditions--link" href="privacy-policy.html">Privacy Policy</a></label>
            </div>
            <div class="minicart__button d-flex justify-content-center">
                <a class="primary__btn minicart__button--link" href="cart.php">View cart</a>
                <a class="primary__btn minicart__button--link" href="checkout.php">Checkout</a>
            </div>
        </div>
        <?php
}
    ?>
        <!-- End offCanvas minicart -->

        <!-- Start serch box area -->
        <div class="predictive__search--box ">
            <div class="predictive__search--box__inner">
                <h2 class="predictive__search--title">Search Products</h2>
                <form class="predictive__search--form" action="#">
                    <label>
                        <input class="predictive__search--input" placeholder="Search Here" type="text">
                    </label>
                    <button class="predictive__search--button text-white" aria-label="search button"><svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="30.51" height="25.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>  </button>
                </form>
            </div>
            <button class="predictive__search--close__btn" aria-label="search close" data-offcanvas>
                <svg class="predictive__search--close__icon" xmlns="http://www.w3.org/2000/svg" width="40.51" height="30.443"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
            </button>
        </div>
        <!-- End serch box area -->     
    </header>

    
    <!-- End header area -->

    <main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title mb-25"> Cart</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span>Shopping Cart</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->
        <!-- cart section start -->

        <section class="cart__section section--padding">
            <div class="container-fluid">
                <div class="cart__section--inner">
                    <form action="#"> 
                        <h2 class="cart__title mb-30">Shopping Cart</h2>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="cart__table">
                                    <table class="cart__table--inner">
                                        <thead class="cart__table--header">
                                            <tr class="cart__table--header__items">
                                                <th class="cart__table--header__list">Product</th>
                                                <th class="cart__table--header__list">Price</th>
                                                <th class="cart__table--header__list">Quantity</th>
                                                                                               
                                                <th class="cart__table--header__list">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="cart__table--body">                                         
                                       
    <?php


function updateQuantity($id, $newQuantity) {
    foreach ($_SESSION['cart'] as $k => $part) {
        if ($id == $part['id']) {
            // Update the quantity
            $_SESSION['cart'][$k]['quan'] = $newQuantity;
        }
    }
}

if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    foreach ($_SESSION['cart'] as $k => $part) {
        if ($id == $part['id']) {
            unset($_SESSION['cart'][$k]);
        }
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['update'];
    $newQuantity = $_POST['new_quantity'];

    // Validate that the quantity is a positive integer
    if (is_numeric($newQuantity) && $newQuantity > 0) {
        updateQuantity($id, $newQuantity);
    }
}
  
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
  ?>
        <form action="cart.php" method="post"></form>
       
       <!-- var_dump($_SESSION['cart']); -->
       <tr class="cart__table--body__items">
        <td class="cart__table--body__list">
            <div class="cart__product d-flex align-items-center">
                <button class="cart__remove--btn" aria-label="search button">
                    <a href="cart.php?remove=<?php echo $item['id']; ?>">
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16px" height="16px">
                    <path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/>
                        </svg>
                    </a>
                </button>

                <div class="cart__thumbnail">
                <img class='border-radius-5' src='<?php echo str_replace("../", "", $item['img']); ?>' alt='cart-product'>
                </div>
                <div class="cart__content">
                    <h3 class="cart__content--title h4"><a href="product-details.php?pro_id=<?php echo $item["id"] ?>"><?php echo $item['name'];?></a></h3>
                    <style>
                          
                    .color-button {
                        width: 30px;
                        height: 30px;
                        border-radius: 30%;
                        margin-right: 10px;
                        cursor: pointer;
                        position: relative;
                    }

                    </style>
                    <?php

// function hex_to_rgb($hex) {
//     // Remove the hash if it exists
//     $hex = str_replace('#', '', $hex);

//     // Convert shorthand hex color (e.g., #123) to full hex (e.g., #112233)
//     $hex = str_pad($hex, 6, $hex[0]);

//     // Get the RGB values
//     list($r, $g, $b) = sscanf($hex, "%02x%02x%02x");

//     // Return the RGB values in the format "rgb(r, g, b)"
//     return "rgb($r, $g, $b)";
// }

// Example usage
// $item['color'] = '#1a2b3c';
?>
                    <style></style>

                    <span class="cart__content--variant">COLOR:<?php echo ($item['color']);?></span>  
                    <span class="cart__content--variant">WEIGHT:<?php echo $item['size'];?></span>
                </div>
            </div>
        </td>
        <td class="cart__table--body__list">
            <span class="cart__price"><?php echo 'PKR:'. $item ['price'];?></span>
        </td>
        <td class="cart__table--body__list">
        <div class="quantity__box">                                           
            <form method="post" action="cart.php"> 
            <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
            <label>
                    <input type="number" class="quantity__number quickview__value--number"  name="new_quantity" value="<?php echo $item['quan']; ?>" data-counter />   
                    <input type="hidden" name="update" value="<?php echo $item['id']; ?>">
            </label>  
                <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                <br>
                <input type="submit"  value="update" style="background-color:#ED1D24;">      
            </form>                                         
            </div>
        </td>
        <td class="cart__table--body__list">
            <span class="cart__price end"><?php echo $itemPrice; ?></span>
         </td>
    </tr>
    <?php
    }
    ?>
    
            </tbody>
        </table> 
                                   
            <div class="continue__shopping d-flex justify-content-between">
                                        <a class="continue__shopping--link" href="product_fetch.php">Continue shopping</a>
                                        <!-- <button class="continue__shopping--clear" type="button"> <a class="empty" href="cart.php?empty=1">Clear Cart</button></a> -->
        </div>
                                    
    </div>
</div>
                            <div class="col-lg-4">
                                <div class="cart__summary border-radius-10">
                                    <div class="coupon__code mb-30">
                                        <h3 class="coupon__code--title">Coupon</h3>
                                        <p class="coupon__code--desc">Enter your coupon code if you have one.</p>
                                        <div class="coupon__code--field d-flex">
                                            <form action="">
                                            <label>
                                                <input class="coupon__code--field__input border-radius-5" placeholder="Coupon code" name="coupon"  type="text">
				                            <input type="hidden" value="<?php echo $totalPrice?>" id="price"/>

                                            
                                            </label>
                                            <button class="coupon__code--field__btn primary__btn" type="submit"  id='activate'>Apply Coupon</button>
                                        </div>
                                    </div>
                                    <div class="cart__note mb-20">
                                        <h3 class="cart__note--title">Note</h3>
                                        <p class="cart__note--desc">Add special instructions for your seller...</p>
                                        <textarea class="cart__note--textarea border-radius-5"></textarea>
                                    </div>
                                    <div class="cart__summary--total mb-20">
                                        <table class="cart__summary--total__table">
                                        <?php
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
                                            echo '<tbody>
                                                <tr class="cart__summary--total__list">
                                                    <td class="cart__summary--total__title text-left">GRAND TOTAL</td>
				                            <div id="result"></div>

                                                    <td class="cart__summary--amount text-right " id="total"> Pkr: ' . $totalPrice . '</td>
                                                </tr>
                                            </tbody>';
                                            ?>
                                            </form>
                                            <!-- <script type="text/javascript"> -->
	
                                        </table>
                                    </div>
                                    <div class="cart__summary--footer">
                                        <p class="cart__summary--footer__desc">Shipping & taxes calculated at checkout</p>
                                        <ul class="d-flex justify-content-between">
                                            <!-- <li><button class="cart__summary--footer__btn primary__btn cart" type="submit">Update Cart</button></li> -->
                                            <li><a class="cart__summary--footer__btn primary__btn checkout" href="checkout.php?param=<?php $item['id']?>">Check Out</a></li>
                                        </ul>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                    </form> 
                </div>
            </div>     
        </section>
        <!-- cart section end -->

        <!-- Start product section -->
        <section class="product__section section--padding  pt-0">
            <div class="container">
                <div class="section__heading border-bottom mb-30">
                    <h2 class="section__heading--maintitle">New <span>Products</span></h2>
                </div>
                <div class="product__section--inner pb-15 product__swiper--activation swiper">
                
                    <div class="swiper-wrapper">
                    <?php
               $selectquery = "SELECT p.*, si.subcategory_images
               FROM product p
               LEFT JOIN subcategory_images si ON p.id = si.product_id
               ORDER BY p.price
               LIMIT 10";

     
                $selectqueryconnect = mysqli_query($conn, $selectquery);
                
                foreach($selectqueryconnect as $rows ){                            
                ?>
                        <div class="swiper-slide">
                       
                            <article class="product__card">
                                
                                <div class="product__card--thumbnail">
                                    <a class="product__card--thumbnail__link display-block" href="product-details.php?pro_id=<?php echo $rows["id"] ?>">
                                        <img class="product__card--thumbnail__img product__primary--img" src="<?php echo str_replace('../', '', $rows["image"]); ?>" alt="product-img">
                                        <img class="product__card--thumbnail__img product__secondary--img" src="<?php echo str_replace('../', '', $rows["subcategory_images"]); ?>" alt="product-img">
                                    </a>
                                    <!-- <span class="product__badge">-14%</span> -->
                                    <ul class="product__card--action d-flex align-items-center justify-content-center">
                                                <!-- <li class="product__card--action__list">
                                                    <a class="product__card--action__btn" title="Quick View" data-open="modal1" href="javascript:void(0)">
                                                        <svg class="product__card--action__btn--svg" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.6952 14.4991L11.7663 10.5588C12.7765 9.4008 13.33 7.94381 13.33 6.42703C13.33 2.88322 10.34 0 6.66499 0C2.98997 0 0 2.88322 0 6.42703C0 9.97085 2.98997 12.8541 6.66499 12.8541C8.04464 12.8541 9.35938 12.4528 10.4834 11.6911L14.4422 15.6613C14.6076 15.827 14.8302 15.9184 15.0687 15.9184C15.2944 15.9184 15.5086 15.8354 15.6711 15.6845C16.0166 15.364 16.0276 14.8325 15.6952 14.4991ZM6.66499 1.67662C9.38141 1.67662 11.5913 3.8076 11.5913 6.42703C11.5913 9.04647 9.38141 11.1775 6.66499 11.1775C3.94857 11.1775 1.73869 9.04647 1.73869 6.42703C1.73869 3.8076 3.94857 1.67662 6.66499 1.67662Z" fill="currentColor"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>  
                                                    </a>
                                                </li>
                                                <li class="product__card--action__list">
                                                    <a class="product__card--action__btn" title="Compare" href="compare.html">
                                                        <svg class="product__card--action__btn--svg" width="17" height="17" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.89137 6.09375C6.89137 6.47656 7.16481 6.75 7.54762 6.75H10.1453C10.7195 6.75 11.0203 6.06641 10.5828 5.65625L9.8445 4.89062L12.907 1.82812C13.0437 1.69141 13.0437 1.47266 12.907 1.36328L12.2781 0.734375C12.1687 0.597656 11.95 0.597656 11.8132 0.734375L8.75075 3.79688L7.98512 3.05859C7.57496 2.62109 6.89137 2.92188 6.89137 3.49609V6.09375ZM1.94215 12.793L5.00465 9.73047L5.77028 10.4688C6.18043 10.9062 6.89137 10.6055 6.89137 10.0312V7.40625C6.89137 7.05078 6.59059 6.75 6.23512 6.75H3.61012C3.0359 6.75 2.73512 7.46094 3.17262 7.87109L3.9109 8.63672L0.848402 11.6992C0.711683 11.8359 0.711683 12.0547 0.848402 12.1641L1.47731 12.793C1.58668 12.9297 1.80543 12.9297 1.94215 12.793Z" fill="currentColor"/>
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>    
                                                    </a>
                                                </li> -->
                                        <li class="product__card--action__list">
                                            <a class="product__card--action__btn" title="Wishlist" href="wishlist.html">
                                                <svg class="product__card--action__btn--svg" width="18" height="18" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span> 
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__card--content">
                                
                                    <h3 class="product__card--title"><a href="product-details.php?pro_id=<?php echo $rows["id"] ?>"><?php $rows['name'];?>
                                        Camera </a></h3>
                                    <div class="product__card--price">
                                        <span class="current__price"><?php 'PKR'. $rows['price'];?></span>
                                        <span class="old__price"><?php 'PKR'. $rows['price'];?></span>
                                    </div>
                                    <div class="product__card--footer">
                                        <a class="product__card--btn primary__btn" href="cart.html">
                                            <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625ZM7.33082 6.4375C7.33082 6.13281 7.07301 5.875 6.76832 5.875C6.4402 5.875 6.20582 6.13281 6.20582 6.4375V8.3125C6.20582 8.64062 6.4402 8.875 6.76832 8.875C7.07301 8.875 7.33082 8.64062 7.33082 8.3125V6.4375ZM9.95582 6.4375C9.95582 6.13281 9.69801 5.875 9.39332 5.875C9.0652 5.875 8.83082 6.13281 8.83082 6.4375V8.3125C8.83082 8.64062 9.0652 8.875 9.39332 8.875C9.69801 8.875 9.95582 8.64062 9.95582 8.3125V6.4375ZM4.70582 6.4375C4.70582 6.13281 4.44801 5.875 4.14332 5.875C3.8152 5.875 3.58082 6.13281 3.58082 6.4375V8.3125C3.58082 8.64062 3.8152 8.875 4.14332 8.875C4.44801 8.875 4.70582 8.64062 4.70582 8.3125V6.4375Z" fill="currentColor"/>
                                            </svg>
                                            Add to cart
                                        </a>
                                    </div>  
                                   
                                </div>
                                
                            </article>
                          
                        </div>
                        <?php
                    }
                    ?> 
                        </div>
                    <div class="swiper__nav--btn swiper-button-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                    <div class="swiper__nav--btn swiper-button-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </div>

                </div>
            </div>
        </section> 
        <!-- End product section -->

       

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
                    <?php
            include("footer.php")
                    ?>

    <!-- Quickview Wrapper -->
    
    <!-- Quickview Wrapper End -->

     <!-- Scroll top bar -->
   <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>

   <!-- All Script JS Plugins here  -->
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   <script src="assets/js/vendor/popper.js" defer="defer"></script>
   <script src="assets/js/vendor/bootstrap.min.js" defer="defer"></script>
   <script src="assets/js/plugins/swiper-bundle.min.js"></script>
   <script src="assets/js/plugins/glightbox.min.js"></script>
 
  <!-- Customscript js -->
  <script src="assets/js/script.js"></script>
  
</body>

<!-- Mirrored from risingtheme.com/html/demo-partsix/partsix/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Dec 2023 15:19:12 GMT -->
</html>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script>
	$(document).ready(function(){
		$('#activate').on('click', function(){
			var coupon = $('#coupon').val();
			var price = $('#price').val();
			if(coupon == ""){
				alert("Please enter a coupon code!");
			}else{
				$.post('get_discount.php', {coupon: coupon, price: price}, function(data){
					if(data == "error"){
						alert("Invalid Coupon Code!");
						$('#total').val(price);
						$('#result').html('');
					}else{
						var json = JSON.parse(data);
						$('#result').html("<h4 class='pull-right text-danger'>"+json.discount+"% Off</h4>");
						$('#total').val(json.price);
					}
				});
			}
		});
	});
</script>   