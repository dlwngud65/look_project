<?php
session_start();
$page = $_GET['page'];
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_rank = $_SESSION['user_rank'];
$select = $_POST['select'];
$title = $_POST['title'];
$content = $_POST['content'];
$set_pass = $_POST['hide'];
$password = $_POST['password'];
include '../lib/dbconn.php';
$regist_day = date("Y-m-d(H:i)");
if ($set_pass == 'y') {
    $sql = "insert into qa_write(id,name,rank,type,subject,content,regist_day,set_password,password,hit)
values('$user_id','$user_name','$user_rank','$select','$title','$content','$regist_day','$set_pass','$password',0)";
    $result = mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
} else if ($set_pass == 'n') {
    $sql = "insert into qa_write(id,name,rank,type,subject,content,regist_day,set_password,password,hit)
values('$user_id','$user_name','$user_rank','$select','$title','$content','$regist_day','$set_pass','',0)";
    $result = mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
}

mysqli_close($con);
echo ("<script>window.alert('글이 저장되었습니다.');
location.href = './qa_main.php?mode=all&page=$page';
</script>");
?>