<?php
include_once '../../lib/dbconn.php';

if(!empty($_GET['num'])){
    $num = $_GET['num'];
}


$sql = "select * from goods where goods_num = '$num'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);


$copied_name[0] = $row[file_copied_0];
$copied_name[1] = $row[file_copied_1];
$copied_name[2] = $row[file_copied_2];
$copied_name[3] = $row[file_copied_3];
$copied_name[4] = $row[file_copied_4];
$copied_name[5] = $row[file_copied_5];
$copied_name[6] = $row[file_copied_6];
$copied_name[7] = $row[file_copied_7];
$copied_name[8] = $row[file_copied_8];
$copied_name[9] = $row[file_copied_9];
for($i=0;$i<10;$i++){
    
    if ($copied_name[$i]){
        $image_name = "./data/".$copied_name[$i];
        unlink($image_name);
    }
    
}

$sql = "delete from goods where goods_num = '$num' ";
mysqli_query($con, $sql);



mysqli_close($con);

echo ("<script>
        history.go(-1);
        </script>");

?>