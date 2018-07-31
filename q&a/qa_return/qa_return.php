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
			<span id="question">교환 및 환불 반품 배송비 안내</span>
		</div>
		<div id="answer">
			<span id="answer">교환 : 하자, 오배송을 제외한 고객변심으로 인한 상품교환시에는 배송비 5000원 환불 :
				카드로 결제시에는 카드취소 및 부분취소 처리가 가능하며, 통장 계좌로는 환불처리가 불가합니다.... </span>
		</div>
	</div>
	<div id="best1" class="dialog1">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close1" onclick="click2()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title1">교환 및 환불 반품 배송비 안내</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content1">교환 : 하자, 오배송을 제외한 고객변심으로
				인한 상품교환시에는 배송비 5000원 <br> <br> 환불 : 카드로 결제시에는 카드취소 및 부분취소 처리가 가능하며,
				통장 계좌로는 환불처리가 불가합니다. <br> 그외 : <br> - 5만원이상 결제하여 무료배송을 받으신 경우 발송+반품
				5000원 <br> - 카드주문 상품 발송 5000원 (카드취소의 경우 처음에 지불한 배송비 2500 원까지 취소처리가
				됨)
			</span>
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
			<span id="question">주문한 상품이 아닌 다른상품 혹은 불량상품 도착</span>
		</div>
		<div id="answer">
			<span id="answer">먼저 하자, 오배송으로 인해 불편을 드려 죄송합니다. 위의 경우 기본적으로 배송비는
				아보키에서 책임 ...</span>
		</div>
	</div>
	<div id="best1" class="dialog3">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close3" onclick="click6()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title3">주문한 상품이 아닌 다른상품 혹은 불량상품 도착</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content3">먼저 하자, 오배송으로 인해 불편을 드려
				죄송합니다. 위의 경우 기본적으로 배송비는 아보키에서 책임을 집니다. 잘못된 상품의 검품 및 재준비를 위해서 상품을 반드시
				저희쪽으로 보내주셔야 원활한 처리가 이루어지니 이점 양해해 주세요. 하자, 오배송 받으신 상품은
				CJ택배(1588-5353)를 이용하여 상품을 착불로 보내주시면 됩니다 위의 경우 주문한 동일 상품으로 적립금으로 환급,
				환불처리 모두 가능합니다. 보내주실때 먼저 사전접수 후 고객센터로 보내주시면 처리 도와드립니다.CJ택배가 아닌 다른
				택배사를 이용해 주시는 경우에는 초과 배송비는 고객님께서 부담해 주셔야합니다. </span>
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
			<span id="question">브랜드 상품을 교환 / 반품하고 싶어요.</span>
		</div>
		<div id="answer">
			<span id="answer"> 해당 자세한 반품 주소지는 BRAND내 상품을 클릭해 주시면 기재가 되어 있으니 참고
				바랍니다. 또한 고객센 ...</span>
		</div>
	</div>
	<div id="best1" class="dialog4">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close4" onclick="click8()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title4">브랜드 상품을 교환 / 반품하고 싶어요.</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content4">해당 자세한 반품 주소지는 BRAND내 상품을
				클릭해 주시면 기재가 되어 있으니 참고 바랍니다. 또한 고객센터나 게시판으로 문의해주시면 빠른처리가 가능합니다^^</span>
		</div>
	</div>
	<div id="best5" onclick="click9()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">직접 주문 취소를 하고 싶은데 어떻게 해야 하죠?</span>
		</div>
		<div id="answer">
			<span id="answer">결제완료 상태에서 취소를 원하실 경우 로그인후 [ 마이페이지 -> 주문/배송조회 ->
				주문상세조회 ] 에서 취소 신청을 하시면 처리됩니다..</span>
		</div>
	</div>
	<div id="best1" class="dialog5">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close5" onclick="click10()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title5">직접 주문 취소를 하고 싶은데 어떻게 해야
				하죠?</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content5">결제완료 상태에서 취소를 원하실 경우 로그인후
				[ 마이페이지 -> 주문/배송조회 -> 주문상세조회 ] 에서 취소 신청을 하시면 처리됩니다. 단, 주문하신 상품의
				배송상태가 [ 상품준비 ], [ 배송준비 ] 단계일 때에만 고객님께서 직접 취소 가능 합니다.</span>
		</div>
	</div>
	<div id="best6" onclick="click11()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">무통장입금/계좌이체 했는데 주문서가 취소되었어요.</span>
		</div>
		<div id="answer">
			<span id="answer">주문시 무통장입금 결제방법을 선택경우 주문일로부터 7일이내 입금확인이 되어야 합니다. 7일내
				입금확인 되지 않는 주문건에 한하....</span>
		</div>
	</div>
	<div id="best1" class="dialog6">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close6" onclick="click12()">&#x2715;</span>
		</div>
		<div id="question">

			<span id="question" class="dialog__title6">무통장입금/계좌이체 했는데 주문서가
				취소되었어요.</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content6">주문시 무통장입금 결제방법을 선택경우
				주문일로부터 7일이내 입금확인이 되어야 합니다. 7일내 입금확인 되지 않는 주문건에 한하여 자동취소 처리되고 있습니다.
				입금금액 / 입금은행 / 입금자명 이 주문시 기재된 내용과 상이한 경우 자동으로 입금확인 되고 있지 않으니, 홈페이지 내
				게시판 또는 고객센터로 문의주시면 입금확인 처리 해드리겠습니다.</span>
		</div>
	</div>
</div>
<br>
<div id="qa_spell">
	<b>반품/교환/환불 Q&A게시판</b>
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
        $sql = "select * from qa_write where type='return' and subject like '%$search%' order by num desc";
    } else if ($select == 'content') {
        $sql = "select * from qa_write where type='return' and content like '%$search%' order by num desc";
    } else if ($select == 'name') {
        $sql = "select * from qa_write where type='return' and name like '%$search%' order by num desc";
    } else if ($select == 'id') {
        $sql = "select * from qa_write where type='return' and id like '%$search%' order by num desc";
    }
} else if ($status != 'search' || ! $search) {
    $sql = "select * from qa_write where type='return' order by num desc";
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
	action="./qa_main.php?mode=return&status=search" method="post">
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