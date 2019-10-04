<?php
	include("classeCabecalhoHTML.php");
	$c = new CabecalhoHTML();
	$c->exibe();

	include("conexao.php");
	
	$sql = "SELECT * FROM regiao ORDER BY NOME_REGIAO";
	
	$stmt = $conexao->prepare($sql);
	
	$stmt->execute();
	
	echo "<table border='1'>";
	echo "<thead>
			<tr>
				<th>ID REGIÃO</th>
				<th>NOME REGIÃO</th>
			</tr>
		  </thead>
		  <tbody>
		  ";
	while($linha=$stmt->fetch()){
		echo "<tr>
				<td>".$linha["ID_REGIAO"]."</td>
				<td>".$linha["NOME_REGIAO"]."</td>

				<td>
					<form method='post' action='remover_regiao.php'>
						<input type='hidden' name='ID_REGIAO' value='".$linha["ID_REGIAO"]."' />
						<button>Remover</button>
					</form>
					
				</td>
		      </tr>";
	}
	echo "</tbody>
		</table>";
?>