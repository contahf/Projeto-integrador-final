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
		die("Erro ao cadastrar o grupo!");
	}
	
	
	
}else{

	echo "Conexao falhou!";

}

echo "</br></br><a href='index.html'>Voltar</a>";
pg_close($con);

?>
