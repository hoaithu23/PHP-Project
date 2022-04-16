<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');
   include_once ($filepath.'/../classes/customer.php');
?>
<?php 
    if (!isset($_GET['customerid']) || $_GET['customerid'] == NULL) {
        echo "<script>window.location = 'order.php'</script>";
    } else {
        $id = $_GET['customerid'];
    }
    $cs = new customer();
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>               
               <div class="block copyblock"> 
                <?php 
                    $get_customer = $cs->get_info($id);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>Họ tên khách hàng : </td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['name']?>"name="name" class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>Email : </td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['email']?>"name="email" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Số điện thoại : </td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['phone']?>"name="phone" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Địa chỉ : </td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['address']?>"name="address" class="medium" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php                    
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>