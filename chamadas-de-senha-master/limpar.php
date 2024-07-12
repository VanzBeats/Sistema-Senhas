<?php
include("conexao.php");

$limpar = mysqli_query($conn, "DELETE FROM atende WHERE statusAtende = 3 AND LENGTH(senhaAtende) != 3");

if ($limpar) {
    echo 'Success';
} else {
    echo 'Erro ao limpar atendimentos.';
}
?>
