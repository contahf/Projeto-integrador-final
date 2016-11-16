<?php  

$ret="";      


    if (isset($_POST["txtCurso"]) && !empty($_POST["txtCurso"])) {
        $nomeCurso = $_POST["txtCurso"]; 
    }

    if(isset($_POST['txtSigla']) && !empty($_POST['txtSigla'])){

        $siglaCurso = $_POST['txtSigla'];    
    }

    if(isset($_POST['txtNumero']) && !empty($_POST['txtNumero'])){

        $numeroCurso = $_POST['txtNumero'];
    }
    
    require_once 'conect.php';    

    if ($con) { 
        
        $sql = "select * from curso where  numero = '". $numeroCurso ."'";

        $consulta = pg_query($con, $sql);
 
        $linhas = pg_num_rows($consulta);

        if($linhas > 0 ){
            
            $ret = "-1";     
         
         }elseif ($linhas==0) {
            
            $sql = "INSERT INTO curso (numero, nome, sigla) VALUES ('".$numeroCurso."', '".$nomeCurso."', '".$siglaCurso."');";
           
            $res = pg_query($con, $sql);

            $qtd_linhas = pg_affected_rows($res);

            if ($qtd_linhas > 0){
                
                $ret = $numeroCurso;
                
            
            }else{

                $ret = "-2";
                
            }

        

         }                 

    }
    echo (json_encode($ret));
    pg_close($con);


?>
