<?php
session_start();
$page = $_GET['page'];
$num = $_GET['num'];

include '../lib/dbconn.php';
$regist_day = date("Y-m-d(H:i)");

$sql = "delete from qa_write where num={$_GET['num']}";
$result = mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));

mysqli_close($con);
echo ("<script>window.alert('글이 삭제되었습니다.');
location.href = './qa_main.php?mode=all&page=$page';
</script>");
?>