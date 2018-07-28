<?php
session_start();
include_once '../lib/dbconn.php';

if (! empty($_GET['mode'])) {
    $mode = $_GET['mode'];
}
if (! empty($_GET['select'])) {
    $select = $_GET['select'];
}
if (! empty($_POST['search'])) {
    $search = $_POST['search'];
}
// 공지사항 작성 테이블 생성
if ($mode == 'notice' && $select == 'notice_sub1') {
    $flag = "NO";
    $sql = "show tables from lookdb";
    $result = mysqli_query($con, $sql) or die("실패원인:" . mysqli_error($con));
    
    while ($row = mysqli_fetch_row($result)) {
        if ($row[0] === "notice") {
            $flag = "OK";
            break;
        }
    }
    if ($flag !== "OK") {
        $sql = "create table notice(
                num int not null auto_increment,
                admin_id char(5) not null,
                subject char(30) not null,
                content text not null,
                regist_day char(20),
                hit int,
                primary key(num)
               )";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('notice 테이블이 생성되었습니다.')</script>";
        } else {
            echo "실패원인:" . mysqli_query($con);
        }
    }
}

?>
<html>
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

//////////////공지사항
function insert_click(){
	
	if(!document.getElementById('subject').value){
		  alert('제목을 입력해주세요.');
	      document.getElementById('subject').focus();
	      return;
	}
	 var subject = document.getElementById('subject').value;
	   if(subject.length>30){
	      alert('제목은 30자 이내로 입력바랍니다. ');
	      document.getElementById('subject').focus();
	      return;
	   }
	
	if(!document.getElementById('content').value){
		  alert('내용을 입력해 주세요.');
	      document.getElementById('content').focus();
	      return;
	}
	
	document.insert_form.submit();
	
	
}

function checkAll(){
	
	if($("#checkall").is(':checked')){
		$("input[name='checkrow[]']").prop("checked",true);
	}else{
		$("input[name='checkrow[]']").prop("checked",false);
	}
}

function notice_del(){
	
	var res = confirm('삭제하시겠습니까?');
	
	if(res){
	for(i=0 ; i<$("input[name='checkrow[]']").length ; i++){
		if($("input[name='checkrow[]']")[i].checked == false){
			$("input[name='checkrow[]']")[i].disabled =true;
		}
		
	}
	
	document.delete_form.submit();
	}
}

//////////이벤트

function event_insertCheck(){
	
	if(!document.getElementById('subject').value){
		  alert('제목을 입력해주세요.');
	      document.getElementById('subject').focus();
	      return;
	}
	 var subject = document.getElementById('subject').value;
	   if(subject.length>30){
	      alert('제목은 30자 이내로 입력바랍니다. ');
	      document.getElementById('subject').focus();
	      return;
	   }
	
	if(!document.getElementById('content').value){
		  alert('내용을 입력해 주세요.');
	      document.getElementById('content').focus();
	      return;
	}
	
	document.insert_eventform.submit();
	
}
function checkAll2(){
	
	if($("#checkall2").is(':checked')){
		$("input[name='checkrow2[]']").prop("checked",true);
	}else{
		$("input[name='checkrow2[]']").prop("checked",false);
	}
}

function event_del2(){
	
	var res = confirm('삭제하시겠습니까?');
	
	if(res){
	for(i=0 ; i<$("input[name='checkrow2[]']").length ; i++){
		if($("input[name='checkrow2[]']")[i].checked == false){
			$("input[name='checkrow2[]']")[i].disabled =true;
		}
		
	}
	
	document.delete_event.submit();
	}
}

function searchs(){
	var select = document.getElementById("select");
	var option = select.options[select.selectedIndex].value;
	
	if(option==""){
		window.alert("선택항목을 골라주세요.");
		select.focus();
		return;
	 }
	document.search_form.submit();
}
</script>

