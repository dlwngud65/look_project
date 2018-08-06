<?php
include '../lib/dbconn.php';


//search.php 에서 보낸 값을 받음.
if(!empty($_POST['search_text'])){
    $search_text=$_POST["search_text"];
}
$sql= "select * from goods where goods_name like '%$search_text%'";

$result= mysqli_query($con, $sql) or die(mysqli_error($con));
//최대 10개까지 볼 수 있음.
$count=10;

while($row= mysqli_fetch_array($result)){
    $goods_name= $row['goods_name'];
    //상품에 특수 문자가 있을 수 있기에.
    $goods_name2=urlencode($goods_name);
    if(!empty($goods_name)){
        $rs_href= "search.php?goods_name=$goods_name2";
        echo "<a href='$rs_href' style='text-decoration:none; color:black;'><div style='padding : 5px 5px;'>".$row['goods_name']."</div></a>";
    }
    $count--;
    if(!$count){
        break;
    }
}

?>