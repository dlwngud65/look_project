<?php
session_start();
include_once '../../lib/dbconn.php';


if(!empty($_GET['goods_num'])){
    $mainGoods_num = $_GET['goods_num'];
}

?>
<html>
<head>
<title>추천상품 검색</title>
<meta charset="utf-8">
<link href="../admin_css/recommend_product.css?v=v1" rel="stylesheet"
   type="text/css">

<link rel="shortcut icon" href="../img/look.png" type="image/x-icon">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">

function insert_sub(){
	document.insert_form.submit();
}
</script>
</head>
<body>
<?php 

$sql="select * from goods where goods_num = '$mainGoods_num'";
$result= mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$mainGoods_name= $row['goods_name'];
$recommend1=$row['recommend1'];
$recommend2=$row['recommend2'];
$recommend3=$row['recommend3'];
?>
   <div id="basic">
      <div id="product_name">추천등록 상품 : <b><?=$mainGoods_name?></b></div>
      <br>
      <div id="search">
         <input type="text" style="width: 130px;"><input type="button" value="검색"
            style="height: 21px; vertical-align: middle; cursor: hand;">
      </div>
      <br>
<form name="insert_form" action="./recommend_insert.php" method="post">
<input type="hidden" name="main_num" value="<?=$mainGoods_num?>">
      <table id="rd_table">
         <tr>
            <td class="td1"></td>
            <td class="td2"><b>상품등록번호</b></td>
            <td class="td3"><b>상품명</b></td>
         </tr>
<?php 
$sql="select goods_num,goods_name from goods where goods_num != '$mainGoods_num'";
$result= mysqli_query($con, $sql) or die(mysqli_error($con));

$total_record=mysqli_num_rows($result);

$rows_scale=10;
$pages_scale=10;

$total_pages= ceil($total_record/$rows_scale);

if(empty($_GET['page'])){
    $page=1;
}else{
    $page = $_GET['page'];
}
$start_row= $rows_scale * ($page -1) ;
$pre_page= $page>1 ? $page-1 : NULL;
$next_page= $page < $total_pages ? $page+1 : NULL;
$start_page= (ceil($page / $pages_scale ) -1 ) * $pages_scale +1 ;
$end_page= ($total_pages >= ($start_page + $pages_scale)) ? $start_page + $pages_scale-1 : $total_pages;

for($i=$start_row; ($i<$start_row+$rows_scale) && ($i< $total_record); $i++){
    
    mysqli_data_seek($result, $i);
    $row = mysqli_fetch_array($result);  
    $goods_num = $row[goods_num];
    $goods_name = $row[goods_name];
    
?>
         <tr>
            <td class="td1">
            <input type="checkbox" style="cursor: hand" name="check[]" id="check[]" value="<?=$goods_name?>" 
            <?php 
            if($recommend1==$goods_name){
                echo"checked";
            }
            if($recommend2==$goods_name){
                echo"checked";
            }
            if($recommend3==$goods_name){
                echo"checked";
            }    
            ?>></td>
            
            <td class="td2"><?=$goods_num?></td>
            <td class="td3"><?=$goods_name?></td>
         </tr>
         
<?php

 }
?>
</table>
</form>
      
   <div id="button_box"><input type="button" value="등록"  onclick="insert_sub()" style="cursor: hand;" ></div>
   </div>
</body>
</html>