<?php
// 기본관리 부분
if ($mode == 'notice' && $select == 'notice_sub1') {
    
    if (! empty($_GET['num'])) {
        $num = $_GET['num'];
    }
    if (! $num) {
        ?>
<br>
<form name="insert_form"
	action="./admin_content_notice/insert_notice.php" method="post">
	<div id='admin_common_sub1'>
		<b>공지사항 등록</b>
		<hr>
	</div>
	<br>
	<div id='title1'>
		<b id='title2'>*</b> 공지사항 작성
	</div>

	<table>
		<tr>
			<td class='td1'><b>*</b> 작성자</td>
			<td class='td2'>운영자</td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 제목</td>
			<td class='td2'><input type='text' class="notice" id='subject'
				name='subject'></td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 내용</td>
			<td class='td2'><textarea rows="30" cols="110" class="notice"
					id='content' name='content'></textarea></td>
		</tr>
	</table>
	<div id='save'>
		<input type='button' id='save_button' onclick='insert_click()'
			value='저장'></input>
	</div>
</form>
<?php
    } else {
        // 상품 수정.
        $sql = "select * from notice where num = '$num'";
        
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        $row = mysqli_fetch_array($result);
        
        ?>
<br>
<div id='admin_common_sub1'>
	<b>공지사항 등록</b>
	<hr>
</div>
<br>
<div id='title1'>
	<b id='title2'>*</b> 공지사항 수정
</div>
<form name="insert_form"
	action="./admin_content_notice/insert_notice.php?status=modify"
	method="post">
	<input type="hidden" name='num' value='<?=$num?>'>
	<table>
		<tr>
			<td class='td1'><b>*</b> 작성자</td>
			<td class='td2'>운영자</td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 제목</td>
			<td class='td2'><input type='text' class="notice" id='subject'
				name='subject' value='<?=$row['subject']?>'></td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 내용</td>
			<td class='td2'><textarea rows="30" cols="110" class="notice"
					id='content' name='content'><?=$row['content']?></textarea></td>
		</tr>
	</table>
	<div id='save'>
		<input type='button' id='save_button' onclick='insert_click()'
			value='수정'></input>
	</div>
</form>
    
<?php
    }
    
    ?>
<?php
} else if ($mode == 'notice' && $select == 'notice_sub2' && empty($search)) {
    
    $sql = "select * from notice order by regist_day desc";
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
    <br>
<div id='admin_common_sub1'>
	<b>공지사항 등록</b>
	<hr>
</div>
<br>
<div id='title1'>
	<b id='title2'>*</b> 공지사항 리스트
</div>
<table>
	<tr>
		<form action="./admin_main.php?mode=notice&select=notice_sub2" method="post">
		<td colspan='7' style='text-align: right'>
		<input id='search' name='search' type='text'><button id='search_button'>검색</button>
		</td>
		</form>
	</tr>
	<form name="delete_form" action="./admin_content_notice/delete_notice.php" method="post">
		<tr>
			<td id='num' class='td4'><input type='checkbox' id='checkall'
				onclick="checkAll()"></td>
			<td id='num' class='td4'>NO</td>
			<td class='td11'>제목</td>
			<td class='td12'>작성자</td>
			<td class='td12'>등록일</td>
			<td id='num' class='td4'>조회수</td>
			<td id='num2' class='td4'></td>
		</tr>
	<?php
    for ($i = $start_row; ($i < $start_row + $rows_scale) && ($i < $total_record); $i ++) {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);
        $num = $row[num];
        $admin_id = $row[admin_id];
        $subject = $row[subject];
        $regist_day = $row[regist_day];
        $hit = $row[hit];
        $regist_day = substr($regist_day, 0, 10);
        $subject = str_replace(" ", "&nbsp;", $subject);
        
        ?>
	
	<tr>
			<td id='num' class='td4'><input name="checkrow[]" type='checkbox'
				value='<?=$num?>'></td>
			<td id='num' class='td4'><?=$number?></td>
			<td class='td11'><?=$subject?></td>
			<td class='td12'><?=$admin_id?></td>
			<td class='td12'><?=$regist_day?></td>
			<td id='num' class='td4'><?=$hit?></td>
			<td id='num2' class='td4'><a
				href="./admin_main.php?mode=notice&select=notice_sub1&num=<?=$num?>"><input
					type="button" id=modi style="vertical-align: -1px;"></input></a></td>

		</tr>
	<?php
        
        $number --;
    }
    // 밑에 페이지 나누는거 해야되용. 버튼 인풋으로 바꿔야되용
    ?>

