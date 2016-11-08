<?php  

    session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }

    $id = $_SESSION['tipo'];

    if($id == "C"){

         header('location:editUser.php');

    }else{

        echo "Voce nao tem permissao!";
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        unset($_SESSION['tipo']);


    }

    
    
?>