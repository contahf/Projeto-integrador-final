<?php 
  
session_start();

$ret = "";


    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }

    $nomeCurso= $_POST['txtCurso'];
    $siglaCurso = $_POST['txtSigla'];
    $numeroCurso = $_POST['txtNumero'];

    require_once 'conect.php';    

    if ($con) {
                 
    $sql = "UPDATE curso SET nome = '". $nomeCurso ."', sigla = '" . $siglaCurso . "' WHERE numero = '" . $numeroCurso . "';";

    
    $resultado = pg_query($sql);
   
    $teste = pg_affected_rows($resultado); 

    if( $teste > 0){    
        
        $ret = $numeroCurso;          

    }else{

        $ret = "-2";
    }
}

echo json_encode($ret);


?>
