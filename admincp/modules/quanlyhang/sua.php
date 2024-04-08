<?php
  $sql_sua_hangsx = "SELECT * FROM tbl_hangsx WHERE id_hangsx = '$_GET[idhangsx]' LIMIT 1";
  $query_sua_hangsx = mysqli_query($mysqli,$sql_sua_hangsx);

?>
<table class="table table-hover" style="margin-top: 45px;">
<form method="POST" action="modules/quanlyhang/xuly.php?idhangsx=<?php echo $_GET['idhangsx']?>">
   <?php
   while($dong = mysqli_fetch_array($query_sua_hangsx)){
   ?> 
   <thead class="thead-dark">
    <tr>
      <th colspan="2">Sửa hãng sản xuất</th>
    </tr>
  </thead> 
<tr>
    <td>Tên hãng sản xuất</td>
    <td><input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $dong['tenhangsx']?>"  name="tenhangsx"></td>
  </tr>
     <tr>
         <td colspan="2"><input class="btn btn-outline-warning" type="submit" name="suahangsx" value="Sửa hãng sản xuất"></td>
     </tr>
     <?php
   }
   ?>
</form>
</table>
  