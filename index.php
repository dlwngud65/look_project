<?php
/*  1. event 테이블에서 y값을 가지고와 팝업창을 띄운다
 *  2. banner 테이블에 저장된 이미지를 슬라이더에 넣는다.
 *  3. goods 테이블에 베스트 체크 값을 가지고와 화면에 띄운다.
 *
 *   */



session_start();
$user_id = $_SESSION['user_id'];
include "./lib/dbconn.php"; // dconn.php 파일을 불러옴
include "./lib/total_db.php"; //  총 db 테이블 생성 파일을 불러옴
//이벤트 테이블에서 팝업 설정 시 팝업창이 뜨게 하는 곳.
$sql = "select * from event where popup_check='y'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$num = $row['num'];

if($num){
    //값이 있을 시. 함수가 실행된다.
    echo "<script>
function eventpop_up(){
        if(!document.cookie.match('close')){
          window.open('./eventpopup/popup.php?num={$num}','event', 'width=450,height=700');
}}
</script>";
}
?>
<html>
<head>
<title>Look&</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./css/main2.css?v=v9" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="./img/look.png" type="image/x-icon">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.carousel-inner>.item>img, .carousel-inner>.item>a>img {
	min-width: 1517px;
	max-width: 1517px;
	min-height: 700px;
	max-height: 700px;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
	$("#top_button").click(function() {
	    $('html, body').animate({
	        scrollTop : 0
	    }, 400);
	    return false;
	});
});
</script>
</head>
<body onload="eventpop_up()">
<div id="function_button">
	<?php if(isset($user_id)){?>
		<a id="myorder"
			href="http://localhost/look_project/mypage/mypage_main.php?mode=myorder"></a>
		<a id="wish_list"
			href="http://localhost/look_project/mypage/mypage_main.php?mode=mywishlist"></a>
		<a id="today_product"
			href="http://localhost/look_project/mypage/mypage_main.php?mode=today_product"></a>
			<?php }?>
		<input type="button" id="top_button" value="TOP">
	</div>
	<div class="basic_shape">
		<?php include "./lib/header1.php";?>
  <br>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
    <?php
    $sql = "select * from banner";
    $result = mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
    $row = mysqli_fetch_array($result);
    if (isset($row)) {
        $item_file_0 = $row['file_name_0'];
        $item_file_1 = $row['file_name_1'];
        $item_file_2 = $row['file_name_2'];
        $item_file_3 = $row['file_name_3'];
        $item_file_4 = $row['file_name_4'];
        
        $copied_file_0 = $row['file_copied_0'];
        $copied_file_1 = $row['file_copied_1'];
        $copied_file_2 = $row['file_copied_2'];
        $copied_file_3 = $row['file_copied_3'];
        $copied_file_4 = $row['file_copied_4'];
        
        $image_name[0] = "./admin/admin_content_common/data/" . $copied_file_0;
        $image_name[1] = "./admin/admin_content_common/data/" . $copied_file_1;
        $image_name[2] = "./admin/admin_content_common/data/" . $copied_file_2;
        $image_name[3] = "./admin/admin_content_common/data/" . $copied_file_3;
        $image_name[4] = "./admin/admin_content_common/data/" . $copied_file_4;
    }
    
    ?>
    <ol class="carousel-indicators">
    <?php if(!empty($item_file_0)){?>
				<li data-target="#myCarousel" data-slide-to="0" class="active"
					style="border: 2px solid black"></li>
					<?php } if (!empty($item_file_1)){?>
				<li data-target="#myCarousel" data-slide-to="1"
					style="border: 2px solid black"></li>
					<?php } if (!empty($item_file_2)){?>
				<li data-target="#myCarousel" data-slide-to="2"
					style="border: 2px solid black"></li>
					<?php }  if(!empty($item_file_3)){?>
				<li data-target="#myCarousel" data-slide-to="3"
					style="border: 2px solid black"></li>
					<?php }  if(!empty($item_file_4)){?>
				<li data-target="#myCarousel" data-slide-to="4"
					style="border: 2px solid black"></li>
					<?php }?>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
