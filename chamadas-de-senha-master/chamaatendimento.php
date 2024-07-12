<!DOCTYPE html>
<html>
<head>
    <title>Atendente</title>
    <link rel="stylesheet" type="text/css" href="./css/chamaatendimento.css">
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Função para carregar as senhas ao carregar a página
            carregarSenhas();
        });

        function carregarSenhas() {
            $.ajax({
                url: 'atualizar_tabela.php',
                type: 'GET',
                data: { tipo: 'all' },
                success: function(data) {
                    $('#tabelaAtendimento tbody').html(data);
                },
                error: function(xhr, status, error) {
                    alert("Erro ao carregar senhas: " + error);
                }
            });
        }

        function chamarProxima() {
            $.ajax({
                url: 'chamar.php',
                type: 'GET',
                data: { tipo: 'all' },
                success: function(response) {
                    if (response !== 'Success') {
                        carregarSenhas();
                    } else {
                        alert(response); // Exibe mensagem de erro ou aviso
                    }
                },
                error: function(xhr, status, error) {
                    alert("Erro ao chamar próxima senha: " + error);
                }
            });
        }

        function limparAtendimentos() {
            if (confirm('Tem certeza que deseja limpar todos os atendimentos finalizados?')) {
                $.ajax({
                    url: 'limpar.php',
                    type: 'GET',
                    success: function(response) {
                        if (response === 'Success') {
                            carregarSenhas();
                        } else {
                            alert(response); // Exibe mensagem de erro ou aviso
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Erro ao limpar atendimentos: " + error);
                    }
                });
            }
        }
    </script>
</head>

<body>
    <div class="tabela" align='center'>
        <h1>Atendente</h1>

        <!-- Botões -->
        <div id="botoesPrincipais">
            <button class="botao" onclick="chamarProxima()">Chamar Próxima</button>
            <button class="botao" onclick="limparAtendimentos()">Limpar Atendimentos Finalizados</button>
            <button onclick="window.location.href='index.php'">Sair</button>
        </div>

        <!-- Tabela de Senhas -->
        <table id="tabelaAtendimento">
            <thead>

                <tr>
                    <th>Senha</th>
                    <th>Status</th>
                    <th>Guichê</th>
                </tr>

            </thead>

            <tbody>
                <!-- Via AJAX -->
            </tbody>
        </table>
    </div>
</body>
</html>
