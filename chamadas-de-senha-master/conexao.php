<?php
 $servername = "127.0.0.1";
 $username = "root";
 $password="";
 $database="atendimento";

 
// Cria conexao
$conn = mysqli_connect($servername, $username, $password,$database);

// Checa conexao
/*if (!$conn) {
    die("Falha na conexão ao servidor " . mysqli_connect_error());
}
echo "Conexão bem sucedida";

*/

$sql = "CREATE TABLE IF NOT EXISTS `atende` (
  `codAtende` int(11) NOT NULL AUTO_INCREMENT,
  `dataAtende` datetime NOT NULL,
  `senhaAtende` int(11) NOT NULL,
  `statusAtende` int(11) NOT NULL,
  PRIMARY KEY (`codAtende`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1
AUTO_INCREMENT=1";

$sql = "CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(100) NOT NULL,
  `cargo` VARCHAR(100) NOT NULL,
  `guiche` INT(11) NOT NULL,
  `senha` VARCHAR(100) NOT NULL
)";


mysqli_query($conn, $sql);

//checa se a tabela foi criada com sucesso
/*if (mysqli_query($conn, $sql)) {
    echo "Table Atendimento created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
*/

?>
