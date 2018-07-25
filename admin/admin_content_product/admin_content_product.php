<?php
/*
 *  goods테이블 생성
 *   */
include_once '../lib/dbconn.php';

if(!empty($_GET['mode'])){
    $mode = $_GET['mode'];
}
if(!empty($_GET['select'])){
    $select = $_GET['select'];
}

$flag="NO";
$sql = "show tables from lookdb";
$result = mysqli_query($con, $sql) or die("실패원인:".mysqli_error($con));

while($row=mysqli_fetch_row($result)){
    if($row[0]==="goods"){
        $flag ="OK";
        break;
    }
}

if($flag !=="OK"){
    $sql= "create table goods(
                goods_num char(20) not null,
                goods_name char(15) not null,
                goods_kind  char(10) not null,
                goods_price  char(15) not null,
                goods_content char(100) not null,
                goods_dc char(3),
                goods_color0 char(10),
                goods_color1 char(10),
                goods_color2 char(10),
                goods_color3 char(10),
                goods_color4 char(10),
                gsize_s int,
                gsize_m int,
                gsize_l int,
                gsize_xl int,
                gsize_free int,
                shsize_260 int,
                shsize_270 int,
                shsize_280 int,
                shsize_290 int,
                shsize_300 int,
                regist_day char(20),
                best_check char(1),
                file_name_0 char(40),
                file_name_1 char(40),
                file_name_2 char(40),
                file_name_3 char(40),
                file_name_4 char(40),
                file_name_5 char(40),
                file_name_6 char(40),
                file_name_7 char(40),
                file_name_8 char(40),
                file_name_9 char(40),
                file_copied_0 char(40),
                file_copied_1 char(40),
                file_copied_2 char(40),
                file_copied_3 char(40),
                file_copied_4 char(40),
                file_copied_5 char(40),
                file_copied_6 char(40),
                file_copied_7 char(40),
                file_copied_8 char(40),
                file_copied_9 char(40),
                recommend1 char(15),
                recommend2 char(15),
                recommend3 char(15),
                order_hit int default 0,
                primary key(goods_num)
               )";
    if(mysqli_query($con,$sql)){
        echo "<script>alert('goods 테이블이 생성되었습니다.')</script>";
    }else{
        echo "실패원인:".mysqli_query($con);
    }
}

?>

<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">


/////////////////////////////////////상품등록 start
var x;
var y;

function add_color(){
   
   var div = document.createElement('color');
    div.innerHTML = "<input type='color' name='goods_color[]'> ";  
    document.getElementById('color').appendChild(div);
}


//    , ----를 위한 함수.
function numberWithCommas() {
   x = document.getElementById('goods_price').value;
   y = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
   
}


 function insert_click(){
   
   if(!document.getElementById('goods_name').value){
      alert('상품명을 입력하세요.');
      document.getElementById('goods_name').focus();
      return;
   }
   
   if(document.getElementById('goods_name').value.length>15){
      alert('상품명은 15자 이내로 입력바랍니다.');
      document.getElementById('goods_name').focus();
      return;
   }
   if(!document.getElementById('goods_num').value){
      alert('상품등록번호를 입력하세요.');
      document.getElementById('goods_num').focus();
      return;
   }
   if(document.getElementById('goods_num').value.length>20){
	   alert('상품등록번호는 20자 이내로 입력바랍니다.');
	   document.getElementById('goods_num').focus();
	   return;
	}
   if('choice' == document.getElementById('goods_kind').value){
      alert('상품종류를 선택해주세요.');
      document.getElementById('goods_kind').focus();
      return;
   }
   
   if(!document.getElementById('goods_content').value){
      alert('상품 설명을 입력해주세요.');
      document.getElementById('goods_content').focus();
      return;
   }
   
   var goods_content = document.getElementById('goods_content').value;
   if(goods_content.length>101){
      alert('상품 설명 100자 이내로 입력바랍니다.');
      document.getElementById('goods_content').focus();
      return;
   }
   
   if(y){
     document.getElementById("goods_comma_price").value = y;      
   }
   document.insert_form.submit();
} 

