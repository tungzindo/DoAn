<?php
$mysqli = new mysqli("localhost", "root", "", "web_mysqli1");
mysqli_set_charset($mysqli, "utf8");
// Check connection
if ($mysqli->connect_errno) {
  echo "Kết nối MySQLi lỗi : " . $mysqli->connect_error;
  exit();
}
