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
                            <form action="#">
                                <div class="checkout__content--step section__contact--information">
                                    <div class="section__header checkout__section--header d-flex align-items-center justify-content-between mb-25">
                                        <h2 class="section__header--title h3">Contact information</h2>
                                        <p class="layout__flex--item">
                                            Already have an account?
                                            <a class="layout__flex--item__link" href="login.html">Log in</a>  
                                        </p>
                                    </div>
                                    <div class="customer__information">
                                        <div class="checkout__email--phone mb-12">
                                            <label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Email or mobile phone mumber"  type="text">
                                            </label>
                                        </div>
                                        <div class="checkout__checkbox">
                                            <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label" for="check1">
                                                Email me with news and offers</label>
                                        </div>
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
                                                    <label class="checkout__input--label mb-5" for="input1">Fist Name <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="First name (optional)" id="input1"  type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input2">Last Name <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Last name" id="input2"  type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input3">Company Name <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Company (optional)" id="input3" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input4">Address <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Address1" id="input4" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <input class="checkout__input--field border-radius-5" placeholder="Apartment, suite, etc. (optional)"  type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input5">Town/City <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="City" id="input5" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="country">Country/region <span class="checkout__input--label__star">*</span></label>
                                                    <div class="checkout__input--select select">
                                                        <select class="checkout__input--select__field border-radius-5" id="country">
                                                            <option value="1">India</option>
                                                            <option value="2">United States</option>
                                                            <option value="3">Netherlands</option>
                                                            <option value="4">Afghanistan</option>
                                                            <option value="5">Islands</option>
                                                            <option value="6">Albania</option>
                                                            <option value="7">Antigua Barbuda</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input6">Postal Code <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Postal code" id="input6" type="text">
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
                                                        <input class="checkout__input--field border-radius-5" placeholder="First name (optional)" id="input7"  type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input8">Last Name <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Last name" id="input8"  type="text">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input9">Company Name <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Company (optional)" id="input9" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input10">Address <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Address1" id="input10" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <input class="checkout__input--field border-radius-5" placeholder="Apartment, suite, etc. (optional)"  type="text">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input11">Town/City <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="City" id="input11" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="country2">Country/region <span class="checkout__input--label__star">*</span></label>
                                                        <div class="checkout__input--select select">
                                                            <select class="checkout__input--select__field border-radius-5" id="country2">
                                                                <option value="1">India</option>
                                                                <option value="2">United States</option>
                                                                <option value="3">Netherlands</option>
                                                                <option value="4">Afghanistan</option>
                                                                <option value="5">Islands</option>
                                                                <option value="6">Albania</option>
                                                                <option value="7">Antigua Barbuda</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input12">Postal Code <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Postal code" id="input12" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </details>
                                    <div class="checkout__checkbox">
                                        <input class="checkout__checkbox--input" id="checkbox2" type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label" for="checkbox2">
                                            Save this information for next time</label>
                                    </div>
                                </div>
                                <div class="order-notes mb-20">
                                    <label class="checkout__input--label mb-5" for="order">Order Notes <span class="checkout__input--label__star">*</span></label>
                                   <textarea class="checkout__notes--textarea__field border-radius-5" id="order" placeholder="Notes about your order, e.g. special notes for delivery." spellcheck="false"></textarea>
                                </div>
                                <div class="checkout__content--step__footer d-flex align-items-center">
                                    <a class="continue__shipping--btn primary__btn border-radius-5" href="index.html">Continue To Shipping</a>
                                    <a class="previous__link--content" href="cart.html">Return to cart</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-6">
                        <aside class="checkout__sidebar sidebar border-radius-10">
                            <h2 class="checkout__order--summary__title text-center mb-15">Your Order Summary</h2>
                            <div class="cart__table checkout__product--table">
                                <table class="cart__table--inner">
                                    <tbody class="cart__table--body">
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
                                    <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="product__image two  d-flex align-items-center">
                                                    <div class="product__thumbnail border-radius-5">
                                                        <a class="display-block" href="product-details.html"><img class="display-block border-radius-5"  src='<?php echo str_replace("../", "", $item['img']); ?>' alt="cart-product"></a>
                                                        <span class="product__thumbnail--quantity"><?php echo $item['quan']; ?></span>
                                                    </div>
                                                    <div class="product__description">
                                                        <h4 class="product__description--name"><a href="product-details.html"><?php echo $item['name'];?></a></h4>
                                                        <span class="product__description--variant">COLOR: Blue</span>
                                                    </div>
                                                </div>
                                            </td>                                        
                                            <td class="cart__table--body__list">
                                                <span class="cart__price"><?php echo 'PKR:'. $item ['price'];?></span>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table> 
                            </div>

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
                                     
                                      
                                        echo '<div class="checkout__discount--code">
                                                <form class="d-flex" action="get_discount.php" method="post">
                                                    <input class="checkout__discount--code__input--field border-radius-5" id="coupon" name="coupon" placeholder="Gift card or discount code" type="text">
                                                    <input type="hidden" value="' . $totalPrice . '" name="price" id="price">
                                                    <button class="checkout__discount--code__btn primary__btn border-radius-5" id="activate" type="submit">Apply</button>
                                                </form>
                                            </div>
                                       
                                    
                                            <div class="checkout__total">
                                            <table class="checkout__total--table">
                                                <tbody class="checkout__total--body">
                                                    <tr class="checkout__total--items">
                                                        <td class="checkout__total--title text-left">Subtotal </td>
                                                        <td class="checkout__total--amount text-right" id="total">Pkr: ' . $totalPrice . '</td>
                                                    </tr>';
                                      
                                        ?>

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
           

                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Shipping</td>
                                            <td class="checkout__total--calculated__text text-right">Calculated at next step</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="checkout__total--footer">
                                        <tr class="checkout__total--footer__items">
                                            <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                            <td class="checkout__total--footer__amount checkout__total--footer__list text-right"><?php echo 'Pkr: '.  $totalPrice + 100; ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment__history mb-30">
                                <h3 class="payment__history--title mb-20">Payment</h3>
                                <ul class="payment__history--inner d-flex">
                                    <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Credit Card</button></li>
                                    <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Bank Transfer</button></li>
                                    <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Paypal</button></li>
                                </ul>
                            </div>
                            <button class="checkout__now--btn primary__btn" type="submit">Checkout Now</button>
                        </aside>
                    </div>
                    
                </div>
            </div>
        </div>
        
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