</table>
<div id='page_box'>
<?PHP
    // ----------------이전블럭 존재시 링크------------------#
    if ($start_page > $pages_scale) {
        $go_page = $start_page - $pages_scale;
        echo "<a id='before_block' href='admin_main.php?mode=notice&select=notice_sub2&page=$go_page'> << </a>";
    }
    // ----------------이전페이지 존재시 링크------------------#
    if ($pre_page) {
        echo "<a id='before_page' href='admin_main.php?mode=notice&select=notice_sub2&page=$pre_page'> < </a>";
    }
    // --------------바로이동하는 페이지를 나열---------------#
    for ($dest_page = $start_page; $dest_page <= $end_page; $dest_page ++) {
        if ($dest_page == $page) {
            echo ("&nbsp;<b id='present_page'>$dest_page</b>&nbsp");
        } else {
            echo "<a id='move_page' href='admin_main.php?mode=notice&select=notice_sub2&page=$dest_page'>$dest_page</a>";
        }
    }
    // ----------------이전페이지 존재시 링크------------------#
    if ($next_page) {
        echo "<a id='next_page' href='admin_main.php?mode=notice&select=notice_sub2&page=$next_page'> > </a>";
    }
    // ---------------다음페이지를 링크------------------#
    if ($total_pages >= $start_page + $pages_scale) {
        $go_page = $start_page + $pages_scale;
        echo "<a id='next_block' href='admin_main.php?mode=notice&select=notice_sub2&page=$go_page'> >> </a>";
    }
    ?>      
   </div>

<br>
<input type='button' id='total_del_button' onclick="notice_del()"
	value='선택삭제'></input>
</form>


<?php
} else if ($mode == 'notice' && $select == 'notice_sub2' && !empty($search)) {
    
    $sql = "select * from notice where subject like '%$search%' ";
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
    <br>
<div id='admin_common_sub1'>
	<b>공지사항 등록</b>
	<hr>
</div>
<br>
<div id='title1'>
	<b id='title2'>*</b> 공지사항 리스트
</div>
<table>
	<tr>
		<form action="./admin_main.php?mode=notice&select=notice_sub2" method="post">
		<td colspan='7' style='text-align: right'>
		<input id='search' name='search' type='text'><button id='search_button'>검색</button>
		</td>
		</form>
	</tr>
	<form name="delete_form" action="./admin_content_notice/delete_notice.php" method="post">
		<tr>
			<td id='num' class='td4'><input type='checkbox' id='checkall'
				onclick="checkAll()"></td>
			<td id='num' class='td4'>NO</td>
			<td class='td11'>제목</td>
			<td class='td12'>작성자</td>
			<td class='td12'>등록일</td>
			<td id='num' class='td4'>조회수</td>
			<td id='num2' class='td4'></td>
		</tr>
	<?php
    for ($i = $start_row; ($i < $start_row + $rows_scale) && ($i < $total_record); $i ++) {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);
        $num = $row[num];
        $admin_id = $row[admin_id];
        $subject = $row[subject];
        $regist_day = $row[regist_day];
        $hit = $row[hit];
        $regist_day = substr($regist_day, 0, 10);
        $subject = str_replace(" ", "&nbsp;", $subject);
        
        ?>
	
	<tr>
			<td id='num' class='td4'><input name="checkrow[]" type='checkbox'
				value='<?=$num?>'></td>
			<td id='num' class='td4'><?=$number?></td>
			<td class='td11'><?=$subject?></td>
			<td class='td12'><?=$admin_id?></td>
			<td class='td12'><?=$regist_day?></td>
			<td id='num' class='td4'><?=$hit?></td>
			<td id='num2' class='td4'><a
				href="./admin_main.php?mode=notice&select=notice_sub1&num=<?=$num?>"><input
					type="button" id=modi style="vertical-align: -1px;"></input></a></td>

		</tr>
	<?php
        
        $number --;
    }
    // 밑에 페이지 나누는거 해야되용. 버튼 인풋으로 바꿔야되용
    ?>
</table>
<div id='page_box'>
<?PHP
    // ----------------이전블럭 존재시 링크------------------#
    if ($start_page > $pages_scale) {
        $go_page = $start_page - $pages_scale;
        echo "<a id='before_block' href='admin_main.php?mode=notice&select=notice_sub2&page=$go_page'> << </a>";
    }
    // ----------------이전페이지 존재시 링크------------------#
    if ($pre_page) {
        echo "<a id='before_page' href='admin_main.php?mode=notice&select=notice_sub2&page=$pre_page'> < </a>";
    }
    // --------------바로이동하는 페이지를 나열---------------#
    for ($dest_page = $start_page; $dest_page <= $end_page; $dest_page ++) {
        if ($dest_page == $page) {
            echo ("&nbsp;<b id='present_page'>$dest_page</b>&nbsp");
        } else {
            echo "<a id='move_page' href='admin_main.php?mode=notice&select=notice_sub2&page=$dest_page'>$dest_page</a>";
        }
    }
    // ----------------이전페이지 존재시 링크------------------#
    if ($next_page) {
        echo "<a id='next_page' href='admin_main.php?mode=notice&select=notice_sub2&page=$next_page'> > </a>";
    }
    // ---------------다음페이지를 링크------------------#
    if ($total_pages >= $start_page + $pages_scale) {
        $go_page = $start_page + $pages_scale;
        echo "<a id='next_block' href='admin_main.php?mode=notice&select=notice_sub2&page=$go_page'> >> </a>";
    }
    ?>      
   </div>

