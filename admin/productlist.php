<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/brand.php';?>
<?php include_once '../classes/category.php';?>
<?php include_once '../classes/product.php';?>
<?php include_once '../helpers/format.php'?>
<?php 
	$product = new product();	
	$format = new format();

	if (isset($_GET['delid']))
	{
        $id = $_GET['delid'];
		$delcat = $product -> delete_product($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Mã ID</th>
					<th>Tên sản phẩm</th>
					<th>Danh mục</th>
					<th>Thương hiệu</th>
					<th>Mô tả sản phẩm</th>	
					<th>Giá tiền</th>				
					<th>Hình ảnh</th>
					<th>Trạng thái</th>
					<th>Thực thi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					
					$productlist = $product->show_product();
					if($productlist){
						$i = 0;
						while($result = $productlist->fetch_assoc()){
							$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['productName']?></td>
					<td><?php echo $result['catName']?></td>
					<td><?php echo $result['brandName']?></td>
					<td><?php echo $format->textShorten($result['description'],20)?></td>
					<td><?php echo $result['price']?></td>
					<td><img src="uploads/<?php echo $result['image'] ?>" width="100"></td>
					<td>
						<?php 
							if($result['type'] == 0){
								echo 'Feathered';
							}else{
								echo 'Non-Feathered';
							}
						?>
					</td>
					<td><a href="productedit.php?productId=<?php echo $result['productId'] ?>">Edit</a> || <a onclick = " return confirm('Ban có muốn xóa chứ !!')" href="?delid=<?php echo $result['productId'] ?>">Delete</a></td>
				</tr>				
				<?php }}?>
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
