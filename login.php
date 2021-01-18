<?php
    include("Connect.php");
    session_start();
    $LoginErr ="";
    if (isset($_POST['Email_User'])){
        $Email_User = stripslashes($_REQUEST['Email_User']);
        $Email_User = mysqli_real_escape_string($conn,$Email_User);
        $Password_User = stripslashes($_REQUEST['Password_User']);
        $Password_User = mysqli_real_escape_string($conn,$Password_User);
        $query = "SELECT * FROM `users` WHERE Email_User='$Email_User' and Password_User='$Password_User'";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['Email_User'] = $Email_User;
            header("Location: home.php");
        }
        else{
            $LoginErr ="* Sai Tài khoản hoặc Mật Khẩu!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Login Eshop - Ngọc Thành</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Ngọc Thành" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

    </head>

    <body>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-4 mt-3">
                                    <a href="index.php">
                                        <span><img src="images/logo.png" alt="" height="30"></span>
                                    </a>

                                </div>
                                <form action="" class="p-2"  method="post">
                                    <div class="form-group">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" name="Email_User">
                                    </div>
                                    <div class="form-group">
                                        <p class="text-muted float-right">Bạn Quên Mật Khẩu?</p>
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="Password_User">
                                    </div>
                                    <span><i class="text-danger my-4"><?php echo $LoginErr;?></i></span>

                                    <div class="mb-3 text-center mt-4">
                                        <button class="btn btn-primary btn-block" type="submit"> Đăng Nhập </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted mb-0">Bạn chưa có tài khoảng? <a href="dangky.php" class="text-dark ml-1"><b>Đăng Ký</b></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets\js\vendor.min.js"></script>
        <script src="assets\js\app.min.js"></script>
    </body>
</html>