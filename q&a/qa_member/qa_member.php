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
			<span id="question">회원가입을 하면 어떤 혜택이 있나요?</span>
		</div>
		<div id="answer">
			<span id="answer">가입 시 바로 적립금 3000원 +무료배송 쿠폰이 지급됩니다. 가입과 동시에 마이페이지를
				통한 주문, 결제 및 배송 내역 조회를 하실 수 있으며 장바구니, 적립금, 고객 Q&A 등 각종 부가 서비스를 이용하실 수
				있습니다.</span>
		</div>
	</div>
	<div id="best1" class="dialog1">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close1" onclick="click2()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title1">회원가입을 하면 어떤 혜택이 있나요?</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content1">가입 시 바로 적립금 3000원 +무료배송
				쿠폰이 지급됩니다. 가입과 동시에 마이페이지를 통한 주문, 결제 및 배송 내역 조회를 하실 수 있으며 장바구니, 적립금,
				고객 Q&A 등 각종 부가 서비스를 이용하실 수 있습니다.</span>
		</div>
	</div>
	<div id="best2" onclick="click3()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">등급별 어떤 할인혜택이 있나요?</span>
		</div>
		<div id="answer">
			<span id="answer">[회원가입후 일정 금액을 주문결제 해 주시면 특정 등급으로 등급업이 됩니다. </span>
		</div>
	</div>
	<div id="best1" class="dialog2">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close2" onclick="click4()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title2">등급별 어떤 할인혜택이 있나요?</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content2">[회원가입후 일정 금액을 주문결제 해 주시면
				특정 등급으로 등급업이 됩니다.</span>
		</div>
	</div>
	<div id="best3" onclick="click5()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">비회원도 주문가능한가요?</span>
		</div>
		<div id="answer">
			<span id="answer">비회원은 주문이 불가능합니다^^</span>
		</div>
	</div>
	<div id="best1" class="dialog3">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close3" onclick="click6()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title3">비회원도 주문가능한가요? 해야되나요.</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content3">비회원은 주문이 불가능합니다^^</span>
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
			<span id="question">회원가입시 가입 조건이 따로 있나요?</span>
		</div>
		<div id="answer">
			<span id="answer"> 특별한 제한없이 누구나 회원으로 이용하실 수 있습니다. 다만, 아래와 같은 몇 가지
				경우에는 회원가입이 어려우니 양해 부탁 드립니다....</span>
		</div>
	</div>
	<div id="best1" class="dialog4">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close4" onclick="click8()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title4">회원가입시 가입 조건이 따로 있나요?</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content4"> 특별한 제한없이 누구나 회원으로 이용하실 수
				있습니다. 다만, 아래와 같은 몇 가지 경우에는 회원가입이 어려우니 양해 부탁 드립니다.<br> <br> 1) ABOKI는
				개인 소비의 목적으로 상품 구입 및 구매대행 서비스가 가능하기 때문에 법인명의로는 회원가입이 어렵습니다.<br> <br>
				2) 만14세 미만의 미성년자의 경우 정보통신망 이용촉진 및 정보보호등에 관한 법률 제 31조 제1항에 의거하여 회원가입이
				불가합니다.
			</span>
		</div>
	</div>
	<div id="best5" onclick="click9()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">ID/비밀번호를 분실했어요.</span>
		</div>
		<div id="answer">
			<span id="answer">ID 또는 비밀번호를 분실하신 경우 홈페이지 ID/PW찾기 클릭하시면 실명인증 단계를 거쳐
				등록된 이메일로 "임시비밀번호"가 발송됩니다. 발급된 임시 비밀번호로 로그인후 비밀번호 수정 해주시면 됩니다. 또는
				이메일을 기재를 해주시지 않은 경우에는 고객센터로 문의해주세요.</span>
		</div>
	</div>
	<div id="best1" class="dialog5">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close5" onclick="click10()">&#x2715;</span>
		</div>
		<div id="question">
			<span id="question" class="dialog__title5">ID/비밀번호를 분실했어요.</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content5">ID 또는 비밀번호를 분실하신 경우 홈페이지
				ID/PW찾기 클릭하시면 실명인증 단계를 거쳐 등록된 이메일로 "임시비밀번호"가 발송됩니다. 발급된 임시 비밀번호로
				로그인후 비밀번호 수정 해주시면 됩니다. 또는 이메일을 기재를 해주시지 않은 경우에는 고객센터( 1588-8341 )로
				문의해주세요.</span>
		</div>
	</div>
	<div id="best6" onclick="click11()">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span id="more_mark">more＋</span>
		</div>
		<div id="question">
			<span id="question">배송은 언제되나요?</span>
		</div>
		<div id="answer">
			<span id="answer">주문해주신 상품은 1~3일정도 준비 기간이 소요됩니다. 여러상품 주문해주셨을경우 묶음배
				송되는점 참고부탁드립니다.</span>
		</div>
	</div>
	<div id="best1" class="dialog6">
		<div id="q_more_mark">
			<b id="q_mark">Q</b><span class="dialog__close6" onclick="click12()">&#x2715;</span>
		</div>
		<div id="question">

			<span id="question" class="dialog__title6">배송은 언제되나요?</span>
		</div>
		<div id="answer">
			<span id="answer" class="dialog__content6">주문해주신 상품은 1~3일정도 준비 기간이
				소요됩니다. 여러상품 주문해주셨을경우 묶음배 송되는점 참고부탁드립니다.</span>
		</div>
	</div>
</div>
<br>
<div id="qa_spell">
	<b>회원/비회원 Q&A게시판</b>
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
        $sql = "select * from qa_write where type='member' and subject like '%$search%' order by num desc";
    } else if ($select == 'content') {
        $sql = "select * from qa_write where type='member' and content like '%$search%' order by num desc";
    } else if ($select == 'name') {
        $sql = "select * from qa_write where type='member' and name like '%$search%' order by num desc";
    } else if ($select == 'id') {
        $sql = "select * from qa_write where type='member' and id like '%$search%' order by num desc";
    }
} else if ($status != 'search' || ! $search) {
    $sql = "select * from qa_write where type='member' order by num desc";
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
	action="./qa_main.php?mode=member&status=search" method="post">
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