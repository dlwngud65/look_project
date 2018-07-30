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
function find_pass(){
	$("#pass_submit").submit();
}


///

function tabSetting() {
	
	// 탭 컨텐츠 hide 후 현재 탭메뉴 페이지만 show
    $('.tabPage').hide();
    $($('.current').find('a').attr('href')).show();

    // Tab 메뉴 클릭 이벤트 생성
    $(document).ready(function(){
    	
    $('li').click(function (event) {
        var tagName = event.target.tagName; // 현재 선택된 태그네임
        var selectedLiTag = (tagName.toString() == 'A') ? $(event.target).parent('li') : $(event.target); // A태그일 경우 상위 Li태그 선택, Li태그일 경우 그대로 태그 객체
        var currentLiTag = $('li[class~=current]'); // 현재 current 클래그를 가진 탭
        var isCurrent = false; 
         $('[type=text]').val("");
        
        
        // 현재 클릭된 탭이 current를 가졌는지 확인
        isCurrent = $(selectedLiTag).hasClass('current');
         
        // current를 가지지 않았을 경우만 실행
        if (!isCurrent) {
            $($(currentLiTag).find('a').attr('href')).hide();
            $(currentLiTag).removeClass('current');

            $(selectedLiTag).addClass('current');
            $($(selectedLiTag).find('a').attr('href')).show();
        }
        return false;
    });
    	
    	
    	
    	
    });
    
    
}

$(function () {
    // 탭 초기화 및 설정
    tabSetting();
});
</script>
<style>
    .tabWrap { width: 400px; height: 300px; }
    .tab_Menu { margin: 0px; padding: 0px; list-style: none; }
    .tabMenu { width: 197px; margin: 0px; text-align: center;
               padding-top: 10px; padding-bottom: 10px; float: left; }
        .tabMenu a { color: #000000; font-weight: bold; text-decoration: none; }
    .current { border-radius : 10px 10px 0px 0px;
               background-color : silver; border-bottom:hidden; }
    .tabPage { width: 400px; height: 300px; float: left;
                 }
</style>
</head>
<body>
	<div style="width: 398px; height: 345px; border : 3px solid black; border-radius: 15px;"> 
	
	<div class="tabWrap">
    <ul class="tab_Menu">
        <li class="tabMenu current">
            <a href="#tabContent01" >이메일</a>
        </li>
        <li class="tabMenu">
            <a href="#tabContent02" >휴대폰</a>
        </li>
    </ul>
    <div class="tab_Content_Wrap">
        <div id="tabContent01" class="tabPage">
        <!--  -->
        	<form id="pass_submit" method="post" action="./id_pass_find_db.php?&mode=pass_search">
				<div id="frame" style="width:374px; border: 0px; border-radius : 0px 0px 10px 10px;">
					<b>비밀번호 찾기</b> <input type="button" id="close" onclick="closer()"
			    	value="CLOSE X" style="padding-left: 20px; margin: -2px 2px 10 0;">
					<hr>
					<div id="message2">아이디와 이메일을 입력해 주세요.</div>
					<div id="check">
						<div id="message2" style="padding-right: 115px;">아이디 : <input name="find_id" type="text" style="width: 100px;"></div>
						 <br>
						
						<div id="message2" style="padding-right: 0px;">이메일 : <input id="num1" name="find_email1" type="text" style="width: 100px;">
						@ <input id="num1" name="find_email2" type="text" style="width: 100px;"></div>
						<br>
						<br> <input type="button" onclick="find_pass()" value="확인">
					</div>
					<hr>
					<div id="accept">
				</div>
				</div>
	               <!--  -->
        </div>
        <div id="tabContent02" class="tabPage">
                    <!--  -->
				<div id="frame" style="width:374px; border: 0px; border-radius : 0px 0px 10px 10px;">
					<b>비밀번호 찾기</b> <input type="button" id="close" onclick="closer()"
			    	value="CLOSE X" style="padding-left: 20px; margin: -2px 2px 10 0;">
					<hr>
					<div id="message2">아이디와 휴대폰 번호 입력해주세요.</div>
					<div id="check">
						<div id="message2" style="padding-right: 115px;">아이디 : <input name="find_id2" type="text" style="width: 100px;"></div>
						 <br>
						
						<div id="message2" style="padding-right: 0px; margin-right: 55px;">전화번호 : <input id="num1" name="find_phone" type="text" style="width: 50px;">
						- <input id="num1" name="find_phone2" type="text" style="width: 50px;"> - <input id="num1" name="find_phone3" type="text" style="width: 50px;"></div>
						<br>
						<br> <input type="button" onclick="find_pass()" value="확인">
					</div>
					<hr>
					<div id="accept">
				</div>
				</div>
			</form>
	                  <!--  -->
        </div>
    </div>
</div>
	</div>
	

	
</body>
</html>