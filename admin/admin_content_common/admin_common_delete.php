<?php
include_once '../../lib/dbconn.php';
if (! empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "<script>alert('id값이 전달되지 않았습니다.');history.go(-1);</script>";
}
$sql = "delete from admin_common where id='$id'";
mysqli_query($con, $sql);
echo "<script>alert('해당 아이디가 삭제되었습니다.');location.href = '../admin_main.php?mode=common&select=common_sub3';</script>";
?>