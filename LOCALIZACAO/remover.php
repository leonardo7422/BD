<?php  

    include("classeCabecalhoHTML.php");
    $c = new CabecalhoHTML();
    $c->exibe();

    
    include("conexao.php");
    include("classeControllerBD.php");

    $ctrl = new ControllerBD($conexao);
    $ctrl->remover($_POST["$ID"],$_POST["tabela"]);
    $ctrl->remover($_POST["ID"],$_POST["tabela"]);

