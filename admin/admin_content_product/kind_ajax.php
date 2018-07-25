<?php

if(!empty($_POST["goods_kind"])){
    $goods_kind = $_POST["goods_kind"];
}
if($goods_kind=="shoes"){
    echo"                260mm : <input type='number' name='shsize_260' min='1'>
                   270mm : <input type='number' name='shsize_270' min='1'>
                   280mm : <input type='number' name='shsize_280' min='1'>
                   290mm : <input type='number' name='shsize_290' min='1'>
                   300mm : <input type='number' name='shsize_300' min='1'>";
}else if($goods_kind == "top" || $goods_kind == "pants"){
    echo"          S : <input type='number' name='gsize_s' min='1'>
                   M : <input type='number' name='gsize_m' min='1'>
                   L : <input type='number' name='gsize_l' min='1'>
                   XL : <input type='number' name='gsize_xl' min='1'>
                   FREE : <input type='number' name='gsize_free' min='1'>";
    
}else{
    
}

?>