<?php
session_start();
$page = $_GET['page'];
$num = $_GET['num'];
$id = $_SESSION['user_id'];
$mode = $_GET['mode'];
include '../lib/dbconn.php';
$sql = "update qa_write set hit = hit+1 where num=$num";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$sql = "select * from qa_write where num=$num";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$row = mysqli_fetch_array($result);
$qa_num = $row[num];
$qa_id = $row['id'];
$qa_name = $row['name'];
$qa_rank = $row['rank'];
$qa_type = $row[type];
$qa_title = $row['subject'];
$qa_content = $row['content'];
$qa_regist_day = $row['regist_day'];
$qa_regist_date = substr($qa_regist_day, 0, 10);
$qa_set_pass = $row['set_password'];
$qa_password = $row['password'];
$qa_ripple = $row['admin_ripple'];
$qa_hit = $row['hit'];
?>
<html>
<head>
<title>Look&</title>
<meta charset="utf-8">
<link href="../css/main2.css" rel="stylesheet" type="text/css">
<link href="./css/qa_write.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../img/look.png" type="image/x-icon">

<style type="text/css">
</style>
<script type="text/javascript">
function ripple_button(){
	var admin_ripple = document.getElementById("admin_ripple_content").value;
	if(admin_ripple == ""){
		window.alert("내용을 입력해주세요.");
		admin_ripple.focus();
		return;
	}
	document.ripple_form.submit();
}
function go_list(){
	history.go(-1);
}
</script>
</head>
<body style="margin: 0 0 0 0">
	<div class="basic_shape">
		<?php include "../lib/header2.php";?>
		<nav id="qa_write_nav">
			<form name="qa_form" action="./qa_modi.php" method="post">
				<div id="write">
					<table>
						<caption>
							<span id="write_logo"><b>WRITE</b></span>
						</caption>
						<tr>
							<td class="td1" colspan="2"
								style="border: none; text-align: right;">등록일 : <?=$qa_regist_date ?>&nbsp;&nbsp;&nbsp;&nbsp;조회수 : <?=$qa_hit ?></td>
						</tr>
						<tr>
							<td class="td1">아이디</td>
							<td class="td2"><?=$qa_id ?></td>
						</tr>
						<tr>
							<td class="td1">이름</td>
							<td class="td2"><?=$qa_name ?></td>
						</tr>
						<tr>
							<td class="td1">등급</td>
							<td class="td2"><?=$qa_rank ?></td>
						</tr>
						<tr>
							<td class="td1">제목</td>
							<td class="td2"><?php
    
    if ($qa_type == 'pay') {
        echo '주문/결제 : ' . $qa_title;
    } else if ($qa_type == 'member') {
        echo '회원/비회원 : ' . $qa_title;
    } else if ($qa_type == 'order') {
        echo '배송문의 : ' . $qa_title;
    } else if ($qa_type == 'overseas') {
        echo '해외배송 : ' . $qa_title;
    } else if ($qa_type == 'product') {
        echo '상품문의 : ' . $qa_title;
    } else if ($qa_type == 'return') {
        echo '반품/교환/환불 : ' . $qa_title;
    }
    ?></td>
						</tr>
						<tr>
							<td class="td1" colspan="2"><textarea cols="140" rows="30"
									id="content" name="content" readonly="readonly"><?=$qa_content ?></textarea></td>
						</tr>
						<tr>
							<td class="td1">비밀글 설정</td>
							<td class="td2"><?php
    
    if ($qa_set_pass == 'y') {
        echo "비공개글";
    } else {
        echo "공개글";
    }
    ?></td>
						</tr>
						<tr>
							<td class="td1">비밀번호 설정</td>
							<td class="td2"><?php
    
    if ($qa_set_pass == 'y') {
        echo $qa_password;
    } else {
        echo "없음";
    }
    ?></td>
						</tr>
						<?php if($qa_ripple!=""){?>
					<tr>
							<td class="td1"><img src='../img/답변.png'
								style='width: 25px; height: 25px; vertical-align: -7px;'>답변</td>
							<td class="td2"><?=$qa_ripple ?></td>
						</tr>
			<?php }?>
					</table>
					<br>
					<div id="button_box">
					<?php if($id == $qa_id || ((strlen($id) <= 6)&&(strlen($id)>0))){?>
						<a href="./qa_modi.php?num=<?=$num ?>&page=<?=$page ?>"><input
							type="button" value="수정"></a><?php }?> <?php if($mode == "perchase"){?>
						<input type="button" value="목록" onclick="go_list()">
						<?php } else{?>
						<a href="./qa_main.php?mode=all&page=<?=$page ?>"> <input
							type="button" value="목록"></a>
						<?php }?>
							<?php if($id == $qa_id || ((strlen($id) <= 6)&&(strlen($id)>0))){?>
							<a href="qa_delete.php?num=<?=$num ?>&page=<?=$page ?>"><input
							type="button" value="삭제"></a><?php }?>
					</div>
				</div>
			</form>
			<?php if((0 < strlen($id)&& strlen($id) <= 6) && $qa_ripple==""){?>
			<form name="ripple_form"
				action="./qa_ripple_insert.php?num=<?=$num ?>&page<?=$page ?>"
				method="post">
				<div id="admin_ripple">
					<table id="admin_ripple_table">
						<tr id="admin_ripple_tr">
							<td id="admin_ripple_td1"><textarea rows="6" cols="73"
									id="admin_ripple_content" name="admin_ripple"></textarea></td>
							<td id="admin_ripple_td2"><input type="button"
								id="admin_ripple_button" value="답변" onclick="ripple_button()"></td>
						</tr>
					</table>
				</div>
			</form>
			<?php }?>
		</nav>
		<?php include "../lib/footer.php";?>
	</div>
</body>
</html>