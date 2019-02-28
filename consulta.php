<?php
include 'conexao.php';

// conectando no banco
$conexao = mysqli_connect($servidor,$usuario,$senhaBanco,$banco);
if (mysqli_connect_errno($conexao)){
		echo "Problemas para conectar no banco de dados";
	die();
}
mysqli_set_charset($conexao,'UTF8');

//Query

$Query = "select ID,Razao_social, Nome_Fantasia, CNPJ, Email, Endereco, Cidade, Estado, Telefone, Categoria, Status, Agencia,Conta, 
			     date_format(Data_Cadastro, '%d-%m-%Y') as Data_Cadastro
			from estabelecimento";

$select = mysqli_query($conexao,$Query);


?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <title>Projeto Empresas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="js/consulta.js"></script>
 
 
   <link href="css/estilos.css" rel="stylesheet">
</head>
<body>


<script>


			
			

  </script>

<!-- Menu -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
   <div class="teste">
    <div class="navbar-header">
	
      <a class="navbar-brand" > <img src="imagens/FitCard.png" width="150" height="120" class="img-responsive pull-right">
	  
    </div></div>
    <ul class="nav navbar-nav">
     
      <li><a href="index.html">CADASTRO</a></li>
      <li><a href="#">CONSULTA</a></li>
	  <li></li>
	  
    </ul>
	
  </div>
</nav>


<!-- Tabela com o resultado -->


<div class="SegundoHeader">
<td colspan='11'>
	<br><a href="Export_Empresas.php"><img src="imagens/Microsoft Office Excel.png"width="40" height="40"></a><br>
	Exportar para o excel
	<br><br>
									
</td>
</div>
<tr>
            <td>
			
			<div class="height:300px;table-responsive ">
			<table id="tabela" class="table table-striped table-bordered table-condensed table-hover table_text ">
             	
				
				<tr>
					
				</tr>
				
						
                <tr align="center">	
				<th></th>

                  <th>Razao_social</th>
                  <th>Nome_Fantasia</th>
				  <th>CNPJ</th>
				  <th>Email</th>
				  <th>Endereco</th>
				  <th>Cidade</th>
				  <th>Estado</th>
				  <th>Telefone</th>
				  <th>Categoria</th>
				  <th>Conta</th>
				  <th>Status</th>
				  <th>Agencia</th>
				  <th>Data_Cadastro</th>
				  <th>ID</th>

		


                </tr>
				
	
                <?php

            while($row = mysqli_fetch_assoc($select)) { 
				
			?>
			 <td>
							<button id="editar<?php echo $row["ID"]; ?>" style="display:inline" type="submit" onclick="editar('<?php echo $row["ID"] ?>','<?php echo utf8_encode($row["ID"]);?>')">Editar</button>
							<button id="salvar<?php echo $row["ID"]; ?>" style="display:none" type="submit" onclick="atualizar_registro('<?php echo $row["ID"] ?>')">Salvar</button>
				  </td>
				  
			  <td><input disabled type="text" id="Razao_social<?php echo $row["ID"]; ?>" value= "<?php echo utf8_encode($row["Razao_social"]);?>"/></td>
			  <td><input disabled type="text" id="Nome_Fantasia<?php echo $row["ID"]; ?>" value= "<?php echo utf8_encode($row["Nome_Fantasia"]);?>"/></td>
			  <td><input disabled type="text" id="CNPJ<?php echo $row["ID"]; ?>" value= "<?php echo utf8_encode($row["CNPJ"]);?>"/></td>
			  <td><input disabled type="text" id="Email<?php echo $row["ID"]; ?>" value= "<?php echo utf8_encode($row["Email"]);?>"/></td>
			  <td><input disabled type="text" id="Endereco<?php echo $row["ID"]; ?>" value= "<?php echo utf8_encode($row["Endereco"]);?>"/></td>
			  <td><input disabled type="text" id="Cidade<?php echo $row["ID"]; ?>" value= "<?php echo utf8_encode($row["Cidade"]);?>"/></td>
			  <td><input disabled type="text" id="Estado<?php echo $row["ID"]; ?>" value= "<?php echo utf8_encode($row["Estado"]);?>"/></td>
			  <td><input disabled type="text" id="Telefone<?php echo $row["ID"]; ?>" value= "<?php echo utf8_encode($row["Telefone"]);?>"/></td>
			  <td><input disabled type="text" id="Categoria<?php echo $row["ID"]; ?>" value= "<?php echo utf8_encode($row["Categoria"]);?>"/></td>
			  <td><input disabled type="text" id="Status<?php echo $row["ID"]; ?>" value= "<?php echo utf8_encode($row["Status"]);?>"/></td>
			  <td><input disabled type="text" id="Agencia_Conta<?php echo $row["ID"]; ?>" value= "<?php echo utf8_encode($row["Conta"]);?>"/></td>
			  <td><input disabled type="text" id="Agencia_Conta<?php echo $row["ID"]; ?>" value= "<?php echo utf8_encode($row["Agencia"]);?>"/></td>
			  <td><input disabled type="text" id="Data_Cadastro<?php echo $row["ID"]; ?>" value= "<?php echo utf8_encode($row["Data_Cadastro"]);?>"/></td>
			   <td><input disabled type="text" id="id<?php echo $row["ID"]; ?>" value= "<?php echo utf8_encode($row["ID"]);?>"/></td>
			   <td>
							<button id="editar<?php echo $row["id"]; ?>" style="display:inline" type="submit" onclick="excluir_registro('<?php echo $row["ID"] ?>')">Exluir</button>
							
				  </td>
                

                </tr> 
		
                <?php } 
				
            ?>
			 </table></div> </div>
            </td>
          </tr>