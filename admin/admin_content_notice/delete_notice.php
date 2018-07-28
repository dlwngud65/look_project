<?php 
include_once '../../lib/dbconn.php';

if(!empty($_POST['checkrow'])){
    $checkrow = $_POST['checkrow'];
}


if(!$checkrow){
    echo ("<script>
        alert('삭제할 글을 체크해주세요.');
        history.go(-2);
        </script>"); 
}

$count = count($checkrow);


for($i=0;$i<$count;$i++){
    
    $sql = "delete from notice where num = '$checkrow[$i]'";
    mysqli_query($con, $sql);
    
}

mysqli_close($con);

echo ("<script>
        history.go(-1);
        </script>"); 

?>