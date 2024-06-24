<?php //include("funcoes.php");
	include("conexao.php"); 
//criando a query de consulta ao status em atendimento que é igual a 2
$atual= mysqli_query($conn, "SELECT  senhaAtende  FROM atende  WHERE statusAtende=2") or die( 
  mysqli_error($cx) //caso haja um erro na consulta 
);

//criando a query de consulta ao status de aguardando que é igual a 1
$aguardando= mysqli_query($conn, "SELECT  senhaAtende  FROM atende  WHERE statusAtende=1") or die( 
  mysqli_error($cx) //caso haja um erro na consulta 
);

//criando a query de consulta ao status de atendido que é igual a 3
$atendido= mysqli_query($conn, "SELECT  senhaAtende  FROM atende  WHERE statusAtende=3") or die( 
  mysqli_error($cx) //caso haja um erro na consulta 
);

?>

<!DOCTYPE html>
<html>
	<head>
	<title>TELÃO</title>
	<link rel="stylesheet" type="text/css" href="_css/estilo.css">
	<link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
	<meta charset="utf-8">	

	</head>
<!-- exibe qual a próxima senha a ser chamada, além de exibir a senha do
atendimento atual e a senha do atendimento anterior;
Essa página deverá ser atualizada a cada 3 segundos.
 -->
	<body>
		<div id="conteudo_telao" >
			<div id="tela_senha">
				<?php
				
					if($aux = mysqli_fetch_assoc($atual)){
						echo "SENHA<br>";
						echo $aux["senhaAtende"];
					}else{echo "SENHA <br>";}
							
				?>					
			</div>
			<div id="tela_chamadas">
				<?php
				echo "CHAMADAS<br>";
					for ($aux=0; $aux < $atendido ; $aux++) { 
							$aux = mysqli_fetch_assoc($atendido); 

							echo $aux["senhaAtende"]."<br>";
						}	
					
				?>
			</div>

			<div id="tela_prox">
				<?php
				echo "PRÓXIMAS<br>";
					for ($aux=0; $aux < $aguardando ; $aux++) { 
						
						$aux = mysqli_fetch_assoc($aguardando);
								
								echo $aux["senhaAtende"]."<br>";
					}
				?>
			</div>

			<button class="botao" onclick="window.location.href='index.php'">Voltar</button>
			<button class="botao" onclick="window.location.href='chamar.php?retorno=telao'">Chamar Próximo</button>
	</body>
</html>
