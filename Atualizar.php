<?php
include 'conexao.php';

// conectando no banco
$conexao = mysqli_connect($servidor,$usuario,$senhaBanco,$banco);
if (mysqli_connect_errno($conexao)){
		echo "Problemas para conectar no banco de dados";
	die();
}
mysqli_set_charset($conexao,'UTF8');
//$COTAcAOCOR = $_REQUEST['COTAcAOCOR'];
$Duplicado = $_REQUEST['id'];
//$IDTESTE = $_REQUEST['id'];



$sql = "update divisao_prd_novos
		   set Etapa = 'Concluido'
		where codigo =  '".$Duplicado."'
";


$motivo2 = mysqli_query($conexao,$sql) or die(mysql_error());

var_dump($motivo2);

?>