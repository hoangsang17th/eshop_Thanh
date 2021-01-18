<?php
include('header.php');
?>

<section class="shop checkout section">
    <div class="container">
        <div class="row"> 
        <form class="form" method="post" action="thanhcong.php">
            <div class="col-12">
                <div class="checkout-form">
                    <h2>Bo Sung Thong Tin</h2>
                    <!-- Form -->
                    
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name<span>*</span></label>
                                    <input type="text" name="name" value="<?php echo $profile['Name_User'];?>" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Phone Number<span>*</span></label>
                                    <input type="number" name="numberphone" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Address<span>*</span></label>
                                    <input type="text" name="address" placeholder="" required="required">
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
            <?php
                if($counts!=0){
                    foreach($_SESSION['cart'] as $key=>$value){
                        $item[]=$key;
                    }
                    $str=implode(",",$item);
                    $Statement_Product = "SELECT * FROM product WHERE ID_Product IN ($str)";
                    $Query_Product = mysqli_query($conn, $Statement_Product);
                    $total = 0;
                    while ($Display_Product = mysqli_fetch_assoc($Query_Product)){
                        $total += $_SESSION['cart'][$Display_Product['ID_Product']]*$Display_Product['Price_Product'];
                    }
                }
                ?>
            <div class="col-12">
                <div class="order-details">
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>CART  TOTALS</h2>
                        <div class="content">
                            <ul>
                                <li>Sub Total<span>$<?php echo $total;?></span></li>
                                <li>(+) Shipping<span>0</span></li>
                                <li class="last">Total<span>$<?php echo $total;?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-widget get-button">
                        <div class="content">
                            <div class="button">
                                <input type="submit" class="btn btn-primary" value="Dat Hang">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</section>

<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Free shiping</h4>
                    <p>Orders over $100</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Free Return</h4>
                    <p>Within 30 days returns</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure payment</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Best Peice</h4>
                    <p>Guaranteed price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<?php
include('footer.php');
?>