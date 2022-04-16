<?php 
    include 'inc/header.php';
?>
<?php 
    if (isset($_GET['cartid']))
	{
        $cartId = $_GET['cartid'];
		$del_cart = $ct -> del_cart($cartId);
    }
?>
<?php 
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
        $cartId = $_POST['cartId'];
	    $quantity = $_POST['quantity'];
	    $update_quantity = $ct -> update_quantity($cartId,$quantity);
        if($quantity<=0){
            $del_cart = $ct -> del_cart($cartId);
        }
}
?>
<?php 
    if(!isset($_GET['id'])){
        echo "<meta http-equiv='refresh' content = '0;URL=?id=live'>";
    }
?>

    <!-- cart -->
    <section class="cart spad">
    <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h4>Thông tin giỏ hàng</h4>
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
                        <td>Thực thi</td>
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
                        <form action="" method="POST">
                            <td>
                                <input type="hidden" name="cartId" value="<?php echo $result['cartId']?>">
                                <input class="w-25 pl-1" value="<?php echo $result['quantity']?>" type="number" min="0" name="quantity">
                            </td>
                            <td>
                            
                                <button type="submit" name="submit" value="Cập nhật" style="border: none;"><i class="fa fa-check-circle"></i></button>
                                <a  href="?cartid=<?php echo $result['cartId']?>"><i class="fa fa-trash"></i></a>       
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
                        <h5>Phiếu khuyến mãi</h5>
                        <p>Nhập mã khuyến mãi vào đây</p>
                        <input type="text" placeholder="Mã khuyến mãi">
                        <button class="coupon-btn">Áp dụng khuyến mãi</button>
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
                            <button class="total-btn" onclick="window.location.href='./payment.php'">Tiến hành thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 
        include 'inc/footer.php';
    ?>