<?php if(!empty($item_file_0)){?>
				<div class="item active">
					<img
						style="min-width: 1517px; max-width: 1517px; min-height: 700px; max-width: 700px;"
						src=<?=$image_name[0] ?>>
					<div class="carousel-caption"></div>
				</div>
<?php } if (!empty($item_file_1)){?>
				<div class="item">
					<img
						style="min-width: 1517px; max-width: 1517px; min-height: 700px; max-width: 700px;"
						src="<?=$image_name[1] ?>">
					<div class="carousel-caption"></div>
				</div>
<?php } if (!empty($item_file_2)){?>
				<div class="item">
					<img
						style="min-width: 1517px; max-width: 1517px; min-height: 700px; max-width: 700px;"
						src="<?=$image_name[2] ?>">
					<div class="carousel-caption"></div>
				</div>
<?php }  if(!empty($item_file_3)){?>
				<div class="item">
					<img
						style="min-width: 1517px; max-width: 1517px; min-height: 700px; max-width: 700px;"
						src="<?=$image_name[3] ?>">
					<div class="carousel-caption"></div>
				</div>
<?php }  if(!empty($item_file_4)){?>
				<div class="item">
					<img
						style="min-width: 1517px; max-width: 1517px; min-height: 700px; max-width: 700px;"
						src="<?=$image_name[4] ?>">
					<div class="carousel-caption"></div>
				</div>
<?php }?>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" role="button"
				data-slide="prev" style="background: none;"> <span
				class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a> <a class="right carousel-control" href="#myCarousel"
				role="button" data-slide="next" style="background: none;"> <span
				class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<nav id="main_nav">
			<span id="best_logo"><b>BEST PRODUCTS</b> </span>
			<div id="best_basic">
			<?php
$sql = "select * from goods where best_check = 'y'";
$result = mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
$total = mysqli_num_rows($result);
?>
		<?php

