<!-- <?php
    
    include("conexao.php");
    //criando a query de consulta ao status de atendimento 
    $status= mysqli_query($conn, "SELECT * FROM atende ") or die( 
    mysqli_error($cx) //caso haja um erro na consulta 
  );

?> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/inserenome.css">
  <title>Document</title>
</head>

<body>

  <div class="container">

    <div class="container">
      <div class="input-group">
        <label class="input-group__label" for="myInput">Informe seu nome</label>
        <form action="">
          <input type="text" id="myInput" class="input-group__input" />
          <button>Confirmar</button>
        </form>
      </div>
    </div>

  </div>
  </div>
</body>

</html>