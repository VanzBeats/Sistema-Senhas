<?php
include("conexao.php");

$tipo = $_GET['tipo'];

if ($tipo == 'all') {
    // Consulta para todas as senhas
    $status_query = mysqli_query($conn, "SELECT * FROM atende") or die(mysqli_error($conn));

    $senhas_normais = array();
    $senhas_preferenciais = array();

    while ($aux = mysqli_fetch_assoc($status_query)) {
        if (strpos($aux["senhaAtende"], 'P')!== false) {
            $senhas_preferenciais[] = $aux;
        } else {
            $senhas_normais[] = $aux;
        }
    }

    $senhas_ordenadas = array();

    while (count($senhas_normais) > 0 || count($senhas_preferenciais) > 0) {
        if (count($senhas_normais) > 0) {
            $senhas_ordenadas[] = array_shift($senhas_normais);
        }
        if (count($senhas_normais) > 0) {
            $senhas_ordenadas[] = array_shift($senhas_normais);
        }
        if (count($senhas_preferenciais) > 0) {
            $senhas_ordenadas[] = array_shift($senhas_preferenciais);
        }
    }

    // Inverter a ordem das senhas
    $senhas_ordenadas = array_reverse($senhas_ordenadas);

    foreach ($senhas_ordenadas as $senha) {
        echo "<tr>";
        echo "<td>". $senha["senhaAtende"]. "</td>";
        echo "<td>";
        if ($senha["statusAtende"] == 1) {
            echo "Aguardando";
        } elseif ($senha["statusAtende"] == 2) {
            echo "Em atendimento";
        } elseif ($senha["statusAtende"] == 3) {
            echo "Finalizado";
        } else {
            echo "";
        }
        echo "</td>";
        echo "<td>". ($senha["senhaAtende"][strlen($senha["senhaAtende"]) - 1] == 'P'? "Guichê 01" : "Guichê 02"). "</td>";
        echo "</tr>";
    }

    if (count($senhas_ordenadas) == 0) {
        echo "<tr><td colspan='3'>Nenhum dado encontrado.</td></tr>";
    }
}
?>