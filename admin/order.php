<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');
   include_once ($filepath.'/../classes/cart.php');
?>
<?php   
    $customer_id = Session::get('customer_id');
    if($customer_id == false){
       header('Location:login.php');
	}
?>
<?php 
	$ct = new cart();
    if (isset($_GET['shiftid']) ) {
        $id = $_GET['shiftid'];
		$time = $_GET['time'];
		$price = $_GET['price'];
		$shift = $ct->shift($id,$time,$price);
    }
	if (isset($_GET['delid']) ) {
        $id = $_GET['delid'];
		$time = $_GET['time'];
		$price = $_GET['price'];
		$del_shift = $ct->del_shift($id,$time,$price);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Đơn hàng</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Mã đơn hàng</th>
							<th>Thời gian đặt</th>
							<th>Sản phẩm</th>
							<th>Số lượng</th>
							<th>Giá</th>
							<th>Tên khách hàng</th>
							<th>Thông tin</th>
							<th>Thực thi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$ct = new cart();
							$fm = new Format();
							$get_order = $ct->get_order();
							if($get_order){
								$i = 0;
								while($result = $get_order->fetch_assoc()){
									$i++;
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $fm->formatDate($result['date_order'])?></td>
							<td><?php echo $fm->textShorten($result['productName'],30)?></td>
							<td><?php echo $result['quantity']?></td>
							<td><?php echo $fm->format_currency($result['price']).' '.'VNĐ'?></td>
							<td><?php echo $result['name']?></td>
							<td><a href="customer.php?customerid=<?php echo $result['customer_id']?>">Chi tiết</a></td>
							<td>
								<?php 
									if($result['status'] == 0){
								?>
								<a href="?shiftid=<?php echo $result['id']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Xử lý</a>
								<?php 
									}elseif($result['status'] == 1){
								?>
								<?php
										echo "Đang gửi ..."		;							
								?>
								<?php 
									}elseif($result['status'] == 2){
								?>
								<a href="?delid=<?php echo $result['id']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Xóa</a>
								<?php 
									}
								?>
							</td>
						</tr>				
						<?php 
								}
							}
						?>		
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
