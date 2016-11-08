<?php 
  

    session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }

    $nome = $_POST['txtNome'];
    $matricula = $_SESSION['ID_MAT'];
    $nasc = $_POST['txtNasc'];
    $sex = $_POST["txtSexo"];
    $cidade = $_POST['txtCidade'];
    $uf = $_POST['estado'];
   
  
    
  
    $strCon = "host=localhost dbname=projetointegrador port=5432 user=senac password=senac123";

    $con = pg_connect($strCon);
    

    if ($con) {
                 
    $sql = "UPDATE aluno SET nome = '". $nome ."', sexo = '" . $sex . "', dtnasc = '". $nasc . "', cidade = '". $cidade . "' , uf = '". $uf . "' WHERE matricula = '" . $matricula . "';";

    
    $resultado = pg_query($sql);
   
    $teste = pg_affected_rows($resultado); 

    if( $teste > 0){    
                   
         echo "

                    <script type='text/javascript'>                                          

                        window.alert('Update realisado!');
                        window.location.href = 'confMatricula.php'; 

                                                                        
                        
                    </script>


               ";
        unset($_SESSION['ID_MAT']);
                pg_close($con);
                

    }else{

        echo "faiô";
    }
}


?>
