<?php
	require_once("../classeForm/InterfaceExibicao.php");
	require_once("../classeForm/classeInput.php");
	require_once("../classeForm/classeForm.php");

	$v = array("action"=>"insere_funcao.php","method"=>"post");
	$f = new Form($v);
	
	$v = array("type"=>"text","name"=>"ID_FUNCAO","placeholder"=>"ID DA FUNÇÃO...");
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"TITULO_FUNCAO","placeholder"=>"TÍTULO DA FUNÇÃO...");
	$f->add_input($v);
	$v = array("type"=>"number","name"=>"SALARIO_MINIMO","placeholder"=>"SALÁRIO MÍNIMO...");
	$f->add_input($v);
	$v = array("type"=>"number","name"=>"SALARIO_MAXIMO","placeholder"=>"SALÁRIO MÁXIMO...");
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
<h3>Formulário - Inserir Função</h3>

<hr />
<?php
	$f->exibe();

?>
</body>
</html>
</html>