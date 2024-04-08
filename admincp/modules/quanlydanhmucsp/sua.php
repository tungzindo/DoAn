<?php
  $sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = '$_GET[iddanhmuc]' LIMIT 1";
  $query_sua_danhmucsp = mysqli_query($mysqli,$sql_sua_danhmucsp);

?>
<table class="table table-hover" style="margin-top: 45px;">
<form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
   <?php
   while($dong = mysqli_fetch_array($query_sua_danhmucsp)){
   ?> 
   <thead class="thead-dark">
    <tr>
      <th colspan="2">Sửa danh mục sản phẩm</th>
    </tr>
  </thead> 
<tr>
    <td>Tên danh mục</td>
    <td><input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $dong['tendanhmuc']?>"  name="tendanhmuc"></td>
  </tr>
  <tr>
    <td>Thứ tự</td>
    <td><input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $dong['thutu']?>" name="thutu"></td>
  </tr>
     <tr>
         <td colspan="2"><input class="btn btn-outline-warning" type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
     </tr>
     <?php
   }
   ?>
</form>
</table>
  