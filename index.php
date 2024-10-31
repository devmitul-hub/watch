<?php
include("header.php");
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active round"></li>
        <li data-target="#myCarousel" data-slide-to="1" class="round"></li>
        <li data-target="#myCarousel" data-slide-to="2" class="round"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="./img/clock-design-wallpaper.jpg" alt="Chania">
            <div class="carousel-caption">
                <h2>Welcome To Watch Empire</h2>
                <p>Explore Our Collection of Perpetual Calendars Designs</p>
            </div>
        </div>

        <div class="item">
            <img src="./img/123.jpg" alt="Chicago">
            <div class="carousel-caption">
                <h2>NEW ARRIVALS</h2>
                <p>Elevating Spaces with Exceptional Watch Designs</p>
            </div>
        </div>

        <div class="item">
            <img src="./img/slider1.webp" alt="New York">
            <div class="carousel-caption">
                <h2>EXCLUSIVE COLLECTION</h2>
                <p>Elevating Spaces with Exceptional Watch Designs.</p>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- <i class="arrow_carrot-up"></i> -->
<!-- section4 -->
<section class="sec-1 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-center flex-column">
                <h1 class="category_fonts">SHOP BRANDS</h1>
                <hr class="new1 mb-3 mt-4">

            </div>
        </div>
        <div class="row mt-5">
            <?php
            $select = $conn->query("SELECT * FROM category");
            while ($fetch = mysqli_fetch_array($select)) {
                ?>
                <div class="col-md-3 mb-3 mb-md-0" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                    <div class="we_cate_watches">
                        <img src="./adminpanel/image/<?php echo $fetch["category_image"]; ?>" alt="Digital_watch">
                        <div class="watch_contents ">
                            <h2 data-aos="fade-up" class="mb-3" data-aos-anchor-placement="bottom-bottom">
                                <?php echo $fetch['category_name']; ?>
                            </h2>

                            <a href="brand.php?cate_id=<?php echo $fetch['category_id']; ?>" class="shop_now_btn"
                                data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" value="Shop Now">Shop
                                Now</a>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
</section>


<!-- section5 -->
<div class="container-fluid i1 mb-4">
    <div class="row ms-0">
        <div class="col sec-1 ms-5 Watch_Collection">
            <div class="font1 ms-5">
                <h2 class="text-white Watch_Collection_h2 mt-2">WATCH FOR MEN’S</h2>
                <h2 class="display-4 text-left text-white mt-3 pt-3 mb-3 fw-bolder">New Trending Watch Collection
                </h2>
            </div>
            <div class="text-left">
                <h4 class="elementor-heading-title text-white text-left ms-5">NEED A CLOSER LOOK? COME VISIT US IN STORE
                </h4>
            </div>
            <!-- <a href="#" class="btn btn-primary mt-3" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">SHOP
                NOW</a>
            <div> -->
        </div>
    </div>
</div>
</div>
<section>
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12 trend">
                <h1 class="text-center category_fonts">Trending Products</h1>
                <hr class="new1 mb-5 mt-4">
                <h2 class="text-center w-60">WATCH EMPIRE The World Largest and Old Watch Store</h2>
            </div>
        </div>
        <div class="row mt-5 mb-4">
            <?php

            $select = $conn->query("SELECT * FROM product");
            while ($fetch_product = mysqli_fetch_array($select)) {
                ?>
                <div class="col-md-3 col-sm-6 mb-3 mb-md-0">


                    <div class="card">

                        <img src="./adminpanel/image/<?php echo $fetch_product["pro_img"]; ?>" class="categoryimg "
                            alt="Product 1">
                        <div class="card-body">
                            <h4 class="card-title finalprize" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                                <?php echo $fetch_product["pro_name"]; ?>
                            </h4>
                            <p class="card-text finalprize" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                                <?php echo $fetch_product['pro_disc']; ?>
                            </p>
                            <div class="product-block product-block--price">

                                <strike class="me-2 finalprize mr-2" data-aos="fade-up"
                                    data-aos-anchor-placement="bottom-bottom">₹<?php echo $fetch_product["pro_discount"]; ?></strike>
                                <span class="finalprize" data-aos="fade-up"
                                    data-aos-anchor-placement="bottom-bottom">₹<?php echo $fetch_product['pro_price']; ?>
                                </span>

                            </div>
                            <a href="product_page.php" class="btn btn-primary mt-3 p-2 " data-aos="fade-up"
                                data-aos-anchor-placement="bottom-bottom">View</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
           </div>
    </div>




    
    <img src="./img/men-collection.webp" class="single-img">

    <!-- Carousel wrapper -->
    <!-- services -->
    <section class="sec-3">
        <div class="container">
            <div class="row">
            <div class="col-md-12 trend">
                <h1 class="text-center mb-5 category_fonts">Our Services</h1>
                <hr class="new1 mb-5 mt-4">

            </div>           
         </div>
            <div class="row mb-5">
                <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                    <div class="services_we_box" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                        <i class="fa-sharp fa-solid fa-truck-fast mb-3"></i>
                        <h3 class="mb-1" data-aos="zoom-out-up">Fast Delivery provide</h3>
                        <p class="mb-0" data-aos="zoom-out-up">Delivery with in 5 to 6 days.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                    <div class="services_we_box" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                        <i class="fa-solid fa-money-bill-1-wave mb-3"></i>
                        <h3 class="mb-1" data-aos="zoom-out-up">Only COD available</h3>
                        <p class="mb-0" data-aos="zoom-out-up">ONLY for cash on delivery available</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                    <div class="services_we_box" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                        <i class="fa-solid fa-award mb-3"></i>
                        <h3 class="mb-1" data-aos="zoom-out-up">100% trusted Product</h3>
                        <p class="mb-0" data-aos="zoom-out-up">product will be trusted and secure.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                    <div class="services_we_box" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                    <i class="fa-duotone fa-solid fa-circle-exclamation"></i>
                        <h3 class="mb-1" data-aos="zoom-out-up">NOT Return Allowed</h3>
                        <p class="mb-0" data-aos="zoom-out-up">Product will be not return appliciable.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
            


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <?php
    include("footer.php");
    ?>