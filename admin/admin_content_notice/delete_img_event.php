<?php
session_start();

if(!empty($_GET['delete'])){
    $delete=$_GET['delete'];
}

if(!empty($_GET['num'])){
    $num=$_GET['num'];
}

include '../../lib/dbconn.php';

$sql = "select * from event where num= $num ";
$result = mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
$row = mysqli_fetch_array($result);

$copied_name[0] = $row['file_copied_0'];

if($delete == 'file0'){
    $sql = "update event set file_name_0='',file_copied_0='' where num= $num";
    mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
    if ($copied_name[0]) {
        $image_name = "./data/" . $copied_name[0];
        unlink($image_name);
    }
}
mysqli_close($con);

echo ("<script>
history.go(-1);
</script>");
?>