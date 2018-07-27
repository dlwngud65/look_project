<?php
session_start();
$mode = $_GET['mode'];
$select = $_GET['select'];
?>
<html>
<head>
<title>Look&</title>
<meta charset="utf-8">
<link href="./admin_css/admin_main3.css" rel="stylesheet" type="text/css">
<link href="./admin_css/admin_nav.css" rel="stylesheet" type="text/css">
<link href="./admin_css/admin_content_common3.css" rel="stylesheet" type="text/css">
<link href="./admin_css/admin_content_product5.css" rel="stylesheet" type="text/css">
<link href="./admin_css/admin_content_order.css?v=v1" rel="stylesheet" type="text/css">
<link href="./admin_css/admin_content_member.css?v=v1" rel="stylesheet" type="text/css">
<link href="./admin_css/admin_content_notice.css" rel="stylesheet" type="text/css">
<link href="./admin_css/admin_content_sale.css" rel="stylesheet" type="text/css">
<link href="./admin_css/admin_content_coupon.css?v=v1" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../img/look.png" type="image/x-icon">

<script type="text/javascript">
</script>
</head>
<body>
	<div class="basic_shape">
		<?php include "./admin_lib/header.php";?>
		<div id="basic_shape2">
			<nav id="admin_main_nav">
				<div id="admin_sub_menu"><?php include "./admin_lib/sub_menu1.php";?></div>
				<?php if($mode == 'common'){
				?>
				<div id="admin_content"><?php include "./admin_content_common/admin_content_common.php";?></div>
				<?php }?>
				<?php if($mode == 'product'){
				?>
				<div id="admin_content"><?php include "./admin_content_product/admin_content_product.php";?></div>
				<?php }?>
				<?php if($mode == 'order'){
				?>
				<div id="admin_content"><?php include "./admin_content_order/admin_content_order.php";?></div>
				<?php }?>
				<?php if($mode == 'member'){
				?>
				<div id="admin_content"><?php include "./admin_content_member/admin_content_member.php";?></div>
				<?php }?>
				<?php if($mode == 'notice'){
				?>
				<div id="admin_content"><?php include "./admin_content_notice/admin_content_notice.php";?></div>
				<?php }?>
				<?php if($mode == 'sale'){
				?>
				<div id="admin_content"><?php include "./admin_content_sale/admin_content_sale.php";?></div>
				<?php }?>
				<?php if($mode == 'coupon'){
				?>
				<div id="admin_content"><?php include "./admin_content_coupon/admin_content_coupon.php";?></div>
				<?php }?>
			</nav>
		</div>
	</div>
</body>
</html>