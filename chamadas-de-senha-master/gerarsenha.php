<?php 
include("conexao.php"); 
include('funcoes.php');

$isPreferential = isset($_POST['preferencial']) && $_POST['preferencial'] === 'on';

// Get current date and time from the server
$data = date('Y-m-d H:i:s');

// Generate password
if ($isPreferential) {
    $senha = generatePreferentialPassword(); // Senha preferencial com 3 digitos + 'P'
} else {
    $senha = generatePassword(4); // Senha normal com 4 digitos
}                 		
$status = 1; // 1 aguardando a vez, 2 em atendimento, 3 finalizado

$sql = "INSERT INTO `atende` (dataAtende, senhaAtende, statusAtende) VALUES ('$data', '$senha', '$status')"; 

if (mysqli_query($conn, $sql)) {
    header("Location: exibesenhaatendimento.php?senha=$senha&status=$status&data=$data");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
