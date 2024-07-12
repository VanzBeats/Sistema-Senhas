<?php 
include("conexao.php");

// Verifica se há algum tipo de senha a ser chamada 
if (isset($_GET['tipo'])) { 
    $tipo = $_GET['tipo'];
    // Consulta para obter a próxima senha disponível
    $query = "SELECT * FROM atende WHERE statusAtende IN (1,2) ORDER BY codAtende ASC LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $senhaId = $row['codAtende'];
        $statusAtual = $row['statusAtende'];

        // Verifica e atualiza o status da senha
        if ($statusAtual == 1) {
            // Se estiver aguardando, muda para "em atendimento" (2)
            $updateQuery = "UPDATE atende SET statusAtende = 2 WHERE codAtende = $senhaId";
        } else if ($statusAtual == 2) {
            // Se estiver em atendimento, muda para "finalizado" (3)
            $updateQuery = "UPDATE atende SET statusAtende = 3 WHERE codAtende = $senhaId"; 
        }   

        mysqli_query($conn, $updateQuery);
    } else {
        echo 'Nenhuma senha disponível para chamar';
    }
} else { 
    echo 'Parâmetros inválidos'; 
}

mysqli_close($conn);
?>