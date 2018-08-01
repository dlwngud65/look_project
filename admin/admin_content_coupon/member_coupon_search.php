<?php
include '../../lib/dbconn.php';

if(!empty($_GET['id'])){
    $id=$_GET['id'];
}
$sql="select * from members_coupon where id ='{$id}'";
$result=mysqli_query($con, $sql) or die("실패원인1 :".mysqli_error($con));
echo"쿠폰 내역<br>";
$i=1;
while($row=mysqli_fetch_array($result)){
    $coupon_name=$row['coupon_name'];
    echo"{$i}".":$coupon_name<br>";
    $i++;
}

?>