<html>
<head>
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
   function coupon_update(no){
      var name1="modi"+no;
      var value1=document.getElementById(name1).value;
      location.href='admin_main.php?mode=coupon&select=coupon_sub1&coupon_name='+value1+'';
   }
   function coupon_delete(no){
      var name1="modi"+no;
      var value1=document.getElementById(name1).value;
      location.href='./admin_content_coupon/coupon_delete.php?coupon_name='+value1+'';
   }
   function check_sub1(){
       var exp = /^[0-9]{1,2}$/;
       var exp2 = /^[0-9]{4,6}$/;
      if(!document.getElementById('coupon_name').value){
            alert('쿠폰 이름을 입력하세요!');
            document.getElementById('coupon_name').focus();
            return;
      }
      var chk_radio = document.getElementsByName('coupon_type');
      var sel_type = null;
      for(var i=0;i<chk_radio.length;i++){

         if(chk_radio[i].checked == true){ 
            sel_type = chk_radio[i].value;
         }
      }
      if(sel_type == null){
            alert("쿠폰종류를 선택하세요."); 
         return;
      }
      if(sel_type=="비율 할인"&&!sale.value.match(exp)){
         alert('비율 할인의 경우 숫자 1자리부터 2자리까지만 입력가능합니다!');
          document.getElementById('sale').focus();
          return;
      }
      if(sel_type=="금액 할인"&&!sale.value.match(exp2)){
         alert('금액 할인의 경우 숫자 4자리부터 6자리까지만 입력가능합니다!');
          document.getElementById('sale').focus();
          return;
      }
      if(!document.getElementById('coupon_validity').value){
        alert('유효기간을 입력하세요!');
        document.getElementById('coupon_validity').focus();
        return;
      }
      if(document.getElementById('coupon_validity').value>=91){
        alert('유효기간의 최대값은 90일입니다.');
        document.getElementById('coupon_validity').focus();
        return;
      }
      if(!document.getElementById('coupon_content').value){
        alert('쿠폰 부가 설명을 입력하세요!');
        document.getElementById('coupon_content').focus();
        return;
      }
      document.sub1_insert.submit();
}
function check_sub1_update(){
      var exp = /^[0-9]{1,2}$/;
      var exp2 = /^[0-9]{4,6}$/;
     if(!document.getElementById('coupon_name').value){
        alert('쿠폰 이름을 입력하세요!');
        document.getElementById('coupon_name').focus();
        return;
    }
     var chk_radio = document.getElementsByName('coupon_type');
     var sel_type = null;
     for(var i=0;i<chk_radio.length;i++){

        if(chk_radio[i].checked == true){ 
           sel_type = chk_radio[i].value;
        }
     }
     if(sel_type == null){
           alert("쿠폰종류를 선택하세요."); 
        return;
     }
      if(sel_type=="비율 할인"&&!(sale.value.match(exp))){
         alert('비율 할인의 경우 숫자 1자리부터 2자리까지만 입력가능합니다!');
          document.getElementById('sale').focus();
          return;
      }
      if(sel_type=="금액 할인"&&!sale.value.match(exp2)){
         alert('금액 할인의 경우 숫자 4자리부터 6자리까지만 입력가능합니다!');
          document.getElementById('sale').focus();
          return;
      }
      if(!document.getElementById('coupon_validity').value){
        alert('유효기간을 입력하세요!');
        document.getElementById('coupon_validity').focus();
        return;
      }
      if(document.getElementById('coupon_validity').value>=91){
        alert('유효기간의 최대값은 90일입니다.');
        document.getElementById('coupon_validity').focus();
        return;
      }
      if(!document.getElementById('coupon_content').value){
        alert('쿠폰 부가 설명을 입력하세요!');
        document.getElementById('coupon_content').focus();
        return;
      }
      document.sub1_update.submit();
}
   
   $(document).ready(function() {
       $("input[name=coupon_type]").click(function() {
          var chk_radio = document.getElementsByName('coupon_type');
        var sel_type = null;
           for(var i=0;i<chk_radio.length;i++){

              if(chk_radio[i].checked == true){ 
                 sel_type = chk_radio[i].value;
              }
           }
       if(sel_type){
          $.ajax({
             type : "post",
             url : "./admin_content_coupon/type_ajax.php",
             data : "sel_type="+sel_type,
             success : function(data){
                $("#sale_td").html(data);
             }
          });
       }
       });
 });
   
   
function checkAll(){
		
	if($("#checkall").is(':checked')){
		$("input[name='checkrow[]']").prop("checked",true);
	}else{
		$("input[name='checkrow[]']").prop("checked",false);
	}
}

 
function memberCouponAction(){
	
	for(i=0 ; i<$("input[name='checkrow[]']").length ; i++){
		if($("input[name='checkrow[]']")[i].checked == false){
			$("input[name='checkrow[]']")[i].disabled =true;
		}
	}
	
	document.member_coupon_form.submit();
}