//ajax를 이용하여 사이즈부분 해결 
$(document).ready(function(){
   
   $("#goods_kind").click(function(){
      
      var goods_kind = $("#goods_kind").val();
      
      if(goods_kind){
         $.ajax({
                type : "post",
                url : "./admin_content_product/kind_ajax.php",
                data : "goods_kind="+goods_kind+"&index=ok",
                success : function(data){
                   $("#size").html(data);
                }
             });
      }
   });
   
});
/////////////////////////////////////상품등록 end
function del_goods(num){
   
   var res = confirm('삭제하시겠습니까?');
   if(res){
   location.href="./admin_content_product/delete_goods.php?num="+num;
   }
}

//베스트 상품
 function best_check(num){
   
    location.href="./admin_content_product/best_checkgoods.php?num="+num;
}

//추천 상품 등록
 function add_recommend_product(a){
      window.open('admin_content_product/recommend_product.php?goods_num='+a+'','','left=500,top=200, width=430, height=740, status=no, scrollbars=no, resizable=no');
   }

</script>
<?php

// 제품관리부분
if ($mode == 'product' && $select == 'product_sub1') {
    
    if(!empty($_GET['goods_num'])){
        $goods_num = $_GET['goods_num'];
    }
    
    
if(!$goods_num){
?>
<form name="insert_form" action="./admin_content_product/insert_goods.php" method="post" enctype="multipart/form-data">
<br>
<div id='admin_common_sub1'>
   <b>상품등록</b>
   <hr>
</div>
<br>
<div id='title1'>
   <b id='title2'>*</b> 신상품 등록
</div>

<table>
   <tr>
      <td class='td1'><b>*</b> 상품명</td>
      <td class='td2'><input type='text' id='goods_name' name='goods_name'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 상품등록번호</td>
      <td class='td2'><input type='text' id='goods_num' name='goods_num'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 상품종류</td>
      <td class='td2'><select id="goods_kind" name='goods_kind'>
            <option value="choice">choice</option>
            <option value='top'>top</option>
            <option value='pants'>pants</option>
            <option value='shoes'>shoes</option>
      </select></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 상품가</td>
      <td class='td2'><input type='text' id='goods_price' onblur="numberWithCommas()"></td>
      <input type="hidden" id="goods_comma_price"  name='goods_price'>
   </tr>
   <tr>
      <td class='td1'><b>*</b>할인적용</td>
      <td class='td2'><input type='text' id ='sale' name='goods_dc'> %</td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 색상</td>
      
      <td class='td2'><input type='color' id='color_type'  name='goods_color[]'  > <span id='color'></span>
         <input id='add'  type='button' onclick='add_color()' style="vertical-align: -5px;"></input></td>
   </tr>
   <tr>
   
      <td class='td1'><b>*</b> 사이즈</td>
      <td class='td2'><div id="size"></td></div>
   
   </tr>
   <tr>
      <td class='td1'><b>*</b> 상품 메인 사진</td>
      <td class='td2'><input type='file' name='upfile[]'><br>
      <br> <input type='file' name='upfile[]'><br>
      <br> <input type='file' name='upfile[]'><br>
      <br> <input type='file' name='upfile[]'><br>
      <br> <input type='file' name='upfile[]'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 상품 추가 사진</td>
      <td class='td2'><input type='file' name='upfile[]'><br>
      <br> <input type='file' name='upfile[]'><br>
      <br> <input type='file' name='upfile[]'><br>
      <br> <input type='file' name='upfile[]'><br>
      <br> <input type='file' name='upfile[]'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 상품 설명</td>
      <td class='td2'><textarea cols='110' rows='5' id='goods_content' name='goods_content'></textarea></td>
   </tr>
</table>
<div id='save'>
   <input type='button' id='save_button' onclick="insert_click()" value='등록'></input>
</div>
</form><!--end of insert form  -->
<?php 
}else{
    //상품 수정.
    $sql= "select * from goods where goods_num = '$goods_num'";
    
    $result= mysqli_query($con, $sql) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);
    
?>
<form name="insert_form" action="./admin_content_product/insert_goods.php?status=modify" method="post" enctype="multipart/form-data">
<br>
<div id='admin_common_sub1'>
   <b>상품수정</b>
   <hr>
</div>
<br>
<div id='title1'>
   <b id='title2'>*</b> 상품 수정
</div>

<table>
   <tr>
      <td class='td1'><b>*</b> 상품명</td>
      <td class='td2'><input type='text' id='goods_name' name='goods_name' value=<?=$row['goods_name'] ?>></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 상품등록번호</td>
      <td class='td2'><input type='text' id='goods_num' name='goods_num' readonly value=<?=$row['goods_num'] ?>></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 상품종류</td>
      <td class='td2'><select id='goods_kind' name='goods_kind'>
      <option value=<?=$row['goods_kind']?>><?=$row['goods_kind']?></option>
      </select>
     </td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 상품가</td>
      <td class='td2'><input type='text' id='goods_price'  onblur="numberWithCommas()" value=<?=$row['goods_price'] ?>></td>
      <input type="hidden" id="goods_comma_price"  name='goods_price' value=<?=$row['goods_price'] ?>>
   </tr>
   <tr>
      <td class='td1'><b>*</b>할인적용</td>
      <td class='td2'><input type='text' id ='sale' name='goods_dc' value=<?=$row['goods_dc'] ?>> %</td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 색상</td>
      
      <td class='td2'> <span id='color'></span>
         <?php 
             if($row['goods_color0']!=""){
                  echo"<input type='color' id='color_type'  name='goods_color[]' value='{$row['goods_color0']}'>";
             }
             if($row['goods_color1']!=""){
                  echo"<input type='color' id='color_type'  name='goods_color[]' value='{$row['goods_color1']}'>";
             }
             if($row['goods_color2']!=""){
                  echo"<input type='color' id='color_type'  name='goods_color[]' value='{$row['goods_color2']}'>";
             }
             if($row['goods_color3']!=""){
                  echo"<input type='color' id='color_type'  name='goods_color[]' value='{$row['goods_color3']}'>";
             }
             if($row['goods_color4']!=""){
                  echo"<input type='color' id='color_type'  name='goods_color[]' value='{$row['goods_color4']}'>";
             }
              ?>
         <input id='add'  type='button' onclick='add_color()' style="vertical-align: -5px;"></input></td>
   </tr>
   <tr>
   
      <td class='td1'><b>*</b> 사이즈</td>
      <td class='td2'><div>
      
      <?php 
      if($row['goods_kind'] == "top" || $row['goods_kind'] == "pants"){
          echo"    S : <input type='number' name='gsize_s' value='{$row['gsize_s']}' min='1'>
                   M : <input type='number' name='gsize_m' value='{$row['gsize_m']}' min='1'>
                   L : <input type='number' name='gsize_l' value='{$row['gsize_l']}' min='1'>
                   XL : <input type='number' name='gsize_xl' value='{$row['gsize_xl']}' min='1'>
                   FREE : <input type='number' name='gsize_free' value='{$row['gsize_free']}' min='1'>";
       
      }else{
          echo"    260mm : <input type='number' name='shsize_260' value='{$row['shsize_260']}' min='1'>
                   270mm : <input type='number' name='shsize_270' value='{$row['shsize_270']}' min='1'>
                   280mm : <input type='number' name='shsize_280' value='{$row['shsize_280']}' min='1'>
                   290mm : <input type='number' name='shsize_290' value='{$row['shsize_290']}' min='1'>
                   300mm : <input type='number' name='shsize_300' value='{$row['shsize_300']}' min='1'>";
      }
    
      
      ?>
      
      </td></div>
   
   </tr>
   <tr>
      <td class='td1'><b>*</b> 상품 메인 사진</td>
      <td class='td2'>
      <?php if($row[file_name_0]){
          echo"{$row[file_name_0]}파일이 저장되어 있습니다.";
            echo"<input type='file' name='upfile[]' style='display: none;'> <a
            id='delete_banner'
            href='./admin_content_product/delete_img_goods.php?delete=file0&num={$row['goods_num']}'>x</a>";
      }else{
      echo"<input type='file' name='upfile[]'>";
      }
      ?><br>
      <br><?php if($row[file_name_1]){
          echo"{$row[file_name_1]}파일이 저장되어 있습니다.";
            echo"<input type='file' name='upfile[]' style='display: none;'> <a
            id='delete_banner'
            href='./admin_content_product/delete_img_goods.php?delete=file1&num={$row['goods_num']}'>x</a>";
      }else{
      echo"<input type='file' name='upfile[]'>";
      }
      ?><br>
      <br><?php if($row[file_name_2]){
          echo"{$row[file_name_2]}파일이 저장되어 있습니다.";
            echo"<input type='file' name='upfile[]' style='display: none;'> <a
            id='delete_banner'
            href='./admin_content_product/delete_img_goods.php?delete=file2&num={$row['goods_num']}'>x</a>";
      }else{
      echo"<input type='file' name='upfile[]'>";
      }
      ?><br>
      <br><?php if($row[file_name_3]){
          echo"{$row[file_name_3]}파일이 저장되어 있습니다.";
            echo"<input type='file' name='upfile[]' style='display: none;'> <a
            id='delete_banner'
            href='./admin_content_product/delete_img_goods.php?delete=file3&num={$row['goods_num']}'>x</a>";
      }else{
      echo"<input type='file' name='upfile[]'>";
      }
      ?><br>
      <br>
      <?php if($row[file_name_4]){
          echo"{$row[file_name_4]}파일이 저장되어 있습니다.";
            echo"<input type='file' name='upfile[]' style='display: none;'> <a
            id='delete_banner'
            href='./admin_content_product/delete_img_goods.php?delete=file4&num={$row['goods_num']}'>x</a>";
      }else{
        echo"<input type='file' name='upfile[]'>";
      }
      ?></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 상품 추가 사진</td>
      <td class='td2'><?php if($row[file_name_5]){
          echo"{$row[file_name_5]}파일이 저장되어 있습니다.";
            echo"<input type='file' name='upfile[]' style='display: none;'> <a
            id='delete_banner'
            href='./admin_content_product/delete_img_goods.php?delete=file5&num={$row['goods_num']}'>x</a>";
      }else{
      echo"<input type='file' name='upfile[]'>";
      }
      ?><br>
      <br>
      <?php if($row[file_name_6]){
          echo"{$row[file_name_6]}파일이 저장되어 있습니다.";
            echo"<input type='file' name='upfile[]' style='display: none;'> <a
            id='delete_banner'
            href='./admin_content_product/delete_img_goods.php?delete=file6&num={$row['goods_num']}'>x</a>";
      }else{
      echo"<input type='file' name='upfile[]'>";
      }
      ?><br>
      <br><?php if($row[file_name_7]){
          echo"{$row[file_name_7]}파일이 저장되어 있습니다.";
            echo"<input type='file' name='upfile[]' style='display: none;'> <a
            id='delete_banner'
            href='./admin_content_product/delete_img_goods.php?delete=file7&num={$row['goods_num']}'>x</a>";
      }else{
      echo"<input type='file' name='upfile[]'>";
      }
      ?><br>
      <br><?php if($row[file_name_8]){
          echo"{$row[file_name_8]}파일이 저장되어 있습니다.";
            echo"<input type='file' name='upfile[]' style='display: none;'> <a
            id='delete_banner'
            href='./admin_content_product/delete_img_goods.php?delete=file8&num={$row['goods_num']}'>x</a>";
      }else{
      echo"<input type='file' name='upfile[]'>";
      }
      ?><br>
      <br><?php if($row[file_name_9]){
          echo"{$row[file_name_9]}파일이 저장되어 있습니다.";
            echo"<input type='file' name='upfile[]' style='display: none;'> <a
            id='delete_banner'
            href='./admin_content_product/delete_img_goods.php?delete=file9&num={$row['goods_num']}'>x</a>";
      }else{
      echo"<input type='file' name='upfile[]'>";
      }
      ?></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 상품 설명</td>
      <td class='td2'><textarea cols='110' rows='5' id='goods_content' name='goods_content'><?=$row['goods_content']?></textarea></td>
   </tr>
</table>
<div id='save'>
   <input type='button' id='save_button' onclick="insert_click()" value='수정'></input>
</div>
</form><!--end of modi form  -->

<?php 
    }
