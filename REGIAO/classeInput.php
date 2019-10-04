<?php
	require_once("InterfaceExibicao.php");
	
	class Input implements Exibicao{
		private $type;
		private $name;
		private $placeholder;
		//private $label;
		
		public function __construct($vetor){
			$this->type=$vetor["type"];
			$this->name=$vetor["name"];
			if(isset($vetor["placeholder"])){
				$this->placeholder=$vetor["placeholder"];
			}
			//$this->label=$vetor["label"];
		}
		
		public function exibe(){
			echo 
			"<input type='$this->type'
					name='$this->name' ";
			if($this->placeholder!=null){
				echo "placeholder='$this->placeholder' ";
			}
			echo " />";
		}
		
	}

?>