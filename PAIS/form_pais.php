<?php
	require_once("InterfaceExibicao.php");
	require_once("classeInput.php");
	require_once("classeForm.php");
	require_once("classeSelect.php");
	require_once("classeOption.php");

	include("conexao.php"); 

	//seleção dos valores que irão cria o <select>///
	$select = "SELECT ID_REGIAO AS value, NOME_REGIAO AS
	texto FROM regiao ORDER BY NOME_REGIAO";

	$stmt = $conexao->prepare($select);
	$stmt->execute();

	while($linha=$stmt->fetch()){
		$matriz[] = $linha;
	}

	$v = array("action"=>"insere_pais.php","method"=>"post");
	$f = new Form($v);
	
	$v = array("type"=>"text","name"=>"ID_PAIS","placeholder"=>"ID DO PAIS...");
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"NOME_PAIS","placeholder"=>"NOME DO PAIS...");
	$f->add_input($v);
	$v = array("name"=>"ID_REGIAO");
	$f->add_select($v,$matriz);

	$v = array("type"=>"submit","name"=>"ENVIAR");
	$f->add_input($v);	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<style> input{margin:4px;}</style>
	</head>
<body>
<h3>Formulário - Inserir País</h3>

<hr />
<?php
	$f->exibe();

?>
</body>
</html>
</html>