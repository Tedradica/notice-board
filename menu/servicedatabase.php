<?php 

class returnCondition { 
	//조건 반환 클래스 생성..

	private $obj;

	function __construct() {

		require_once "./DB/DbManager.php";
		$this->obj = connect();

	}

	function returnProductName($argIdentifier) {

		//애완동물명
		$sql = "select * from productservice where productname like '%{$argIdentifier}%' order by productnum desc";

		//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
		$stt = $this->obj -> prepare($sql);
		
		//sql문을 실행하고 결과를 $result에 담음.. 값은 true or false로 나타남..
		$stt->execute();

		$line_enter = 0;
		$returnData = "";
		//실행된 쿼리 값이 있을 경우, if문을 실행하여 반환된 DB값을 세션변수에 대입..
		while( $row = $stt -> fetch(PDO::FETCH_ASSOC) ){

			if($line_enter % 4 == 0){

				$returnData .= "</tr><tr>";
			}

			$returnData .= "
			<td>
			<table>
			<tr><td>
					<a href='index.php?mode=categoryMenu&menuIdentifier=상세보기&productnum={$row['productnum']}'>
						<img src = '{$row['productimg']}' width = '200px' height = '200px'></td></tr>
					</a>
			<tr><td>이름 : {$row['productname']}</td></tr>
			<tr><td>분양가격 : {$row['productprice']}</td></tr>
			<tr><td>판매자 : {$row['productseller']}</td></tr>
			<tr><td>판매상태 : {$row['productstatus']}</td></tr>
			</table>
			</td>
			";

			$line_enter++;

		}if($line_enter == 0 || $argIdentifier == ""){

			$returnData = "<td>해당 이름의 애완동물은 존재하지않습니다.</td>";
		}

		return $returnData;

	}

	function returnProductSeller($argIdentifier) {

		//작성자명
		$sql = "select * from productservice where productseller like '%{$argIdentifier}%' order by productnum desc";

		//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
		$stt = $this->obj -> prepare($sql);
		
		//sql문을 실행하고 결과를 $result에 담음.. 값은 true or false로 나타남..
		$stt->execute();

		$line_enter = 0;
		$returnData = "";
		//실행된 쿼리 값이 있을 경우, if문을 실행하여 반환된 DB값을 세션변수에 대입..
		while( $row = $stt -> fetch(PDO::FETCH_ASSOC) ){

			if($line_enter % 4 == 0){

				$returnData .= "</tr><tr>";
			}

			$returnData .= "
			<td>
			<table>
			<tr><td>
					<a href='index.php?mode=categoryMenu&menuIdentifier=상세보기&productnum={$row['productnum']}'>
						<img src = '{$row['productimg']}' width = '200px' height = '200px'></td></tr>
					</a>
			<tr><td>이름 : {$row['productname']}</td></tr>
			<tr><td>분양가격 : {$row['productprice']}</td></tr>
			<tr><td>판매자 : {$row['productseller']}</td></tr>
			<tr><td>판매상태 : {$row['productstatus']}</td></tr>
			</table>
			</td>
			";

			$line_enter++;

		}if($line_enter == 0 || $argIdentifier == ""){

			$returnData = "<td>해당 작성자의 게시글은 존재하지않습니다.</td>";
		}

		return $returnData;

	}

	function returnProductCategory($argIdentifier) {

		//카테고리명
		$sql = "select * from productservice where productcategory = '{$argIdentifier}' order by productnum desc";

		//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
		$stt = $this->obj -> prepare($sql);
		
		//sql문을 실행하고 결과를 $result에 담음.. 값은 true or false로 나타남..
		$stt->execute();

		$line_enter = 0;
		$returnData = "";
		// 실행된 쿼리 값이 있을 경우, if문을 실행하여 반환된 DB값을 세션변수에 대입..
		while( $row = $stt -> fetch(PDO::FETCH_ASSOC) ){

			if($line_enter % 4 == 0){

				$returnData .= "</tr><tr>";
			}

			$returnData .= "
			<td>
			<table>
			<tr><td>
					<a href='index.php?mode=categoryMenu&menuIdentifier=상세보기&productnum={$row['productnum']}'>
						<img src = '{$row['productimg']}' width = '200px' height = '200px'></td></tr>
					</a>
			<tr><td>이름 : {$row['productname']}</td></tr>
			<tr><td>분양가격 : {$row['productprice']}</td></tr>
			<tr><td>판매자 : {$row['productseller']}</td></tr>
			<tr><td>판매상태 : {$row['productstatus']}</td></tr>
			</table>
			</td>
			";

			$line_enter++;

		}if($line_enter == 0){
			
			$returnData = "<td>아직 등록된 게시글이 없습니다.</td>";
		}

		return $returnData;

	}

	function returnProductOrderNew() {

		//최신순
		$sql = "select * from productservice order by productnum desc";

		//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
		$stt = $this->obj  -> prepare($sql);
		
		//sql문을 실행하고 결과를 $result에 담음.. 값은 true or false로 나타남..
		$stt->execute();

		$line_enter = 0;
		$returnData = "";
		//실행된 쿼리 값이 있을 경우, if문을 실행하여 반환된 DB값을 세션변수에 대입..
		while( $row = $stt -> fetch(PDO::FETCH_ASSOC) ){

			if($line_enter % 4 == 0){

				$returnData .= "</tr><tr>";
			}

			$returnData .= "
			<td>
			<table>
			<tr><td>
					<a href='index.php?mode=categoryMenu&menuIdentifier=상세보기&productnum={$row['productnum']}'>
						<img src = '{$row['productimg']}' width = '200px' height = '200px'></td></tr>
					</a>
			<tr><td>이름 : {$row['productname']}</td></tr>
			<tr><td>분양가격 : {$row['productprice']}</td></tr>
			<tr><td>판매자 : {$row['productseller']}</td></tr>
			<tr><td>판매상태 : {$row['productstatus']}</td></tr>
			</table>
			</td>
			";

			$line_enter++;

		}if($line_enter == 0){
			$returnData = "<td>아직 등록된 게시글이 없습니다.</td>";
		}

		return $returnData;

	}

