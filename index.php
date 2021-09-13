<?php
  require('conexao/conexao.php');
 
 ?>
<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" 
    crossorigin="anonymous">
    <title>API Cep</title>

</head>

<body class="bg-white">
     
    <div class="container bg-light mt-3 shadow p-3 mb-5 bg-body rounded">
      
      <?php

      function get_endereco($cep){


        // formatar o cep removendo caracteres nao numericos
        $cep = preg_replace("/[^0-9]/", "-", $cep);
        $url = "http://viacep.com.br/ws/$cep/xml/";

        $xml = simplexml_load_file($url);
        return $xml;
      }

      function salva_endereco(){
         
      }

      ?>

      <h1 class="mt-2 text-muted text-center"><img src="./img/map.png" />Pesquisar Endereço</h1>
      <form action="" method="post">
        <input
         type="text" required="true" 
         name="cep" 
         class="form-control" 
         />
        
         <button type="submit" 
         class="btn btn-primary mt-4"
         class="form-control">Pesquisar</button>
          
          </button>
      
      </form>
 
   
     <hr class="mt-4">

  
      <?php 
        if(isset($_POST['cep'])){
            $pega = $_POST['cep'];
        }
      if(isset($pega) && (null !== $pega)){ ?>  
      <h3 class="mt-4">Resultado da Pesquisa</h3>
      <p>
        
        <?php
        $endereco = get_endereco($pega); ?>
     
      </p>


    <div class="container-fluid mt-3" >
      <table class="table">
  <thead>
    <tr>
      <th scope="col">CEP</th>
      <th scope="col">Logradouro</th>
      <th scope="col">Bairro</th>
      <th scope="col">Localidade</th>
      <th scope="col">UF</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     
      <td><?php echo $endereco->cep; ?></td>
      <td><?php echo $endereco->logradouro; ?></td>
      <td><?php echo $endereco->bairro; ?></td>
      <td><?php echo $endereco->localidade; ?></td>
      <td><?php echo $endereco->uf;?></td>
    </tr>
  </tbody>
</table>



<?php } ?>


<form action="" method="post">
  <button 
  type="submit" 
  value="Salvar" 
  enable="false" 
  class="btn btn-success mt-4">Gravar
</form>
     
</div>
</body>
</html>
