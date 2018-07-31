<?php
session_start();
include '../lib/dbconn.php';
$page = $_GET['page'];
$num = $_GET['num'];
$admin_ripple = $_POST['admin_ripple'];
$sql = "update qa_write set admin_ripple='$admin_ripple' where num='$num'";
$result = mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
mysqli_close($con);
echo ("<script>window.alert('답변 완료되었습니다.');
location.href = './qa_main.php?mode=all&page=$page';
</script>");
?>