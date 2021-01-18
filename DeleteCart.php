<!-- Xóa các sản phẩm trong giỏ hàng -->
<?php
session_start();
$cart=$_SESSION['cart'];
$id=$_GET['id'];
if($id == 0){
    unset($_SESSION['cart']); 
    // Xóa toàn bộ
}
else{
    unset($_SESSION['cart'][$id]);
    // Xóa một sản phẩm theo id
}
header("Location: cart.php");
exit();
?>