<?php
include("header.php");
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
    <title>Eco Bag</title>
    <link rel="icon" href="img/core-img/shopping.png">
    <link rel="stylesheet" href="style.css">
    <head>
</head>
</head>

<body> 
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/shopping.png" alt="">
        </div>
    </div>
    <section class="hero-area">
        <div class="hero-post-slides owl-carousel">
            <div class="single-hero-post bg-overlay">
                <div class="slide-img bg-img" style="background-image: url(img/bg-img/1.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h2>Plants exist in the weather and light rays that surround them</h2>
                                <p>Discover our eco-friendly bags, crafted with a strong commitment to sustainability and a greener future.</p>
                                <div class="welcome-btn-group">
                                    <a href="category_view.php" class="btn alazea-btn mr-30">GET STARTED</a>
                                    <a href="contact.php" class="btn alazea-btn active">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-post bg-overlay">
                <div class="slide-img bg-img" style="background-image: url(img/bg-img/2.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h2>Plants exist in the weather and light rays that surround them</h2>
                                <p>Discover our eco-friendly bags, crafted with a strong commitment to sustainability and a greener future.</p>
                                <div class="welcome-btn-group">
                                    <a href="category_view.php" class="btn alazea-btn mr-30">GET STARTED</a>
                                    <a href="contact.php" class="btn alazea-btn active">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <?php
    $sql1 = "select * from tbl_category";
    $result1 = $obj->executequery($sql1);
    ?>
    <section class="our-services-area bg-gray section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                 
                    <div class="section-heading text-center">
                        <h2>Shop</h2>
                        <!-- <p>We provide the perfect service for you.</p> -->
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12">
                    <!-- <div class="shop-products-area"> -->
                        <div class="row">

                            <?php
                            while ($display = mysqli_fetch_array($result1)) {
                            ?>
                                <div class="col-12 col-sm-4 col-lg-4">
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

            <!-- <div class="row justify-content-between">
                <div class="col-12 col-lg-5">
                    <div class="alazea-service-area mb-100">

                    
                         <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                         
                            <div class="service-icon mr-30">
                                <img src="img/core-img/s1.png" alt="">
                            </div>
                          
                            <div class="service-content">
                                <h5>Bag Making</h5>
                                <p>We Make Eco Friendly Bags</p>
                            </div>
                        </div> 

                      
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="300ms">
                           
                            <div class="service-icon mr-30">
                                <img src="img/core-img/s2.png" alt="">
                            </div>
                            <div class="service-content">
                                <h5></h5>
                                <p>In Aenean purus, pretium sito amet sapien denim moste consectet sedoni urna placerat sodales.service its.</p>
                            </div>
                        </div>

                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="500ms">
                            <div class="service-icon mr-30">
                                <img src="img/core-img/s3.png" alt="">
                            </div>
                            <div class="service-content">
                                <h5>Tree Service &amp; Trimming</h5>
                                <p>In Aenean purus, pretium sito amet sapien denim moste consectet sedoni urna placerat sodales.service its.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="alazea-video-area bg-overlay mb-100">
                        <img src="img/bg-img/23.jpg" alt="">
                        <a href="http://www.youtube.com/watch?v=7HKoqNJtMTQ" class="video-icon">
                            <i class="fa fa-play" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div> -->
         </div> 
    </section>
    <!-- ##### Service Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <!-- <section class="contact-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <div class="section-heading">
                        <h2>GET IN TOUCH</h2>
                        <p>Send us a message, we will call back later</p>
                    </div>
                    <div class="contact-form-area mb-100">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="contact-email" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn alazea-btn mt-15">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="map-area mb-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <?php
include("footer.php")
?>
    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
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

</html>