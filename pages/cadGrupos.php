<?php

$strCon = "host=localhost dbname=projetointegrador user=senac password=senac123";
$con = pg_connect($strCon);
if($con){
	$sql = "INSERT INTO grupo (id, nome,num_proj) VALUES " 
		. "('" . $_GET['txtID'] . "',"
		. "'" . $_GET['txtNome'] . "',"
		. $_GET['Nome'] . ")"
		;
	$result = pg_query($con, $sql);
	
	if(pg_affected_rows($result) > 0){
		
		echo "

                    <script type='text/javascript'>                                          

                        window.alert('Grupo cadastrado com sucesso!');
                        window.location.href = 'cadGrupo.php'; 

                                                                        
                        
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
