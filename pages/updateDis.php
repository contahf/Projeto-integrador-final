<?php 
  

    session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }

     $Nome= $_POST["txtDis"];
     $carga = $_POST['txtCh'];
     $codigo = $_POST['txtCod'];
    
  
    $strCon = "host=localhost dbname=projetointegrador port=5432 user=senac password=senac123";

    $con = pg_connect($strCon);
    

    if ($con) {
                 
    $sql = "UPDATE disciplina SET nome = '". $Nome ."', ch = '" . $carga . "' WHERE codigo = '" . $codigo . "';";
   

    
    $resultado = pg_query($sql);
   
    $teste = pg_affected_rows($resultado); 

    if( $teste > 0){    
                   
         echo "

                    <script type='text/javascript'>                                          

                        window.alert('Disciplina editada com sucesso!');
                        window.location.href = 'editarDis.php'; 

                                                                        
                        
                    </script>


               ";
                pg_close($con);
                

    }else{

        echo "faiô";
    }
}


?>
