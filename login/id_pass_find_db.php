<?php

include '../lib/dbconn.php';

$mode=$_GET['mode'];

if($mode=="id_search"){
    $data_name=$_POST['find_name'];
    $data_phone=$_POST['phone1_1']."-".$_POST['phone1_2']."-".$_POST['phone1_3'];

    $sql="select id from member where name='$data_name' and phone='$data_phone'";
    $result=mysqli_query($con, $sql);
    
    if(!mysqli_num_rows($result)){
        echo "<script>alert('존재하지 않는 회원입니다.'); history.go(-1); </script>";
    }else{
        $row=mysqli_fetch_array($result);
        $search_id=$row['id'];
        echo "<script>alert('당신의 아이디는 [ $search_id ] 입니다.'); window.close(); </script>";
    }
}else if($mode=="pass_search"){
    if(!empty($_POST['find_id'])){
    
        $data_id        =$_POST['find_id'];
        $data_email     =$_POST['find_email1']."@".$_POST['find_email2'];
        
        $sql="select pass from member where id='$data_id' and email='$data_email'";
        $result=mysqli_query($con, $sql);
        if(!mysqli_num_rows($result)){
            echo "<script>alert('아이디와 이메일이 일치하지 않습니다.'); history.go(-1); </script>";
        }else{
            echo "<script>
                    location.href='./PHPMailer/send_email.php?user_email=$data_email&user_id=$data_id';
                  </script>";
        }
        
    }elseif(!empty($_POST['find_id2'])){
        $data_id2       =$_POST['find_id2'];
        $data_phone     =$_POST['find_phone']."-".$_POST['find_phone2']."-".$_POST['find_phone3'];
        
        $sql="select pass from member where id='$data_id2' and phone='$data_phone'";
        $result=mysqli_query($con, $sql);
        if(!mysqli_num_rows($result)){
            echo "<script>alert('아이디와 휴대전화 번호가 일치하지 않습니다.'); history.go(-1); </script>";
        }else{
            echo "<script>
                    alert('임시 비밀번호가 문자 메세지로 전송되었습니다. 로그인후 비밀번호를 변경해주세요.');
                    location.href='./sms/sms_send.php?user_phone=$data_phone&user_id=$data_id2&mode=send';
                  </script>";
        }
        
    }
    
   
    
}else{
    echo "<script>alert('비정상 접근 입니다.'); window.close();</script>";
}
?>