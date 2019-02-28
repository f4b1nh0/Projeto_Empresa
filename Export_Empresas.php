<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-Type" content="text/html; charset=UTF-8" />
<?php
$arquivo = 'Empresas.xls';
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename={$arquivo}" );
header ("Content-Description: PHP Generated Data" );
         
?>

</head>
<style type="text/css">
#cliente_listagem #titulo {color:#FFFFFF}
#cliente_listagem #conteudos {color:#333}
#cliente_listagem #conteudos td {border-bottom:#CCC
solid 1px}
#teste {color:#FF0000}
</style>
<table id="cliente_listagem" border="0" style="padding:5px; margin:5px;" >
  <tr id="titulo" style="background-color: #CC0000; font-weight:bold; color:#FFFFFF" >
    <td style="padding:5px">ID</td>
	<td style="padding:5px">Razao_social</td>
	<td style="padding:5px">Nome_Fantasia</td>
	<td style="padding:5px">CNPJ</td>
	<td style="padding:5px">Email</td>
	<td style="padding:5px">Endereco</td>
	<td style="padding:5px">Cidade</td>
	<td style="padding:5px">Estado</td>
	<td style="padding:5px">Telefone</td>
	<td style="padding:5px">Categoria</td>
    <td style="padding:5px">Status</td>
	<td style="padding:5px">Agencia</td>
	<td style="padding:5px">Conta</td>
	<td style="padding:5px">Data_Cadastro</td>
		
<?php
//header('Content-Type: text/csv; charset=UTF-8');
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

?><table>               

<?php

while($exibe = mysqli_fetch_assoc($select)){ ?>
    <tr id="conteudos">
	<td style="padding:5px"> <?php echo $exibe["ID"];?></td>
	<td style="padding:5px"> <?php echo $exibe["Razao_social"];?></td>
	<td style="padding:5px"> <?php echo $exibe["Nome_Fantasia"];?></td>
	<td style="padding:5px"> <?php echo $exibe["CNPJ"];?></td>
	<td style="padding:5px"> <?php echo $exibe["Email"];?></td>
	<td style="padding:5px"> <?php echo $exibe["Endereco"];?></td>
	<td style="padding:5px"> <?php echo $exibe["Cidade"];?><br></td>
	<td style="padding:5px"> <?php echo $exibe["Estado"];?><br></td>
	<td style="padding:5px"> <?php echo $exibe["Telefone"];?><br></td>
	<td style="padding:5px"> <?php echo $exibe["Categoria"];?><br></td>
	<td style="padding:5px"> <?php echo $exibe["Status"];?><br></td>
	<td style="padding:5px"> <?php echo $exibe["Agencia"];?><br></td>
	<td style="padding:5px"> <?php echo $exibe["Conta"];?><br></td>
	<td style="padding:5px"> <?php echo $exibe["Data_Cadastro"];?><br></td>

	</tr><?php
}?></table><?php
?>

</html>