<?php
include '../../lib/dbconn.php';

$sql = "select ci_map_copied from company_information";
$result = mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
$row = mysqli_fetch_array($result);
$ci_map_copied=$row['ci_map_copied'];
$image_name="./data/".$ci_map_copied;
unlink($image_name);
$sql="update company_information set ci_map='', ci_map_copied=''";
if(mysqli_query($con, $sql)){
   echo '<script>alert("약도가 성공적으로 삭제되었습니다."); history.go(-1);</script>'; 
}else{
   mysqli_error($con);
}
?>