function userCouponInfo(a){
	   window.open("./admin_content_coupon/member_coupon_search.php?id="+a,"","width=300,height=200");
	   
	}

</script>
</head>
<?php
include '../lib/dbconn.php';

if (! empty($_GET['coupon_name'])) {
    $coupon_up_name = $_GET['coupon_name'];
}

$flag = "NO";
$sql = "show tables from lookDB";
$result = mysqli_query($con, $sql) or die("실패원인:1" . mysqli_error($con));
while ($row = mysqli_fetch_row($result)) {
    if ($row[0] === "coupon") {
        $flag = "OK";
        break;
    }
}
if ($flag !== "OK") {
    $sql = "create table coupon ( 
                num int not null auto_increment,
                coupon_name char(20) not null,
                coupon_kinds char(10) not null,
                coupon_sale char(5),
                coupon_validity char(2) not null,
                coupon_content text not null,
                primary key(num)
               )";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('coupon 테이블이 생성되었습니다.')</script>";
    } else {
        echo "실패원인:" . mysqli_error($con);
    }
}
$mode = $_GET['mode'];
$select = $_GET['select'];
// 기본관리 부분
if ($mode == 'coupon' && $select == 'coupon_sub1' && empty($_GET['coupon_name'])) {
    ?>
<br>
<div id='admin_common_sub1'>
	<b>쿠폰등록</b>
	<hr>
</div>
<br>
<div id='title1'>
	<b id='title2'>*</b> 신쿠폰 등록
</div>

<form action="./admin_content_coupon/coupon_insert.php" method="post"
	name="sub1_insert">
	<table>
		<tr>
			<td class='td1'><b>*</b> 쿠폰명</td>
			<td class='td2'><input type='text' name="coupon_name"
				id="coupon_name"></td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 쿠폰 종류</td>
			<td class='td2'><input type="radio" id="percent" name="coupon_type"
				value="비율 할인">비율 할인 쿠폰 <input type="radio" id="price"
				name="coupon_type" value="금액 할인">금액 할인 쿠폰 <input type="radio"
				id="drivefree" name="coupon_type" value="배달 무료">배달비 무료 쿠폰</td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 할인가 설정</td>
			<td class='td2' id="sale_td"></td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 쿠폰 유효 기간</td>
			<td class='td2'><input type="number" class="number" min="0" max="90"
				step="30" name="coupon_validity" id="coupon_validity"></td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 쿠폰 부가 설명</td>
			<td class='td2'><textarea rows="5" cols="110" name="coupon_content"
					id="coupon_content"></textarea></td>
		</tr>
	</table>
	<div id='save'>
		<input type="button" id="save_button" value="등록"
			onclick="check_sub1()">
	</div>
</form>
<?php
} else if ($mode == 'coupon' && $select == 'coupon_sub1' && ! empty($_GET['coupon_name'])) {
    if ($coupon_up_name) {
        $sql = "select * from coupon where coupon_name='$coupon_up_name'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $coupon_name = $row['coupon_name'];
        $coupon_kinds = $row['coupon_kinds'];
        $coupon_sale = $row['coupon_sale'];
        $coupon_validity = $row['coupon_validity'];
        $coupon_content = $row['coupon_content'];
    }
    ?>
<br>
<div id='admin_common_sub1'>
	<b>쿠폰수정</b>
	<hr>
</div>
<br>
<div id='title1'>
	<b id='title2'>*</b> 쿠폰 수정
</div>

<form action="./admin_content_coupon/coupon_update.php" method="post"
	name="sub1_update">
	<table>
		<tr>
			<td class='td1'><b>*</b> 쿠폰명</td>
			<td class='td2'><input type='text' name="coupon_name"
				id="coupon_name" value="<?= $coupon_name?>"></td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 쿠폰 종류</td>
			<td class='td2'>
      <?php
    if ($coupon_kinds == "비율 할인") {
        echo "<input type='radio' id='percent' name='coupon_type' value='비율 할인' checked>비율 할인 쿠폰";
    } else {
        echo "<input type='radio' id='percent' name='coupon_type' value='비율 할인'>비율 할인 쿠폰";
    }
    if ($coupon_kinds == "금액 할인") {
        echo "<input type='radio' id='price' name='coupon_type' value='금액 할인' checked>금액 할인 쿠폰";
    } else {
        echo "<input type='radio' id='price' name='coupon_type' value='금액 할인'>금액 할인 쿠폰";
    }
    if ($coupon_kinds == "배달 무료") {
        echo "<input type='radio' id='drivefree' name='coupon_type' value='배달 무료' checked>배달비 무료 쿠폰";
    } else {
        echo "<input type='radio' id='drivefree' name='coupon_type' value='배달 무료'>배달비 무료 쿠폰";
    }
    ?>
      <input type="hidden" name="before_name"
				value="<?= $coupon_up_name?>">
			</td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 할인가 설정</td>
			<td class='td2' id="sale_td"><input type='text' id="sale"
				name="coupon_sale" value="<?= $coupon_sale?>"></td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 쿠폰 유효 기간</td>
			<td class='td2'><input type="number" class="number" min="0" max="90"
				step="30" name="coupon_validity" id="coupon_validity"
				value="<?= $coupon_validity?>"></td>
		</tr>
		<tr>
			<td class='td1'><b>*</b> 쿠폰 부가 설명</td>
			<td class='td2'><textarea rows="5" cols="110" name="coupon_content"
					id="coupon_content"><?= $coupon_content?></textarea></td>
		</tr>
	</table>
	<div id='save'>
		<input type="button" id="save_button" value="등록"
			onclick="check_sub1_update()">
	</div>
</form>
<?php
} else if ($mode == 'coupon' && $select == 'coupon_sub2') {
    ?>
<br>
<div id='admin_common_sub1'>
	<b>상품 수정&삭제</b>
	<hr>
</div>
<br>
<div id='title1'>
	<b id='title2'>*</b> 쿠폰리스트
</div>
<table>
	<tr>
		<td colspan='6' style='text-align: right'><input id='search'
			type='text'>
		<button id='search_button'>검색</button></td>
	</tr>
	<tr>
		<td class='td4'>쿠폰명</td>
		<td class='td4'>쿠폰종류</td>
		<td class='td14'>할인가</td>
		<td class='td4'>유효 기간</td>
		<td id='num4' class='td4'></td>
	</tr>
   <?php
    $sql = "select * from coupon";
    $result = mysqli_query($con, $sql);
    $no = 0;
    while ($row = mysqli_fetch_array($result)) {
        $no = $no + 1;
        $coupon_name = $row['coupon_name'];
        $coupon_kinds = $row['coupon_kinds'];
        $coupon_sale = $row['coupon_sale'];
        $coupon_validity = $row['coupon_validity'];
        $coupon_sale_kind = strlen($coupon_sale);
        $coupon_validity = $coupon_validity . "일";
        if ($coupon_sale_kind >= 4) {
            $coupon_sale = $coupon_sale . "원";
        } else if ($coupon_sale_kind <= 2 && $coupon_kinds != "배달 무료") {
            $coupon_sale = $coupon_sale . "%";
        }
        echo "   <tr>
      <td class='td4'>$coupon_name</td>
      <td class='td4'>$coupon_kinds</td>
      <td class='td14'>$coupon_sale</td>
      <td class='td4'>$coupon_validity</td>
   <td id='num' class='td4'><input type='button' class='modi' id='modi{$no}' value='{$coupon_name}' onclick='coupon_update({$no})'>
             <input type='button' class='del' id='delete{$no}' value='{$coupon_name}' onclick='coupon_delete({$no})'></td>
   </tr>";
    }
    ?>

</table>
<div id='save'></div>
<?php
} else if ($mode == 'coupon' && $select == 'coupon_sub3') {
    
    $flag = "NO";
    $sql = "show tables from lookDB";
    $result = mysqli_query($con, $sql) or die("실패원인:1" . mysqli_error($con));
    while ($row = mysqli_fetch_row($result)) {
        if ($row[0] === "members_coupon") {
            $flag = "OK";
            break;
        }
    }
    if ($flag !== "OK") {
        $sql = "create table members_coupon (
                id char(20) not null,
                coupon_num int not null,
                coupon_name char(20)not null,
                regist_day char(20)not null,
                delete_day char(20)not null,
                checked char(1) default 'n',
                foreign key(id) REFERENCES member(id)
                ON DELETE CASCADE
                ON UPDATE CASCADE,
                foreign key(coupon_num) REFERENCES coupon(num)
                ON DELETE CASCADE
                ON UPDATE CASCADE
               )";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('members_coupon 테이블이 생성되었습니다.')</script>";
        } else {
            echo "실패원인:" . mysqli_error($con);
        }
    }
    
    ?>
