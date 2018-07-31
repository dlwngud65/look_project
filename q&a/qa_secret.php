<?php
session_start();
$page = $_GET['page'];
$num = $_GET['num'];
$id = $_GET['id'];
?>
<html>
<head>
<title>Look&</title>
<meta charset="utf-8">
<link href="../css/main2.css" rel="stylesheet" type="text/css">
<link href="./css/qa_all.css?v=v2" rel="stylesheet" type="text/css">
<link href="./css/qa_dialog.css" rel="stylesheet" type="text/css">
<link href="./css/qa_secret.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../img/look.png" type="image/x-icon">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
function back(){
	history.go(-1);
}

function check_pass(){
	var pass = document.getElementById("myinfo").value;
	if(pass == ""){
		window.alert("암호를 입력해주세요.");
		return;
	}
	document.qa_form.submit();
}
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
	<div class="basic_shape">
		<?php include "../lib/header2.php";?>
		<nav id="all_nav">
		<?php if($mode == 'notice'){?>
		<span id="qa_logo"> <b style="font-size: 20pt;">NOTICE</b></span>
		<?php }else{?>
			<span id="qa_logo"> <b>Q&A</b>
			<?php }?>
			</span> <br>
			<form name="qa_form"
				action="./qa_login.php?num=<?=$num ?>&page=<?=$page ?>"
				method="post">
			<div id="secret">
				<span id="secret_span">이 글은 비밀글 입니다. <b>비밀번호를 입력해 주세요.</b></span><br>
				<span id="secret_span3">> 비밀번호 : <input id="myinfo" type="password" name="pass"></span><br>
				<div id="secret_box">
					<input type="button" value="목록" onclick="back()"
						style="width: 70px; height: 30px; border-radius: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;<input
						type="button" value="확인" onclick="check_pass()"
						style="width: 70px; height: 30px; border-radius: 5px;">
				</div>
			</div>
			</form>
		</nav>
		<?php include "../lib/footer.php";?>
	</div>
</body>
</html>