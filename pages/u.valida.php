<?php 

    session_start();

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
  
    $ret = "";

    require_once 'conect.php';

    if ($con) {

        if ($_POST['txtLogin']) {

            $sql = "SELECT * FROM usuario WHERE login = '".$_POST['txtLogin']."'";
             $result = pg_query($con, $sql);

            if(pg_num_rows($result) > 0){

                $array = pg_fetch_assoc($result); 
                $arr = json_encode($array);
        
            }else{

                $arr = json_encode("-1");
            }
    
        }else{
            $arr = json_encode("-2");
        }
    }

    echo $arr;
?>