<br>
<div id='admin_common_sub1'>
	<b>쿠폰 지급</b>
     <?php
    $regist_day = date("m-d");
    $regist_day1 = date("Y-m-d");
    
    $sql1 = "select * from coupon where coupon_name='생일쿠폰'";
    $result1 = mysqli_query($con, $sql1) or die("mysql err : " . mysqli_error($con));
    $row1 = mysqli_fetch_array($result1);
    $num = $row1['num'];
    $coupon_name = $row1['coupon_name'];
    $coupon_validity = $row1['coupon_validity'];
    $delete_day = date("Y-m-d", strtotime("+$coupon_validity days"));
    
    $sql2 = "select * from member";
    $result2 = mysqli_query($con, $sql2);
    while ($row2 = mysqli_fetch_array($result2)) {
        
        $memberkind = $row2['memberkind'];
        $user_id = $row2['id'];
        $birthday = $row2['birthday'];
        $birthday = substr($birthday, 5, 9);
        // $sql3="insert into members_coupon(id,coupon_num,coupon_name,regist_day,delete_day) values ('$user_id',$num,'$coupon_name','무제한','무제한')";
        if ($birthday == $regist_day) {
            
            if ($memberkind == 'c') {
                $sql4 = "select * from members_coupon where id='$user_id' and coupon_name='생일쿠폰'";
                $result4 = mysqli_query($con, $sql4) or die("mysql err1 : " . mysqli_error($con));
                $coupon_count = mysqli_num_rows($result4);
                
                if ($coupon_count == 0) {
                    $sql3 = "insert into members_coupon(id,coupon_num,coupon_name,regist_day,delete_day) values ('$user_id',$num,'$coupon_name','$regist_day1','$delete_day')";
                    $result3 = mysqli_query($con, $sql3) or die("mysql err2 : " . mysqli_error($con));
                }
            } else {
                $sql4 = "select * from members_coupon where id='$user_id' and coupon_name='생일쿠폰'";
                $result4 = mysqli_query($con, $sql4) or die("mysql err3 : " . mysqli_error($con));
                $coupon_count = mysqli_num_rows($result4);
                
                if ($coupon_count == 0) {
                    $sql3 = "insert into members_coupon(id,coupon_num,coupon_name,regist_day,delete_day) values ('$user_id',$num,'$coupon_name','무제한','무제한')";
                    $result3 = mysqli_query($con, $sql3) or die("mysql err4 : " . mysqli_error($con));
                }
            }
        }
    }
    
    ?>
   <hr>
