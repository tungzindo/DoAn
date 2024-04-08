<?php
    session_start();
    $mysqli = new mysqli("localhost","root","","web_mysqli1");
    mysqli_set_charset($mysqli,"utf8");
    
    if(isset($_POST['danhgiasp'])){
        if(isset($_POST['danhgia']))
            $danhgia=$_POST['danhgia'];
        $id=$_GET['id'];
        if(isset($_POST['star1']))
            $star=1;
        elseif(isset($_POST['star2']))
            $star=2;
        elseif(isset($_POST['star3']))
            $star=3;
        elseif(isset($_POST['star4']))
            $star=4;
        else{
            $star=5;
        }
        if(isset($_SESSION['dangky'])){
            $id_khachhang=$_SESSION['id_khachhang'];
        } 
        $ngay=date("Y/m/d");
    }
    
     $sql="INSERT INTO tbl_rating(id_sanpham,rating,binhluan,id_khachhang,ngay) 
     VALUES($id,$star,'".$danhgia."',$id_khachhang,'".$ngay."')";
     $query=mysqli_query($mysqli,$sql);
     header("location:chitietsp.php?id=$id");
