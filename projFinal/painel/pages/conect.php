
<?php
	session_start();
	//$login = $_POST['login'];
	//$senha = $_POST['senha'];
	//abaixo evitando sql_injection
	$login = preg_replace('/[^[:alpha:]_]/', '',$_POST['login']);
	$senha = preg_replace('/[^[:alpha:]_]/', '',$_POST['senha']);


	$strCon = "host=localhost dbname=projetointegrador port=5432 user=senac password=senac123";

	$con = pg_connect($strCon);
	

	if ($con) {
        
        return;       	   

    }

?>