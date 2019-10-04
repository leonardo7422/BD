<?php

include("conexao.php");

if(!empty($_POST)){

	$ID_REGIAO = $_POST["ID_REGIAO"];
	$NOME_REGIAO = $_POST["NOME_REGIAO"];



	$insert = "INSERT INTO regiao VALUES (:id_regiao, :nome_regiao)";

	$stmt = $conexao->prepare($insert);

	$stmt->bindValue(":id_regiao",$ID_REGIAO);
	$stmt->bindValue(":nome_regiao",$NOME_REGIAO);

	$stmt->execute();
	
	echo "Função inserida com sucesso";
	
}
else{
	header("location: form_regiao.php");
}
?>