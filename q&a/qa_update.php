<?php
session_start();
$page = $_GET['page'];
$num = $_GET['num'];
$id = $_POST['qa_id'];
$name = $_POST['qa_name'];
$rank = $_POST['qa_rank'];
$select = $_POST['select'];
$title = $_POST['title'];
$content = $_POST['content'];
$set_pass = $_POST['hide'];
$password = $_POST['password'];
$admin_ripple = $_POST['admin_ripple'];
include '../lib/dbconn.php';
$regist_day = date("Y-m-d(H:i)");
if ($set_pass == 'y') {
    $sql = "update qa_write set id='$id',name='$name',rank='$rank',type='$select',subject='$title',content='$content',regist_day='$regist_day',
set_password='$set_pass',password='$password',admin_ripple='$admin_ripple' where num='$num'";
    $result = mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
} else if ($set_pass == 'n') {
    $sql = "update qa_write set id='$id',name='$name',rank='$rank',type='$select',subject='$title',content='$content',regist_day='$regist_day',
set_password='$set_pass',password='',admin_ripple='$admin_ripple' where num='$num'";
    $result = mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
}

mysqli_close($con);
echo ("<script>window.alert('글이 수정되었습니다.');
location.href = './qa_view.php?num=$num&page=$page';
</script>");
?>