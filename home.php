<?php
    include('header1.php');
?>
<?php
    // Đếm số đơn hàng được order
    $Quanlity_Order = 0;
    $Statement_Order = "SELECT COUNT(ID_Order) AS Quanlity_Order FROM `order`";
    $Query_Order =mysqli_query($conn, $Statement_Order);
    $Display_Order = mysqli_fetch_assoc($Query_Order);
    $Quanlity_Order = $Display_Order['Quanlity_Order'];
    // Đếm tổng số sản phẩm có trên giỏ hàng
    $Quanlity_Product = 0;
    $Statement_Product = "SELECT COUNT(ID_Product) AS Quanlity_Product FROM `product`";
    $Query_Product =mysqli_query($conn, $Statement_Product);
    $Display_Product = mysqli_fetch_assoc($Query_Product);
    $Quanlity_Product = $Display_Product['Quanlity_Product'];
    // Đếm tổng số danh mục tòn tại trong của hàng
    $Quanlity_Catalog = 0;
    $Statement_Catalog = "SELECT COUNT(ID_Catalog) AS Quanlity_Catalog FROM `catalog`";
    $Query_Catalog =mysqli_query($conn, $Statement_Catalog);
    $Display_Catalog = mysqli_fetch_assoc($Query_Catalog);
    $Quanlity_Catalog = $Display_Catalog['Quanlity_Catalog'];
    // Đếm tổng số khách hàng của cửa hàng
    $Quanlity_Users = 0;
    $Statement_Users = "SELECT COUNT(ID_User) AS Quanlity_Users FROM `users`";
    $Query_Users =mysqli_query($conn, $Statement_Users);
    $Display_Users = mysqli_fetch_assoc($Query_Users);
    $Quanlity_Users = $Display_Users['Quanlity_Users'];
?>
<div class="row">
    <div class="col-12">
        <div>
            <h4 class="header-title mb-3">Welcome !</h4>
        </div>
    </div>
</div>
<?php
    if($profile['Position'] == 2){
        echo "<div class='row'>
        <div class='col-12'>
            <div>
                <div class='card-box widget-inline'>
                    <div class='row'>
                        <div class='col-xl-3 col-sm-6 widget-inline-box'>
                            <div class='text-center p-3'>
                                <h2 class='mt-2'><i class='text-primary mdi mdi-access-point-network mr-2'></i> <b>$Quanlity_Order</b></h2>
                                <p class='text-muted mb-0'>Đơn Hàng</p>
                            </div>
                        </div>
    
                        <div class='col-xl-3 col-sm-6 widget-inline-box'>
                            <div class='text-center p-3'>
                                <h2 class='mt-2'><i class='text-teal mdi mdi-airplay mr-2'></i> <b>$Quanlity_Product</b></h2>
                                <p class='text-muted mb-0'>Sản Phẩm</p>
                            </div>
                        </div>
    
                        <div class='col-xl-3 col-sm-6 widget-inline-box'>
                            <div class='text-center p-3'>
                                <h2 class='mt-2'><i class='text-info mdi mdi-black-mesa mr-2'></i> <b>$Quanlity_Catalog</b></h2>
                                <p class='text-muted mb-0'>Danh Mục</p>
                            </div>
                        </div>
    
                        <div class='col-xl-3 col-sm-6'>
                            <div class='text-center p-3'>
                                <h2 class='mt-2'><i class='text-danger mdi mdi-cellphone-link mr-2'></i> <b>$Quanlity_Users</b></h2>
                                <p class='text-muted mb-0'>Người Dùng</p>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
    </div>";
    }
