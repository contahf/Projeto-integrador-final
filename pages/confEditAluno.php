<?php 
 
 session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }

  
    $m = addslashes($_GET['txtMat']);

    if(isset($m) && !empty($m)){
        
        $arr="";
        
        require_once 'conect.php';

        if($con){
            $sql = "SELECT * FROM aluno WHERE matricula = '".$m."' ";
            
            $result = pg_query($con, $sql);

            if(pg_num_rows($result) > 0){

                $array = pg_fetch_assoc($result); 
                $arr = json_encode($array);
                   
            }

        }

    }else{

        $arr = "-1";
    }

    echo $arr;


?>



