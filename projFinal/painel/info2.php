
<?php
	session_start();
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$strCon = "host=localhost dbname=projetointegrador port=5432 user=senac password=senac123";

	$con = pg_connect($strCon);
	

	if ($con) {
        $user = "select * from usuario where login = '".$login."' and senha = '".$senha."'";
        $userSim = pg_query($con,$user);

        if(pg_num_rows($userSim) > 0 ){
     
        	$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
      
                header ("location:index.php");
               //include 'teste.php';
         
         }else{
         	
         	unset ($_SESSION['login']);
	        unset ($_SESSION['senha']);
	        session_destroy();
         	header ("location:/Projeto-integrador-final/projFinal/index.html");
         }      	

    }

?>





