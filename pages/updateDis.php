<?php 
  
    session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }

    $data = array();
    

    require_once 'conect.php';

    $cod = $_POST['txtCod'];
    $codId = $_POST['txtCodigo'];


    if (isset($cod) && !empty($cod)) {

        $nome = $_POST['txtNome'];
        $carga = $_POST['txtCarga'];

        if (empty($nome)) {
            
            $data['n'] = "-10"; 
        }

        if (empty($carga)) {
            
            $data['carga'] = "-11"; 
        }

        if(!empty($data)){

            $arr = json_encode($data);
        
        }else{

            $sql = "UPDATE disciplina SET nome = '". $nome ."', ch = '" . $carga . "' WHERE codigo = '" . $cod . "';";
   
            $resultado = pg_query($sql);
           
            $teste = pg_affected_rows($resultado); 

            if( $teste > 0){    
                $arr = json_encode("ok");

            }else{

                $arr = json_encode("-1");
            }


        }
       
    
    }else {

        if (!empty($_POST['txtCodigo'])) {
            
            $sql = "SELECT * FROM disciplina WHERE codigo = '".$_POST['txtCodigo']."'";

            $result = pg_query($sql);

             if (pg_num_rows($result) > 0) {
                
                $data = pg_fetch_assoc($result); 
                $arr = json_encode($data);
                $_POST['txtCodigo'] = "";
            
            }else{

                $arr = json_encode("-2");
            
            }

        }



    }

    echo $arr;


?>
