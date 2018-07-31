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
			<span id="question">현금영수증을 발급하고 싶은데 어떻게 해야되나요.</span>
		</div>
		<div id="answer">
			<span id="answer">주문후에 회원시 " 나의정보 -> 주문내역 -> 주문내역 상세조회 -> 현금 영수증 요청"
				을 이용해 주세요. 비회원시 "주문조회 -> 현금영수증" 으로 요청바랍니다.</span>
		</div>
	</div>
	<div id="best1" class="dialog1">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close1" onclick="click2()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title1">현금영수증을 발급하고 싶은데 어떻게 해야되나요.</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content1">주문후에 회원시 " 나의정보 -> 주문내역 ->
				주문내역 상세조회 -> 현금 영수증 요청" 을 이용해 주세요. 비회원시 "주문조회 -> 현금영수증" 으로 요청바랍니다.</span>
		</div>
	</div>
	<div id="best2" onclick="click3()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">입금확인해주세요.</span>
		</div>
		<div id="answer">
			<span id="answer">ABOKI는 무통장입금, 카드결제, 계좌이체, 핸드폰결제, 에스크로이체가 가능합니다.
				무통장입금 결제시에는 자동 입금 확인 시스템이 마련되어 있어 주문 시 선택해주신 은행계좌로 입금자명과 금액이 동일할 경우
				....</span>
		</div>
	</div>
	<div id="best1" class="dialog2">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close2" onclick="click4()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title2">입금확인해주세요.</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content2">ABOKI는 무통장입금, 카드결제, 계좌이체,
				핸드폰결제, 에스크로이체가 가능합니다. 무통장입금 결제시에는 자동 입금 확인 시스템이 마련되어 있어 주문 시 선택해주신
				은행계좌로 입금자명과 금액이 동일할 경우 자동으로 입금확인이 되고 있습니다. 주문후에 일주일 이내에 입금확인이 되지 않으면
				주문서는 자동을 주문취소됩니다.</span>
		</div>
	</div>
	<div id="best3" onclick="click5()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">주문금액과 다르게 입금을 했어요.</span>
		</div>
		<div id="answer">
			<span id="answer">1) 주문금액보다 더 입금한 경우 입금은행/은행명/날짜/시간을 기재하여 원하시는 처리방법과
				함께 게시판문의 또는 고객센터(1588-8341)로 연락해주시면 해당 과입금(환불 or 예치금)은 처리 ...</span>
		</div>
	</div>
	<div id="best1" class="dialog3">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close3" onclick="click6()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title3">주문금액과 다르게 입금을 했어요.</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content3">1) 주문금액보다 더 입금한 경우
				입금은행/은행명/날짜/시간을 기재하여 원하시는 처리방법과 함께 게시판문의 또는 고객센터(1588-8341)로 연락해주시면
				해당 과입금(환불 or 예치금)은 처리가 가능합니다. <br> <br>2) 주문금액보다 덜 입금한 경우 기본적으로
				입금확인이 되지않으니 위 경우에는 미입금 금액을 입금후에 처음입금해주신 이력과 추후에 입금해주신 이력을 게시판에 문의 또는
				고객센터(1588-8341)로 연락해주시면 입금확인이 가능합니다.
			</span>
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
			<span id="question">입금을 했는데 입금확인이 되지 않아요.</span>
		</div>
		<div id="answer">
			<span id="answer">자동입금확인 불가사항 1) 입금자명이 다를 경우 - 주문 시 기재해 주신 입금자명이 아닌
				다른 성명을 입금한 경우 - 인터넷 뱅킹 이용시 받는분 통장메모에 고객님의 성명이 ...</span>
		</div>
	</div>
	<div id="best1" class="dialog4">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close4" onclick="click8()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title4">상품은 받았는데 환불하고 싶어요. 어떻게 하나요
				?</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content4">자동입금확인 불가사항 1) 입금자명이 다를 경우
				- 주문 시 기재해 주신 입금자명이 아닌 다른 성명을 입금한 경우 - 인터넷 뱅킹 이용시 받는분 통장메모에 고객님의 성명이
				아닌 다른내용을 기재한 경우 - ATM기기 이용 입금시 전화번호로 기재한 경우 <br>
			<br> 2) 주문금액과 입금금액이 동일하지 않을 경우 (미입금 및 과입금해주신경우)<br><br> 3) 비슷한 주문서가 중복으로 존재할
				경우 <br><br>4) 따로 주문후 한꺼번에 입금해주신 경우나 입금금액을 여러번 나눠서 입금해주신 경우
			</span>
		</div>
	</div>
	<div id="best5" onclick="click9()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">에스크로로 입금했는데 입금확인이 되지 않아요.</span>
		</div>
		<div id="answer">
			<span id="answer">"에스크로( 결제대금 예치제 )"란 전자상 거래에서 판매자와 구매자가 거래 합의 후 상품배송
				및 결제과정에서 거래사고를 예방하기 위하여 거래대금의 입출금을 제3의 회사가 관리하...</span>
		</div>
	</div>
	<div id="best1" class="dialog5">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close5" onclick="click10()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title5">에스크로로 입금했는데 입금확인이 되지 않아요.</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content5">"에스크로( 결제대금 예치제 )"란 전자상
				거래에서 판매자와 구매자가 거래 합의 후 상품배송 및 결제과정에서 거래사고를 예방하기 위하여 거래대금의 입출금을 제3의
				회사가 관리하여 판매자와 구매자 모두의 거래안전을 도모하는 서비스 제도를 의미합니다. 에스크로로 입금해 주신경우에는
				자동으로 입금확인이 되지 않으니 게시판 문의 또는 고객센터(1588-8341)로 연락 바랍니다. </span>
		</div>
	</div>
	<div id="best6" onclick="click11()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">한가지이상의 상품을 주문할경우 한번에 구매할수있나요?</span>
		</div>
		<div id="answer">
			<span id="answer">[장바구니]를 활용하시면 됩니다. 여러 상품을 주문하실 경우 먼저 [장바구니]에 모든상품을
				담아...</span>
		</div>
	</div>
	<div id="best1" class="dialog6">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close6" onclick="click12()">&#x2715;</span>
		</div>
		<div id="question">

			<span id="question" class="dialog__title6">한가지이상의 상품을 주문할경우 한번에
				구매할수있나요?</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content6">[장바구니]를 활용하시면 됩니다. 여러 상품을
				주문하실 경우 먼저 [장바구니]에 모든상품을 담아 구매해주세요. - 단체주문은 꼭 주문전 / 주문후 고객센터로
				연락부탁드립니다!</span>
		</div>
	</div>
</div>
<br>
<div id="qa_spell">
	<b>주문/결제 Q&A게시판</b>
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
        $sql = "select * from qa_write where type='pay' and subject like '%$search%' order by num desc";
    } else if ($select == 'content') {
        $sql = "select * from qa_write where type='pay' and content like '%$search%' order by num desc";
    } else if ($select == 'name') {
        $sql = "select * from qa_write where type='pay' and name like '%$search%' order by num desc";
    } else if ($select == 'id') {
        $sql = "select * from qa_write where type='pay' and id like '%$search%' order by num desc";
    }
} else if ($status != 'search' || ! $search) {
    $sql = "select * from qa_write where type='pay' order by num desc";
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
<form name="search_form" action="./qa_main.php?mode=pay&status=search"
	method="post">
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