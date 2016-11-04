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
    
    $strCon = "host=localhost dbname=projetointegrador user=senac password=senac123";
    $con = pg_connect($strCon);

    if($con){
    
        $sql = "select * from usuario where login = '". $Login ."'";
        $result = pg_query($con, $sql);
       

        if(pg_affected_rows($result) > 0){
            $sql = "";
            $sql = "DELETE FROM usuario WHERE login = " . "'" . $Login ."'";
            $result = "";
            $result = pg_query($con, $sql);

                if(pg_affected_rows($result) > 0){
        
                      echo "<script type='text/javascript'>
                                                                        
                         window.alert('Usuario removido com sucesso!');
                       window.location.href = 'editUser.php'; 
                
                         </script>";
                }
        }
    }

//pg_close($con);


?>
