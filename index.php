<!DOCTYPE html>
<html>
<head>
<title>Petto Motto</title>
<style>
	.topmenu a{
			color : black;
			text-decoration: none;
		}
		.topmenu a:hover{
			font-size: 20px;
			font-weight:bold;
			color : red;
			transition: all 0.1s;
		
		}

		.categorytable table {
			font-weight:bold;
			font-size: 20px;
			width: 100%;
			text-align: center;
		}
		.categorytable table ul{
			margin: 0;
			padding:0;
		}
		.categorytable li{
			display: none;
			list-style:none;
		}
		.categorytable td:hover li{
			display: block;
			list-style:none;
		}
		.categorytable tr:hover{
			cursor: default;
			background-color: rgb(100,100,100);
			color: white;
			transition: all 1s;
			
		}
		.categorytable li:hover{
			background-color: red;
			transition: all 0.3s;
		}
		.categorytable a{
			text-decoration: none;
			color: black;
		}
</style>
</head>
<body>
<?php

require_once "topmain.php";


require_once "bottommain.php";
?>

</body>
</html>
