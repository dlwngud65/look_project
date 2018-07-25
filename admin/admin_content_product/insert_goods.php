<?php
session_start();
if(!empty($_GET['status']) && $_GET['status']=='modify'){
    $status = $_GET['status'];
}


?>
<meta charset="utf-8">
<?php 


    if(!empty($_POST['goods_name'])){
        $goods_name = $_POST['goods_name'];
    }
    
    if(!empty($_POST['goods_num'])){
        $goods_num = $_POST['goods_num'];
    }
    if(!empty($_POST['goods_kind'])){
        $goods_kind = $_POST['goods_kind'];
         if($goods_kind=='top'||$goods_kind=='pants'){
             $gsize_s=(int)$_POST['gsize_s'];
            $gsize_m=(int)$_POST['gsize_m'];
            $gsize_l=(int)$_POST['gsize_l'];
            $gsize_xl=(int)$_POST['gsize_xl'];
            $gsize_free=(int)$_POST['gsize_free']; 
        }else{
             $shsize_260=(int)$_POST['shsize_260'];
            $shsize_270=(int)$_POST['shsize_270'];
            $shsize_280=(int)$_POST['shsize_280'];
            $shsize_290=(int)$_POST['shsize_290'];
            $shsize_300=(int)$_POST['shsize_300'];
             
        } 
    }
    if(!empty($_POST['goods_price'])){
        $goods_price = $_POST['goods_price'];
    }
    if(!empty($_POST['goods_dc'])){
        $goods_dc = $_POST['goods_dc'];
    }
    if(!empty($_POST['goods_color'])){
        $goods_color = $_POST['goods_color'];
    }
    
    if(!empty($_POST['goods_content'])){
        $goods_content = $_POST['goods_content'];
    }
    
    $color_count = count($goods_color);
    if($color_count>5){
        echo ("
        <script>
            alert('색상은 5개이하로 고를 수 있습니다.');
            history.go(-1);
        </script>
        ");
    }
function test_input($data){
        $data = trim($data);//띄어쓰기 제거
        $data = stripslashes($data);// \를 '값으로 변경
        $data = htmlspecialchars($data);//HTML 코드를문자그대로 출력.
        return $data;
}
    $goods_name = test_input($goods_name);
    $goods_num = test_input($goods_num);
    $goods_price = test_input($goods_price);
    $goods_content = test_input($goods_content);
 
    
    
    
    
$files = $_FILES["upfile"];
$count = count($files["name"]);
$upload_dir = './data/';

for ($i = 0; $i < $count; $i ++) {
    
    $upfile_name[$i] = $files["name"][$i];//실제 파일명
    $upfile_tmp_name[$i] = $files["tmp_name"][$i];//서버에 임시 저장될 파일명.
    $upfile_type[$i] = $files["type"][$i];//파일 형식
    $upfile_size[$i] = $files["size"][$i];//파일 크기
    $upfile_error[$i] = $files["error"][$i];//에러 발생확인
    
    $file = explode(".",$upfile_name[$i]);
    $file_name = $file[0];
    $file_ext  = $file[1];
    
    //파일값이 비어있으면 에러입니다. 비어있을시 실행을 안하는 것.
    if(!$upfile_error[$i]){//카피.
        
        $new_file_name = date("Y_m_d_H_i_s");//날짜
        $new_file_name = $new_file_name."_".$i;//날짜_i
        $copied_file_name[$i] = $new_file_name.".".$file_ext;//날짜_i.확장자명.
        $uploaded_file[$i] = $upload_dir.$copied_file_name[$i];//.data/날짜_i.확장자명.
        
        
        if($upfile_size[$i]  > 5000000 ) {//size가 500KB초과일시.
            echo("
            <script>
            alert('업로드 파일 크기가 지정된 용량(500KB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
            history.go(-1)
            </script>
            ");
            exit;
        }
        
        if (($upfile_type[$i] != "image/gif") && ($upfile_type[$i] != "image/jpeg") && ($upfile_type[$i] != "image/pjpeg") && ($upfile_type[$i] != "image/png")){
            
            echo("
               <script>
                  alert('JPG와 GIF 이미지 파일만 업로드 가능합니다!');
                  history.go(-1)
               </script>
               ");
            exit;
        }
        
        if (!move_uploaded_file($upfile_tmp_name[$i],$uploaded_file[$i])){//1번째 인자(임시파일)를 2번째 인자에 넣겠다.
            echo("
               <script>
               alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
               history.go(-1)
               </script>
            ");
            exit;
        }
        
    }
}
include "../../lib/dbconn.php";       // dconn.php 파일을 불러옴

$regist_day = date("Y-m-d (H:i)");
$goods_content = htmlspecialchars($goods_content);


 if($status=="modify"){
    
    $sql = "select * from goods where goods_num='$goods_num'";
    $result = mysqli_query($con,$sql)or die("실패원인:".mysqli_error($con));
    $row = mysqli_fetch_array($result);
    for ($i=0; $i<$count; $i++){
        
         $field_org_name = "file_name_".$i;
        $field_real_name = "file_copied_".$i;
        
        $org_name_value = $upfile_name[$i];  //실제 파일명
        $org_real_value = $copied_file_name[$i]; //저장된 파일명
            if (!$upfile_error[$i]){
                $sql = "update goods set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where goods_num='$goods_num'";
                mysqli_query($con,$sql)or die("실패원인:".mysqli_error($con));  // $sql 에 저장된 명령 실행
            }
        
    }
    
    if($goods_kind=="shoes"){
        
        $sql = "update goods set goods_name='$goods_name',goods_dc='$goods_dc',goods_price='$goods_price',goods_content='$goods_content',goods_color0='$goods_color[0]',
        goods_color1='$goods_color[1]',goods_color2='$goods_color[2]',goods_color3='$goods_color[3]',goods_color4='$goods_color[4]',shsize_260='$shsize_260',
        shsize_270='$shsize_270',shsize_280='$shsize_280',shsize_290='$shsize_290',shsize_300='$shsize_300' where goods_num='$goods_num'";
        
         mysqli_query($con,$sql)or die("실패원인:".mysqli_error($con)); 
    }else{
        $sql = "update goods set goods_name='$goods_name',goods_dc='$goods_dc', goods_price='$goods_price',goods_content='$goods_content',goods_color0='$goods_color[0]',
        goods_color1='$goods_color[1]',goods_color2='$goods_color[2]',goods_color3='$goods_color[3]',goods_color4='$goods_color[4]',gsize_s='$gsize_s',
        gsize_m='$gsize_m',gsize_l='$gsize_l',gsize_xl='$gsize_xl',gsize_free='$gsize_free' where goods_num='$goods_num'";
        mysqli_query($con,$sql)or die("실패원인:".mysqli_error($con)); 
    }
    
}else{
  
if($goods_kind=="shoes"){
    
    $sql = "insert into goods (goods_num,goods_name, goods_kind, goods_price, goods_content, goods_dc,
         goods_color0, goods_color1, goods_color2, goods_color3, goods_color4,gsize_s,gsize_m,gsize_l,gsize_xl,gsize_free,shsize_260,shsize_270,shsize_280,
        shsize_290,shsize_300,regist_day,best_check,file_name_0,file_name_1,file_name_2,file_name_3,
        file_name_4,file_name_5,file_name_6,file_name_7,file_name_8,file_name_9,
        file_copied_0,file_copied_1,file_copied_2,file_copied_3,file_copied_4,file_copied_5,
        file_copied_6,file_copied_7,file_copied_8,file_copied_9)";
    $sql .= "values('{$goods_num}', '{$goods_name}', '{$goods_kind}', '{$goods_price}', '{$goods_content}',
                 '{$goods_dc}', '{$goods_color[0]}', '{$goods_color[1]}','{$goods_color[2]}','{$goods_color[3]}','{$goods_color[4]}',0,0,0,0,0,
                    $shsize_260, $shsize_270, $shsize_280, $shsize_290, $shsize_300, '{$regist_day}','n','{$upfile_name[0]}', 
                '{$upfile_name[1]}','{$upfile_name[2]}','{$upfile_name[3]}','{$upfile_name[4]}','{$upfile_name[5]}','{$upfile_name[6]}','{$upfile_name[7]}',
                '{$upfile_name[8]}','{$upfile_name[9]}','{$copied_file_name[0]}', '{$copied_file_name[1]}','{$copied_file_name[2]}','{$copied_file_name[3]}',
            '{$copied_file_name[4]}','{$copied_file_name[5]}','{$copied_file_name[6]}','{$copied_file_name[7]}','{$copied_file_name[8]}','{$copied_file_name[9]}') ";
   
}else{
    $sql = "insert into goods (goods_num,goods_name, goods_kind, goods_price, goods_content, goods_dc,
         goods_color0, goods_color1, goods_color2, goods_color3, goods_color4,gsize_s,gsize_m,gsize_l,gsize_xl,gsize_free,shsize_260,shsize_270,shsize_280,
        shsize_290,shsize_300,regist_day,best_check,file_name_0,file_name_1,file_name_2,file_name_3,
        file_name_4,file_name_5,file_name_6,file_name_7,file_name_8,file_name_9,
        file_copied_0,file_copied_1,file_copied_2,file_copied_3,file_copied_4,file_copied_5,
        file_copied_6,file_copied_7,file_copied_8,file_copied_9)";
    $sql .= "values('$goods_num','$goods_name','$goods_kind','$goods_price','$goods_content',
              '$goods_dc','$goods_color[0]','$goods_color[1]','$goods_color[2]','$goods_color[3]','$goods_color[4]',$gsize_s,$gsize_m,$gsize_l,$gsize_xl,$gsize_free,
                0,0,0,0,0,'$regist_day','n','$upfile_name[0]','$upfile_name[1]','$upfile_name[2]','$upfile_name[3]','$upfile_name[4]','$upfile_name[5]','$upfile_name[6]','$upfile_name[7]',
                '$upfile_name[8]','$upfile_name[9]','$copied_file_name[0]','$copied_file_name[1]','$copied_file_name[2]','$copied_file_name[3]',
            '$copied_file_name[4]','$copied_file_name[5]','$copied_file_name[6]','$copied_file_name[7]','$copied_file_name[8]','$copied_file_name[9]') ";
    
}

mysqli_query($con,$sql) or die(mysqli_error($con)); 

mysqli_close($con); 
}

echo ("
 <script>
    location.href='../admin_main.php?mode=product&select=product_sub2';
 </script>
 ");   

?>