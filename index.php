<?php 
    include 'inc/header.php'
?>
    <!-- Home -->
    <section id="home" class="home overflow-hidden">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="home-banner home-banner-1">
                    <div class="home-banner-text">
                        <h1>Tủ lạnh</h1>
                        <h2>Giảm thêm 2 triệu</h2>
                        <a href="productbycat.php?catId=8" class="btn btn-danger text-uppercase mt-4">Xem ngay</a>
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="home-banner home-banner-2">
                    <div class="home-banner-text">
                        <h1>Máy giặt</h1>
                        <h2>Giảm đến 50%</h2>
                        <a href="productbycat.php?catId=5" class="btn btn-danger text-uppercase mt-4">Xem ngay</a>
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="home-banner home-banner-3">
                    <div class="home-banner-text">
                        <h1>Tivi</h1>
                        <h2>Trải nghiệm đỉnh cao</h2>
                        <a href="productbycat.php?catId=7" class="btn btn-danger text-uppercase mt-4">Xem ngay</a>
                    </div>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true">
                <span class="ti-angle-left slider-icon"></span>
              </span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true">
                <span class="ti-angle-right slider-icon"></span>
              </span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </section>

    <!-- Product -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h4>Sản phẩm nổi bật</h4>
                    </div>
                </div>
            </div>
            <div class="row property_gallery">
                <?php 
                    $product_feathered = $product->getproduct_feathered();
                    if($product_feathered){
                        while($result_new = $product_feathered->fetch_assoc()){                 
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product_item">
                        <div class="product_item_pic">
                            <a href="details.php?proId=<?php echo $result_new['productId'] ?>"><img src="admin/uploads/<?php echo $result_new['image']?>" alt=""/></a>
                            <div class="label new">Mới</div>
                            <ul class="product_hover">                             
                                <li><a href="details.php?proId=<?php echo $result_new['productId'] ?>"><i class="fa fa-info"></i></a></li>
                            </ul>
                        </div>
                        <div class="product_item_text">
                            <h6><a href="#"><?php echo $result_new['productName']?></a></h6>
                            <div class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="product_price"><?php echo $fm->format_currency($result_new['price']).' '.'VNĐ'?></div>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>
                
                
            </div>
        </div>
    </section>

    <!-- Banner -->
    <section class="banner bg-img">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="banner_slider owl-carousel owl-theme">
                        <div class="banner_item">
                            <div class="banner_text">
                                <span>Điện máy, điện lạnh</span>
                                <h1>Phục vụ cho nhu cầu thiết yếu của cuộc sống</h1>
                                <a href="#">Mua ngay</a>
                            </div>
                        </div>
                        <div class="banner_item">
                            <div class="banner_text">
                                <span>Nâng tầm trải nghiệm</span>
                                <h1>Giải trí bất tận cùng LC TV</h1>
                                <a href="#">Mua ngay</a>
                            </div>
                        </div>
                        <div class="banner_item">
                            <div class="banner_text">
                                <span>Flash sale tủ đông</span>
                                <h1>Giảm đến 44%</h1>
                                <a href="#">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Discount -->
    <section class="discount spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="discount_pic">
                        <img src="./public/img/discount.jpg" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="discount_text">
                        <div class="discount_text_title">
                            <span>Giảm giá</span>
                            <h2>Mùa xuân 2022</h2>
                            <h5><span>Giảm đến</span> 50%</h5>
                        </div>
                        <div class="discount_countdown">
                            <div class="countdown_item">
                                <span>122</span>
                                <p>ngày</p>
                            </div>
                            <div class="countdown_item">
                                <span>18</span>
                                <p>giờ</p>
                            </div>
                            <div class="countdown_item">
                                <span>46</span>
                                <p>phút</p>
                            </div>
                            <div class="countdown_item">
                                <span>05</span>
                                <p>giây</p>
                            </div>
                        </div>
                        <a href="#">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- shop-method -->
    <section class="shop-method-area spad">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single-method mb-40">
                        <i class="fa fa-shopping-bag"></i>
                        <h6>Giao hàng toàn quốc</h6>
                        <p>Siêu thị Điện máy Xanh mua sắm thiết bị điện tử điện lạnh, gia dụng, sản phẩm công nghệ. Mua online tại thvlshop.com giá tốt phục vụ chuyên nghiệp tận nhà.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single-method mb-40">
                        <i class="fa fa-lock"></i>
                        <h6>Bảo mật thông tin</h6>
                        <p>Bảo mật thông tin khách hàng chính là đảm bảo những thông trên luôn được lưu trữ và sử dụng an toàn trong nội bộ doanh nghiệp theo như đúng cam kết đã thực hiện.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single-method mb-40">
                        <i class="fa fa-comments"></i>
                        <h6>Chăm sóc khách hàng</h6>
                        <p>Trả lời cuộc gọi một cách chuyên nghiệp, cung cấp thông tin về sản phẩm và dịch vụ theo yêu cầu của khách</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- newsletter -->
    <section class="newsletter-area spad">
        <div class="container">
            <form method="post" action="#">
                <p class="text-center">
                    Đăng ký email của bạn để cập nhật sản phẩm mới, ưu đãi đặc biệt và các thông tin giảm giá khác. 
                </p>
                <div class="row subscribe-sec">
                    <div class="col-md-9">
                        <input type="email" class="form-control" id="email" name="" placeholder="Nhập email của bạn..." required="">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn submit">Đăng ký</button>
                    </div>
                </div>
            </form>
        </div>
        
    </section>

   <?php 
    include 'inc/footer.php'
   ?>