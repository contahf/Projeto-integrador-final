
<?php
	
session_start();

try {
        include 'conect.php';

        if(!$con){
                    
            throw new Exception("Verifique a conexão com seu banco", 1);
                    
        }
       
        $login = $_POST['login'];
        $senha = $_POST['senha'];                       
        
        $user = "select * from usuario where login = '".$login."' and senha = '".$senha."'";
        $userSim = pg_query($con, $user);

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
                header ("location:index.php");
            }

         
         }else{
            echo "usuario não cadastrado";
         }
                
    } 

    catch (Exception $e) {
                
        echo $e->getMessage(), "\n";
        
    }
        
    
        
    	   
?>







