<?php
session_start();
$page = $_GET['page'];
$num = $_GET['num'];
$id = $_SESSION['user_id'];
include '../lib/dbconn.php';
$sql = "select * from qa_write where num=$num";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$row = mysqli_fetch_array($result);
$qa_num = $row[num];
$qa_id = $row['id'];
$qa_name = $row['name'];
$qa_rank = $row['rank'];
$qa_type = $row['type'];
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
<link href="./css/qa_write1.css?v=v2" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../img/look.png" type="image/x-icon">

<style type="text/css">
</style>
<script type="text/javascript">
function pass_yes(){
	password.disabled = false;
}

function pass_no(){
	document.getElementById("password").value ="";
	password.disabled = 'disabled';
}
function update_qa(){
var select = document.getElementById("select");
var option = select.options[select.selectedIndex].value;
var title = document.getElementById("title").value;
var content = document.getElementById("content").value;
var set_pass1 = document.getElementsByName("hide");
var password = document.getElementById("password");
var password2 = document.getElementById("password").value;
if(option==""){
	window.alert("선택항목을 골라주세요.");
	select.focus();
	return;
 }
if(title ==""){
	window.alert("제목을 입력해주세요.");
	title.focus();
	return;
}
if(content == ""){
	window.alert("내용을 입력해주세요.");
	content.focus();
	return;
}
if(set_pass1[1].checked == true && password2==""){
	window.alert("비밀번호를 입력해주세요.");
	password.focus();
	return;
}

if(set_pass1[1].checked == true && password2.length > 6){
	window.alert("비밀번호는 6글자 이하로 해주세요.");
	password.focus();
	return;
}
function ripple_button(){
	var admin_ripple = document.getElementById("admin_ripple_content").value;
	if(admin_ripple == ""){
		window.alert("내용을 입력해주세요.");
		admin_ripple.focus();
		return;
	}
}
document.qa_form.submit();
}
</script>
</head>
<body style="margin: 0 0 0 0">
	<div class="basic_shape">
		<?php include "../lib/header2.php";?>
		<nav id="qa_write_nav">
			<form name="qa_form"
				action="./qa_update.php?num=<?=$num ?>&page=<?=$page ?>"
				method="post">
				<div id="write">
					<table>
						<caption>
							<span id="write_logo"><b>WRITE</b></span>
						</caption>
						<tr>
							<td class="td1">아이디</td>
							<td class="td2"><input type="text" readonly="readonly"
								value="<?=$qa_id ?>" name="qa_id" style="border: none;"></td>
						</tr>
						<tr>
							<td class="td1">이름</td>
							<td class="td2"><input type="text" readonly="readonly"
								value="<?=$qa_name ?>" name="qa_name" style="border: none;"></td>
						</tr>
						<tr>
							<td class="td1">등급</td>
							<td class="td2"><input type="text" readonly="readonly"
								value="<?=$qa_rank ?>" name="qa_rank" style="border: none;"></td>
						</tr>
						<tr>
							<td class="td1">제목</td>
							<td class="td2"><select id="select" name="select"
								style="cursor: hand; vertical-align: 0px;">
								<?php if($qa_type == "pay"){?>
									<option value="">선택</option>
									<option value="pay" selected="selected">주문/결제</option>
									<option value="order">배송문의</option>
									<option value="return">반품/교한/환불</option>
									<option value="product">상품문의</option>
									<option value="overseas">해외배송</option>
									<option value="member">회원/비회원</option>
									<?php } else if($qa_type == "order"){?>
									<option value="">선택</option>
									<option value="pay">주문/결제</option>
									<option value="order" selected="selected">배송문의</option>
									<option value="return">반품/교한/환불</option>
									<option value="product">상품문의</option>
									<option value="overseas">해외배송</option>
									<option value="member">회원/비회원</option>
									<?php } else if($qa_type == "return"){?>
									<option value="">선택</option>
									<option value="pay">주문/결제</option>
									<option value="order">배송문의</option>
									<option value="return" selected="selected">반품/교한/환불</option>
									<option value="product">상품문의</option>
									<option value="overseas">해외배송</option>
									<option value="member">회원/비회원</option>
									<?php } else if($qa_type == "product"){?>
									<option value="">선택</option>
									<option value="pay">주문/결제</option>
									<option value="order">배송문의</option>
									<option value="return">반품/교한/환불</option>
									<option value="product" selected="selected">상품문의</option>
									<option value="overseas">해외배송</option>
									<option value="member">회원/비회원</option>
									<?php } else if($qa_type == "overseas"){?>
									<option value="">선택</option>
									<option value="pay">주문/결제</option>
									<option value="order">배송문의</option>
									<option value="return">반품/교한/환불</option>
									<option value="product">상품문의</option>
									<option value="overseas" selected="selected">해외배송</option>
									<option value="member">회원/비회원</option>
									<?php } else if($qa_type == "member"){?>
									<option value="">선택</option>
									<option value="pay">주문/결제</option>
									<option value="order">배송문의</option>
									<option value="return">반품/교한/환불</option>
									<option value="product">상품문의</option>
									<option value="overseas">해외배송</option>
									<option value="member" selected="selected">회원/비회원</option>
									<?php }?>
							</select><input type="text" id="title" name="title"
								value="<?=$qa_title ?>"></td>
						</tr>
						<tr>
							<td class="td1" colspan="2"><textarea cols="140" rows="30"
									id="content" name="content"><?=$qa_content ?></textarea></td>
						</tr>
						<tr>
							<td class="td1">비밀글 설정</td>
							<td class="td2">
							<?php if($qa_set_pass == "n"){?>
							<input type="radio" name="hide" value="n" checked="checked"
								onclick="pass_no()">공개글 <input type="radio" name="hide"
								value="y" onclick="pass_yes()">비공개글
								<?php } else {?>
								<input type="radio" name="hide" value="n" onclick="pass_no()">공개글
								<input type="radio" name="hide" value="y" checked="checked"
								onclick="pass_yes()">비공개글
							</td>
								<?php }?>
						</tr>
						<tr>
						<?php if($qa_set_pass == "n"){?>
						<td class="td1">비밀번호 설정</td>
							<td class="td2"><input type="password" id="password"
								name="password" value="<?=$qa_password ?>" disabled="disabled"></td>
						<?php } else{?>
						<td class="td1">비밀번호 설정</td>
							<td class="td2"><input type="password" id="password"
								name="password" value="<?=$qa_password ?>"></td>
						<?php }?>
							
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
						<a href="./qa_view.php?num=<?=$num ?>&page=<?=$page ?>"><input
							type="button" value="취소"></a> <input type="button" value="저장"
							onclick="update_qa()">
					</div>
				</div>
			<?php if(strlen($id) <= 6){?>
				<div id="admin_ripple">
					<table id="admin_ripple_table">
						<tr id="admin_ripple_tr">
							<td id="admin_ripple_td1"><textarea rows="6" cols="73"
									id="admin_ripple_content" name="admin_ripple"><?=$qa_ripple ?></textarea></td>
							<td id="admin_ripple_td2"><input type="button"
								id="admin_ripple_button" value="답변"></td>
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