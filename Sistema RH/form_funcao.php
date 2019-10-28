<?php

	include("../classeLayout/classeCabecalhoHTML.php");
	include("cabecalho.php");
	include("conexao.php");
	
	require_once("../classeForm/InterfaceExibicao.php");
	require_once("../classeForm/classeInput.php");
	require_once("../classeForm/classeButton.php");
	require_once("../classeForm/classeForm.php");
	
	if(isset($_POST["id"])){
		require_once("classeControllerBD.php");
		$c = new ControllerBD($conexao);
		$colunas = array("*");
		$tabelas[0][0]="funcao";
		$tabelas[0][1]=null;
		$ordenacao = null;
		$condicao = $_POST["id"];
		$stmt = $c->selecionar($colunas,$tabelas,$ordenacao,$condicao);
		$linha = $stmt->fetch(PDO::FETCH_ASSOC);
		$value_id_funcao = $linha["ID_FUNCAO"];
		$value_titulo_funcao = $linha["TITULO_FUNCAO"];
		$value_salario_min = $linha["SALARIO_MINIMO"];
		$value_salario_max = $linha["SALARIO_MAXIMO"];
		
		
		$action = "alterar.php?tabela=departamento";

		$disabled = true;
		
	}
	else{
		$disabled = false;
		$value_id_funcao = null;
		$value_titulo_funcao = null;
		$value_salario_min = null;
		$value_salario_max  = null;
		

		$action = "insere.php?tabela=departamento";			
	}

	$v = array("action"=>"insere.php?tabela=funcao","method"=>"post");
	$f = new Form($v);
	
	$v = array("type"=>"text","name"=>"ID_FUNCAO","placeholder"=>"ID DA FUNÇÃO...", "value"=>$value_id_funcao);
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"TITULO_FUNCAO","placeholder"=>"TÍTULO DA FUNÇÃO...","value"=>$value_titulo_funcao);
	$f->add_input($v);
	$v = array("type"=>"number","name"=>"SALARIO_MINIMO","placeholder"=>"SALÁRIO MÍNIMO...","value"=>$value_salario_min);
	$f->add_input($v);
	$v = array("type"=>"number","name"=>"SALARIO_MAXIMO","placeholder"=>"SALÁRIO MÁXIMO...","value"=>$value_salario_max);
	$f->add_input($v);
	$v = array("texto"=>"ENVIAR");
	$f->add_button($v);	
?>

<h3>Formulário - Inserir Função</h3>

<hr />
<?php
	$f->exibe();

?>
</body>
</html>
</html>