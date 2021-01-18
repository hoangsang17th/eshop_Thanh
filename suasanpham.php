<?php
include('header1.php');
?>
<script src="https://cdn.tiny.cloud/1/rm8h7epfc7tvhvacjxs9dfg7u4whkpmvn962dhuwiavn550n/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name_Product = $_POST['Name_Product']; 
    $Brand_Product = $_POST['Brand_Product'];
    $Price_Product = $_POST['Price_Product']; 
    $ID_Catalog = $_POST['ID_Catalog'];
    $Des_Product =$_POST['Des_Product'];
    $Image_Product = $_FILES["uploadfile"]["name"]; 
	$tempname = $_FILES["uploadfile"]["tmp_name"];	 
    $folder = "images/products/".$Image_Product;
    $ID_Product = $_GET['id'];
    $Statement_Update_Product = "UPDATE product SET Name_Product='$Name_Product',ID_Catalog=$ID_Catalog,Brand_Product='$Brand_Product',Price_Product=$Price_Product, Des_Product='$Des_Product', Image_Product='$Image_Product' WHERE ID_Product=$ID_Product";
    $Query_Product = mysqli_query($conn, $Statement_Update_Product);   
    if (move_uploaded_file($tempname, $folder))  { 
        $msg = "Image uploaded successfully"; 
    }else{ 
        $msg = "Failed to upload image"; 
    }  
}
?>
<?php
    if (isset($_GET['id'])){
        $Statement_Product = "SELECT * FROM product WHERE ID_Product=".$_GET['id'];        
        $Query_Product = mysqli_query($conn, $Statement_Product);
        $Display_Product = mysqli_fetch_assoc($Query_Product);
        $count= mysqli_num_rows($Query_Product);
        if($count==0){
            $Display_Product['Name_Product'] = $Display_Product['Brand_Product'] = $Display_Product['Price_Product']
        = $Display_Product['ID_Catalog'] = $Display_Product['Des_Product'] =
        "Sản Phẩm Không Tồn Tại!";
        }
    }
    else {
        $Display_Product['Name_Product'] = $Display_Product['Brand_Product'] = $Display_Product['Price_Product']
        = $Display_Product['ID_Catalog'] = $Display_Product['Des_Product'] =
        "Lỗi GET, vui lòng thử lại bằng cách chọn 1 sản phẩm khác";
    }
?>
<div class="row">
    <div class="col-12">
        <h4 class="card-title mb-4">Thay đổi thông tin sản phẩm</h4>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="formrow-firstname-input">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="Name_Product" value="<?php echo $Display_Product['Name_Product']; ?>">
                </div>
                <div class="form-group">
                    <label for="manufacturername">Thương hiệu</label>
                    <input name="Brand_Product" type="text" class="form-control"value="<?php echo $Display_Product['Brand_Product']; ?>">
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                <label class="control-label">Danh Mục</label>
                    <select name="ID_Catalog" class="form-control select"  selected="<?php echo (isset($Display_Product))?$Display_Product['ID_Catalog']:'';?>">
                    <?php
                        $Statement_Catalog = "SELECT * FROM catalog";
                        $Query_Catalog = mysqli_query($conn,$Statement_Catalog);
                        while($Display_Catalog = mysqli_fetch_assoc($Query_Catalog))
                        {
                            echo '<option value="'.$Display_Catalog['ID_Catalog'].'"';
                            if ($Display_Catalog['ID_Catalog'] == $Display_Product['ID_Catalog']) echo 'selected="selected">'.$Display_Catalog['Name_Catalog'].'</option>';
                            if ($Display_Catalog['ID_Catalog'] != $Display_Product['ID_Catalog']) echo '>'.$Display_Catalog['Name_Catalog'].'</option>';
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Giá Bán</label>
                    <input name="Price_Product" type="number" class="form-control" value="<?php echo $Display_Product['Price_Product']; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="productdesc">Mô tả sản phẩm</label>
                    <textarea name="Des_Product" id="mytextarea" class="form-control pb-2" maxlength="1000" rows="15" placeholder="Không quá 1000 ký tự"><?php echo $Display_Product['Des_Product']; ?></textarea>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <h4 class="card-title mb-3">Ảnh về sản phẩm</h4>
                <input name="uploadfile" type="file">
            </div>
        </div>
        <div>
            <input type="submit" class="btn btn-primary mr-1 mt-3 waves-effect waves-light" value="Lưu và hiển thị">
            <a href="danhsachsanpham.php" class="btn btn-danger mt-3 waves-effect px-5">Hủy</a>
        </div>
        </form>
    </div>
</div>
<?php
include('footer1.php');
?>
