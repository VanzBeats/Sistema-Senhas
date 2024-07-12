<?php 
include("conexao.php"); 

//criando a query de consulta à tabela criada 
$sql = mysqli_query($conn, "SELECT * FROM atende order by codAtende desc limit 1") or die( 
  mysqli_error($cx) //caso haja um erro na consulta 
);

$aux = mysqli_fetch_assoc($sql);

$senha = isset($_GET['senha']) ? $_GET['senha'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
$data = isset($_GET['data']) ? $_GET['data'] : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Atendimento</title>
    <link rel="stylesheet" type="text/css" href="./css/exibesenhaatendimento.css">
    <meta charset="utf-8">  
</head>

<body>
    <div align='center'> 
        <div class="ticket">
            <?php
            // Verifica se a senha está definida e exibe a senha
            if (!empty($senha)) {
                echo "<h1>SENHA </h1>";
                echo "<h1>".$senha."</h1><br><br><br>";
                echo "<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" .$aux["codAtende"]."</p>";
                echo date('d/m/Y' , strtotime($data))."<br>"; 
                echo date('H:i:s' , strtotime($data))."<br><br>";
                if ($status == 1) {
                    echo "Aguarde o atendimento!"; 
                }
            } else {
                // Exibe a última senha gerada do banco de dados
                while ($aux = mysqli_fetch_assoc($sql)) {
                    echo "<h1>SENHA </h1>";
                    echo "<h1>".$aux["senhaAtende"]."</h1><br><br><br>";
                    echo "<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" .$aux["codAtende"]."</p>";
                    echo date('d/m/Y' , strtotime($aux["dataAtende"]))."<br>"; 
                    echo date('H:i:s' , strtotime($aux["dataAtende"]))."<br><br>";
                    if ($aux["statusAtende"] == 1) {
                        echo "Aguarde o atendimento!"; 
                    }
                }
            }
            mysqli_close($conn);
            ?>
        </div>
        <button onclick="myFunction()">Imprimir</button>
        <button onclick="window.location.href='adquireatendimento.php'" class="custom-btn btn-5">Nova senha</button>
        <button onclick="window.location.href='index.php'">Voltar</button>
        <script>
            function myFunction() {
                window.print();
            }
        </script>
    </div>
</body>
</html>
