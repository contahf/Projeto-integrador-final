 <?php  
   session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }
    
    $Login = $_GET['l']; 
    
    include 'conect.php';

    if($con){
    
        $sql = "select * from usuario where login = '". $Login ."'";
        $result = pg_query($con, $sql);
       
        if(pg_affected_rows($result) > 0){
            
            $sql = "DELETE FROM usuario WHERE login = " . "'" . $Login ."'";
            $result = "";
            $result = pg_query($con, $sql);

                if(pg_affected_rows($result) > 0){
                    
                    echo (ltrim($Login));

                } else {
                    echo false;
                }
        }
    }

pg_close($con);


?>
