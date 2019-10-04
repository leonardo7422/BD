<?php

include("conexao.php");

if(!empty($_POST)){

	$ID_FUNCAO=$_POST["ID_FUNCAO"];
	$TITULO_FUNCAO=$_POST["TITULO_FUNCAO"];
	$SALARIO_MINIMO=$_POST["SALARIO_MINIMO"];
	$SALARIO_MAXIMO=$_POST["SALARIO_MAXIMO"];


	$insert = "INSERT INTO funcao VALUES ('$ID_FUNCAO','$TITULO_FUNCAO',$SALARIO_MINIMO,$SALARIO_MAXIMO)";

	$stmt = $conexao->prepare($insert);

	$stmt->execute();
	
	echo "Função inserida com sucesso";
	
}
else{
	header("location: form_funcao.php");
}
?>