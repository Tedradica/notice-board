<style>
	


	.serviceoutside tr td table td{
	
		border: 1px solid black;
	
	}

	.serviceoutside tr td table:hover{
		border: 3px solid red;
		transition: all 0.1s;
	}

</style>

<?php 

require_once "./menu/servicedatabase.php";
$product = new returnCondition();

if( isset($_GET['menuIdentifier']) && $_GET['menuIdentifier'] == '애완동물 분양'){

	//분양 글 작성폼..
	
echo "
<table>
	<form method = 'POST' action = './menu/servicedatabase.php' enctype = 'multipart/form-data'>
	
	<input type='hidden' name='receiveForm'>
	
	<input type='hidden' name='productseller' value = '{$_SESSION['id']}'>
	
	
		<tr>
			<td>카테고리선택</td>
			<td><select name= 'productcategory'>
					<option>국산 강아지</option>
					<option>외국산 강아지</option>
					<option>Default Dog</option>
					<option>===========</option>
					<option>국산 고양이</option>
					<option>외국산 고양이</option>
					<option>Default Cat</option>
					<option>===========</option>
					<option>국산 도마뱀</option>
					<option>외국산 도마뱀</option>
					<option>Default Lizard</option>
					<option>===========</option>
					<option>국산 짹짹이</option>
					<option>외국산 짹짹이</option>
					<option>Default Bird</option>
				</select></td>
		</tr>

		<tr>
			<td>애완동물이름</td>
			<td><input type='text' name='productname' required></td>
		</tr>

		<tr>
			<td>분양가격</td>
			<td><input type='text' name='productprice' size = '4' required>\</td>
		</tr>

		<tr>
			<td>사진업로드</td>
			<td><input type='file' name='productimg'></td>
		</tr>

		<tr>
			<td>애완동물소개</td>
			<td><textarea name = 'productinfo' rows='18' cols='70'>::애완동물을 소개해주세요::</textarea></td>
		</tr>

		<tr>
			<td colspan = '2' align = 'right'>
				<input type = 'reset' value = '다시적기'>
				<input type = 'submit' value = '분양하기'>
			</td>
		</tr>

	</form>
</table>
";	

//=========================================================================================================
//=========================================================================================================
//=========================================================================================================
//=========================================================================================================

}else if( isset($_GET['menuIdentifier']) && $_GET['menuIdentifier'] == '애완동물명으로 검색'){

	//애완동물명으로 검색하는 Search 메뉴 
	echo "<table class = 'serviceoutside' align = 'center'><tr>";
	echo ( $product->returnProductName($_GET['searchvalue']));
	echo "</tr></table>";

}else if( isset($_GET['menuIdentifier']) && $_GET['menuIdentifier'] == '작성자명으로 검색'){

	//작성자명으로 검색하는 Search 메뉴
	echo "<table class = 'serviceoutside' align = 'center'><tr>";
	echo ( $product->returnProductSeller($_GET['searchvalue']) );
	echo "</tr></table>";

}else if( isset($_GET['menuIdentifier']) && $_GET['menuIdentifier'] == '상세보기'){
	
	
	//이미지를 누른경우, productnum을 가져와 제품 상세보기페이지 출력..
	echo "<div id = 'detailview' align = 'center'>";
	echo ( $product->detailview($_GET['productnum']) );
	echo "</div>";

}else if( isset($_GET['menuIdentifier']) && $_GET['menuIdentifier'] == '상품구매'){
	
	
	//상품 상세보기 페이지에서, 상품삭제 버튼을 누를시 실행..
	$product->buyProduct($_GET['productnum']);


}else if( isset($_GET['menuIdentifier']) && $_GET['menuIdentifier'] == '상품삭제'){
	
	//상품 상세보기 페이지에서, 상품삭제 버튼을 누를시 실행..
	$product->deleteProduct($_GET['productnum']);

}else if(isset($_GET['menuIdentifier'])){

	//menuIdentifier변수값은 있지만 위에서 식별이 되지않은 경우, 즉 카테고리를 누른 경우..
	echo "<table class = 'serviceoutside' align = 'center'><tr>";
	echo ($product->returnProductCategory($_GET['menuIdentifier']));
	echo "</tr></table>";

}else{

	//menuIdentifier변수값이 없는 경우, 최근 등록순으로 보여주기..
	echo "<table class = 'serviceoutside' align = 'center'><tr>";
	echo ( $product->returnProductOrderNew() );
	echo "</tr></table>";

}

?>

