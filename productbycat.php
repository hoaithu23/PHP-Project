<?php 
    include 'inc/header.php'
?>
<?php 
	$cat = new category();
    if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
        echo "<script>window.location = '404Error.php'</script>";
    } else {
        $id = $_GET['catId'];
    }
?>
<style type="text/css">
    .list-group-item{
        list-style: none;
        display: block;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 10px;
        margin-inline-end: 0px;
        padding-inline-start: 60px;
    }
</style>
    <!-- Sản phẩm -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h4>Sản phẩm</h4>
                    </div>
                </div>
            </div>
           
            <div class="row sp float-left">
                <div class="checkboxes">
                    <div class="list-group-item">
                        <div class="input-group">
                            <input type="search" class="form-control rounded" placeholder="Tìm kiếm..." aria-label="Search"
                                   aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <h4 style="color: #000; font-size: 18px;">Sản phẩm</h4>
                    </div>
                    <div class="list-group-item">
                        <?php 
                            $getall_cate = $cat->show_category();
                            if($getall_cate){
                                while($result = $getall_cate->fetch_assoc()){              
                        ?>
                                <li class="checkbox-group-item mb-3">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." onclick="window.location.href='productbycat.php?catId=<?php echo $result['catId']?>'" /><?php echo $result['catName']?>
                                </li>   
                                
                        <?php 
                                }    
                            }
                        ?>                                      
                    </div>        
                    </div>
                
                </div>
            
            <div class="row property_gallery">
                <?php 
                    $product_all = $product->getproduct_cat($id);
                    if($product_all){
                        while($result_new = $product_all->fetch_assoc()){                 
                ?>
                <div class="col-lg-4 col-md-3 col-sm-6">
                    <div class="product_item">
                        <div class="product_item_pic">
                            <img src="admin/uploads/<?php echo $result_new['image']?>" alt=""/>
                            <div class="label new">Mới</div>
                            <ul class="product_hover">
                                <li><a href="details.php?proId=<?php echo $result_new['productId'] ?>"><i class="fa fa-info"></i></a></li>
                            </ul>
                        </div>
                        <div class="product_item_text">
                            <h6><a href="#"><?php echo $result_new['productName']?></a></h6>
                            <div class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="product_price"><?php echo $fm->format_currency($result_new['price']).' '.'VNĐ'?></div>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>
                
            </div>
            </div>
        </div>
    </section>

<?php 
    include 'inc/footer.php'
?>