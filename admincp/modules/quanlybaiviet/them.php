<table class="table table-hover" style="margin-top:45px;">
 <form method="POST" action="modules/quanlybaiviet/xuly.php" enctype="multipart/form-data">
 	<thead class="thead-dark">
    <tr>
      <th colspan="2" >Thêm bài viết</th>
    </tr>
  </thead>
	  <tr>
	  	<td>Tên bài viết</td>
	  	<td><input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="tenbaiviet"></td>
	  </tr>
	   <tr>
	  	<td>Hình ảnh</td>
	  	<td><input type="file" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="hinhanh"></td>
	  </tr>
	  <tr>
	  	<td>Tóm tắt</td>
	  	<td><textarea rows="10"  name="tomtat" style="resize: none"></textarea></td>
	  </tr>
	   <tr>
	  	<td>Nội dung</td>
	  	<td><textarea rows="10"  name="noidung" style="resize: none"></textarea></td>
	  </tr>
	  <tr>
	    <td>Danh mục bài viết</td>
	    <td>
	    	<select name="danhmuc">
	    		<?php
	    		$sql_danhmuc = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
	    		$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
	    		while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
	    		?>
	    		<option value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
	    		<?php
	    		} 
	    		?>
	    	</select>
	    </td>
	  </tr>
	  <tr>
	    <td>Tình trạng</td>
	    <td>
	    	<select name="tinhtrang">
	    		<option value="1">Kích hoạt</option>
	    		<option value="0">Ẩn</option>
	    	</select>
	    </td>
	  </tr>
	   <tr>
	    <td colspan="2"><input class="btn btn-outline-success" type="submit" name="thembaiviet" value="Thêm bài viết"></td>
	  </tr>
 </form>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
           CKEDITOR.replace( 'tomtat' );
           CKEDITOR.replace( 'noidung' );
    </script> 
</table>