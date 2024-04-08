<?php
     session_start();
     $mysqli = new mysqli("localhost", "root", "", "web_mysqli1");
    mysqli_set_charset($mysqli, "utf8");
     include("../admincp/config/config.php");
     require_once('config_vnpay.php');
     use Carbon\Carbon;
     require('../carbon/autoload.php');
     $now = Carbon::now('Asia/Ho_Chi_Minh');
     $id_khachhang = $_SESSION['id_khachhang'];
     $hovaten=$_POST['hoten'];
     $email=$_POST['email'];
     $sdt=$_POST['sdt'];
     $diachi=$_POST['diachi'];
     $code_order = rand(0,9999);
     $cart_payment =$_POST['payment'];
     $cart_payUrl=$_POST['payUrl'];
     //lay id thong tin van chuyen
     $id_dangky=$_SESSION['id_khachhang'];
     $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
     $row_get_vanchuyen=mysqli_fetch_array($sql_get_vanchuyen);
     $id_shipping= $row_get_vanchuyen['id_shipping'];

     $tongtien=0;
     foreach($_SESSION['cart'] as $key => $value){
       $thanhtien= $value['soluong']*$value['giasp'];
       $tongtien=$thanhtien;
    }
     if($cart_payment =='Tiền mặt' || $cart_payment == 'Chuyển khoản'){
        if($id_khachhang==0){
            $id_khachhang=rand(0,9999);
        }
        //insert cart
            $insert_cart = "INSERT INTO tbl_cart(id_khachhang,full_name,email,sdt,diachi,code_cart,cart_status,cart_date,cart_payment) 
            VALUE('".$id_khachhang."','".$hovaten."','".$email."','".$sdt."','".$diachi."', '".$code_order."', 1,'".$now."','".$cart_payment."')";
            $cart_query = mysqli_query($mysqli,$insert_cart);
            if($cart_query){
                //them gio hang chi tiet
                foreach($_SESSION['cart'] as $key => $value){
                    $id_sanpham = $value['id'];
                    $soluong = $value['soluong'];
                    $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) 
                    VALUE('".$id_sanpham."', '".$code_order."', '".$soluong."')";
                    mysqli_query($mysqli,$insert_order_details);
                    $soluong_sp="Select soluong from tbl_sanpham where id_sanpham=$id_sanpham";
                    $query_sp=mysqli_query($mysqli,$soluong_sp);
                    $rs_sp = mysqli_fetch_array($query_sp);
                    $soluong_conlai=$rs_sp['soluong']- $soluong;
                    $soluong_conlai;
                    $update_sp="UPDATE tbl_sanpham set soluong=$soluong_conlai where id_sanpham=$id_sanpham";
                    $query_update_sp=mysqli_query($mysqli,$update_sp);
                }
            }  
    
         header('Location:camon.php');
    }elseif($cart_payment =='Vnpay'){
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/DoAnWeb/user/camon.php";
        $vnp_TmnCode = "SGRUU0EF";//Mã website tại VNPAY 
        $vnp_HashSecret = "JRFCSVDBUANTFWOVEUHZJPVZXXOIXJJY"; //Chuỗi bí mật
        //Thanh toan VNPAY
        $vnp_TxnRef =  rand(00,9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng đặt tại web';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $tongtien * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = $expire;

        $inputData = array(
            "vnp_Version" => "2.1.0",   
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$vnp_ExpireDate
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        /* if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        } */

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                if($id_khachhang==0){
                    $id_khachhang=rand(0,9999);
                }
                $_SESSION['code_cart']=$code_order;
                    $insert_cart = "INSERT INTO tbl_cart(id_khachhang,full_name,email,sdt,diachi,code_cart,cart_status,cart_date,cart_payment) 
                    VALUE('".$id_khachhang."','".$hovaten."','".$email."','".$sdt."','".$diachi."', '".$code_order."', 1,'".$now."','".$cart_payment."')";
                    $cart_query = mysqli_query($mysqli,$insert_cart);
                    if($cart_query){
                        //them gio hang chi tiet
                        foreach($_SESSION['cart'] as $key => $value){
                            $id_sanpham = $value['id'];
                            $soluong = $value['soluong'];
                            $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) 
                            VALUE('".$id_sanpham."', '".$code_order."', '".$soluong."')";
                            mysqli_query($mysqli,$insert_order_details);
                            $soluong_sp="Select soluong from tbl_sanpham where id_sanpham=$id_sanpham";
                            $query_sp=mysqli_query($mysqli,$soluong_sp);
                            $rs_sp = mysqli_fetch_array($query_sp);
                            $soluong_conlai=$rs_sp['soluong']- $soluong;
                            $soluong_conlai;
                            $update_sp="UPDATE tbl_sanpham set soluong=$soluong_conlai where id_sanpham=$id_sanpham";
                            $query_update_sp=mysqli_query($mysqli,$update_sp);
                        }
                    } 
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
    }elseif($cart_payment =='Paypal'){
        //Thanh toan PAYPA
    }
    elseif($cart_payUrl =='Thanh toán MOMO ATM'){
        function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}


$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

$orderInfo = "Thanh toán qua MOMO ATM";
$amount =$_POST['tongtien_vnd'];
$orderId = time() ."";
$redirectUrl = "http://localhost/DoAnWeb/user/camon.php";
$ipnUrl = "http://localhost/DoAnWeb/user/camon.php";
$extraData = "";

    $requestId = time() . "";
    $requestType = "payWithATM";
    $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //before sign HMAC SHA256 signature
    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);
    $data = array('partnerCode' => $partnerCode,
        'partnerName' => "Test",
        "storeId" => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature);
    $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json

    //Just a example, please check more in there
    $cart_payment1='Momo';
    if($id_khachhang==0){
        $id_khachhang=rand(0,9999);
    }
    $insert_cart = "INSERT INTO tbl_cart(id_khachhang,full_name,email,sdt,diachi,code_cart,cart_status,cart_date,cart_payment) 
    VALUE('".$id_khachhang."','".$hovaten."','".$email."','".$sdt."','".$diachi."', '".$code_order."', 1,'".$now."','".$cart_payment1."')";
    $cart_query = mysqli_query($mysqli,$insert_cart);
    if($cart_query){
    foreach($_SESSION['cart'] as $key => $value){
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) 
        VALUE('".$id_sanpham."', '".$code_order."', '".$soluong."')";
        mysqli_query($mysqli,$insert_order_details);
        $soluong_sp="Select soluong from tbl_sanpham where id_sanpham=$id_sanpham";
        $query_sp=mysqli_query($mysqli,$soluong_sp);
        $rs_sp = mysqli_fetch_array($query_sp);
        $soluong_conlai=$rs_sp['soluong']- $soluong;
        $soluong_conlai;
        $update_sp="UPDATE tbl_sanpham set soluong=$soluong_conlai where id_sanpham=$id_sanpham";
        $query_update_sp=mysqli_query($mysqli,$update_sp);
    }}
    header('Location: ' . $jsonResult['payUrl']);
        
    }
    unset($_SESSION['cart']);
      //header('Location:camon.php');
?>