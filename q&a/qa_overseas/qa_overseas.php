<?php
$search = $_POST['search'];
$id = $_SESSION['user_id'];

?>
<html>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">

function search_button(){
	var select = document.getElementById("select");
	var option = select.options[select.selectedIndex].value;
	
	if(option==""){
		window.alert("선택항목을 골라주세요.");
		select.focus();
		return;
	 }
	document.search_form.submit();
}

function click1() {
	var dialogBox = $('.dialog1'),
    dialogTrigger = $('.dialog__trigger1'),
    dialogClose = $('.dialog__close1'),
    dialogTitle = $('.dialog__title1'),
    dialogContent = $('.dialog__content1'),
    dialogAction = $('.dialog__action1'),
    dialogactive = ('dialog--active1');
        dialogBox.toggleClass(dialogactive);
        e.stopPropagation()
};


function click2() {
	var dialogBox = $('.dialog1'),
    dialogTrigger = $('.dialog__trigger1'),
    dialogClose = $('.dialog__close1'),
    dialogTitle = $('.dialog__title1'),
    dialogContent = $('.dialog__content1'),
    dialogAction = $('.dialog__action1'),
    dialogactive = ('dialog--active1');
	dialogBox.removeClass('dialog--active1');
}

function click3() {
	var dialogBox = $('.dialog2'),
    dialogTrigger = $('.dialog__trigger2'),
    dialogClose = $('.dialog__close2'),
    dialogTitle = $('.dialog__title2'),
    dialogContent = $('.dialog__content2'),
    dialogAction = $('.dialog__action2'),
    dialogactive = ('dialog--active2');
        dialogBox.toggleClass(dialogactive);
        e.stopPropagation()
};


function click4() {
	var dialogBox = $('.dialog2'),
    dialogTrigger = $('.dialog__trigger2'),
    dialogClose = $('.dialog__close2'),
    dialogTitle = $('.dialog__title2'),
    dialogContent = $('.dialog__content2'),
    dialogAction = $('.dialog__action2'),
    dialogactive = ('dialog--active2');
	dialogBox.removeClass('dialog--active2');
}

function click5() {
	var dialogBox = $('.dialog3'),
    dialogTrigger = $('.dialog__trigger3'),
    dialogClose = $('.dialog__close3'),
    dialogTitle = $('.dialog__title3'),
    dialogContent = $('.dialog__content3'),
    dialogAction = $('.dialog__action3'),
    dialogactive = ('dialog--active3');
        dialogBox.toggleClass(dialogactive);
        e.stopPropagation()
};


function click6() {
	var dialogBox = $('.dialog3'),
    dialogTrigger = $('.dialog__trigger3'),
    dialogClose = $('.dialog__close3'),
    dialogTitle = $('.dialog__title3'),
    dialogContent = $('.dialog__content3'),
    dialogAction = $('.dialog__action3'),
    dialogactive = ('dialog--active3');
	dialogBox.removeClass('dialog--active3');
}
function click7() {
	var dialogBox = $('.dialog4'),
    dialogTrigger = $('.dialog__trigger4'),
    dialogClose = $('.dialog__close4'),
    dialogTitle = $('.dialog__title4'),
    dialogContent = $('.dialog__content4'),
    dialogAction = $('.dialog__action4'),
    dialogactive = ('dialog--active4');
        dialogBox.toggleClass(dialogactive);
        e.stopPropagation()
};


function click8() {
	var dialogBox = $('.dialog4'),
    dialogTrigger = $('.dialog__trigger4'),
    dialogClose = $('.dialog__close4'),
    dialogTitle = $('.dialog__title4'),
    dialogContent = $('.dialog__content4'),
    dialogAction = $('.dialog__action4'),
    dialogactive = ('dialog--active4');
	dialogBox.removeClass('dialog--active4');
}
function click9() {
	var dialogBox = $('.dialog5'),
    dialogTrigger = $('.dialog__trigger5'),
    dialogClose = $('.dialog__close5'),
    dialogTitle = $('.dialog__title5'),
    dialogContent = $('.dialog__content5'),
    dialogAction = $('.dialog__action5'),
    dialogactive = ('dialog--active5');
        dialogBox.toggleClass(dialogactive);
        e.stopPropagation()
};


