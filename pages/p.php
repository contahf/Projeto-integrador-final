
<?php 
    
    session_start();

        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            session_destroy();
            header('location:../index.html');
    }
    

    $tema= $_POST['txtTema'];
    $desc = $_POST['txtDesc'];
    $ano = $_POST['txtAno'];
    $semestre = $_POST["txtSem"];
    $mod = $_POST['txtMod'];
    $curso = $_POST['curso'];
    $data1 = $_POST['txtDtIni'];
    $data2 = $_POST['txtDtFim'];


    $errors = array();
    $data = array();

    if(strtotime($data1) > strtotime($data2)){
       
        $errors['d'] = '10';
    
    }
    if (empty($curso)){
        $errors['c'] = '9';
    }

    if (empty($ano)){
        $errors['a'] = '11';
    }

    if (empty($semestre)){
        
        $errors['s'] = '12';
    }

    if (empty($data1)){

        $errors['d1'] = '13';
    }

    if (empty($data2)){

        $errors['d2'] = '14';
    }

    if (!empty($errors)) {
    
        $b = $errors;
        
    }else{

        require_once 'conect.php';

            
            $sql = "INSERT INTO projeto (ano, semestre, modulo, dt_inicio, dt_termino, tema, descricao, num_curso) VALUES ('".$ano."', '".$semestre."', '".$mod."','".$data1."','".$data2."', '".$tema."' , '".$desc."' , '".$curso."');";
           
           
            $res = pg_query($con, $sql);

            $qtd_linhas = pg_affected_rows($res);

            if ($qtd_linhas > 0){
               
               $data['success'] = "ok"; 
               $b = $data;
        
            }else{
                
                $data['erros'] = "15";
                $b = $data; 
                 
            }

    }

    echo json_encode($b);
    pg_close($con);

?>


