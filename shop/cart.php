<?php
require_once("../dboperation.php");
$obj = new dboperation();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags must come first in the head; any other head content must come after these tags -->

    <!-- Title -->
    <title>Alazea - Gardening &amp; Landscaping HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->

    <!-- Your header content goes here -->
    <?php include("header.php");//header?>

    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
            <h2>Cart</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->
    <?php
    $t = 0;
    $sid = $_SESSION['loginid'];
    $sql = "SELECT * FROM `tbl_booking` b inner join tbl_product p WHERE `shopid`=$sid AND b.productid=p.productid And b.bookingstatus='ADDEDTOCART'";
    $result = $obj->executequery($sql);
    ?>
    <!-- ##### Cart Area Start ##### -->
    <div class="cart-area section-padding-0-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Products</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>TOTAL</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($display = mysqli_fetch_array($result)) {
                                    $q = $display['quantity'];
                                    $p = $display['productprice'];
                                ?>
                                    <tr>
                                        <td class="cart_product_img">
                                            <!-- Product details here -->
                                            <h5><?php echo $display['productname']; ?></h5>
                                        </td>
                                        <td class="qty">
                                            <div class="quantity">
                                                <input type="number" class="qty-text" value="<?php echo $display['quantity']; ?>" readonly>
                                            </div>
                                        </td>
                                        <td class="price"><span>₹<?php echo $display['productprice']; ?></span></td>
                                        <td class="total_price"><span>₹<?php echo $display['totalprice']; ?></span></td>
                                        <?php $t += $display['totalprice']; ?>
                                        <td class="action"><a href="cartedit.php?bid=<?php echo $display['bookingid']; ?>">Remove</a></td>
                                        <!-- <i class="icon_close"> -->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="cart-area section-padding-0-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="cartaction.php" method="POST">
                        <div class="total d-flex justify-content-between">
                            <h5>Total</h5>
                            <h5>₹<?php echo $t; ?></h5>
                            <input type="hidden" name="totalprice" value="<?php echo $t; ?>">
                        </div>
                        <div class="checkout-btn">
                            <button type="submit" class="btn alazea-btn w-100">PROCEED TO CHECKOUT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <?php include("footer.php") ?>
    
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/plugins.js"></script>
    <script src="js/active.js"></script>
</body>

</html>
