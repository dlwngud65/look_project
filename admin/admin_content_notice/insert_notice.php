<?php


if(!empty($_POST['subject'])){
    $subject = $_POST['subject'];
}
if(!empty($_POST['content'])){
    $content = $_POST['content'];
}

if(!empty($_POST['num'])){
    $num = $_POST['num'];
}

if(!empty($_GET['status'])){
    $status=$_GET['status'];
}



include "../../lib/dbconn.php";   



$content = htmlspecialchars($content);
$subject = htmlspecialchars($subject);

if($status=='modify'){
    $sql ="update notice set subject='{$subject}',content='{$content}' where num='{$num}'";
    
}else{
    $regist_day = date("Y-m-d (H:i)");
    $sql ="insert into notice (admin_id,subject,content,regist_day,hit)";
    $sql .="values('운영자','{$subject}','{$content}','{$regist_day}',0)";

}
mysqli_query($con,$sql) or die(mysqli_error($con));

mysqli_close($con); 

echo ("
 <script>
    location.href='../admin_main.php?mode=notice&select=notice_sub2';
 </script>
 ");  

?>