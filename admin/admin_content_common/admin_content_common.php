<?php 
/*  기본관리.
 *  banner 생성(메인화면에 사용)
 *  admin_common 생성(관리자 등록..최고관리자는 먼저 값을 넣어줘야함.)
 *  company_information생성(회사 소개..footer에서 사용)
 *   
 *   
 *   */
session_start();

if(!empty($_SESSION['user_id'])){
    $userid=$_SESSION['user_id'];
}
if(!empty($_GET['id'])){
    $id=$_GET['id'];
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">

<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
function check_sub3_update(){
    if(!document.getElementById('id').value){
          alert('운영자 아이디를 입력하세요!');
          document.getElementById('id').focus();
          return;
        }
    if(document.getElementById('id').value.length>=8){
          alert('운영자 아이디는 7자까지만 입력가능합니다.');
          document.getElementById('id').focus();
          return;
        }
        if(!document.getElementById('pass').value){
          alert('운영자 패스워드를 입력하세요!');
          document.getElementById('pass').focus();
          return;
        }
        if(!document.getElementById('name').value){
          alert('관리자 이름을 입력하세요!');
          document.getElementById('name').focus();
          return;
        }
        document.sub3_update.submit();
}
   function Operator_update(no){
      var id1="modi"+no;
       var value1=document.getElementById(id1).value;
       location.href='admin_main.php?mode=common&select=common_sub3&status=modi&id='+value1+''; 
   }
   function Operator_delete(no){
      var id1="modi"+no;
       var value1=document.getElementById(id1).value;
      location.href='./admin_content_common/admin_common_delete.php?id='+value1+'';
   }
   function check_sub3(){
       if(!document.getElementById('id').value){
         alert('운영자 아이디를 입력하세요!');
         document.getElementById('id').focus();
         return;
       }
       if(document.getElementById('id').value.length>=8){
           alert('운영자 아이디는 7자까지만 입력가능합니다.');
           document.getElementById('id').focus();
           return;
         }
       if(!document.getElementById('pass').value){
         alert('운영자 패스워드를 입력하세요!');
         document.getElementById('pass').focus();
         return;
       }
       if(!document.getElementById('name').value){
         alert('운영자 이름을 입력하세요!');
         document.getElementById('name').focus();
         return;
       }
       document.sub3.submit();
  }

   function input_banner(){
      document.banner_form.submit();
   }

   
   function check_sub1(){
        if(!document.getElementById('shopname').value){
          alert('쇼핑몰명을 입력하세요!');
          document.getElementById('shopname').focus();
          return;
        }
        if(!document.getElementById('name').value){
          alert('관리자명를 입력하세요!');
          document.getElementById('name').focus();
          return;
        }
        if(!document.getElementById('id').value){
          alert('관리자 아이디를 입력하세요!');
          document.getElementById('id').focus();
          return;
        }
        if(document.getElementById('id').value.length>=8){
            alert('운영자 아이디는 7자까지만 입력가능합니다.');
            document.getElementById('id').focus();
            return;
          }
        if(!document.getElementById('pass').value){
          alert('관리자 패스워드를 입력해주세요!');
          document.getElementById('pass').focus();
          return;
        }
        document.sub1.submit();
      }
   function check_sub2(){
        if(!document.getElementById('ci_num').value){
          alert('사업자등록번호를 입력하세요!');
          document.getElementById('ci_num').focus();
          return;
        }
        if(!document.getElementById('ci_name').value){
          alert('상호명를 입력하세요!');
          document.getElementById('ci_name').focus();
          return;
        }
        if(!document.getElementById('representative_name').value){
          alert('대표자명을 입력하세요!');
          document.getElementById('representative_name').focus();
          return;
        }
        if(!document.getElementById('postcode').value){
          alert('우편번호를 입력해주세요!');
          return;
        }
        if(!document.getElementById('address1').value){
          alert('주소지를 선택해주세요!');
          return;
        }
        if(!document.getElementById('address2').value){
          alert('상세주소를 입력해주세요!');
          document.getElementById('address2').focus();
          return;
        }
        if(!document.getElementById('ci_phone').value){
          alert('대표전화를 입력해주세요!');
          document.getElementById('ci_phone').focus();
          return;
        }
        if(!document.getElementById('ci_fax').value){
          alert('대표팩스를 입력해주세요!');
          document.getElementById('ci_fax').focus();
          return;
        }
        if(!document.getElementById('ci_introduce').value){
          alert('회사소개를 입력해주세요!');
          document.getElementById('ci_introduce').focus();
          return;
        }       
        if(!document.getElementById('ci_bank').value){
        alert('은행를 선택해주세요!');
        document.getElementById('ci_bank').focus();
        return;
         }
        if(!document.getElementById('ci_an').value){
        alert('회사계좌를 입력해주세요!');
        document.getElementById('ci_an').focus();
        return;
         }
        if(!document.getElementById('ci_manager').value){
        alert('개인정보책임 담당자를 입력해주세요!');
        document.getElementById('ci_manager').focus();
        return;
         }
        if(!document.getElementById('ci_time1').value){
        alert('시작시간를 선택해주세요!');
        document.getElementById('ci_time1').focus();
        return;
         }
        if(!document.getElementById('ci_time2').value){
        alert('운영시간를 입력해주세요!');
        document.getElementById('ci_time2').focus();
        return;
         }
        document.sub2.submit();
      }
   
        function execDaumPostcode() {
            new daum.Postcode({
                oncomplete: function(data) {
                    // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
    
                    // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                    // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                    var fullAddr = ''; // 최종 주소 변수
                    var extraAddr = ''; // 조합형 주소 변수
    
                    // 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                    if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                        fullAddr = data.roadAddress;
    
                    } else { // 사용자가 지번 주소를 선택했을 경우(J)
                        fullAddr = data.jibunAddress;
                    }
    
                    // 사용자가 선택한 주소가 도로명 타입일때 조합한다.
                    if(data.userSelectedType === 'R'){
                        //법정동명이 있을 경우 추가한다.
                        if(data.bname !== ''){
                            extraAddr += data.bname;
                        }
                        // 건물명이 있을 경우 추가한다.
                        if(data.buildingName !== ''){
                            extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                        }
                        // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                        fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
                    }
    
                    // 우편번호와 주소 정보를 해당 필드에 넣는다.
                    document.getElementById('postcode').value = data.zonecode; //5자리 새우편번호 사용
                    document.getElementById('address1').value = fullAddr;
    
                    // 커서를 상세주소 필드로 이동한다.
                    document.getElementById('address2').focus();
                }
            }).open();
        }
    </script>
