<?php
include_once '../../lib/dbconn.php';
if(!empty($_GET['goods_num'])){
   $goods_num= $_GET['goods_num'];
}

if(!empty($_GET['goods_recommend'])){
    $goods_recommend= $_GET['goods_recommend'];
}

if($goods_recommend=="1"){
    $sql ="update goods set recommend1='' where goods_num='{$goods_num}'";
}else if($goods_recommend=="2"){
    $sql ="update goods set recommend2='' where goods_num='{$goods_num}'";
}else{
    $sql ="update goods set recommend3='' where goods_num='{$goods_num}'";
}

mysqli_query($con,$sql) or die(mysqli_error($con));
mysqli_close($con);

echo"
    <script>
    location.href='../admin_main.php?mode=product&select=product_sub4';
   
    </script>
";

?>