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
    
    $c = $_POST['num'];
    
    require_once 'conect.php';

    if($con){
    
        $sql = "select * from curso where numero = '". $c ."'";
        $result = pg_query($con, $sql);
       

        if(pg_affected_rows($result) > 0){

            $sql = "DELETE FROM curso WHERE numero = '" . $c ."'";
   
            $result = pg_query($con, $sql);

                if(pg_affected_rows($result) > 0){

                    $ret = $c;
        
                }else{

                    $ret = "-1";
                }
        }
    
    }

    echo json_encode($ret);

pg_close($con);


?>