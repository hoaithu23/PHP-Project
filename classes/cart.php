<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php 
    class cart
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this -> db = new Database();
            $this -> fm = new Format();
        }
        public function add_cart($id,$quantity){
            $quantity = $this ->fm->validation($quantity);  
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id = mysqli_real_escape_string($this->db->link, $id);
            $sId = session_id();

            $query = "SELECT * FROM wdm_product WHERE productId = '$id'";
            $result = $this->db->select($query)->fetch_assoc();

            $image = $result['image'];
            $price = $result['price'];
            $productName = $result['productName'];

            $check_cart = "SELECT * FROM wdm_cart WHERE productId = '$id' AND sId = '$sId'";
            $result_check = $this->db->select($check_cart);
            if($result_check){
                echo '<script type="text/javascript">';
                echo ' alert("Sản phẩm đã có trong giỏ hàng")';  
                echo '</script>';
                // $msg = "Sản phẩm đã có trong giỏ hàng";
                // return $msg;
            }else{
                $query_add = "INSERT INTO wdm_cart(productId,quantity,sId,image,price,productName) 
                VALUES ('$id','$quantity','$sId','$image','$price','$productName')";
                $add_cart = $this->db->insert($query_add);
                    if($result){
                        header('Location:cart.php');
                    }else{
                        header('Location:404Error.php');
                    }
            }
        }
        public function get_product_cart(){
            $sId = session_id();
            $query = "SELECT * FROM wdm_cart WHERE sID = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_quantity($cartId,$quantity){
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $cartId = mysqli_real_escape_string($this->db->link, $cartId);

            $query = "UPDATE wdm_cart SET quantity = '$quantity' WHERE cartId = '$cartId'";

            $result = $this->db->update($query);
            if($result){
                header('Location:cart.php');
            }
        }
        public function del_cart($cartId){         
                $query = "DELETE FROM wdm_cart WHERE cartId = '$cartId'";
                $result = $this->db->delete($query);   
        }
        public function delallcart(){
            $sId = session_id();
            $query = "DELETE FROM wdm_cart WHERE sID = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function insertOrder($customer_id){
            $sId = session_id();
            $query = "SELECT * FROM wdm_cart WHERE sID = '$sId'";
            $result_product = $this->db->select($query);
            if($result_product){
                while($result = $result_product->fetch_assoc()){
                    $productId = $result['productId'];
                    $productName = $result['productName'];
                    $quantity = $result['quantity'];
                    $price = $result['price'] *  $quantity;
                    $image = $result['image'];
                    $customer_id = $customer_id;
                    $query_add = "INSERT INTO wdm_order(productId,productName,quantity,price,image,customer_id) 
                    VALUES ('$productId','$productName','$quantity','$price','$image','$customer_id')";
                    $add_cart = $this->db->insert($query_add);
                }
            }
        }
        public function get_money($customer_id ){
            $sId = session_id();
            $query = "SELECT price FROM wdm_order WHERE customer_id = '$customer_id'";
            $get_money = $this->db->select($query);
            return $get_money;
        }
        public function get_cart_order($customer_id ){
            $sId = session_id();
            $query = "SELECT * FROM wdm_order WHERE customer_id = '$customer_id'";
            $get_cart_order = $this->db->select($query);
            return $get_cart_order;
        }
        public function get_order(){
            $query = "SELECT wdm_order.*,wdm_customer.name 
            FROM wdm_order INNER JOIN wdm_customer ON  wdm_order.customer_id = wdm_customer.id
            ORDER BY date_order";
            $get_order = $this->db->select($query);
            return $get_order;
        }
        public function shift($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE wdm_order SET status = '1' WHERE id = '$id' AND date_order = '$time' AND price = '$price'";
            $result = $this->db->update($query);  
        }
        public function del_shift($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "DELETE FROM wdm_order WHERE id = '$id' AND date_order = '$time' AND price = '$price'";
            $result = $this->db->delete($query);    
        }
        public function shift_cf($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE wdm_order SET status = '2' WHERE customer_id = '$id' AND date_order = '$time' AND price = '$price'";
            $result = $this->db->update($query);    
        }
    }
?>
