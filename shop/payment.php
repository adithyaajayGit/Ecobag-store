
<?php
include_once("../dboperation.php");
$obj = new dboperation();
include('header.php');
$login_id = $_SESSION["loginid"];
$total = $_POST['totalprice'];
$snumber = $_POST['serialno'];
?>
<!-- </div> -->
<!-- </header> -->

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Eco Bag</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
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
            <h2>Payment</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Payment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        font-family: 'Montserrat', sans-serif;
    }

    #body {
        padding: 5px;
        /* background-color: #7a34ca; */
        background-color: transparent;

    }

    p {
        margin: 0%;
    }

    #container {
        max-width: 900px;
        margin: 20px auto;
        overflow: hidden;
        background-color: #f8f9fa;
    }

    #box-1 {
        max-width: 450px;
        padding: 10px 40px;
        user-select: none;
    }

    #box-1 div #fs-12 {
        font-size: 8px;
        color: white;
    }

    #box-1 div #fs-14 {
        font-size: 15px;
        color: white;
    }

    #box-1 img#pic {
        width: 20px;
        height: 20px;
        object-fit: cover;
    }

    #box-1 img#mobile-pic {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    #box-1 #name {
        font-size: 11px;
        font-weight: 600;
    }

    #dis {
        font-size: 12px;
        font-weight: 500;
    }

    #box {
        width: 100%;
        font-size: 12px;
        background: #ddd;
        margin-top: 12px;
        padding: 10px 12px;
        border-radius: 5px;
        cursor: pointer;
        border: 1px solid transparent;
    }

    #one:checked~#first,
    #two:checked~#second,
    #three:checked~#third {
        border-color: #7700ff;
    }

    #one:checked~#first .circle,
    #two:checked~#second .circle,
    #three:checked~#third .circle {
        border-color: #7a34ca;
        background-color: #fff;
    }

    #box .course {
        width: 100%;
    }

    #box .circle {
        height: 12px;
        width: 12px;
        background: #ccc;
        border-radius: 50%;
        margin-right: 15px;
        border: 4px solid transparent;
        display: inline-block;
    }

    input[type="radio"] {
        display: none;
    }

    #box-2 {
        max-width: 450px;
        padding: 10px 40px;
    }

    #box-2 .box-inner-2 input.form-control {
        font-size: 12px;
        font-weight: 600;
    }

    #box-2 .box-inner-2 .inputWithIcon {
        position: relative;
    }

    #box-2 .box-inner-2 .inputWithIcon span {
        position: absolute;
        left: 15px;
        top: 8px;
    }

    #box-2 .box-inner-2 .inputWithcheck {
        position: relative;
    }

    #box-2 .box-inner-2 .inputWithcheck span {
        position: absolute;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: green;
        font-size: 12px;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        right: 15px;
        top: 6px;
    }

    .form-control:focus,
    .form-select:focus {
        box-shadow: none;
        outline: none;
        border: 1px solid #7700ff;
    }

    .border:focus-within {
        border: 1px solid #7700ff !important;
    }

    #box-2 .card-atm .form-control {
        border: none;
        box-shadow: none;
    }

    .form-select {
        border-radius: 0;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .address .form-control.zip {
        border-radius: 0;
        border-bottom-left-radius: 10px;
    }

    .address .form-control.state {
        border-radius: 0;
        border-bottom-right-radius: 10px;
    }

    #box-2 .box-inner-2 .btn.btn-outline-primary {
        width: 120px;
        padding: 10px;
        font-size: 11px;
        padding: 0% !important;
        display: flex;
        align-items: center;
        border: none;
        border-radius: 0;
        background-color: whitesmoke;
        color: black;
        font-weight: 600;
    }

    #box-2 .box-inner-2 .btn.btn-primary {
        background-color: #1a7510;
        color: whitesmoke;
        font-size: 14px;
        display: flex;
        align-items: center;
        font-weight: 600;
        justify-content: center;
        border: none;
        padding: 10px;
    }

    #box-2 .box-inner-2 .btn.btn-primary:hover {
        background-color: #7a34ca;
    }

    #box-2 .box-inner-2 .btn.btn-primary .fas {
        font-size: 13px !important;
        color: whitesmoke;
    }

    .carousel-indicators [data-bs-target] {
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }

    .carousel-inner {
        width: 100%;
        height: 250px;
    }

    .carousel-item img {
        object-fit: cover;
        height: 100%;
    }

    .carousel-control-prev {
        transform: translateX(-50%);
        opacity: 1;
    }

    .carousel-control-prev:hover .fas.fa-arrow-left {
        transform: translateX(-5px);
    }

    .carousel-control-next {
        transform: translateX(50%);
        opacity: 1;
    }

    .carousel-control-next:hover .fas.fa-arrow-right {
        transform: translateX(5px);
    }

    .fas.fa-arrow-left,
    .fas.fa-arrow-right {
        font-size: 0.8rem;
        transition: all .2s ease;
    }

    .icon {
        width: 30px;
        height: 30px;
        background-color: #f8f9fa;
        color: black;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transform-origin: center;
        opacity: 1;
    }

    .fas,
    .fab {
        color: #6d6c6d;
    }

    ::placeholder {
        font-size: 12px;
    }

    @media (max-width:768px) {
        #container {
            max-width: 700px;
            margin: 10px auto;
        }

        #box-1,
        #box-2 {
            max-width: 600px;
            padding: 20px 90px;
            margin: 20px auto;
        }
    }

    @media (max-width:426px) {

        #box-1,
        #box-2 {
            max-width: 400px;
            padding: 20px 10px;
        }

        ::placeholder {
            font-size: 9px;
        }
    }
