
<?php
      if(isset($_GET['trang'])){
        $page = $_GET['trang'];
      }else{
        $page = 1;
      }
      if($page== '' || $page ==1){
        $begin = 0;
      }else{
        $begin = ($page*5)-5;
      }
        $sql_lietke_bv = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc=tbl_danhmucbaiviet.id_baiviet ORDER BY tbl_baiviet.id DESC LIMIT $begin,5";
        $query_lietke_bv = mysqli_query($mysqli,$sql_lietke_bv);
?>
<table class="table table-hover" style="margin-top:45px;">
  <tr class="thead-dark">
  	<th scope="col">Id</th>
    <th scope="col">Tên bài viết</th>
    <th scope="col">Hình ảnh</th>
    <th scope="col">Danh mục</th>
    <th scope="col">Tóm tắt</th>
    <th scope="col">Trạng thái</th>
  	<th scope="col">Quản lý</th>
  
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_bv)){
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['tenbaiviet'] ?></td>
    <td><img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php if($row['tinhtrang']==1){
        echo 'Kích hoạt';
      }else{
        echo 'Ẩn';
      } 
      ?>
      
    </td>
   	<td>
        <li style="list-style: none;">
          <a class="btn btn-outline-danger" href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>" role="button">Xóa</a>
        </li>
         <li style="list-style: none;">
           <a class="btn btn-outline-warning" href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id'] ?>" style="margin-top: 5px;" role="button">Sửa</a>
         </li>
   	</td>
   
  </tr>
  <?php
  } 
  ?>
 
</table>
<div style="clear:both;"></div>
                  <style type="text/css">
                      ul.list_trang{
                          padding: 0;
                          margin : 0;
                          list-style: none;
                      }
                      ul.list_trang li{
                          float: left;
                          padding: 5px 13px;
                          margin :5px;
                          background: burlywood;
                      }
                      ul.list_trang li a{
                          text-align: center;
                          text-decoration: none;
                          color: #000;
                          display: block;
                      }
                </style>
                  <p>Trang : </p>
                  <?php
                        $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_baiviet");
                        $row_count = mysqli_num_rows($sql_trang);
                        $trang = ceil($row_count/5);

                    ?>
                  <ul class="list_trang">
                      <?php
                           for($i=1;$i<=$trang;$i++){
                      ?>
                      <li <?php if($i==$page){echo 'style="background : brown;"';}else{ echo '';}?>><a href="index.php?action=quanlybaiviet&query=lietke&trang=<?php echo $i?>"><?php echo $i?></a></li>
                      <?php
                           }
                      ?>
                  </ul> 