	function detailview($argIdentifier) {

		//제품 상세보기..
		$sql = "select * from productservice where productnum = {$argIdentifier}";

		//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
		$stt = $this->obj  -> prepare($sql);
		
		//sql문을 실행한다.
		$stt->execute();
		$returnData = "";

		//실행된 쿼리 값이 있을 경우, if문을 실행하여 반환된 DB값을 세션변수에 대입..
		if($row = $stt -> fetch(PDO::FETCH_ASSOC)){

			$returnData .= "
			카테고리명 : {$row['productcategory']}<br>
			애완동물 이름 : {$row['productname']}<br>
			분양가격 : {$row['productprice']}<br>
			<img src={$row['productimg']} width = '350px'><br>
			<pre>{$row['productinfo']}</pre>
			{$row['productstatus']}<br><br>

			<form>";
				if($row['productstatus'] == "판매 중"){
					//아직 status변수에 판매중이라는 값이 있을 경우 구매버튼 출력..
					$returnData .= "<input type = 'button' onclick = 
						location.href='index.php?mode=categoryMenu&menuIdentifier=상품구매&productnum={$row['productnum']}' value = '구매하기'>&nbsp;";
				
				}
				if( isset($_SESSION['id']) && $_SESSION['id'] == $row['productseller']){
					//세션변수의 id와 반환된 DB값의 판매자가 동일한 경우 삭제버튼 출력..
					$returnData .= "<input type = 'button' onclick = 
						location.href='index.php?mode=categoryMenu&menuIdentifier=상품삭제&productnum={$row['productnum']}' value = '삭제하기'>";
				}
			$returnData .= "</form>";
		}

		return $returnData;
	}

	function buyProduct($argIdentifier) {

		//상품 구매..
		$sql = "update productservice set productstatus = '판매완료', 
				productbuyer = '{$_SESSION['id']}' where productnum = {$argIdentifier}";

		//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
		$stt = $this->obj  -> prepare($sql);
		
		if(isset($_SESSION['id'])){
		//sql문을 실행한다.
		$stt->execute();

		//판매완료 알림과 함께 메인페이지로 이동
		echo "<script>
			alert('애완동물을 분양받았습니다.');
			document.location.href='./index.php'
			</script>";
		}else{
			echo "<script>
			alert('로그인 후 이용해주세요');
			document.location.href='./index.php'
			</script>";
		}

	}

	function deleteProduct($argIdentifier) {

		//상품 삭제..
		$sql = "delete from productservice where productnum = {$argIdentifier}";

		//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
		$stt = $this->obj  -> prepare($sql);
		
		//sql문을 실행한다.
		$result = $stt->execute();

		//삭제완료 알림과 함께 메인페이지로 이동
		echo "<script>
			alert('게시글을 삭제했습니다.');
			document.location.href='./index.php'
			</script>";

	}

}

//---------------------------------------------------------------------------------------------------------

	if(isset($_POST['receiveForm'])){

		
		

			require_once "../DB/DbManager.php";
			$obj = connect();

			$dir = "./img/";
			$onlyFileName = basename($_FILES['productimg']['name']);
			$dir_name = $dir . basename($_FILES['productimg']['name']);
			$fileoverlap = false;
			
			$sql = "select productimg from productservice 
				where productimg like '%{$onlyFileName}%'";

			//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
			$stt = $obj -> prepare($sql);
			
			//sql문을 실행하고 결과를 $result에 담음.. 값은 true or false로 나타남..
			$stt->execute();

			//실행된 쿼리 값이 있을 경우, if문을 실행하여 반환된 파일명 변경..
			if( $row = $stt -> fetch(PDO::FETCH_ASSOC) && $onlyFileName != null )
			{
				//파일확장자명 추출..
				$fileIdenfify = substr($onlyFileName, -4);
				//파일명 + 랜덤값 + 확장자명 
				$onlyFileName = $onlyFileName . mt_rand() . $fileIdenfify; 
				$dir_name = $dir. $onlyFileName;

			}else if($onlyFileName == null){

				$dir_name = $dir."default.jpg";

			}

//---------------------------------------------------------------------------------------------------------

			

			//sql코드 입력..
			$sql = "insert into productservice (productcategory, productname, 
					productprice, productseller, productinfo, productimg) 
					
					values ('{$_POST['productcategory']}','{$_POST['productname']}'
					,{$_POST['productprice']}, '{$_POST['productseller']}', 
					'{$_POST['productinfo']}', '$dir_name')";

			//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
			$stt = $obj -> prepare($sql);

			//sql문을 실행하고 결과를 $result에 담음.. 값은 true or false로 나타남..
			$result = $stt->execute();

			

			if(isset($result) && $result){

				//파일을 서버에 올림..
				move_uploaded_file($_FILES['productimg']['tmp_name'], ".".$dir_name);
				
				echo "<script>
					alert('분양글을 등록했습니다');
					document.location.href='../index.php'
					</script>";
			}
		
	}

?>