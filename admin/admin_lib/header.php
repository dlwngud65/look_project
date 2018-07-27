<?php
session_start();
$mode = $_GET['mode'];
include_once '../lib/dbconn.php';

$sql = "select * from admin_common where id='{$_SESSION['user_id']}'";
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
<html>
<header>
   <div id="admin_log">
      LooK& 쇼핑몰관리 <img src="./admin_img/look.png">
   </div>
   <div id="admin_menu_bar">
   <?php 
   if($basic_authority=="y"){
       echo "<a id='img1' href='./admin_main.php?mode=common&select=common_sub1'></a>";
   }
   ?>
   <?php 
   if($product_authority=="y"){
       echo "<a id='img2' href='./admin_main.php?mode=product&select=product_sub1'></a>";
   }
   ?>
   <?php 
   if($order_authority=="y"){
       echo "<a id='img3' href='./admin_main.php?mode=order&select=order_sub1'></a>";
   }
   ?>
   <?php 
   if($member_authority=="y"){
       echo "<a id='img4' href='./admin_main.php?mode=member&select=member_sub1'></a>";
   }
   ?>
   <?php 
   if($notice_authority=="y"){
       echo "<a id='img5' href='./admin_main.php?mode=notice&select=notice_sub1'></a>";
   }
   ?>
   <?php 
   if($sale_authority=="y"){
       echo "<a id='img6' href='./admin_main.php?mode=sale&select=sale_sub1'></a>";
   }
   ?>
   <?php 
   if($coupon_authority=="y"){
       echo "<a id='img7' href='./admin_main.php?mode=coupon&select=coupon_sub1'></a>";
   }
   ?>
   <a id='img8' href='../login/logout.php'></a>
   <a id='img9' href='../index.php'></a>
   </div>
   <hr>
</header>
</html>