</style>
<div id="body">

    <div class="cart-area section-padding-0-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">
                        <div id="container" class="d-lg-flex">
                            <div id="box-1" class="bg-light user">
                                <!-- <div class="d-flex align-items-center mb-3">
            <img id="pic" src="https://images.pexels.com/photos/4925916/pexels-photo-4925916.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="pic rounded-circle" alt="">
            <p class="ps-2" id="name">Oliur</p>
        </div> -->
                                <!-- <div class="box-inner-1 pb-3 mb-3">
                                    <div class="d-flex justify-content-between mb-3 userdetails">
                                        <p class="fw-bold">Eco Bag</p>
                                    </div>
                                </div> -->
                            </div>
                            <form action="" method="">

                                <div id="box-2" style="width:100%">
                                    <div class="box-inner-2">
                                        <div>
                                            <p class="fw-bold">Payment Details</p>
                                        </div>
                                        <?php
                                        $sql = "Select * from tbl_shopowner s inner join tbl_place p inner join tbl_district d where loginid=$login_id and s.districtid=d.districtid AND s.placeid=p.placeid";
                                        $res = $obj->executequery($sql);
                                        while ($display = mysqli_fetch_array($res)) {
                                        ?>
                                            <div class="mb-3">
                                                <p class="dis fw-bold mb-2">Name </p>
                                                <input class="form-control" type="text" name="name" value="<?php echo $display['ownername']; ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <p class="dis fw-bold mb-2">Shop Name </p>
                                                <input class="form-control" type="text" name="name" value="<?php echo $display['shopname']; ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <p class="dis fw-bold mb-2">District </p>
                                                <input class="form-control" type="text" name="name" value="<?php echo $display['district']; ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <p class="dis fw-bold mb-2">Place </p>
                                                <input class="form-control" type="text" name="name" value="<?php echo $display['placename']; ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <p class="dis fw-bold mb-2">Pin </p>
                                                <input class="form-control" type="text" name="name" value="<?php echo $display['pin']; ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <p class="dis fw-bold mb-2">Date</p>
                                                <input class="form-control" type="text" name="date" value="<?php echo date("Y-m-d"); ?>" readonly>
                                            </div>
                                            <?php
                                            // }
                                            ?>
                                    </div>
                                </div>
                            </form>
                            <form action="payment_action.php" method="POST">
                                <div id="box-2" style="width:100%">
                                    <div class="box-inner-2">
                                        <div class="address">
                                            <u>
                                                <p class="dis fw-bold mb-3">Payment Details</p>
                                            </u>
                                        </div>
                                        <div>
                                            <div class="my-3 cardname">
                                                <p class="dis fw-bold mb-2">Cardholder name</p>
                                                <input class="form-control" type="text">
                                            </div>
                                            <p class="dis fw-bold mb-2">Card details</p>
                                            <div class="d-flex align-items-center justify-content-between card-atm border rounded">
                                                <div class="fab fa-cc-visa ps-3"></div>
                                                <input type="text" class="form-control" placeholder="Card Details">
                                                <div class="d-flex w-50">
                                                    <input type="text" class="form-control px-0" placeholder="MM/YY">
                                                    <input type="password" maxlength=3 class="form-control px-0" placeholder="CVV">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="address">
                                                <div class="d-flex flex-column dis">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <p class="fw-bold">Total Amount</p>
                                                        <p class="fw-bold"><span class="fas fa-rupee-sign px-1"><?php echo $total ?></span></p>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <p class="fw-bold">Advance Amount</p>
                                                        <?php
                                                        $adv = (($total / 10) * 3);
                                                        ?>
                                                        <p class="fw-bold"><span class="fas fa-rupee-sign px-1"><?php echo $adv ?></span></p>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="total" value="<?php echo $total; ?>">
                                                <input type="hidden" name="adv" value="<?php echo $adv; ?>">
                                                <input type="hidden" name="serialnumber" value="<?php echo $snumber; ?>">
                                                <div>
                                                    <br><br>
                                                    <button type="submit" class="btn btn-primary mt-2" style="width:100%;" name="submit">Pay<span class="fas fa-rupee-sign px-1"></span><?php echo $adv ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                        }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
                <?php
                include('footer.php');
                ?>