<!-- end of 우편번호 검색API -->
<?php
include "../lib/dbconn.php"; // dconn.php 파일을 불러옴

$flag = "NO";
$sql = "show tables from lookDB";
$result = mysqli_query($con, $sql) or die("실패원인:" . mysqli_error($con));
while ($row = mysqli_fetch_row($result)) {
    if ($row[0] === "banner") {
        $flag = "OK";
        break;
    }
}
if ($flag !== "OK") {
    $sql = "create table banner (
                  file_name_0 char(40),
                  file_name_1 char(40),
                  file_name_2 char(40),
                  file_name_3 char(40),
                  file_name_4 char(40),
                  file_copied_0 char(30),
                  file_copied_1 char(30),
                  file_copied_2 char(30),
                  file_copied_3 char(30),
                  file_copied_4 char(30)
               )";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('banner 테이블이 생성되었습니다.')</script>";
    } else {
        echo "실패원인:" . mysqli_query($con);
    }
}

$flag = "NO";
$sql = "show tables from lookDB";
// result에는 지정한 쿼리문을 실행한 결과로, 정보를 가지고있는 주소를 가지고있다.
$result = mysqli_query($con, $sql) or die("lookdb접속 실패 : " . mysqli_error($con));
// fetch_row=result를 실행시킨 결과를 배열로 가져오는데 인덱스로 참조하겠다는 뜻, fetch_array=result를 실행시킨 결과를 배열로 가져오는데 인덱스와 필드명으로 참조하겠다는 뜻
while ($row = mysqli_fetch_row($result)) {
    if ($row[0] === "admin_common") {
        $flag = "OK";
        break;
    }
}
if ($flag !== "OK") {
    $sql = "create table admin_common (
                id char(15) not null,
                pass char(10) not null,
                name char(10) not null,
                shopname char(20) not null,
                basic_authority char(1) not null,
                product_authority char(1) not null,
                order_authority char(1) not null,
                member_authority char(1) not null,
                notice_authority char(1) not null,
                sale_authority char(1) not null,
                coupon_authority char(1) not null,
                primary key(id)
               )";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('admin_common 테이블이 생성되었습니다.')</script>";
    } else {
        echo "admin_common 테이블 생성 실패 :" . mysqli_query($con);
    }
}

