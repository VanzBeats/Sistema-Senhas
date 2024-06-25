<?php 
include("conexao.php"); 

$tipo = $_GET['tipo'];

if ($tipo == 'preferencial') {
    // Chama próxima senha preferencial (comprimento da senha é 3)
    $teste1 = mysqli_query(
        $conn, "UPDATE atende SET statusAtende=3 WHERE statusAtende=2 AND LENGTH(senhaAtende)=3 ORDER BY codAtende ASC LIMIT 1"
    );

    $teste2 = mysqli_query(
        $conn, "UPDATE atende SET statusAtende=2 WHERE statusAtende=1 AND LENGTH(senhaAtende)=3 ORDER BY codAtende ASC LIMIT 1"
    );
} else if ($tipo == 'normal') {
    // Chama próxima senha normal (comprimento da senha é diferente de 3)
    $teste1 = mysqli_query(
        $conn, "UPDATE atende SET statusAtende=3 WHERE statusAtende=2 AND LENGTH(senhaAtende)!=3 ORDER BY codAtende ASC LIMIT 1"
    );

    $teste2 = mysqli_query(
        $conn, "UPDATE atende SET statusAtende=2 WHERE statusAtende=1 AND LENGTH(senhaAtende)!=3 ORDER BY codAtende ASC LIMIT 1"
    );
}

echo 'Success';
?>
