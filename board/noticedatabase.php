<?php 

class returnNoticeCondition {

	private $obj;

	function __construct() {

		require_once "./DB/DbManager.php";
		$this->obj = connect();

	}

	function returnNotice(){

		$sql = "select * from noticeservice order by noticenum desc";

		//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
		$stt = $this->obj -> prepare($sql);
		
		//sql문을 실행하고 결과를 $result에 담음.. 값은 true or false로 나타남..
		$stt->execute();
		$returnData = "";
		while( $row = $stt -> fetch(PDO::FETCH_ASSOC) ){

			$returnData .=
			"<tr align = 'center'>
				<td>{$row['noticenum']}</td>
				<td><a class = 'title' href = 'index.php?mode=serviceMenu&menuIdentifier=상세보기&noticenum={$row['noticenum']}'>{$row['noticetitle']}</a></td>
				<td>{$row['noticeid']}</td>
				<td>{$row['noticetime']}</td>
				<td>{$row['noticehit']}</td>
			</tr>";

		}

		return $returnData;
	} 

	function updateNotice($argIdentifier){
		
		$sql = "update noticeservice set noticehit = noticehit + 1 where noticenum = {$argIdentifier}";

		//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
		$stt = $this->obj -> prepare($sql);
		
		//sql문을 실행하고 결과를 $result에 담음.. 값은 true or false로 나타남..
		$stt->execute();

	}

	function deleteNotice($argIdentifier){
		
		$sql = "delete from noticeservice where noticenum = {$argIdentifier}";

		//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
		$stt = $this->obj -> prepare($sql);
		
		//sql문을 실행하고 결과를 $result에 담음.. 값은 true or false로 나타남..
		$stt->execute();

	}

	function viewNotice($argIdentifier){

		$sql = "select * from noticeservice where noticenum = {$argIdentifier}";

		//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
		$stt = $this->obj -> prepare($sql);
		
		//sql문을 실행하고 결과를 $result에 담음.. 값은 true or false로 나타남..
		$stt->execute();
		$returnData = "";
		if( $row = $stt -> fetch(PDO::FETCH_ASSOC) ){

			$returnData .=
			"
			<form method = 'POST' action = './board/filedownload.php'>
			<table align = 'center'>
			<tr><td>제목 :</td><td>{$row['noticetitle']}</td></tr>
			<tr><td>파일다운로드 :</td><td>
								<img src = '{$row['noticefile']}' width = '50px'>
								<input type = 'hidden' name = 'filepath' value = '{$row['noticefile']}'>
								<input type = 'submit' value = '다운로드'>
								</td></tr>
			<tr><td>내용 : </td><td><pre>{$row['noticeinfo']}</pre></td></tr>
			</table>
			</form>
			";
								

				
				
					$returnData .= "
					<div align = 'center'><input type = 'button' onclick = document.location.href='index.php?mode=serviceMenu' value = '목록보기'> &nbsp;";
					if( (isset($_SESSION['id']) && $_SESSION['id'] == $row['noticeid']) || $row['noticeid'] == 'GUEST'){
					$returnData .= "<input type = 'button' onclick = document.location.href='index.php?mode=serviceMenu&menuIdentifier=삭제하기&noticenum={$row['noticenum']}' value = '삭제하기'></div>";
				}
			

		}

		return $returnData;

	}

}


if( isset($_POST['createNotice']) ) {
	session_start();

	require_once "../DB/DbManager.php";
	$obj = connect();

	$dir = "./file/";
	$onlyFileName = basename($_FILES['noticefile']['name']);
	$dir_name = $dir . basename($_FILES['noticefile']['name']);
	$fileoverlap = false;

	$sql = "select noticefile from noticeservice 
		where noticefile like '%{$onlyFileName}%'";

	//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
	$stt = $obj -> prepare($sql);
	
	//sql문을 실행하고 결과를 $result에 담음.. 값은 true or false로 나타남..
	$stt->execute();

	//실행된 쿼리 값이 있을 경우, if문을 실행하여 반환된 DB값을 세션변수에 대입..
	if( $row = $stt -> fetch(PDO::FETCH_ASSOC) && $onlyFileName != null )
	{
		//파일명이 겹칠 경우 실행하지 않음..
		$fileoverlap = true;

	}

	if($fileoverlap == false) {

		//sql코드 입력..
		$sql = "insert into noticeservice (noticetitle, noticeid, noticefile, noticeinfo, noticetime) 
				
			values ('{$_POST['noticetitle']}', '{$_POST['noticeWirter']}', '{$dir_name}', 
			'{$_POST['noticeinfo']}', '{$_POST['noticetime']}')";

		//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
		$stt = $obj -> prepare($sql);

		//sql문을 실행하고 결과를 $result에 담음.. 값은 true or false로 나타남..
		$result = $stt->execute();

		if($result){
		
			move_uploaded_file($_FILES['noticefile']['tmp_name'], ".".$dir_name);
			echo "<script>
			alert('게시글을 등록했습니다');
			document.location.href='../index.php?mode=serviceMenu&menuIdentifier=자유게시판'
			</script>";

		}else{
			
			//파일명이 겹칠경우.. 실행하지 않고 되돌려 보냄..
			echo "<script>
			alert('파일명을 바꿔주세요.');
			document.location.href='../index.php?mode=serviceMenu&menuIdentifier=자유게시판%20글작성'
			</script>";

		}
	}
	
}
?>