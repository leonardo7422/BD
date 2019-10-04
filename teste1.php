<?php 

    include("conexao.php");

    $insert = "INSERT INTO funcao VALUES   
    ('TI', 'Teste de função 1', '1000', '2000')";

    $delete = "DELETE FROM  funcao WHERE ID_FUNCAO ='AC_MGR'
";

    $stmt = $conn->prepare($insert);

    $stmt->execute();


    print_r($stmt);