$sql="select * from admin_common";
$result=mysqli_query($con, $sql);
$row=mysqli_num_rows($result);
if($row==0){
    $sql="insert into admin_common (id,pass,name,shopname,basic_authority,product_authority,
    order_authority,member_authority,notice_authority,sale_authority,coupon_authority)";
    $sql.="values('$id','$pass','$name','$shopname','y','y','y','y','y','y','y')";
    mysqli_query($con, $sql) or die("계정 생성 실패 : ".mysqli_error($con));
    echo "<script>alert('{$id}생성이 완료되었습니다.');</script>";
}
$flag = "NO";
$sql = "show tables from lookDB";
// result에는 지정한 쿼리문을 실행한 결과로, 정보를 가지고있는 주소를 가지고있다.
$result = mysqli_query($con, $sql) or die("lookdb접속 실패 : " . mysqli_error($con));
// fetch_row=result를 실행시킨 결과를 배열로 가져오는데 인덱스로 참조하겠다는 뜻, fetch_array=result를 실행시킨 결과를 배열로 가져오는데 인덱스와 필드명으로 참조하겠다는 뜻
while ($row = mysqli_fetch_row($result)) {
    if ($row[0] === "company_information") {
        $flag = "OK";
        break;
    }
}
if ($flag !== "OK") {
    $sql = "create table company_information (
                ci_num char(15) not null,
                ci_name char(15) not null,
                representative_name char(10) not null,
                ci_address char(50) not null,
                ci_phone char(20) not null,
                ci_fax char(20) not null,
                ci_mailorder char(1) not null,
                ci_introduce char(60) not null,
                ci_map char(40) not null,
                ci_map_copied char(40) not null,
                ci_bank char(10) not null,
                ci_an char(20) not null,
                ci_manager char(10) not null,
                ci_time char(20) not null,
                primary key(ci_num)
               )";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('company_information 테이블이 생성되었습니다.')</script>";
    } else {
        echo "company_information 테이블 생성 실패 :" . mysqli_query($con);
    }
}

