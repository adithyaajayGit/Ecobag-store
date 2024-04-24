<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$serialno = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

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

    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
            <h2>Checkout</h2>
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
    $sql = "SELECT * FROM `tbl_booking` b inner join tbl_product p WHERE `shopid`='$sid' AND b.productid=p.productid AND b.bookingstatus='APPROVED'";
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
                                    <th>Delivery date</th>
                                    <th>TOTAL Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php while ($display = mysqli_fetch_array($result)) {
                                $serialno = $display['serialno'];
                            ?>
                                <tbody>
                                    <tr>
                                        <td class="cart_product_img">
                                            <h5><?php echo $display['productname']; ?></h5>
                                        </td>
                                        <td class="qty">
                                            <div class="quantity">
                                                <!-- <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span> -->
                                                <input type="number" class="qty-text" readonly value="<?php echo $display['quantity']; ?>">
                                                <!-- <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span> -->
                                            </div>
                                        </td>
                                        <td class="price"><span><?php echo $display['duedate']; ?></span></td>
                                        <td class="total_price"><span>₹<?php echo $display['totalprice']; ?></span></td>
                                        <?php $t += $display['totalprice']; ?>
                                        <!-- <td class="action"><a href="#"><i class="icon_close"></i></a></td> -->
                                        <td></td>
                                    </tr>
                                </tbody>
                        </table>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <form action="payment.php" method="POST">
            <div class="cart-area section-padding-0-100 clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="cart-totals-area mt-70">
                                <div class="total d-flex justify-content-between">
                                    <h5>Total</h5>
                                    <h5>₹<?php echo $t; ?></h5>
                                </div>
                                <input type="hidden" name="totalprice" value="<?php echo $t;?>">
                <input type="hidden" name="serialno" value="<?php echo $serialno ?>">
                                <div class="checkout-btn">
                                <button type="submit" class="btn alazea-btn w-100" >Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>
<footer>
<?php
include("footer.php")
?>
</footer>
</html>