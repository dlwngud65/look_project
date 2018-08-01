<?php
include '../../lib/dbconn.php';
if(!empty($_GET['id'])){
    $id = $_GET['id'];
}


$sql="select * from member_wait_withdrawal where id ='{$id}'";
$result=mysqli_query($con, $sql) or die("실패원인1 :".mysqli_error($con));

$row=mysqli_fetch_array($result);
$reason=$row['reason'];
echo"{$reason}";
?>