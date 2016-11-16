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
    header('location:index.php');;
}

$numProj = $_POST['p'];
$codDis = $_POST['d'];
$desc = $_POST['txtDesc'];

if(isset($numProj) && isset($codDis) && isset($desc)){
    if(!empty($numProj) && !empty($codDis) && !empty($desc)){

        include 'conect.php';
        
        if($con){
    
            $sql = "INSERT INTO composto (num_proj, cod_disc, desc_atividade) VALUES ('".$numProj."', '".$codDis."', '".$desc."')";

            $result = pg_query($con, $sql);
            $uol = pg_affected_rows($result);
        
        
                if($uol > 0){
                   
                    echo "Inserido<br>";

               
                }else{
           
                    echo "ja Inserido";
                    
                }

        }

    }else{

        return false;
    }


}else{

    echo "Não pode ser null";

}
    
    

    

pg_close($con);
    
    
?>


