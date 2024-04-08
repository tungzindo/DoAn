<?php
	$sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
	$query_sua_sp = mysqli_query($mysqli,$sql_sua_sp);
?>
<table  class="table table-hover" style="margin-top:45px;">
<?php
while($row = mysqli_fetch_array($query_sua_sp)) {
?>
 <form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" enctype="multipart/form-data">
 	   <thead class="thead-dark">
		    <tr>
		      <th colspan="2">Sửa sản phẩm</th>
		    </tr>
  	  </thead>
	  <tr>
	  	<td>Tên sản phẩm</td>
	  	<td><input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $row['tensanpham'] ?>" name="tensanpham"></td>
	  </tr>
	   <tr>
	  	<td>Mã sp</td>
	  	<td><input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $row['masp'] ?>" name="masp"></td>
	  </tr>
	  <tr>
	  	<td>Giá sp</td>
	  	<td><input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $row['giasp'] ?>" name="giasp"></td>
	  </tr>
	  <tr>
	  	<td>Số lượng</td>
	  	<td><input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $row['soluong'] ?>" name="soluong"></td>
	  </tr>
	   <tr>
	  	<td>Hình ảnh</td>
	  	<td>
	  		<input type="file" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="hinhanh">
	  		<img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px">
	  	</td>

	  </tr>
	  <tr>
	  	<td>Tóm tắt</td>
	  	<td><textarea rows="10"  name="tomtat" style="resize: none"><?php echo $row['tomtat'] ?></textarea></td>
	  </tr>
	   <tr>
	  	<td>Nội dung</td>
	  	<td><textarea rows="10"  name="noidung" style="resize: none"><?php echo  $row['noidung'] ?></textarea></td>
	  </tr>
	  <tr>
	    <td>Danh mục sản phẩm</td>
	    <td>
	    	<select name="danhmuc">
	    		<?php
	    		$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
	    		$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
	    		while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
	    			if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
	    		?>
	    		<option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
	    		<?php
	    			}else{
	    		?>
	    		<option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
	    		<?php
	    			}
	    		} 
	    		?>
	    	</select>
	    </td>
	  </tr>
	  <tr>
	    <td>Hãng sản xuất</td>
	    <td>
	    	<select name="hangsx">
	    		<?php
	    		$sql_hangsx = "SELECT * FROM tbl_hangsx ORDER BY id_hangsx DESC";
	    		$query_hangsx = mysqli_query($mysqli,$sql_hangsx);
	    		while($row_hangsx = mysqli_fetch_array($query_hangsx)){
	    			if($row_hangsx['id_hangsx']==$row['id_hangsx']){
	    		?>
	    		<option selected value="<?php echo $row_hangsx['id_hangsx'] ?>"><?php echo $row_hangsx['tenhangsx'] ?></option>
	    		<?php
	    			}else{
	    		?>
	    		<option value="<?php echo $row_hangsx['id_hangsx'] ?>"><?php echo $row_hangsx['tenhangsx'] ?></option>
	    		<?php
	    			}
	    		} 
	    		?>
	    	</select>
	    </td>
	  </tr>
	  <tr>
	    <td>Tình trạng</td>
	    <td>
	    	<select name="tinhtrang">
	    		<?php
	    		if($row['tinhtrang']==1){ 
	    		?>
	    		<option value="1" selected>Kích hoạt</option>
	    		<option value="0">Ẩn</option>
	    		<?php
	    		}else{ 
	    		?>
	    		<option value="1">Kích hoạt</option>
	    		<option value="0" selected>Ẩn</option>
	    		<?php
	    		} 
	    		?>

	    	</select>
	    </td>
	  </tr>
	   <tr>
	    <td colspan="2"><input class="btn btn-outline-warning" type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
	  </tr>
 </form>
 <?php
 } 
 ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
           CKEDITOR.replace( 'tomtat' );
           CKEDITOR.replace( 'noidung' );
    </script> 
</table>