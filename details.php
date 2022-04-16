<?php 
    include 'inc/header.php';
?>
<?php 
    if (!isset($_GET['proId']) || $_GET['proId'] == NULL) {
        echo "<script>window.location = '404Error.php'</script>";
    } else {
        $id = $_GET['proId'];
    }
?>
<?php 
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
	$quantity = $_POST['quantity'];
	$add_cart = $ct -> add_cart($id,$quantity);
}
?>
    <!-- Product -->
    <section class="order spad">
        <div class="container">
            <div class="row">
            <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h4>Thông tin sản phẩm</h4>
                    </div>
                </div>
                <?php 
                    $get_product_details = $product->getproduct_details($id);
                    if($get_product_details){
                        while($result_details = $get_product_details->fetch_assoc()){
                ?>
                <div class="col-lg-6">
                    <div class="banner_slider owl-carousel">
                        <div class="banner_item">
                            <div class="banner_pic">
                                <img src="admin/uploads/<?php echo $result_details['image']?>">
                            </div>
                        </div>                       
                    </div>
                    <div class="banner_details">
                        <a href="#" class="details-radio-btn check">Hình ảnh</a>
                        <a href="#" class="details-radio-btn">Thông số</a>
                        <a href="#" class="details-radio-btn">Mô tả</a>
                        <a href="#" class="details-radio-btn">Đánh giá</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="order_details dt-40">
                        <h4 class="details_title"><?php echo $result_details['productName']?></h4>
                        <p class="details_text"><?php echo $fm->textShorten($result_details['description'],200)?></p>
                        <p><strong>Danh mục:</strong> <?php echo $result_details['catName']?></p>
                        <p><strong>Thương hiệu:</strong> <?php echo $result_details['brandName']?></p>
                        <hr class="line">
                        <p class="details_product">Còn hàng</p>
                        <p>Giá hàng: <strong><?php echo $fm->format_currency($result_details['price']).' '.'VNĐ'?></strong></p>
                                  
                    </div>
                    <form action="" method="POST">
                        <p>Số lượng đặt: <input type="number" name="quantity" value="1" min="1"></strong></p>                  
                        <div class="order_button">
                        <button type="submit" class="click-buy" name="submit"><strong>MUA NGAY</strong> <br>Giao hàng tận nơi</button>           
                        </div>          
                        <?php 
                            if(isset($add_cart)){
                                echo $add_cart;
                            }
                        ?>
                    </form>
                    <!-- <div class="order_button">
                        <button type="button" class="click-buy"><strong>MUA NGAY</strong> <br>Giao hàng tận nơi</button>           
                    </div>
                    <div class="orther_button btn-40">
                        <button type="button" class="click-contribute1"><strong>MUA TRẢ GÓP 0%</strong> <br>Duyệt hồ sơ trong 5 phút</button>
                        <button type="button" class="click-contribute2"><strong>GÓP QUA THẺ TÍN DỤNG</strong> <br>Visa, Master card, JCB</button>
                    </div> -->
                    <table class="table tb-20">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col"><i class="fa fa-gift"></i></th>
                            <th scope="col"><strong>Quà tặng kèm trị giá 7.000.000đ</strong></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Tặng Phiếu Mua Hàng 7.000.000đ Mua Kèm Lọc Nước, Bếp Điện Âm Và Nồi (xem chi tiết)</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Mua Kèm Loa, Loa Kéo,  AmpLi Giảm 10 - 20% ( xem chi tiết)</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                <?php 
                        }
                    }
                ?>
            </div>
        </div>
    </section>
<?php 
    include 'inc/footer.php';
?>