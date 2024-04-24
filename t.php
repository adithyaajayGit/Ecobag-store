<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Add your external CSS stylesheets and other dependencies here -->
    <link rel="stylesheet" href="your-styles.css">
</head>
<body>
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
            <h2>Checkout</h2>
        </div>
        <div class "container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <?php
    $t = 0;
    $sid = $_SESSION['loginid'];
    $sql = "SELECT * FROM `tbl_booking` b inner join tbl_product p WHERE `shopid`=$sid AND b.productid=p.productid And b.bookingstatus='ADDEDTOCART'";
    $result = $obj->executequery($sql);
    ?>

    <!-- Checkout Area -->
    <div class="checkout-area mb-100">
        <div class="container">
            <div class="checkout-content">
                <h5 class="title">Your Cart</h5>
                <div class="products">
                    <div class="products-data">
                        <h5>Products:</h5>
                        <?php while ($display = mysqli_fetch_array($result)) {
                            $q = $display['quantity'];
                            $p = $display['productprice'];
                        ?>
                        <div class="single-product">
                            <div class="product-info">
                                <p><?php echo $display['productname']; ?></p>
                                <p>X<?php echo $display['quantity']; ?></p>
                            </div>
                            <div class="product-price">
                                <h5>₹<?php echo $display['totalprice']; ?></h5>
                            </div>
                        </div>
                        <a href="cartedit.php?bid=<?php echo $display['bookingid']; ?>" class="fa fa-trash" style="color: green; float: right;"></a>
                        <?php $t += $display['totalprice']; ?>
                        <?php } ?>
                    </div>
                </div>
                <form action="cartaction.php" method="POST">
                    <div class="subtotal d-flex justify-content-between align-items-center">
                        <h5>Order Total</h5>
                        <h5>₹<?php echo $t; ?></h5>
                    </div>
                    <input type="hidden" name="totalprice" value="<?php echo $t; ?>">
                    <div class="checkout-btn mt-30">
                        <button type="submit" class="btn alazea-btn w-100">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
include("footer.php")
?>