<br>
<input type='button' id='total_del_button' onclick="notice_del()"
	value='선택삭제'></input>
</form>


<?php
} else if ($mode == 'notice' && $select == 'notice_sub3') {
    
    // 이벤트 작성 테이블 생성
    $flag = "NO";
    $sql = "show tables from lookdb";
    $result = mysqli_query($con, $sql) or die("실패원인:" . mysqli_error($con));
    
    while ($row = mysqli_fetch_row($result)) {
        if ($row[0] === "event") {
            $flag = "OK";
            break;
        }
    }
    if ($flag !== "OK") {
        $sql = "create table event(
                num int not null auto_increment,
                admin_id char(5) not null,
                subject char(30) not null,
                content text not null,
                regist_day char(20),
                hit int,
                popup_check char(2),
                file_name_0 char(40),
                file_copied_0 char(40),
                primary key(num)
               )";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('event 테이블이 생성되었습니다.')</script>";
        } else {
            echo "실패원인:" . mysqli_query($con);
        }
    }
    
    if (! empty($_GET['num'])) {
        $num = $_GET['num'];
    }
    
    ?>
    <br>
<div id='admin_common_sub1'>
	<b>이벤트 등록</b>
	<hr>
</div>
<?php
    
    if (! $num) {
        ?>
<br>
<div id='title1'>
	<b id='title2'>*</b> 이벤트 작성
</div>
<form name="insert_eventform"
	action="./admin_content_notice/insert_event.php" method="post"
	enctype="multipart/form-data">
	<table>
		<tr>
			<td class='td1'><b>*</b> 작성자</td>
			<td class='td2'>운영자
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
				type='checkbox' name='popup' value='y'>팝업체크
			</td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 제목</td>
			<td class='td2'><input type='text' id="subject" class="notice"
				name="subject"></td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 내용</td>
			<td class='td2'><textarea rows="30" cols="110" id="content"
					class="notice" name="content"></textarea></td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 이벤트 이미지</td>
			<td class='td2'><input type="file" name="upfile[]"></td>
		</tr>
	</table>
	<div id='save'>
		<input type='button' id='save_button' onclick='event_insertCheck()'
			value='저장'></input>
	</div>
</form>
<?php
    } else {
        // 상품 수정.
        $sql = "select * from event where num = '$num'";
        
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        $row = mysqli_fetch_array($result);
        
        ?>
<br>
<div id='title1'>
	<b id='title2'>*</b> 이벤트 수정
</div>
<form name="insert_eventform"
	action="./admin_content_notice/insert_event.php?status=modify"
	method="post" enctype="multipart/form-data">

	<table>
		<tr>
			<td class='td1'><b>*</b> 작성자</td>
			<td class='td2'>운영자 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php
        if ($row['popup_check'] == 'y') {
            echo "<input type='checkbox' name='popup' value='y' checked>팝업체크</td>";
        } else {
            echo "<input type='checkbox' name='popup' value='y'>팝업체크</td>";
        }
        ?>

		</tr>
		<tr>
			<td class='td1'><b>*</b> 제목</td>
			<td class='td2'><input type='text' id="subject" class="notice"
				name="subject" value="<?=$row['subject']?>"></td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 내용</td>
			<td class='td2'><textarea rows="30" cols="110" id="content"
					class="notice" name="content"><?=$row['content']?></textarea></td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 이벤트 이미지</td>
			<td class='td2'><?php
        
        if ($row[file_name_0]) {
            echo "{$row[file_name_0]}파일이 저장되어 있습니다.";
            echo "<input type='file' name='upfile[]' style='display: none;'> <a
            id='delete_banner'
            href='./admin_content_notice/delete_img_event.php?delete=file0&num={$row['num']}'>x</a>";
        } else {
            echo "<input type='file' name='upfile[]'>";
        }
        ?></td>
		</tr>
		<input type="hidden" name='num' value='<?=$row['num']?>'>
	</table>
	<div id='save'>
		<input type='button' id='save_button' onclick='event_insertCheck()'
			value='수정'></input>
	</div>
</form>


<?php
    }
    ?>


