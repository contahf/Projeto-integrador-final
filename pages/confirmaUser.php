<?php  

 session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
   
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }


	
	$strCon = "host=localhost dbname=projetointegrador port=5432 user=senac password=senac123";

	$con = pg_connect($strCon);
	

	if ($con) {


		$pass = $_POST['txtSenha'];
		$user = $_SESSION['login'];

		
		
		
        $sql = "select login, categoria from usuario where login = '". $login . "' and categoria = " . "'". $categoria ."'";
      
        $consulta = pg_query($con, $sql);
 
        $linhas = pg_num_rows($consulta);
      

        if($linhas > 0 ){
     

      	  header('location:finUser.php');
			
         
         }

               	

    }


?>