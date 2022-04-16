<?php 
    include 'lib/session.php';
    Session::init();
?>
<?php 
    include_once 'lib/database.php';
    include_once 'helpers/format.php';

    spl_autoload_register(function($className){
        include_once "classes/".$className.".php";
    });

    $db = new Database();
    $fm = new Format();
    $ct = new cart();
    $us = new user();
    $cs = new customer();
    $cat = new category();
    $product = new product();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THVLShop</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <!-- FONT AWESOME -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="header sticky-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header_logo">
                        <a href="index.php"><span>THVL</span>Shop</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header_menu">
                        <ul>
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="product.php">Sản phẩm</a></li>
                            <li><a href="index.php">Về chúng tôi</a></li>
                            <li><a href="index.php">Tin tức</a></li>
                            <li><a href="index.php">Liên hệ</a></li>
                            <?php 
                                $login_check = Session::get('customer_login');
                                if($login_check == false){
                                    echo '';
                                }else{
                                    echo '<li><a href="profile.php">Thông tin cá nhân</a></li>';
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
                <?php 
                    if(isset($_GET['customer_id'])){
                        $delcart = $ct->delallcart();
                        Session::destroy();
                    }
                ?>
                <div class="col-lg-3">
                    <div class="header_right">           
                        <div class="header_right_auth">
                            
                            <?php 
                                $login_check = Session::get('customer_login');
                                if($login_check == false){
                                    echo '<a href="./login.php"><i class="fa fa-user-circle-o"></i></a>';
                                }else{
                                    echo '<a href="?customer_id='.Session::get('customer_id').'"><i class="fa fa-sign-out"></i></a>';
                                }
                            ?>
                             <?php 
                                $check_order = Session::get('customer_login');
                                if($check_order){
                                    echo '<a href="./orderdetails.php"><i class="fa fa-podcast"></i></a>';
                                }
                            ?>
                            <a href="./cart.php">
                                <i class="fa fa-shopping-cart">
                                    <?php 
                                    $get_product_cart = $ct->get_product_cart();
                                    if($get_product_cart){
                                        $qty = Session::get("qty"); 
                                        echo $qty;
                                    }else{
                                        echo '';
                                    }
                                    ?>
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
      </div>
    </header>