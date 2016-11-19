
<?php 
 session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }
 
    $ret = "";

    $nome = $_POST['txtNome'];
    $matricula = $_POST['txtMat'];
    $nasc = $_POST['txtNasc'];
    $sex = $_POST['txtSexo'];
    $cid = $_POST['txtCidade'];
    $u = $_POST['estado'];
    

    require_once 'conect.php';

    if ($con) {
        
        $sql = "select * from aluno where  matricula = '". $matricula ."'";

        $consulta = pg_query($con, $sql);
 
        $linhas = pg_num_rows($consulta);

        if($linhas > 0 ){
            
            $ret = "-1";
            
         }elseif ($linhas==0) {
           
            $sql = "INSERT INTO aluno (matricula, nome, sexo, dtnasc, cidade, uf) VALUES ('".$matricula."', '".$nome."', '".$sex."','".$nasc."','".$cid."', '".$u."');";
            $res = pg_query($con, $sql);

            $qtd_linhas = pg_affected_rows($res);

            if ($qtd_linhas > 0){
                
                $ret = $matricula;
                
            }

        
         }

                

    }

    echo (json_encode($ret));
    pg_close($con);
    


?>
