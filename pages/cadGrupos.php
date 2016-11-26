<?php

require_once 'conect.php';

	$sql = "INSERT INTO grupo (id, nome,num_proj) VALUES " 
		. "('" . $_GET['txtID'] . "',"
		. "'" . $_GET['txtNome'] . "',"
		. $_GET['projNum'] . ")"
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
	
pg_close($con);

?>
