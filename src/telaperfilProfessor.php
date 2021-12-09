<?php include ("../conexao.php");
session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/telaperfil.css" />
  <script src="../assets/js/app.js"></script>
</head>
<body>
<div class="container">
  <div id="logo"><h1 class="logo"></h1>
    <div class="CTA">
      </div>
  </div>
  <div class="leftbox">
    <nav>
      <a id="profile" class="active"><i class="fa fa-user"></i></a>
      <a id="settings"><i class="fa fa-cog"></i></a>
    </nav>
  </div>
  <div class="rightbox">
    <div class="profile ">
      <h1>Informações de Perfil</h1>
      <div >
      
        <h2>Nome Completo</h2>
        <p> <?php echo $_SESSION['nomeD'];?> </p>
        <h2>SIAPE</h2>
        <p><?php echo $_SESSION['SIAPE'];?> </p>
       <h2>Data de Nascimento</h2>
        <p><p><?php
          function data($data){
          return date("d/m/Y", strtotime($data));
                          }
            echo data($_SESSION['data_nasc']);
            echo "  ";
            ?></p> </p>
            <h2>rg</h2>
        <p> <?php echo $_SESSION['rg'];?> </p>
        <h2>Telefone</h2>
        <p><?php echo $_SESSION['telefone'];?>  </p>
        <h2>Email</h2>
        <p><?php echo $_SESSION['email'];?>  </p>
        <h2>Senha</h2>
        <p><?php echo $_SESSION['senha'];?>
        <p><button id="carlos"class="btn1">Alterar</button> </p>
      </div>
    </div>
    <div class="configuracoes ">
    <h1>Escolha Seu Armário</h1>
      <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/arm.css" />
    
</head>

<body onload="onLoaderFunc()">
 
<form class="forma" method="post" action= "../armario.php">
<div class="seatStructure">
  
<table id="seatsBlock">
 <p id="notification"></p>
  <tr>
    <td colspan="14"><div class="screen">Armários</div></td>
    <td rowspan="20">             

  <?php 
  $result_usu =  "SELECT * FROM armario";
  $resultado_usu = mysqli_query($mysqli, $result_usu);
  $contador = 0;
  while($row_usu = mysqli_fetch_assoc($resultado_usu)){
    
	if($contador == 0){?>
  <tr>
	<?php }?>

    <?php 
      if ($row_usu['disponivel'] == 0 ){ ?>
       <td><input type="checkbox" class = 'seatsG' name = "meucheckbox" value=" <?php echo $row_usu['numero'] ; ?>"></td>
            


     <?php } 
     else if ($row_usu['disponivel'] == 1 ){ ?>
     <td><input type="checkbox" class = 'seatsR' id= "seatsR" name = "meucheckbox" value=" <?php echo $row_usu['numero'] ; ?>" disabled></td>

     <?php } ?>

		<?php
	$contador++; 
	if($contador == 10){?>
		</tr>
	<?php $contador = 0;	} ?>
  <?php }?>

</tr>
</table>

<aside>
  <p><ul type="square">
<li id= "selecionado">Selecionado</li>
<li id= "reservado">Reservado</li>
<li id= "livre">Livre</li>
</ul></p>
</aside>
<br/><button type = "submit" class="" name= "armarioD" onclick="updateTextArea()">Confirmar Seleção</button> 
</div>  
</form>

      <p></p>
    </div>

    <div class="alterar">
      <form class="form" method="post" action="../alterarDocente.php">
      <h2>Nome Completo</h2>
        <input name = "nomeCompleto" value = "<?php echo $_SESSION ['nomeD']?>"> </input>

      <h2> Senha </h2>
        <input name="password" value="Senha"> </input>

      <h2>SIAPE</h2>
        <input name= "SIAPE" value = '<?php echo $_SESSION ['SIAPE']?>'> </input>

      <h2>Data de Nascimento</h2>
        <input name= "dataDeNascimento" value = '<?php echo $_SESSION ['data_nasc']?>'></input>

      <h2>rg</h2>
        <input name= "rg" value = "<?php echo $_SESSION ['rg']?>"> </input>

      <h2>Telefone</h2>
        <input name="phone" value = "<?php echo $_SESSION ['telefone']?>">  </input>

      <h2>Email</h2>
        <input name= "email" value = "<?php echo $_SESSION ['email']?>">  </input>
        
      </br>

      <button class="" name= "alterarD" >Alterar</button>

      </form>
    </div>
  </div>
</div>
<script src="../assets/js/jquery-3.2.1.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/owl.carousel.min.js"></script>
        <script src="../assets/js/jquery.waypoints.min.js"></script>
        <script src="../assets/js/jquery.stellar.min.js"></script>
        <script src="../assets/js/jquery.magnific-popup.min.js"></script>
        <script src="../assets/js/magnific-popup-options.js"></script>
<script> 
document.getElementById('settings').onclick = function(){
                $('.configuracoes').show();
                $('.profile').hide();
            }
document.getElementById('profile').onclick = function(){
                $('.configuracoes').hide();
                $('.profile').show();
            }
document.getElementById('carlos').onclick = function (){
                $('.configuracoes').hide();
                $('.profile').hide();
                $('.alterar').show();
}
</script>

</body>
</html>