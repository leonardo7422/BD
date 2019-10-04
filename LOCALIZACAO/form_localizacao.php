<?php
	require_once("InterfaceExibicao.php");
	require_once("classeInput.php");
	require_once("classeForm.php");
	require_once("classeSelect.php");
	require_once("classeOption.php");

	include("conexao.php"); 

	//seleção dos valores que irão cria o <select>///
	$select = "SELECT ID_PAIS AS value, NOME_PAIS AS
	texto FROM pais ORDER BY NOME_PAIS";

	$stmt = $conexao->prepare($select);
	$stmt->execute();

	while($linha=$stmt->fetch()){
		$matriz[] = $linha;
	}

	$v = array("action"=>"insere_localizacao.php","method"=>"post");
	$f = new Form($v);
	
	$v = array("type"=>"text","name"=>"ID_LOCALIZACAO","placeholder"=>"ID LOCALIZAÇÃO...");
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"ENDERECO","placeholder"=>"ENDEREÇO...");
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"CEP","placeholder"=>"CEP...");
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"CIDADE","placeholder"=>"CIDADE...");
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"ESTADO","placeholder"=>"ESTADO...");
	$f->add_input($v);
	$v = array("name"=>"ID_PAIS");
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