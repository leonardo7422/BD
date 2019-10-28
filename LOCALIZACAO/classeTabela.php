<?php

    class Tabela{
 private $matriz;
        
        public function __construct($matriz){
           $this->matriz = $matriz;
        }

        public function exibe(){
            echo "<table border = '1'";
            foreach($this->matriz as $i=>$v){
                if($i==0){
                    echo "<thead>";
                    echo "<tr>";
                    foreach($v as $j=>$d){
                        echo"<th>".$j."</th>";
                    }
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody";
                }
                echo"<tr>";
                    foreach($v as $j=>$d){
                        echo "<td>".$d."</td>";
                    }
                    echo "</tr>";
                }
                echo"</tbody";
            
            echo "</table>";
        }
    }
