<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionário</title>
</head>
<body>
    <h2>Cadastro de Funcionário</h2>
    <form action="cadastro.php" method="POST">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="cargo">Cargo:</label><br>
        <input type="text" id="cargo" name="cargo" required><br><br>

        <label for="guiche">Guichê:</label><br>
        <input type="text" id="guiche" name="guiche" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <label for="confirmarSenha">Confirmar Senha:</label><br>
        <input type="password" id="confirmarSenha" name="confirmarSenha" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
