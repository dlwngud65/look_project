<?php
include '../../lib/dbconn.php';
$sql="select shopname from admin_common where id='admin'";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_array($result);
$shopname=$row['shopname'];
if(!empty($_POST['id'])&&$_POST['id']!="admin"){
    $id=$_POST['id'];
}else{
    echo "<script>alert('admin으로  수정 할 수 없습니다'); history.go(-1);</script>";
}
if(!empty($_POST['pass'])){
    $pass=$_POST['pass'];
}
if(!empty($_POST['beforeid'])){
    $beforeid=$_POST['beforeid'];
}
if(!empty($_POST['name'])){
    $name=$_POST['name'];
}
if(!empty($_POST['product'])){
    $product=$_POST['product'];
}else{
    $product="n";
}
if(!empty($_POST['order'])){
    $order=$_POST['order'];
}else{
    $order="n";
}
if(!empty($_POST['member'])){
    $member=$_POST['member'];
}else{
    $member="n";
}
if(!empty($_POST['notice'])){
    $notice=$_POST['notice'];
}else{
    $notice="n";
}
if(!empty($_POST['coupon'])){
    $coupon=$_POST['coupon'];
}else{
    $coupon="n";
}

$sql="update admin_common set id='$id',pass='$pass',name='$name',shopname='$shopname',product_authority='$product',order_authority='$order',
member_authority='$member',notice_authority='$notice',coupon_authority='$coupon' where id='$beforeid'";
mysqli_query($con, $sql) or die("계정 수정 실패 : ".mysqli_error($con));
echo "<script>alert('$id 운영자를 수정했습니다.'); location.href = '../admin_main.php?mode=common&select=common_sub3';</script>";
?>