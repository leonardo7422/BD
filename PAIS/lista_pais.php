<?php
	include("classeCabecalhoHTML.php");
	$c = new CabecalhoHTML();
	$c->exibe();

	include("conexao.php");
	
	$sql = "SELECT * FROM pais, regiao WHERE pais.id_regiao = regiao.id_regiao";
	
	$stmt = $conexao->prepare($sql);
	
	$stmt->execute();
	
	echo "<table border='1'>";
	echo "<thead>
			<tr>
				<th>ID PAIS</th>
				<th>NOME PAIS</th>
				<th>NOME REGIÃO</th>
				<th>AÇÃO</th>
			</tr>
		  </thead>
		  <tbody>
		  ";
	while($linha=$stmt->fetch()){
		echo "<tr>
				<td>".$linha["ID_PAIS"]."</td>
				<td>".$linha["NOME_PAIS"]."</td>
				<td>".$linha["NOME_REGIAO"]."</td>
			
				<td>
					<form method='post' action='remover_pais.php'>
						<input type='hidden' name='ID_PAIS' value='".$linha["ID_PAIS"]."' />
						<button>Remover</button>
					</form>
					
				</td>
		      </tr>";
	}
	echo "</tbody>
		</table>";
?>