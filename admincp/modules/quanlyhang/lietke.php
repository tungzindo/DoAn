<?php
  $sql_lietke_hangsx = "SELECT * FROM tbl_hangsx ";
  $query_lietke_hangsx = mysqli_query($mysqli,$sql_lietke_hangsx);

?>
<table class="table table-hover" style="margin-top: 45px;">
  <tr class="thead-dark">
      <th scope="col">Id</th>
      <th scope="col">Tên hãng</th>
      <th scope="col">Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_hangsx)){
      $i++;
   ?> 
    <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $row['tenhangsx'] ?></td>
       <td>
           <a class="btn btn-outline-danger" href="modules/quanlyhang/xuly.php?idhangsx=<?php echo $row['id_hangsx']?>" role="button">Xóa</a>
           <a class="btn btn-outline-warning" href="?action=quanlyhang&query=sua&idhangsx=<?php echo $row['id_hangsx']?>"  role="button">Sửa</a>
       </td>
    </tr>
  <?php
  }
  ?>
</table>
