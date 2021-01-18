<?php
    include('header.php');
?>

<div class="hero-slider">
	<!-- Single Slider -->
	<div class="single-slider">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-lg-9 offset-lg-3 col-12">
					<div class="text-inner">
						<div class="row">
							<div class="col-lg-7 col-12">
								<div class="hero-text">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="product-area shop-sidebar shop section">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-12">
				<div class="shop-sidebar">
					<!-- Single Widget -->
					<div class="single-widget category">
						<h3 class="title">Categories</h3>
						<ul class="categor-list">
						<?php
							$Query_Catalog = mysqli_query($conn, "SELECT * FROM catalog");
							while ($Display_Catalog = mysqli_fetch_assoc($Query_Catalog)){
							$Statement_Product = "SELECT * FROM product WHERE ID_Catalog = ".$Display_Catalog['ID_Catalog'];
							$Query_Product = mysqli_query($conn, $Statement_Product);
							$Display_Product= mysqli_num_rows($Query_Product);
							echo "<li><a href='?c=".$Display_Catalog['ID_Catalog']."'>$Display_Catalog[Name_Catalog]</a></li>";
							}
						?>
						</ul>
					</div>
					<!--/ End Single Widget -->
					<!-- Shop By Price -->
					<div class="single-widget range">
						<h3 class="title">Tìm Kiếm Theo</h3>
							<form action="" method="GET">
								<div class="row">
									<div class="col-12">
										<input type="text" class="form-control mb-3" name="s" required placeholder="Tìm kiếm theo tên">
									</div>
									<div class="col-6">
										<input type="text" class="form-control mb-3" name="min" required placeholder="Min">
									</div>
									<div class="col-6">
										<input type="text" class="form-control mb-3" name="max" required placeholder="Max">
									</div>
								</div>
								<input type="submit" value="Tìm Kiếm" class="btn btn-primary">
							</form>
					</div>
				</div>
			</div>
			<?php
                if(!isset($_SESSION['limit'])){
                    $_SESSION['limit'] = 10;
				}
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $custom = $_POST['limi'];
                    $_SESSION['limit'] =  $custom;
                }
                $limit = $_SESSION['limit'];
            if (isset($_GET['c'])){
                $c=$_GET['c'];
                $Statement_Product = "SELECT * FROM product WHERE ID_Catalog=".$c;
                $resultcou = mysqli_query($conn, $Statement_Product);
                $total_records = mysqli_num_rows($resultcou);
                $current_page = isset($_GET["page"]) ? $_GET["page"] : 1;
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page){
                $current_page = $total_page;
                }
                else if ($current_page < 1){
                $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $result = mysqli_query($conn, "SELECT * FROM product WHERE ID_Catalog= $c LIMIT $start,$limit");
            }else 
            if(isset($_GET['s'])){
                $s =$_GET['s'];
                $Statement_Product = "SELECT * FROM product WHERE LOWER(Name_Product)  LIKE '%".$s."%' AND Price_Product BETWEEN ".$_GET['min']." AND ".$_GET['max']."" ;
                $resultcou = mysqli_query($conn, $Statement_Product);
                
                $total_records = mysqli_num_rows($resultcou);
                $current_page = isset($_GET["page"]) ? $_GET["page"] : 1;
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page){
                $current_page = $total_page;
                }
                else if ($current_page < 1){
                $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $sqls= "SELECT * FROM product WHERE LOWER(Name_Product)  LIKE '%".$s."%' LIMIT $start,$limit";
                $result = mysqli_query($conn, $sqls);
            } else {
                $Statement_Product = "SELECT * FROM product";
                $resultcou = mysqli_query($conn, $Statement_Product);
                $total_records = mysqli_num_rows($resultcou);
                $current_page = isset($_GET["page"]) ? $_GET["page"] : 1;
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page){
                $current_page = $total_page;
                }
                else if ($current_page < 1){
                $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $result = mysqli_query($conn, "SELECT * FROM product LIMIT $start,$limit");
            }
            ?>
			<div class="col-lg-9 col-md-8 col-12">
				<div class="row">
					<div class="col-12">
						<div class="shop-top">
							<div class="shop-shorter">
								<div class="single-shorter">
								<form action="index.php" method="POST">
									<label>Show :</label>
									<select name="limi" onchange = 'this.form.submit()'>
										<option >Lựa Chọn</option>
										<option value="10">10</option>
										<option value="20">20</option>
										<option value="30">30</option>
									</select>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
				<?php
                if ($total_records!=0){
                    while ($row = mysqli_fetch_assoc($result)){
                 
					echo "<div class='col-lg-4 col-md-6 col-12'>
					<div class='single-product'>
						<div class='product-img'>
							<a href='sanpham.php?id=$row[ID_Product]'>
								<img class='default-img' src='images/products/$row[Image_Product]' alt='#'>
								<img class='hover-img' src='images/products/$row[Image_Product]' alt='#'>
							</a>
							<div class='button-head'>
								<div class='product-action'>
									<a title='Quick View' href='sanpham.php?id=$row[ID_Product]'><i class=' ti-eye'></i><span>Quick Shop</span></a>
								</div>
								<div class='product-action-2'>
									<a title='Add to cart' href='AddToShop.php?item=$row[ID_Product]'>Add to cart</a>
								</div>
							</div>
						</div>
						<div class='product-content'>
							<h3><a href='sanpham.php?id=$row[ID_Product]'>$row[Name_Product]</a></h3>
							<div class='product-price'>
								<span>$row[Price_Product]d</span>
							</div>
						</div>
					</div>
				</div>";
                    }
                } else {
                    echo    "</div class='col-12 mt-5'>
                                <p class='mt-5 text-center'>Trang này không có sản phẩm nào!</p>    
                            </div>";
                }
                ?>
					
				</div>
				<?php
                if ($total_page >1 && isset($_GET['c'])){
                    echo "<div class='row my-5'>
                            <div class='col-12'>
                                <ul class='pagination mb-0 justify-content-end'>";
                    if ($current_page > 1){
                        if ($current_page == 2){
                            echo "<li class='page-item'><a class='page-link' href='index.php?c=$c' aria-label='Previous'><i class='fas fa-arrow-left'></i> </a></li>";
                        }else
                        echo "<li class='page-item'><a class='page-link' href='index.php?page=".($current_page-1)."&c=$c' aria-label='Previous'><i class='fas fa-arrow-left'></i> </a></li>";
                    }
                    
                    for ($i = 1; $i <= $total_page; $i++){
                        if ($i == $current_page){
                            echo "<li class='page-item active'><span class='page-link'>".$i."</span></li>";
                        } else{
                            if ($i ==1){
                            echo "<li class='page-item'><a class='page-link' href='index.php?c=$c'>".$i."</a></li>";
                            }else 
                            echo "<li class='page-item'><a class='page-link' href='index.php?page=$i&c=$c'>".$i."</a></li>";
                        }
                    }
                    if ($current_page < $total_page){
                        echo "<li class='page-item'><a class='page-link' href='index.php?page=".($current_page+1)."&c=$c' aria-label='Next'><i class='fas fa-arrow-right'></i></i></a></li>";
                    }
                    echo        "</ul>
                        </div>
                    </div>";
                } else if($total_page >1 && !isset($_GET['c'])){
                    echo "<div class='row my-5'>
                            <div class='col-12'>
                                <ul class='pagination mb-0 justify-content-end'>";
                    if ($current_page > 1){
                        if ($current_page == 2){
                            echo "<li class='page-item'><a class='page-link' href='index.php' aria-label='Previous'><i class='fas fa-arrow-left'></i> </a></li>";
                        }else
                        echo "<li class='page-item'><a class='page-link' href='index.php?page=".($current_page-1)."' aria-label='Previous'><i class='fas fa-arrow-left'></i> </a></li>";
                    }
                    
                    for ($i = 1; $i <= $total_page; $i++){
                        if ($i == $current_page){
                            echo "<li class='page-item active'><span class='page-link'>".$i."</span></li>";
                        } else{
                            if ($i ==1){
                            echo "<li class='page-item'><a class='page-link' href='index.php'>".$i."</a></li>";
                            }else 
                            echo "<li class='page-item'><a class='page-link' href='index.php?page=$i'>".$i."</a></li>";
                        }
                    }
                    if ($current_page < $total_page){
                        echo "<li class='page-item'><a class='page-link' href='index.php?page=".($current_page+1)."' aria-label='Next'> <i class='fas fa-arrow-right'></i></a></li>";
                    }
                    echo        "</ul>
                        </div>
                    </div>";
                }                
                ?>      
			</div>
		</div>
		
	</div>
</section>
<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section">
	<div class="container">
		<div class="inner-top">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 col-12">
					<!-- Start Newsletter Inner -->
					<div class="inner">
						<h4>Newsletter</h4>
						<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
						<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
							<input name="EMAIL" placeholder="Your email address" required="" type="email">
							<button class="btn">Subscribe</button>
						</form>
					</div>
					<!-- End Newsletter Inner -->
				</div>
			</div>
		</div>
	</div>
</section>
<?php
    include('footer.php');
?>

