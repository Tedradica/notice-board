<!-- 메인페이지 메뉴 및 보여주는 부분.. -->

	<table width='1250px' align='center'>
		
		<tr>
			<td  colspan = '3' align = 'right'>
				<form method = 'GET' action = ''>
					
					검색
						<select name = 'menuIdentifier'>
							<option value = '애완동물명으로 검색'>애완동물명</option>
							<option value = '작성자명으로 검색'>작성자</option>	
						</select>
						<input type = 'text' name = 'searchvalue' size='13'>
						<input type = 'submit' value = '검색'>
				</form>
			</td>
		</tr>
		
		<tr>
			<td align = 'center'>

<!--===========================================================================================================
===========================================================================================================
===========================================================================================================
===========================================================================================================-->
			
<?php
			if( isset($_SESSION['name']) ){
			//세션값으로 로그인 했는지 안했는지를 판단한 뒤, 
			//로그인을 했으면 이름출력 로그인 하지 않았을 경우 로그인을 요구하는 문구출력

				echo "{$_SESSION['name']}님 환영합니다.";

			}else{

				echo "로그인 해주세요!";

			}

?>

			</td>
			
			<td width='20px'>
				<!-- 메뉴와 게시글을 보여주는 창을 구분하기위해 보이지 않는 테이블 삽입.. -->
			</td>
			
			<td align = 'center'>

			<!-- 상단 헤더메뉴(현재 어떤게시판의 내용을 출력하고있는지 보여주는 값).. menuIdentifier(메뉴 식별자)값이 있을 경우
			변수값을 메뉴식별자로 출력.. 그렇지 않을 경우 최근 등록된 상품 출력.. -->
<?php
			$headerMenu = isset($_GET['menuIdentifier']) ? 
						  $_GET['menuIdentifier'] : "최근 등록된 상품";

			echo "<h2>▶$headerMenu</h2>";
?>
			</td>
		</tr>

		<tr>
			
			<td width='200px' align = 'center' valign='top' >

				<!-- <<상단메뉴(categoryMenu)>> :: 카테고리를 테이블로 출력 -->
				
				<div class = 'categorytable'><table> 

					<tr class='category'>
						<td>
							Category
						</td>
					</tr>

					<tr>
						<td>
							개과
								<ul>
									<li>
										<a href='index.php?mode=categoryMenu&menuIdentifier=국산 강아지'>
										국산 강아지
										</a>
									</li>

									<li>
										<a href='index.php?mode=categoryMenu&menuIdentifier=외국산 강아지'>
										외국산 강아지
										</a>
									</li>

									<li>
										<a href='index.php?mode=categoryMenu&menuIdentifier=Default Dog'>
										Default Dog
										</a>
									</li>
								</ul>
						</td>
					</tr>

					<tr>
						<td>
							고양이과
								<ul>
									<li>
										<a href='index.php?mode=categoryMenu&menuIdentifier=국산 고양이'>
										국산 고양이
										</a>
									</li>

									<li>
										<a href='index.php?mode=categoryMenu&menuIdentifier=외국산 고양이'>
										외국산 고양이
										</a>
									</li>

									<li>
										<a href='index.php?mode=categoryMenu&menuIdentifier=Default Cat'>
										Default Cat
										</a>
									</li>
								</ul>
						</td>
					</tr>

					<tr>
						<td>
							도마뱀
								<ul>
									<li>
										<a href='index.php?mode=categoryMenu&menuIdentifier=국산 도마뱀'>
										국산 도마뱀
										</a>
									</li>

									<li>
										<a href='index.php?mode=categoryMenu&menuIdentifier=외국산 도마뱀'>
										외국산 도마뱀
										</a>
									</li>

									<li>
										<a href='index.php?mode=categoryMenu&menuIdentifier=Default Lizard'>
										Default Lizard
										</a>
									</li>
								</ul>
						</td>
					</tr>

					<tr>
						<td>
							조류과
								<ul>
									<li>
										<a href='index.php?mode=categoryMenu&menuIdentifier=국산 짹짹이'>
										국산 짹짹이
										</a>
									</li>

									<li>
										<a href='index.php?mode=categoryMenu&menuIdentifier=외국산 짹짹이'>
										외국산 짹짹이
										</a>
									</li>

									<li>
										<a href='index.php?mode=categoryMenu&menuIdentifier=Default Bird'>
										Default Bird
										</a>
									</li>
								</ul>
						</td>
					</tr>

				</table>
				</div>
				<hr>

