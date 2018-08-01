<?php
include '../lib/dbconn.php';



if(!empty($_POST['search_text'])){
    $search_text=$_POST["search_text"];
    $sql= "select * from goods where goods_name like '%$search_text%'";
}

$result= mysqli_query($con, $sql) or die(mysqli_error($con));
$count=10;

while($row= mysqli_fetch_array($result)){
    $goods_name= $row['goods_name'];
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