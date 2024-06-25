<?php
include("conexao.php");

$tipo = $_GET['tipo'];

if ($tipo == 'preferencial') {
    // Consulta para senhas preferenciais
    $status = mysqli_query($conn, "SELECT * FROM atende WHERE LENGTH(senhaAtende) = 3 ORDER BY codAtende ASC") or die(mysqli_error($conn));
} else if ($tipo == 'normal') {
    // Consulta para senhas normais
    $status = mysqli_query($conn, "SELECT * FROM atende WHERE LENGTH(senhaAtende) != 3 ORDER BY codAtende ASC") or die(mysqli_error($conn));
}

while ($aux = mysqli_fetch_assoc($status)) {
    echo "<tr>";
    if ($aux["statusAtende"] == 1) {
        echo "<td>" . $aux["senhaAtende"] . ($tipo == 'preferencial' ? 'P' : '') . "</td>";
    } else {
        echo "<td>&nbsp;</td>";
    }
    if ($aux["statusAtende"] == 2) {
        echo "<td>" . $aux["senhaAtende"] . ($tipo == 'preferencial' ? 'P' : '') . "</td>";
    } else {
        echo "<td>&nbsp;</td>";
    }
    if ($aux["statusAtende"] == 3) {
        echo "<td>" . $aux["senhaAtende"] . ($tipo == 'preferencial' ? 'P' : '') . "</td>";
    } else {
        echo "<td>&nbsp;</td>";
    }
    echo "</tr>";
}
?>