<!--===========================================================================================================
===========================================================================================================
===========================================================================================================
===========================================================================================================-->


				<!-- <<하단메뉴(serviceMenu)>> :: 카테고리를 테이블로 출력 -->
				<div class = 'categorytable'>
				<table> 

					<tr class = 'category'>
						<td>
							ServiceMenu
						</td>
					</tr>

					<tr>
						<td>
							<a href='index.php?mode=serviceMenu&menuIdentifier=자유게시판'>
							자유게시판</a>
						</td>
					</tr>

				</table>
				</div>
			</td>

			<td>
			</td>

<?php
		echo" <td height = '400px'> <div border='1px solid black' align='right' valign='top'><img src='./img/시바{$randimg}.jpg' width='90px'></div>";
?>
<!--===========================================================================================================
===========================================================================================================
===========================================================================================================
===========================================================================================================-->
<?php
			//GET변수에 값이있고, 그 값을 식별해서 페이지를 require시켜 출력 해준다. 
			if( isset($_GET['mode']) && $_GET['mode'] == "loginRelation" ){

				//<<로그인관련>>
				//로그인 
				//로그아웃
				//회원가입				
				//구매내역

				require_once "./login/loginview.php";

			}else if( isset($_GET['mode']) && $_GET['mode'] == "categoryMenu" ){

				//<<하단관련>>
				//카테고리 메뉴 출력
				//echo "<script>location.href='index.php/menu/servicedatabase.php?mode={$_GET['mode']}&menuIdentifier={$_GET['menuIdentifier']}';</script>"; 
				//게시글올리기
				require_once "./menu/serviceview.php";
				//게시글삭제

			}else if( isset($_GET['mode']) && $_GET['mode'] == "serviceMenu" ){

				//<<하단메뉴관련>>
				//카테고리 메뉴 출력
				//게시글올리기
				//게시글삭제
				require_once "./board/noticeview.php";

			}else{
				
				//<<GET[mode]값이 없을 경우 기본 default 메뉴 출력>>
				//최근 게시물 출력..
				//이름로 찾기..
				//품종으로 찾기..
				require_once "./menu/serviceview.php";

			}$randimg = mt_rand() % 11 + 1;
?>
<!--===========================================================================================================
===========================================================================================================
===========================================================================================================
===========================================================================================================-->
<?php
echo "<div border='1px solid black' align='left' valign='bottom'><img src='./img/시바{$randimg}.jpg' width='150px'></div>";
?>
			</td>
		</tr>

		<tr>
			<td></td>

			<td></td>

			<td align = 'right'>
<?php
			//세션값을 판단한 뒤, 
			//판매자일 경우 글쓰기가 가능, 판매자가 아닐 경우 불가능하다는 문구 출력..if( isset($_SESSION['name']) ){

			if( isset($_SESSION['idtype']) == "seller" ){
				
				
				echo "<div class='topmenu'><a href='index.php?mode=categoryMenu&menuIdentifier=애완동물 분양'>
					[애완동물 분양시키기]</a></div>";

			}else{

				//세션값 idtype가 구매자 일 경우 경우, 세션값이 없을 경우.. 판매자일 경우 글입력 가능
				print "애완동물 분양은 판매자 계정으로 로그인 할 경우만 가능합니다.";

			}
?>

			</td>

		</tr>

	</table>
<!-- 메인페이지 메뉴 및 보여주는 부분 끝.. -->
