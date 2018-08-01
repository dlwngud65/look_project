<?php
if(!empty($_POST["sel_type"])){
    $sel_type = $_POST["sel_type"];
}

if($sel_type=="배달 무료"){
    echo "<input type='text' id='sale' name='coupon_sale' value='2500' readonly>";
}else if($sel_type=="금액 할인"||$sel_type=="비율 할인"){
    echo "<input type='text' id='sale' name='coupon_sale' value=''>";
}

?>