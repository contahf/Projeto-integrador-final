<?php 

  
    $nome = $_POST['txtNome'];
    $matricula = $_POST['txtMat'];
    $nasc = $_POST['txtNasc'];
    $sex = $_POST['txtSexo'];
    $cidade = $_POST['txtCidade'];
    $uf = $_POST['txtEstado'];

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
    if (empty($cidade)){

        $errors['cid'] = '14';
    }

    if (empty($uf)){

        $errors['est'] = '15';
    }

    if (!empty($errors)) {
    
        $b = $errors;
        
    }else{

        require_once 'conect.php';

        if ($con) {
                     
            $sql = "UPDATE aluno SET nome = '". $nome ."', sexo = '" . $sex . "', dtnasc = '". $nasc . "', cidade = '". $cidade . "' , uf = '". $uf . "' WHERE matricula = '" . $matricula . "';";

            
            $resultado = pg_query($sql);
           
            $result = pg_affected_rows($resultado); 

            if( $result > 0){
                
                $data['success'] = "true";
                $b = $data; 

            }else{
                $data['success'] = "false";
                $b = $data; 
            }
        }
    }
   
    

echo (json_encode($b));

?>