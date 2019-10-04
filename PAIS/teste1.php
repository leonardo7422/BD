<?php 

    include("conexao.php");

    $insert = "INSERT INTO regiao VALUES   
    ('TI', 'Teste de função 1', '1000', '2000')";

    $delete = "DELETE FROM  regiao WHERE ID_REGIAO = 2
";

    $stmt = $conn->prepare($insert);

    $stmt->execute();


    print_r($stmt);
