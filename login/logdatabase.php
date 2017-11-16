<?php
		
		if( isset($_POST['logtype']) && $_POST['logtype'] == 'login'){
			session_start();
			//이 파일은 loginview의 파일에서 action으로 들어온 파일이기 때문에 .. index의 경로가 아닌, loginview의 경로에 따른다..

			require_once "../DB/DbManager.php";
			$obj = connect();
			

//-------------------------------------------------------------------------------------------------
	//로그인 페이지..

			$sql = "select * from userinformation 
					where id = '{$_POST['id']}' and password = '{$_POST['password']}'";

			//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
			$stt = $obj -> prepare($sql);
			
			//sql문을 실행하고 결과를 $result에 담음.. 값은 true or false로 나타남..
			$stt->execute();

			//실행된 쿼리 값이 있을 경우, if문을 실행하여 반환된 DB값을 세션변수에 대입..
			if( $row = $stt -> fetch(PDO::FETCH_ASSOC) ){

				$_SESSION['id'] 	= $row['id'];
				$_SESSION['name']	= $row['name'];
				$_SESSION['idtype']	= $row['idtype'];

				echo "<script>
					alert('환영합니다. {$_SESSION['name']}님');
					document.location.href='../index.php'
					</script>";
		}else{

			echo "<script>
				alert('아이디 또는 비밀번호 오류입니다.');
				document.location.href='../index.php?mode=loginRelation&menuIdentifier=로그인'
				</script>";

		}
		

	}else if(isset($_POST['logtype']) && $_POST['logtype'] == 'join'){
//-------------------------------------------------------------------------------------------------
		
		//회원가입 페이지 ..	
		require_once "../DB/DbManager.php";
		$obj = connect();

			//오류 발생시 오류 로그 출력후, Exception 처리..
			if($_POST['password1'] != $_POST['password2']){
				
				echo "<script>
					alert('비밀번호가 일치하지 않습니다.');
					document.location.href='../index.php?mode=loginRelation&menuIdentifier=회원가입'
					</script>";

			}else{

				

				//위의 오류 발생코드를 무사히 통과하게 되면 실행하게되는 코드.. POST로 받아온 변수값을 DB에 대입..
				$phone = $_POST['phone1'] . "-" . $_POST['phone2'] . "-" . $_POST['phone3']; 

				//sql코드 입력..
				$sql = "insert into userinformation (id, name, idtype, password, phone) 
				values ('{$_POST['id']}','{$_POST['name']}','{$_POST['idtype']}', '{$_POST['password1']}', '$phone')";

				//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
				$stt = $obj -> prepare($sql);

				//sql문을 실행하고 결과를 $result에 담음.. 값은 true or false로 나타남..
				$result = $stt->execute();

				var_dump($stt);

				if($result){
					echo "<script>
						alert('회원가입완료.');
						document.location.href='../index.php'
						</script>";
				}else{
					echo "<script>
						alert('중복되는 아이디가 존재합니다.');
						document.location.href='../index.php?mode=loginRelation&menuIdentifier=회원가입'
						</script>";
				}


			}
		
//-------------------------------------------------------------------------------------------------
	}else{

		require_once "./DB/DbManager.php";
		$obj = connect();
			
		$sql = "select * from productservice 
					where productbuyer = '{$_SESSION['id']}'";

		//sql코드를 실행 가능하도록 prepare시킨뒤, $stt변수에 넣음..
		$stt = $obj -> prepare($sql);
		
		//sql문을 실행하고 결과를 $result에 담음.. 값은 true or false로 나타남..
		$stt->execute();
		$buycount = 0;
		//실행된 쿼리 값이 있을 경우, if문을 실행하여 반환된 DB값을 세션변수에 대입..
		while( $row = $stt -> fetch(PDO::FETCH_ASSOC) ){

			echo "<img src='{$row['productimg']}' width='70px'>
				{$row['productname']}(을/를) 구매했습니다.<br>";

			$buycount++;

		}
		if($buycount == 0){

			echo "아직 분양받은 애완동물이 없어요";

		}

	}

?>