<?php
} else if ($mode == 'notice' && $select == 'notice_sub4' && empty($search)) {
    
    $sql = "select * from event order by regist_day desc";
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
        <br>
<div id='admin_common_sub1'>
	<b>이벤트 수정&삭제</b>
	<hr>
</div>
<br>
<div id='title1'>
	<b id='title2'>*</b> 이벤트 리스트
</div>
	<table>
		<tr>
			<form action="./admin_main.php?mode=notice&select=notice_sub4" method="post">
			<td colspan='7' style='text-align: right'>
			<input id='search' name='search' type='text'><button id='search_button'>검색</button>
			</td>
			</form>
		</tr>
<form name="delete_event"
	action="./admin_content_notice/delete_event.php" method="post">
		<tr>
			<td id='num' class='td4'><input type='checkbox' id='checkall2'
				onclick="checkAll2()"></td>
			<td id='num' class='td4'>NO</td>
			<td class='td11'>제목</td>
			<td class='td12'>작성자</td>
			<td class='td12'>등록일</td>
			<td id='num' class='td4'>조회수</td>
			<td id='num2' class='td4'></td>
		</tr>
	<?php
    for ($i = $start_row; ($i < $start_row + $rows_scale) && ($i < $total_record); $i ++) {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);
        $num = $row[num];
        $admin_id = $row[admin_id];
        $subject = $row[subject];
        $regist_day = $row[regist_day];
        $hit = $row[hit];
        $regist_day = substr($regist_day, 0, 10);
        $subject = str_replace(" ", "&nbsp;", $subject);
        
        ?>
	<tr>
			<td id='num' class='td4'><input name="checkrow2[]" type='checkbox'
				value='<?=$num?>'></td>
			<td id='num' class='td4'><?=$number?></td>
			<td class='td11'><?=$subject?></td>
			<td class='td12'>운영자</td>
			<td class='td12'><?=$regist_day?></td>
			<td id='num' class='td4'><?=$hit?></td>
			<td id='num2' class='td4'><a
				href="./admin_main.php?mode=notice&select=notice_sub3&num=<?=$num?>"><input
					type="button" id=modi style="vertical-align: -1px;"></input></a></td>
		</tr>
	
	<?php
        
        $number --;
    }
    // 밑에 페이지 나누는거 해야되용. 버튼 인풋으로 바꿔야되용
    ?>
</table>
	<div id='page_box'>
<?PHP
    // ----------------이전블럭 존재시 링크------------------#
    if ($start_page > $pages_scale) {
        $go_page = $start_page - $pages_scale;
        echo "<a id='before_block' href='admin_main.php?mode=notice&select=notice_sub4&page=$go_page'> << </a>";
    }
    // ----------------이전페이지 존재시 링크------------------#
    if ($pre_page) {
        echo "<a id='before_page' href='admin_main.php?mode=notice&select=notice_sub4&page=$pre_page'> < </a>";
    }
    // --------------바로이동하는 페이지를 나열---------------#
    for ($dest_page = $start_page; $dest_page <= $end_page; $dest_page ++) {
        if ($dest_page == $page) {
            echo ("&nbsp;<b id='present_page'>$dest_page</b>&nbsp");
        } else {
            echo "<a id='move_page' href='admin_main.php?mode=notice&select=notice_sub4&page=$dest_page'>$dest_page</a>";
        }
    }
    // ----------------이전페이지 존재시 링크------------------#
    if ($next_page) {
        echo "<a id='next_page' href='admin_main.php?mode=notice&select=notice_sub4&page=$next_page'> > </a>";
    }
    // ---------------다음페이지를 링크------------------#
    if ($total_pages >= $start_page + $pages_scale) {
        $go_page = $start_page + $pages_scale;
        echo "<a id='next_block' href='admin_main.php?mode=notice&select=notice_sub4&page=$go_page'> >> </a>";
    }
    ?>      
   </div>
	<br> <input type='button' id='total_del_button' onclick="event_del2()"
		value='선택삭제'></input>
