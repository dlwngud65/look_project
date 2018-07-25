<?php
session_start();

?>
<html>
<head>
<title>Look&</title>
<meta charset="utf-8">
<link href="../css/main2.css" rel="stylesheet" type="text/css">
<link href="./css/member.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../img/look.png" type="image/x-icon">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
		var email_pass="N";
	$(document).ready(function() {
		
		$("#check_e").click(function(){
			 check_email();
		})
		
		$("#insert_user").click(function(){
			check_input();
		})
		
		
		$("#userName").blur(function(){
			var exp_name= /^[가-힣]{2,5}$/;								
			if(!$(this).val()){
				$("#name_check").text(" 이름을 입력 해주세요 !");
				$(this).focus();					
				return ;
			}
			if(check_exp1($(this).val(), exp_name, " 이름을 정확히 입력 해주세요!")){
				$(this).focus();	
				return ;
			}
			$("#name_check").text(" ");			
		})
		
		$("#pass_1").keyup(function(){
			var exp_pass= /^[0-9a-zA-Z~!@#$%^&*()]{8,16}$/;
			if(check_exp2($(this).val(), exp_pass, " 비밀번호가 적절하지 않습니다.")){
				return ;
			}
				$("#pass_check").text(" 비밀번호 가능");
		})
		
		$("#pass_2").keyup(function(){
			
			if($("#pass_1").val() === $("#pass_2").val()){	
				$("#pass_pass").text(" 비밀번호 일치");
				return;
			}
				$("#pass_pass").text(" 비밀번호 불일치");
		})
		
		$("#check_email").blur(function(){
			if(!$(this).val){
				return;
			}
			var exp_email1= /^[0-9a-zA-Z~!@#$%^&*()]+$/;
			if(check_exp_email($(this).val(), exp_email1, " 이메일이 올바르지 않습니다.")){
				return ;
			}
			$("#email_ook").text(" ");
		})
		
	});

	function check_exp(elem, exp, msg ){
		if(!exp.test(elem)){								
			return true;
		}
	}
	function check_exp1(elem, exp, msg ){
		if(!exp.test(elem)){								
			$("#name_check").text(msg);
			return true;
		}
	}
	function check_exp2(elem, exp, msg ){
		if(!exp.test(elem)){	
			$("#pass_check").text(msg);
			return true;
		}
	}
	function check_exp_email(elem, exp, msg ){
		if(!exp.test(elem)){	
			document.getElementById("email_ook").innerHTML=msg;
			return true;
		}
	}
	function check_id(){
		    window.open('check_id.php','','left=500,top=200, width=430, height=340, status=no, scrollbars=no, resizable=no');
	}
	
	
	function check_email(){
		if(!$("#check_email").val() || $("#email").val()===""){
			alert("이메일을 입력해주세요.");
			return;
		}
		var email1=$("#check_email").val();
		var email2=$("#email").val();
		var user_email=email1+"@"+email2;
		
	    window.open(('./PHPMailer/send_email.php?user_email='+user_email),'','left=500,top=200, width=430, height=340, status=no, scrollbars=no, resizable=no');
	}
	function email_ok(){
		
		document.getElementById("email_ook").innerHTML="인증 완료"; 
		/* $("#email_ook").html("인증완료"); */
		 $("#check_email").attr("readonly","readonly");
		 //$("#email").attr("disabled","disabled"); 콤보박스 제한걸시 post값 미전송
		email_pass="Y";
	}
	
	
	function check_input(){
		


		
		
		
			if(!$("#userName").val()){							//미입력한 경우
			alert("이름를 입력 해주세요.");
			$("#userName").focus();
			return ;
		}
			if(!$("#id_ok").val()){							
			alert("아이디를 입력 해주세요.");
			$("#id_ok").focus();
			return ;
		}
			
			
			if(!$("#pass_1").val()){							
			alert("비밀번호를 입력 해주세요.");
			$("#pass_1").focus();
			return ;
		}
			if(!$("#pass_2").val()){							
				$("#pass_2").focus();
				alert("비밀번호 확인을 해주세요.");
    			return ;
		}
			if($("#pass_1").val() === $("#pass_2").val()){							
		}else{
				$("#pass_2").focus();
				alert("비밀번호 확인을 해주세요.");
    			return ;
		}
			
			if($("#pass_check").text() ==" 비밀번호가 적절하지 않습니다."){
				$("#pass_1").focus();
				alert("비밀번호 확인을 해주세요.");
    			return ;
			}
		
			
			if($("#year").val()===""){							
			alert("년도를 선택해주세요");
			$("#year").focus();
			return ;
		}
			if($("#month").val()===""){							
			alert("월을 선택해주세요");
			$("#month").focus();
			return ;
		}
			if($("#day").val()===""){							
			alert("일을 선택해주세요");
			$("#day").focus();
			return ;
		}
		
			if(!$("#postcode").val()){							
			alert("주소를 선택해주세요");
			$("#postcode").focus();
			return ;
		}
			if(!$("#address2").val()){							
			alert("상세주소를 입력해 주세요.");
			$("#address2").focus();
			return ;
		}
				
		// 연락처 검사
		var exp_hp1= /^0[1-9][0-9]?$/;								
		var exp_hp2= /^[0-9]{4}$/;									
		if($("#phone").val()===""){
			alert("연락처를 입력해주세요");
			$("#phone").focus();
			return ;
		}			
		if(!$("#phone2").val()){
			alert("연락처를 입력해주세요");
			$("#phone2").focus();
			return ;
		}			
		if(!$("#phone3").val()){
			alert("연락처를 입력해주세요");
			$("#phone3").focus();
			return ;
		}			
		// 연락처 유효성 검사
		var exp_hp1= /^[0-9]{4}$/;
		if(check_exp($("#phone2").val(), exp_hp1, "연락처를 정확히 입력해주세요!")){
			$("#phone2").focus();
			$("#phone2").select();
			return ;
		}
		if(check_exp($("#phone3").val(), exp_hp1, "연락처를 정확히 입력해주세요!")){
			$("#phone3").focus();
			$("#phone3").select();
			return ;
		}
		
		if(email_pass === "N"){
			alert("이메일을 인증해주세요 !!");
			return;
		}
		
		$("#insert_submit").submit();
	}
	
</script>
<!-- 우편번호 검색API -->
	<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
	<script>
        function execDaumPostcode() {
            new daum.Postcode({
                oncomplete: function(data) {
                    // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
    
                    // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                    // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                    var fullAddr = ''; // 최종 주소 변수
                    var extraAddr = ''; // 조합형 주소 변수
    
                    // 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                    if (data.userSelectedType === 'R') { 		// 사용자가 도로명 주소를 선택했을때 R 지번을 선택했을때 J를 리턴한다
                        fullAddr = data.roadAddress;			// R= R or J
    
                    } else { // 사용자가 지번 주소를 선택했을 경우(J)
                        fullAddr = data.jibunAddress;
                    }
    
                    // 사용자가 선택한 주소가 도로명 타입일때 조합한다.
                    if(data.userSelectedType === 'R'){
                        										 //법정동명이 있을 경우 추가한다.
                        if(data.bname !== ''){
                            extraAddr += data.bname;
                        }
                        // 건물명이 있을 경우 추가한다.					 //3항 연산자
                        if(data.buildingName !== ''){
                            extraAddr += (extraAddr !== '' ? (', ' + data.buildingName) : data.buildingName);
                        }
                        // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                        fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
                    }
    
                    // 우편번호와 주소 정보를 해당 필드에 넣는다.
                    $("#postcode").val(data.zonecode); //5자리 새우편번호 사용
                    $("#address1").val(fullAddr);
    
                    // 커서를 상세주소 필드로 이동한다.
                    $("#address2").focus();
                }
            }).open();
        }
    </script>
	<!-- end of 우편번호 검색API -->

</head>
<body>
	<div class="basic_shape">
		<?php include "../lib/header2.php";?>
		<nav id="Joinus_nav2">
			<span id="Joinus_logo"> <b>JOIN US</b>
			</span>
			<div id="Membership_Log">MEMBERSHIP BENEFITS</div>
			<div id="Membership_Log2">
				지금 바로 LooK&의 회원이 되어 보세요!<br>국내 모든신상이 한자리에<br>신규회원 가입 혜택에 할인 이벤트까지
			</div>
			<img id="Membership_Log" src="../img/membership_log.png">
			<div></div>
			<div id="Membership_log3">회원정보입력</div>
			<div></div>
			<div id="Membership_table">
				<div>
					<b>*</b> 필수입력사항
				</div>
				
	<form id="insert_submit" method="post" action="insert_user_info.php" >
				<table border="1">
					<tr>
						<td class="td1" rowspan="2"><b class="td1_b">*</b> 회원종류</td>
						<td class="td2"><input type="radio" value="s" name="member_type">평생회원
							&nbsp;&nbsp;&nbsp;<input type="radio" value="c"
							name="member_type" checked="checked">일반회원</td>
					</tr>
					<tr>
						<td class="td2"><b>평생 회원?</b><br>평생 회원은 남성쇼핑물 Look& 회원 가입 이후 오랫동안
							방문하지 않아도<br> 고객님의 소중한 적립금과 쿠폰을 보호하고 다양한 혜택과 소식을 제공해드리는 서비스입니다.<br>
							<br> <b>평생 회원 혜택?</b><br>평생 회원 가입 시, 평생 회원 가입 감사 추가 포인트 1000point
							제공 <br>모든 쿠폰 유효기간 평생으로 변경</td>
					</tr>
					<tr>
						<td class="td1"><b class="td1_b">*</b> 이름</td>
						<td class="td2"><input name="user_name" id="userName" type="text"><span id="name_check"></span></td>
					</tr>
					<tr>
						<td class="td1"><b class="td1_b">*</b> 아이디</td>
						<td class="td2"><input name="user_id" id="id_ok" type="text" readonly="readonly">
							<input type="button" onclick="check_id()" value="중복확인" > 영문  소문자,대문자,숫자를 포함한 6~20자</td>
					</tr>
					<tr>
						<td class="td1"><b class="td1_b">*</b> 비밀번호</td>
						<td class="td2"><input name="user_pass" id="pass_1" type="password"><span id="pass_check"> 소문자 대문자 숫자 특수문자 ~!@#$%^&*()를 포함한 8~16자</span></td>
					</tr>
					<tr>
						<td class="td1"><b class="td1_b">*</b> 비밀번호 확인</td>
						<td class="td2"><input id="pass_2" type="password"><span id="pass_pass"></span></td>
					</tr>
					<tr>
						<td class="td1"><b class="td1_b">*</b> 생일</td>
						<td class="td2"><select name="user_year" id="year"><option  value="">선택</option>
								<?php
        
        for ($i = 1970; $i <= 2018; $i ++) {
            echo ("<option  value='$i'>$i</option>");
        }
        ?>
						</select>년 <select name="user_month" id="month"><option  value="">선택</option>
								<?php
        
        for ($i = 1; $i <= 12; $i ++) {
            echo ("<option  value='$i'>$i</option>");
        }
        ?>
						</select>월 <select name="user_day" id="day"><option  value="">선택</option>
								<?php
        
        for ($i = 1; $i <= 31; $i ++) {
            echo ("<option  value='$i'>$i</option>");
        }
        ?>
						</select>일</td>
					</tr>
					<tr>
						<td class="td1"><b class="td1_b">*</b> 성별</td>
						<td class="td2"><input  type="radio" value="M" name="user_gender"
							checked="checked">남 &nbsp;&nbsp;&nbsp;<input  type="radio"
							value="W" name="user_gender">여</td>
					</tr>
					<tr>
						<td class="td1" rowspan="1"><b class="td1_b">*</b> 주소</td>
						<td class="td2"><input name="user_postcode" id="postcode"  class="address1" type="text">
							<input  type="button" value="우편번호 검색" onclick="execDaumPostcode()" > <br> <br> <input name="user_address1" id="address1" class="address2"
							type="text"><br> <br> <input name="user_address2" id="address2" class="address2" type="text"
							placeholder=" 상세 주소를 입력해주세요."></td>
					</tr>
					<tr>
						<td class="td1"><b class="td1_b">*</b> 휴대폰</td>
						<td class="td2"><select name="user_phone_1" id="phone"><option value="">선택</option>
								<?php
        $num = array(
            '010',
            '011',
            '016',
            '017',
            '018',
            '019'
        );
        for ($i = 0; $i < count($num); $i ++) {
            echo ("<option value='$num[$i]'>$num[$i]</option>");
        }
        ?>
						</select> - <input name="user_phone_2" id="phone2" class="phone" type="text"> - <input name="user_phone_3" id="phone3"
							class="phone" type="text"></td>
					</tr>
					<tr>
						<td class="td1">&nbsp;&nbsp;추가 연락처</td>
						<td class="td2"><input name="user_phone2_1" class="phone" type="text"> - <input name="user_phone2_2"
							class="phone" type="text"> - <input name="user_phone2_3" class="phone" type="text"></td>
					</tr>
					<tr>
						<td class="td1"><b class="td1_b">*</b> 이메일</td>
						<td class="td2"><input name="user_email1" id="check_email" class="email" type="text"> @ <select name="user_email2" id="email"><option value="">선택</option>
								<?php
        $num = array(
            'naver.com',
            'hotmail.com',
            'hanmail.com',
            'yahoo.co.kr',
            'paran.com',
            'nate.com',
            'empal.com',
            'dreamwiz.com',
            'hanafos.com',
            'korea.com',
            'chol.com',
            'gmail.com',
            'lycos.co.kr',
            'netian.com',
            'hanmir.com',
            'sayclub.com',
            '직접입력'
        );
        for ($i = 0; $i < count($num); $i ++) {
            echo ("<option value='$num[$i]'>$num[$i]</option>");
        }
        ?>
						</select>
							<input id="check_e" type="button" value="인증하기" ><span id="email_ook"></span></td>
					</tr>
				</table>
		</form>
			</div>
			
			<div id="Joinus_button_box">
				<input type="button" id="insert_user"  class="insert" value="회원가입"  >
				<a href="../index.php"><input type="button" class="cancel" value="가입 취소"></a>
			</div>
		</nav>
		<?php include "../lib/footer2.php";?>
	</div>
</body>
</html>