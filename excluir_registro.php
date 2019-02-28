<?php
include 'conexao.php';

// conectando no banco
$conexao = mysqli_connect($servidor,$usuario,$senhaBanco,$banco);
if (mysqli_connect_errno($conexao)){
		echo "Problemas para conectar no banco de dados";
	die();
}
mysqli_set_charset($conexao,'UTF8');


$ID = $_REQUEST['ID'];

$sql = "delete from estabelecimento
		where id = '".$ID."'";


$motivo2 = mysqli_query($conexao,$sql) or die(mysql_error());


?>