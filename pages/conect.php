<?php 
	
	try {
		
		$strCon = "host=localhost dbname=projetointegrador port=5432 user=senac password=senac123";
		$con = pg_connect($strCon);	

	} catch (Exception $e) {
		
		throw new Exception("Verifique a conexão com seu banco", 1);

		echo $e->getMessage(), "\n";
	}

?>

