<?php
session_start();
?>
<html>
<head>
<title>Look&</title>
<meta charset="utf-8">
<link href="../css/Main2.css" rel="stylesheet" type="text/css">
<link href="./css/login.css?v=v2" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../img/look.png" type="image/x-icon">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#login_submit").click(function(e){
			id_pass_check();
		})
		
	});
		
	function id_pass_check(){
		var exp_id= /^[0-9a-zA-Z]{0,20}$/; 	
		var exp_pass= /^[0-9a-zA-Z~!@#$%^&*()]{0,16}$/;
		if(!$("#login_id").val()){
			alert("아이디를 입력해주세요 !");
			return;
		}
		if(check_exp($("#login_id").val(), exp_id, "ID가 올바르지 않습니다.")){
			return;
		}else{
			if(!$("#login_pass").val()){
				alert("비밀번호를 입력해주세요 !");
				return;
			}	
			if(check_exp($("#login_pass").val(), exp_pass, " 비밀번호가 올바르지 않습니다.")){
				return;
			}else{
				$("#login_db").submit();
			}
			
		}
	}
	function check_exp(elem, exp, msg){
		if(!exp.test(elem)){
			window.alert(msg);
			return true;
		}
	}
	
	function search_id(){
		window.open('search_id.php','','left=500,top=200, width=430, height=340, status=no, scrollbars=no, resizable=no');
	}
	
	function search_password(){
		window.open('search_password.php','','left=500,top=200, width=430, height=340, status=no, scrollbars=no, resizable=no');
	}

	</script>
</head>
<body style="margin: 0 0 0 0">
	<div class="basic_shape">
		<?php include "../lib/header2.php";?>
		<nav id="login_nav">
			<span id="login_logo"> <b>LOGIN</b>
			</span>
			<form id="login_db" method="post" action="./login_db.php">
				<div id="login_input">
					<div id="login_input_ID">
						<span>I &nbsp;&nbsp;D</span> <input name="login_id_dbcheck"
							id="login_id" type="text">
					</div>
					<div></div>
					<div id="login_input_PW">
						<span>P W</span> <input name="login_pass_dbcheck" id="login_pass"
							type="password">
					</div>
				</div>
				<a href=#><input id="login_submit" type="button" value="Login"></a>
			</form>
			<div id="login_ext">
				<a href="../member/agreement.php">회원가입</a> <a href="#"
					onclick="search_id()">아이디 찾기</a> <a href="#"
					onclick="search_password()">비밀번호 찾기</a>
			</div>
		</nav>
	</div>
</body>
</html>