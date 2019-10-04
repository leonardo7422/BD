<?php 

    class ControllerBD{

            private $conexao;

            public function __construct(PDO $c){
                $this->conexao = $c;
            }

            public function remover($id, $tabela){
                $delete = "DELETE FROM funcao WHERE id_$tabela=:id";
                $stmt = $this->conexao->prepare($delete);
                $stmt->bindValue(":id, $id");
                $stmt->execute();
            }
    }