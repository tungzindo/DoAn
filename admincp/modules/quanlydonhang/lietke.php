<?php
if(isset($_GET['trang'])){
  $page = $_GET['trang'];
}else{
  $page = 1;
}
if($page== '' || $page ==1){
  $begin = 0;
}else{
  $begin = ($page*10)-10;
}
  $sql_lietke_dh = "SELECT * FROM tbl_cart  ORDER BY tbl_cart.id_khachhang DESC LIMIT $begin,10";
  $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);

?>
<table class="table table-hover" style="margin-top: 45px;">
  <tr class="thead-dark">
    <th scope="col">Id</th>
    <th scope="col">Mã đơn hàng</th>
    <th scope="col">Tên khách hàng</th>
    <th scope="col">Địa chỉ</th>
    <th scope="col">Email</th>
    <th scope="col">Số điện thoại</th>
    <th scope="col">Hình thức thanh toán</th>
    <th scope="col">Tình trạng</th>
    <th scope="col">Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
      $i++;
   ?> 
    <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $row['code_cart'] ?></td>
       <td><?php echo $row['full_name'] ?></td>
       <td><?php echo $row['diachi'] ?></td>
       <td><?php echo $row['email'] ?></td>
       <td><?php echo $row['sdt'] ?></td>
       <td><?php echo $row['cart_payment'] ?></td>
       <td>
           <?php
               if($row['cart_status']==1){
                   echo '<li style="list-style: none;">
                          <a class="btn btn-outline-danger" href="modules/quanlydonhang/xuly.php?code='.$row['code_cart'].'" role="button">Đơn hàng mới</a>
                         </li>';
               }else{
                   echo '<li style="list-style: none;>
                            <a class="btn btn-outline-warning" href="modules/quanlydonhang/xuly.php?code='.$row['code_cart'].'" role="button">Đã xem</a>
                        </li>';
               }
           ?>
       </td>
       <td>
           <li style="list-style: none;">
              <a class="btn btn-outline-secondary" href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart']?>" role="button">Xem đơn hàng</a> 
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
                        $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky ORDER BY tbl_cart.id_khachhang DESC");
                        $row_count = mysqli_num_rows($sql_trang);
                        $trang = ceil($row_count/10);

                    ?>
                  <ul class="list_trang">
                      <?php
                           for($i=1;$i<=$trang;$i++){
                      ?>
                      <li <?php if($i==$page){echo 'style="background : brown;"';}else{ echo '';}?>><a href="index.php?action=quanlydonhang&query=lietke&trang=<?php echo $i?>"><?php echo $i?></a></li>
                      <?php
                           }
                      ?>
                  </ul> 
