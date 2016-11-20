<?php 
   
    session_start();

    $errors = array();
    $data = array();


    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }
    
    if ($_SESSION['tipo'] !='C') {
         header('location:index.php');
    }

  
    $curso = addslashes($_POST['txtNome']);
    $sigla = addslashes($_POST['txtSigla']);
    $num = addslashes($_POST['txtNumero']);

    if (empty($curso)){
        $errors['n'] = '10';
    }

    if (empty($sigla)){
        
        $errors['s'] = '11';
    }

    if (empty($num)){

        $errors['nu'] = '12';
    }

    if (!empty($errors)) {
    
        $b = $errors;
        
    } else {

        require_once 'conect.php';    

            if ($con) {
                         
                $sql = "UPDATE curso SET nome = '". $curso ."', sigla = '" . $sigla . "' WHERE numero = '".$num."';";

                 $resultado = pg_query($con, $sql);
           
                $teste = pg_affected_rows($resultado); 

                if( $teste > 0){    
                
                    $data['success'] = "1";  
                    $b = $data;        

                }else{

                    $data['success'] = "0";
                    $b = $data;
                }
            }

    }

    $t = json_encode($b);
    echo $t;


    
?>