function click10() {
	var dialogBox = $('.dialog5'),
    dialogTrigger = $('.dialog__trigger5'),
    dialogClose = $('.dialog__close5'),
    dialogTitle = $('.dialog__title5'),
    dialogContent = $('.dialog__content54'),
    dialogAction = $('.dialog__action5'),
    dialogactive = ('dialog--active5');
	dialogBox.removeClass('dialog--active5');
}
function click11() {
	var dialogBox = $('.dialog6'),
    dialogTrigger = $('.dialog__trigger6'),
    dialogClose = $('.dialog__close6'),
    dialogTitle = $('.dialog__title6'),
    dialogContent = $('.dialog__content6'),
    dialogAction = $('.dialog__action6'),
    dialogactive = ('dialog--active6');
        dialogBox.toggleClass(dialogactive);
        e.stopPropagation()
};


function click12() {
	var dialogBox = $('.dialog6'),
    dialogTrigger = $('.dialog__trigger6'),
    dialogClose = $('.dialog__close6'),
    dialogTitle = $('.dialog__title6'),
    dialogContent = $('.dialog__content6'),
    dialogAction = $('.dialog__action6'),
    dialogactive = ('dialog--active6');
	dialogBox.removeClass('dialog--active6');
}

// Run function when the document has loaded




</script>
<div id="qa_spell">
	<b>최근 자주 묻는 질문BEST</b>
