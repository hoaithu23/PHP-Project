<?php 
    include 'inc/header.php';
?>
<?php 
    $id = Session::get('customer_id');
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
        $update_customer = $cs -> update_customer($_POST,$id);
}
?>
<style type="text/css">
    .coupon-cart{
        width: 70%;
        margin-left: 15%;
    }
    .tblone{
        width: 100%;
        text-align: center;
        justify-content: center;
    }
    h5{
        text-align: center;
    }
</style>
<section class="coupon spad">
        <div class="container my-5">
            <div class="row">
                <div class="coupon-cart  ">
                <div>
                    <h5>Thay đổi thông tin cá nhân</h5>
                    <form action="" method="POST">
                            <table class="tblone" >
                            <?php 
                                $id = Session::get('customer_id');
                                $get_info = $cs->get_info($id);
                                if($get_info){
                                    while($result = $get_info->fetch_assoc()){                  
                            ?>
                            <tr>
                                <td>Họ tên</td>
                                <td><input type="text" name="name" value="<?php echo $result['name']?>"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="email" value="<?php echo $result['email']?>"></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input type="text" name="phone" value="<?php echo $result['phone']?>"></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><input type="text" name="address" value="<?php echo $result['address']?>"></td>
                            </tr>
                            <tr>
                                <td>Mật khẩu</td>
                                <td>
                                    <input type="password" name="password" id="password" value="<?php echo $result['password']?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <div class="order_button">
                                        <button type="submit" class="click-buy" name="submit"><strong>Lưu</button>           
                                    </div> 
                                </td>
                            </tr>
                            <?php 
                                    }
                                }
                            ?>
                        </table>
                    </form>
                    </div>
                </div>              
            </div>
        </div>
    </section>

    <script>
        function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        }
    </script>
<?php 
    include 'inc/footer.php';
?>