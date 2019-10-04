<?php

include("conexao.php");

if(!empty($_POST)){

	$ID_LOCALIZACAO = $_POST["ID_LOCALIZACAO"];
	$ENDERECO = $_POST["ENDERECO"];
	$CEP = $_POST["CEP"];
	$CIDADE = $_POST["CIDADE"];
	$ESTADO = $_POST["ESTADO"];



	$insert = "INSERT INTO pais VALUES (:id_localizacao, :endereco, :cep, :cidade, :estado)";

	$stmt = $conexao->prepare($insert);

	$stmt->bindValue(":id_localizacao",$ID_LOCALIZACAO);
	$stmt->bindValue(":endereco",$ENDERECO);
	$stmt->bindValue(":cep",$CEP);
	$stmt->bindValue(":cidade",$CIDADE);
	$stmt->bindValue(":estado",$ESTADO);
	

	$stmt->execute();
	
	echo "Localizacao inserida com sucesso";
	
}
else{
	header("location: form_localizacao.php");
}
?>