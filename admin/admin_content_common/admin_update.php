<?php
session_start();
include_once '../../lib/dbconn.php';
if(!empty($_POST['shopname'])){
    $shopname=$_POST['shopname'];
}
if(!empty($_POST['name'])){
    $name=$_POST['name'];
}
if(!empty($_POST['id'])){
    $id=$_POST['id'];
}
if(!empty($_POST['beforeid'])){
    $beforeid=$_POST['beforeid'];
}
if(!empty($_POST['pass'])){
    $pass=$_POST['pass'];
}

/* 
var_dump($shopname);
var_dump($name);
var_dump($id);
var_dump($beforeid);
exit; */

$sql="select * from admin_common";
$result=mysqli_query($con, $sql);
$row=mysqli_num_rows($result);
$sql="update admin_common set id='$id', pass='$pass', name='$name', shopname='$shopname' where id='$beforeid'";
mysqli_query($con, $sql) or die("$id 정보 수정 실패 :".mysqli_error($con));
$_SESSION['user_id']=$id;
echo "<script>alert('{$id}수정이 완료되었습니다.'); history.go(-1);</script>";

?>