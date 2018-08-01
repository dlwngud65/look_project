<?php
include_once '../../lib/dbconn.php';
if(!empty($_POST['select_coupon'])){
    $select_coupon= $_POST['select_coupon'];
}
if(!empty($_POST['checkrow'])){
    $id=$_POST['checkrow'];
}

if(!$id || $select_coupon == "선택"){
    echo ("
 <script>
    alert('쿠폰 및 지급 대상을 선택해주세요.');
    history.go(-1);
 </script>
 ");
    exit;
}

$select_coupon = explode("_", $select_coupon);

$coupon_num=(int)$select_coupon[0];
$coupon_name = $select_coupon[1];
$coupon_delete = (int)$select_coupon[2];

$regist_day = date("Y-m-d");
$delete_day= date("Y-m-d", strtotime("+$coupon_delete days"));

$count = count($id);
for($i=0;$i<$count;$i++){
    
    $sql="select memberkind from member where id='{$id[$i]}'";
    $result=mysqli_query($con,$sql) or die(mysqli_error($con));
    $row=mysqli_fetch_array($result);
    $memberkind=$row['memberkind'];
    
    if($memberkind=='c'){
        $sql1="insert into members_coupon(id, coupon_num, coupon_name, regist_day,delete_day)";
        $sql1 .="values('{$id[$i]}',$coupon_num,'{$coupon_name}','{$regist_day}','{$delete_day}')";
        mysqli_query($con,$sql1) or die(mysqli_error($con));
    }else{
        $sql1="insert into members_coupon(id,coupon_num,coupon_name,regist_day,delete_day) values ('{$id[$i]}',$coupon_num,'{$coupon_name}','무제한','무제한')";
        mysqli_query($con,$sql1) or die(mysqli_error($con));
    }
}

mysqli_close($con);
echo ("
 <script>
    alert('쿠폰이 지급되었습니다.');
    location.href='../admin_main.php?mode=coupon&select=coupon_sub3';
 </script>
 ");
?>