<?php
   session_start();
   include('config/config.php');
   if(isset($_POST['dangnhap'])){
       $taikhoan = $_POST['username'];
       $matkhau = md5($_POST['password']);
       $sql = "SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1";
       $row = mysqli_query($mysqli,$sql);
       $count = mysqli_num_rows($row);
       if($count>0){
           $_SESSION['dangnhap'] = $taikhoan;
           header("Location:index.php");
       }
       else{
           echo '<p style="color:red">Tài khoản hoặc Mật khẩu không đúng, vui lòng nhập lại </p>';
       }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <style type="text/css">
       /*  *{
            padding: 0;
            margin:0;
            box-sizing: border-box;
        }
        body{
            display: flex;
            width: 100vw;
            height:100vh;
            background: url(../images/imglogin.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .wrapper {
            width:100%;
            height :100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        table {
            width: 15%;
        }
        table.table-login{
            width: 450px;
        }
        table.table-login tr td{
            padding: 6px;
        } */
        body {
            display: flex;
            width: 100vw;
            height:100vh;
            background: url(../images/imglogin.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            }
        *{
                padding: 0;
                margin:0;
                box-sizing: border-box;
            }
        .form-tt {
            width: 400px;
            border-radius: 10px;
            overflow: hidden;
            padding: 55px 55px 37px;
            background: #9152f8;
            background: -webkit-linear-gradient(top,#7579ff,#b224ef);
            background: -o-linear-gradient(top,#7579ff,#b224ef);
            background: -moz-linear-gradient(top,#7579ff,#b224ef);
            background: linear-gradient(top,#7579ff,#b224ef);
            width:100%;
            height :100%;
            align-items: center;
            justify-content: center;
            }
        .form-tt h2 {
            font-size: 30px;
            color: #fff;
            line-height: 1.2;
            text-align: center;
            text-transform: uppercase;
            display: block;
            margin-bottom: 30px;
            }

        .form-tt input[type=text], .form-tt input[type=password] {
            font-family: Poppins-Regular;
            font-size: 16px;
            color: #fff;
            line-height: 1.2;
            display: block;
            width: calc(100% - 10px);
            height: 45px;
            background: 0 0;
            padding: 10px 0;
            border-bottom: 2px solid rgba(255,255,255,.24)!important;
            border: 0;
            outline: 0;
            }
        .form-tt input[type=text]::focus, .form-tt input[type=password]::focus {
            color: red;
            }
        .form-tt input[type=password] {
            margin-bottom: 20px;
            }
        .form-tt input::placeholder {
            color: #fff;
            }
        .checkbox {
            display: block;
            }
        .form-tt input[type=submit] {
            font-size: 16px;
            color: #555;
            line-height: 1.2;
            padding: 0 20px;
            min-width: 120px;
            height: 50px;
            border-radius: 25px;
            background: #fff;
            position: relative;
            z-index: 1;
            border: 0;
            outline: 0;
            display: block;
            margin: 30px auto;
            cursor: pointer;
            }
        #checkbox {
            display: inline-block;
            margin-right: 10px;
            }
        .checkbox-text {
            color: #fff;
            }
    </style>
</head>
<body>
        <!-- <div class="wrapper">
            <form action="" autocomplete="off" method="POST">
                <table border="1" class="table-login" style="text-align: center; border-collapse: collapse;">
                    <tr>
                        <td colspan="2"><h3 style="color: #fff">Đăng nhập Admin</h3></td>
                    </tr>
                    <tr>
                        <td style="color: #fff">Tài khoản</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td style="color: #fff">Mật khẩu</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
                    </tr>
                </table>
            </form>
        </div> -->
        <div class="form-tt">
            <h2>Đăng nhập Admin</h2>
            <form action="" autocomplete="off" method="POST">
                <input type="text" name="username" placeholder="Nhập tên đăng ký" />
                <input type="password" name="password" placeholder="Nhập mật khẩu" />
                <input type="checkbox" id="checkbox" name="checkbox"><label class="checkbox-text">Nhớ đăng nhập lần sau</label>
                <input type="submit" name="dangnhap" value="Đăng nhập" />
            </form>
        </div>
    <!--<script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
</body>
</html>