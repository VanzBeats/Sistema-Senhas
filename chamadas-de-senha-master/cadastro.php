<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Conectar ao banco de dados (inclua seu arquivo de conexão aqui)
    include("conexao.php"); // Verifique se o caminho do arquivo está correto

    // Receber dados do formulário e evitar injeção SQL (usando mysqli_real_escape_string)
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $cargo = mysqli_real_escape_string($conn, $_POST['cargo']);
    $guiche = mysqli_real_escape_string($conn, $_POST['guiche']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $confirmarSenha = mysqli_real_escape_string($conn, $_POST['confirmarSenha']);

    // Verifica se as senhas coincidem
    if ($senha !== $confirmarSenha) {
        die("As senhas não coincidem. <a href='cadastro_form.php'>Tente novamente</a>.");
    }

    // Hash da senha para armazenamento seguro
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Query SQL para inserir os dados na tabela funcionario
    $sql = "INSERT INTO funcionario (nome, cargo, guiche, senha) VALUES ('$nome', '$cargo', '$guiche', '$senhaHash')";

    if (mysqli_query($conn, $sql)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar funcionário: " . mysqli_error($conn);
    }

    // Fechar conexão com o banco de dados
    mysqli_close($conn);
}
?>
