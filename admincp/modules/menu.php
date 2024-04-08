
<!-- <ul class="list-group">
    <li ><a href="index.php?action=quanlydanhmucsanpham&query=them" class="list-group-item list-group-item-action active"> Quản lý danh mục sản phẩm</a></li> 
    <li ><a href="index.php?action=quanlysp&query=them" class="list-group-item list-group-item-action active"> Quản lý sản phẩm</a></li>
    <li ><a href="index.php?action=quanlydanhmucbaiviet&query=them" class="list-group-item list-group-item-action active"> Quản lý danh mục bài viết</a></li>
    <li ><a href="index.php?action=quanlybaiviet&query=them" class="list-group-item list-group-item-action active"> Quản lý bài viết</a></li>
    <li ><a href="index.php?action=quanlydonhang&query=lietke" class="list-group-item list-group-item-action active"> Quản lý đơn hàng</a></li>
</ul> -->

<!-- <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
    Menu</a>
  <a href="index.php?action=quanlydanhmucsanpham&query=them" class="list-group-item list-group-item-action">Quản lý danh mục sản phẩm</a>
  <a href="index.php?action=quanlysp&query=them" class="list-group-item list-group-item-action">Quản lý sản phẩm</a>
  <a href="index.php?action=quanlydanhmucbaiviet&query=them" class="list-group-item list-group-item-action">Quản lý danh mục bài viết</a>
  <a href="index.php?action=quanlybaiviet&query=them" class="list-group-item list-group-item-action disabled">Quản lý bài viết</a>
  <a href="index.php?action=quanlydonhang&query=lietke" class="list-group-item list-group-item-action disabled">Quản lý đơn hàng</a>
</div> -->


<!-- <?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
          unset($_SESSION['dangnhap']);
          header('Location:login.php');
      }
      mysqli_set_charset($mysqli,"utf8");
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="margin-top: 45px;">
 <div class="container-fluid">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="main_nav">
  <ul class="navbar-nav">
    <li class="nav-item active" style="border: 1px solid beige;border-radius: 6px;margin: 2px;"> <a  class="btn btn-outline-primary" href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm </a> </li>
    <li class="nav-item active" style="border: 1px solid beige;border-radius: 6px;margin: 2px;"> <a class="btn btn-outline-primary" href="index.php?action=quanlysp&query=them">Quản lý sản phẩm </a> </li>
    <li class="nav-item active" style="border: 1px solid beige;border-radius: 6px;margin: 2px;"> <a class="btn btn-outline-primary" href="index.php?action=quanlydanhmucbaiviet&query=them">Quản lý danh mục bài viết </a> </li>
    <li class="nav-item active" style="border: 1px solid beige;border-radius: 6px;margin: 2px;"> <a class="btn btn-outline-primary" href="index.php?action=quanlybaiviet&query=them">Quản lý bài viết </a> </li>
    <li class="nav-item active" style="border: 1px solid beige;border-radius: 6px;margin: 2px;"> <a class="btn btn-outline-primary" href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng </a> </li>
    <li class="nav-item active" style="border: 1px solid beige;border-radius: 6px;margin: 2px;"> <a  class="btn btn-outline-primary" href="index.php?dangxuat=1">Đăng xuất :<?php if(isset($_SESSION['dangnhap'])){
        echo $_SESSION['dangnhap'];
        }?></a> </li>
  </ul>
  </div> 
 </div> 
</nav> -->


<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="float: left;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-dragon"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><span>Hello:<?php if(isset($_SESSION['dangnhap'])){
                                              echo $_SESSION['dangnhap'];
                                              }?></span></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <<!-- li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-scroll"></i>
                    <span>QL danh mục sản phẩm</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý:</h6>
                        <a class="collapse-item" href="index.php?action=quanlydanhmucsanpham&query=them">Thêm </a>
                        <a class="collapse-item" href="index.php?action=quanlydanhmucsanpham&query=lietke">Liệt Kê </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-book"></i>
                    <span>QL danh mục bài viết</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý:</h6>
                        <a class="collapse-item" href="index.php?action=quanlydanhmucbaiviet&query=them">Thêm </a>
                        <a class="collapse-item" href="index.php?action=quanlydanhmucbaiviet&query=lietke">Liệt Kê </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fab fa-phoenix-framework"></i>
                    <span>QL sản phẩm</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý:</h6>
                        <a class="collapse-item" href="index.php?action=quanlysp&query=them">Thêm </a>
                        <a class="collapse-item" href="index.php?action=quanlysp&query=lietke">Liệt Kê </a>
                        <a class="collapse-item" href="index.php?action=quanlyhang&query=them">Thêm hãng SX</a>
                        <a class="collapse-item" href="index.php?action=quanlyhang&query=lietke">Liệt Kê hãng SX</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-book-reader"></i>
                    <span>QL bài viết</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý:</h6>
                        <a class="collapse-item" href="index.php?action=quanlybaiviet&query=them">Thêm </a>
                        <a class="collapse-item" href="index.php?action=quanlybaiviet&query=lietke">Liệt Kê </a>
                    </div>
                </div>
            </li>

            
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-shopping-cart"></i>
                    <span>QL đơn hàng</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý:</h6>
                        <a class="collapse-item" href="index.php?action=quanlydonhang&query=lietke">Liệt Kê </a>
                    </div>
                </div>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-chart-line"></i>
                    <span>Biểu đồ</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="?action=quanlysp&query=bieudosp">Biểu đồ sản phẩm</a>
                        <a class="collapse-item" href="?action=quanlysp&query=bieudoslgsp">Biểu đồ số lượng SP đã bán</a>
                        <!-- <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <a class="btn btn-outline-primary" href="?action=quanlysp&query=bieudosp" style="margin-right: 5px; margin-top: 45px;" role="button">Biểu đồ</a>
