<?php 
  
    $nome = $_POST['txtNome'];
    $matricula = $_POST['txtMat'];
    $nasc = $_POST['txtNasc'];
    $sex = $_POST['txtSexo'];
    $cidade = $_POST['txtCidade'];
    $uf = $_POST['txtEstado'];

   
    require_once 'conect.php';

    if ($con) {
                 
        $sql = "UPDATE aluno SET nome = '". $nome ."', sexo = '" . $sex . "', dtnasc = '". $nasc . "', cidade = '". $cidade . "' , uf = '". $uf . "' WHERE matricula = '" . $matricula . "';";

        
        $resultado = pg_query($sql);
       
        $result = pg_affected_rows($resultado); 

        if( $result > 0){
            $ret = true;

        }else{
            $ret = false;
        }
    }


echo (json_encode($ret));

?>