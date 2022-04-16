<link rel="stylesheet" type="text/css" href="./public/css/losi.scss">
<?php 
	include 'inc/header.php'
?>
<?php 
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
	
	$insert_customer = $cs -> insert_customer($_POST);}
?>
<div class="user">
    <header class="user__header">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
        <h1 class="user__title">Đăng ký tài khoản</h1>
    </header>
    <?php 
        if(isset($insert_customer)){
            echo $insert_customer ;
        }
    ?>
    <form class="form" action="" method="post">
        <div class="form__group">
            <input type="text" name="name" placeholder="Họ tên" class="form__input" />     
            <input type="password" name="pass" placeholder="Mật khẩu" class="form__input" />       
            <input type="text" name="email" placeholder="Email" class="form__input" />    
            <input type="text" name="phone" placeholder="Số điện thoại" class="form__input" />    
            <input type="text" name="address" placeholder="Địa chỉ" class="form__input" />
        </div>        
        <input class="btn" type="submit" name="submit" value="Đăng ký" style="background-color: darkgrey;">
		<p style="text-align: center;">Đã có tài khoản ? <label><a href="login.php">Đăng nhập</a></label></p>
    </form>
</div>


