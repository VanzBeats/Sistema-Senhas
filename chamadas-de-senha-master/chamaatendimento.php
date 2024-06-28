<?php 
include("conexao.php"); 

// Criando a query de consulta ao status de atendimento 
$status = mysqli_query($conn, "SELECT * FROM atende") or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Atendente</title>
    <link rel="stylesheet" type="text/css" href="./css/chamaatendimento.css">
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function mostrarTabela(tipo) {
            if (tipo === 'preferencial') {
                document.getElementById('tabelaPreferencial').style.display = 'block';
                document.getElementById('tabelaNormal').style.display = 'none';
                document.getElementById('botoesPrincipais').style.display = 'none';
                document.getElementById('botoesPreferencial').style.display = 'block';
                document.getElementById('botoesNormal').style.display = 'none';
            } else if (tipo === 'normal') {
                document.getElementById('tabelaPreferencial').style.display = 'none';
                document.getElementById('tabelaNormal').style.display = 'block';
                document.getElementById('botoesPrincipais').style.display = 'none';
                document.getElementById('botoesPreferencial').style.display = 'none';
                document.getElementById('botoesNormal').style.display = 'block';
            }
        }

        function voltar() {
            document.getElementById('tabelaPreferencial').style.display = 'none';
            document.getElementById('tabelaNormal').style.display = 'none';
            document.getElementById('botoesPrincipais').style.display = 'block';
            document.getElementById('botoesPreferencial').style.display = 'none';
            document.getElementById('botoesNormal').style.display = 'none';
        }

        function chamarProximo(tipo) {
            $.ajax({
                url: 'chamar.php',
                type: 'GET',
                data: { tipo: tipo },
                success: function() {
                    atualizarTabela(tipo);
                }
            });
        }

        function limparAtendimentos(tipo) {
            $.ajax({
                url: 'limpar.php',
                type: 'GET',
                data: { tipo: tipo },
                success: function() {
                    atualizarTabela(tipo);
                }
            });
        }

        function atualizarTabela(tipo) {
            $.ajax({
                url: 'atualizar_tabela.php',
                type: 'GET',
                data: { tipo: tipo },
                success: function(data) {
                    if (tipo === 'preferencial') {
                        $('#tabelaPreferencial tbody').html(data);
                    } else if (tipo === 'normal') {
                        $('#tabelaNormal tbody').html(data);
                    }
                }
            });
        }
    </script>
</head>

<body>
    <div class="tabela" align='center'>
        <h1>Atendente</h1>

        <!-- Botões principais -->
        <div id="botoesPrincipais">
            <button class="botao" onclick="mostrarTabela('preferencial')">Senhas Preferenciais</button>
            <button class="botao" onclick="mostrarTabela('normal')">Senhas Normais</button>
            <button class="botao" onclick="window.location.href='index.php'">Voltar</button>
        </div>

        <!-- Tabela de Senhas Preferenciais -->
        <table id="tabelaPreferencial" style="display: none;">
            <thead>
                <tr>
                    <th>Na fila</th>
                    <th>Em atendimento</th>
                    <th>Finalizado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Movendo o ponteiro da consulta para o início
                mysqli_data_seek($status, 0);
                while ($aux = mysqli_fetch_assoc($status)) {
                    if (strpos($aux["senhaAtende"], "P") !== false) {
                        echo "<tr>";
                        if ($aux["statusAtende"] == 1) {
                            echo "<td>" . $aux["senhaAtende"] . "</td>";
                        } else {
                            echo "<td>&nbsp;</td>";
                        }
                        if ($aux["statusAtende"] == 2) {
                            echo "<td>" . $aux["senhaAtende"] . "</td>";
                        } else {
                            echo "<td>&nbsp;</td>";
                        }
                        if ($aux["statusAtende"] == 3) {
                            echo "<td>" . $aux["senhaAtende"] . "</td>";
                        } else {
                            echo "<td>&nbsp;</td>";
                        }
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>

        <!-- Botões para Senhas Preferenciais -->
        <div id="botoesPreferencial" style="display: none;">
            <button class="botao" onclick="chamarProximo('preferencial')">Chamar Próximo (Senha Preferencial)</button>
            <button class="botao" onclick="limparAtendimentos('preferencial')">Limpar Atendimentos (Senhas Preferenciais)</button>
            <button class="botao" onclick="voltar()">Voltar</button>
        </div>

        <!-- Tabela de Senhas Normais -->
        <table id="tabelaNormal" style="display: none;">
            <thead>
                <tr>
                    <th>Na fila</th>
                    <th>Em atendimento</th>
                    <th>Finalizado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Movendo o ponteiro da consulta para o início
                mysqli_data_seek($status, 0);
                while ($aux = mysqli_fetch_assoc($status)) {
                    if (strpos($aux["senhaAtende"], "P") === false) {
                        echo "<tr>";
                        if ($aux["statusAtende"] == 1) {
                            echo "<td>" . $aux["senhaAtende"] . "</td>";
                        } else {
                            echo "<td>&nbsp;</td>";
                        }
                        if ($aux["statusAtende"] == 2) {
                            echo "<td>" . $aux["senhaAtende"] . "</td>";
                        } else {
                            echo "<td>&nbsp;</td>";
                        }
                        if ($aux["statusAtende"] == 3) {
                            echo "<td>" . $aux["senhaAtende"] . "</td>";
                        } else {
                            echo "<td>&nbsp;</td>";
                        }
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>

        <!-- Botões para Senhas Normais -->
        <div id="botoesNormal" style="display: none;">
            <button class="botao" onclick="chamarProximo('normal')">Chamar Próximo (Senha Normal)</button>
            <button class="botao" onclick="limparAtendimentos('normal')">Limpar Atendimentos (Senhas Normais)</button>
            <button class="botao" onclick="voltar()">Voltar</button>
        </div>

    </div>
</body>
</html>
