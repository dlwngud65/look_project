<html>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
	var delete_check = new Array();
	var check_num=0;
	$(document).ready(function(){
		
		
		
		$("#search_button").click(function(){
			var search_id=$("#search").val();
			location.href="./admin_main.php?mode=member&select=member_sub1&page=$go_page'&search=search_member&search_id="+search_id+""
		})
		$("#search_button3").click(function(){
			var search_id=$("#search3").val();
			location.href="./admin_main.php?mode=member&select=member_sub3&page=$go_page'&search=search_member_withdrawal&search_id="+search_id+""
		})
		$("#check_all").click(function(){
			  if($("#check_all").is(':checked')){
			      $("input[name='check_id[]']").prop("checked",true);
			   }else{
			      $("input[name='check_id[]']").prop("checked",false);
			   }
		})
		$("#select_del_button").click(function(){
			var res = confirm('선택한 회원이 삭제되면 되돌릴수 없습니다. 삭제하시겠습니까?');
			   if(res){
			   for(i=0 ; i<$("input[name='check_id[]']").length ; i++){
			      if($("input[name='check_id[]']")[i].checked == false){
			         $("input[name='check_id[]']")[i].disabled =true;
			      }
			   }
			   $("#cd").submit();
			   }
			})
	});
	function delete_button(data_id){
		var yes=confirm("회원을 삭제하면 다시 되돌릴수 없습니다. 삭제하시겠습니까?")
		if(yes){
			
			location.href="./admin_content_member/delete_member.php?data_id="+data_id+"&mode=delete_one";
		}
	}
	function delete_agree(data_id,date_name){
		var yes=confirm("회원을 삭제하면 다시 되돌릴수 없습니다. 삭제하시겠습니까?")
		if(yes){
			location.href="./admin_content_member/delete_member.php?data_id="+data_id+"&data_name="+date_name+"&mode=withdrawal_agree";
		}
	}
	function delete_cancel(data_id,date_name){
		var yes=confirm("탈퇴신청을 철회 하시겠습니까?")
		if(yes){
			location.href="./admin_content_member/delete_member.php?data_id="+data_id+"&data_name="+date_name+"&mode=withdrawal_cancel";
		}
	}

	
	function learnMore(data_id){
        
        window.open("./admin_content_member/learnmore_wait.php?id="+data_id,"","width=300,height=200");
     }
</script>
<?php
$mode = $_GET['mode'];
$select = $_GET['select'];
$search_id= $_GET['search_id'];
$search=$_GET['search'];
include '../lib/dbconn.php';

if($search=="search_member"){
$sql="select * from member where id='$search_id'";
$result=mysqli_query($con, $sql) or die("실패원인1 :".mysqli_error($con));
if(!mysqli_num_rows($result)){
    $total_record=0;
    }else{
    $total_record=mysqli_num_rows($result) or die("실패원인2 : ".mysqli_error($con));
    }
}else if($search=="search_member_withdrawal"){
    $sql="select * from member_withdrawal where id='$search_id'";
    $result=mysqli_query($con, $sql) or die("실패원인1 :".mysqli_error($con));
    if(!mysqli_num_rows($result)){
        $total_record=0;
    }else{
        $total_record=mysqli_num_rows($result) or die("실패원인2 : ".mysqli_error($con));
    }
    
}else{
    if($select=="member_sub1"){
        $sql="select * from member";
        $result=mysqli_query($con, $sql) or die("실패원인3 :".mysqli_error($con));
        $total_record=mysqli_num_rows($result);
        if(!mysqli_num_rows($result)){
            $total_record=0;
        }else{
            $total_record=mysqli_num_rows($result) or die("실패원인2 : ".mysqli_error($con));
        }
    }else if($select=="member_sub2"){
        
        $sql="select * from member_wait_withdrawal";
        $result=mysqli_query($con, $sql) or die(mysqli_error($con));
        $total_record=mysqli_num_rows($result);
        if(!mysqli_num_rows($result)){
            $total_record=0;
        }else{
            $total_record=mysqli_num_rows($result) or die("실패원인2 : ".mysqli_error($con));
        }
        
    }else if($select=="member_sub3"){
        $sql="select * from member_withdrawal";
        $result=mysqli_query($con, $sql) or die("실패원인3 :".mysqli_error($con));
        $total_record=mysqli_num_rows($result);
        if(!mysqli_num_rows($result)){
            $total_record=0;
        }else{
            $total_record=mysqli_num_rows($result) or die("실패원인2 : ".mysqli_error($con));
        }
    }else{
        
    }
}


