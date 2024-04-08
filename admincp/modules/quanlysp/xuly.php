<?php
include('../../config/config.php');

$tensanpham = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$soluong = $_POST['soluong'];
//xuly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];


if(isset($_POST['themsanpham'])){
	//them
	$sql_them = "INSERT INTO tbl_sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) VALUE('".$tensanpham."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";
	mysqli_query($mysqli,$sql_them);
	move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
	header('Location:../../index.php?action=quanlysp&query=lietke');
}elseif(isset($_POST['suasanpham'])){
	//sua
	$tensanpham = $_POST['tensanpham'];
	$masp = $_POST['masp'];
	$giasp = $_POST['giasp'];
	$soluong = $_POST['soluong'];
	//xuly hinh anh
	$hinhanh = $_FILES['hinhanh']['name'];
	$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
	$tomtat = $_POST['tomtat'];
	$noidung = $_POST['noidung'];
	$tinhtrang = $_POST['tinhtrang'];
	$danhmuc = $_POST['danhmuc'];
	$hangsx=$_POST['hangsx'];
	if(!empty($_FILES['hinhanh']['name'])){
		move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
		//xoa hinh anh cu
		$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		while($row = mysqli_fetch_array($query)){
			unlink('uploads/'.$row['hinhanh']);
		}
		$sql= "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."',hinhanh = '$hinhanh',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."',id_hangsx='".$hangsx."' where id_sanpham='$_GET[idsanpham]'" ;
		$qr = mysqli_query($mysqli,$sql) or die ("Lỗi truy vấn");
	}else{
		$sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."',id_hangsx='".$hangsx."' WHERE id_sanpham='$_GET[idsanpham]'";
		mysqli_query($mysqli,$sql_update);
	}
	
		header('Location:../../index.php?action=quanlysp&query=lietke');
}else{
	$id=$_GET['idsanpham'];
	$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
	$query = mysqli_query($mysqli,$sql);
	while($row = mysqli_fetch_array($query)){
		unlink('uploads/'.$row['hinhanh']);
	}
	$sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlysp&query=lietke');
}

?>