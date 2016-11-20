<?php 
  

    session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }


   
  
    $nome= addslashes($_POST['nome']);
    $categoria = addslashes($_POST['categoria']);
    $situacao = addslashes($_POST['situacao']);
    $senha = addslashes($_POST['senha']);
    $LOGIN = addslashes($_POST['login']);

    $errors = array();
    $data = array();

    if (empty($nome)){
        $errors['n'] = '10';
    }

    if (empty($categoria)){
        
        $errors['cat'] = '11';
    }

    if (empty($situacao)){

        $errors['si'] = '12';
    }

    if (empty($LOGIN)){

        $errors['lo'] = '13';
    }
    if (empty($senha)){

        $errors['pass'] = '14';
    }
    
    if (!empty($errors)) {
    
        $b = $errors;
        
    }else{

        require_once 'conect.php';
    

        if ($con) {
                         
            $sql = "UPDATE usuario SET senha = '". $senha ."', nome = '" . $nome . "', categoria = '". $categoria . "', situacao = '". $situacao . "' WHERE login = '" . $LOGIN . "';";

            $resultado = pg_query($sql);
           
            $result = pg_affected_rows($resultado); 

            if( $result > 0){
                
                $data['success'] = "1";
                $b = $data;    

            }else{

                $errors['erros'] = "-2";
                $b= $errors;
                        
            }   
        
        }
    
    }
 
 echo (json_encode($b));

?>
