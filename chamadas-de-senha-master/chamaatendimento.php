<?php 
include("conexao.php"); 

// Criando a query de consulta ao status de atendimento 
$status = mysqli_query($conn, "SELECT * FROM atende") or die(mysqli_error($cx));

?>

<!DOCTYPE html>
<html>
<head>
    <title>Atendente</title>
    <link rel="stylesheet" type="text/css" href="./css/chamaatendimento.css">
    <meta charset="utf-8">
</head>

<body>
    <div class="tabela" align='center'>
        <h1>Atendente</h1>
        <table>
            <thead>
                <tr>
                    <th>Na fila</th>
                    <th>Em atendimento</th>
                    <th>Finalizado</th>
                </tr>
            </thead>

            <tbody>
                <?php
                // Percorrendo os registros da consulta
                while ($aux = mysqli_fetch_assoc($status)) {
                    echo "<tr>";
                    echo "<td>";
                    if ($aux["statusAtende"] == 1) {
                        // Verifica se a senha tem 3 caracteres para determinar se é preferencial
                        if (strlen($aux["senhaAtende"]) === 3) {
                            echo $aux["senhaAtende"] . "P"; // Adiciona 'P' ao final das senhas com 3 caracteres
                        } else {
                            echo $aux["senhaAtende"]; // Senhas com 4 caracteres, exibe sem alterações
                        }
                    } else {
                        echo "&nbsp;"; // Caso não haja senha na fila
                    }
                    echo "</td>";
                    echo "<td>";
                    if ($aux["statusAtende"] == 2) {
                        echo $aux["senhaAtende"] ;
                    } else {
                        echo "&nbsp;"; // Caso não esteja em atendimento
                    }
                    echo "</td>";
                    echo "<td>";
                    if ($aux["statusAtende"] == 3) {
                        echo $aux["senhaAtende"] ;
                    } else {
                        echo "&nbsp;"; // Caso não esteja finalizado
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br><br>
        <button class="botao" onclick="window.location.href='index.php'">Voltar</button>
        <button class="botao" onclick="window.location.href='chamar.php?retorno=atendente'">Chamar Próximo</button>
        <button class="botao" onclick="window.location.href='limpar.php'">Limpar Atendimentos</button>
    </div>
</body>
</html>
