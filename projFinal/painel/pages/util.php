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

        $user = $_SESSION['login'];
        $pass = $_POST['senha'];
        
               
        $sql = "select * from usuario where login = '".$login."' and senha = '".$senha."'";
      
        $consulta = pg_query($con, $sql);

        if(pg_num_rows($consulta) > 0 ){
    
        $arrayLista = pg_fetch_array($consulta);
        $login = $arrayLista['login'];
        $senha = $arrayLista['senha'];
        $nome = $arrayLista['nome'];
        $categoria = $arrayLista['categoria'];
        $situacao = $arrayLista['situacao'];


        setcookie("nome",$nome);
        setcookie("cidade",$cidade);
        setcookie("loginc",$loginc);

        header ("location:pagina_inicial.php");
    
    
    }else{
    
    
        header ("location:logout.php");
    }
      

        if($linhas > 0 ){
     

          header('location:finUser.php');
            
         
         }

                

    }


?>