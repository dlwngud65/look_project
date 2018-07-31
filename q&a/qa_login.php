<?php
session_start();
include '../lib/dbconn.php';
$page = $_GET['page'];
$num = $_GET['num'];
$pass = $_POST['pass'];
include '../lib/dbconn.php';
$sql = "select * from qa_write where num ='$num'";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$row = mysqli_fetch_array($result);
$password = $row['password'];

if (! ($pass == $password)) {
    echo "<script> alert('비밀번호가 틀렸습니다.'); history.go(-1); </script>";
} else {
    echo "<script>
                    location.href='./qa_view.php?num=$num&page=$page';
                  </script>";
}

?>