$mode = $_GET['mode'];
$select = $_GET['select'];
// 기본관리 부분
if ($mode == 'common' && $select == 'common_sub1') {
    $sql = "select * from admin_common where id='{$userid}'";
    $result = mysqli_query($con, $sql) or die("현재 로그인된 아이디로 정보를 가져오지 못했습니다 이유 :".mysqli_error($con));
    while ($row=mysqli_fetch_array($result)){
        $pass=$row['pass'];
        $shopname=$row['shopname'];
        $name=$row['name'];
    }
    ?><br>
<div id='admin_common_sub1'>
   <b>내 쇼핑몰 관리</b>
   <hr>
</div>
<br>
<div id='title1'>
   <b id='title2'>*</b> 기본정보설정
</div>
<form name='sub1' action='./admin_content_common/admin_update.php' method='post'>
<table>
   <tr>
      <td class='td1'><b>*</b> 쇼핑몰명</td>
      <td class='td2'><input type='text' value='<?= $shopname?>' name='shopname' id='shopname'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 관리자명</td>
      <td class='td2'><input type='text' value='<?= $name?>' name='name' id='name'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 관리자 아이디</td>
      <td class='td2'>
      	<input type='text' value='<?= $userid?>' name='id' id='id'>
      	<input type="hidden" value='<?= $userid?>' name='beforeid' id='beforeid'>
      </td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 관리자 패스워드</td>
      <td class='td2'><input type='text' value='<?= $pass?>' name='pass' id='pass'></td>
   </tr>
</table>
<div id='save'>
   <input type="button" id='save_button' onclick='check_sub1()' value='저장'>
</div>
</form>
<?php
} else if ($mode == 'common' && $select == 'common_sub2') {
    $sql = "select * from company_information";
    $result = mysqli_query($con, $sql) or die("현재 로그인된 아이디로 정보를 가져오지 못했습니다 이유 :".mysqli_error($con));
    while ($row=mysqli_fetch_array($result)){
        $ci_num=$row['ci_num'];
        $ci_name=$row['ci_name'];
        $representative_name=$row['representative_name'];
        $ci_address=$row['ci_address'];
        $ci_phone=$row['ci_phone'];
        $ci_fax=$row['ci_fax'];
        $ci_mailorder=$row['ci_mailorder'];
        $ci_introduce=$row['ci_introduce'];
        $ci_map=$row['ci_map'];
        $ci_bank=$row['ci_bank'];
        $ci_an=$row['ci_an'];
        $ci_manager=$row['ci_manager'];
        $ci_time=$row['ci_time'];
    }
    $ci_address=explode(".", $ci_address);
    $postcode=$ci_address[0];
    $address1=$ci_address[1];
    $address2=$ci_address[2];
    $ci_time=explode("~", $ci_time);
    $ci_time1=$ci_time[0];
    $ci_time2=$ci_time[1];
    ?><br>
<div id='admin_common_sub1'>
   <b>회사 정보 관리</b>
   <hr>
</div>
<br>
<div id='title1'>
   <b id='title2'>*</b> 쇼핑몰 사업자/통신판매신고 정보 설정
</div>
<table>
<form name="sub2" action="./admin_content_common/admin_ci_update.php" method="post" enctype="multipart/form-data">
   <tr>
      <td class='td1'><b>*</b> 사업자등록번호</td>
      <td class='td2'><input type='text' name='ci_num' id='ci_num' value="<?= $ci_num?>"></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 상호(법인명)</td>
      <td class='td2'><input type='text' name='ci_name' id='ci_name' value='<?= $ci_name?>'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 대표자명</td>
      <td class='td2'><input type='text' name='representative_name' id='representative_name' value='<?= $representative_name?>'></td>
   </tr>
   <tr>
      <td class='td1' rowspan='3'><b>*</b> 사업장 주소</td>
      <td class='td2'><input class='address1' type='text' id='postcode' name="postcode" value='<?= $postcode?>'readonly="readonly" >
         <input type='button' id='address' value='우편번호 찾기' onclick='execDaumPostcode()'></td>
   </tr>
   <tr>
      <td class='td2'><input class='address2' id='address1' type='text' name="address1" value='<?= $address1?>' readonly="readonly"></td>
   </tr>
   <tr> 
      <td class='td2'><input class='address2' id='address2' type='text' name="address2" value='<?= $address2?>'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 대표전화</td>
      <td class='td2'><input type='text' name='ci_phone' id='ci_phone' value='<?= $ci_phone?>'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 대표팩스</td>
      <td class='td2'><input type='text' name='ci_fax' id='ci_fax' value='<?= $ci_fax?>'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 통신판매업 신고</td>
      <td class='td2'>
      <?php
      if($ci_mailorder=="y"){
          echo "<input type='radio' name='ci_mailorder' value='y' checked>신고함&nbsp;&nbsp;&nbsp;
          <input type='radio' name='ci_mailorder' value='n' >신고안함";
      }else{
          echo "<input type='radio' name='ci_mailorder' value='y' >신고함&nbsp;&nbsp;&nbsp;
          <input type='radio' name='ci_mailorder' value='n' checked>신고안함";
      }
      ?>
      </td>
   </tr>
</table>
<br>
<br>
<div id='title1'>
   <b id='title2'>*</b> 회사소개 설정
</div>
<table>
   <tr>
      <td class='td1'><b>*</b> 회사소개</td>
      <td class='td2'><textarea cols='110' rows='10' name='ci_introduce' id='ci_introduce'><?= $ci_introduce?></textarea></td>
   </tr>
   <tr>
       
      <td class='td1'><b>*</b> 회사약도</td>
   <?php if(!empty($ci_map)){
       echo "<td class='td2'>".$ci_map."가 등록되어있습니다.<a href='./admin_content_common/ci_map_delete.php'>x</a><input type='file' style='display:none' name='ci_map' id='ci_map' value='$ci_map' ></td>";
   }else{
      echo "<td class='td2'><input type='file' name='ci_map' id='ci_map'></td>";
   }?>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 회사계좌</td>
      <td class='td2'><select name='ci_bank' id='ci_bank'>
            <option value=''>은행선택</option>
<?php
    $bank = array(
        'NH농협',
        'KB국민',
        '신한',
        '우리',
        '하나',
        'IBK기업',
        '외환',
        'SC제일',
        '씨티',
        'KDB산업',
        '새마을',
        '대구',
        '광주',
        '광주',
        '우체국',
        '신협',
        '전북',
        '경남',
        '부산',
        '수협',
        '제주',
        '저축',
        '카카오'
    );
    for ($i = 0; $i < count($bank); $i ++) {
        if($ci_bank==$bank[$i]){
        echo ("<option value='$bank[$i]' selected>$bank[$i]</option>");
        }else{
        echo ("<option value='$bank[$i]'>$bank[$i]</option>");
        }
    }
    ?>
            </select> <input type='text' name='ci_an' id='ci_an' value='<?= $ci_an?>'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 개인정보책임담당자</td>
      <td class='td2'><input type='text' name='ci_manager' id='ci_manager' value='<?= $ci_manager?>'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 운영시간</td>
      <td class='td2'> 
      <select name='ci_time1' id='ci_time1'><option value=''>시작시간 선택</option>
      <?php 
        $time1=array(
            '08:30',
            '09:00',
            '09:30',
            '10:00',
            '10:30',
            '11:00',
            '11:30',
            '12:00',
        );
        for ($i = 0; $i < count($time1); $i ++) {
            if($ci_time1==$time1[$i]){
                echo ("<option value='$time1[$i]' selected>$time1[$i]</option>");
            }else{
                echo ("<option value='$time1[$i]'>$time1[$i]</option>");
            }
        }
      ?>
      </select> 
      ~
      <select name='ci_time2' id='ci_time2'><option value=''>종료시간 설정</option>
      <?php 
        $time2=array(
            '15:00',
            '15:30',
            '16:00',
            '16:30',
            '17:00',
            '17:30',
            '18:00',
            '18:30',
            '19:00',
            '19:30',
            '20:00',
        );
        for ($i = 0; $i < count($time2); $i ++) {
            if($ci_time2==$time2[$i]){
                echo ("<option value='$time2[$i]' selected>$time2[$i]</option>");
            }else{
                echo ("<option value='$time2[$i]'>$time2[$i]</option>");
            }
        }
      ?>
      </select> 
      
      </td>
   </tr>
</table>
<div id='save'>
   <input type="button" id='save_button' onclick='check_sub2()' value='저장'>
</div>
</form>
<?php
} else if ($mode == 'common' && $select == 'common_sub3'&& empty($_GET['status'])) {
    ?><br>
<div id='admin_common_sub1'>
   <b>운영자 설정</b>
   <hr>
</div>
<br>
<div id='title1'>
   <b id='title2'>*</b> 운영자 추가
</div>
<form action="./admin_content_common/admin_common_insert.php" method="post" name="sub3">
<table>
   <tr>
      <td class='td1'><b>*</b> 운영자 아이디</td>
      <td class='td2'><input type='text' name='id' id='id'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 운영자 패스워드</td>
      <td class='td2'><input type='password' name='pass' id='pass'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 운영자명</td>
      <td class='td2'><input type='text' name='name' id='name'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 접근권한 설정</td>
      <td class='td2'><input
         type='checkbox' class='access' name='product' value='y'>제품관리 <input type='checkbox'
         class='access' name='order' value='y'>주문관리 <input type='checkbox' class='access' name='member' value='y'>회원관리 <input
         type='checkbox' class='access' name='notice' value='y'>게시판관리  <input type='checkbox' class='access' name='coupon' value='y'>쿠폰관리</td>
   </tr>
</table>
<div id='save'>
   <input type="button" id='save_button' value='저장' onclick='check_sub3()'>
</div>
</form>
<div id='title1'>
   <b id='title2'>*</b> 운영자 리스트
</div>
<table>
   <tr id=sub_admin_list>
      <td class='td3'>운영자명</td>
      <td class='td3'>아이디</td>
      <td class='td3'>패스워드</td>
      <td class='td3'></td>
   </tr>
   
   <?php
    $sql = "select * from admin_common";
    $result = mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
        $no=0;
    while($row = mysqli_fetch_array($result)){
        $no=$no+1;
        $id=$row['id'];
        $pass=$row['pass'];
        $name=$row['name'];
       if($id!=""&&$id!="admin"){
           echo "      <tr><td class='td3'>$name</td>
          <td class='td3'>$id</td>
          <td class='td3'>$pass</td>
          <td id='td3_modi_delete'><input type='button' class='modi' id='modi{$no}' value='{$id}' onclick='Operator_update({$no})'>
             <input type='button' class='del' id='delete{$no}' value='{$id}' onclick='Operator_delete({$no})'></td></tr>";
       }
    };
   ?>
   <?php } else if ($mode == 'common' && $select == 'common_sub3' && !empty($_GET['status'])){
       if($id){
           $sql = "select * from admin_common where id='$id'";
           $result = mysqli_query($con, $sql) or die(mysqli_error($con));
           $row = mysqli_fetch_array($result);
           $id=$row['id'];
           $pass=$row['pass'];
           $name=$row['name'];
           $product_authority=$row['product_authority'];
           $order_authority=$row['order_authority'];
           $member_authority=$row['member_authority'];
           $notice_authority=$row['notice_authority'];
           $coupon_authority=$row['coupon_authority'];
       }
   ?>
   <br>
<div id='admin_common_sub1'>
   <b>운영자 설정</b>
   <hr>
</div>
<br>
<div id='title1'>
   <b id='title2'>*</b> 운영자 수정
</div>
<form action="./admin_content_common/admin_common_update.php" method="post" name="sub3_update">
<table>
   <tr>
      <td class='td1'><b>*</b> 운영자 아이디</td>
      <td class='td2'><input type='text' name='id' id='id' value='<?= $id?>'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 운영자 패스워드</td>
      <td class='td2'><input type='password' name='pass' id='pass' value='<?= $pass?>'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 운영자명</td>
      <td class='td2'><input type='text' name='name' id='name' value='<?= $name?>'></td>
   </tr>
   <tr>
      <td class='td1'><b>*</b> 접근권한 설정</td>
      <td class='td2'>
      <?php 
      if($product_authority=="y"){
          echo "<input type='checkbox' class='access' name='product' value='y' checked>제품관리";
      }else{
          echo "<input type='checkbox' class='access' name='product' value='y'>제품관리";
      }
      if($order_authority=="y"){
          echo "<input type='checkbox' class='access' name='order' value='y' checked>주문관리";
      }else{
          echo "<input type='checkbox' class='access' name='order' value='y'>주문관리";
      }
      if($member_authority=="y"){
          echo "<input type='checkbox' class='access' name='member' value='y' checked>회원관리";
      }else{
          echo "<input type='checkbox' class='access' name='member' value='y'>회원관리";
      }
      if($notice_authority=="y"){
          echo "<input type='checkbox' class='access' name='notice' value='y' checked>게시판관리";
      }else{
          echo "<input type='checkbox' class='access' name='notice' value='y'>게시판관리";
      }
      if($coupon_authority=="y"){
          echo "<input type='checkbox' class='access' name='coupon' value='y' checked>쿠폰관리";
      }else{
          echo "<input type='checkbox' class='access' name='coupon' value='y'>쿠폰관리";
      }
      
      ?>
      <input type="hidden" name="beforeid" value="<?= $id?>">
   </tr>
</table>
<div id='save'>
   <input type="button" id='save_button' value='수정' onclick='check_sub3_update()'>
</div>
</form>
<div id='title1'>
   <b id='title2'>*</b> 운영자 리스트
</div>
<table>
   <tr id=sub_admin_list>
      <td class='td3'>운영자명</td>
      <td class='td3'>아이디</td>
      <td class='td3'>패스워드</td>
      <td class='td3'></td>
   </tr>
   
   <?php
    $sql = "select * from admin_common";
    $result = mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
    $no=0;
    while($row = mysqli_fetch_array($result)){
        $no=$no+1;
        $id=$row['id'];
        $pass=$row['pass'];
        $name=$row['name'];
       if($id!=""&&$id!="admin"){
           echo "      <tr><td class='td3'>$name</td>
          <td class='td3'>$id</td>
          <td class='td3'>$pass</td>
          <td id='td3_modi_delete'><input type='button' class='modi' id='modi{$no}' value='{$id}' onclick='Operator_update({$no})'>
             <input type='button' class='del' id='delete{$no}' value='{$id}' onclick='Operator_delete({$no})'></td></tr>";
       }
    };
   ?>
</table>
</table>
<?php
} else if ($mode == 'common' && $select == 'common_sub4') {
    $sql = "select * from banner";
    $result = mysqli_query($con, $sql) or die("실패원인 : " . mysqli_error($con));
    $row = mysqli_fetch_array($result);
    
    $item_file_0 = $row['file_name_0'];
    $item_file_1 = $row['file_name_1'];
    $item_file_2 = $row['file_name_2'];
    $item_file_3 = $row['file_name_3'];
    $item_file_4 = $row['file_name_4'];
    
    $copied_file_0 = $row['file_copied_0'];
    $copied_file_1 = $row['file_copied_1'];
    $copied_file_2 = $row['file_copied_2'];
    $copied_file_3 = $row['file_copied_3'];
    $copied_file_4 = $row['file_copied_4'];
    if (isset($row)) {
        ?><br>
<form action="./admin_content_common/insert_banner.php" method="post"
   enctype="multipart/form-data" name="banner_form">
   <div id='admin_common_sub1'>
      <b>메인 이미지설정</b>
      <hr>
   </div>
   <br>
   <div id='title1'>
      <b id='title2'>*</b> 메인배너 설정
   </div>
   <table>
<?php if(!empty($item_file_0)){?>
   <tr>
         <td class='td1'><b>*</b> 파일1</td>
         <td class='td2'><?=$item_file_0 ?>파일이 등록되어 있습니다.
         <input type="file" name="upfile[]" style="display: none;"> <a
            id='delete_banner'
            href="./admin_content_common/delete_banner.php?delete=file1">x</a></td>
      </tr>
<?php } else {?>
   <tr>
         <td class='td1'><b>*</b> 파일1</td>
         <td class='td2'><input type='file' name="upfile[]"></td>
      </tr>
   <?php }?>
<?php if(!empty($item_file_1)){?>
   <tr>
         <td class='td1'><b>*</b> 파일2</td>
         <td class='td2'><?=$item_file_1 ?>파일이 등록되어 있습니다.
         <input type="file" name="upfile[]" style="display: none;"><a
            id='delete_banner'
            href="./admin_content_common/delete_banner.php?delete=file2">x</a></td>
      </tr>
<?php } else {?>
   <tr>
         <td class='td1'><b>*</b> 파일2</td>
         <td class='td2'><input type='file' name="upfile[]"></td>
      </tr>
   <?php }?>
<?php if(!empty($item_file_2)){?>
   <tr>
         <td class='td1'><b>*</b> 파일3</td>
         <td class='td2'><?=$item_file_2 ?>파일이 등록되어 있습니다.
         <input type="file" name="upfile[]" style="display: none;"><a
            id='delete_banner'
            href="./admin_content_common/delete_banner.php?delete=file3">x</a></td>
      </tr>
<?php } else {?>
   <tr>
         <td class='td1'><b>*</b> 파일3</td>
         <td class='td2'><input type='file' name="upfile[]"></td>
      </tr>
   <?php }?>
<?php if(!empty($item_file_3)){?>
   <tr>
         <td class='td1'><b>*</b> 파일4</td>
         <td class='td2'><?=$item_file_3 ?>파일이 등록되어 있습니다.
         <input type="file" name="upfile[]" style="display: none;"><a
            id='delete_banner'
            href="./admin_content_common/delete_banner.php?delete=file4">x</a></td>
      </tr>
<?php } else {?>
   <tr>
         <td class='td1'><b>*</b> 파일4</td>
         <td class='td2'><input type='file' name="upfile[]"></td>
      </tr>
   <?php }?>
<?php if(!empty($item_file_4)){?>
   <tr>
         <td class='td1'><b>*</b> 파일5</td>
         <td class='td2'><?=$item_file_4 ?>파일이 등록되어 있습니다.
         <input type="file" name="upfile[]" style="display: none;"><a
            id='delete_banner'
            href="./admin_content_common/delete_banner.php?delete=file5">x</a></td>
      </tr>
<?php } else {?>
   <tr>
         <td class='td1'><b>*</b> 파일5</td>
         <td class='td2'><input type='file' name="upfile[]"></td>
      </tr>
   <?php }?>
   
</table>
   <div id='save'>
      <input type="button" id='save_button' value="저장" onclick="input_banner()">
   </div>
</form><?php
    } else {
        
        ?><br>
<form action="./admin_content_common/insert_banner.php" method="post"
   enctype="multipart/form-data" name="banner_form">
   <div id='admin_common_sub1'>
      <b>메인 이미지설정</b>
      <hr>
   </div>
   <br>
   <div id='title1'>
      <b id='title2'>*</b> 메인배너 설정
   </div>
   <table>
      <tr>
         <td class='td1'><b>*</b> 파일1</td>
         <td class='td2'><input type='file' name="upfile[]"></td>
      </tr>
      <tr>
         <td class='td1'><b>*</b> 파일2</td>
         <td class='td2'><input type='file' name="upfile[]"></td>
      </tr>
      <tr>
         <td class='td1'><b>*</b> 파일3</td>
         <td class='td2'><input type='file' name="upfile[]"></td>
      </tr>
      <tr>
         <td class='td1'><b>*</b> 파일4</td>
         <td class='td2'><input type='file' name="upfile[]"></td>
      </tr>
      <tr>
         <td class='td1'><b>*</b> 파일5</td>
         <td class='td2'><input type='file' name="upfile[]"></td>
      </tr>
   </table>
   <div id='save'>
      <input type="button" id='save_button' value="저장" onclick="input_banner()">
   </div>
</form>

<?php
    }
}
?>
</html>