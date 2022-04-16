<?php 
    include 'inc/header.php';
?>
<?php   
    $customer_id = Session::get('customer_id');
    if($customer_id == false){
       header('Location:login.php');
    }
?>
<?php 
    if (isset($_GET['orderId']) && $_GET['orderId'] == 'order') {
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);
        header('Location:successorder.php');
    }
?>
<?php 
    if (isset($_GET['orderId'])){
        $delcart = $ct->delallcart();
    }
?>
<style type="text/css">
    .tblone{
        width: 100%;
        text-align: center;
        justify-content: center;
    }
    h5{
        text-align: center;
    }
</style>

    <!-- cart -->
    <section class="cart spad">
        <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h4>Thông tin đơn hàng</h4>
                    </div>
                </div>
        <div class="container my-5">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td>Hình ảnh</td>
                        <td>Giá</td>
                        <td>Số lượng</td>
                        <td>Tổng giá</td>
                    </tr>
                </thead>
                <?php 
                    $get_product_cart = $ct->get_product_cart();
                    if($get_product_cart){
                        $tt = 0;
                        $qty = 0;
                        $sale = 0;
                        while($result = $get_product_cart->fetch_assoc()){
                ?>

                    <tr>
                        <td>
                            <?php echo $fm->textShorten($result['productName'],20)?>
                        </td>
                        <td><img src="admin/uploads/<?php echo $result['image']?>" alt=""></td>                      
                        <td>
                            <?php echo $fm->format_currency($result['price'])?>
                        </td>
                            <td>
                                <?php echo $result['quantity']?>
                            </td>
                        </form>
                        <td>
                            <?php 
                                $total = $result['price'] * $result['quantity'];
                                echo $fm->format_currency($total);
                            ?>
                        </td>
                    </tr>
                    <?php
                            $tt += $total;
                            $qty = $qty + $result['quantity'];
                        }
                     }
                    ?>
                
            </table>
        </div>
    </section>
    
    <!-- coupon -->
    <section class="coupon spad">
        <div class="container my-5">
            <div class="row">
                <div class="coupon-cart col-lg-6 col-md-6 col-12 mb-4">
                    <div>
                        <h5>Thông tin cá nhân</h5>
                        <table class="tblone" >
                    <?php 
                        $id = Session::get('customer_id');
                        $get_info = $cs->get_info($id);
                        if($get_info){
                            while($result = $get_info->fetch_assoc()){                  
                    ?>
                    <tr>
                        <td></td>
                        <td>Họ tên</td>
                        <td><?php echo $result['name']?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Email</td>
                        <td><?php echo $result['email']?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Số điện thoại</td>
                        <td><?php echo $result['phone']?></td>
                    </tr>
                    <tr>
                    <td></td>
                        <td>Địa chỉ</td>
                        <td><?php echo $result['address']?></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                        <div class="order_button">
                                <button  class="coupon-btn" onclick="window.location.href='./editprofile.php'"><strong>Chỉnh sửa</button>           
                        </div> 
                        </td>
                    </tr>
                    <?php 
                            }
                        }
                    ?>
                </table>
                    </div>
                </div>
                <div class="total-cart col-lg-6 col-md-6 col-12">
                    <div>
                        <h5>Tổng giỏ hàng</h5>
                        <div class="d-flex justify-content-between">
                            <h6>Tạm tính</h6>
                            <p>
                                <?php                 
                                    echo $fm->format_currency($tt).' '.'VNĐ';
                                    Session::set('qty',$qty)
                                ?>
                            </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6>Thuế</h6>
                            <p>8%</p>
                        </div>
                        <hr class="second-hr">
                        <div class="d-flex justify-content-between">
                            <h6>Tổng cộng</h6>
                            <p>
                                <?php 
                                    $vat = $tt * 0.08; 
                                    // $sale = ($tt + $vat) * 0.1;
                                    $tc = $tt + $vat ;
                                    echo $fm->format_currency($tc).' '.'VNĐ';
                                ?>
                            </p>
                        </div>
                        <div class="col-md-12 text-right">
                            <button class="total-btn" onclick="window.location.href='?orderId=order'">Tiến hành thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
        include 'inc/footer.php';
    ?>