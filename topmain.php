<?php
session_start();
$randimg = mt_rand() % 11 + 1;

echo "
<div class = 'topmenu' align='right'>
<a href='index.php'>홈으로</a>";

if( isset($_SESSION['name']) ){

	//세션값 존재 할 경우.. 로그아웃과 구매내역 출력...
	echo " ㅣ ";
	echo "<a href='index.php?mode=loginRelation&menuIdentifier=로그아웃'>로그아웃</a>";
	echo " ㅣ ";
	echo "<a href='index.php?mode=loginRelation&menuIdentifier=구매내역'>구매내역</a>";

}else{

	//세션값 존재하지 않을 경우.. 로그인과 회원가입 출력...
	echo " ㅣ ";
	echo "<a href='index.php?mode=loginRelation&menuIdentifier=로그인'>로그인</a>";
	echo " ㅣ ";
	echo "<a href='index.php?mode=loginRelation&menuIdentifier=회원가입'>회원가입</a>";

}

echo "
</div>

<hr>
<a href='index.php'><img src='./img/main.jpg'><a>
<hr>
<!-- 최상단 메뉴 끝 -->";

?>