<?php 

include("conexao.php"); 
 

 $limpar= mysqli_query($conn, "TRUNCATE TABLE  atende ") or die( 
  mysqli_error($cx) );//caso haja um erro na consulta 

			

if (mysqli_query($conn, $sql)) {
    echo "limpo com sucesso";
    header("Location: chamaatendimento.php");


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>