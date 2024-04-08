<?php
include('../../config/config.php');
  $tenhangsx = $_POST['tenhangsx'];
  $thutu = $_POST['thutu'];
  if(isset($_POST['themhangsx'])){
      $sql_them = "INSERT INTO tbl_hangsx(tenhangsx) VALUE('".$tenhangsx."')";
      mysqli_query($mysqli,$sql_them);
      header('Location:../../index.php?action=quanlyhang&query=lietke');
  }elseif(isset($_POST['suahangsx'])){
    $sql_update = "UPDATE tbl_hangsx SET tenhangsx='".$tenhangsx."' WHERE id_hangsx='$_GET[idhangsx]'";
    mysqli_query($mysqli,$sql_update);
    header('Location:../../index.php?action=quanlyhang&query=lietke');
  }
  else
  {
      $id = $_GET['idhangsx'];
      $sql_xoa = "DELETE FROM tbl_hangsx WHERE id_hangsx='".$id."'";
      mysqli_query($mysqli,$sql_xoa);
      header('Location:../../index.php?action=quanlyhang&query=lietke');
  }

?>