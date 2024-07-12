<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("conexao.php");

    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $cargo = mysqli_real_escape_string($conn, $_POST['cargo']);
    $guiche = mysqli_real_escape_string($conn, $_POST['guiche']);
    $senha = $_POST['senha'];

    // Query para buscar o usuário no banco de dados
    $sql = "SELECT * FROM funcionario WHERE nome='$nome' AND cargo='$cargo' AND guiche='$guiche'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verifica a senha usando password_verify
        if (password_verify($senha, $user['senha'])) {
            header("Location: chamaatendimento.php");
            exit();
        } else {
            echo "Senha incorreta. <a href='login_form.php'>Tente novamente</a>.";
        }
    } else {
        echo "Usuário não encontrado. <a href='login_form.php'>Tente novamente</a>.";
    }

    mysqli_close($conn);
}
