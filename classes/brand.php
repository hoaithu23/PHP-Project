<?php 
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');
?>
<?php 
    class brand
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this -> db = new Database();
            $this -> fm = new Format();
        }
        public function insert_brand($brandName){
            $brandName = $this ->fm->validation($brandName);  

            $brandName = mysqli_real_escape_string($this->db->link, $brandName);

            if(empty($brandName)){
                $alert = "<span class='error'>Không được để trống thông tin</span>";
                return $alert;
            }else{
                $query = "INSERT INTO wdm_brand(brandName) VALUES ('$brandName')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Thêm danh mục sản phẩm thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Thêm danh mục sản phẩm không thành công</span>";
                    return $alert;
                }
            
            }
        }

        public function show_brand(){
            $query = "SELECT * FROM wdm_brand order by brandId desc";
            $result = $this->db->select($query);
            return $result ;
        }
        public function getbrandbyId($id){
            $query = "SELECT * FROM wdm_brand WHERE brandId = '$id'";
            $result = $this->db->select($query);
            return $result ;
        }
        public function update_brand($brandName,$id){
            $brandName = $this ->fm->validation($brandName);  

            $brandName = mysqli_real_escape_string($this->db->link, $brandName);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($brandName)){
                $alert = "<span class='error'>Không được để trống thông tin</span>";
                return $alert;
            }else{
                $query = "UPDATE wdm_brand SET brandName = '$brandName' WHERE brandId = '$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Sửa thương hiệu sản phẩm thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Sửa thương hiệu sản phẩm không thành công</span>";
                    return $alert;
                }
            
            }
        }
        public function delete_brand($id){
            $query = "DELETE FROM wdm_brand WHERE brandId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa thương hiệu sản phẩm thành công</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Xóa thương hiệu sản phẩm không thành công</span>";
                return $alert;
            }
        }
    }

?>
