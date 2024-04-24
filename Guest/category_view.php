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
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<form method="POST">

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
                                <div class="col-12 col-sm-3 col-lg-4">
                                    <div class="single-product-area mb-50">

                                        <div class="product-img">
                                            <a href="productview_shop.php?cid=<?php echo $display["categoryid"]; ?>"><img src="../uploads/<?php echo $display["image"]; ?>" width="100" height="100"></a>
                                        </div>
                                        <!-- Product Info -->
                                        <div class="product-info mt-15 text-center">
                                            <a href="productview_shop.php?cid=<?php echo $display["categoryid"]; ?>">
                                            <p><?php echo $display["categoryname"]; ?></p></a>
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