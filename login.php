<link rel="stylesheet" type="text/css" href="./public/css/losi.scss">
<?php 
	include 'inc/header.php'
?>
<?php
    $login_check = Session::get('customer_login');
    if($login_check ){
        header('Location:order.php');
    }
?>
<?php 
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
	
	$login_customer = $cs -> login_customer($_POST);
}
?>
<div class="user">
    <header class="user__header">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
        <h1 class="user__title">Đăng nhập tài khoản</h1>
    </header>
    <?php 
        if(isset($login_customer)){
            echo $login_customer ;
        }
    ?>
    <form class="form" method="POST" action="">
        <div class="form__group">
            <input type="text" name="email" placeholder="Email" class="form__input" />
            <input type="password" name="password" placeholder="Mật khẩu" class="form__input" />
        </div>
        
        <input class="btn" type="submit" name="login" value="Đăng nhập" style="background-color: darkgrey;">
		<p style="text-align: center;">Chưa có tài khoản ? <label><a href="signin.php">Đăng ký</a></label></p>
    </form>
</div>