</div>
<br>
<div id="best">
	<div id="best1" onclick="click1()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">해외배송을 받고 싶은데 주문은 어떻게 하나요?</span>
		</div>
		<div id="answer">
			<span id="answer">해외배송시 주문은 기존 주문을 해주시는 방법과 동일합니다. 상품을 선택하여 주문을 해주신
				후에(주문시 꼭 해외현지 주소및 전화번호를 정확하게 써 주세요) 해외배송게시판에 해외주소지 수취인명 연락처를 기재하여
				주세요. 간혹, 장바구니나 게시...</span>
		</div>
	</div>
	<div id="best1" class="dialog1">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close1" onclick="click2()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title1">해외배송을 받고 싶은데 주문은 어떻게 하나요?</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content1">해외배송시 주문은 기존 주문을 해주시는 방법과
				동일합니다. 상품을 선택하여 주문을 해주신 후에(주문시 꼭 해외현지 주소및 전화번호를 정확하게 써 주세요) 해외배송게시판에
				해외주소지 수취인명 연락처를 기재하여 주세요. 간혹, 장바구니나 게시판에 주문해주시지 않으시고 상품명을 적어주시는
				고객님들이 있으신데 저희쪽에서 확인작업이 안되기 때문에 반드시 주문을 해주신후에 문의를 해주세요. *이때 상품은 반드시
				결제'전' 이어야 합니다.</span>
		</div>
	</div>
	<div id="best2" onclick="click3()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">EMS 서비스지역</span>
		</div>
		<div id="answer">
			<span id="answer">ALBANIA(알바니아), ARMENIA(아르메니아), AUSTRIA(오스트리아),
				AZERBAIJAN(아제르바이잔), BAHRAIN(바레인), BELARUS(벨라루스), BELGIUM(벨기에), BULGA
				....</span>
		</div>
	</div>
	<div id="best1" class="dialog2">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close2" onclick="click4()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title2">EMS 서비스지역</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content2">[ALBANIA(알바니아),
				ARMENIA(아르메니아), AUSTRIA(오스트리아), AZERBAIJAN(아제르바이잔), BAHRAIN(바레인),
				BELARUS(벨라루스), BELGIUM(벨기에), BULGARIA(REP)(불가리아), Bosnia and
				Herzegovina(보스니아헤르체코비나), CROATIA(크로아티아), CYPRUS(사이프러스), CZECH
				REP(체코), DENMARK(덴마크), ESTONIA(에스토니아), FINLAND(핀란드), GEORGIA(그루지아),
				GREECE(그리스), HUNGARY(REP)(헝가리), IRAN(ISLAMIC REP)(이란),
				IRELAND(아일란드(에이레)), ISRAEL(이스라엘), JORDAN(요르단), KAZAKHSTAN(카자흐스탄),
				LATVIA(라트비아), LUXEMBOURG(룩셈부르크)</span>
		</div>
	</div>
	<div id="best3" onclick="click5()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">주문 후에 게시판에 글을 남겼습니다.</span>
		</div>
		<div id="answer">
			<span id="answer">주문 후 해외배송게시판의 양식대로 해외주소지,연락처,수취인명을 기재해주세요. 기재해주신후에는
				해당 담당자가 주소지에 따른 중량 체크 후에 해외배송비 금액을 댓글로 알려드리며 카드 또는 실 ...</span>
		</div>
	</div>
	<div id="best1" class="dialog3">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close3" onclick="click6()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title3">주문 후에 게시판에 글을 남겼습니다.</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content3">주문 후 해외배송게시판의 양식대로
				해외주소지,연락처,수취인명을 기재해주세요. 기재해주신후에는 해당 담당자가 주소지에 따른 중량 체크 후에 해외배송비 금액을
				댓글로 알려드리며 카드 또는 실시간 계좌이체,핸드폰결제시 요청해주시면 고객님의 개인결제창을 만들어드립니다. 개인결제창을
				주문하여 입금해주신 후에 다시 게시판으로 문의해주세요^^</span>
		</div>
	</div>
</div>
<br>
<div id="best7">
	<div id="best4" onclick="click7()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">해외배송시 취소, 반품 불가합니다.</span>
		</div>
		<div id="answer">
			<span id="answer">해외로 배송이 나간 경우 취소, 반품이 불가합니다. 이 점 참고해 주시기 바랍니다.
				EMS(국제특급) 대한민국 정보통신부 우정사업본부...</span>
		</div>
	</div>
	<div id="best1" class="dialog4">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close4" onclick="click8()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title4">해외배송시 취소, 반품 불가합니다. ?</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content4">해외로 배송이 나간 경우 취소, 반품이
				불가합니다. 이 점 참고해 주시기 바랍니다. EMS(국제특급) 대한민국 정보통신부 우정사업본부와 외국의 공신력있는
				우편당국과 체결한 특별협정에 따라 취급하는 국제특급우편서비스입니다. 가격은 항공소포보다 다소 높지만 공신력과 신속성,
				행방조회가 가능하므로 빠르게 받아보고 싶으신분이나, 고가의 상품구매시 추천되는 방법입니다.</span>
		</div>
	</div>
	<div id="best5" onclick="click9()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">배송은 언제되나요?</span>
		</div>
		<div id="answer">
			<span id="answer">주문해주신 상품은 1~3일정도 준비기간이 소요됩니다.여러상품 주문해주셨을경우 묶음배송되는점
				참고 바랍니다. 출고된 상품은 출고후 1~2일 후에 수령 가능하십니다. 인기 상품이거나 입고지연 상품일 경우 입고후
				고객님들께 발송해드리고 있어 약 3~5일정도 소요되나...</span>
		</div>
	</div>
	<div id="best1" class="dialog5">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close5" onclick="click10()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title5">배송은 언제되나요?</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content5">주문해주신 상품은 1~3일정도 준비기간이
				소요됩니다.여러상품 주문해주셨을경우 묶음배송되는점 참고 바랍니다. 출고된 상품은 출고후 1~2일 후에 수령 가능하십니다.
				인기 상품이거나 입고지연 상품일 경우 입고후 고객님들께 발송해드리고 있어 약 3~5일정도 소요되나 , 인기상품일 경우
				조금더 소요될수있는점 참고부탁드립니다. 일부 상품의 입고 지연시 배송비 추가 부담없이 부분 발송해 드리고 있으며,
				배송지연의 경우 SMS를 통해 안내 해드리고 있습니다. 배송이 지연되고 있는 경우 조금만 여유를 가지고 기다려주시길
				부탁드립니다. </span>
		</div>
	</div>
	<div id="best6" onclick="click11()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">해외배송조회 및 배송까지 걸리는 시간</span>
		</div>
		<div id="answer">
			<span id="answer">해외배송경우에는 배송비까지 모든 결제 후에 상품이 준비가 되고 있습니다. 전 상품을 한꺼번에
				발송을 해드려야 하기 때문에 배송까지에 소요기간은 기본 2-15일정도가 소요가 됩니다....</span>
		</div>
	</div>
	<div id="best1" class="dialog6">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close6" onclick="click12()">&#x2715;</span>
		</div>
		<div id="question">

			<span id="question" class="dialog__title6">해외배송조회 및 배송까지 걸리는 시간</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content6">해외배송경우에는 배송비까지 모든 결제 후에
				상품이 준비가 되고 있습니다. 전 상품을 한꺼번에 발송을 해드려야 하기 때문에 배송까지에 소요기간은 기본 2-15일정도가
				소요가 됩니다. *상품중에 입고지연인 상품들은 조금더 소요가 될 수 있으니 해당부분으로 문의시에는 꼭 게시판으로
				문의부탁드립니다. 해외주문시 EMS을 이용하시면 지역에 따라 2~10일 이내에 물건을 수령하실 수 있습니다. 도착자의
				주소를 정확히 기재하지 않으신 경우 1~2일 정도의 배송기간이 더 소요되며, 또한 약간의 추가요금이 발생합니다. 천재지변,
				현지상황 및 도착지 주말휴무, 통관과 같은 기타 사유로 인하여 변동이 있을 수 있음을 알려드립니다.</span>
		</div>
	</div>
</div>
<br>
<div id="qa_spell">
	<b>해외배송 Q&A게시판</b>
</div>
<br>
<br>
<?php
include '../lib/dbconn.php';
if (! empty($_GET['status'])) {
    $status = $_GET['status'];
}

if (! empty($_POST['search'])) {
    $search = $_POST['search'];
}
$select = $_POST['select'];
if ($status == 'search') {
    if ($select == 'subject') {
        $sql = "select * from qa_write where type='overseas' and subject like '%$search%' order by num desc";
    } else if ($select == 'content') {
        $sql = "select * from qa_write where type='overseas' and content like '%$search%' order by num desc";
    } else if ($select == 'name') {
        $sql = "select * from qa_write where type='overseas' and name like '%$search%' order by num desc";
    } else if ($select == 'id') {
        $sql = "select * from qa_write where type='overseas' and id like '%$search%' order by num desc";
    }
} else if ($status != 'search' || ! $search) {
    $sql = "select * from qa_write where type='overseas' order by num desc";
}
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$total_record = mysqli_num_rows($result);

// 페이지 당 글수, 블럭당 페이지 수
$rows_scale = 10;
$pages_scale = 10;

// 전체 페이지 수 ($total_page) 계산
$total_pages = ceil($total_record / $rows_scale);

if (empty($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$start_row = $rows_scale * ($page - 1);
$pre_page = $page > 1 ? $page - 1 : NULL;
$next_page = $page < $total_pages ? $page + 1 : NULL;
$start_page = (ceil($page / $pages_scale) - 1) * $pages_scale + 1;
$end_page = ($total_pages >= ($start_page + $pages_scale)) ? $start_page + $pages_scale - 1 : $total_pages;
$number = $total_record - $start_row;
?>
<form name="search_form"
	action="./qa_main.php?mode=overseas&status=search" method="post">
	<table id="qa_all">
		<tr>
			<td class="td1" colspan="5"><select id="select" name="select">
					<option value="">선택</option>
					<option value="subject">제목</option>
					<option value="content">내용</option>
					<option value="name">작성자</option>
					<option value="id">아이디</option>
			</select><input type="text" id="search" name="search"><input
				type="button" id="search" value="검색" onclick="search_button()"></td>
		</tr>

		<tr style="text-align: center; font-weight: bold;">
			<td class="td2">번호</td>
			<td class="td3">질문타입</td>
			<td class="td4">제목</td>
			<td class="td3">작성자</td>
			<td class="td2">조회수</td>
		</tr>
			<?php

for ($i = $start_row; ($i < $start_row + $rows_scale) && ($i < $total_record); $i ++) {
    mysqli_data_seek($result, $i);
    $row = mysqli_fetch_array($result);
    $qa_num = $row[num];
    $qa_type = $row[type];
    $qa_title = $row['subject'];
    $qa_id = $row['id'];
    $qa_hit = $row['hit'];
    $qa_set_pass = $row['set_password']?>
    
		<tr style="text-align: center;">
			<td class="td2"><?= $number ?></td>
			<td class="td3">
			<?php
    
    if ($qa_type == 'pay') {
        echo '주문/결제';
    } else if ($qa_type == 'member') {
        echo '회원/비회원';
    } else if ($qa_type == 'order') {
        echo '배송문의';
    } else if ($qa_type == 'overseas') {
        echo '해외배송';
    } else if ($qa_type == 'product') {
        echo '상품문의';
    } else if ($qa_type == 'return') {
        echo '반품/교환/환불';
    }
    ?>
			</td>
			<?php
    
    if ($qa_set_pass == 'y') {
        ?><?php if($id == $qa_id || ((strlen($id) <= 6)&&(strlen($id) > 0))){?>
        <td class="td4"><a
				href="./qa_view.php?num=<?=$qa_num ?>&page=<?=$page ?>" class="view"><?=$qa_title ?><img
					src='../img/잠금.png'
					style='width: 12px; height: 12px; vertical-align: -2px;'></a></td>
        <?php }else{?>
        <td class="td4"><a
				href="./qa_secret.php?num=<?=$qa_num ?>&page=<?=$page ?>&id=<?=$qa_id ?>"
				class="view"><?=$qa_title ?><img src='../img/잠금.png'
					style='width: 12px; height: 12px; vertical-align: -2px;'></a></td>
        <?php }?>
        
        <?php
    } else {
        ?>
         <td class="td4"><a
				href="./qa_view.php?num=<?=$qa_num ?>&page=<?=$page ?>" class="view"><?=$qa_title ?></a></td>
        <?php
    }
    ?>
			<td class="td3"><?= $qa_id?></td>
			<td class="td2"><?= $qa_hit?></td>
		</tr>
		<?php $number--;}?>
	</table>
	<div id='page_box'>
<?PHP
// ----------------이전블럭 존재시 링크------------------#
if ($start_page > $pages_scale) {
    $go_page = $start_page - $pages_scale;
    echo "<a id='before_block' href='./qa_main.php?mode=all&page=$go_page'> << </a>";
}
// ----------------이전페이지 존재시 링크------------------#
if ($pre_page) {
    echo "<a id='before_page' href='./qa_main.php?mode=all&page=$pre_page'> < </a>";
}
// --------------바로이동하는 페이지를 나열---------------#
for ($dest_page = $start_page; $dest_page <= $end_page; $dest_page ++) {
    if ($dest_page == $page) {
        echo ("&nbsp;<b id='present_page'>$dest_page</b>&nbsp");
    } else {
        echo "<a id='move_page' href='./qa_main.php?mode=all&page=$dest_page'>$dest_page</a>";
    }
}
// ----------------이전페이지 존재시 링크------------------#
if ($next_page) {
    echo "<a id='next_page' href='./qa_main.php?mode=all&page=$next_page'> > </a>";
}
// ---------------다음페이지를 링크------------------#
if ($total_pages >= $start_page + $pages_scale) {
    $go_page = $start_page + $pages_scale;
    echo "<a id='next_block' href='./qa_main.php?mode=all&page=$go_page'> >> </a>";
}
?>      
   </div>
</form>
<br>
<div id="write">
	<a href="./qa_write.php?page=<?=$page ?>"><input type="button"
		id="write" value="글쓰기"></a>
</div>
</html>