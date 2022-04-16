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
    $ct = new cart();
	if (isset($_GET['successId']) ) {
        $id = $_GET['successId'];
		$time = $_GET['time'];
		$price = $_GET['price'];
		$shift_cf = $ct->shift_cf($id,$time,$price);
    }
?>
<style type="text/css">
.container.my-5 {
    max-width: 1500px;
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
                        <td>Ngày đặt</td>
                        <td>Tổng giá</td>
                        <td>Trạng thái</td>
                        <td>Thực thi</td>
                    </tr>
                </thead>
                <?php 
                    $get_cart_order = $ct->get_cart_order($customer_id);
                    if($get_cart_order){
                        $qty = 0;
                        while($result = $get_cart_order->fetch_assoc()){
                ?>

                    <tr>
                        <td>
                            <?php echo $fm->textShorten($result['productName'],20)?>
                        </td>
                        <td><img src="admin/uploads/<?php echo $result['image']?>" alt=""></td>                      
                        <td>
                            <?php echo$fm->format_currency($result['price'])?>
                        </td>
                            <td>
                                <?php echo $result['quantity']?>
                            </td>
                        </form>
                        <td>
                            <?php 
                                echo $fm->formatDate($result['date_order']);
                            ?>
                        </td>
                        <td>
                            <?php 
                                $total = $result['price'] * $result['quantity'];
                                echo $fm->format_currency($total);
                            ?>
                        </td>
                        <td>
                            <?php 
                                if($result['status'] == '0'){
                                    echo 'Chờ xử lý';
                                }elseif($result['status'] == '1'){                              
                            ?>         
                            <span>Đang gửi ....</span>          
                            <?php
                                }elseif($result['status'] == '2'){
                                    echo 'Đã nhận được hàng';
                                }
                            ?>
                        </td>
                            <?php
                                if($result['status'] == '0'){
                            ?>
                            <td>
                                <?php echo 'N/A'?>
                            </td>
                            <?php 
                                }elseif($result['status'] == '1'){
                            ?>
                            <td>
                                <a href="?successId=<?php echo $customer_id?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Nhận hàng</a>
                            </td>
                            <?php
                                }elseif($result['status'] == '2'){
                            ?>
                            <td>
                                <?php echo 'Đơn hàng hoàn thành'?>
                            </td>
                            <?php 
                                }
                            }
                            ?>  

                    </tr> 
                    
                    <?php
                        }
                     
                    ?>
                
            </table>
        </div>
    </section>
    
   
    <?php 
        include 'inc/footer.php';
    ?>