<?php 
    include 'inc/header.php';
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
    tr{
        font-size: 23px;
    }
</style>
<section class="coupon spad">
        <div class="container my-5">
            <div class="row">
                <div class="coupon-cart  ">
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

                        <td>Họ tên</td>
                        <td><?php echo $result['name']?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $result['email']?></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td><?php echo $result['phone']?></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td><?php echo $result['address']?></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <div class="order_button">
                                <button  class="click-buy" onclick="window.location.href='./editprofile.php'"><strong>Chỉnh sửa</button>           
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
            </div>
        </div>
    </section>


<?php 
    include 'inc/footer.php';
?>