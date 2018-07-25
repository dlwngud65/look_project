<?php
session_start();

include '../lib/dbconn.php';


$use_id = $_POST['id_check1'];

if(isset($_POST['id_check1'])){
$sql="select id from member where id='$use_id'";
$result=mysqli_query($con, $sql);
$id_num=mysqli_num_rows($result);
}

?>
<html>
<head>
<title>아이디 중복검사</title>
<meta charset="utf-8">
<link href="./css/check_id2.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../img/look.png" type="image/x-icon">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">

		  $(document).ready(function(e){
			$("#opener").click(function(){
				$("#id_ok", opener.document).val($("#id_check").val()); 	   //1번 jquery 이용
				// $(opener.document).find("#id_ok").val(d); //2번 find를 이용한 jquery 
					closer();
			})
		});  
		
		function check_exp(elem, exp, msg){
			if(!exp.test(elem)){
				$("#accept").html(msg);
				return true;
			}
		}

		
		function closer(){
			window.close();
		}
		function check_id(){
			var exp_id= /^[0-9a-zA-Z]{8,20}$/; 	
			if(!$("#id_check").val()){
				alert("아이디를 입력해주세요 !");
				return;
			}
			if(!check_exp($("#id_check").val(), exp_id, "<div id='message2'>ID를 다시 입력해주세요 .</div>")){
			/* document.id_submit.submit(); */
			$("#id_submit").submit();
			}
		
		}
		document.addEventListener('keydown', function(event) {
		       if (event.keyCode === 13) {
		              event.preventDefault();
		       }
		         }, true);
</script>
</head>
<body>
	<form id="id_submit" method="post" action="./check_id.php" >
	<div id="frame">
		<b>아이디 중복확인</b>
		<input type="button" id="close" onclick="closer()" value="CLOSE X">
		<hr>
		<div id="message2">
			사용하고자 하는 아이디를 입력하신 후 중복검색 버튼을 눌러주세요.<br> 8 ~ 20자의 영문 소문자, 숫자
		</div>
		<div id="check">
			<input id="id_check" name = "id_check1" type="text" value=<?=$use_id?>>
			<input type="button" onclick="check_id()" value="중복검색">
		</div>
		<hr>
		<div id="accept">
		<?php 
		if(isset($use_id) && $id_num === 0){
		?>
		<div id='message2'>입력하신 '<?=$use_id?> '는 사용하실 수 있습니다.<br> 이 아이디를 사용하시겠습니까?</div><input type="button" id="opener" value="사용하기"> 
		<?php 
		}else if(isset($use_id) && $id_num === 1){
		   echo "<div id='message2'>입력하신 ' $use_id '는 사용하실 수 없습니다.</div>";
		}
		?>
		</div>

	</div>
	</form>
</body>
</html>