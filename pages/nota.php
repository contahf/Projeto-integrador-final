<?php
    session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }
include 'conect.php';
if($con){
	$sql = "select * from participa where  matricula = '". $_GET['matricula'] ."'";

        $consulta = pg_query($con, $sql);
 
        $linhas = pg_num_rows($consulta);

        if($linhas > 0 ){

		$sql = "UPDATE participa SET nota = " . $_GET['txtNota'] . " where  matricula = '". $_GET['matricula'] ."'";
		$result = pg_query($con, $sql);
		if(pg_affected_rows($result) > 0){
		
			echo "
	
        	        <script type='text/javascript'>                                          

                        window.alert('Nota cadastrada com sucesso!');
                        window.location.href = 'cadNota.php'; 

                                                                        
                        
                       </script>
    

                      ";
		
		}else{
			die("Erro ao cadastrar o aluno!");
		}
	
	}else{

		echo "<script type='text/javascript'>                                          

                        window.alert('Aluno nao esta cadastrado em um grupo do projeto integrador');
                        window.location.href = 'Cadparticipa.php'; 

                                                                        
                        
                       </script>";
	}


	
}else{

	echo "Conexao falhou!";

}


pg_close($con);

?>
