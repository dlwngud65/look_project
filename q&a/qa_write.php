<?php
session_start();
$page = $_GET['page'];
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_rank = $_SESSION['user_rank'];
$mode = $_GET['mode'];
include '../lib/dbconn.php';

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
	var password2 = document.getElementById("password").value;
	password2 = "";
	password.disabled = 'disabled';
}
function save_qa(){
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
document.qa_form.submit();
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
			<form name="qa_form" action="./qa_insert.php" method="post">
				<div id="write">
					<table>
						<caption>
							<span id="write_logo"><b>WRITE</b></span>
						</caption>
						<tr>
							<td class="td1">아이디</td>
							<td class="td2"><?=$user_id ?></td>
						</tr>
						<tr>
							<td class="td1">이름</td>
							<td class="td2"><?=$user_name ?></td>
						</tr>
						<tr>
							<td class="td1">등급</td>
							<td class="td2"><?=$user_rank ?></td>
						</tr>
						<tr>
							<td class="td1">제목</td>
							<td class="td2"><select id="select" name="select"
								style="cursor: hand;">
									<option value="">선택</option>
									<option value="pay">주문/결제</option>
									<option value="order">배송문의</option>
									<option value="return">반품/교한/환불</option>
									<option value="product">상품문의</option>
									<option value="overseas">해외배송</option>
									<option value="member">회원/비회원</option>
							</select><input type="text" id="title" name="title"></td>
						</tr>
						<tr>
							<td class="td1" colspan="2"><textarea cols="140" rows="30"
									id="content" name="content"></textarea></td>
						</tr>
						<tr>
							<td class="td1">비밀글 설정</td>
							<td class="td2"><input type="radio" name="hide" value="n"
								checked="checked" onclick="pass_no()">공개글 <input type="radio"
								name="hide" value="y" onclick="pass_yes()">비공개글</td>
						</tr>
						<tr>
							<td class="td1">비밀번호 설정</td>
							<td class="td2"><input type="password" id="password"
								name="password" disabled="disabled"></td>
						</tr>
					</table>
					<br>
					<div id="button_box">
						
						<?php if($mode == "perchase"){?>
						<input
							type="button" value="목록" onclick="go_list()">
						<?php } else{?>
						<a href="./qa_main.php?mode=all&page=<?=$page ?>">
						<input
							type="button" value="목록"></a>
						<?php }?>
						 <input type="button" value="저장"
							onclick="save_qa()">
					</div>
				</div>
			</form>
		</nav>
		<?php include "../lib/footer.php";?>
	</div>
</body>
</html>