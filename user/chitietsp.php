<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "web_mysqli1");
mysqli_set_charset($mysqli, "utf8");
$id = $_GET['id'];
$sql_danhmuc = "select * from tbl_danhmuc";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
$sql = "select * from tbl_sanpham where id_sanpham= '$id'";
$qr = mysqli_query($mysqli, $sql) or die("Lỗi truy vấn");
$rs = mysqli_fetch_array($qr);
$dmsplienquan = $rs['id_danhmuc'];
$sqlsplienquan = "select * from tbl_sanpham where id_sanpham not IN ('$id') AND id_danhmuc='$dmsplienquan'";
$qrsplq = mysqli_query($mysqli, $sqlsplienquan) or die("Lỗi truy vấn");

$sql_comment = "SELECT DISTINCT tenkhachhang,ngay,binhluan FROM tbl_dangky,tbl_rating WHERE tbl_dangky.id_dangky=tbl_rating.id_khachhang AND tbl_rating.id_sanpham=$id";
$query_comment = mysqli_query($mysqli, $sql_comment);

$_SESSION['goiy']['sanpham']=$rs['id_danhmuc'];

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
                <p class="m-0">Liên hệ</p>
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
                        <span class="h1 text-uppercase text-dark bg-light px-2">TNC</span>
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
                    <a class="breadcrumb-item text-dark" href="#">Sản phẩm</a>
                    <span class="breadcrumb-item active"><?php echo $rs['tensanpham'] ?></span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <form method="POST" action="themgiohang.php?id=<?php echo $rs['id_sanpham']; ?>">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner bg-light">
                            <div class="carousel-item active">
                                <img class="w-100 h-100" src="../admincp/modules/quanlysp/uploads/<?php echo $rs['hinhanh'] ?>" alt="Image">
                            </div>
                        </div>
                        <!-- <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a> -->
                    </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?php echo $rs['tensanpham'] ?></h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4"><?php $rs['giasp'] ?></span></h3>
                    <p class="mb-4"><?php echo $rs['tomtat'] ?></p>
                    <h4>Số hàng trong kho: <?php echo $rs['soluong'] ?> sản phẩm</h4>
                    <?php if($rs['soluong']>0){?>
                    <h4 style="color:#00DD00;">Tình trạng : Còn hàng</h4><br>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        
                        <button class="btn btn-primary px-3" type="submit" name="themgiohang"><i class="fa fa-shopping-cart mr-1"></i> Thêm giỏ hàng</button>
                    </div>
                    <?php }else{ ?>
                        <h4 style="color:red;">Tình trạng : Hết hàng</h4><br>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        
                        <button class="btn btn-primary px-3" type="submit" name="themgiohang" disabled><i class="fa fa-shopping-cart mr-1"></i> Thêm giỏ hàng</button>
                    </div>
                  <?php  } ?>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div></form>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Thông số kỹ thuật </a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Thông tin sản phẩm</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews sản phẩm</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3" style="font-size: 14px;"><?php echo $rs['noidung'] ?></h4>

                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3"></h4>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">Đánh giá từ khách hàng</h4>
                                    <?php
								$sql_comment = "SELECT DISTINCT tenkhachhang,ngay,binhluan,rating FROM tbl_dangky,tbl_rating WHERE tbl_dangky.id_dangky=tbl_rating.id_khachhang AND tbl_rating.id_sanpham=$id";
                                $query_comment = mysqli_query($mysqli, $sql_comment);
                                while ($rs_comment = mysqli_fetch_array($query_comment)) {
								?>
                                    <div class="media mb-4">
                                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6><?php echo $rs_comment['tenkhachhang'] ?><small> - <i><?php echo $rs_comment['ngay'] ?></i></small></h6>
                                            
                                            <div class="text-primary mb-2">
                                                <?php for($i=0;$i<$rs_comment['rating'];$i++){?>
                                                <i class="fas fa-star"></i>
                                                <?php } ?>
                                            </div>
                                            
                                            <p><?php echo $rs_comment['binhluan'] ?></p>
                                        </div>
                                    </div>
                                    <?php  } ?>
                                </div>
                                <div class="col-md-6">
                                    <style>
                                        /* Rating Star Widgets Style */
                                        .rating-stars ul {
                                        list-style-type:none;
                                        padding:0;
                                        
                                        -moz-user-select:none;
                                        -webkit-user-select:none;
                                        }
                                        .rating-stars ul > li.star {
                                        display:inline-block;
                                        
                                        }

                                        /* Idle State of the stars */
                                        .rating-stars ul > li.star > i.fa {
                                        font-size:2.5em; /* Change the size of the stars */
                                        color:#ccc; /* Color on idle state */
                                        }

                                        /* Hover state of the stars */
                                        .rating-stars ul > li.star.hover > i.fa {
                                        color:#FFCC36;
                                        }

                                        /* Selected state of the stars */
                                        .rating-stars ul > li.star.selected > i.fa {
                                        color:#FF912C;
                                        }

                                    </style>
                                    <h4 class="mb-4">Đánh giá sản phẩm</h4>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Đánh giá sao :</p>
                                        <form method="POST" action="danhgia.php?id=<?php echo $rs['id_sanpham'] ?>">
										<!-- Rating Stars Box -->
                                        <div class='rating-stars text-center'>
                                            <ul id='stars'>
                                            <li class='star' title='Poor' data-value='1' name="star1">
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='Fair' data-value='2' name="star2">
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='Good' data-value='3' name="star3">
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='Excellent' data-value='4' name="star4">
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='WOW!!!' data-value='5' name="star5">
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            </ul>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label for="message">Đánh giá của bạn*</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control" name="danhgia" required></textarea>
                                        </div>
                                        <?php
											if (isset($_SESSION['dangky'])) {
												$id_khachhang = $_SESSION['id_khachhang'];
												$sql_check = "SELECT * FROM tbl_rating WHERE id_khachhang=$id_khachhang AND id_sanpham=$id";
												$row_check = mysqli_query($mysqli, $sql_check);
												$count_check = mysqli_num_rows($row_check);
												if ($count_check > 0) {
													echo "Bạn đã đánh giá cho sản phẩm này rồi!";
												} else {
											?>
													<input type="submit" value="Gửi" name="danhgiasp" class="btn btn-primary px-3">
												<?php
												} ?>
											<?php	} else {
												echo "Bạn chưa đăng nhập vào hệ thống. Vui lòng <a href='index.php'>Đăng nhập</a> hoặc <a href='index.php'>Đăng kí</a>";
											?>
												<!-- <p><a class="btn btn-outline-info" href="register.php">Gửi</a></p> -->
											<?php
											}

											?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản phẩm liên quan</span></h2>
        <div class="row px-xl-5">
        <div class="col">
        <div class="owl-carousel related-carousel">
        <?php
            while ($rs_sp = mysqli_fetch_array($qrsplq)) {
            ?>
            <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="../admincp/modules/quanlysp/uploads/<?php echo $rs_sp['hinhanh'] ?>" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="cart.php"><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href="chitietsp.php?id=<?php echo $rs_sp['id_sanpham'] ?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href=""><?php echo $rs_sp['tensanpham'] ?></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5><strong> <?php echo number_format($rs_sp['giasp'], 0, ',', '.') . 'vnđ' ?></strong></h5><h6 class="text-muted ml-2"><del></del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
            </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
    


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
    <script>
        $(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    responseMessage(msg);
    
  });

  
});


function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}
    </script>
</body>

</html>