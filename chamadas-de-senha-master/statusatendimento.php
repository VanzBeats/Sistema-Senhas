<?php 
include("conexao.php"); 

// Selecionando a senha atual em atendimento (preferencial, se houver)
$preferencial = mysqli_query($conn, "SELECT senhaAtende FROM atende WHERE statusAtende = 2 AND LENGTH(senhaAtende) = 3 ORDER BY codAtende ASC LIMIT 1") or die(mysqli_error($conn));
$normal = mysqli_query($conn, "SELECT senhaAtende FROM atende WHERE statusAtende = 2 AND LENGTH(senhaAtende) != 3 ORDER BY codAtende ASC LIMIT 1") or die(mysqli_error($conn));
$atendido = mysqli_query($conn, "SELECT senhaAtende FROM atende WHERE statusAtende = 3 ORDER BY codAtende DESC") or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html>
<head>
    <title>TELÃO</title>
    <link rel="stylesheet" type="text/css" href="_css/estilo.css">
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="3"> <!-- Atualização automática a cada 3 segundos -->
</head>
<body>
    <div id="conteudo_telao">
        <div class="title-container">
            <h1>Atendimento - Senhas</h1>
        </div>

        <div class="senha-container">
            <div class="senha">
                <h2>SENHA</h2>
                <?php
                if ($preferencial_row = mysqli_fetch_assoc($preferencial)) {
                    echo "<p>" . $preferencial_row["senhaAtende"] . "P - Guichê 01 </p>";
                } elseif ($normal_row = mysqli_fetch_assoc($normal)) {
                    echo "<p>" . $normal_row["senhaAtende"] . " - Guichê 02 </p>";
                } else {
                    echo "<p>Nenhuma senha em atendimento</p>";
                }
                ?>
            </div>
        </div>

        <div class="chamadas-container">
            <h2>ÚLTIMAS CHAMADAS</h2>
            <?php while ($row = mysqli_fetch_assoc($atendido)) : ?>
                <div class="chamada">
                    <?php if (strlen($row["senhaAtende"]) === 3) : ?>
                        <p><?php echo $row["senhaAtende"]; ?>P - Guichê 01</p>
                    <?php else : ?>
                        <p><?php echo $row["senhaAtende"]; ?> - Guichê 02 </p>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
