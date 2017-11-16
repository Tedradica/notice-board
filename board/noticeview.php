<style>

	.title {
		color : black;
		text-decoration: none;
		font-size: 20px;
		font-weight:bold;
	}

</style>
<?php
//-------------------------------

	//데이터 베이스 삽입 ..
	require_once "./board/noticedatabase.php";
	$noticeReference = new returnNoticeCondition();

if (isset($_GET['menuIdentifier']) && $_GET['menuIdentifier'] == '자유게시판 글작성'){

	date_default_timezone_set('Asia/Seoul');
	$time = date("Y-m-d H:i:s");
	$noticeWirter = isset($_SESSION['id'])? $_SESSION['id'] : 'GUEST';
	echo "

	<form method = 'POST' action = './board/noticedatabase.php' enctype = 'multipart/form-data'>
		<input type='hidden' name='createNotice'>
		<input type='hidden' name='noticeWirter' value = '$noticeWirter'>
		<input type='hidden' name='noticetime' value='$time'>
		<table align = 'center'>
			<tr><td>제목</td><td><input type='text' name='noticetitle' size = '50' required></td></tr>
			<tr><td>파일</td><td><input type='file' name='noticefile'></td></tr>
			<tr><td>내용</td><td><textarea name = 'noticeinfo' rows='15' cols='70' required></textarea></td></tr>
			<tr><td colspan='2' align = 'right'><input type='submit' value = '글올리기'>&nbsp;<input type='reset' value='다시쓰기'</td></tr>
		</table>
	</form>";
}else if ( isset($_GET['menuIdentifier']) && $_GET['menuIdentifier'] == '상세보기'){
//-------------------------------

	//증가한번 시키고..
	//게시글 보기..
	//db접속후 레코드 가져오기..
	$noticeReference->updateNotice($_GET['noticenum']);
	echo $noticeReference->viewNotice($_GET['noticenum']);
 

}else if ( isset($_GET['menuIdentifier']) && $_GET['menuIdentifier'] == '삭제하기'){
//-------------------------------

	//증가한번 시키고..
	//게시글 보기..
	//db접속후 레코드 가져오기..
	//$noticeReference->updateNotice($_GET['noticenum']);\

	$noticeReference->deleteNotice($_GET['noticenum']);
	echo "<script>
		alert('삭제 완료');
		document.location.href='./index.php?mode=serviceMenu&menuIdentifier=자유게시판'
		</script>";

}else{
//-------------------------------
//게시글 목록  출력 ..
	echo "
	<table width = '90%' align = 'center'>
		<tr align = 'center'>
			<td>글번호</td>
			<td width = '50%'>제목</td>
			<td>작성자</td>
			<td>작성시간</td>
			<td>조회수</td>
		</tr>";
		
	echo $noticeReference->returnNotice();

	echo"		
	<!-- 데이터 베이스를 통해 레코드 가져오기 .. -->
	</table>
	<div align = 'right'>
	<input type='button' onclick = location.href='index.php?mode=serviceMenu&menuIdentifier=자유게시판%20글작성' value = '게시글 작성' >
	</div>
	";
}

//-------------------------------
?>