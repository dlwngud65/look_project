<?php
session_start();
$mode = $_GET['mode'];
$user_id = $_SESSION['user_id'];
include '../lib/dbconn.php';
$flag = "NO";
$sql = "show tables from lookDB";
$result = mysqli_query($con, $sql) or die("실패원인:" . mysqli_error($con));
while ($row = mysqli_fetch_row($result)) {
    if ($row[0] === "qa_write") {
        $flag = "OK";
        break;
    }
}
if ($flag !== "OK") {
    $sql = "create table qa_write (
                 num int not null auto_increment,
                 id char(15) not null,
                 name char(10) not null,
                 rank char(20),
                 type char(20) not null,
                 subject char(100) not null,
                 content text not null,
                 regist_day char(20),
                 set_password char(1) not null,
                 password char(6),
                 admin_ripple text,
                 hit int,
                 primary key(num)
               )";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('qa_write 테이블이 생성되었습니다.')</script>";
    } else {
        echo "실패원인:" . mysqli_query($con);
    }
}
?>
<html>
<head>
<title>Look&</title>
<meta charset="utf-8">
<link href="../css/main2.css?v=v1" rel="stylesheet" type="text/css">
<link href="./css/qa_all.css?v=v2" rel="stylesheet" type="text/css">
<link href="./css/qa_dialog.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../img/look.png" type="image/x-icon">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
<?php

if ($mode === 'all') {
    echo ("<style>
a#img1{
background-image: none;
}
</style>");
}
?>

</head>
<body style="margin: 0 0 0 0">
	<div id="function_button">
	<?php if(isset($user_id)){?>
		<a id="myorder2"
			href="http://localhost/PHP/Project05/mypage/mypage_main.php?mode=myorder"></a>
		<a id="wish_list2"
			href="http://localhost/PHP/Project05/mypage/mypage_main.php?mode=mywishlist"></a>
		<a id="today_product2"
			href="http://localhost/PHP/Project05/mypage/mypage_main.php?mode=today_product"></a>
			<?php }?>
		<input type="button" id="top_button" value="TOP">
	</div>
	<div class="basic_shape">
		<?php include "../lib/header2.php";?>
		<nav id="all_nav">
		<?php if($mode == 'notice' || $mode == 'notice_view'){?>
		<span id="qa_logo"> <b style="font-size: 20pt;">NOTICE</b></span>
		<?php }else{?>
			<span id="qa_logo"> <b>Q&A</b>
			<?php }?>
			</span>
			<div id="call">CALL : 070-121-3233</div>
			<div id="qa_menu">
				<a id="img1" href="qa_main.php?mode=all"></a> <a id="img2"
					href="qa_main.php?mode=pay"></a> <a id="img3"
					href="qa_main.php?mode=order"></a> <a id="img4"
					href="qa_main.php?mode=return"></a> <a id="img5"
					href="qa_main.php?mode=product"></a> <a id="img6"
					href="qa_main.php?mode=overseas"></a> <a id="img7"
					href="qa_main.php?mode=member"></a> <a id="img8"
					href="qa_main.php?mode=notice"></a>
			</div>
			<br>
		<?php

if ($mode == 'all') {
    include "./qa_all/all.php";
} else if ($mode == 'pay') {
    include "./qa_pay/qa_pay.php";
} else if ($mode == 'order') {
    include "./qa_order/qa_order.php";
} else if ($mode == 'return') {
    include "./qa_return/qa_return.php";
} else if ($mode == 'product') {
    include "./qa_product/qa_product.php";
} else if ($mode == 'overseas') {
    include "./qa_overseas/qa_overseas.php";
} else if ($mode == 'member') {
    include "./qa_member/qa_member.php";
} else if ($mode == 'notice') {
    include "./qa_notice/qa_notice.php";
} else if ($mode == 'write') {
    include "./qa_write/qa_write.php";
}
?>
		</nav>
		<?php include "../lib/footer2.php";?>
	</div>
</body>
</html>