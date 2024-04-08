<?php
  $sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
  $query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);

?>
<table class="table table-hover" style="margin-top: 45px;">
  <tr class="thead-dark">
      <th scope="col">Id</th>
      <th scope="col">Tên danh mục</th>
      <th scope="col">Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
      $i++;
   ?> 
    <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $row['tendanhmuc'] ?></td>
       <td>
           <a class="btn btn-outline-danger" href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc']?>" role="button">Xóa</a>
           <a class="btn btn-outline-warning" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc']?>"  role="button">Sửa</a>
       </td>
    </tr>
  <?php
  }
  ?>
</table>
