<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php 
    class customer
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this -> db = new Database();
            $this -> fm = new Format();
        }
        public function insert_customer($data){
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);

            if($name == "" || $pass == "" || $email == "" || $phone == "" || $address == "" ){
                echo '<script type="text/javascript">';
                echo ' alert("Không được để trống thông tin")';  
                echo '</script>';
            }else{
                $query = "INSERT INTO wdm_customer(name,password,email,phone,address) VALUES ('$name','$pass','$email','$phone','$address')";
                $result = $this->db->insert($query);
                if($result){
                    echo '<script type="text/javascript">';
                    echo ' alert("Đăng ký thành công")';  
                    echo '</script>';
                }else{
                    echo '<script type="text/javascript">';
                    echo ' alert("Đăng ký không thành công")';  
                    echo '</script>';
                }
            
            }
        }
        public function login_customer($data){
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));

            if($password == "" || $email == "" ){
                echo '<script type="text/javascript">';
                echo ' alert("Không được để trống thông tin")';  
                echo '</script>';
            }else{
                $check_login = "SELECT * FROM  wdm_customer WHERE email='$email' AND password = '$password' LIMIT 1";
                $result = $this->db->select($check_login);
                if($result){
                    $value = $result->fetch_assoc();
                   Session::set("customer_login",true);
                   Session::set("customer_id",$value['id']);
                   Session::set("customer_name",$value['name']);
                   header('Location:index.php');
                }else{
                    echo '<script type="text/javascript">';
                    echo ' alert("Thông tin không trùng khớp")';  
                    echo '</script>';
                }
            
            }
        }

        public function get_info($id){
            $query = "SELECT * FROM  wdm_customer WHERE id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_customer($data,$id){
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));

            if($name == "" || $email == "" || $phone == "" || $address == "" || $password == "" ){
                echo '<script type="text/javascript">';
                echo ' alert("Không được để trống thông tin")';  
                echo '</script>';
            }else{
                $query = "UPDATE wdm_customer SET name='$name',email='$email',phone='$phone',address='$address',password='$password' WHERE id = '$id'";
                $result = $this->db->update($query);
                if($result){
                    echo '<script type="text/javascript">';
                    echo ' alert("Cập nhật thành công")';  
                    echo '</script>';
                }else{
                    echo '<script type="text/javascript">';
                    echo ' alert("Cập nhật không thành công")';  
                    echo '</script>';
                }
            
            }
        }
    }
?>
