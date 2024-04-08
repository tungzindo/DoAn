<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "web_mysqli1");
mysqli_set_charset($mysqli, "utf8");
$sql = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc  ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 8";
$query = mysqli_query($mysqli, $sql);
$sql_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc  ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 8";
$query_sp = mysqli_query($mysqli, $sql_sp);
$sql_danhmuc = "select * from tbl_danhmuc";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);

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
    <!--Start of Fchat.vn--><script type="text/javascript" src="https://cdn.fchat.vn/assets/embed/webchat.js?id=650171a1341a27076f759ee8" async="async"></script><!--End of Fchat.vn-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        
.contact-form button {
    width: 50%;
    padding: 10px;
    border: none;
    background: #1c87c9;
    font-size: 16px;
    font-weight: 400;
    color: #fff;
}

button:hover {
    background: #2371a0;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

button.button {
    background: none;
    border-top: none;
    outline: none;
    border-right: none;
    border-left: none;
    border-bottom: #02274a 1px solid;
    padding: 0 0 3px 0;
    font-size: 16px;
    cursor: pointer;
}

button.button:hover {
    border-bottom: #a99567 1px solid;
    color: #a99567;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }}
    </style>
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
                <?php
					if (empty($_SESSION['tk'])) {
					?>
						<button class="button" data-modal="modalOne">Đăng nhập</button>
                        <div id="modalOne" class="modal" style="display: none;position: fixed;z-index: 8;left: 0;top: 0;width: 100%;i4height: 100%;overflow: auto;background-color: rgb(0, 0, 0);background-color: rgba(0, 0, 0, 0.4);">
                        <div class="modal-content" style="margin: 50px auto;border: 1px solid #999;width: 40%;">
                            <div class="contact-form">
                            <a class="close">&times;</a>
                            <form  method="POST" style="padding: 25px;margin: 25px;box-shadow: 0 2px 5px #f5f5f5;background: #eee;">
                                <h2>Đăng nhập</h2>
                                <div>
                                <input class="fname" type="text" name="email" placeholder="Tên đăng nhập" style="width: 90%;padding: 10px;margin-bottom: 20px;border: 1px solid #1c87c9;outline: none;"/>
                                <input type="password" name="password" placeholder="Mật khẩu" style="width: 90%;padding: 10px;margin-bottom: 20px;border: 1px solid #1c87c9;outline: none;"/>
                                </div> 
                                <button type="submit" name="dangnhap" style="width: 20%;padding: 10px;border: none;background: #1c87c9;font-size: 16px;font-weight: 400;color: #fff;">Đăng nhập</button>
                                <?php
								if (isset($_POST['dangnhap'])) {
									$email = $_POST['email'];
									$matkhau = md5($_POST['password']);
									$sql = "SELECT * FROM tbl_dangky WHERE email='" . $email . "' AND matkhau='" . $matkhau . "' LIMIT 1";
									$row = mysqli_query($mysqli, $sql);
									$count = mysqli_num_rows($row);

									if ($count > 0) {
										$row_data = mysqli_fetch_array($row);
										$_SESSION['dangky'] = $row_data['tenkhachhang'];
										$_SESSION['id_khachhang'] = $row_data['id_dangky'];
										$_SESSION['tk'] = $row_data['email'];
                                        echo "<script>window.location.href='index.php'</script>";	
									} else {
                                        echo '<script>alert("Đăng nhập thất bại")</script>';
									}
								}
								?>
                            </form>
                            </div>
                        </div>
                        </div>
						<button class="button" data-modal="modalTwo" style="margin-left:25px">Đăng kí</button>
                        <div id="modalTwo" class="modal" style="display: none;position: fixed;z-index: 8;left: 0;top: 0;width: 100%;i4height: 100%;overflow: auto;background-color: rgb(0, 0, 0);background-color: rgba(0, 0, 0, 0.4);">
                        <div class="modal-content" style="margin: 50px auto;border: 1px solid #999;width: 40%;">
                            <div class="contact-form">
                            <a class="close">&times;</a>
                            <form method="POST" style="padding: 25px;margin: 25px;box-shadow: 0 2px 5px #f5f5f5;background: #eee;">
                                <h2>Đăng kí</h2>
                                <div>
                                <input type="text" name="hovaten" placeholder="Họ và tên" style="width: 90%;padding: 10px;margin-bottom: 20px;border: 1px solid #1c87c9;outline: none;"/>
                                <input type="password" name="dkpassword" placeholder="Mật khẩu" style="width: 90%;padding: 10px;margin-bottom: 20px;border: 1px solid #1c87c9;outline: none;"/>
                                <input type="text" name="dksdt" placeholder="Số Điện Thoại" style="width: 90%;padding: 10px;margin-bottom: 20px;border: 1px solid #1c87c9;outline: none;"/>
                                <input type="text" name="dkemail" placeholder="Email" style="width: 90%;padding: 10px;margin-bottom: 20px;border: 1px solid #1c87c9;outline: none;"/>
                            </div>
                                <button type="submit" name="dangky" style="width: 20%;padding: 10px;border: none;background: #1c87c9;font-size: 16px;font-weight: 400;color: #fff;">Đăng kí</button>
                                <?php
								if (isset($_POST['dangky'])) {
									$tenkhachhang = $_POST['hovaten'];
									$email = $_POST['dkemail'];
									$dienthoai = $_POST['dksdt'];
									$matkhau = md5($_POST['dkpassword']);
									$sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky(tenkhachhang,email,matkhau,dienthoai) VALUE('" . $tenkhachhang . "', '" . $email . "', '" . $matkhau . "', '" . $dienthoai . "')");
									if ($sql_dangky) {
										$_SESSION['dangky'] = $tenkhachhang;

										$_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
									}
									if ($sql_dangky) {
										echo "<script>window.location.href='index.php'</script>";
									} else{
                                        echo '<script>alert("Đăng ký thất bại")</script>';
                                    }
										
								}
								?>
                            </form>
                            </div>
                        </div>
                        
                        </div>
					<?php
					} else {
					?>
						<span style="color:black">Xin chào<span><span style="color:red"> <?php echo $_SESSION['dangky'] ?></span>
						<a href="?option=dangxuat" style="margin-left:10px"><span class="icon-edit"></span>Đăng xuất</a>
						<a href="#" style="margin-left:10px"><span class="icon-lock"></span>Thay đổi mật khẩu</a>
						<a href="cart.php" style="margin-left:10px"><span class="icon-shopping-cart"></span> Giỏ hàng <span class="badge badge-warning"> $</span></a>
					<?php
					}
					?>
                        </div>
                        
                    </div>
                    
                    <script>
                        let modalBtns = [...document.querySelectorAll(".button")];
                        modalBtns.forEach(function (btn) {
                            btn.onclick = function () {
                            let modal = btn.getAttribute("data-modal");
                            document.getElementById(modal).style.display = "block";
                            };
                        });
                        let closeBtns = [...document.querySelectorAll(".close")];
                        closeBtns.forEach(function (btn) {
                            btn.onclick = function () {
                            let modal = btn.closest(".modal");
                            modal.style.display = "none";
                            };
                        });
                        window.onclick = function (event) {
                            if (event.target.className === "modal") {
                            event.target.style.display = "none";
                            }
                        };
                    </script>
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
                <a href="" class="text-decoration-none">
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
                            <li><a style="color:black" href="index.php?id=<?php echo $rs_danhmuc['id_danhmuc'] ?>"><span class="nav-item nav-link"></span><?php echo $rs_danhmuc['tendanhmuc']; ?></a></li>
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
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"></span>
                            </a>
                            <a href="cart.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?php if(isset($_SESSION['count'])){
                                     echo $_SESSION['count'];
                                }else{
                                    echo 0;
                                }  ?></span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="images/anhnen/banner1.png" style="object-fit: cover;">

                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="images/anhnen/banner2.png" style="object-fit: cover;">

                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="images/anhnen/banner3.png" style="object-fit: cover;">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="images/anhnen/chuot-gaming.png" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Giảm giá 20%</h6>
                        <h3 class="text-white mb-3">Ưu đãi đặc biệt</h3>
                        <a href="" class="btn btn-primary">Mua ngay</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="images/anhnen/bpc.png" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Giảm giá 20%</h6>
                        <h3 class="text-white mb-3">Ưu đãi đặc biết</h3>
                        <a href="" class="btn btn-primary">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Sản phẩm chất lượng</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Giao hàng miễn phí</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Trả hàng trong 14 ngày</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7 </h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- -->

    <!-- Search Products--->
    <?php if (isset($_SESSION['goiy']['tukhoa'])) {
        $goiy = $_SESSION['goiy']['tukhoa'];
        $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%" . $goiy . "%'";
        $query_pro = mysqli_query($mysqli, $sql_pro);
    ?>
        <div class="container-fluid pt-5 pb-3">
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM
                    GỢI Ý HÔM NAY</span></h2>
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

                    </div><?php
                                        } ?>
            </div>
        </div>
    <?php unset($_SESSION['goiy']);
    }  ?>

