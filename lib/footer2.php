<?php 
    session_start();
    include_once '../lib/dbconn.php';
    
    $sql="select * from company_information";
    $result=mysqli_query($con, $sql);
    while($row=mysqli_fetch_array($result)){
        $ci_num=$row['ci_num'];
        $ci_name=$row['ci_name'];
        $representative_name=$row['representative_name'];
        $ci_address=$row['ci_address'];
        $ci_phone=$row['ci_phone'];
        $ci_fax=$row['ci_fax'];
        $ci_bank=$row['ci_bank'];
        $ci_an=$row['ci_an'];
        $ci_manager=$row['ci_manager'];
        $ci_time=$row['ci_time'];
        $ci_intro = $row['ci_introduce'];
    }
    $address=explode(".",$ci_address);
    $address1=$address[1];
    $address2=$address[2];
?>
<footer>
<script type="text/javascript">
function show_map(){
	window.open('../lib/map.php','','left=500,top=200, width=520, height=520, status=no, scrollbars=no, resizable=no');
}
</script>
		<div>
			<div class="footer_line1">
				<b>회사명</b> : <?=$ci_name ?> / <b>대표자명</b> : <?=$representative_name ?> <br><br>
				<b>사업자 등록 번호</b> : <?=$ci_num ?> <br><br>
				<b>개인정보책임담당자</b> : <?=$ci_manager ?> <br><br>
				<b>Email</b> : Look@naver.com <br><br>
				<b>주소</b> : <?=$ci_address ?> &nbsp;&nbsp;<a style="text-decoration: none; color: black; cursor: hand;" onclick="show_map()"><b> [약도보기☜]</b></a><br><br>
				Copyright ⓒ <?=$ci_intro ?>
			</div>
			<div class="footer_line1">
				<b>CALL</b> : <?=$ci_phone ?><br><br>
				<b>FAX</b> : <?=$ci_fax ?><br><br>
				<b>Mon~Fri</b> <?=$ci_time ?> <br><br>
			</div>
			<div class="footer_line1">
				<b>BANK INFO</b> : 무통장 입금 안내 <br><br>
				<b><?=$ci_bank ?></b> : <?=$ci_an ?> <br><br>
				<b>예금주</b> : <?=$ci_name ?>
			</div>
		</div>
</footer>