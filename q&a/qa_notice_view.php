<?php
session_start();
$page = $_GET['page'];
$num = $_GET['num'];
$id = $_SESSION['user_id'];
$mode = $_GET['mode'];
include '../lib/dbconn.php';
$sql = "update notice set hit = hit+1 where num=$num";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$sql = "select * from notice where num=$num";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$row = mysqli_fetch_array($result);
$notice_num         = $row['num'];
$notice_id          = $row['admin_id'];
$notice_subject     = $row['subject'];
$notice_content     = $row['content'];
$notice_regist_day  = $row['regist_day'];
$notice_regist_date = substr($notice_regist_day, 0, 10);
$notice_hit         = $row['hit'];
?>

<html>
<head>
<title>Look&</title>
<meta charset="utf-8">
<link href="../css/main2.css?v=v5" rel="stylesheet" type="text/css">
<link href="./css/qa_write.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../img/look.png" type="image/x-icon">

<style type="text/css">
</style>
<script type="text/javascript">

function go_list(){
	history.go(-1);
}
</script>
</head>
<body style="margin: 0 0 0 0">
	<div class="basic_shape">
		<?php include "../lib/header2.php";?>
		<nav id="qa_write_nav">
			<form name="qa_form" action="./qa_modi.php" method="post">
				<div id="write">
					<table>
						<caption>
							<span id="write_logo"><b>NOTICE</b></span>
						</caption>
						<tr>
							<td class="td1" colspan="2"
								style="border: none; text-align: right;">등록일 : <?=$notice_regist_date ?>&nbsp;&nbsp;&nbsp;&nbsp;조회수 : <?=$notice_hit ?></td>
						</tr>
						<tr>
							<td class="td1">아이디</td>
							<td class="td2"><?=$notice_id ?></td>
						</tr>
						<tr>
							<td class="td1">제목</td>
							<td class="td2"><?=$notice_subject?></td>
						</tr>
						<tr>
							<td class="td1" colspan="2"><div id="view"
									style="width: 1250px; min-height: 600px; text-align: left;">
									<span style="display: inline-block;"><?=$notice_content ?></span>
								</div></td>
						</tr>
					</table>
					<br>
					<div id="button_box">
						<input type="button" value="목록" onclick="go_list()">
					</div>
				</div>
			</form>
		</nav>
		<?php include "../lib/footer.php";?>
	</div>
</body>
</html>