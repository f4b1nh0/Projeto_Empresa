<?php
include 'conexao.php';

// conectando no banco
$conexao = mysqli_connect($servidor,$usuario,$senhaBanco,$banco);
if (mysqli_connect_errno($conexao)){
		echo "Problemas para conectar no banco de dados";
	die();
}
mysqli_set_charset($conexao,'UTF8');

//Recebe os dados da tabela de consulta

$Razao_social  = $_REQUEST['Razao_social'];
$Nome_Fantasia = $_REQUEST['Nome_Fantasia'];
$CNPJ          = $_REQUEST['CNPJ'];
$Email         = $_REQUEST['Email'];
$Endereco      = $_REQUEST['Endereco'];
$Cidade        = $_REQUEST['Cidade'];
$Estado        = $_REQUEST['Estado'];
$Telefone      = $_REQUEST['Telefone'];
$Categoria     = $_REQUEST['Categoria'];
$Status        = $_REQUEST['Status'];
$Agencia_Conta = $_REQUEST['Agencia_Conta'];
$Data_Cadastro = $_REQUEST['Data_Cadastro'];
$id            = $_REQUEST['ID'];

//update
$sql = "update estabelecimento
		   set Razao_social  = '".$Razao_social."',
		       Nome_Fantasia = '".$Nome_Fantasia."',
		       CNPJ          = '".$CNPJ."',
		       Email    	 = '".$Email."',
		       Endereco 	 = '".$Endereco."',
		       Cidade 	 	 = '".$Cidade."',
		       Estado 		 = '".$Estado."',
		       Telefone      = '".$Telefone."',
		       Categoria 	 = '".$Categoria."',
		       Status 		 = '".$Status."',
		       Agencia_Conta = '".$Agencia_Conta."',
		       Data_Cadastro = '".$Data_Cadastro."'
		 where id =  '".$id."'
";

//executa update
$motivo2 = mysqli_query($conexao,$sql) or die(mysql_error());



?>