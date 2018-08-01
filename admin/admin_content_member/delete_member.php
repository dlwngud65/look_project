<?php
include_once '../../lib/dbconn.php';

if(!empty($_GET['data_id'])){
    $data_id = $_GET['data_id'];
}
if(!empty($_GET['data_name'])){
    $data_name = $_GET['data_name'];
}

$mode=$_GET['mode'];
$check_id= $_POST['check_id'];

$sql="select * from member where id='$data_id';";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_array($result);
$data_name=$row['name'];

$today=date("Y-m-d");

if($mode=="delete_many"){
    
    if(!$check_id){
        echo ("<script>
        alert('삭제할 글을 체크해주세요.');
        history.go(-1);
        </script>");
    }

    $count = count($check_id);
    for($i=0;$i<$count;$i++){
    
        $sql="insert into member_withdrawal (id, name, choice,reason, date) value('$check_id[$i]','$data_name', '악성유저', '홈페이지에 악영향을 끼침 ', '$today');";
        mysqli_query($con, $sql);

        $sql="delete from member where id='$check_id[$i]';";
        mysqli_query($con, $sql);
    }
}else if($mode=="delete_one"){
    $sql="insert into member_withdrawal (id, name, choice,reason, date) value('$data_id','$data_name', '악성유저', '홈페이지에 악영향을 끼침  ', '$today');";
    mysqli_query($con, $sql); 
    $sql="delete from member where id='$data_id';";
    mysqli_query($con, $sql); 
}else if($mode=="withdrawal_agree"){

    $sql="select * from member_wait_withdrawal where id='$data_id'"; 
    $result=mysqli_query($con, $sql); 
    $row=mysqli_fetch_array($result);
    $wait_choice=$row['choice'];
    $wait_reason=$row['reason'];
    $sql="insert into member_withdrawal (id, name, choice,reason, date) value('$data_id','$data_name', '$wait_choice', '$wait_reason', '$today');";
    mysqli_query($con, $sql); 
    
    $sql="delete from member where id='$data_id'";
    $result=mysqli_query($con, $sql);
    $sql="delete from member_wait_withdrawal where id='$data_id'";
    $result=mysqli_query($con, $sql);
    
    $sql="delete from member where id='$data_id';";
    mysqli_query($con, $sql); 
    
}else if($mode=="withdrawal_cancel"){
    echo "<script>alert('철회되었습니다.');</script>";
    $sql="delete from member_wait_withdrawal where id='$data_id'";
    $result=mysqli_query($con, $sql);
}else{
    echo "<script>alert('잘못된 접근 입니다.');</script>";
}



mysqli_close($con);

 echo ("<script>
        history.go(-1);
        </script>"); 

?>