<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php 
    class product
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this -> db = new Database();
            $this -> fm = new Format();
        }
        public function insert_product($data,$files){

            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $description = mysqli_real_escape_string($this->db->link, $data['description']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
  
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            
            if($productName == "" || $category == "" || $brand == "" || $description == "" || $price == "" || $type == "" || $file_name == ""){
                $alert = "<span class='error'>Không được để trống thông tin</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                unlink($unique_image);
                $query = "INSERT INTO wdm_product(productName,catId,brandId,description,price,type,image) VALUES ('$productName','$category','$brand','$description','$price','$type','$unique_image')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Thêm sản phẩm thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Thêm sản phẩm không thành công</span>";
                    return $alert;
                }
            
            }
        }

        public function show_product(){
            $query = "SELECT wdm_product.*,wdm_category.catName,wdm_brand.brandName 
            
            FROM wdm_product INNER JOIN wdm_category ON wdm_product.catId = wdm_category.catId
            
            INNER JOIN wdm_brand ON wdm_product.brandId = wdm_brand.brandId

            order by wdm_product.productId desc";


            $result = $this->db->select($query);
            return $result ;
        }
        function getproductbyId($id){
            $query = "SELECT * FROM wdm_product WHERE productId = '$id'";
            $result = $this->db->select($query);
            return $result ;
        }
        function update_product($data,$files,$id){
            
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $description = mysqli_real_escape_string($this->db->link, $data['description']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
  
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;


            if($productName == "" || $category == "" || $brand == "" || $description == "" || $price == "" || $type == "" ){
                $alert = "<span class='error'>Không được để trống thông tin</span>";
                return $alert;
            }else{
                if(!empty($file_name)){
                        if(in_array($file_ext,$permited) === false){
                        $alert = "<span class='error'>Bạn chỉ có thể tải lên : -".implode(',', $permited)."</span>";
                        return $alert;
                    }
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "UPDATE wdm_product SET 
                    productName = '$productName', 
                    catId = '$category',
                    brandId = '$brand',
                    description = '$description',
                    price = '$price',
                    image = '$unique_image',
                    type = '$type'
                    WHERE productId = '$id'";
                }else{
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "UPDATE wdm_product SET 
                    productName = '$productName', 
                    catId = '$category',
                    brandId = '$brand',
                    description = '$description',
                    price = '$price',
                    type = '$type'
                    WHERE productId = '$id'";
                }
            
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Sửa danh mục sản phẩm thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Sửa danh mục sản phẩm không thành công</span>";
                    return $alert;
                }
            
            }
        }
        public function delete_product($id){
            $query = "DELETE FROM wdm_product WHERE productId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa sản phẩm thành công</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Xóa sản phẩm không thành công</span>";
                return $alert;
            }
        }

        public function getproduct_feathered(){
            $query = "SELECT * FROM wdm_product WHERE type = '0' LIMIT 8";
            $result = $this->db->select($query);
            return $result ;
        }

        public function getproduct_all(){
            $query = "SELECT * FROM wdm_product ";
            $result = $this->db->select($query);
            return $result ;
        }
        public function getproduct_page(){
            $product_page = 9;
            if(!isset($_GET['page'])){
                $page = 1;
            }else{
                $page = $_GET['page'];
            }
            $each_page = ($page-1)*$product_page; 
            $query = "SELECT * FROM wdm_product ORDER BY productId desc LIMIT $each_page,$product_page";
            $result = $this->db->select($query);
            return $result ;
        }

        public function getproduct_cat($id){
            $query = "SELECT * FROM wdm_product WHERE catId = '$id' LIMIT 8";
            $result = $this->db->select($query);
            return $result ;
        }

        public function getproduct_details($id){
            $query = "SELECT wdm_product.*,wdm_category.catName,wdm_brand.brandName 
            
            FROM wdm_product INNER JOIN wdm_category ON wdm_product.catId = wdm_category.catId
            
            INNER JOIN wdm_brand ON wdm_product.brandId = wdm_brand.brandId

            WHERE wdm_product.productId = '$id'";

            $result = $this->db->select($query);
            return $result ;
        }
    }

?>
