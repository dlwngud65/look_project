<?php
session_start();

include '../../lib/dbconn.php';
require_once("./class.phpmailer.php");
require_once("./class.smtp.php");

$user_email=$_GET['user_email'];
$user_id=$_GET['user_id'];
srand((double)microtime()*1000000); //난수값 초기화
$_SESSION['pass']=rand(10000000,99999999);
$pass=$_SESSION['pass'];

$sql="update member set pass='$pass' where id='$user_id' and email='$user_email' ";
mysqli_query($con, $sql);




$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
$mail->IsSMTP(); 		// telling the class to use SMTP
try {
    $mail->CharSet = "utf-8";	                     // set charset to utf8
    $mail->Host = "smtp.naver.com"; 	             // email 보낼때 사용할 서버를 지정
    $mail->SMTPAuth = true; 	                     // SMTP 인증을 사용함
    $mail->Port = 465; 		                         // email 보낼때 사용할 포트를 지정 465 587
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPSecure = "ssl"; 	                           // SSL을 사용함  tls
    $mail->Username   = "kswoah123@naver.com"; 	           // Gmail 계정
    $mail->Password   = "sksmsqnwkek"; 			           // 패스워드
    
    $mail->SetFrom('kswoah123@naver.com', 'Look&');       // 보내는 사람 email 주소와 표시될 이름 (표시될 이름은 생략가능)
    $mail->AddAddress($user_email, 'Look&');  // 받을 사람 email 주소와 표시될 이름 (표시될 이름은 생략가능)
    $mail->Subject = 'Look& 비밀번호'; // 메일 제목
    
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    //$mail->isHTML(true);                                  // Set email format to HTML
    
    
    // 메일 내용 (HTML 형식도 되고 그냥 일반 텍스트도 사용 가능함)
    //$mail->MsgHTML(file_get_contents('basic.html'));
    $mail->Body    = "임시 비밀번호는  ".$pass." 입니다. <br>접속후 비밀번호를 바꿔주시길 바랍니다.";
    
    $mail->Send();
    
    echo "Message Sent OK";
    
}catch (phpmailerException $e) {
    echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
    echo $e->getMessage(); //Boring error messages from anything else!
}

    


   echo "<script>
            alert('임시 비밀번호가 전송되었습니다.'); window.close();
    </script>";
 
?>