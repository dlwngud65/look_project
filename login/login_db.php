<?php
session_start();
include '../lib/dbconn.php';

$user_id = mysqli_real_escape_string($con, $_POST['login_id_dbcheck']);
$user_pass = mysqli_real_escape_string($con, $_POST['login_pass_dbcheck']);

if (strlen($user_id) < 8) {
    $sql = "select * from admin_common where id='$user_id'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_array($result);
    
    $user_id_db = $row['id'];
    $user_pass_db = $row['pass'];
    
    // if(){
    
    // }
    
    $user_shopname_db = $row['shopname '];
    $user_basic_authority_db = $row['basic_authority'];
    $user_product_authority_db = $row['product_authority'];
    $user_order_authority_db = $row['order_authority'];
    $user_member_authority_db = $row['member_authority'];
    $user_notice_authority_db = $row['notice_authority'];
    $user_sale_authority_db = $row['sale_authority'];
    $user_coupon_authority_db = $row['coupon_authority'];
} else {
    $sql = "select * from member where id='$user_id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $user_id_db = $row['id'];
    $user_pass_db = $row['pass'];
}
if (! isset($row)) {
    echo "<script> alert('아이디가 틀렸습니다.'); history.go(-1); </script>";
} else {
    if (! $user_id === $user_id_db) {
        echo "<script> alert('올바르지 않은 접근입니다.'); history.go(-1); </script>";
    }
    if (! ($user_pass === $user_pass_db)) {
        echo "<script> alert('비밀번호가 틀렸습니다.'); history.go(-1); </script>";
    } else {
        
        $user_name_db = $row['name'];
        $user_rank_db = $row['rank'];
        $_SESSION['user_id'] = $user_id_db;
        $_SESSION['user_name'] = $user_name_db;
        $_SESSION['user_rank'] = $user_rank_db;
        echo "<script>
                    location.href='../index.php';
                  </script>";
    }
}

?>
