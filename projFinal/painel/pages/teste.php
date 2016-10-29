<?php 
  

    session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }


   
  
    $nome= $_POST['nome'];
    $categoria = $_POST['categoria'];
    $situacao = $_POST['situacao'];
    $senha = $_POST['senha'];
    $LOGIN = $_SESSION['login'];
  
    $strCon = "host=localhost dbname=projetointegrador port=5432 user=senac password=senac123";

    $con = pg_connect($strCon);
    

    if ($con) {
                 
    $sql = "UPDATE usuario SET senha = '". $senha ."', nome = '" . $nome . "', categoria = '". $categoria . "', situacao = '". $situacao . "' WHERE login = '" . $LOGIN . "';";

    $resultado = pg_query($sql);
   
    $teste = pg_affected_rows($resultado); 

    if( $teste > 0){    
                   
         echo "

                    <script type='text/javascript'>                                          

                        window.alert('Update realisado!');
                        window.location.href = 'finUser.php'; 

                                                                        
                        
                    </script>


               ";
                pg_close($con);
                

    }else{

        echo "faiô";
    }
}


?>
