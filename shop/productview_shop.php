<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sql = "select * from tbl_category";
$result = $obj->executequery($sql);
?>



<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
        <h2>Shop</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<form method="POST">
<?php
    $cat_id = $_GET["cid"];

    $sql = "SELECT * FROM tbl_product WHERE categoryid='$cat_id'";
    $result = $obj->executequery($sql);
?>
<script>
    document.getElementById("category").value = <?php echo $cat_id; ?>
</script>
</div>
<br>
<br>

<section class="shop-page section-padding-0-100">
    <div class="container">
        <div class="row">
            <!-- Sidebar Area -->
            <!-- All Products Area -->
            <div class="col-12 col-md-12 col-lg-12">
                <div class="shop-products-area">
                    <div class="row">

                        <!-- Single Product Area -->
                        <?php
                        while ($display = mysqli_fetch_array($result)) {
                        ?>
                            <div class="col-12 col-sm-3 col-lg-3">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->

                                    <div class="product-img">
                                        <a><img src="../uploads/<?php echo $display["productimage1"]; ?>" width="100" height="100"></a>
                                        <div class="product-meta d-flex">
                                            <a href="product_view_details.php?pid=<?php echo $display["productid"];?>" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="product_view_details.php?pid=<?php echo $display["productid"];?>" class="add-to-cart-btn">Add to cart</a>
                                            <a href="product_view_details.php?pid=<?php echo $display["productid"];?>" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="product_view_details.php?pid=<?php echo $display["productid"];?>">
                                            <p><?php echo $display["productname"]; ?></p>
                                        </a>
                                        <a href="product_view_details.php?pid=<?php echo $display["productid"];?>">
                                            <h6><?php echo $display["productprice"]; ?></h6>

                                        </a>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
</section>
<?php
include("footer.php")
?>