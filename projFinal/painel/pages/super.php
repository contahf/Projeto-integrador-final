<?php  
	session_start();
	
	$strCon = "host=localhost dbname=projetointegrador port=5432 user=senac password=senac123";

	$con = pg_connect($strCon);
	

	if ($con) {


		$nome= $_POST['nome'];
		$categoria = $_POST['categoria'];
		$situacao = $_POST['situacao'];
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		
        $sql = "select nome, login from usuario where login = '". $login ."'";

        $consulta = pg_query($con, $sql);
 
        $linhas = pg_num_rows($consulta);

        if($linhas > 0 ){
     
        	include 'message.js';
			
         
         }elseif ($linhas==0) {
         	$sql = "INSERT INTO usuario (nome,categoria,situacao,login,senha) VALUES ('".$nome."', '".$categoria."','".$situacao."', '".$login."', '".$senha."');";
         	echo $sql;

        	$res = pg_query ($con, $sql);

			$qtd_linhas = pg_affected_rows($res);

			if ($qtd_linhas > 0){
				echo "<h2 class='text-success'>Cadastro realizado com sucesso</h2>";	
				echo "<a class='btn btn-primary' href='index.php' role='button'>Login</a>";
		
			}else{
			 
				die("Falha no cadastro");
			}
        

         }

               	

    }


?>