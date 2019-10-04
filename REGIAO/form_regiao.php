<?php
	require_once("InterfaceExibicao.php");
	require_once("classeInput.php");
	require_once("classeForm.php");

	$v = array("action"=>"insere_regiao.php","method"=>"post");
	$f = new Form($v);
	
	$v = array("type"=>"number","name"=>"ID_REGIAO","placeholder"=>"ID DA REGIAO...");
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"NOME_REGIAO","placeholder"=>"NOME DA REGIAO...");
	$f->add_input($v);

	$v = array("type"=>"SUBMIT","name"=>"ENVIAR");
	$f->add_input($v);	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<style> input{margin:4px;}</style>
	</head>
<body>
<h3>Formulário - Inserir Região</h3>

<hr />
<?php
	$f->exibe();

?>
</body>
</html>
</html>