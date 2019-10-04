<?php

require_once("interfaceExibicao.php");

class Select implements Exibicao{
    private $name;
    private $lista_option;

    public function __construct($vetor, $matriz){
        $this->name=$vetor["name"];

        foreach($matriz as $vetor){
                $this->lista_option[] = new Option($vetor);
            }
        }
    

    public function exibe(){
        echo "<select name='$this->name'>
                <option>::selecione::</option>";

        foreach($this->lista_option as $o){
            $o->exibe();
        }
        echo"</select>";
    }
    
}