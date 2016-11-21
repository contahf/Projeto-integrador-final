<?php

$strCon = "host=localhost dbname=projetointegrador user=senac password=senac123";
$con = pg_connect($strCon);
if($con){
	$sql = "INSERT INTO participa (matricula, id_grupo) VALUES " 
		. "('" . $_GET['matricula'] . "',"
		. $_GET['txtID'] . ")"
		;
	$result = pg_query($con, $sql);
	
	if(pg_affected_rows($result) > 0){
		
		echo "

                    <script type='text/javascript'>                                          

                        window.alert('Aluno cadastrado no grupo com sucesso!');
                        window.location.href = 'Cadparticipa.php'; 

                                                                        
                        
                    </script>


               ";
		
	}else{
		die("Erro ao cadastrar o aluno!");
	}
	
	
	
}else{

	echo "Conexao falhou!";

}

echo "</br></br><a href='index.html'>Voltar</a>";
pg_close($con);

?>
