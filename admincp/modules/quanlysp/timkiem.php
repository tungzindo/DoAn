<?php
    if(isset($_POST['timkiem'])){
        $tukhoa = $_POST['tukhoa'];
    }
        $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
        $query_pro = mysqli_query($mysqli,$sql_pro);
?>
<!-- <h3>Từ khóa tìm kiếm :<?php echo $_POST['tukhoa']?></h3>
                  <ul class="product_list">
                  <?php
                          while($row = mysqli_fetch_array($query_pro)){
                      ?>
                      <li>
                          <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']?>">  
                                <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>">
                                <p class="title_product">Tên sản phẩm : <?php echo $row['tensanpham']?></p>
                                <p class="price_product">Giá : <?php echo number_format($row['giasp'],0,',','.').'vnđ'?></p>
                                <p style="text-align:center;color:#d1d1d1"><?php echo $row['tendanhmuc']?></p>
                            </a>
                       </li> 
                       <?php
                        }
                        ?>
                  </ul> -->


<table class="table table-hover" style="margin-top:45px">
  <tr class="thead-dark">
    <th scope="col">Id</th>
    <th scope="col">Tên sản phẩm</th>
    <th scope="col">Hình ảnh</th>
    <th scope="col">Giá sp</th>
    <th scope="col">Số lượng</th>
    <th scope="col">Danh mục</th>
    <th scope="col">Mã sp</th>
    <th scope="col">Tóm tắt</th>
  
  </tr>
  <?php
  while($row = mysqli_fetch_array($query_pro)){
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row['giasp'] ?></td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td><?php echo $row['masp'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    
  </tr>
  <?php
  } 
  ?>
 
</table>