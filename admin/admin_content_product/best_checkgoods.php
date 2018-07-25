<?php

include_once '../../lib/dbconn.php';

if(!empty($_GET['num'])){
    $num = $_GET['num'];
} 

$sql = "select best_check from goods where goods_num = '$num' ";
$result= mysqli_query($con, $sql) or die(mysqli_error($con));
$row = mysqli_fetch_array($result); 
$best_check = $row['best_check'];


if($best_check=='y'){
    $sql = "update goods set best_check='n' where goods_num = '$num' ";
    mysqli_query($con, $sql) or die(mysqli_error($con));
}else{
    
    $sql = "select best_check from goods where best_check='y'";
    $result= mysqli_query($con, $sql) or die(mysqli_error($con));
    $record=mysqli_num_rows($result);

    if($record>11){
        mysqli_close($con);
        echo ("<script>
        alert('베스트 상품은 12개까지 등록 가능합니다.');
        history.go(-1);
      </script>");
    }else{
    
    $sql = "update goods set best_check='y' where goods_num = '$num' ";
    mysqli_query($con, $sql) or die(mysqli_error($con));
    }
}
    mysqli_close($con);

echo ("<script>
        history.go(-1);
        </script>"); 
?>