<?php
session_start();


?>
<html>
<head>
<title>아이디 찾기</title>
<meta charset="utf-8">
<link href="../member/css/check_id2.css" rel="stylesheet"
	type="text/css">
<link rel="shortcut icon" href="../img/look.png" type="image/x-icon">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
function closer(){													   	
	window.close();
}
function find_id(){
	$("#id_submit").submit();
}

</script>
</head>
<body>
	<form id="id_submit" method="post" action="./id_pass_find_db.php?mode=id_search">
		<div id="frame">
			<b>아이디 찾기</b> <input type="button" id="close" onclick="closer()"
				value="CLOSE X" style="padding-left: 40px;">
			<hr>
			<div id="message2">이름과 휴대폰 번호를 입력해 주세요.</div>
			<div id="check">
				<div id="message2" style="padding-right: 75px;">이름 : <input name="find_name" type="text" style="width: 100px;"></div>
				 <br>
				
				<div id="message2" style="padding-right: 45px;">휴대폰 번호 : <input id="num1" name="phone1_1" type="text" style="width: 50px;">
				- <input id="num2" name="phone1_2" type="text" style="width: 50px;">
				- <input id="num3" name="phone1_3" type="text" style="width: 50px;"></div>
				<br>
				<br> <input type="button" onclick="find_id()" value="확인">
			</div>
			<hr>
			<div id="accept">

		</div>

		</div>
	</form>
</body>
</html>