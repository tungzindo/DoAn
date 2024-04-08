<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "web_mysqli1");
mysqli_set_charset($mysqli, "utf8");
$sql_danhmuc = "select * from tbl_danhmuc";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
$tongtien=$_GET['tong'];

if (isset($_GET['option'])) {   
    switch ($_GET['option']) {
        case 'dangxuat':
            unset($_SESSION['tk']);
            unset($_SESSION['dangky']);
            header("Location:index.php");
            break;
    }
}
if(isset($_POST['themvanchuyen'])){
    $hoten=$_POST['hoten'];
    $email=$_POST['email'];
    $sdt=$_POST['sdt'];
    $diachi=$_POST['diachi'];
    $id_dangky=$_SESSION['id_khachhang'];
    $sql_vanchuyen=mysqli_query($mysqli,"INSERT INTO tbl_shipping(name,phone,address,email,id_dangky) VALUES('$hoten','$sdt','$diachi','$email','$id_dangky')");
    if($sql_vanchuyen){
        echo '<script>alert("Cập nhật vận chuyển thành công")</script>';
        
    }
}elseif(isset($_POST['suavanchuyen'])){
    $hoten=$_POST['hoten'];
    $email=$_POST['email'];
    $sdt=$_POST['sdt'];
    $diachi=$_POST['diachi'];
    $id_dangky=$_SESSION['id_khachhang'];
    $sql_update_vanchuyen=mysqli_query($mysqli,"UPDATE tbl_shipping SET name='$hoten',phone='$sdt',address='$diachi',email='$email' where id_dangky='$id_dangky'");
    if($sql_update_vanchuyen){
        echo '<script>alert("Cập nhật vận chuyển thành công")</script>';
        
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NTT Store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">

                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Tài
                            khoản</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">Đăng nhập</button>
                            <button class="dropdown-item" type="button">Đăng kí</button>
                        </div>
                    </div>
                    <div class="btn-group mx-2">

                    </div>
                    <div class="btn-group">

                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.php" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">NTT</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Store</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="shop.php" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nhập sản phẩm cần tìm..." name="tukhoa">
                        <div class="input-group-append">
                            <input type="submit" name="timkiem" value="Tìm kiếm" class="input-group-text bg-transparent text-primary">
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Hotline:</p>
                <h5 class="m-0">0384662267</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Danh mục sản phẩm</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <!-- <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dresses <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Baby's Dresses</a>
                            </div>
                        </div> -->
                        <?php
                        while ($rs_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                        ?>
                            <li><a style="color:black" href="index2.php?id=<?php echo $rs_danhmuc['id_danhmuc'] ?>"><span class="nav-item nav-link"></span><?php echo $rs_danhmuc['tendanhmuc']; ?></a></li>
                        <?php
                        } ?>

                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
                            <a href="shop.php" class="nav-item nav-link">Danh mục</a>

                            <a href="contact.php" class="nav-item nav-link">Liên hệ</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="">Shop</a>
                    <span class="breadcrumb-item active">Vận chuyển</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="container-fluid">
        <?php 
        $id_dangky=$_SESSION['id_khachhang'];
        $sql_get_vanchuyen=mysqli_query($mysqli,"SELECT * from tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
        $_count=mysqli_num_rows($sql_get_vanchuyen);
        if($_count>0){
            $row_get_vanchuyen=mysqli_fetch_array($sql_get_vanchuyen);
            $hoten=$row_get_vanchuyen['name'];
            $email=$row_get_vanchuyen['email'];
            $sdt=$row_get_vanchuyen['phone'];
            $diachi=$row_get_vanchuyen['address'];
        }else{
            $hoten='';
            $email='';
            $sdt='';
            $diachi='';
        }
        ?>
        <div class="row px-xl-5">           
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thông tin</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                    <div class="col-md-6 form-group">
                            <label>Họ và tên</label>
                            <input class="form-control" type="text" placeholder="Họ và tên" value="<?php echo $hoten?>" name="hoten" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ email</label>
                            <input class="form-control" type="text" placeholder="Email" value="<?php echo $email?> " name="email" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" placeholder="Số điện thoại" value="<?php echo $sdt?> " name="sdt" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ thường trú</label>
                            <input class="form-control" type="text" placeholder="Địa chỉ" value="<?php echo $diachi?> " name="diachi" required>
                        </div>

                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Giao hàng địa chỉ khác</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Địa chỉ giao hàng</span></h5>
                    <div class="bg-light p-30">
                        <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Họ và tên</label>
                            <input class="form-control" type="text" placeholder="Họ và tên"  >
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ email</label>
                            <input class="form-control" type="text" placeholder="Email"  >
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" placeholder="Số điện thoại"  >
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ thường trú</label>
                            <input class="form-control" type="text" placeholder="Địa chỉ thường trú"  >
                        </div>          
                        </div>
                    </div>
                </div>
                
                <?php if($hoten=='' && $sdt==''){?>
                            <button class="btn btn-block btn-primary font-weight-bold my-3 py-3" name="themvanchuyen">Thêm thông tin</button>
                        <?php  }elseif($hoten!='' && $sdt!=''){?>
                            <button class="btn btn-block btn-success font-weight-bold my-3 py-3" name="suavanchuyen">  Cập nhật thông tin</button>
                       <?php }  ?>
                <button class="btn btn-block btn-primary font-weight-bold my-3 py-3"><a href="checkout.php?tong=<?php echo $tongtien ?>    " style="color:black">Thanh toán</a></button>          
                        
                
                  
                
            </div>
        </div>
    </div>
                 
    <!-- Checkout End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class=" text-secondary text-uppercase mb-4">Trường Đại học Điện Lực- Khoa CNTT- D14CNPM2</h5>
                <p class="mb-2">NGUYỄN THANH TÙNG- 19810310181 </p>
            </div>

        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>