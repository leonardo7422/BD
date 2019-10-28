<?php

	include("../classeLayout/classeCabecalhoHTML.php");
	include("cabecalho.php");
	
	require_once("../classeForm/InterfaceExibicao.php");
	require_once("../classeForm/classeInput.php");
	require_once("../classeForm/classeOption.php");
	require_once("../classeForm/classeSelect.php");
	require_once("../classeForm/classeForm.php");
	require_once("../classeForm/classeButton.php");


	include("conexao.php");
	
	if(isset($_POST["id"])){
		require_once("classeControllerBD.php");
		$c = new ControllerBD($conexao);
		$colunas = array("*");
		$tabelas[0][0]="localizacao";
		$tabelas[0][1]=null;
		$ordenacao = null;
		$condicao = $_POST["id"];
		$stmt = $c->selecionar($colunas,$tabelas,$ordenacao,$condicao);
		$linha = $stmt->fetch(PDO::FETCH_ASSOC);
		$value_endereco = $linha["ENDERECO"];
		$value_cep = $linha["CEP"];
		$value_cidade = $linha["CIDADE"];
		$value_estado = $linha["ESTADO"];
		$selected_id_pais = $linha["ID_PAIS"];
		
		
		$action = "alterar.php?tabela=localizacao";

		$disabled = true;
		
	}
	else{
		$disabled = false;
		$value_endereco = null;
		$value_cep = null;
		$value_cidade = null;
		$value_estado = null;
		$selected_id_pais = null;

		$action = "insere.php?tabela=localizacao";			
	}

	$select = "SELECT ID_PAIS AS value, NOME_PAIS AS texto FROM pais ORDER BY NOME_PAIS";
	
	$stmt = $conexao->prepare($select);
	$stmt->execute();
	
	while($linha=$stmt->fetch()){
		$matriz[] = $linha;
	}	
	

	$v = array("action"=>"insere.php?tabela=localizacao","method"=>"post");
	$f = new Form($v);
	
	$v = array("type"=>"text","name"=>"ENDERECO","placeholder"=>"ENDEREÇO...", "value"=>$value_endereco);
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"CEP","placeholder"=>"CEP...", "value"=>$value_cep);
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"CIDADE","placeholder"=>"CIDADE...", "value"=>$value_cidade);
	$f->add_input($v);	
	$v = array("type"=>"text","name"=>"ESTADO","placeholder"=>"ESTADO...", "value"=>$value_estado);
	$f->add_input($v);
	
	$v = array("name"=>"ID_PAIS","selected"=>$selected_id_pais);
	$f->add_select($v,$matriz);

	$v = array("texto"=>"ENVIAR");
	$f->add_button($v);		
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<style> input{margin:4px;}</style>
	</head>
<body>
<h3>Formulário - Inserir Localização</h3>

<hr />
<?php
	$f->exibe();

?>
</body>
</html>
</html>