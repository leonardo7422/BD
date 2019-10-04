
<?php


include("classeCabecalhoHTML.php");
$c = new CabecalhoHTML();
$c->exibe();
include("conexao.php");


$ID_FUNCAO = $_POST["ID_FUNCAO"];

$delete = "DELETE * FROM funcao WHERE ID_FUNCAO=$ID_FUNCAO";


$stmt = $conn->prepare($delete);

$stmt->bindValue(":id_funcao", $ID_FUNCAO);

$stmt->execute();

echo"Função Removida com Sucesso";




