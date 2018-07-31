<?php
session_start();

if(!empty($_GET['delete'])){
    $delete=$_GET['delete'];
}

if(!empty($_GET['num'])){
    $num=$_GET['num'];
}

include '../../lib/dbconn.php';

$sql = "select * from goods where goods_num= '$num' ";
$result = mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
$row = mysqli_fetch_array($result);

$copied_name[0] = $row['file_copied_0'];
$copied_name[1] = $row['file_copied_1'];
$copied_name[2] = $row['file_copied_2'];
$copied_name[3] = $row['file_copied_3'];
$copied_name[4] = $row['file_copied_4'];
$copied_name[5] = $row['file_copied_5'];
$copied_name[6] = $row['file_copied_6'];
$copied_name[7] = $row['file_copied_7'];
$copied_name[8] = $row['file_copied_8'];
$copied_name[9] = $row['file_copied_9'];

if($delete == 'file0'){
    $sql = "update goods set file_name_0='',file_copied_0='' where goods_num= '$num'";
    mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
    if ($copied_name[0]) {
        $image_name = "./data/" . $copied_name[0];
        unlink($image_name);
    }
} else if($delete == 'file1'){
    $sql = "update goods set file_name_1='',file_copied_1='' where goods_num= '$num'";
    mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
    if ($copied_name[1]) {
        $image_name = "./data/" . $copied_name[1];
        unlink($image_name);
    }
}else if($delete == 'file2'){
    $sql = "update goods set file_name_2='',file_copied_2='' where goods_num= '$num'";
    mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
    if ($copied_name[2]) {
        $image_name = "./data/" . $copied_name[2];
        unlink($image_name);
    }
}else if($delete == 'file3'){
    $sql = "update goods set file_name_3='',file_copied_3='' where goods_num= $num";
    mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
    if ($copied_name[3]) {
        $image_name = "./data/" . $copied_name[3];
        unlink($image_name);
    }
}else if($delete == 'file4'){
    $sql =  "update goods set file_name_4='',file_copied_4='' where goods_num= '$num'";
    mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
    if ($copied_name[4]) {
        $image_name = "./data/" . $copied_name[4];
        unlink($image_name);
    }
}else if($delete == 'file5'){
    $sql =  "update goods set file_name_5='',file_copied_5='' where goods_num= '$num'";
    mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
    if ($copied_name[5]) {
        $image_name = "./data/" . $copied_name[5];
        unlink($image_name);
    }
}else if($delete == 'file6'){
    $sql =  "update goods set file_name_6='',file_copied_6='' where goods_num= '$num'";
    mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
    if ($copied_name[6]) {
        $image_name = "./data/" . $copied_name[6];
        unlink($image_name);
    }
}else if($delete == 'file7'){
    $sql =  "update goods set file_name_7='',file_copied_7='' where goods_num= '$num'";
    mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
    if ($copied_name[7]) {
        $image_name = "./data/" . $copied_name[7];
        unlink($image_name);
    }
}else if($delete == 'file8'){
    $sql =  "update goods set file_name_8='',file_copied_8='' where goods_num= '$num'";
    mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
    if ($copied_name[8]) {
        $image_name = "./data/" . $copied_name[8];
        unlink($image_name);
    }
}else if($delete == 'file9'){
    $sql =  "update goods set file_name_9='',file_copied_9='' where goods_num= '$num'";
    mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
    if ($copied_name[9]) {
        $image_name = "./data/" . $copied_name[9];
        unlink($image_name);
    }
}

mysqli_close($con);

echo ("<script>
history.go(-1);
</script>");

?>