// 페이지 당 글수, 블럭당 페이지 수
$rows_scale=10;
$pages_scale=10;

// 전체 페이지 수 ($total_page) 계산
$total_pages= ceil($total_record/$rows_scale);

if(empty($_GET['page'])){
    $page=1;
}else{
    $page = $_GET['page'];
}
$start_row= $rows_scale * ($page -1) ;
$pre_page= $page>1 ? $page-1 : NULL;
$next_page= $page < $total_pages ? $page+1 : NULL;
$start_page= (ceil($page / $pages_scale ) -1 ) * $pages_scale +1 ;
$end_page= ($total_pages >= ($start_page + $pages_scale)) ? $start_page + $pages_scale-1 : $total_pages;
$number=$start_row+1;



// 기본관리 부분
if ($mode == 'member' && $select == 'member_sub1') {
    ?>
    <br>
<div id='admin_common_sub1'>
	<b>회원 리스트</b>
	<hr>
</div>
<br>
<div id='title1'>
	<b id='title2'>*</b> 회원명단
</div>

	<form id="cd" method="post" action="./admin_content_member/delete_member.php?mode=delete_many">
<table>
	<tr>
		<td colspan='9' style='text-align: right'><input id='search'
			type='text'><input type="button" id='search_button' value="검색" ></td>
	</tr>
	<?php 
	
	?>
	<tr>
		<td id='num' class='td4'><input type='checkbox' id="check_all"></td>
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
	if($total_record>1){
	for ($i=$start_row; ($i<$start_row+$rows_scale) && ($i< $total_record); $i++){
	    mysqli_data_seek($result, $i);
	    $row = mysqli_fetch_array($result);
	    $user_name=$row['name'];
	    $user_id=$row['id'];
	    $user_rank=$row['rank'];
	    $user_phone=$row['phone'];
	    $user_birthday=$row['birthday'];
	    $user_email=$row['email'];
	    
	?>
	<tr>
		<td id='num' class='td4'><input name="check_id[]"  value="<?=$user_id?>" type="checkbox"></td>
		<td id='num' class='td4'><?=$number ?></td>
		<td class='td7'><?=$user_name ?></td>
		<td class='td7'><?=$user_id ?></td>
		<td id='num2' class='td4'><?=$user_rank ?></td>
		<td class='td7'><?=$user_phone ?></td>
		<td class='td9'><?=$user_birthday ?></td>
		<td class='td8'><?=$user_email ?></td>
		<td id='num2' class='td4'><input type="button"  id="del" value="X" onclick="delete_button('<?=$user_id ?>')"></td>
	</tr>
	<?php
	   $number++;
	};
	}else if($total_record==1){
	    mysqli_data_seek($result, $i);
	    $row = mysqli_fetch_array($result);
	    $user_name=$row['name'];
	    $user_id=$row['id'];
	    $user_rank=$row['rank'];
	    $user_phone=$row['phone'];
	    $user_birthday=$row['birthday'];
	    $user_email=$row['email'];
    ?>
    <tr>
		<td id='num' class='td4'><input type="checkbox"></td>
		<td id='num' class='td4'><?=$total_record ?></td>
		<td class='td7'><?=$user_name ?></td>
		<td class='td7'><?=$user_id ?></td>
		<td id='num2' class='td4'><?=$user_rank ?></td>
		<td class='td7'><?=$user_phone ?></td>
		<td class='td9'><?=$user_birthday ?></td>
		<td class='td8'><?=$user_email ?></td>
		<td id='num2' class='td4'><input type="button"  id="del" value="X" onclick="delete_button('<?=$user_id ?>')"></td>
	</tr>
    
    <?php 	    
	}else{
	?>    
	<tr> 
		  <td class='td7' colspan="9">결과가 없습니다.</td>
	</tr>    
    <?php	
	}
	?>
</table>
</form>
<input type="button" id='select_del_button' value="선택탈퇴">
<div id='page_box'>
<?PHP 
                #----------------이전블럭 존재시 링크------------------#
                if($start_page > $pages_scale){
                   $go_page= $start_page - $pages_scale;
                   echo "<a id='before_block' href='admin_main.php?mode=member&select=member_sub1&page=$go_page'> << </a>";   
                }
                #----------------이전페이지 존재시 링크------------------#
                if($pre_page){
                   echo "<a id='before_page' href='admin_main.php?mode=member&select=member_sub1&page=$pre_page'> < </a>";
                }
                #--------------바로이동하는 페이지를 나열---------------#
                if($search == "search_member_withdrawal" || $search == "search_member"){
                    echo( "&nbsp;<b id='present_page'>1</b>&nbsp" );
                }else{
                    for($dest_page=$start_page;$dest_page <= $end_page;$dest_page++){
                        if($dest_page == $page){
                            echo( "&nbsp;<b id='present_page'>$dest_page</b>&nbsp" );
                        }else{
                            echo "<a id='move_page' href='admin_main.php?mode=member&select=member_sub3&page=$dest_page'>$dest_page</a>";
                        }
                    }
                }
                
                #----------------이전페이지 존재시 링크------------------#
                if($search == "search_member_withdrawal" || $search == "search_member"){
                }else{
                    if($next_page){
                        echo "<a id='next_page' href='admin_main.php?mode=member&select=member_sub3&page=$next_page'> > </a>";
                    }
                }
                
                
                #---------------다음페이지를 링크------------------#
                if($search == "search_member_withdrawal" || $search == "search_member"){
                }else{
                    if($total_pages >= $start_page+ $pages_scale){
                        $go_page= $start_page+ $pages_scale;
                        echo "<a id='next_block' href='admin_main.php?mode=member&select=member_sub3&page=$go_page'> >> </a>";
                    }
                }
       ?>      
   </div>


<?php
} else if ($mode == 'member' && $select == 'member_sub2') {
    ?>
    <br>
<div id='admin_common_sub1'>
	<b>탈퇴 요청리스트</b>
	<hr>
</div>
<br>
<div id='title1'>
	<b id='title2'>*</b> 탈퇴 요청자
</div>

<table>
   
   <tr>
      <td id='num' class='td4'>NO</td>
      <td class='td7'>고객명</td>
      <td class='td7'>고객아이디</td>
      <td id='num' class='td4'>성별</td>
      <td class='td7'>휴대폰</td>
      <td class='td9'>생년월일</td>
      <td class='td10'>탈퇴사유</td>
      <td id='num' class='td4'>승인</td>
      <td id='num' class='td4'>취소</td>
   </tr>
  
   <?php 
   if($total_record>1){
	for ($i=$start_row; ($i<$start_row+$rows_scale) && ($i< $total_record); $i++){
	    $row=mysqli_fetch_array($result);
	    $wait_id = $row['id'];
	    
	    $sql1="select mb.id,mb.name,mb.gender,mb.phone,mb.birthday,mww.choice,mww.reason from member mb inner join member_wait_withdrawal mww on mb.id='{$wait_id}' and mww.id='{$wait_id}'";
	    $result1=mysqli_query($con, $sql1);
	    
	    $row1=mysqli_fetch_array($result1);
	    $wait_id = $row1['id'];
	    $wait_name = $row1['name'];
	    $wait_gender = $row1['gender'];
	    if($wait_gender=="M"){
	        $wait_gender="남";
	    }else{
	        $wait_gender="여";
	    }
	    $wait_phone = $row1['phone'];
	    $wait_birthday = $row1['birthday'];
	    $wait_choice = $row1['choice'];
	    if($wait_choice=="goods"){
	        $wait_choice = "상품 불만족";
	    }else if($wait_choice=="service"){
	        $wait_choice = "서비스 불만족";
	    }else if($wait_choice=="delivery"){
	        $wait_choice = "배송 불만족";
	    }else{
	        $wait_choice = "기타";
	    }
	    $wait_reason = $row1['reason'];
	    
	    ?>

   <tr>
      <td id='num' class='td4'><input type="checkbox"></td>
      <td id='num' class='td4'><?=$number?></td>
      <td class='td7'><?=$wait_name?></td>
      <td class='td7'><?=$wait_id?></td>
      <td id='num2' class='td4'><?=$wait_gender?></td>
      <td class='td7'><?=$wait_phone?></td>
      <td class='td9'><?=$wait_birthday ?></td>
      <td class='td10'><?=$wait_choice?>
      <button id=info type="button" onclick="learnMore('<?=$wait_id?>')"></button>
      </td>
      <td id='num' class='td4'><input type="button"  id="agree" onclick="delete_agree('<?=$wait_id ?>','<?=$wait_name ?>')"></input></td>
      <td id='num' class='td4'><input type="button"  id="cancel" onclick="delete_cancel('<?=$wait_id ?>','<?=$wait_name ?>')"></input></td>
   </tr>
	<?php
	   $number++;
	};
	}else if($total_record==1){
	    $row=mysqli_fetch_array($result);
	    $wait_id = $row['id'];
	    
	    $sql1="select mb.id,mb.name,mb.gender,mb.phone,mb.birthday,mww.choice,mww.reason from member mb inner join member_wait_withdrawal mww on mb.id='{$wait_id}' and mww.id='{$wait_id}'";
	    $result1=mysqli_query($con, $sql1);
	    
	    $row1=mysqli_fetch_array($result1);
	    $wait_id = $row1['id'];
	    $wait_name = $row1['name'];
	    $wait_gender = $row1['gender'];
	    if($wait_gender=="M"){
	        $wait_gender="남";
	    }else{
	        $wait_gender="여";
	    }
	    $wait_phone = $row1['phone'];
	    $wait_birthday = $row1['birthday'];
	    $wait_choice = $row1['choice'];
	    if($wait_choice=="goods"){
	        $wait_choice = "상품 불만족";
	    }else if($wait_choice=="service"){
	        $wait_choice = "서비스 불만족";
	    }else if($wait_choice=="delivery"){
	        $wait_choice = "배송 불만족";
	    }else{
	        $wait_choice = "기타";
	    }
	    $wait_reason = $row1['reason'];
	    
	    ?>
    <tr>
      <td id='num' class='td4'><?=$number?></td>
      <td class='td7'><?=$wait_name?></td>
      <td class='td7'><?=$wait_id?></td>
      <td id='num2' class='td4'><?=$wait_gender?></td>
      <td class='td7'><?=$wait_phone?></td>
      <td class='td9'><?=$wait_birthday ?></td>
      <td class='td10'><?=$wait_choice?>
      <button id=info type="button" onclick="learnMore('<?=$wait_id?>')"></button>
      </td>
      <td id='num' class='td4'><input type="button"  id="confirm" onclick="delete_agree('<?=$wait_id ?>','<?=$wait_name ?>')"></input></td>
      <td id='num' class='td4'><input type="button"  id="del" onclick="delete_cancel('<?=$wait_id ?>','<?=$wait_name ?>')"></input></td>
   </tr>
    
    <?php 	    
	}else{
	?>    
	<tr> 
		  <td class='td7' colspan="10">결과가 없습니다.</td>
	</tr>    
    <?php	
	}
	?>
</table>




<div id='page_box'>
<?PHP 
                #----------------이전블럭 존재시 링크------------------#
                if($start_page > $pages_scale){
                   $go_page= $start_page - $pages_scale;
                   echo "<a id='before_block' href='admin_main.php?mode=member&select=member_sub1&page=$go_page'> << </a>";   
                }
                #----------------이전페이지 존재시 링크------------------#
                if($pre_page){
                   echo "<a id='before_page' href='admin_main.php?mode=member&select=member_sub1&page=$pre_page'> < </a>";
                }
                #--------------바로이동하는 페이지를 나열---------------#
                if($search == "search_member_withdrawal" || $search == "search_member"){
                    echo( "&nbsp;<b id='present_page'>1</b>&nbsp" );
                }else{
                    for($dest_page=$start_page;$dest_page <= $end_page;$dest_page++){
                        if($dest_page == $page){
                            echo( "&nbsp;<b id='present_page'>$dest_page</b>&nbsp" );
                        }else{
                            echo "<a id='move_page' href='admin_main.php?mode=member&select=member_sub3&page=$dest_page'>$dest_page</a>";
                        }
                    }
                }
                
                #----------------이전페이지 존재시 링크------------------#
                if($search == "search_member_withdrawal" || $search == "search_member"){
                }else{
                    if($next_page){
                        echo "<a id='next_page' href='admin_main.php?mode=member&select=member_sub3&page=$next_page'> > </a>";
                    }
                }
                
                
                #---------------다음페이지를 링크------------------#
                if($search == "search_member_withdrawal" || $search == "search_member"){
                }else{
                    if($total_pages >= $start_page+ $pages_scale){
                        $go_page= $start_page+ $pages_scale;
                        echo "<a id='next_block' href='admin_main.php?mode=member&select=member_sub3&page=$go_page'> >> </a>";
                    }
                }
       ?>      
   </div>



		    <?php
		    
}else if ($mode == 'member' && $select == 'member_sub3') {
    ?>
	<br>
<div id='admin_common_sub1'>
	<b>탈퇴회원 리스트</b>
	<hr>
</div>
<br>
<div id='title1'>
	<b id='title2'>*</b> 탈퇴회원 명단
</div>

	<form id="cd" method="post" action="./admin_content_member/delete_member.php?mode=delete_many">
<table>
	<tr>
		<td colspan='9' style='text-align: right'><input id='search3'
			type='text'><input type="button" id='search_button3' value="검색"  style="margin-bottom: 10px;"></td>
	</tr>
	<?php 
	
	?>
	<tr>
		<td id='num' class='td4'>NO</td>
		<td class='td7'>고객아이디</td>
		<td class='td7'>이름</td>
		<td class='td7'>사유</td>
		<td class='td9' style="width: 350px;">이유</td>
		<td class='td10'>탈퇴날짜</td>
	</tr>
	<?php 
	if($total_record>1){
	for ($i=$start_row; ($i<$start_row+$rows_scale) && ($i< $total_record); $i++){
	    mysqli_data_seek($result, $i);
	    $row = mysqli_fetch_array($result);
	    $user_name=$row['name'];
	    $user_id=$row['id'];
	    $user_choice=$row['choice'];
	    $user_reason=$row['reason'];
	    $user_date=$row['date'];
	    
	?>
	<tr>
		<td id='num' class='td4'><?=$number ?></td>
		<td class='td7'><?=$user_id ?></td>
		<td class='td7'><?=$user_name?></td>
		<td id='num2' class='td4'><?=$user_choice ?></td>
		<td class='td7' style="width: 350px;"><?=$user_reason ?></td>
		<td class='td9' ><?=$user_date ?></td>
	</tr>
	<?php
	   $number++;
	};
	}else if($total_record==1){
	    mysqli_data_seek($result, $i);
	    $row = mysqli_fetch_array($result);
	    $user_name=$row['name'];
	    $user_id=$row['id'];
	    $user_choice=$row['choice'];
	    $user_reason=$row['reason'];
	    $user_date=$row['date'];
    ?>
    <tr>
		<td id='num' class='td4'><?=1 ?></td>
		<td class='td7'><?=$user_id ?></td>
		<td class='td7'><?=$user_name?></td>
		<td id='num2' class='td4'><?=$user_choice ?></td>
		<td class='td7' style="width: 350px;"><?=$user_reason ?></td>
		<td class='td9'><?=$user_date ?></td>
	</tr>
    
    <?php 	    
	}else{
	?>    
	<tr> 
		  <td class='td7' colspan="9">결과가 없습니다.</td>
	</tr>    
    <?php	
	}
	?>
</table>
</form>
<div id='page_box'>
<?PHP 
                #----------------이전블럭 존재시 링크------------------#
                if($start_page > $pages_scale){
                   $go_page= $start_page - $pages_scale;
                   echo "<a id='before_block' href='admin_main.php?mode=member&select=member_sub3&page=$go_page'> << </a>";   
                }
                #----------------이전페이지 존재시 링크------------------#
                if($pre_page){
                   echo "<a id='before_page' href='admin_main.php?mode=member&select=member_sub3&page=$pre_page'> < </a>";
                }
                 #--------------바로이동하는 페이지를 나열---------------#
                if($search == "search_member_withdrawal" || $search == "search_member"){
                    echo( "&nbsp;<b id='present_page'>1</b>&nbsp" );
                }else{
                for($dest_page=$start_page;$dest_page <= $end_page;$dest_page++){
                   if($dest_page == $page){
                        echo( "&nbsp;<b id='present_page'>$dest_page</b>&nbsp" );
                    }else{
                        echo "<a id='move_page' href='admin_main.php?mode=member&select=member_sub3&page=$dest_page'>$dest_page</a>";
                    }
                 }
                }
                    
                 #----------------이전페이지 존재시 링크------------------#
                if($search == "search_member_withdrawal" || $search == "search_member"){
                }else{
                 if($next_page){  
                    echo "<a id='next_page' href='admin_main.php?mode=member&select=member_sub3&page=$next_page'> > </a>";
                 }
                }
                
                
                 #---------------다음페이지를 링크------------------#
                if($search == "search_member_withdrawal" || $search == "search_member"){
                }else{
                if($total_pages >= $start_page+ $pages_scale){
                  $go_page= $start_page+ $pages_scale;
                   echo "<a id='next_block' href='admin_main.php?mode=member&select=member_sub3&page=$go_page'> >> </a>";
                 }
                }
                
       ?>      
   </div>

		    <?php
}
?>

</html>