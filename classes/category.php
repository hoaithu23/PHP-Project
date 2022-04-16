<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php 
    class category
    {
        private $db;
        private $fm;

        function __construct()
        {
            $this -> db = new Database();
            $this -> fm = new Format();
        }
        function insert_category($catName){
            $catName = $this ->fm->validation($catName);  

            $catName = mysqli_real_escape_string($this->db->link, $catName);

            if(empty($catName)){
                $alert = "<span class='error'>Không được để trống thông tin</span>";
                return $alert;
            }else{
                $query = "INSERT INTO wdm_category(catName) VALUES ('$catName')";
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

        function show_category(){
            $query = "SELECT * FROM wdm_category order by catId";
            $result = $this->db->select($query);
            return $result ;
        }
        function getcatbyId($id){
            $query = "SELECT * FROM wdm_category WHERE catid = '$id'";
            $result = $this->db->select($query);
            return $result ;
        }
        function update_category($catName,$id){
            $catName = $this ->fm->validation($catName);  

            $catName = mysqli_real_escape_string($this->db->link, $catName);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($catName)){
                $alert = "<span class='error'>Không được để trống thông tin</span>";
                return $alert;
            }else{
                $query = "UPDATE wdm_category SET catName = '$catName' WHERE catId = '$id'";
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
        function delete_category($id){
            $query = "DELETE FROM wdm_category WHERE catid = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa danh mục sản phẩm thành công</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Xóa danh mục sản phẩm không thành công</span>";
                return $alert;
            }
        }
    }

?>
