<?php
include_once '../../lib/dbconn.php';

if(!empty($_POST['checkrow2'])){
    $checkrow2 = $_POST['checkrow2'];
}

if(!$checkrow2){
    echo ("<script>
        alert('삭제할 글을 체크해주세요.');
        history.go(-2);
        </script>");
}


$count = count($checkrow2);


for($i=0;$i<$count;$i++){
    
    $sql ="select * from event where num ='$checkrow2[$i]'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    
    $copied_name[0] = $row[file_copied_0];
    $image_name = "./data/".$copied_name[0];
    unlink($image_name);
    
    
    $sql = "delete from event where num = '$checkrow2[$i]'";
    mysqli_query($con, $sql);
    
}



mysqli_close($con);

echo ("<script>
       location.href='../admin_main.php?mode=notice&select=notice_sub4';
        </script>"); 

?>