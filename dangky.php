<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Dang Ky EShop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App css -->
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
                                    <a href="index.html">
                                        <span><img src="images/logo.png" alt="" height="30"></span>
                                    </a>
                                </div>
<?php
    include("Connect.php");
    $userErr = "";
    if (isset($_REQUEST['Email_User'])){
        $Name_User =  stripslashes($_REQUEST['Name_User']);
        $Name_User =  mysqli_real_escape_string($conn,$Name_User);
        $Email_User = stripslashes($_REQUEST['Email_User']);
        $Email_User = mysqli_real_escape_string($conn,$Email_User);
        $Password_User = stripslashes($_REQUEST['Password_User']);
        $Password_User = mysqli_real_escape_string($conn,$Password_User);
        $Statement_Users = "SELECT Email_User FROM users WHERE Email_User='$Email_User'";
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d H:i:s");
        $Query_Users = mysqli_query($conn, $Statement_Users);
        if (mysqli_num_rows($Query_Users) > 0){
            $userErr = "Tên đăng nhập đã tồn tại!";
        }
        else{
            $Statement_Users = "INSERT INTO `users` (Email_User, Password_User, Name_User, Date_Join_User) VALUES ('$Email_User', '$Password_User', '$Name_User', '$date')";
            $Query_Users = mysqli_query($conn,$Statement_Users);
            if($Query_Users){
                header("Location: login.php");
            }
        }
    }
?>

<form action="" class="p-2" method="post">
    <div class="form-group">
        <label for="username">Name</label>
        <input class="form-control" type="text" name="Name_User" required="" placeholder="Michael Zenaty">
        <span class="text-danger "><?php echo $userErr;?></span>
    </div>
    <div class="form-group">
        <label for="emailaddress">Email address</label>
        <input class="form-control" type="email" id="emailaddress" required="" placeholder="john@deo.com" name="Email_User">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" required="" id="password" placeholder="Enter your password" name="Password_User">
    </div>
    <div class="form-group mb-4 pb-3">
        <div class="custom-control custom-checkbox checkbox-primary">
            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
        </div>
    </div>
    <div class="mb-3 text-center">
        <button class="btn btn-primary btn-block" type="submit"> Sign Up Free </button>
    </div>
</form>
                            
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-4">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted mb-0">Already have an account? <a href="pages-login.html" class="text-dark ml-1"><b>Sign In</b></a></p>
                            </div>
                        </div>

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="assets\js\vendor.min.js"></script>

        <!-- App js -->
        <script src="assets\js\app.min.js"></script>

    </body>

</html>