for ($i = 0; $i < $total; $i ++) {
    mysqli_data_seek($result, $i);
    $row = mysqli_fetch_array($result);
    $name = $row['goods_name'];
    $price = $row['goods_price'];
    $color1 = $row['goods_color0'];
    $color2 = $row['goods_color1'];
    $color3 = $row['goods_color2'];
    $color4 = $row['goods_color3'];
    $color5 = $row['goods_color4'];
    $item_file_0 = $row['file_name_0'];
    $item_file_1 = $row['file_name_1'];
    $item_file_2 = $row['file_name_2'];
    $item_file_3 = $row['file_name_3'];
    $item_file_4 = $row['file_name_4'];
    
    $copied_file_0 = $row['file_copied_0'];
    $copied_file_1 = $row['file_copied_1'];
    $copied_file_2 = $row['file_copied_2'];
    $copied_file_3 = $row['file_copied_3'];
    $copied_file_4 = $row['file_copied_4'];
    
    $image_name[0] = "admin/admin_content_product/data/" . $copied_file_0;
    $image_name[1] = "admin/admin_content_product/data/" . $copied_file_1;
    $image_name[2] = "admin/admin_content_product/data/" . $copied_file_2;
    $image_name[3] = "admin/admin_content_product/data/" . $copied_file_3;
    $image_name[4] = "admin/admin_content_product/data/" . $copied_file_4;
    ?>
		<div class="best">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->

						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
<?php if(!empty($item_file_0)){?>
				<div class="item active">
								<a href="./product_list/perchase.php?product_name=<?=urlencode($name) ?>"
									id="best_a"><img
									style="min-width: 300px; max-width: 300px; min-height: 430px; max-height: 430px;"
									src=<?=$image_name[0] ?>>
									<div id="price"
										style="min-width: 300px; max-width: 300px; min-height: 110px; max-height: 110px;">
										<span id="price2"><?=$name ?><br>KRW <?=$price ?><br>
									<?php if($color1 != ""){?>
									<span id="price3" style="background-color: <?=$color1 ?>"></span>
									<?php }?>
									<?php if($color2 != ""){?>
									<span id="price3" style="background-color: <?=$color2 ?>"></span>
									<?php }?>
									<?php if($color3 != ""){?>
									<span id="price3" style="background-color: <?=$color3 ?>"></span>
									<?php }?>
									<?php if($color4 != ""){?>
									<span id="price3" style="background-color: <?=$color4 ?>"></span>
									<?php }?>
									<?php if($color5 != ""){?>
									<span id="price3" style="background-color: <?=$color5 ?>"></span>
									<?php }?>
									</span>
									</div></a>
								<div class="carousel-caption"></div>
							</div>
<?php } if (!empty($item_file_1)){?>
				<div class="item">
								<a href="./product_list/perchase.php?product_name=<?=urlencode($name) ?>" id="best_a"><img
									style="min-width: 300px; max-width: 300px; min-height: 430px; max-height: 430px;"
									src=<?=$image_name[1] ?>>
									<div id="price"
										style="min-width: 300px; max-width: 300px; min-height: 110px; max-height: 110px;">
										<span id="price2"><?=$name ?><br>KRW <?=$price ?><br>
									<?php if($color1 != ""){?>
									<span id="price3" style="background-color: <?=$color1 ?>"></span>
									<?php }?>
									<?php if($color2 != ""){?>
									<span id="price3" style="background-color: <?=$color2 ?>"></span>
									<?php }?>
									<?php if($color3 != ""){?>
									<span id="price3" style="background-color: <?=$color3 ?>"></span>
									<?php }?>
									<?php if($color4 != ""){?>
									<span id="price3" style="background-color: <?=$color4 ?>"></span>
									<?php }?>
									<?php if($color5 != ""){?>
									<span id="price3" style="background-color: <?=$color5 ?>"></span>
									<?php }?>
									</span>
									</div></a>
								<div class="carousel-caption"></div>
							</div>
<?php } if (!empty($item_file_2)){?>
				<div class="item">
								<a href="./product_list/perchase.php?product_name=<?=urlencode($name) ?>" id="best_a"><img
									style="min-width: 300px; max-width: 300px; min-height: 430px; max-height: 430px;"
									src=<?=$image_name[2] ?>>
									<div id="price"
										style="min-width: 300px; max-width: 300px; min-height: 110px; max-height: 110px;">
										<span id="price2"><?=$name ?><br>KRW <?=$price ?><br>
									<?php if($color1 != ""){?>
									<span id="price3" style="background-color: <?=$color1 ?>"></span>
									<?php }?>
									<?php if($color2 != ""){?>
									<span id="price3" style="background-color: <?=$color2 ?>"></span>
									<?php }?>
									<?php if($color3 != ""){?>
									<span id="price3" style="background-color: <?=$color3 ?>"></span>
									<?php }?>
									<?php if($color4 != ""){?>
									<span id="price3" style="background-color: <?=$color4 ?>"></span>
									<?php }?>
									<?php if($color5 != ""){?>
									<span id="price3" style="background-color: <?=$color5 ?>"></span>
									<?php }?>
									</span>
									</div></a>
								<div class="carousel-caption"></div>
							</div>
<?php }  if(!empty($item_file_3)){?>
				<div class="item">
								<a href="./product_list/perchase.php?product_name=<?=urlencode($name) ?>" id="best_a"><img
									style="min-width: 300px; max-width: 300px; min-height: 430px; max-height: 430px;"
									src=<?=$image_name[3] ?>>
									<div id="price"
										style="min-width: 300px; max-width: 300px; min-height: 110px; max-height: 110px;">
										<span id="price2"><?=$name ?><br>KRW <?=$price ?><br>
									<?php if($color1 != ""){?>
									<span id="price3" style="background-color: <?=$color1 ?>"></span>
									<?php }?>
									<?php if($color2 != ""){?>
									<span id="price3" style="background-color: <?=$color2 ?>"></span>
									<?php }?>
									<?php if($color3 != ""){?>
									<span id="price3" style="background-color: <?=$color3 ?>"></span>
									<?php }?>
									<?php if($color4 != ""){?>
									<span id="price3" style="background-color: <?=$color4 ?>"></span>
									<?php }?>
									<?php if($color5 != ""){?>
									<span id="price3" style="background-color: <?=$color5 ?>"></span>
									<?php }?>
									</span>
									</div></a>
								<div class="carousel-caption"></div>
							</div>
<?php }  if(!empty($item_file_4)){?>
				<div class="item">
								<ahref="./product_list/perchase.php?product_name=<?=urlencode($name) ?>"  id="best_a"><img
									style="min-width: 300px; max-width: 300px; min-height: 430px; max-height: 430px;"
									src=<?=$image_name[4] ?>>
									<div id="price"
										style="min-width: 300px; max-width: 300px; min-height: 110px; max-height: 110px;">
										<span id="price2"><?=$name ?><br>KRW <?=$price ?><br>
									<?php if($color1 != ""){?>
									<span id="price3" style="background-color: <?=$color1 ?>"></span>
									<?php }?>
									<?php if($color2 != ""){?>
									<span id="price3" style="background-color: <?=$color2 ?>"></span>
									<?php }?>
									<?php if($color3 != ""){?>
									<span id="price3" style="background-color: <?=$color3 ?>"></span>
									<?php }?>
									<?php if($color4 != ""){?>
									<span id="price3" style="background-color: <?=$color4 ?>"></span>
									<?php }?>
									<?php if($color5 != ""){?>
									<span id="price3" style="background-color: <?=$color5 ?>"></span>
									<?php }?>
									</span>
									</div></a>
								<div class="carousel-caption"></div>
							</div>
<?php }?>
			</div>
					</div>
				</div>
		<?php }?>
		</div>
		</nav>
		
		<?php include "./lib/footer.php";?>
	</div>
</body>
</html>