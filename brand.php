<?php
include("header.php");
$pro_cate_id = $_GET['cate_id'];
echo $pro_cate_id;
?>
<section class="page__title__wrapper text-center">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page__title__inner">
          <h1 class="text-white">BRANDS</h1>
        </div>
      </div>
      <div class="col-md-12 d-flex align-items-center justify-content-center">
        <h3 class="mb-0 me-3 text-white">Home</h3>
        <i class="fa-solid fa-chevrons-right me-2 text-white"></i>
        <h3 class="mb-0 text-white">Brands</h3>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">

    <div class="row mt-5 mb-4">
      <?php

      $select = $conn->query("SELECT * FROM product where pro_cate_id='$pro_cate_id'");
      while ($fetch_product = mysqli_fetch_array($select)) {
        ?>
        <div class="col-md-3 col-sm-6 mb-3 mb-md-0">


          <div class="card">

            <img src="./adminpanel/image/<?php echo $fetch_product["pro_img"]; ?>" class="categoryimg " alt="Product 1">
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
              <a href="product_page.php?product_pass_id=<?php echo $fetch_product['pro_id']; ?>"
                class="btn btn-primary mt-3 p-2 " data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">View</a>
            </div>
          </div>
        </div>
        <?php
      }
      ?>

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