</form>
<?php
} else if ($mode == 'notice' && $select == 'notice_sub4' && !empty($search)) {
    
    $sql = "select * from event where subject like '%$search%'";
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
        <br>
<div id='admin_common_sub1'>
	<b>이벤트 수정&삭제</b>
	<hr>
</div>
<br>
<div id='title1'>
	<b id='title2'>*</b> 이벤트 리스트
</div>
	<table>
		<tr>
			<form action="./admin_main.php?mode=notice&select=notice_sub4" method="post">
			<td colspan='7' style='text-align: right'>
			<input id='search' name='search' type='text'><button id='search_button'>검색</button>
			</td>
			</form>
		</tr>
<form name="delete_event"
	action="./admin_content_notice/delete_event.php" method="post">
		<tr>
			<td id='num' class='td4'><input type='checkbox' id='checkall2'
				onclick="checkAll2()"></td>
			<td id='num' class='td4'>NO</td>
			<td class='td11'>제목</td>
			<td class='td12'>작성자</td>
			<td class='td12'>등록일</td>
			<td id='num' class='td4'>조회수</td>
			<td id='num2' class='td4'></td>
		</tr>
	<?php
    for ($i = $start_row; ($i < $start_row + $rows_scale) && ($i < $total_record); $i ++) {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);
        $num = $row[num];
        $admin_id = $row[admin_id];
        $subject = $row[subject];
        $regist_day = $row[regist_day];
        $hit = $row[hit];
        $regist_day = substr($regist_day, 0, 10);
        $subject = str_replace(" ", "&nbsp;", $subject);
        
        ?>
	<tr>
			<td id='num' class='td4'><input name="checkrow2[]" type='checkbox'
				value='<?=$num?>'></td>
			<td id='num' class='td4'><?=$number?></td>
			<td class='td11'><?=$subject?></td>
			<td class='td12'>운영자</td>
			<td class='td12'><?=$regist_day?></td>
			<td id='num' class='td4'><?=$hit?></td>
			<td id='num2' class='td4'><a
				href="./admin_main.php?mode=notice&select=notice_sub3&num=<?=$num?>"><input
					type="button" id=modi style="vertical-align: -1px;"></input></a></td>
		</tr>
	
	<?php
        
        $number --;
    }
    // 밑에 페이지 나누는거 해야되용. 버튼 인풋으로 바꿔야되용
    ?>
</table>
	<div id='page_box'>
<?PHP
    // ----------------이전블럭 존재시 링크------------------#
    if ($start_page > $pages_scale) {
        $go_page = $start_page - $pages_scale;
        echo "<a id='before_block' href='admin_main.php?mode=notice&select=notice_sub4&page=$go_page'> << </a>";
    }
    // ----------------이전페이지 존재시 링크------------------#
    if ($pre_page) {
        echo "<a id='before_page' href='admin_main.php?mode=notice&select=notice_sub4&page=$pre_page'> < </a>";
    }
    // --------------바로이동하는 페이지를 나열---------------#
    for ($dest_page = $start_page; $dest_page <= $end_page; $dest_page ++) {
        if ($dest_page == $page) {
            echo ("&nbsp;<b id='present_page'>$dest_page</b>&nbsp");
        } else {
            echo "<a id='move_page' href='admin_main.php?mode=notice&select=notice_sub4&page=$dest_page'>$dest_page</a>";
        }
    }
    // ----------------이전페이지 존재시 링크------------------#
    if ($next_page) {
        echo "<a id='next_page' href='admin_main.php?mode=notice&select=notice_sub4&page=$next_page'> > </a>";
    }
    // ---------------다음페이지를 링크------------------#
    if ($total_pages >= $start_page + $pages_scale) {
        $go_page = $start_page + $pages_scale;
        echo "<a id='next_block' href='admin_main.php?mode=notice&select=notice_sub4&page=$go_page'> >> </a>";
    }
    ?>      
   </div>
	<br> <input type='button' id='total_del_button' onclick="event_del2()"
		value='선택삭제'></input>
