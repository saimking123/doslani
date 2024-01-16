<?php
include("connection/connection.php");
include("header.php");

if (isset($_GET["pro_id"])) {
    $pro_id = $_GET["pro_id"];
}
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
                                <li class="breadcrumb__content--menu__items"><span>Product</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start product details section -->
        <section class="product__details--section section--padding">
            <div class="container">
        
                <div class="row row-cols-lg-2 row-cols-md-2">
                <?php      
                                if(isset($_GET["pro_id"])){
                                    $pro_id = $_GET["pro_id"];
                                    $selectquery = "SELECT * from product WHERE id = $pro_id";          
                                    $selectqueryconnect = mysqli_query($conn, $selectquery);
                                    if (!$selectqueryconnect) {
                                        die("Query failed: " . mysqli_error($conn));
                                    }
                                    while($rows = mysqli_fetch_array($selectqueryconnect)){                            
                                    ?>
                    
                    <div class="col">
                        <div class="product__details--media">
                            <div class="single__product--preview  swiper mb-25">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="<?php echo str_replace('../', '', $rows["image"]); ?>"><img class="product__media--preview__items--img" src="<?php echo str_replace('../', '', $rows["image"]); ?>" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="<?php echo str_replace('../', '', $rows["image"]); ?>"data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    }
                                }
                                    ?>
                                </div>
                            </div>                            
                             <?php
                                if (isset($_GET["pro_id"])) {
                                    $pro_id = $_GET["pro_id"];
                                    
                                    $query = "SELECT si.* FROM subcategory_images si
                                            JOIN product p ON si.product_id = p.id
                                            WHERE p.id = '$pro_id'";
                                    
                                    $query_fetch = mysqli_query($conn, $query);

                                    if (!$query_fetch) {
                                        die("Query failed: " . mysqli_error($conn));
                                    }

                                    echo '<div class="single__product--nav swiper">
                                            <div class="swiper-wrapper">';

                                    while ($row = mysqli_fetch_array($query_fetch)) {
                                        echo '<div class="swiper-slide">
                                            
                                                <div class="product__media--nav__items">
                                                    <img class="product__media--nav__items--img" src="' . str_replace('../', '', $row["subcategory_images"]) . '" alt="product-nav-img">
                                                </div>
                                            </div>';
                                    }

                                    echo '</div>
                                        <div class="swiper__nav--btn swiper-button-next">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                        </div>
                                        <div class="swiper__nav--btn swiper-button-prev">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                        </div>
                                        </div>';
                                }
                                ?> 
                                    
                                                        </div>
                                                    </div>  
                                                    
                    <div class="col">
                        <div class="product__details--info">
                            <form action="insertcart.php" method="post">
                            <?php      
                                if(isset($_GET["pro_id"])){
                                    $pro_id = $_GET["pro_id"];
                                    $selectquery = "SELECT * from product WHERE id = $pro_id";          
                                    $selectqueryconnect = mysqli_query($conn, $selectquery);
                                    if (!$selectqueryconnect) {
                                        die("Query failed: " . mysqli_error($conn));
                                    }
                                    while($rows = mysqli_fetch_array($selectqueryconnect)){                            
                                    ?>
                                    <input type="hidden" name="id" value="<?php echo $rows["id"] ?>">
                                    <input type="hidden" name="name" value="<?php echo $rows["name"] ?>">
                                    <input type="hidden" name="price" value="<?php echo $rows["price"] ?>">
                                    <input type="hidden" name="img" value="<?php echo $rows["image"] ?>">
                                    
                                    <h2 class="product__details--info__title mb-15" ><?php echo $rows['name']; ?> </h2>
                                    <?php
                                    if($rows['quantity']== 0){
                                     echo ' <div class="product__details--info__price mb-12">
                                        <span style="color:red;">Out of stock</span>';
                                    }else{
                                        echo ' <div class="product__details--info__price mb-12">
                                        <span style="color:green;" >In stock</span>';
                                    }
                                    ?>
                                    
                                </div>

                                <div class="product__details--info__price mb-12">
                                    <span class="current__price" name="price" ><?php echo 'Pkr '. $rows ['price']; ?></span>
                                    <span class="old__price">$68.00</span>
                                </div>
                                <ul class="rating product__card--rating mb-15 d-flex">
                                    <li class="rating__list">
                                        <span class="rating__icon">
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"/>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon">
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"/>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon">
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"/>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon"> 
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor"/>
                                             </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon"> 
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor"/>
                                             </svg>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="rating__review--text">(126) Review</span>
                                    </li>
                                </ul>
                                <p class="product__details--info__desc mb-15" name="description" value="<?php echo $rows['description']; ?>"><?php echo $rows['description']; ?></p>
                                
                                <div class="product__variant">
                                    <div class="product__variant--list mb-10">
                                        <fieldset class="variant__input--fieldset">
                                            <legend class="product__variant--title mb-8">Color :</legend>
                                            <div class="variant__color d-flex">
                                                <div class="variant__color--list">
                                                
                                                <?php
                                                    // foreach ($rows as $row) {
                                                        $colors = json_decode($rows["color"]);

                                                        foreach ($colors as $color) {
                                                            echo '<button name="color" style="background-color:' . $color . '; width:50px; height:50px;"></button>';
                                                        // }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="product__variant--list mb-20">
                                            <fieldset class="variant__input--fieldset">
                                                <legend class="product__variant--title mb-8">Weight :</legend>
                                                <select class="variant__size" id="weightSelect" name="weight">
                                                    <?php
                                                    $size = json_decode($rows["size"]);

                                                    foreach ($size as $weight) {
                                                        echo '<option value="' . $weight . '">' . $weight . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </fieldset>
                                        </div>
                                    <div class="product__variant--list quantity d-flex align-items-center mb-20">
                                        <div class="quantity__box">
                                            <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                            <label>
                                                <input type="number" class="quantity__number quickview__value--number" name="quan" value="1" min="1" max="10" data-counter />
                                            </label>
                                            <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                        </div>
                                        <?php
                                    if($rows['quantity']== 0){
                                      echo '<button class="primary__btn quickview__cart--btn" type="submit" value="id" name="add-to-cart" disabled>Add To Cart</button>'; 
                                    }else{
                                      echo '<button class="primary__btn quickview__cart--btn" type="submit" value="id" name="add-to-cart">Add To Cart</button>'; 
                                    }
                                    ?>
                                        </div>
                                    
                                    <div class="product__variant--list mb-15">
                                        <form action="addwishlist.php" method="post">
                                    <input type="hidden" name="wishlist_id" value="<?php echo $rows["id"] ?>">
                                    <input type="hidden" name="wishlist_name" value="<?php echo $rows["name"] ?>">
                                    <input type="hidden" name="wishlist_price" value="<?php echo $rows["price"] ?>">
                                    <input type="hidden" name="wishlist_img" value="<?php echo $rows["image"] ?>">
                                    <button class="primary__btn quickview__cart--btn"" type="submit" title="Add to wishlist" value="wishlist_id" name="add-to-wishlist">
                                            <svg class="quickview__variant--wishlist__svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                            Add to Wishlist
                                </button>
                                </form>
                                       <button class="now__btn primary__btn" type="submit" name=""><a href="checkout.php?pro_id=<?php echo $rows["id"] ?>">Buy it now</button></a>
                                    </div>
                                    <div class="product__variant--list mb-15">
                                        <div class="product__details--info__meta">
                                            <!-- <p class="product__details--info__meta--list"><strong>Barcode:</strong><span> 565461</span></p>
                                            <p class="product__details--info__meta--list"><strong>Sky:</strong><span>4420</span></p>variant__buy--
                                            <p class="product__details--info__meta--list"><strong>Vendor:</strong><span>Belo</span></p> -->
                                            <p class="product__details--info__meta--list"><strong>Type:</strong><span>Auto Parts</span></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="guarantee__safe--checkout">
                                    <h5 class="guarantee__safe--checkout__title">Guaranteed Safe Checkout</h5>
                                    <!-- <img class="guarantee__safe--checkout__img" src="assets/img/other/safe-checkout.webp" alt="Payment Image"> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       
        <!-- End product details section -->

        <!-- Start product details tab section -->
        <section class="product__details--tab__section section--padding">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <ul class="product__tab--one product__details--tab d-flex mb-30">
                            <li class="product__details--tab__list active" data-toggle="tab" data-target="#description">Description</li>
                            <li class="product__details--tab__list" data-toggle="tab" data-target="#reviews">Product Reviews</li>
                            <li class="product__details--tab__list" data-toggle="tab" data-target="#information">Additional Info</li>
                        </ul>
                        <div class="product__details--tab__inner border-radius-10">
                            <div class="tab_content">
                                <div id="description" class="tab_pane active show">
                                    <div class="product__tab--content">
                                        <div class="product__tab--content__step mb-30">
                                            <h2 class="product__tab--content__title h4 mb-10">Long description</h2>

                                            <p class="product__tab--content__desc"><?php echo $rows['fully_detail']; ?></p>
                                        </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                <?php
                                    }
                                    }
                                    ?>                               
                                <div id="reviews" class="tab_pane">
                                    <div class="product__reviews">
                                        <div class="product__reviews--header">
                                                
                                            <h2 class="product__reviews--header__title h3 mb-20">Customer Reviews</h2>
                                            <div class="reviews__ratting d-flex align-items-center">
                                                <!-- <ul class="rating d-flex">
                                                    <li class="rating__list">
                                                        <span class="rating__icon">
                                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__icon">
                                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__icon">
                                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__icon"> 
                                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor"/>
                                                             </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__icon"> 
                                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor"/>
                                                             </svg>
                                                        </span>
                                                    </li>
                                                </ul> -->
                                                <span class="reviews__summary--caption">Based on 2 reviews</span>
                                            </div>
                                            <a class="actions__newreviews--btn primary__btn" href="#writereview">Write A Review</a>
                                        </div>
                                        <?php
                                        if (isset($_GET["pro_id"])) {
                                            $pro_id = $_GET["pro_id"];
                                            $query = "SELECT * FROM post_rating WHERE product_id = $pro_id ORDER BY id DESC LIMIT 10";
                                            $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <!-- // Process the fetched data -->
                                            <div class="reviews__comment--area">
                                                <div class="reviews__comment--list d-flex">
                                                    <div class="reviews__comment--thumb">
                                                        <img src="assets/img/icon/user.png" alt="comment-thumb">
                                                    </div>
                                                    <div class="reviews__comment--content">
                                                        <div class="reviews__comment--top d-flex justify-content-between">
                                                        <div class="reviews__comment--top__left">
                                                            <h3 class="reviews__comment--content__title h4"><?php echo $row['review_name']; ?></h3>
                                                        </div>
                                                        <span class="reviews__comment--content__date"><?php echo $row['modified']; ?></span>
                                                    </div>
                                                    <p class="reviews__comment--content__desc"><?php echo $row['message']; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            <div id="writereview" class="reviews__comment--reply__area">
                                            <form action="product_rating.php" method="post">
                                                <h3 class="reviews__comment--reply__title mb-15">Add a review </h3>
                                                <div class="reviews__ratting mb-20">
                                                <div class="row">
                                                    <div class="col-12 mb-10">
                                                        <textarea class="reviews__comment--reply__textarea" placeholder="Your Comments...." name="message"></textarea>
                                                    </div> 
                                                    <div class="col-lg-6 col-md-6 mb-15">
                                                        <label>
                                                            <input class="reviews__comment--reply__input" placeholder="Your Name...." name="name" type="text">
                                                        </label>
                                                    </div>  
                                                    <div class="col-lg-6 col-md-6 mb-15">
                                                        <label>
                                                            <input class="reviews__comment--reply__input" placeholder="Your Email...." name="email" type="email">
                                                        </label>
                                                    </div>  
                                                </div>
                                                                                        <?php
                                                        if(isset($_GET["pro_id"])){
                                                            $pro_id = $_GET["pro_id"];
                                                            ?>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                            <input type="hidden" name="product_id" value="<?php echo $pro_id; ?>">
                                                            </div>
                                                            </div>
                                                        <?php
                                                        } 
                                                        ?>
                                                        </div>
                                                <button class="primary__btn text-white" data-hover="Submit" name="add_rating" type="submit">SUBMIT</button>
                                            </form>   
                                        </div> 
                                        
                                    </div>    
                                </div>
                                <?php
                                if(isset($_GET["pro_id"])){
                                    $pro_id = $_GET["pro_id"];
                                    $selectquery = "SELECT * from product WHERE id = $pro_id";          
                                    $result = mysqli_query($conn, $selectquery);
                                    if (!$result) {
                                        die("Query failed: " . mysqli_error($conn));
                                    }
                                    foreach($result as $rows){                            
                                    ?>
                                <div id="information" class="tab_pane">
                                    <div class="product__tab--conten">
                                        <div class="product__tab--content__step">
                                            <ul class="additional__info_list">
                                                <li class="additional__info_list--item">
                                                    <span class="info__list--item-head"><strong>Color</strong></span>
                                                    <span class="info__list--item-content">
                                                        <?php
                                                    // foreach ($rows as $row) {
                                                        $colors = json_decode($rows["color"]);

                                                        foreach ($colors as $color) {
                                                            echo '<button id="color-red5" style="background-color:' . $color . '; width:50px; height:50px;"></button>';
                                                        // }
                                                    }
                                                    ?>
                                                </span>
                                                </li>
                                                <li class="additional__info_list--item">
                                                    <span class="info__list--item-head"><strong>Weight</strong></span>
                                                    <span  class="info__list--item-content">
                                                    <?php $size = json_decode($rows["size"]);
                                                    foreach ($size as $weigth) {
                                                    echo '<button id="color-red5" style="background-color:' . $weigth . '; width:50px; height:50px;">' .$weigth.'</button>'; 
                                                    }
                                                    ?>
                                                    </span>
                                                </li>
                                               
                                            </ul>
                                        </div>
                                    </div> 
                                </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
            
        </section>
        <!-- End product details tab section -->
        
        <!-- Start product section --> 
        <section class="product__section section--padding ">
            <div class="container">
                <div class="section__heading border-bottom mb-30">
                    <h2 class="section__heading--maintitle">You <span>may also like</span></h2>
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
                                    <?php
                                                if($rows['quantity']==0){
                                               echo' <span class="product__badge">out of stock</span>';
                                            }else{
                                                echo'<span class="product__badge">-14%</span>';
                                                
                                            }
                                                ?>
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
                                
                                <h3 class="product__card--title"><a href="product-details.php?pro_id=<?php echo $rows["id"] ?>">
                                     </a><?php $rows['name'];?></h3>
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
    <!-- Start footer section -->
    <?php
    include("footer.php")
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

<!-- Mirrored from risingtheme.com/html/demo-partsix/partsix/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Dec 2023 15:19:03 GMT -->
</html>