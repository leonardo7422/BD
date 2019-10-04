<?php
	include("../classeLayout/classeCabecalhoHTML.php");
	$c = new CabecalhoHTML();
	$c->exibe();

	include("conexao.php");
	
	$sql = "SELECT * FROM funcao ORDER BY TITULO_FUNCAO";
	
	$stmt = $conexao->prepare($sql);
	
	$stmt->execute();
	
	echo "<table border='1'>";
	echo "<thead>
			<tr>
				<th>ID FUNÇÃO</th>
				<th>TÍTULO DA FUNÇÃO</th>
				<th>SALÁRIO MÍNIMO</th>
				<th>SALÁRIO MÁXIMO</th>
				<th>AÇÃO</th>
			</tr>
		  </thead>
		  <tbody>
		  ";
	while($linha=$stmt->fetch()){
		echo "<tr>
				<td>".$linha["ID_FUNCAO"]."</td>
				<td>".$linha["TITULO_FUNCAO"]."</td>
				<td>".$linha["SALARIO_MINIMO"]."</td>
				<td>".$linha["SALARIO_MAXIMO"]."</td>
				<td>
					<form method='post' action='remover_funcao.php'>
						<input type='hidden' name='ID_FUNCAO' value='".$linha["ID_FUNCAO"]."' />
						<button>Remover</button>
					</form>
					
				</td>
		      </tr>";
	}
	echo "</tbody>
		</table>";
?>