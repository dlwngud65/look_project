<?php
include_once '../../lib/dbconn.php';
if (! empty($_GET['coupon_name'])) {
    $coupon_name = $_GET['coupon_name'];
} else {
    echo "<script>alert('쿠폰이름이 전달되지 않았습니다.');history.go(-1);</script>";
    exit;
}
$sql = "delete from coupon where coupon_name='$coupon_name'";
mysqli_query($con, $sql) or die(mysqli_error($con));
echo "<script>alert('해당 쿠폰이 삭제되었습니다.');location.href = '../admin_main.php?mode=coupon&select=coupon_sub2';</script>";
?>