</form>
<?php
} else if ($mode == 'notice' && $select == 'notice_sub5') {
    if (! empty($_GET['status'])) {
        $status = $_GET['status'];
    }
    
    if (! empty($_POST['search5'])) {
        $search5 = $_POST['search5'];
    }
    
    $select = $_POST['select'];
    if ($status == 'search') {
        if ($select == 'subject') {
            $sql = "select * from qa_write where subject like '%$search5%' order by num desc";
        } else if ($select == 'content') {
            $sql = "select * from qa_write where content like '%$search5%' order by num desc";
        } else if ($select == 'name') {
            $sql = "select * from qa_write where name like '%$search5%' order by num desc";
        } else if ($select == 'id') {
            $sql = "select * from qa_write where id like '%$search5%' order by num desc";
        }
    } else if ($status != 'search' || ! $search5) {
        $sql = "select * from qa_write order by num desc";
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
 <br>

<div id='admin_common_sub1'>
	<b>Q&A 리스트</b>
	<hr>
</div>
<br>
<div id='title1'>
	<b id='title2'>*</b> Q&A
</div>
<form name="search_form"
	action="./admin_main.php?mode=notice&select=notice_sub5&status=search"
	method="post">
	<table>
		<tr>
			<td colspan='8' style='text-align: right;'><select id="select"
				name="select" style="margin-bottom: 10px; vertical-align: -1px;">
					<option value="">선택</option>
					<option value="subject">제목</option>
					<option value="content">내용</option>
					<option value="name">작성자</option>
					<option value="id">아이디</option>
			</select><input id='search5' type='text' name="search5"><input
				type="button" id='search_button' value="검색" onclick="searchs()"
				style="width: 60px; height: 25px; vertical-align: -1px; cursor: hand;"></td>
		</tr>
		<tr>
			<td id='num' class='td4'><input type='checkbox'></td>
			<td id='num' class='td4'>NO</td>
			<td class='td13'>제목</td>
			<td class='td12'>타입</td>
			<td class='td12'>작성자</td>
			<td class='td12'>등록일</td>
			<td id='num' class='td4'>조회수</td>
			<td id='num' class='td4'>답변</td>
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
        $qa_set_pass = $row['set_password'];
        $qa_day = $row['regist_day'];
        $qa_date = substr($qa_day, 0, 10);
        $qa_admin_ripple = $row['admin_ripple'];
        ?>
		<tr>
			<td id='num' class='td4'><input name="checkrow3[]" type='checkbox'
				value='<?=$num?>'></td>
			<td id='num' class='td4'><?=$number ?></td>
			<td class='td13'><?=$qa_title ?></td>
			<td class="td12">
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
			<td class='td12'><?=$qa_id ?></td>
			<td class='td12'><?=$qa_date ?></td>
			<td id='num' class='td4'><?=$qa_hit ?></td>
			<?php if($qa_admin_ripple != ""){ ?>
			<td id='num' class='td4'><input type="button" id=confirm
				style="vertical-align: -1px;"></td>
			<?php } else {?>
			<td id='num' class='td4'></td>
					<?php }?>
		
		</tr>
		<?php $number--;}?>
	</table>
	<div id='page_box'>
<?PHP
    // ----------------이전블럭 존재시 링크------------------#
    if ($start_page > $pages_scale) {
        $go_page = $start_page - $pages_scale;
        echo "<a id='before_block' href='./admin_main.php?mode=notice&select=notice_sub5&page=$go_page'> << </a>";
    }
    // ----------------이전페이지 존재시 링크------------------#
    if ($pre_page) {
        echo "<a id='before_page' href='./admin_main.php?mode=notice&select=notice_sub5&page=$pre_page'> < </a>";
    }
    // --------------바로이동하는 페이지를 나열---------------#
    for ($dest_page = $start_page; $dest_page <= $end_page; $dest_page ++) {
        if ($dest_page == $page) {
            echo ("&nbsp;<b id='present_page'>$dest_page</b>&nbsp");
        } else {
            echo "<a id='move_page' href='./admin_main.php?mode=notice&select=notice_sub5&page=$dest_page'>$dest_page</a>";
        }
    }
    // ----------------이전페이지 존재시 링크------------------#
    if ($next_page) {
        echo "<a id='next_page' href='./admin_main.php?mode=notice&select=notice_sub5&page=$next_page'> > </a>";
    }
    // ---------------다음페이지를 링크------------------#
    if ($total_pages >= $start_page + $pages_scale) {
        $go_page = $start_page + $pages_scale;
        echo "<a id='next_block' href='./admin_main.php?mode=notice&select=notice_sub5&page=$go_page'> >> </a>";
    }
    ?>
</div>
</form>

		    <?php
}
?> 
</html>