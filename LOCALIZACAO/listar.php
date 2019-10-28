<?php

include("classeCabecalhoHTML.php");


include("conexao.php");
include("classeControllerBD.php");
include("classeTabela.php");


    $colunas = array("nome_Departamento AS 'Nome do Departamento'",
                        "Endereco AS 'Endereço'",
                        "cep AS 'CEP'", 
                        "cidade AS 'Cidade'",
                        "estado AS 'Estado'",
                        "nome_regiao AS 'Região'",);

    $t[0][0] = "departamento";
    $t[0][1] = "localizacao";
    $t[1][0] = "localizacao";
    $t[1][1] = "pais";
    $t[2][0] = "pais";
    $t[2][1] = "regiao";

    $c = new ControllerBD($conexao);
    
    $r = $c->selecionar($colunas,$t,null);

    while($linha = $r->fetch(PDO::FETCH_ASSOC)){
        $matriz[] = $linha;
    }

    $t = new Tabela($matriz);
    $t->exibe();