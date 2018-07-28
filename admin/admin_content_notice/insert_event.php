<?php
session_start();
?>
<meta charset="utf-8">
<?php

include "../../lib/dbconn.php";

if (! empty($_GET['status']) && $_GET['status'] == 'modify') {
    $status = $_GET['status'];
}

if (! empty($_POST['num'])) {
    $num = $_POST['num'];
}

if (! empty($_POST['subject'])) {
    $subject = $_POST['subject'];
}
if (! empty($_POST['content'])) {
    $content = $_POST['content'];
}

if (! empty($_POST['popup'])) {
    $popup = $_POST['popup'];
}

if ($popup == '') {
    $popup = 'n';
} else {
    
    if ($status == 'modify') {
        $sql = "select * from event where popup_check='y' and num != $num";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        $record = mysqli_num_rows($result);
        if ($record > 0) {
            mysqli_close($con);
            echo ("<script>
            alert('팝업 체크는 1개만 가능합니다.');
            history.go(-1);
          </script>");
        }
    } else {
        $sql = "select * from event where popup_check='y'";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        $record = mysqli_num_rows($result);
        if ($record > 0) {
            mysqli_close($con);
            echo ("<script>
        alert('팝업 체크는 1개만 가능합니다.');
        history.go(-1);
      </script>");
        }
    }
}

$files = $_FILES["upfile"];
$upload_dir = './data/';

for ($i = 0; $i < 1; $i ++) {
    
    $upfile_name[$i] = $files["name"][$i];
    $upfile_tmp_name[$i] = $files["tmp_name"][$i];
    $upfile_type[$i] = $files["type"][$i];
    $upfile_size[$i] = $files["size"][$i];
    $upfile_error[$i] = $files["error"][$i];
    
    $file = explode(".", $upfile_name[$i]);
    $file_name = $file[0];
    $file_ext = $file[1];
    
    if (! $upfile_error[$i]) {
        
        $new_file_name = date("Y_m_d_H_i_s");
        $new_file_name = $new_file_name . "_" . $i;
        $copied_file_name[$i] = $new_file_name . "." . $file_ext;
        $uploaded_file[$i] = $upload_dir . $copied_file_name[$i];
        
        if ($upfile_size[$i] > 5000000) {
            echo ("
            <script>
            alert('업로드 파일 크기가 지정된 용량(500KB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
            history.go(-1)
            </script>
            ");
            exit();
        }
        
        if (($upfile_type[$i] != "image/gif") && ($upfile_type[$i] != "image/jpeg") && ($upfile_type[$i] != "image/pjpeg") && ($upfile_type[$i] != "image/png")) {
            
            echo ("
               <script>
                  alert('JPG와 GIF 이미지 파일만 업로드 가능합니다!');
                  history.go(-1)
               </script>
               ");
            exit();
        }
        
        if (! move_uploaded_file($upfile_tmp_name[$i], $uploaded_file[$i])) {
            echo ("
               <script>
               alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
               history.go(-1)
               </script>
            ");
            exit();
        }
    }
}

$content = htmlspecialchars($content);
$subject = htmlspecialchars($subject);

if ($status == "modify") {
    $sql = "select * from event where num=$num";
    $result = mysqli_query($con, $sql) or die("실패원인:" . mysqli_error($con));
    $row = mysqli_fetch_array($result);
    for ($i = 0; $i < 1; $i ++) {
        
        $field_org_name = "file_name_" . $i;
        $field_real_name = "file_copied_" . $i;
        
        $org_name_value = $upfile_name[$i]; // 실제 파일명
        $org_real_value = $copied_file_name[$i]; // 저장된 파일명
        if (! $upfile_error[$i]) {
            $sql = "update event set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where num=$num";
            mysqli_query($con, $sql) or die("실패원인:" . mysqli_error($con)); // $sql 에 저장된 명령 실행
        }
    }
    $sql = "update event set subject='$subject',content='$content',popup_check='$popup' where num=$num";
} else {
    
    $regist_day = date("Y-m-d (H:i)");
    $sql = "insert into event (admin_id,subject,content,regist_day,hit,popup_check,file_name_0,file_copied_0)";
    $sql .= "values('운영자','{$subject}','{$content}','{$regist_day}',0,'{$popup}','{$upfile_name[0]}','{$copied_file_name[0]}')";
}

mysqli_query($con, $sql) or die(mysqli_error($con));

mysqli_close($con);

echo ("
 <script>
    location.href='../admin_main.php?mode=notice&select=notice_sub4';
 </script>
 ");

?>