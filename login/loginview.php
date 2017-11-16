<?php

//menuIdentifier로 어떤 코드를 실행할지 판단하여 실행하고, 판단된 코드 안에서는 hiddentype로 logdatabase파일에서 어떤 코드를 실행할지 loginIdentifier의 변수를 POST방식으로 보낸다. 

if($_GET['menuIdentifier'] == '로그인'){

echo"

		<table align = 'center'>
			<!-- 이 파일은 index의 경로에서 require된 파일이기 때문에 .. 현재 파일의 경로가 아닌, index의 경로에
			따른다.. -->
			<form method='POST' action='./login/logdatabase.php'>
			<input type = 'hidden' name = 'logtype' value = 'login'>
				<tr>
					<td>
						* 아이디
					</td>

					<td>
						<input type = 'text' name = 'id' required>
					</td>
				</tr>

				<tr>
					<td>
						* 비밀번호
					</td>

					<td>
						<input type = 'password' name = 'password' required>
					</td>
				</tr>

				<tr>
					<td colspan='2' align='center'>
						<input type='submit' value = '로그인'>
						<input type='button' 
						
						onclick = 
						location.href='index.php?mode=loginRelation&menuIdentifier=회원가입'

						value = '회원가입'>
					</td>
				</tr>

			</form>
		</table>
	";

}else if($_GET['menuIdentifier'] == '로그아웃'){

	session_destroy();

		echo "<script>
			alert('로그아웃 했습니다.');
			document.location.href='index.php'
			</script>";

}else if($_GET['menuIdentifier'] == '회원가입'){

	echo "
	
		<table align = 'center'>
			<!-- 이 파일은 index의 경로에서 require된 파일이기 때문에 .. 현재 파일의 경로가 아닌, index의 경로에 따른다.. -->
			<form method='POST' action='./login/logdatabase.php'>
			<input type = 'hidden' name = 'logtype' value = 'join'>
				<tr>

					<td>* 아이디</td> 
					<td> 
						<input type='text' name='id' required> 
					</td>

				</tr>

				<tr>

					<td>* 이름</td> 
					<td> 
						<input type='text' name='name' required> 
					</td>

				</tr>

				<tr>

					<td>* 계정타입</td> 
					<td> 
						<input type='radio' name='idtype' value='buyer' checked='checked'>구매자
						<input type='radio' name='idtype' value='seller'>판매자
					</td>

				</tr>

				<tr>
					<td>* 비밀번호</td> 
					<td> 
						<input type='password' name='password1' required> 
					</td>
				</tr>

				<tr>

					<td>* 비밀번호 확인</td> 
					<td> 
						<input type='password' name='password2' required> 
					</td>

				</tr>

				<tr>

					<td>* 휴대폰 번호</td> 
					<td> <select name = 'phone1'>
							<option>010</option>
							<option>011</option>
							<option>016</option>	
						 </select> -

						 <input type='text' name='phone2' size='2' maxlength='4'>-
						 <input type='text' name='phone3' size='2' maxlength='4'>

					</td>

				</tr>
				<tr>
					<td colspan='2' align='center'>
						<input type='submit'>
						<input type='reset'>
					</td>
				</tr>
			</form>

		</table>
	";

}else if($_GET['menuIdentifier'] == '구매내역'){
	echo "<div align = 'center'>";
	require_once "logdatabase.php";
	echo "</div>";
}