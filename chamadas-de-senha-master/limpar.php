<?php
include("conexao.php");

$tipo = $_GET['tipo'];

if ($tipo == 'preferencial') {
    // Limpar atendimentos preferenciais
    $limpar = mysqli_query($conn, "DELETE FROM atende WHERE LENGTH(senhaAtende) = 3");
} else if ($tipo == 'normal') {
    // Limpar atendimentos normais
    $limpar = mysqli_query($conn, "DELETE FROM atende WHERE LENGTH(senhaAtende) != 3");
}

echo 'Success';
?>
