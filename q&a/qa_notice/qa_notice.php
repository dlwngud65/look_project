<?php 
session_start();
include "../lib/dbconn.php";
/*  1.공지사항과 이벤트 같이 할 지
 *  2.뷰 누르기 기능 해야되고(뷰에서 리플 만들어야됨)
 *  3.리플 개수 여기에 해야됨.
 *  4.검색에 따른 쿼리 해야됨
 *  
 *  */


$sql = "select * from notice";
$result = mysqli_query($con, $sql);
$total_record = mysqli_num_rows($result);

?>

<html>
<br>
<div id="qa_spell">
   <b>공지사항</b>
</div>
<br>
<br>
<table id="qa_all">
<?php 

// 페이지 당 글수, 블럭당 페이지 수
$rows_scale = 5;
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

if(!$total_record){
?>
   <tr style="text-align: center; font-weight: bold;">
      <td class="td2">번호</td>
      <td class="td3">질문타입</td>
      <td class="td4">제목</td>
      <td class="td3">작성자</td>
      <td class="td2">조회수</td>
   </tr>
   </table>
<?php }else{?>
   <tr style="text-align: center; font-weight: bold;">
      <td class="td2">번호</td>
      <td class="td3">작성자</td>
      <td class="td4">제목</td>
      <td class="td3">작성일</td>
      <td class="td2">조회수</td>
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
   <tr style="text-align: center;">
      <td class="td2"><?=$number?></td>
      <td class="td3"><?=$admin_id?></td>
      <td class="td4" ><a href="./qa_notice_view.php?num=<?=$num ?>" style="text-decoration: none; color: black;"> <?=$subject?></a></td>
      <td class="td3"><?=$regist_day?></td>
      <td class="td2"><?=$hit?></td>
   </tr>
   <?php 
   $number--;
    }//end of for
   ?>
</table>

   
<br>
<div id='page_box'>
<?PHP
    // ----------------이전블럭 존재시 링크------------------#
    if ($start_page > $pages_scale) {
        $go_page = $start_page - $pages_scale;
        //q&a/qa_main.php?mode=notice
        echo "<a id='before_block' href='qa_main.php?mode=notice&page=$go_page'> << </a>";
    }
    // ----------------이전페이지 존재시 링크------------------#
    if ($pre_page) {
        echo "<a id='before_page' href='qa_main.php?mode=notice&page=$pre_page'> < </a>";
    }
    // --------------바로이동하는 페이지를 나열---------------#
    for ($dest_page = $start_page; $dest_page <= $end_page; $dest_page ++) {
        if ($dest_page == $page) {
            echo ("&nbsp;<b id='present_page'>$dest_page</b>&nbsp");
        } else {
            echo "<a id='move_page' href='qa_main.php?mode=notice&page=$dest_page'>$dest_page</a>";
        }
    }
    // ----------------이전페이지 존재시 링크------------------#
    if ($next_page) {
        echo "<a id='next_page' href='qa_main.php?mode=notice&page=$next_page'> > </a>";
    }
    // ---------------다음페이지를 링크------------------#
    if ($total_pages >= $start_page + $pages_scale) {
        $go_page = $start_page + $pages_scale;
        echo "<a id='next_block' href='qa_main.php?mode=notice&page=$go_page'> >> </a>";
    }
    ?>      
   </div>
<?php 
}//end of if else
?>
</html>