</div>
<br>
<div id='title1'>
	<b id='title2'>*</b> 회원명단
</div>
<?php
    $sql = "select * from member";
    $result = mysqli_query($con, $sql);
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

<table>
	<tr>
		<td colspan='9' style='text-align: right'><input id='search'
			type='text'>
		<button id='search_button'>검색</button></td>
	</tr>

	<form name="member_coupon_form"
		action="./admin_content_coupon/member_coupon_insert.php" method="post">
		<tr>
			<td id='num' class='td4'><input type='checkbox' id="checkall"
				onclick="checkAll()"></td>
			<td id='num' class='td4'>NO</td>
			<td class='td7'>고객명</td>
			<td class='td7'>고객아이디</td>
			<td id='num' class='td4'>등급</td>
			<td class='td7'>휴대폰</td>
			<td class='td9'>생년월일</td>
			<td class='td8'>이메일</td>
			<td id='num' class='td4'></td>
		</tr>
<?php
    for ($i = $start_row; ($i < $start_row + $rows_scale) && ($i < $total_record); $i ++) {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);
        $id = $row[id];
        $name = $row[name];
        $rank = $row[rank];
        $phone = $row[phone];
        $email = $row[email];
        $birthday = $row[birthday];
        
        ?>
   <tr>
			<td id='num' class='td4'><input type="checkbox" name="checkrow[]"
				value="<?=$id?>"></td>
			<td id='num' class='td4'><?=$number?></td>
			<td class='td7'><?=$name?></td>
			<td class='td7'><?=$id?></td>
			<td id='num2' class='td4'><?=$rank?></td>
			<td class='td7'><?=$phone?></td>
			<td class='td9'><?=$birthday?></td>
			<td class='td8'><?=$email?></td>
			<td id='num2' class='td4'><button type="button" id=coupon onclick="userCouponInfo('<?=$id?>')"></button></td>
		</tr>

<?php
        $number --;
    } // end of for 밑에 페이지 나눔
    ?>


</table>
<div id="select_coupon" style="margin-left: 53px;">
	쿠폰선택 : <select id="select_coupon1" name="select_coupon">
		<option>선택</option>
<?php
    
    $sql = "select * from coupon";
    $result = mysqli_query($con, $sql);
    
    while ($row = mysqli_fetch_array($result)) {
        
        $coupon_name = $row[coupon_name];
        $coupon_num = $row[num];
        $coupon_validity = $row[coupon_validity];
        ?>
<option
			value="<?php echo"{$coupon_num}_{$coupon_name}_{$coupon_validity}";?>"><?=$coupon_name?></option>
<?php
    } // end of while
    ?>
</select>
</div>
<button type="button" id='total_del_button'
	onclick="memberCouponAction()"
	style="margin-left: 1040px; margin-top: 10px;">선택 지급</button>
</form>
<?php
} // end of ifelse
?> 
</html>