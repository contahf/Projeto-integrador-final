<?php  

session_start();

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
{
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    session_destroy();
    header('location:../index.html');
}



$numProj = $_POST['p'];
$codDis = $_POST['d'];
$desc = $_POST['txtDesc'];


if (empty($numProj)) {
    $data['proj'] = "10";

}
if (empty($codDis)) {
    $data['dis'] = "11";

}
if (empty($desc)) {
    $data['desc'] = "12";

}

if (!empty($data)) {
   
    $b = $data;

}else{

    require_once 'conect.php';
   
    $sql = "INSERT INTO composto (num_proj, cod_disc, desc_atividade) VALUES ('".$numProj."', '".$codDis."', '".$desc."')";

        $result = pg_query($con, $sql);
        $uol = pg_affected_rows($result);
        
        if($uol > 0){
                   
            $data['success'] = "ok";
            $b = $data;

        }else{
           
            $data['success'] = "-1";
            $b = $data;
                    
        }


}

echo json_encode($b);


pg_close($con);
    
    
?>


