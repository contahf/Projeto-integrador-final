 <?php  
   
   session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }

    
    $mat = addslashes($_GET['txtMat']);

    if (!isset($mat) && empty($mat)) {
    
         echo (json_encode("-1"));
    
     }else{

        include 'conect.php';
        
        if($con){
    
            $sql = "SELECT * from aluno where matricula = '". $mat ."'";
            $result = pg_query($con, $sql);
       

            if(pg_num_rows($result) > 0){
        
                $sql = "DELETE FROM aluno WHERE matricula = '" . $mat ."'";
        
                $result = pg_query($con, $sql);

                    if(pg_affected_rows($result) > 0){
                    
                        echo (trim($mat));
                    
                    }else{
                        
                        return false;
                    }
            }else{

                echo "Registro não encontrado";
            }
        }


    } 
    
    
    pg_close($con);

?>