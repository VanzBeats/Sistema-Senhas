<!DOCTYPE html>
<html>
<head>
  <title>SISTEMA DE ATENDIMENTO </title> 
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/adquireatendimento.css">
</head>

<body>

  <div class="logo-container">
    <img class="logo-credivale" src="./assets/images/logo-credivale.png" width="80%" alt="">
  </div>

  <div class="btn-container">
    <form action="gerarsenha.php" method="post">
      <input type="hidden" name="preferencial" id="preferencial" value="off">
      <button class="custom-btn btn-5" type="submit" onclick="document.getElementById('preferencial').value='off';"><span> NORMAL</span></button>
      <button class="custom-btn btn-5" type="submit" onclick="document.getElementById('preferencial').value='on';"><span> PREFERENCIAL</span></button>
    </form>
  </div>

  <button onclick="window.location.href='index.php'">Menu inicial</button>

</body>

</html>
