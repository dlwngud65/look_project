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
			<span id="question">배송기간은 얼마나 걸리나요?</span>
		</div>
		<div id="answer">
			<span id="answer">입금확인 된 주문서에 한해 1~3일정도 준비기간이 소요됩니다. 출고된 상품은 출고후 1~2일
				후에 수령 가능하십니다. 인기 상품이거나 입고지연 상품일 경우 입고후 고객님들께 발송해 드리고 있어 약....</span>
		</div>
	</div>
	<div id="best1" class="dialog1">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close1" onclick="click2()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title1">배송기간은 얼마나 걸리나요?</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content1">입금확인 된 주문서에 한해 1~3일정도
				준비기간이 소요됩니다. 출고된 상품은 출고후 1~2일 후에 수령 가능하십니다. 인기 상품이거나 입고지연 상품일 경우 입고후
				고객님들께 발송해 드리고 있어 약 3~5일정도 소요되는 경우도 있습니다. 일부 상품의 입고지연시 배송비 추가부담 없이
				부분발송 하고 있습니다. 배송지연의 경우 SMS를 통해 안내해 드리고 있습니다. 배송이 지연되고 있는 경우 조금만 여유를
				가지고 기다려주시길 부탁드립니다.</span>
		</div>
	</div>
	<div id="best2" onclick="click3()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">교환/환불 시 배송비는 얼마인가요?</span>
		</div>
		<div id="answer">
			<span id="answer">[교환] - 하자, 오배송을 제외한 고객변심으로 인한 상품교환시에는 배송비 5000원
				....</span>
		</div>
	</div>
	<div id="best1" class="dialog2">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close2" onclick="click4()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title2">교환/환불 시 배송비는 얼마인가요?</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content2">[교환] - 하자, 오배송을 제외한 고객변심으로
				인한 상품교환시에는 배송비 5000원 [환불] - 카드로 결제시에는 카드취소 및 부분취소 처리가 가능하며, 통장 계좌로는
				환불처리가 불가합니다. - 5만원이상 결제하여 무료배송을 받으신 경우 발송+반품 5000원 - 카드주문 상품 발송
				5000원 ( 카드취소의 경우 처음에 지불한 배송비 2500 원까지 취소처리가 됨 ) - 5만원 미만 무통장 주문 상품
				2500원</span>
		</div>
	</div>
	<div id="best3" onclick="click5()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">무료배송가능 금액은 얼마인가요?</span>
		</div>
		<div id="answer">
			<span id="answer">주문하신 상품금액이 5만원 미만일 경우 배송비 2,500원이 주문시 자동 결제됩니다. 5만원
				이상일 경우 무료배송이 적용되며, 발송 전 구매상품 결제 금액 5만원 ...</span>
		</div>
	</div>
	<div id="best1" class="dialog3">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close3" onclick="click6()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title3">무료배송가능 금액은 얼마인가요?</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content3">주문하신 상품금액이 5만원 미만일 경우 배송비
				2,500원이 주문시 자동 결제됩니다. 5만원 이상일 경우 무료배송이 적용되며, 발송 전 구매상품 결제 금액 5만원
				이상으로 결제하였으나 부분취소를 하게되어 실결제 금액이 5만원 미만이 됐을 경우 배송비를 차감하고 취소금액이 환불처리
				됩니다. ^^</span>
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
			<span id="question">주문한 상품 중 일부상품만 도착했습니다.</span>
		</div>
		<div id="answer">
			<span id="answer">부분 배송이 될 경우 사이트 로그인 후 [ 나의정보 -> 주문내역 -> 주문상세조회 ] 를
				클릭하면 ...</span>
		</div>
	</div>
	<div id="best1" class="dialog4">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close4" onclick="click8()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title4">주문한 상품 중 일부상품만 도착했습니다.</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content4">부분 배송이 될 경우 사이트 로그인 후 [
				나의정보 -> 주문내역 -> 주문상세조회 ] 를 클릭하면 먼저 배송이 된 상품과 아직 준비중인 상품이 확인 가능합니다.
				확인이 다소 어려울 경우 저희 고객센터로 연락을 주시거나 게시판으로 문의해 주시면 확인 후 안내 도와드립니다.</span>
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
			<span id="question">상품을 따로주문했는데 묶음배송이 가능한가요?</span>
		</div>
		<div id="answer">
			<span id="answer">주문서를 따로 작성해 주시면 시스템상 묶음배송이 불가능 합니다. 따로 주문하셨는데 묶음배송을
				원하실 경우에는 주문서를 [ 취소 ]해 주시고 상품을 장바구니에 담아 ....</span>
		</div>
	</div>
	<div id="best1" class="dialog6">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close6" onclick="click12()">&#x2715;</span>
		</div>
		<div id="question">

			<span id="question" class="dialog__title6">상품을 따로주문했는데 묶음배송이 가능한가요?</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content6">주문서를 따로 작성해 주시면 시스템상 묶음배송이
				불가능 합니다. 따로 주문하셨는데 묶음배송을 원하실 경우에는 주문서를 [ 취소 ]해 주시고 상품을 장바구니에 담아 다시 [
				재주문 ]을 해주셔야 합니다.</span>
		</div>
	</div>
</div>
<br>
<div id="qa_spell">
	<b>배송문의 Q&A게시판</b>
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
        $sql = "select * from qa_write where type='order' and subject like '%$search%' order by num desc";
    } else if ($select == 'content') {
        $sql = "select * from qa_write where type='order' and content like '%$search%' order by num desc";
    } else if ($select == 'name') {
        $sql = "select * from qa_write where type='order' and name like '%$search%' order by num desc";
    } else if ($select == 'id') {
        $sql = "select * from qa_write where type='order' and id like '%$search%' order by num desc";
    }
} else if ($status != 'search' || ! $search) {
    $sql = "select * from qa_write where type='order' order by num desc";
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
<form name="search_form" action="./qa_main.php?mode=order&status=search"
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