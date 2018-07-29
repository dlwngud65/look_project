<?php
session_start();
include "../lib/dbconn.php";

if (! empty($_GET['num'])) {
    $num = $_GET['num'];
}

$sql = "select * from event where num='$num'";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_array($result);
$image_copied[0] = $row['file_copied_0'];

if ($image_copied[0]) {
    
    $imageinfo = GetImageSize("../admin/admin_content_notice/data" . $image_copied[0]);
    
    $image_width[0] = $imageinfo[0];
    $image_height[0] = $imageinfo[1];
    $image_type[0] = $imageinfo[2];
    
} else {
    $image_width[0] = "";
    $image_height[0] = "";
    $image_type[0] = "";
}

if ($image_copied[0]) {
    
    $img_name = $image_copied[0];
    $img_name = "../admin/admin_content_notice/data/" . $img_name;
    $img_width = $image_width[0];
    ?>
    <img src='<?=$img_name ?>' style=" width: 430; height: 648px;"><br><br>
    <?php 
}
?>
<html>
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
   
   console.log(getCookie("today"));

   //오늘 하루 이 창을 열지 않음 클릭 시 
   $("#close").click(function(){
   
	   //체크 가 되어있으면 쿠키값 세팅.
      if($("input[name=chkbox]").is(":checked")){
         setCookie("today","close",1);
         
         window.close();
      }else{
         
         window.close();
      }
   
   });
   //겟 쿠키
   function getCookie(name) {
       var value = null, search=name+"=";
       if(document.cookie.length>0){
          var offset=document.cookie.indexOf(search);
          if(offset != -1){
             offset+=search.length;
             var end = document.cookie.indexOf(";",offset);
             if(end == -1)end = document.cookie.length;
             value=unescape(document.cookie.substr(offset,end));
          }
       }
       return value;
   }
   //셋 쿠키
   function setCookie(name, value, expiredays) {
       var days=1;
       if(days){
          var date = new Date();
          date.setTime(date.getTime()+(days*24*60*60*1000));
          var expires="; expires="+date.toGMTString();
       }else{
          var expires="";
       }
       document.cookie=name+"="+value+expires+"; path=/";
   }
   
   
   
});

</script>
<title>event</title>
<meta charset="utf-8">
<body style="text-align: center;">
<div style="float: right; margin-right:10px;">
	<input type="checkbox" name="chkbox" id="chkday"
		style="vertical-align: middle;">
	<a href="#" id="close" style="font-size: 10pt; color: black;">오늘 하루 이 창을 열지 않음</a>
</div>
</body>

</html>