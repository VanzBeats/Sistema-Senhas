<?php 
	include("conexao.php"); 

?>
<!DOCTYPE html>
<html>

<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<meta charset="utf-8">

</head>

<body>

	<div class="title-container">
		<h1>SISTEMA DE ATENDIMENTO</h1>
	</div>
	
	<div class="main-container">

		<div class="btn-container">
			<button class="custom-btn btn-5" onclick="window.location.href='adquireatendimento.php'">MODO USUÁRIO</button><br><br>
			<button class="custom-btn btn-5" onclick="window.location.href='statusatendimento.php'">MODO TELÃO</button><br><br>
			<button class="custom-btn btn-5" onclick="window.location.href='chamaatendimento.php'">MODO ATENDENTE</button><br>
		</div>

	</div>

</body>

</html>