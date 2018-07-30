<?php
include '../../lib/dbconn.php';
if (! empty($_POST['ci_num'])) {
    $ci_num = $_POST['ci_num'];
}
if (! empty($_POST['ci_name'])) {
    $ci_name = $_POST['ci_name'];
}
if (! empty($_POST['representative_name'])) {
    $representative_name = $_POST['representative_name'];
}
if (! empty($_POST['postcode'])) {
    $postcode = $_POST['postcode'];
}
if (! empty($_POST['address1'])) {
    $address1 = $_POST['address1'];
}
if (! empty($_POST['address2'])) {
    $address2 = $_POST['address2'];
}
if (! empty($_POST['ci_phone'])) {
    $ci_phone = $_POST['ci_phone'];
}
if (! empty($_POST['ci_fax'])) {
    $ci_fax = $_POST['ci_fax'];
}
if (! empty($_POST['ci_mailorder'])) {
    $ci_mailorder = $_POST['ci_mailorder'];
}
if (! empty($_POST['ci_introduce'])) {
    $ci_introduce = $_POST['ci_introduce'];
}
// if(!empty($_POST['ci_map'])){
// $ci_map=$_POST['ci_map'];
// }
if (! empty($_POST['ci_bank'])) {
    $ci_bank = $_POST['ci_bank'];
}
if (! empty($_POST['ci_an'])) {
    $ci_an = $_POST['ci_an'];
}
if (! empty($_POST['ci_manager'])) {
    $ci_manager = $_POST['ci_manager'];
}
if (! empty($_POST['ci_time'])) {
    $ci_time = $_POST['ci_time'];
}

if (! empty($_POST['ci_time1'])) {
    $ci_time1 = $_POST['ci_time1'];
}
if (! empty($_POST['ci_time2'])) {
    $ci_time2 = $_POST['ci_time2'];
    $ci_time = $ci_time1 . "~" . $ci_time2;
    
    $image_name = $_FILES["ci_map"]["name"];
    $image_tmp_name = $_FILES["ci_map"]["tmp_name"];
    $image_type = $_FILES["ci_map"]["type"];
    $image_size = $_FILES["ci_map"]["size"];
    $image_error = $_FILES["ci_map"]["error"];
    $file = explode(".", $image_name);
    $file_name = $file[0];
    $file_ext = $file[1];
    
    if (! $image_error) {
        $new_file_name = date("Y_m_d_H_i_s");
        $new_file_name = $new_file_name . "." . $file_ext;
        $upload_image_dir_name = "./data/" . $new_file_name;
        
        if (! move_uploaded_file($image_tmp_name, $upload_image_dir_name)) {
            echo "<script>alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.')</script>";
            exit();
        }
    }
    $address = $postcode . "." . $address1 . "." . $address2;
    $sql = "select * from company_information";
    $result = mysqli_query($con, $sql);
    $row = mysqli_num_rows($result);
    $row2 = mysqli_fetch_array($result);
    if ($image_name == "") {
        $image_name = $row2['ci_map'];
        $new_file_name = $row2['ci_map_copied'];
    }
}

if ($row === 0) {
    $sql = "insert into company_information (ci_num, ci_name, representative_name, ci_address, ci_phone, ci_fax, ci_mailorder, ci_introduce, ci_map, ci_map_copied, ci_bank, ci_an, ci_manager, ci_time)";
    $sql .= " values('$ci_num', '$ci_name', '$representative_name', '$address', '$ci_phone', '$ci_fax', '$ci_mailorder', '$ci_introduce', '$image_name', '$new_file_name', '$ci_bank', '$ci_an', '$ci_manager', '$ci_time')";
    if (! mysqli_query($con, $sql)) {
        echo "실패원인: " . mysqli_error($con);
    } else {
        echo "<script>alert('입력하신 정보가 입력되었습니다.');history.go(-1);</script>";
    }
} else {
    $sql = "update company_information set ci_num='$ci_num', ci_name='$ci_name', representative_name='$representative_name',
ci_address='$address', ci_phone='$ci_phone', ci_fax='$ci_fax', ci_mailorder='$ci_mailorder', ci_introduce='$ci_introduce', ci_map='$image_name',
 ci_map_copied='$new_file_name', ci_bank='$ci_bank', ci_an='$ci_an', ci_manager='$ci_manager', ci_time='$ci_time'";
    if (! mysqli_query($con, $sql)) {
        echo "실패원인: " . mysqli_error($con);
    } else {
        echo "<script>alert('입력하신 정보가 수정되었습니다.');history.go(-1);</script>";
    }
}

?>