<?php
  $sql_sua_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet WHERE id_baiviet = '$_GET[idbaiviet]' LIMIT 1";
  $query_sua_danhmucbv = mysqli_query($mysqli,$sql_sua_danhmucbv);

?>
<table class="table table-hover" style ="margin-top: 45px;" >
<form method="POST" action="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>">
  <?php
        while($dong = mysqli_fetch_array($query_sua_danhmucbv)){
  ?>
  <thead class="thead-dark">
    <tr>
      <th colspan="2" >Sửa danh mục bài viết</th>
    </tr>
  </thead>
  <tr>
    <td>Tên danh mục bài viết</td>
    <td><input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $dong['tendanhmuc_baiviet']?>" name="tendanhmucbaiviet"></td>
  </tr>
  <tr>
    <td>Thứ tự</td>
    <td><input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $dong['thutu']?>" name="thutu"></td>
  </tr>
     <tr>
         <td colspan="2"><input class="btn btn-outline-warning" type="submit" name="suadanhmucbaiviet" value="Sửa danh mục bài viết"></td>
     </tr>
    <?php
        }
    ?>
</form>
</table>
  