?>
<?php
} else if ($mode == 'product' && $select == 'product_sub2') {
      
    if(!empty($_GET['status'])){
        $status = $_GET['status'];
    }
    
    if(!empty($_POST['search'])){
        $search = $_POST['search'];
    }
    
    if($status=='search'){
        
        $sql= "select * from goods where goods_name like '%$search%' order by goods_kind desc";
        
    }else if( $status != 'search' || !$search){
        $sql= "select * from goods order by goods_kind desc";
    }
    
    $result= mysqli_query($con, $sql) or die(mysqli_error($con));
    
    $total_record=mysqli_num_rows($result);
    
    // 페이지 당 글수, 블럭당 페이지 수
    $rows_scale=10;
    $pages_scale=10;
    
    // 전체 페이지 수 ($total_page) 계산
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
    $number=$total_record- $start_row;
    ?><br>
<div id='admin_common_sub1'>
   <b>상품 수정&삭제</b>
   <hr>
</div>
<br>
<div id='title1'>
   <b id='title2'>*</b> 상품리스트
</div>

<table>
  <form name="search_form" action="./admin_main.php?mode=product&select=product_sub2&status=search" method="post">
   <tr>
      <td colspan='5' style='text-align: right'><input id='search'
         name='search'type='text' ><button id='search_button'>검색</button></td>
   </tr>
 </form>

   <tr>
      <td id='num' class='td4'>NO</td>
      <td class='td4'>상품명</td>
      <td class='td4'>상품종류</td>
      <td class='td4'>상품가</td>
      <td id='num' class='td4'></td>
   </tr>
   
   <?php 

   for ($i=$start_row; ($i<$start_row+$rows_scale) && ($i< $total_record); $i++){
       mysqli_data_seek($result, $i);
       $row = mysqli_fetch_array($result);   
       $goods_num = $row[goods_num];
       $goods_name = $row[goods_name];
       $goods_kind = $row[goods_kind];
       $goods_price = $row[goods_price];
       $best_check=$row['best_check'];
       $goods_price.="원";
        
   ?>
   <tr> 
      <td id='num' class='td4'><?= $number ?></td>
      <td class='td4'><?= $goods_name?></td>
      <td class='td4'><?= $goods_kind ?></td>
      <td class='td4'><?= $goods_price?></td>
      <td class='td4' style='text-align: right'>
      <a href="./admin_main.php?mode=product&select=product_sub1&goods_num=<?=$goods_num?>"><button id="modi"></button></a>
      <?php 
      if($best_check=='y'){
         
          ?>
           <input type="button" id=beston onclick="best_check('<?=$goods_num?>')"></input>
       <?php     
      }else{
          ?>
          <input type="button" id=bestoff onclick="best_check('<?=$goods_num?>')"></input>
      <?php 
      }
      ?>
      <input type="button" id=del onclick="del_goods('<?=$goods_num?>')"></input>
         </td>
   </tr>
   <?php
  
   $number--;
    }
    //밑에 페이지 나누는거 해야되용. 버튼 인풋으로 바꿔야되용
   ?>
</table>
   <div id='page_box'>
<?PHP 
                #----------------이전블럭 존재시 링크------------------#
                if($start_page > $pages_scale){
                   $go_page= $start_page - $pages_scale;
                   
                     echo "<a id='before_block' href='admin_main.php?mode=product&select=product_sub2&page=$go_page'> << </a>";   
                   
                }
                #----------------이전페이지 존재시 링크------------------#
                if($pre_page){
                   echo "<a id='before_page' href='admin_main.php?mode=product&select=product_sub2&page=$pre_page'> < </a>";
                }
                 #--------------바로이동하는 페이지를 나열---------------#
                for($dest_page=$start_page;$dest_page <= $end_page;$dest_page++){
                   if($dest_page == $page){
                        echo( "&nbsp;<b id='present_page'>$dest_page</b>&nbsp" );
                    }else{
                        echo "<a id='move_page' href='admin_main.php?mode=product&select=product_sub2&page=$dest_page'>$dest_page</a>";
                    }
                 }
                 #----------------이전페이지 존재시 링크------------------#
                 if($next_page){  
                    echo "<a id='next_page' href='admin_main.php?mode=product&select=product_sub2&page=$next_page'> > </a>";
                 }
                 #---------------다음페이지를 링크------------------#
                if($total_pages >= $start_page+ $pages_scale){
                  $go_page= $start_page+ $pages_scale;
                   echo "<a id='next_block' href='admin_main.php?mode=product&select=product_sub2&page=$go_page'> >> </a>";
                 }
       ?>      
   </div>
   
<?php
} else if ($mode == 'product' && $select == 'product_sub3') {
    $y='y';
    
    $sql= "select * from goods where best_check='$y' order by goods_kind desc";
    
    $result= mysqli_query($con, $sql) or die(mysqli_error($con));
    $total_record=mysqli_num_rows($result);
    
    // 페이지 당 글수, 블럭당 페이지 수
    $rows_scale=10;
    $pages_scale=10;
    
    // 전체 페이지 수 ($total_page) 계산
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
    $number=$total_record- $start_row;
    
    ?> <br>
<div id='admin_common_sub1'>
   <b>베스트 상품</b>
   <hr>
</div>
<br>
<div id='title1'>
   <b id='title2'>*</b> 베스트 상품 리스트
</div>
<table>
   
   <tr>
      <td id='num' class='td4'>NO</td>
      <td class='td4'>상품명</td>
      <td class='td4'>상품종류</td>
      <td class='td4'>상품가</td>
      <td id='num' class='td4'></td>
   </tr>
    <?php 

        for ($i=$start_row; ($i<$start_row+$rows_scale) && ($i< $total_record); $i++){
            mysqli_data_seek($result, $i);
            $row = mysqli_fetch_array($result);   
            $goods_num = $row[goods_num];
            $goods_name = $row[goods_name];
            $goods_kind = $row[goods_kind];
            $goods_price = $row[goods_price];
            $goods_price.="원";
    
   ?>
   <tr>
      <td id='num' class='td4'><?= $number ?></td>
      <td class='td4'><?= $goods_name?></td>
      <td class='td4'><?= $goods_kind ?></td>
      <td class='td4'><?= $goods_price?></td>
      <td class='td4' style='text-align: right'>
      
         <input type="button" id=del onclick="best_check('<?=$goods_num?>')"></td>
   </tr>
   <?php
  
   $number--;
    }
    //밑에 페이지 나누는거 해야되용. 버튼 인풋으로 바꿔야되용
   ?>
</table>
<?php
} else if ($mode == 'product' && $select == 'product_sub4') {
    if (! empty($_GET['status'])) {
        $status = $_GET['status'];
    }
    
    if (!empty($_POST['search'])) {
        $search = $_POST['search'];
    }
    
    if ($status == 'search') {
        
        $sql = "select * from goods where goods_name like '%$search%' order by goods_kind desc";
    } else if ($status != 'search' || ! $search) {
        $sql = "select * from goods order by goods_kind desc";
    }
    
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    
    $total_record = mysqli_num_rows($result);
    
    // 페이지 당 글수, 블럭당 페이지 수
    $rows_scale = 10;
    $pages_scale = 10;
    
    // 전체 페이지 수 ($total_page) 계산
    $total_pages = ceil($total_record / $rows_scale);
    
    if (empty($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $start_row = $rows_scale * ($page - 1);
    $pre_page = $page > 1 ? $page - 1 : NULL;
    $next_page = $page < $total_pages ? $page + 1 : NULL;
    $start_page = (ceil($page / $pages_scale) - 1) * $pages_scale + 1;
    $end_page = ($total_pages >= ($start_page + $pages_scale)) ? $start_page + $pages_scale - 1 : $total_pages;
    $number = $total_record - $start_row;
    ?> <br>
<div id='admin_common_sub1'>
   <b>추천 상품 등록</b>
   <hr>
</div>
<br>
<div id='title1'>
   <b id='title2'>*</b> 상품 리스트
</div>
<table>
  <form name="search_form" action="./admin_main.php?mode=product&select=product_sub2&status=search" method="post">
   <tr>
      <td colspan='5' style='text-align: right'><input id='search'
         name='search'type='text' ><button id='search_button'>검색</button></td>
   </tr>
 </form>
   <tr>
      <td id='num' class='td4'>NO</td>
      <td class='td4'>상품명</td>
      <td class='td5'>추천상품</td>
      <td id='num' class='td4'></td>
   </tr>
   <?php
    
    for ($i = $start_row; ($i < $start_row + $rows_scale) && ($i < $total_record); $i ++) {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);
        $goods_num = $row[goods_num];
        $goods_name = $row[goods_name];
        $goods_kind = $row[goods_kind];
        $goods_price = $row[goods_price];
        $goods_price .= "원";
        $goods_recommend1 = $row[recommend1];
        $goods_recommend2 = $row[recommend2];
        $goods_recommend3 = $row[recommend3];
        
        ?>
   <tr>
      <td id='num' class='td4'><?=$number?></td>
      <td class='td4'><?=$goods_name?></td>
      <td class='td6'>
      <?php
     
      if($goods_recommend1){
          echo"<a href='./admin_content_product/recommend_delete.php?goods_num=$goods_num&goods_recommend=1'><input type='button' id=del style='vertical-align: -6.5px;'></input></a>$goods_recommend1";
      }
      if($goods_recommend2){
          echo"<a href='./admin_content_product/recommend_delete.php?goods_num=$goods_num&goods_recommend=2'><input type='button' id=del style='vertical-align: -6.5px;'></input></a>$goods_recommend2"; 
      }
      
      if($goods_recommend3){
          echo"<a href='./admin_content_product/recommend_delete.php?goods_num=$goods_num&goods_recommend=3'><input type='button' id=del style='vertical-align: -6.5px;'></input></a>$goods_recommend3";   
      }
      
      ?></td>
      <td id='num' class='td4'><input type="button" id=add onclick="add_recommend_product('<?=$goods_num?>')"></td>
   </tr>

    <?php
        
        $number --;
    }
    // 밑에 페이지 나누는거 해야되용. 버튼 인풋으로 바꿔야되용
    ?>
</table>
<div id='page_box'>
<?PHP
    // ----------------이전블럭 존재시 링크------------------#
    if ($start_page > $pages_scale) {
        $go_page = $start_page - $pages_scale;
        echo "<a id='before_block' href='admin_main.php?mode=product&select=product_sub4&page=$go_page'> << </a>";
    }
    // ----------------이전페이지 존재시 링크------------------#
    if ($pre_page) {
        echo "<a id='before_page' href='admin_main.php?mode=product&select=product_sub4&page=$pre_page'> < </a>";
    }
    // --------------바로이동하는 페이지를 나열---------------#
    for ($dest_page = $start_page; $dest_page <= $end_page; $dest_page ++) {
        if ($dest_page == $page) {
            echo ("&nbsp;<b id='present_page'>$dest_page</b>&nbsp");
        } else {
            echo "<a id='move_page' href='admin_main.php?mode=product&select=product_sub4&page=$dest_page'>$dest_page</a>";
        }
    }
    // ----------------이전페이지 존재시 링크------------------#
    if ($next_page) {
        echo "<a id='next_page' href='admin_main.php?mode=product&select=product_sub4&page=$next_page'> > </a>";
    }
    // ---------------다음페이지를 링크------------------#
    if ($total_pages >= $start_page + $pages_scale) {
        $go_page = $start_page + $pages_scale;
        echo "<a id='next_block' href='admin_main.php?mode=product&select=product_sub4&page=$go_page'> >> </a>";
    }
    ?>      
   </div>
<?php
} else if ($mode == 'product' && $select == 'product_sub5') {
    ?>  <br>
<div id='admin_common_sub1'>
   <b>코디 세팅</b>
   <hr>
</div>
<br>
<div id='title1'>
   <b id='title2'>*</b> 코디 리스트
</div>
<table>
   <tr>
      <td colspan='5' style='text-align: right'><input id='search'
         type='text'><button id='search_button'>검색</button></td>
   
   
   <tr>
      <td id='num' class='td4'><input type='checkbox'></td>
      <td id='num' class='td4'>NO</td>
      <td class='td4'>코디 세팅명</td>
      <td id='td6' class='td6'>코디 세팅 상품목록</td>
      <td id='num' class='td4'></td>
   </tr>
   <tr>
      <td id='num' class='td4'><input type='checkbox'></td>
      <td id='num' class='td4'>1</td>
      <td class='td4'>블랙 캐쥬얼 스타일</td>
      <td id='td6' class='td6'>블랙 셔츠
         <button id=del style='vertical-align: -6.5px;'></button> 블랙 청바지
         <button id=del style='vertical-align: -6.5px;'></button> 아디다스 신발
         <button id=del style='vertical-align: -6.5px;'></button> 캐쥴얼백1호
         <button id=del style='vertical-align: -6.5px;'></button>
      </td>
      <td id='num' class='td4'><button id=add></button></td>
   </tr>
</table>
<div id='save'>
   <button id='add_button'>추가</button>
   <button id='del_button'>삭제</button>
</div>
<?php
}
?>
</html>