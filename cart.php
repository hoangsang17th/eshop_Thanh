<?php
    include('header.php');
?>
<?php
if(isset($_POST['submit'])){
    foreach($_POST['qty'] as $key=>$value){
        if( ($value == 0) and (is_numeric($value))){
            unset ($_SESSION['cart'][$key]);
        }
        else 
        if(($value > 0) and (is_numeric($value))){
            $_SESSION['cart'][$key]=$value;
        }
    }
    // header("Location: cart.php");
}
?>
<div class="shopping-cart section">
<form action="cart.php" method="POST">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php
        foreach($_SESSION['cart'] as $key=>$value){
            $item[]=$key;
        }
        $str=implode(",",$item);
        $Statement_Product = "SELECT * FROM product WHERE ID_Product IN ($str)";
        $Query_Product = mysqli_query($conn, $Statement_Product);
        $total = 0;
        while ($Display_Product = mysqli_fetch_assoc($Query_Product)){
		echo "<tr>
		<td class='image' data-title='No'><img src='images/products/$Display_Product[Image_Product]' alt='#'></td>
		<td class='product-des' data-title='Description'>
			<p class='product-name'><a href='#'>$Display_Product[Name_Product]</a></p>
		</td>
		<td class='price' data-title='Price'><span>$".$Display_Product['Price_Product']."</span></td>
		<td>
			<input class='quantity' min='1' name='qty[$Display_Product[ID_Product]]' value='{$_SESSION['cart'][$Display_Product['ID_Product']]}' type='number'>
		</td>
		<td class='total-amount' data-title='Total'><span>$".$_SESSION['cart'][$Display_Product['ID_Product']]*$Display_Product['Price_Product']."</span></td>
		<td><a href='DeleteCart.php?id=$Display_Product[ID_Product]'><i class='ti-trash remove-icon'></i></a></td>
	</tr>";
}
?> 
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row justify-content-end">
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<input type='submit' name='submit' value='Update Cart' class='btn btn-success w-100 my-2'>
									<a href="checkout.php" class="btn btn-primary w-100 my-2">Checkout</a>
									<a href="index.php" class="btn btn-danger w-100 my-2">Continue shopping</a>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
</form>
<?php
    include('footer.php');
?>