?>
<div class="row">
    <div class="col-12">
    <table  id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead class="bg-light">
    <tr>
        <th>Mã đơn hàng</th>
        <th>Ngày mua</th>
        <th>Sản phẩm</th>
        <th>Chi Tiết</th>
    </tr>
    </thead>

    <tbody class="font-14">
        <?php
            $UID= $profile['ID_User'];
            if($profile['Position'] ==1){
                $Statement_Order = "SELECT * FROM `order` WHERE ID_User= $UID";
            }
            else {
                $Statement_Order = "SELECT * FROM `order`";
            }
            $Query_Order = mysqli_query($conn, $Statement_Order);
            while ($Display_Order = mysqli_fetch_assoc($Query_Order)){
                $Statement_OrderDetail = "SELECT * FROM orderdetail WHERE ID_Order =".$Display_Order['ID_Order'];
                $Query_OrderDetail = mysqli_query($conn, $Statement_OrderDetail);
                echo "<tr>
                <td><a href='javascript: void(0);' class='text-primary ml-3'>VKU$Display_Order[ID_Order]</a> </td>
                <td>$Display_Order[Date_Order]</td>
                <td class='text_product_hidden'>";
                while($Display_OrderDetail = mysqli_fetch_assoc($Query_OrderDetail)){
                    $Statement_Product = "SELECT * FROM product WHERE ID_Product =".$Display_OrderDetail['ID_Product'];
                    $Query_Product = mysqli_query($conn, $Statement_Product);
                    $Display_Product = mysqli_fetch_assoc($Query_Product);
                    echo "$Display_Product[Name_Product], ";
                }
                echo "</td><td>
                        <button type='button' class='btn btn-primary btn-sm btn-rounded' data-toggle='modal' data-target='.Modal$Display_Order[ID_Order]'>Xem</button>
                </td>";
            echo    "
            </tr>";
            }
            ?>
    </tbody>
</table>
    </div>
</div>

<!--end row -->
<?php
    $Statement_Order = "SELECT * FROM `order`";
    $Query_Order = mysqli_query($conn, $Statement_Order);
    while ($Display_Order = mysqli_fetch_assoc($Query_Order)){
    $Statement_Users = "SELECT * FROM users WHERE ID_User =".$Display_Order['ID_User'];
    $Query_Users = mysqli_query($conn, $Statement_Users);
    $Display_Users = mysqli_fetch_assoc($Query_Users); 
    echo "<div class='modal fade Modal$Display_Order[ID_Order]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Chi Tiết Đơn Hàng</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <p class='mb-1'>Mã Đơn Hàng: <span class='text-primary'> VKU$Display_Order[ID_Order]</span></p>
                        <p class='mb-1'>Liên Lạc: <span class='text-primary'> $Display_Order[Phone_User]</span></p>
                        <p class='mb-2'>Địa Chỉ: <span class='text-primary'> $Display_Order[Address_User]</span></p>";
                        if($Display_Order['Status_Order']=="Chưa Giải Quyết"){
                                echo "<p class='mb-2'>Chưa Giải Quyết</p>";
                            }
                            else echo "<p class='mb-2'>Giao Hàng Thành Công</p>";
                echo"       <div class='table-responsive'>
                            <table class='table table-centered table-nowrap'>
                                <thead>
                                    <tr>
                                    <th scope='col'>Hình Ảnh</th>
                                    <th scope='col'>Tên Sản Phẩm</th>
                                    <th scope='col'>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>";
                $Statement_OrderDetail = "SELECT * FROM orderdetail WHERE ID_Order =".$Display_Order['ID_Order'];
                $Query_OrderDetail = mysqli_query($conn, $Statement_OrderDetail);
                $Total=0;
                while($Display_OrderDetail = mysqli_fetch_assoc($Query_OrderDetail)){
                    $Statement_Product = "SELECT * FROM product WHERE ID_Product =".$Display_OrderDetail['ID_Product'];
                    $Query_Product = mysqli_query($conn, $Statement_Product);
                    $Display_Product = mysqli_fetch_assoc($Query_Product);
                    echo "<tr>
                            <th scope='row'>
                                <div>
                                    <img src='images/products/$Display_Product[Image_Product]' class='border' width='70px'>
                                </div>
                            </th>
                            <td>
                                <div>
                                    <h5 class='text-truncate font-size-14'>$Display_Product[Name_Product]</h5>
                                    <p class='text-muted mb-0'>".number_format($Display_Product['Price_Product'], 3)."đ x $Display_OrderDetail[Quanlity_Order]</p>
                                </div>
                            </td>
                            <td>".number_format($Display_OrderDetail['Price_Order'])."đ</td>
                        </tr>";
                        $Total+= $Display_OrderDetail['Price_Order'];
                }
                                    echo"<tr>
                                    <td colspan='2'>
                                        <h6 class='m-0 text-right'>Total:</h6>
                                    </td>
                                    <td>
                                    ".number_format($Total)."đ
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        </div>";
    }
?>
<?php
    include('footer1.php');
?>