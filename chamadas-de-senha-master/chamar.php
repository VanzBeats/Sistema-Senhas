<?php 

include("conexao.php"); 

//criando a query de consulta ao status em atendimento que é igual a 2
$teste1= mysqli_query(
	$conn, "UPDATE atende  SET statusAtende=3 WHERE statusAtende=2 ORDER BY codAtende ASC LIMIT 1" 	);

$teste2= mysqli_query(
	$conn, "UPDATE atende  SET statusAtende=2 WHERE statusAtende=1  LIMIT 1 ");

//determina q pag retornara para pagina de origem
if ($_GET['retorno'] == 'atendente' ) {
	header("Location: chamaatendimento.php");
}else{
	header("Location: statusatendimento.php");
}
		

?>