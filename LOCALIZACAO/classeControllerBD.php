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
            public function selecionar($colunas, $tabelas, $ordenacao){
                $sql = "SELECT "; 
                
                foreach($colunas as $i=>$v){
                    if($i!=0){
                        $sql .= ", ";
                    }
                    $sql .= $v;
                }

                $sql .= " FROM "; 

                if($tabelas[0][1]==null){
                    $sql .= $tabelas[0][0];
                }
                else{
                    foreach($tabelas as $i=>$v){
                        if($i==0){
                            $sql .= $v[0];
                        }
                        $sql .= " INNER JOIN ".$v[1];
                        $sql .= " ON ".$v[0].".id_".$v[1]."=".$v[1].".id_".$v[1];
                    }
                }
                if($ordenacao!=null){
                    $sql .= " ORDER BY ".$ordenacao;
                }   

                $stmt = $this->conexao->prepare($sql);

                $stmt->execute();
               

                return($stmt);
            }
    }