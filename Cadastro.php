<?php
include 'conexao.php';

//Recupera dados do formulario
$dados		= $_POST['RazaoSocial'];
$dados1  	= $_POST['NomeFantasia'];
$dados2		= $_POST['Cnpj'];
$dados3		= $_POST['Email'];
$dados4		= $_POST['endereco'];
$dados5		= $_POST['Cidade'];
$dados6		= $_POST['Estado'];
$dados7		= $_POST['Telefone'];
$dados8		= $_POST['Categoria'];
$dados9		= $_POST['status'];
$dados10	= $_POST['Agencia'];
$dados11	= $_POST['Conta'];

// conectando no banco
$conexao = mysqli_connect($servidor,$usuario,$senhaBanco,$banco);
if (mysqli_connect_errno($conexao)){
		echo "Problemas para conectar no banco de dados";
	die();
}
mysqli_set_charset($conexao,'UTF8');

//query - Insert
$QueryInsert = "insert into estabelecimento ( Razao_social, Nome_Fantasia, CNPJ, Email, Endereco, Cidade, Estado, Telefone,
										 Categoria, Status, Agencia,Conta, Data_Cadastro )
										
									 values ( '".utf8_encode(addslashes($dados))."','".utf8_encode(addslashes($dados1))."',
											  '".utf8_encode(addslashes($dados2))."','".utf8_encode(addslashes($dados3))."',
											  '".utf8_encode(addslashes($dados4))."','".utf8_encode(addslashes($dados5))."',
											  '".utf8_encode(addslashes($dados6))."','".utf8_encode(addslashes($dados7))."',
											  '".utf8_encode(addslashes($dados8))."','".utf8_encode(addslashes($dados9))."',
											  '".utf8_encode(addslashes($dados10))."','".utf8_encode(addslashes($dados11))."',now())";

$insert = mysqli_query($conexao,$QueryInsert);


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
  <script src="js/formulario.js"></script>
 <link href="css/estilos.css" rel="stylesheet">
</head>
<script type="text/javascript" >
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#endereco").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#endereco").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
		

    </script>



<body>


<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
   <div class="teste">
    <div class="navbar-header">
	
      <a class="navbar-brand" > <img src="imagens/FitCard.png" width="150" height="120" class="img-responsive pull-right">
	  
    </div></div>
    <ul class="nav navbar-nav">
     
      <li><a href="index.html">CADASTRO</a></li>
      <li><a href="consulta.php">CONSULTA</a></li>
	  <li></li>
	  
    </ul>
	
  </div>
</nav>
  <div class="SegundoHeader">
  <div class="container text-center">
    <h1>Bem vindo</h1>      
    <p>ao portal Empresas</p>
  </div>
</div>  
	
	
	<center> Cadastro realizado com sucesso! 
	<br>
	<a href="javascript:window.history.go(-1)">Voltar</a></a>
  </center>
  
  
    

	
	
	
	
	
	
    
 

<footer class="container-fluid_rodape text-center">
<p>Copyright Fabio Siqueira ©</p>
</footer>

</body>
</html>