<a class="btn btn-outline-primary" href="?action=quanlysp&query=bieudoslgsp" style="margin-top: 45px;" role="button">Biểu đồ số lượng SP đã bán</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a> -->
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>Welcome to</strong> the admin page!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"action="index.php?quanly=timkiem" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2" name="tukhoa" >
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" name="tukhoa" value="Tìm kiếm">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button" >
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <?php
                                if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
                                      unset($_SESSION['dangnhap']);
                                      header('Location:login.php');
                                  }
                            ?>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="index.php?dangxuat=1" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php if(isset($_SESSION['dangnhap'])){
                                              echo $_SESSION['dangnhap'];
                                              }?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/avatar.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" style="margin-top: -15px;">
                      <?php
                             if(isset($_GET['action']) && $_GET['query']){
                                $tam = $_GET['action'];
                                $query = $_GET['query'];
                            }
                              else{
                                  $tam = '';
                                  $query ='';
                              }
                              if($tam=='quanlydanhmucsanpham' && $query=='lietke')
                              { 
                                include("modules/quanlydanhmucsp/lietke.php");  
                              }
                              elseif($tam=='quanlydanhmucsanpham' && $query=='sua'){
                                  include("modules/quanlydanhmucsp/sua.php");
                              }
                              elseif($tam=='quanlydanhmucsanpham' && $query=='them'){
                                  include("modules/quanlydanhmucsp/them.php");
                              }
                              elseif($tam=='quanlysp' && $query=='bieudosp'){
                                  include("modules/quanlysp/bieudosp.php");
                              }
                              elseif($tam=='quanlysp' && $query=='bieudoslgsp'){
                                  include("modules/quanlysp/bieudoslgsp.php");
                              }
                              elseif($tam=='quanlysp' && $query=='them'){
                                  include("modules/quanlysp/them.php"); 
                              }
                              elseif($tam=='quanlysp' && $query=='sua'){
                                  include("modules/quanlysp/sua.php");
                              }
                              elseif($tam=='quanlysp' && $query=='lietke'){
                                  include("modules/quanlysp/lietke.php");
                              }
                              elseif($tam=='quanlydonhang' && $query=='lietke'){
                                  include("modules/quanlydonhang/lietke.php");
                              }
                              elseif($tam=='donhang' && $query=='xemdonhang'){
                                  include("modules/quanlydonhang/xemdonhang.php");
                              }
                              elseif($tam=='quanlydanhmucbaiviet' && $query=='them'){
                                  include("modules/quanlydanhmucbaiviet/them.php");
                                  
                              }
                              elseif($tam=='quanlydanhmucbaiviet' && $query=='sua'){
                                  include("modules/quanlydanhmucbaiviet/sua.php");
                              }
                              elseif($tam=='quanlydanhmucbaiviet' && $query=='lietke'){
                                  include("modules/quanlydanhmucbaiviet/lietke.php");
                              }
                              elseif($tam=='quanlybaiviet' && $query=='them'){
                                  include("modules/quanlybaiviet/them.php");
                              }
                              elseif($tam=='quanlybaiviet' && $query=='sua'){
                                  include("modules/quanlybaiviet/sua.php");
                              }
                              elseif($tam=='quanlybaiviet' && $query=='lietke'){
                                  include("modules/quanlybaiviet/lietke.php");
                              }
                              elseif($tam=='timkiem' ){
                                  include("modules/quanlysp/timkiem.php");
                              }
                              elseif($tam=='quanlyhang' && $query=='them'){
                                include("modules/quanlyhang/them.php");
                                
                            }
                            elseif($tam=='quanlyhang' && $query=='sua'){
                                include("modules/quanlyhang/sua.php");
                            }
                            elseif($tam=='quanlyhang' && $query=='lietke'){
                                include("modules/quanlyhang/lietke.php");
                            }
                              else
                              {
                                  include("modules/dashboard.php");
                              }

                              
                              ?>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
             <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                        <p class="footer_copyright">Copyright © 2021 EPU Trường Đại Học Điện Lực - Khoa Công Nghệ Thông Tin
                            <br>Sinh viên thực hiện : Hoàng Anh Đức - D14CNPM2 -19810310068
                            <br>Sinh viên thực hiện : Chử Anh Tiến - D14CNPM2 -19810310105
                            <br>Sinh viên thực hiện : Nguyễn Thanh Tùng - D14CNPM2 -1981031010181
                    </p>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                 <?php
                                if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
                                      unset($_SESSION['dangnhap']);
                                      header('Location:login.php');
                                  }
                            ?>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="index.php?dangxuat=1">Logout</a>
                </div>
            </div>
      </div> 
