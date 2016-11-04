<?php 
  

    session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }

    $nomeCurso= $_POST["txtCurso"];
    $siglaCurso = $_POST['txtSigla'];
    
    $numeroCurso = $_SESSION['id_numero'];
   
  
    
  
    $strCon = "host=localhost dbname=projetointegrador port=5432 user=senac password=senac123";

    $con = pg_connect($strCon);
    

    if ($con) {
                 
    $sql = "UPDATE curso SET nome = '". $nomeCurso ."', sigla = '" . $siglaCurso . "' WHERE numero = '" . $numeroCurso . "';";

    
    $resultado = pg_query($sql);
   
    $teste = pg_affected_rows($resultado); 

    if( $teste > 0){    
                   
         echo "

                    <script type='text/javascript'>                                          

                        window.alert('Update realisado!');
                        window.location.href = 'confCurso.php'; 

                                                                        
                        
                    </script>


               ";
                pg_close($con);
                

    }else{

        echo "faiô";
    }
}


?>
