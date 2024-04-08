<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "web_mysqli1");
mysqli_set_charset($mysqli, "utf8");

$sql_danhmuc = "select * from tbl_danhmuc";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
if (isset($_GET['minprice'])) {
    $minprice = $_GET['minprice'];
    if (isset($_GET['maxprice'])) {
        $maxprice = $_GET['maxprice'];
        $sql_giasp = "SELECT * FROM tbl_sanpham WHERE giasp>$minprice AND giasp<=$maxprice";
        $query_giasp = mysqli_query($mysqli, $sql_giasp);
    };
};
if(isset($_GET['trang'])){
    $page = $_GET['trang'];
  }else{
    $page = 1;
  }
  if($page== '' || $page ==1){
    $begin = 0;
  }else{
    $begin = ($page*9)-9;
  }
    $sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC LIMIT $begin,9";
    $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
if (isset($_GET['option'])) {
    switch ($_GET['option']) {
        case 'dangxuat':
            unset($_SESSION['tk']);
            unset($_SESSION['dangky']);
            header("Location:index.php");
            break;
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
    <style>.doimau:hover{color:#ff3333}</style>
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
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
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
                    <a class="breadcrumb-item text-dark" href="shop.php">Sản phẩm</a>
                    <span class="breadcrumb-item active">Danh sách sản phẩm</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Mức giá</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form method="post">
                        <a href="shop.php" style="color:black" >
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">

                                <label class="custom-control-label" for="price-1">Tất cả</label>
                            </div>
                        </a>
                        <a href="shop.php?minprice=0&maxprice=500000" style="color:black" >
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                
                                <label class="custom-control-label" for="price-1">Dưới 500,000đ</label>
                            </div>
                        </a>
                        <a href="shop.php?minprice=500000&maxprice=1000000" style="color:black" >
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <label class="custom-control-label" for="price-2">500,000đ - 1 Tr</label>
                            </div>
                        </a>
                        <a href="shop.php?minprice=1000000&maxprice=2000000" style="color:black" >
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">

                                <label class="custom-control-label" for="price-3">1Tr - 2Tr</label>
                            </div>
                        </a>
                        <a href="shop.php?minprice=2000000&maxprice=4000000" style="color:black" >
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <label class="custom-control-label" for="price-4">2Tr - 4Tr</label>
                            </div>
                        </a>
                        <a href="shop.php?minprice=4000000&maxprice=7000000" style="color:black" >
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                <label class="custom-control-label" for="price-5">4Tr - 7Tr</label>
                            </div>
                        </a>
                    </form>
                </div>
                <!-- Price End -->
                <!-- Color Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Hãng sản xuất</span></h5>
                <div class="bg-light p-4 mb-30">
                <a href="shop.php" style="color:black" >
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">

                                <label class="custom-control-label" for="price-1">Tất cả</label>
                            </div>
                        </a>
                <?php
	    		$sql_hangsx = "SELECT * FROM tbl_hangsx ORDER BY id_hangsx DESC";
	    		$query_hangsx = mysqli_query($mysqli,$sql_hangsx);
	    		while($row_hangsx = mysqli_fetch_array($query_hangsx)){?>
                <a href="shop.php?idhangsx=<?php echo $row_hangsx['id_hangsx']?>" style="color:black" >
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">

                                <label class="custom-control-label" for="price-1"><?php echo $row_hangsx['tenhangsx']?></label>
                            </div>
                        </a>
               <?php
             }?>
             </div>
                <!-- Color End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <?php
                    if (isset($_POST['timkiem'])) {
                        $tukhoa = $_POST['tukhoa'];
                        $_SESSION['goiy']['tukhoa'] = $tukhoa;
                        $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%" . $tukhoa . "%'";
                        $query_pro = mysqli_query($mysqli, $sql_pro); ?>
                        <div class="container-fluid pt-5 pb-3">
                            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM
                                    TÌM KIẾM:<?php echo $tukhoa ?></span></h2>
                            <div class="row px-xl-5"><?php
                                                        while ($rs = mysqli_fetch_array($query_pro)) {
                                                        ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">

                                        <div class="product-item bg-light mb-4">
                                            <div class="product-img position-relative overflow-hidden" style="border-style: solid;">

                                                <a href="chitietsp.php?id=<?php echo $rs['id_sanpham'] ?>"><img style="height: 280px;" class="img-fluid w-100" src="../admincp/modules/quanlysp/uploads/<?php echo $rs['hinhanh'] ?>" alt=""></a>
                                                <div class="product-action">
                                                    <a class="btn btn-outline-dark btn-square" href="cart.php"><i class="fa fa-shopping-cart"></i></a>
                                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                                    <a class="btn btn-outline-dark btn-square" href="chitietsp.php?id=<?php echo $rs['id_sanpham'] ?>"><i class="fa fa-search"></i></a>
                                                </div>

                                            </div>
                                            <div class="text-center py-4">
                                                <a class="h6 text-decoration-none text-truncate" href=""><?php echo $rs['tensanpham'] ?></a>
                                                <div class="d-flex align-items-center justify-content-center mt-2">
                                                    <h5><strong> <?php echo number_format($rs['giasp'], 0, ',', '.') . 'vnđ' ?></strong></h5>

                                                </div>

                                            </div>
                                        </div>
                                    </div><?php } ?><?php
                                                    if (isset($_GET['minprice'])) {
                                                        $minprice = $_GET['minprice'];
                                                        $maxprice = $_GET['maxprice'];
                                                        $sql_giasp = "SELECT * FROM tbl_sanpham WHERE giasp>$minprice AND giasp<=$maxprice AND tbl_sanpham.tensanpham LIKE '%" . $tukhoa . "%'";
                                                        $query_giasp = mysqli_query($mysqli, $sql_giasp);
                                                        while ($rs_giasp = mysqli_fetch_array($query_giasp)) {
                                                    ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">

                                        <div class="product-item bg-light mb-4">
                                            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM
                                                    TÌM KIẾM:<?php echo $tukhoa ?></span></h2>
                                            <div class="product-img position-relative overflow-hidden">
                                                <a href="chitietsp.php?id=<?php echo $rs_giasp['id_sanpham'] ?>"><img style="height: 280px;" class="img-fluid w-100" src="../admincp/modules/quanlysp/uploads/<?php echo $rs_giasp['hinhanh'] ?>" alt=""></a>
                                                <div class="product-action">
                                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                                    <a class="btn btn-outline-dark btn-square" href="chitietsp.php?id=<?php echo $rs_giasp['id_sanpham'] ?>"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="text-center py-4">
                                                <a class="h6 text-decoration-none text-truncate" href=""><?php echo $rs_giasp['tensanpham'] ?></a>
                                                <div class="d-flex align-items-center justify-content-center mt-2">
                                                    <h5><strong> <?php echo number_format($rs_giasp['giasp'], 0, ',', '.') . 'vnđ' ?></strong></h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            <?php
                                                    }
                                                    }elseif(isset($_GET['idhangsx'])){
                                                        $id_hangsx=$_GET['idhangsx'];
                                                        $sql_hangsx = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_hangsx=$id_hangsx AND tbl_sanpham.tensanpham LIKE '%" . $tukhoa . "%'";
                                                        $query_hangsx = mysqli_query($mysqli, $sql_hangsx);
                                                        while ($rs_hangsx = mysqli_fetch_array($query_hangsx)){?>
                                                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                                        <div class="product-item bg-light mb-4">
                                                            <div class="product-img position-relative overflow-hidden">
                                                                <a href="chitietsp.php?id=<?php echo $rs_hangsx['id_sanpham'] ?>"><img style="height: 280px;" class="img-fluid w-100" src="../admincp/modules/quanlysp/uploads/<?php echo $rs_hangsx['hinhanh'] ?>" alt=""></a>
                                                                <div class="product-action">
                                                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                                                    <a class="btn btn-outline-dark btn-square" href="chitietsp.php?id=<?php echo $rs_hangsx['id_sanpham'] ?>"><i class="fa fa-search"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="text-center py-4">
                                                                <a class="h6 text-decoration-none text-truncate" href=""><?php echo $rs_hangsx['tensanpham'] ?></a>
                                                                <div class="d-flex align-items-center justify-content-center mt-2">
                                                                    <h5><strong> <?php echo number_format($rs_hangsx['giasp'], 0, ',', '.') . 'vnđ' ?></strong></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    <?php    
                                                    }
                                                    } ?>

                            </div>
                        </div>
                    <?php } else {
                    ?>
                        <?php
                        if (isset($_GET['minprice'])) {
                            $minprice = $_GET['minprice'];
                            $maxprice = $_GET['maxprice'];
                            $sql_giasp = "SELECT * FROM tbl_sanpham WHERE giasp>$minprice AND giasp<=$maxprice";
                            $query_giasp = mysqli_query($mysqli, $sql_giasp);
                            while ($rs_giasp = mysqli_fetch_array($query_giasp)) {
                        ?>

                                <div class="col-lg-4 col-md-6 col-sm-6 pb-1">

                                    <div class="product-item bg-light mb-4">

                                        <div class="product-img position-relative overflow-hidden">
                                            <a href="chitietsp.php?id=<?php echo $rs_giasp['id_sanpham'] ?>"><img style="height: 280px;" class="img-fluid w-100" src="../admincp/modules/quanlysp/uploads/<?php echo $rs_giasp['hinhanh'] ?>" alt=""></a>
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="chitietsp.php?id=<?php echo $rs_giasp['id_sanpham'] ?>"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href=""><?php echo $rs_giasp['tensanpham'] ?></a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5><strong> <?php echo number_format($rs_giasp['giasp'], 0, ',', '.') . 'vnđ' ?></strong></h5>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php
                            }
                        }elseif(isset($_GET['idhangsx'])){
                            $id_hangsx=$_GET['idhangsx'];
                            $sql_hangsx = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_hangsx=$id_hangsx";
                            $query_hangsx = mysqli_query($mysqli, $sql_hangsx);
                            while ($rs_hangsx = mysqli_fetch_array($query_hangsx)) {?>
                            <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                <div class="product-item bg-light mb-4">
                                    <div class="product-img position-relative overflow-hidden">
                                        <a href="chitietsp.php?id=<?php echo $rs_hangsx['id_sanpham'] ?>"><img style="height: 280px;" class="img-fluid w-100" src="../admincp/modules/quanlysp/uploads/<?php echo $rs_hangsx['hinhanh'] ?>" alt=""></a>
                                        <div class="product-action">
                                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                            <a class="btn btn-outline-dark btn-square" href="chitietsp.php?id=<?php echo $rs_hangsx['id_sanpham'] ?>"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="text-center py-4">
                                        <a class="h6 text-decoration-none text-truncate" href=""><?php echo $rs_hangsx['tensanpham'] ?></a>
                                        <div class="d-flex align-items-center justify-content-center mt-2">
                                            <h5><strong> <?php echo number_format($rs_hangsx['giasp'], 0, ',', '.') . 'vnđ' ?></strong></h5>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        <?php }
                        }
                         else { ?>

                            <?php
                            while ($rs = mysqli_fetch_array($query_lietke_sp)) {
                            ?>
                                <div class="col-lg-4 col-md-6 col-sm-6 pb-1">

                                    <div class="product-item bg-light mb-4">

                                        <div class="product-img position-relative overflow-hidden">
                                            <a href="chitietsp.php?id=<?php echo $rs['id_sanpham'] ?>"><img style="height: 280px;" class="img-fluid w-100" src="../admincp/modules/quanlysp/uploads/<?php echo $rs['hinhanh'] ?>" alt=""></a>
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="chitietsp.php?id=<?php echo $rs['id_sanpham'] ?>"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href=""><?php echo $rs['tensanpham'] ?></a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5><strong> <?php echo number_format($rs['giasp'], 0, ',', '.') . 'vnđ' ?></strong></h5>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                    <?php }
                        }
                    } ?>
                    <div class="col-12">
                    <style type="text/css">
                      ul.list_trang{
                          padding: 0;
                          margin : 0;
                          list-style: none;
                      }
                      ul.list_trang li{
                          float: left;
                          padding: 5px 13px;
                          margin :5px;
                          background: burlywood;
                      }
                      ul.list_trang li a{
                          text-align: center;
                          text-decoration: none;
                          color: #000;
                          display: block;
                      }
                </style>
                 <?php
                        $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
                        $row_count = mysqli_num_rows($sql_trang);
                        $trang = ceil($row_count/6);

                    ?>
                        <nav>
                            
                            <ul class="pagination justify-content-center">
                            <?php
                           for($i=1;$i<=$trang;$i++){
                      ?>
                                <li class="page-item active" ><a <?php if($i==$page){echo 'style="background : brown;"';}else{ echo '';}?>class="page-link" href="shop.php?trang=<?php echo $i?>"><?php echo $i?></a></li>
                      <?php
                           }
                      ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


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