 <?php  
   session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }
    
    $data;
    $arr = "";
    
    $codigo = $_GET['numDis']; 
    
    require_once 'conect.php';
    
        $sql = "select * from disciplina where codigo = '". $codigo ."'";
        $result = pg_query($con, $sql);
       
        if(pg_affected_rows($result) > 0){

            $sql = "DELETE FROM disciplina WHERE codigo = " . "'" . $codigo ."'";
            $result = pg_query($sql);

                if(pg_affected_rows($result) > 0){
        
                    $data = trim($codigo);

                }else{

                    $data = "-1"; 
                }
        }else{

            $data = "-2";

        }

        echo $data;
    
    

pg_close($con);


?>