<html>
<body>
<?php 
include './dbconn.php';
$sql="select * from company_information";
$result=mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
    $ci_map =  $row['ci_map_copied'];
    $image_name = "../admin/admin_content_common/data/" . $ci_map;
?>
<div style="background-image: url('<?=$image_name ?>'); display: inline-block; width: 500px; height: 500px; background-size: 500px 500px;">
</div>
</body>
</html>