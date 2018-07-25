<?php
include_once '../../lib/dbconn.php';

if (! empty($_POST['main_num'])) {
    $main_num = $_POST['main_num'];
}
if (! empty($_POST['check'])) {
    $check = $_POST['check'];
}
if ($check == null) {
    echo "
    <script>
    alert('체크를 해주세요.');
    history.go(-1);
    </script>
    ";
    exit();
}
$count = count($check);

if ($count > 3) {
    echo "
    <script>
    alert('추천 상품은 3개까지만 가능합니다.');
    history.go(-1);
    </script>
    "
    ;
    exit();
}

$sql = "update goods set recommend1='$check[0]',recommend2='$check[1]',recommend3='$check[2]' where goods_num='{$main_num}'";

mysqli_query($con, $sql) or die(mysqli_error($con));
mysqli_close($con);

echo "
  <script>
    alert('추천 상품으로 등록되었습니다.');
opener.parent.location.reload();
    window.close();
    </script>
";

?>