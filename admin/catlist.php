<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php 
	$cat = new category();
	if (isset($_GET['delid']))
	{
        $id = $_GET['delid'];
		$delcat = $cat -> delete_category($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách danh mục sản phẩm</h2>
                <div class="block">    
				<?php 
                    if(isset($delcat)){
                        echo $delcat;
                    }
                ?>    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Mã số ID</th>
							<th>Tên danh mục</th>
							<th>Thực thi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_cat = $cat -> show_category();
							if($show_cat){
								$i = 0;
								while($result = $show_cat->fetch_assoc()){
									$i++;
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['catName']?></td>
							<td><a href="catedit.php?catId=<?php echo $result['catId'] ?>">Edit</a> || <a onclick = " return confirm('Ban có muốn xóa chứ !!')" href="?delid=<?php echo $result['catId'] ?>">Delete</a></td>
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

