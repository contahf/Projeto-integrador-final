
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
            

            $arrayLista = pg_fetch_array($userSim);
            $login = $arrayLista['login'];
            $senha = $arrayLista['senha'];
            $nome = $arrayLista['nome'];
            $categoria = $arrayLista['categoria'];
            $situacao = $arrayLista['situacao'];

            

            $_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
            $_SESSION['tipo']  = $categoria;
            $_SESSION['nome']  = $nome;
            $_SESSION['sit']  = $situacao;

            if($_SESSION['sit'] == "I"){
                echo "

                    <script type='text/javascript'>                                          

                        window.alert('Voce ainda não esta ativado!');
                        window.location.href = '../index.html'; 

                                                                        
                        
                    </script>


               ";
            }else{
                header ("location:/Projeto-integrador-final/projFinal/painel/pages/index.php");
            }

            
            
      
                
               //include 'teste.php';
         
         }else{
         	
         	unset ($_SESSION['login']);
	        unset ($_SESSION['senha']);

	        session_destroy();
         	header ("location:../index.html");
         }      	

    }

?>





