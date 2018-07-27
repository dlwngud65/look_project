<html>
<?php
$mode = $_GET['mode'];
if ($mode == 'common') {
    echo ("<br><div id='admin_common'><b>기본관리 </b></div><br>");
    echo ("<a href='./admin_main.php?mode=common&select=common_sub1'>내 쇼핑물 관리</a><br><br>");
    echo ("<a href='./admin_main.php?mode=common&select=common_sub2'>회사 정보 관리</a><br><br>");
    echo ("<a href='./admin_main.php?mode=common&select=common_sub3'>운영자 설정</a><br><br>");
    echo ("<a href='./admin_main.php?mode=common&select=common_sub4'>메인이미지 설정</a><br><br>");
}
if ($mode == 'product') {
    echo ("<br><div id='admin_product'><b>제품관리 </b></div><br>");
    echo ("<a href='admin_main.php?mode=product&select=product_sub1'>상품 등록</a><br><br>");
    echo ("<a href='admin_main.php?mode=product&select=product_sub2'>상품 수정&삭제</a><br><br>");
    echo ("<a href='admin_main.php?mode=product&select=product_sub3'>베스트 상품</a><br><br>");
    echo ("<a href='admin_main.php?mode=product&select=product_sub4'>추천 상품 설정</a><br><br>");
}

if ($mode == 'order') {
    echo ("<br><div id='admin_order'><b>주문관리 </b></div><br>");
    echo ("<a href='admin_main.php?mode=order&select=order_sub1'>주문 리스트</a><br><br>");
    echo ("<a href='admin_main.php?mode=order&select=order_sub2'>반품 리스트</a><br><br>");
}

if ($mode == 'member') {
    echo ("<br><div id='admin_member'><b>회원관리 </b></div><br>");
    echo ("<a href='admin_main.php?mode=member&select=member_sub1'>회원 리스트</a><br><br>");
    echo ("<a href='admin_main.php?mode=member&select=member_sub2'>탈퇴 요청리스트</a><br><br>");
    echo ("<a href='admin_main.php?mode=member&select=member_sub3'>탈퇴회원 리스트</a><br><br>");
}

if ($mode == 'notice') {
    echo ("<br><div id='admin_notice'><b>게시판관리 </b></div><br>");
    echo ("<a href='admin_main.php?mode=notice&select=notice_sub1'>공지사항 등록</a><br><br>");
    echo ("<a href='admin_main.php?mode=notice&select=notice_sub2'>공지사항 수정&삭제</a><br><br>");
    echo ("<a href='admin_main.php?mode=notice&select=notice_sub3'>이벤트 등록</a><br><br>");
    echo ("<a href='admin_main.php?mode=notice&select=notice_sub4'>이벤트 수정&삭제</a><br><br>");
    echo ("<a href='admin_main.php?mode=notice&select=notice_sub5'>Q&A 리스트</a><br><br>");
}

if ($mode == 'sale') {
    echo ("<br><div id='admin_sale'><b>매출관리 </b></div><br>");
    echo ("<a href='admin_main.php?mode=sale&select=sale_sub1'>총 매출 관리</a><br><br>");
}

if ($mode == 'coupon') {
    echo ("<br><div id='admin_coupon'><b>쿠폰관리 </b></div><br>");
    echo ("<a href='admin_main.php?mode=coupon&select=coupon_sub1'>쿠폰등록</a><br><br>");
    echo ("<a href='admin_main.php?mode=coupon&select=coupon_sub2'>쿠폰 수정&삭제</a><br><br>");
    echo ("<a href='admin_main.php?mode=coupon&select=coupon_sub3'>쿠폰지급</a><br><br>");
}

?>
</html>