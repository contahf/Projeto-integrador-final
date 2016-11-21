
<?php 
 session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }
 
    $nome = addslashes($_POST['txtNome']);
    $matricula = addslashes($_POST['txtMat']);
    $nasc = addslashes($_POST['txtNasc']);
    $sex = addslashes($_POST['txtSexo']);
    $cid = addslashes($_POST['txtCidade']);
    $u = addslashes($_POST['estado']);


    $errors = array();
    $data = array();

    if (empty($nome)){
        $errors['n'] = '10';
    }

    if (empty($matricula)){
        
        $errors['mat'] = '11';
    }

    if (empty($nasc)){

        $errors['nas'] = '12';
    }

    if (empty($sex)){

        $errors['s'] = '13';
    }
    if (empty($cid)){

        $errors['cid'] = '14';
    }

    if (empty($u)){

        $errors['est'] = '15';
    }

    if (!empty($errors)) {
    
        $b = $errors;
        
    }else{

        require_once 'conect.php';

        if ($con) {
            
            $sql = "select * from aluno where  matricula = '". $matricula ."'";

            $consulta = pg_query($con, $sql);
     
            $linhas = pg_num_rows($consulta);

            if($linhas > 0 ){
                
                $errors['existe'] = "-1";
                $b = $errors;
                
             }elseif ($linhas==0) {
               
                $sql = "INSERT INTO aluno (matricula, nome, sexo, dtnasc, cidade, uf) VALUES ('".$matricula."', '".$nome."', '".$sex."','".$nasc."','".$cid."', '".$u."');";
                $res = pg_query($con, $sql);

                $qtd_linhas = pg_affected_rows($res);

                if ($qtd_linhas > 0){
                    
                    $data['success'] = $matricula;
                    $b = $data;                
                }

            
             }

                    

        }


    }
    
    echo (json_encode($b));

    pg_close($con);
    
?>
