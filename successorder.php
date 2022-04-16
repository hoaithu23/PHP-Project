<?php 
    include 'inc/header.php';
?>
<?php 
    if (isset($_GET['orderId']) || $_GET['orderId'] == 'order') {
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);
        $delcart = $ct->delallcart();
        header('Location:successorder.php');
    }
?>
<style type="text/css">
.container.my-5 {
    text-align: center;
    font-size: 18px;
    font-family: sans-serif;
}
h2.sctitle {
    color: red;
    font-weight: bold;
}
</style>

    <!-- cart -->
    <section class="cart spad">
        <div class="container my-5">
                <h2 class="sctitle">Thanh toán thành công</h2>
                <?php 
                    $customer_id = Session::get('customer_id');
                    $get_money = $ct -> get_money($customer_id);
                    if($get_money){
                        $money = 0 ;
                        while ($result = $get_money->fetch_assoc()){
                            $price = $result['price'];
                            $amount += $price; 
                        }
                    }
                ?>
                <p class="scnote">Tổng thanh toán hiện tại của đơn hàng của bạn là : 
                    <?php 
                        $vat = $amount * 0.08; 
                        $total = $vat + $amount;
                        echo $fm->format_currency($total).' '.'VNĐ';
                    ?>
                </p>
                <p class="scnote">Chúng tôi sẽ liên lạc với bạn một cách sớm nhất. Bạn có thể kiểm tra đơn hàng của bạn <a href="orderdetails.php">ở đây !!</a></p>
        </div>
    </section>
    <?php 
        include 'inc/footer.php';
    ?>