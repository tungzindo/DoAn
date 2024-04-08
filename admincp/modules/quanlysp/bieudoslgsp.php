<?php
        $sql="SELECT tendanhmuc,COUNT(soluongmua) AS 'soluong' FROM
        tbl_cart_details,tbl_sanpham,tbl_danhmuc WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_danhmuc.id_danhmuc=tbl_sanpham.id_danhmuc
        GROUP BY tbl_danhmuc.id_danhmuc";
        $result=mysqli_query($mysqli,$sql) or die("Lỗi truy vấn");
        $data= [];
        while($row=mysqli_fetch_array($result)){
            $data[]= $row;
        }
        // echo "<pre>";
        // var_dump($data);
        // echo "<pre>";
?>

   

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    </head>
<body>
  <section class="home-section">
        <div class="container-fluid">
        <div id="piechart"></div>
        <script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['tendanhmuc', 'soluong'],
  <?php
    foreach($data as $key){
        echo "['".$key['tendanhmuc']."',".$key['soluong']."],";
    }
  ?>
  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Biểu đồ thống kê số lượng sản phẩm đã bán', 'width':1000, 'height':600};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
  </section>
 
</body>
</html>
