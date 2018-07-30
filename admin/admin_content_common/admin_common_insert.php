<?php
include '../../lib/dbconn.php';
$sql="select shopname from admin_common where id='admin'";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_array($result);
$shopname=$row['shopname'];
if(!empty($_POST['id'])&&$_POST['id']!="admin"){
    $id=$_POST['id'];
}else{
    echo "<script>alert('admin은 생성 할 수 없는 아이디입니다.'); history.go(-1);</script>";
    exit;
}
if(!empty($_POST['pass'])){
    $pass=$_POST['pass'];
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

$sql="insert into admin_common (id,pass,name,shopname,basic_authority,product_authority,
    order_authority,member_authority,notice_authority,sale_authority,coupon_authority)";
$sql.="values('$id','$pass','$name','$shopname','n','$product','$order','$member','$notice','n','$coupon')";
mysqli_query($con, $sql) or die("계정 생성 실패 : ".mysqli_error($con));
echo "<script>alert('$id 운영자를 생성했습니다.'); location.href = '../admin_main.php?mode=common&select=common_sub3';</script>";
?>