<?php if (isset($_SESSION['goiy']['sanpham'])) {
        $id_danhmuc = $_SESSION['goiy']['sanpham'];
        $sqlsplienquan = "select * from tbl_sanpham where  id_danhmuc='$id_danhmuc'";
        $qrsplq = mysqli_query($mysqli, $sqlsplienquan) or die("Lỗi truy vấn");
    ?>
        <div class="container-fluid pt-5 pb-3">
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM
                    GỢI Ý HÔM NAY</span></h2>
            <div class="row px-xl-5"><?php
                                        while ($rs = mysqli_fetch_array($qrsplq)) {
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

                    </div><?php
                                        } ?>
            </div>
        </div>
    <?php unset($_SESSION['goiy']);
    }  ?>

    <!-- -->
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM NỔI BẬT</span></h2>
        <div class="row px-xl-5"><?php
        $spnoibat="SELECT *,COUNT(soluongmua) AS 'soluongmua' FROM
        tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham 
        GROUP BY tbl_sanpham.id_sanpham 
        ORDER BY soluongmua DESC LIMIT 8";
        $query_spnoibat = mysqli_query($mysqli, $spnoibat);
                                    while ($rs_spnoibat = mysqli_fetch_array($query_spnoibat)) {
                                    ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">

                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden" style="border-style: solid;">

                            <a href="chitietsp.php?id=<?php echo $rs_spnoibat['id_sanpham'] ?>"><img style="height: 280px;" class="img-fluid w-100" src="../admincp/modules/quanlysp/uploads/<?php echo $rs_spnoibat['hinhanh'] ?>" alt=""></a>
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="cart.php"><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href="chitietsp.php?id=<?php echo $rs_spnoibat['id_sanpham'] ?>"><i class="fa fa-search"></i></a>
                            </div>

                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href=""><?php echo $rs_spnoibat['tensanpham'] ?></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5><strong> <?php echo number_format($rs_spnoibat['giasp'], 0, ',', '.') . 'vnđ' ?></strong></h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                            <small>Đã bán:  <?php echo $rs_spnoibat['soluongmua'];?></small>
                            
                        </div>
                        </div>
                    </div>

                </div><?php
                                    } ?>
        </div>
    </div>
    <!-- Products End -->


    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="images/anhnen/chuot-gaming.png" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Giảm giá 20%</h6>
                        <h3 class="text-white mb-3">Ưu đãi đặc biệt</h3>
                        <a href="" class="btn btn-primary">Mua ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="images/anhnen/bpc.png" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Giảm giá 20%</h6>
                        <h3 class="text-white mb-3">Ưu đãi đặc biệt</h3>
                        <a href="" class="btn btn-primary">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM
                MỚI </span></h2>
        <div class="row px-xl-5"><?php
                                    while ($rs = mysqli_fetch_array($query)) {
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

                </div><?php
                                    }
                        ?>
        </div>
    </div>

    <!-- Products End -->


    <!-- Vendor Start -->
    <!-- <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-2.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-3.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-4.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-5.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-6.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-7.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Vendor End -->


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