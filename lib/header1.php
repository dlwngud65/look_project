<html>
<head>
<script type="text/javascript"
   src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
</script>
<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
   $(document).ready(function(){
      $("#search_text2").keyup(function(){
         var search_text= $("#search_text2").val();
         if(search_text.length <= 0){
            $("#srl_box2").html("");
            $("#srl_box2").hide();
         }else{
            $.ajax({
               type : "post",
               url : "./lib/search_result2.php",
               data : "search_text="+search_text+"&page=1",
               success : function(data){
                  $("#srl_box2").css("border", "1px solid black")
                  $("#srl_box2").html(data);
                  $("#srl_box2").show();
               }
            });
         }
      });
   });
   
   $(document).ready(function(){
      $("#search_text2").keypress(function(e) {
         $("#srl_box2").css("border", "1px solid black");
      })
   });
   function submit2(){
      if(!document.getElementById("search_text2").value){
         alert("검색내용을 입력하세요!");
         return;
      }
      document.search_text2.submit();
   }
</script>
</head>
<?php
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_rank = $_SESSION['user_rank'];
?>
<?php
if (isset($user_id)) {
    ?>
<?php if(strlen($user_id) < 8){
    $sql = "select * from admin_common where id='$user_id'";
    $result = mysqli_query($con, $sql) or die("실패원인 1 : ".mysqli_error($con));
    $row=mysqli_fetch_array($result) or die("실패원인 2 : ".mysqli_error($con));
    $basic_authority=$row['basic_authority'];
    $product_authority=$row['product_authority'];
    $order_authority=$row['order_authority'];
    $member_authority=$row['member_authority'];
    $notice_authority=$row['notice_authority'];
    $sale_authority=$row['sale_authority'];
    $coupon_authority=$row['coupon_authority'];
    ?>
<header>
   <div id="Menu_box">
      <a href="./product_list/product_list_main.php?mode=Ranking" class="Menu">Ranking</a> <a
         href="./product_list/product_list_main.php?mode=top" class="Menu">Shirt&Suit</a>
      <a href="./product_list/product_list_main.php?mode=pants" class="Menu"
         class="Menu">Pants</a> <a
         href="./product_list/product_list_main.php?mode=shoes" class="Menu"
         class="Menu">Shoes</a>
   </div>
   <div id="Main_logo">
      <a href="index.php"><img src="./img/Logo.png" onclick="Main()"></a>
   </div>
   <div id="Login_box">
      <a href="./login/logout.php" class="Login">LOGOUT</a> <a
         href="./q&a/qa_main.php?mode=all&page=1" class="Login">Q & A</a> <a
         href="./q&a/qa_main.php?mode=notice" class="Login">NOTICE</a><a
         href="./event/event.php" class="Login">EVENT</a> 
      <?php 
      if($basic_authority=="y"){
          echo "<a href='./admin/admin_main.php?mode=common&select=common_sub1' class='Login'>MYADMIN</a><br>";
      }else if($product_authority=="y"){
          echo "<a href='./admin/admin_main.php?mode=product&select=product_sub1' class='Login'>MYADMIN</a><br>";
      }else if($order_authority=="y"){
          echo "<a href='./admin/admin_main.php?mode=order&select=order_sub1' class='Login'>MYADMIN</a><br>";
      }else if($member_authority=="y"){
          echo "<a href='./admin/admin_main.php?mode=member&select=member_sub1' class='Login'>MYADMIN</a><br>";
      }else if($notice_authority=="y"){
          echo "<a href='./admin/admin_main.php?mode=notice&select=notice_sub1' class='Login'>MYADMIN</a><br>";
      }else if($coupon_authority=="y"){
          echo "<a href='./admin/admin_main.php?mode=coupon&select=coupon_sub1' class='Login'>MYADMIN</a><br>";
      }
      ?>
      <form name="search_text2" action="./search/search.php" method="post"
         onsubmit="return false">
         <div id="search">

            <input type="text" id="search_text2" name="search_text2" autofocus
               autocomplete="off"><input type="image"
               src="./img/search_button.png" onclick="submit2()"; returnflase;>

         </div>
      </form>
   </div>
</header>
<?php }else{?>
<header>
   <div id="Menu_box">
      <a href="./product_list/product_list_main.php?mode=Ranking" class="Menu">Ranking</a> <a
         href="./product_list/product_list_main.php?mode=top" class="Menu">Shirt&Suit</a>
      <a href="./product_list/product_list_main.php?mode=pants" class="Menu"
         class="Menu">Pants</a> <a
         href="./product_list/product_list_main.php?mode=shoes" class="Menu"
         class="Menu">Shoes</a>
   </div>
   <div id="Main_logo">
      <a href="index.php"><img src="./img/Logo.png" onclick="Main()"></a>
   </div>
   <div id="Login_box">
      <a href="./login/logout.php" class="Login">LOGOUT</a> <a
         href="./q&a/qa_main.php?mode=all&page=1" class="Login">Q & A</a> <a
         href="./q&a/qa_main.php?mode=notice" class="Login">NOTICE</a><a
         href="./event/event.php" class="Login">EVENT</a> <a
         href="./mypage/mypage_main.php?mode=mycart" class="Login">CART</a> <a
         href="./product_list/order_product.php" class="Login">ORDER</a> <a
         href="./mypage/mypage_main.php?mode=mypage" class="Login">MY PAGE</a><br>
      <form name="search_text2" action="./search/search.php" method="post"
         onsubmit="return false">
         <div id="search">

            <input type="text" id="search_text2" name="search_text2" autofocus
               autocomplete="off"><input type="image"
               src="./img/search_button.png" onclick="submit2()"; returnflase;>

         </div>
      </form>
   </div>
</header>
<?php }?>
<?php }else{?>
<header>
   <div id="Menu_box">
      <a href="./product_list/product_list_main.php?mode=Ranking" class="Menu">Ranking</a> <a
         href="./product_list/product_list_main.php?mode=top" class="Menu">Shirt&Suit</a>
      <a href="./product_list/product_list_main.php?mode=pants" class="Menu"
         class="Menu">Pants</a> <a
         href="./product_list/product_list_main.php?mode=shoes" class="Menu"
         class="Menu">Shoes</a>
   </div>
   <div id="Main_logo">
      <a href="index.php"><img src="./img/Logo.png" onclick="Main()"></a>
   </div>
   <div id="Login_box">
      <a href="./login/login.php" class="Login">LOGIN</a> <a
         href="./member/agreement.php" class="Login">JOIN US</a> <a
         href="./q&a/qa_main.php?mode=all&page=1" class="Login">Q & A</a> <a
         href="./q&a/qa_main.php?mode=notice" class="Login">NOTICE</a><a
         href="./event/event.php" class="Login">EVENT</a><br>
      <form name="search_text2" action="./search/search.php" method="post"
         onsubmit="return false">
         <div id="search">

            <input type="text" id="search_text2" name="search_text2" autofocus
               autocomplete="off"><input type="image"
               src="./img/search_button.png" onclick="submit2()"; returnflase;>

         </div>
      </form>
   </div>
</header>
<?php }?>
</html>