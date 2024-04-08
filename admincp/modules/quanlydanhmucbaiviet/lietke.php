<?php
  $sql_lietke_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY thutu DESC";
  $query_lietke_danhmucbv = mysqli_query($mysqli,$sql_lietke_danhmucbv);

?>
<table class="table table-hover" style="margin-top: 45px;">
  <tr class="thead-dark">
      <th scope="col">Id</th>
      <th scope="col">Tên danh mục</th>
      <th scope="col">Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_danhmucbv)){
      $i++;
   ?> 
    <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
       <td>
           <a class="btn btn-outline-danger" href="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet']?>" role="button">Xóa</a>
           <a class="btn btn-outline-warning" href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet']?>"  role="button">Sửa</a>
       </td>
    </tr>
  <?php
  }
  ?>
</table>
