<?php
	include("classeCabecalhoHTML.php");
	$c = new CabecalhoHTML();
	$c->exibe();

	include("conexao.php");
	
	$sql = "SELECT * FROM localizacao";
	
	$stmt = $conexao->prepare($sql);
	
	$stmt->execute();
	
	echo "<table border='1'>";
	echo "<thead>
			<tr>
				<th>ID LOCALIZACAO</th>
				<th>ENDEREÇO</th>
				<th>CEP</th>
				<th>CIDADE</th>
				<th>ESTADO</th>
			</tr>
		  </thead>
		  <tbody>
		  ";
	while($linha=$stmt->fetch()){
		echo "<tr>
				<td>".$linha["ID_LOCALIZACAO"]."</td>
				<td>".$linha["ENDERECO"]."</td>
				<td>".$linha["CEP"]."</td>
				<td>".$linha["CIDADE"]."</td>
				<td>".$linha["ESTADO"]."</td>
			
				<td>
					<form method='post' action='remover.php'>
						<input type='hidden' name='ID_LOCALIZACAO' value='".$linha["ID_LOCALIZACAO"]."' />
						<input type='hidden' name='id' value='".$linha["ID_LOCALIZACAO"]."' />
						<button>Remover</button>
					</form>
					
				</td>
		      </tr>";
	}
	echo "</tbody>
		</table>";
?>