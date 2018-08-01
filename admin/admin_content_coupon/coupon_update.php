<?php
include '../../lib/dbconn.php';
if(!empty($_POST['coupon_name'])){
    $coupon_name=$_POST['coupon_name'];
}else{
    echo "<script>alert('쿠폰명 전달 실패'); history.go(-1);</script>";
}
if(!empty($_POST['coupon_type'])){
    $coupon_type=$_POST['coupon_type'];
}else{
    echo "<script>alert('쿠폰 종류 전달 실패'); history.go(-1);</script>";
}
if(!empty($_POST['coupon_sale'])){
    $coupon_sale=$_POST['coupon_sale'];
}
if(!empty($_POST['coupon_validity'])){
    $coupon_validity=$_POST['coupon_validity'];
}else{
    echo "<script>alert('유효기간 전달 실패'); history.go(-1);</script>";
}
if(!empty($_POST['coupon_content'])){
    $coupon_content=$_POST['coupon_content'];
}else{
    echo "<script>alert('쿠폰 설명 전달 실패'); history.go(-1);</script>";
}
if(!empty($_POST['before_name'])){
    $before_name=$_POST['before_name'];
}else{
    echo "<script>alert('수정 전 이름 전달 실패'); history.go(-1);</script>";
}

$delete_day=date("Y-m-d", strtotime("+$coupon_validity days"));


$sql="update members_coupon set coupon_name='$coupon_name',delete_day='$delete_day' where coupon_name='$before_name'";
mysqli_query($con, $sql) or die(mysqli_error($con));


$sql="update coupon set coupon_name='$coupon_name', coupon_kinds='$coupon_type', coupon_sale='$coupon_sale', coupon_validity='$coupon_validity', coupon_content='$coupon_content' where coupon_name='$before_name'"; 
mysqli_query($con, $sql) or die(mysqli_error($con));
echo "<script>alert('쿠폰이 수정되었습니다.'); location.href='../admin_main.php?mode=coupon&select=coupon_sub1';</script>";
?>