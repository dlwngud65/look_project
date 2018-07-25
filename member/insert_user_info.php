<?php
session_start();

include '../lib/dbconn.php';




$user_type=$_POST['member_type'];
$user_name=$_POST['user_name'];
$user_id=$_POST['user_id'];
$user_pass=$_POST['user_pass'];

//여기 수정.
$user_month=$_POST['user_month'];
$user_day=$_POST['user_day'];

if(strlen($user_month) == 1){
    $user_month="0".$user_month;
}
if(strlen($user_day) == 1){
    $user_day="0".$user_day;
}
//$user_birthday=$_POST['user_year']."-".$_POST['user_month']."-".$_POST['user_day'];
$user_birthday=$_POST['user_year']."-".$user_month."-".$user_day;

$user_gender=$_POST['user_gender'];
$user_postcode=$_POST['user_postcode'];
$user_address=$_POST['user_address1'].".".$_POST['user_address2'];
$user_phone1=$_POST['user_phone_1']."-".$_POST['user_phone_2']."-".$_POST['user_phone_3'];
$user_phone2=$_POST['user_phone2_1']."-".$_POST['user_phone2_2']."-".$_POST['user_phone2_3'];
$user_email=$_POST['user_email1']."@".$_POST['user_email2'];
$today=date("Y-m-d");


//추가
$sql="select * from coupon where coupon_name='신규회원배달 무료쿠폰'";
$result=mysqli_query($con, $sql)or die("mysql err : ".mysqli_error($con));
$row = mysqli_fetch_array($result);
$num = $row['num'];
$coupon_name = $row['coupon_name'];
$coupon_validity = $row['coupon_validity'];
$delete_day= date("Y-m-d", strtotime("+$coupon_validity days"));

var_dump($num);
var_dump($coupon_name);
var_dump($coupon_validity);

if($user_type === "s"){
    $sql ="insert into  member (id, pass, name, birthday, gender, post_code, address, phone, phone2, email, memberkind, point)";
    $sql.="value('$user_id', '$user_pass', '$user_name', '$user_birthday', '$user_gender', '$user_postcode', '$user_address', '$user_phone1',  '$user_phone2',";
    $sql.="'$user_email', '$user_type', 4000)";
    
    $sql2 ="insert into  point_use_date (id, content, p_m, use_point, date)";
    $sql2.="value('$user_id', '가입 축하 포인트 적립', 'p', '4000', '$today')";
    
    //추가
    $sql3="insert into members_coupon(id,coupon_num,coupon_name,regist_day,delete_day) values ('$user_id',$num,'$coupon_name','무제한','무제한')";
    
}else{
    $sql ="insert into  member (id, pass, name, birthday, gender, post_code, address, phone, phone2, email, memberkind, point)";
    $sql.="value('$user_id', '$user_pass', '$user_name', '$user_birthday', '$user_gender', '$user_postcode', '$user_address', '$user_phone1',  '$user_phone2',";
    $sql.="'$user_email', '$user_type', 3000)";
    
    $sql2 ="insert into  point_use_date (id, content, p_m, use_point, date)";
    $sql2.="value('$user_id', '가입 축하 포인트 적립','p', '3000', '$today')";
    
    //추가
    $sql3="insert into members_coupon(id,coupon_num,coupon_name,regist_day,delete_day) values ('$user_id',$num,'$coupon_name','$today','$delete_day')";
}

mysqli_query($con, $sql)or die("mysql err : ".mysqli_error($con));
mysqli_query($con, $sql2)or die("포인트 mysql err : ".mysqli_error($con));
mysqli_query($con, $sql3)or die("쿠폰적립 : ".mysqli_error($con));

echo "<script>
        alert('축하 합니다. 회원가입이 되었습니다. 로그인해 주세요.');
        location.href='../index.php';
    </script>";

?>