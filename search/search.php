<?php
session_start();
include '../lib/dbconn.php';
if(!empty($_GET['search_text'])){
    $goods_name=$_GET['search_text'];
}
if(!empty($_GET['search_text2'])){
    $goods_name=$_GET['search_text2'];
}
if (! empty($_GET['goods_name'])) {
    $goods_name = $_GET['goods_name'];
}
    $sql = "select * from goods where goods_name like '%$goods_name%'";
    $result = mysqli_query($con, $sql);
    $total_count = mysqli_num_rows($result);
    if($total_count==null){
        $total_count=0;
    }
?>
<html>
<head>
<title>Look&</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/main2.css?v=v4" rel="stylesheet" type="text/css">
<link href="./css/product_list_main.css?v=v4" rel="stylesheet"
	type="text/css">
<link href="./css/order_product.css?v=v11" rel="stylesheet"
	type="text/css">
<link href="./css/search.css?v=v9" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../img/look.png" type="image/x-icon">

<script type="text/javascript"
	src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
</script>
<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
	$(document).ready(function(){
		$("#search_text").keyup(function(){
			var search_text= $("#search_text").val();
			if(search_text.length <= 0){
				$("#srl_box1").html("");
				$("#srl_box1").hide();
			}else{
				$.ajax({
					type : "post",
					url : "search_result.php",
					data : "search_text="+search_text,
					success : function(data){
						$("#srl_box1").html(data);
						$("#srl_box1").show();
					}
				});
			}
		});
	});
	
	$(document).ready(function(){
		$("#search_text").keypress(function(e) {
			$("#srl_box1").css("border", "1px solid black");
		})
	});
	function submit1(){
		if(!document.getElementById("search_text").value){
			alert("검색내용을 입력하세요!");
			return;
		}
		document.search_text.submit();
	}
	
</script>

<style type="text/css">
</style>
</head>
<body style="margin: 0 0 0 0;">
	<div class="basic_shape">
   <?php include '../lib/header2.php';?>
   <span id="search_logo">SEARCH</span><br>
		<nav id="search_nav">
			<div id="search_bar">
				<form name="search_text" action="search.php" method="get">
				<input type="text" id="search_text" name="search_text" autofocus autocomplete="off"><input type="button"
					id="search_button" onclick="submit1()">
					</form>
				<div id="srl_box1">
					<div id="s_r_l1"></div>
				</div>

			</div>
			<br> <br>
			<div id="search_num">
			    <span id='search_total'>총 <b> <?= $total_count?></b>개의 상품이 검색되었습니다.
				</span>
				
			</div>
			<div id="search_result_box">
         <?php 
         $sql = "select * from goods where goods_name like '%$goods_name%'";
         $result = mysqli_query($con, $sql);
         while($row=mysqli_fetch_array($result)){ 
            $goods_name=$row['goods_name'];      
            $goods_price=$row['goods_price']; 
            $goods_img_copied=$row['file_copied_0']; 
            $goods_name2=urlencode($goods_name);
            $goods_img = "../admin/admin_content_product/data/".$goods_img_copied;
            echo "<div id='search_product'>
					<a href='../product_list/perchase.php?product_name={$goods_name2}&review_page=1&qa_page=1' style='text-decoration: none; color: black;'> <span
						id='image'
						style='background-image: url($goods_img);'></span>
						<span id='info'> <span id='price'>$goods_name</span><br> <span id='price'>KRW
								$goods_price</span>
					</span>
					</a>
				</div>";
        }?>
         </div>
		</nav>   
      <?php include "../lib/footer2.php";?>
      </div>
</body>
</html>

<html>
<head>
</head>


</html>
<?php
?>